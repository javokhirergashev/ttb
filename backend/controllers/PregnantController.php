<?php

namespace backend\controllers;

use common\models\People;
use common\models\Pregnant;
use common\models\PregnantSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PregnantController implements the CRUD actions for Pregnant model.
 */
class PregnantController extends Controller
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
     * Lists all Pregnant models.
     *
     * @return string
     */
    public function actionIndex($person_id)
    {

        $checked_person = People::findOne($person_id);
        if (!$checked_person) {
            throw new NotFoundHttpException("Bunday shaxs aholi ro'yhatida mavjud emas!");
        }
        $searchModel = new PregnantSearch([
            'person_id' => $person_id
        ]);

        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'person' => $checked_person,
        ]);
    }

    /**
     * Displays a single Pregnant model.
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
     * Creates a new Pregnant model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($person_id)
    {
        $checked_person = People::findOne($person_id);
        if (!$checked_person) {
            throw new NotFoundHttpException("Bunday shifoxona mavjud emas!");
        }
        $model = new Pregnant();
        $model->person_id = $person_id;
        if ($model->load($this->request->post())) {
            if ($model->save()) {
                return $this->redirect(['pregnant/index', 'person_id' => $checked_person->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'person' => $checked_person
        ]);
    }

    /**
     * Updates an existing Pregnant model.
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
     * Deletes an existing Pregnant model.
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
     * Finds the Pregnant model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Pregnant the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pregnant::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
