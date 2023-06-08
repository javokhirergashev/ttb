<?php

namespace backend\controllers;

use common\models\StaticFunctions;
use common\models\UserCreateForm;
use common\models\search\UserCreateFormSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
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
     * @param int $id ID
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
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new UserCreateForm();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->password_hash = \Yii::$app->security->generatePasswordHash($model->password);
//                $model->created_at = date('Y-m-d H:i:s', strtotime($model->created_at));
                $model->avatar = UploadedFile::getInstance($model, 'avatar');
//                print_r($model); die();
                if ($model->save()) {
                    $model->avatar = StaticFunctions::saveImage('user', $model->id, $model->avatar);
                    return $this->redirect(['index']);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UserCreateForm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $oldAvatar = $model->avatar;
                $model->avatar = UploadedFile::getInstance($model, 'avatar');
                if ($model->save()) {
                    if (!empty($model->avatar)) {
                        StaticFunctions::deleteImage('user', $model->id, $oldAvatar);
                        $model->avatar = StaticFunctions::saveImage('user', $model->id, $model->avatar);
                    } else {
                        $model->avatar = $oldAvatar;
                    }
                    return $this->redirect(['index']);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UserCreateForm model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
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
     * @param int $id ID
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
}
