<?php

namespace app\controllers;

use Yii;
use app\models\GacEntitySectorU;
use app\models\GacEntitySectorUSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\GacEntitySubsectorU;

/**
 * GacEntitySectorUController implements the CRUD actions for GacEntitySectorU model.
 */
class GacEntitySectorUController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'view', 'update'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all GacEntitySectorU models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new GacEntitySectorUSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GacEntitySectorU model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new GacEntitySectorU model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new GacEntitySectorU();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->SectorID]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing GacEntitySectorU model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->SectorID]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing GacEntitySectorU model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GacEntitySectorU model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GacEntitySectorU the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = GacEntitySectorU::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionLoadEntitySubSectorItems($id) {
        $countSubSectorItems = GacEntitySubsectorU::find()
                ->where(['SectorID' => $id])
                ->count();

        $subSectorItems = GacEntitySubsectorU::find()
                ->where(['SectorID' => $id])
                ->all();

        if ($countSubSectorItems > 0) {
            echo "<option>Select Sub Sector</option>";
            foreach ($subSectorItems as $subSectorItem) {
                echo "<option value='" . $subSectorItem->SubSectorID . "'>" . $subSectorItem->SubSectorDescription . "</option>";
            }
        } else {
            echo "<option>No Sub Sector</option>";
        }
    }

}
