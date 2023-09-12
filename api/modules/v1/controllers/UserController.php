<?php

namespace api\modules\v1\controllers;

use api\models\form\UserProfileForm;
use common\models\Notification;
use common\models\search\NotificationSearch;
use common\models\search\TaskSearch;
use common\models\UserDepartment;
use common\models\UserNotification;
use common\models\UserProject;
use common\models\UserTask;
use common\models\WorkingHour;
use common\modules\user\forms\LoginForm;
use common\modules\user\forms\RegisterForm;
use common\modules\user\models\User;
use common\modules\user\models\UserSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\rest\Controller;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;

class UserController extends Controller
{
    public function actionEnter()
    {
        $requestParams = \Yii::$app->request->getBodyParams();
        $model = new WorkingHour();
        $model->setAttributes($requestParams);
        if ($model->save()) {
            return $model;
        }
        throw new BadRequestHttpException("Face not suitable");
    }

    public function actionExit()
    {
        $requestParams = \Yii::$app->request->bodyParams;
        $model = new WorkingHour();
        $model->setAttributes($requestParams);
        if ($model->save()) {
            return $model;
        }
        throw new BadRequestHttpException("Face not suitable");
    }
}