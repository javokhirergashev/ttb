<?php

namespace api\models\form;

use common\models\History;
use common\models\Notification;
use common\models\Task;
use common\models\UserNotification;
use common\models\UserTask;
use yii\base\Model;

class UserTaskForm extends Model
{

    public $userIds;
    public $task_id;


    public function rules()
    {
        return [
            [['userIds'], 'required'],
            [['task_id'], 'integer'],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::class, 'targetAttribute' => ['task_id' => 'id']],
        ];
    }

    /**
     * @return array|bool
     * @throws \yii\db\Exception
     */
    public function save()
    {
        if (! $this->validate()) {
            return false;
        }
        $transaction = \Yii::$app->db->beginTransaction();
        $task = Task::findOne($this->task_id);
        $notification = new Notification([
            'type' => Notification::TYPE_PROJECT_USER,
            'title' => "Эта задача назначен вам",
            "status" => Notification::STATUS_ACTIVE,
            'task_id' => $this->task_id,
            'project_id' => $task->project_id
        ]);

        if (! $notification->save()) {
            $transaction->rollBack();
            $this->addErrors($notification->errors);
            return false;
        }

        foreach ($this->userIds as $index => $userId) {
            $userTask = new UserTask([
                'user_id' => $userId,
                'task_id' => $this->task_id,
            ]);

            if (! $userTask->save()) {
                $this->addErrors($userTask->errors);
                $transaction->rollBack();
                return false;
            }

            $userNotification = new UserNotification([
                'user_id' => $userId,
                'notification_id' => $notification->id,
                'status' => UserNotification::STATUS_PENDING,
            ]);

            if (! $userNotification->save()) {
                $transaction->rollBack();
                $this->addErrors($userNotification->errors);
                return false;
            }

            $task = Task::findOne($this->task_id);
            $task->saveHistory(History::TYPE_ADD_USER, 'assigned to', ['user_id' => $userId]);
        }

        $transaction->commit();
        return true;
    }


}