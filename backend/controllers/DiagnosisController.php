<?php

namespace backend\controllers;

use common\models\Diagnosis;
use common\models\People;
use common\models\Queue;
use common\models\search\DiagnosisSearch;
use common\models\search\PeopleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DiagnosisController implements the CRUD actions for Diagnosis model.
 */
class DiagnosisController extends Controller
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
     * Lists all Diagnosis models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DiagnosisSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Diagnosis model.
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
     * Creates a new Diagnosis model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($people_id, $queue_id = null)
    {
        if ($queue_id) {
            $queue = Queue::findOne($queue_id)->updateAttributes(['status' => Queue::STATUS_VIEWED]);

        }
        $model = new Diagnosis(['people_id' => $people_id]);
        $people = People::findOne($people_id);
        if (!$people) {
            throw new NotFoundHttpException("Ushbu bemor topilmadi");
        }

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->doctor_id = \Yii::$app->user->id;
                if ($model->save()) {
                    return $this->redirect(['user/profile']);
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
     * Updates an existing Diagnosis model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Diagnosis model.
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
     * Finds the Diagnosis model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Diagnosis the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Diagnosis::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPeople()
    {
        $searchModel = new PeopleSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        return $this->render('people', ['dataProvider' => $dataProvider]);
    }
}
