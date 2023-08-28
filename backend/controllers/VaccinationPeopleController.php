<?php

namespace backend\controllers;

use common\models\People;
use common\models\Qvp;
use common\models\search\PeopleSearch;
use common\models\VaccinationPeople;
use common\models\search\VaccinationPeopleSearch;
use kartik\mpdf\Pdf;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VaccinationPeopleController implements the CRUD actions for VaccinationPeople model.
 */
class VaccinationPeopleController extends Controller
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
     * Lists all VaccinationPeople models.
     *
     * @return string
     */
    public function actionIndex($person_id)
    {

        $checked_person = People::findOne($person_id);
        if (!$checked_person) {
            throw new NotFoundHttpException("Bunday shaxs aholi ro'yhatida mavjud emas!");
        }
        $searchModel = new VaccinationPeopleSearch([
            'people_id' => $person_id
        ]);
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'person' => $checked_person,
        ]);
    }

    /**
     * Displays a single VaccinationPeople model.
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
     * Creates a new VaccinationPeople model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($person_id)
    {
        $checked_person = People::findOne($person_id);
        if (!$checked_person) {
            throw new NotFoundHttpException("Bunday shaxs aholi ro'yhatida mavjud emas!");
        }

        $model = new VaccinationPeople();

        if ($this->request->isPost) {
            $model->people_id = $person_id;
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['people']);
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
     * Updates an existing VaccinationPeople model.
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
     * Deletes an existing VaccinationPeople model.
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
     * Finds the VaccinationPeople model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return VaccinationPeople the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = VaccinationPeople::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPeople()
    {
        $searchModel = new PeopleSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        return $this->render('people', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actionPdf($id, $qvp_id)
    {
        $person = People::findOne($id);
        $models = VaccinationPeople::find()->where(['people_id' => $id])->all();
        $content = $this->renderPartial('pdf', ['model' => $models, 'person' => $person]);
        $time = date('d.m.Y H:i');

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
//            'filename' => $model->first_name . ' ' . $model->last_name . ' ' . $time.'.pdf',
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Emlash'],
            // call mPDF methods on the fly
            'methods' => [
                'SetFooter' => ["$time"],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }
}
