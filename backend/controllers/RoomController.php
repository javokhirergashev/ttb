<?php

namespace backend\controllers;

use common\models\Clinic;
use common\models\Room;
use common\models\search\RoomSearch;
use common\models\Section;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RoomController implements the CRUD actions for Room model.
 */
class RoomController extends Controller
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
     * Lists all Room models.
     *
     * @return string
     */
    public function actionIndex($section_id, $clinic_id)
    {
        $searchModel = new RoomSearch([
            'section_id' => $section_id,
            'clinic_id' => $clinic_id
        ]);
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'section_id' => $section_id,
            'clinic_id' => $clinic_id
        ]);
    }

    /**
     * Displays a single Room model.
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
     * Creates a new Room model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($section_id, $clinic_id)
    {
        $checked_clinic =  Clinic::findOne($clinic_id);
        $checked_section = Section::findOne($section_id);
        if (!$checked_clinic) {
            throw new NotFoundHttpException("Bunday shifoxona mavjud emas!");
        }
        if (!$checked_section) {
            throw new NotFoundHttpException("Bunday bo\'lim  mavjud emas!");
        }
        $model = new Room();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->clinic_id = $clinic_id;
                $model->section_id = $section_id;
                if ($model->save()) {
                    return $this->redirect(['room/index','clinic_id' => $model->clinic_id, 'section_id'=> $model->section_id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'clinic' => $checked_section
        ]);
    }

    /**
     * Updates an existing Room model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Room model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);//shu yerni tugirlash kerak. indexga qaytganda $clinic_id va section_id parametrlarini berish kerak!!!
    }

    /**
     * Finds the Room model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Room the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Room::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
