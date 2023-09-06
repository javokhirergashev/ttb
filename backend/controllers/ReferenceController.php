<?php

namespace backend\controllers;

use common\models\Reference;
use common\models\ReferenceDiagnosis;
use common\models\search\ReferenceSearch;
use kartik\mpdf\Pdf;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReferenceController implements the CRUD actions for Reference model.
 */
class ReferenceController extends Controller
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
     * Lists all Reference models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ReferenceSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reference model.
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
     * Creates a new Reference model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Reference();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Reference model.
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
     * Deletes an existing Reference model.
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
     * Finds the Reference model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Reference the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reference::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionDiagnosisCreate($id)
    {

        $reference = Reference::findOne($id);
        $people = $reference->people;
        $model = new ReferenceDiagnosis(['reference_id' => $id]);
        $referenceDiagnosis = ReferenceDiagnosis::find()->andWhere(['reference_id' => $id])->all();
        if ($model->load(\Yii::$app->request->post())) {

            if ($model->position == ReferenceDiagnosis::POSITION_MAIN_DOCTOR) {
                $reference->updateAttributes(['status' => Reference::STATUS_FINISHED]);
            }
            if ($model->save()) {
                return $this->redirect(['reference/index']);
            }
        }


        return $this->render('diagnosis-create', [
            'model' => $model,
            'people' => $people,
            'referenceDiagnosis' => $referenceDiagnosis,
            'reference' => $reference
        ]);

    }


    public function actionDiagnosisUpdate($diagnosis_id)
    {
        $model = ReferenceDiagnosis::findOne($diagnosis_id);

        if ($model->load(\Yii::$app->request->post())) {

            if ($model->save()) {
                return $this->redirect(['reference/index']);
            }
        }


        return $this->render('diagnosis-update', [
            'model' => $model,
        ]);

    }

    public function actionPdf($id)
    {

        $reference = Reference::findOne($id);
//        print_r($reference->people->id);die();
        $content = $this->renderPartial('pdf', ['reference' => $reference]);
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
