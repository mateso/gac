<?php

namespace app\controllers;

use Yii;
use app\models\GacEntitySubSectorU;
use app\models\GacEntitySubSectorUSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\GacEntityListV;

/**
 * GacEntitySubSectorUController implements the CRUD actions for GacEntitySubSectorU model.
 */
class GacEntitySubSectorUController extends Controller {

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
     * Lists all GacEntitySubSectorU models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new GacEntitySubSectorUSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GacEntitySubSectorU model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new GacEntitySubSectorU model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new GacEntitySubSectorU();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->SubSectorID]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing GacEntitySubSectorU model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->SubSectorID]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing GacEntitySubSectorU model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GacEntitySubSectorU model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GacEntitySubSectorU the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = GacEntitySubSectorU::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionGetEntitySectorIdByEntitySubSectorId($id) {
        return GacEntitySubSectorU::getEntitySectorIdByEntitySubSectorId($id);
    }

    public function actionLoadEntityListItems($id, $sid) {
        $countEntityListItems = GacEntityListV::find()
                ->where(['SubSectorID' => $id, 'SectorID' => $sid])
                ->count();

        $entityListItems = GacEntityListV::find()
                ->where(['SubSectorID' => $id, 'SectorID' => $sid])
                ->orderBy(['EntityDescription' => SORT_ASC])
                ->all();

        if ($countEntityListItems > 0) {
            echo "<option></option>";
            foreach ($entityListItems as $entityListItem) {
                echo "<option value='" . $entityListItem->InstitutionalCode . "'>" . $entityListItem->EntityDescription . "</option>";
            }
        } else {
            echo "<option></option>";
        }
    }

}
