<?php

namespace app\controllers;

use Yii;
use app\models\GacGlobPeriodU;
use app\models\GacGlobPeriodUSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\GacDataTrxdetU;

/**
 * GacGlobPeriodUController implements the CRUD actions for GacGlobPeriodU model.
 */
class GacGlobPeriodUController extends Controller {

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
     * Lists all GacGlobPeriodU models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new GacGlobPeriodUSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GacGlobPeriodU model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('view', [
                        'model' => $this->findModel($id),
                            ]
            );
        }
    }

    /**
     * Creates a new GacGlobPeriodU model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new GacGlobPeriodU(['closed_flag' => 1]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing GacGlobPeriodU model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing GacGlobPeriodU model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $model->closed_flag = 0;
        $model->save();
        return $this->redirect(['index']);
    }

    /**
     * Finds the GacGlobPeriodU model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GacGlobPeriodU the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = GacGlobPeriodU::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionGetPeriodDefinitionByPeriodId($id) {
        return GacGlobPeriodU::getPeriodDefinitionByPeriodId($id);
    }

    public function actionCloseYear() {
        $model = new GacGlobPeriodU();

        if ($model->load(Yii::$app->request->post())) {
            $modelFY = GacGlobPeriodU::findOne(['fiscal_year' => $model->fiscal_year]);
            $modelFY->closed_flag = 0;
            $modelFY->save();

            GacDataTrxdetU::updateAll([
                'ClosedFlag' => 0], [
                'FiscalYear' => $model->fiscal_year
            ]);

            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('modalCloseYear', [
                        'model' => $model,
            ]);
        }
    }

}
