<?php

namespace backend\controllers;

use common\models\LoginForm;
use common\models\User;
use Yii;
use yii\db\Expression;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{

    public $enableCsrfValidation = false;

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'change-map'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'map', 'error'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionChangeMap()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $request = Yii::$app->request->getQueryParams();

        if ($request['latitude'] && $request['longitude']) {
            $user = User::findOne(Yii::$app->user->id);
            $user->updateAttributes(['lat' => $request['latitude'], 'lon' => $request['longitude']]);
        }

        return $user;
    }

    public function actionMap()
    {
//        $this->layout = 'map';
        $models = User::find()->andWhere(['is not', 'lat', null])->all();
        $result = [];
        foreach ($models as $index => $model) {
            $result[] = ["lat" => $model->lat, "lon" => $model->lon, "fullname" => $model->first_name . " " . $model->last_name];
        }
        return $this->render('map', [
            'data' => $result,
        ]);
    }


}
