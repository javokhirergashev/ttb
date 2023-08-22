<?php

namespace backend\controllers;

use common\models\Diagnosis;
use common\models\People;
use common\models\Referral;
use common\models\search\PeopleSearch;
use common\models\Section;
use common\models\Territory;
use kartik\mpdf\Pdf;
use Shuchkin\SimpleXLSX;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * PeopleController implements the CRUD actions for People model.
 */
class PeopleController extends Controller
{
    public $enableCsrfValidation = false;

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
     * Lists all People models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PeopleSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $file = UploadedFile::getInstanceByName('excel');
        if ($file) {
            $xlsx = SimpleXLSX::parse($file->tempName);
            if ($xlsx) {
                $rows = $xlsx->rows();
                $transaction = Yii::$app->db->beginTransaction();
                foreach ($rows as $index => $row) {

                    if ($index < 1) {
                        continue;
                    }

                    $people = new People();
                    $people->first_name = $row[0];
                    $people->last_name = $row[1];
                    $people->middle_name = $row[2];
                    $people->pinfl = $row[3] . "";
                    $people->passport_number = $row[4];
                    $people->birthday = strtotime($row[5]);
                    $people->phone_number = $row[6] . "";
                    $people->gender = $row[7];
                    $people->metrka_number = $row[8];
                    $people->region_id = $row[9];
                    $people->district_id = $row[10];
                    $people->quarter_id = $row[11];
                    $people->qvp_id = $row[12];
                    $people->dispensary_control = $row[13] . "";
                    $people->ayol_daftar = $row[14];
                    $people->temir_daftar = $row[15];
                    $people->yoshlar_daftar = $row[16];
                    $people->job = $row[17];
                    $people->height = $row[18] . "";
                    $people->weight = $row[19] . "";
                    $people->blood_pressure = $row[20];
                    $people->saturation = $row[21];
                    $people->pulse = $row[22] . "";
                    $people->head_family = $row[23];

                    if (!$people->save()) {
                        $transaction->rollBack();
                        var_dump($people->errors);
                        die($index);
                    }

                }
                $transaction->commit();
                $this->redirect(['index']);
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single People model.
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
     * Creates a new People model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new People();

        if ($this->request->isPost) {
//            var_dump($model); die();
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
     * Updates an existing People model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param int $id ID
     *
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
     * Deletes an existing People model.
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
     * Finds the People model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id ID
     *
     * @return People the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = People::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionTerritory()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                if (intval($cat_id)) {
                    $out = Territory::getDropDownList($cat_id);
                    return ['output' => $out, 'selected' => ''];
                } else {
                    return intval($cat_id);
                }

            }
        }
        return ['output' => '', 'selected' => ''];
    }


    public function actionHistory($id)
    {

        $file = UploadedFile::getInstanceByName('excel');
        $people = People::findOne($id);
        if ($file) {
            $xlsx = SimpleXLSX::parse($file->tempName);
            $rows = $xlsx->rows();
            echo "<pre>";
            var_dump($rows);
            die();
        }
        $vaccinationQuery = $people->getPeopleVaccination();
        $referralQuery = $people->getReferral();

        $vaccinationProvider = new ActiveDataProvider([
            'query' => $vaccinationQuery
        ]);

        $referralProvider = new ActiveDataProvider([
            'query' => $referralQuery
        ]);

        $query = Diagnosis::find()->andWhere(['people_id' => $id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        return $this->render('history', [
            'vaccinationProvider' => $vaccinationProvider,
            'dataProvider' => $dataProvider,
            'people' => $people,
            'referralProvider' => $referralProvider
        ]);
    }


    public function actionReferral($people_id)
    {
        $model = new Referral(['people_id' => $people_id]);
        if ($model->load(Yii::$app->request->post())) {
            $model->status = Referral::STATUS_PENDING;
            if ($model->save()) {
                return $this->redirect(['/user/profile']);
            }
        }
        return $this->render('referral', [
            'model' => $model
        ]);
    }

    public function actionSection()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                if (intval($cat_id)) {
                    $out = Section::getDropDownList($cat_id);
                    return ['output' => $out, 'selected' => ''];
                } else {
                    return intval($cat_id);
                }

            }
        }
        return ['output' => '', 'selected' => ''];
    }

    public function actionPdf($id)
    {
        $model = People::findOne($id);
        $content = $this->renderPartial('pdf', ['model' => $model]);
        $time = date('d.m.Y H:i');

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            'filename' => $model->first_name . ' ' . $model->last_name . ' ' . $time . '.pdf',
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_DOWNLOAD,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Aholi'],
            // call mPDF methods on the fly
            'methods' => [
                'SetFooter' => ["$time"],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    public function actionPregnant($id)
    {
        $person = People::findOne($id);
        if (!$person) {
            throw new NotFoundHttpException();
        }
        $person->updateAttributes(['pregnant_status' => People::PREGNANT_TRUE]);

        return $this->redirect(['history', 'id'=>$person->id]);

    }

    public function actionImport()
    {

        $this->layout = 'blank';


    }


}
