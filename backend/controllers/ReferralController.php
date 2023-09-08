<?php

namespace backend\controllers;

use common\models\Referral;
use common\models\Room;
use common\models\RoomPeople;
use common\models\search\ReferralSearch;
use Da\QrCode\QrCode;
use kartik\mpdf\Pdf;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\FormatConverter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * ReferralController implements the CRUD actions for Referral model.
 */
class ReferralController extends Controller
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
     * Lists all Referral models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ReferralSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $referral = new Referral();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'referral' => $referral,
        ]);
    }

    /**
     * Displays a single Referral model.
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
     * Creates a new Referral model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return string|\yii\web\Response
     */
    public function actionCreate($people_id)
    {
        $model = new Referral(['people_id' => $people_id]);
        if ($model->load(Yii::$app->request->post())) {
            $model->status = Referral::STATUS_PENDING;
            if ($model->save()) {
                return $this->redirect(['/user/profile']);
            }
        }
        return $this->render('create', [
            'model' => $model
        ]);
    }

    /**
     * Updates an existing Referral model.
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

        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->request->post('update') === null) {
                $model->status = Referral::STATUS_PENDING;
            }
            if ($model->save()) {
                return $this->redirect(['user/profile', 'tab' => 'third']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Referral model.
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
     * Finds the Referral model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id ID
     *
     * @return Referral the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Referral::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * @return \yii\web\Response
     */
    public function actionCancel()
    {
        $requestParams = Yii::$app->request->post();

        if ($requestParams['id']) {

            $referral = Referral::findOne($requestParams['id']);
            if (!$referral) {
                throw new NotFoundHttpException();
            }
            $referral->reason = $requestParams['reason'];
            $referral->status = Referral::STATUS_CANCELLED;
            $referral->save();
            return $this->redirect(Yii::$app->request->referrer);
        }
        return $this->redirect(['index']);

    }


    public function actionAccept($id)
    {
        $referral = Referral::findOne($id);
        if (!$referral) {
            throw new NotFoundHttpException();
        }
        $referral->updateAttributes(['status' => Referral::STATUS_ACCEPTED]);

        return $this->redirect(['index']);
    }


    public function actionPdf($id)
    {
        $model = Referral::findOne($id);
        $content = $this->renderPartial('pdf', ['model' => $model]);
        $time = date('d.m.Y H:i');


        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
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
            'options' => ['title' => 'Yollanma'],
            // call mPDF methods on the fly
            'methods' => [
//                'SetHeader' => ['Ttb'],
                'SetFooter' => ["$time"],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }


    public function actionData($id)
    {
        $referral = Referral::findOne($id);
        return $this->render('data', ['model' => $referral]);
    }


    public
    function actionRoomPeople($id)
    {
        $referral = Referral::findOne($id);
        $referral->updateAttributes(['status' => Referral::STATUS_LOCATION]);

        $sql = "select room.id, count(rp.room_id) as count
    from room
             left join room_people rp on room.id = rp.room_id and rp.status = 1
             where room.section_id = $referral->section_id
    group by room.id
    having count(rp.room_id) < room.bed_count";

        $row = Yii::$app->db->createCommand($sql);
        $model = $row->queryOne();
        if ($model) {
            $roomPeople = RoomPeople::find()->andWhere(['referral_id' => $referral->id])->one();
            if ($roomPeople) {
                return $this->redirect(Yii::$app->request->referrer);
            }
            $newModel = new RoomPeople([
                'referral_id' => $id,
                'room_id' => $model['id'],
                'people_id' => $referral->people_id,
                'status' => RoomPeople::STATUS_START,
                'created_at' => strtotime(date('d.m.Y 08:00', strtotime('+ 1 day'))),
                'leave_date' => strtotime(date('d.m.Y 17:00', strtotime("+ $referral->day_count day"))),
            ]);

            if ($newModel->save()) {
                return $this->redirect(Yii::$app->request->referrer);
            }
            return $this->redirect(Yii::$app->request->referrer);
        }

        $room = Room::find()->leftJoin('room_people rp', 'room.id=rp.room_id')
            ->andWhere(['section_id' => $referral->section_id])
            ->andWhere(['>', 'leave_date', time()])
            ->orderBy(['leave_date' => SORT_ASC])->one();

        if (!$room) {
            return $this->redirect(Yii::$app->request->referrer);
        }

        $leaveDate = RoomPeople::find()->andWhere(['room_id' => $room->id])
            ->andWhere(['>', 'leave_date', time()])
            ->orderBy(['leave_date' => SORT_ASC])->one();

        $enetered_date = strtotime(date('d.m.Y 08:00', ($leaveDate->leave_date + strtotime("+1 day"))));
        $model = new RoomPeople([
            'referral_id' => $id,
            'room_id' => $room->id,
            'people_id' => $referral->people_id,
            'status' => RoomPeople::STATUS_START,
            'created_at' => $enetered_date + strtotime("+ $referral->bed_count"),
            'leave_date' => strtotime(date('d.m.Y 08:00', ($leaveDate->leave_date + strtotime("+1 day")))),
        ]);

        if ($model->save()) {
            return $this->redirect(Yii::$app->request->referrer);
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionExit($id)
    {
        $roomPeople = RoomPeople::findOne(['referral_id' => $id]);
        $roomPeople->updateAttributes(['status' => RoomPeople::STATUS_LEAVED]);
        Referral::updateAll(['status' => Referral::STATUS_EXIT], ['id' => $id]);

        return $this->redirect(Yii::$app->request->referrer);
    }

}
