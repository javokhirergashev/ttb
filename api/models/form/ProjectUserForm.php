<?php

namespace api\models\form;

use common\models\Notification;
use common\models\Project;
use common\models\UserNotification;
use common\models\UserProject;
use yii\base\Model;

class ProjectUserForm extends Model
{

    public $data;
    public $project_id;


    public function rules()
    {
        return [
            [['data'], 'required'],
            [['project_id'], 'integer'],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::class, 'targetAttribute' => ['project_id' => 'id']],
        ];
    }


    public function save()
    {
        if (! $this->validate()) {
            return false;
        }
        $transaction = \Yii::$app->db->beginTransaction();

        $notification = new Notification([
            'type' => Notification::TYPE_PROJECT_USER,
            'title' => "Вы присоединены к этому проекту",
            "status" => Notification::STATUS_ACTIVE,
            'project_id' => $this->project_id
        ]);

        if (! $notification->save()) {
            $transaction->rollBack();
            $this->addErrors($notification->errors);
            return false;
        }

        foreach ($this->data as $index => $datum) {

            if ($userProject = UserProject::findOne(['user_id' => $datum['user_id'], 'project_id' => $this->project_id])) {
                $userProject->updateAttributes(['position_id' => $datum['position_id']]);
                continue;
            }
            $userProject = new UserProject([
                'user_id' => $datum['user_id'],
                'project_id' => $this->project_id,
                'position_id' => $datum['position_id'],
            ]);

            if (! $userProject->save()) {
                $this->addErrors($userProject->errors);
                $transaction->rollBack();
                return false;
            }

            $userNotification = new UserNotification([
                'user_id' => $datum['user_id'],
                'notification_id' => $notification->id,
                'status' => UserNotification::STATUS_PENDING,
            ]);

            if (! $userNotification->save()) {
                $transaction->rollBack();
                $this->addErrors($userNotification->errors);
                return false;
            }
        }

        $transaction->commit();
        return [
            "code" => 1,
            "message" => "success"
        ];
    }


}