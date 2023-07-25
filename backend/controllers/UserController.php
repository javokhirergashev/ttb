<?php

namespace backend\controllers;

use backend\models\form\ProfileUpdateForm;
use backend\models\form\UserForm;
use common\models\People;
use common\models\Queue;
use common\models\search\UserCreateFormSearch;
use common\models\UserCreateForm;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * UserController implements the CRUD actions for UserCreateForm model.
 */
class UserController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all UserCreateForm models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserCreateFormSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserCreateForm model.
     *
     * @param int $id ID
     *
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UserCreateForm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new UserForm();
        $model->setScenario(UserForm::SCENARIO_REGISTER);
        if ($model->load(\Yii::$app->request->post())) {
            $model->avatar = UploadedFile::getInstance($model, 'avatar');
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UserCreateForm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param int $id ID
     *
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = new UserForm(['user_id' => $id]);
        $user = $this->findModel($id);
        print_r($model);die();
        $model->setAttributes($user->attributes);

        if ($model->load(\Yii::$app->request->post())) {
            $model->avatar = UploadedFile::getInstance($model, 'avatar');
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UserCreateForm model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param int $id ID
     *
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserCreateForm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id ID
     *
     * @return UserCreateForm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserCreateForm::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionProfile()
    {
//        var_dump(\Yii::$app->user->id);
//        die();
        $query = Queue::find()
            ->andWhere(['user_id' => \Yii::$app->user->id])->andWhere(['status' => Queue::STATUS_PENDING]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        $historyQuery = People::find()->leftJoin('diagnosis', 'people.id=diagnosis.people_id')
            ->andWhere(['diagnosis.doctor_id' => \Yii::$app->user->id])->orderBy(['diagnosis.id' => SORT_DESC]);
        $historyProvider = new ActiveDataProvider([
            'query' => $historyQuery
        ]);

        return $this->render('profile', [
            'user' => \Yii::$app->user->identity,
            'dataProvider' => $dataProvider,
            'historyProvider' => $historyProvider
        ]);
    }

    public function actionProfileEdite()
    {
        $form = new ProfileUpdateForm();
        if ($form->load(\Yii::$app->request->post())) {
            if ($form->save()) {
                return $this->redirect(['user/profile']);
            }
        }

        return $this->render('profile-edite', ['model' => $form]);

    }
}
