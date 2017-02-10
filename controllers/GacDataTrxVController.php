<?php

namespace app\controllers;

use Yii;
use app\models\GacDataTrxV;
use app\models\GacDataTrxVSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\GacDataStatisticSummaryVSearch;
use app\models\GacApprovalStatus;
use app\models\GacDataTrxdetU;
use app\models\ModalConsolidationActions;

/**
 * GacDataTrxVController implements the CRUD actions for GacDataTrxV model.
 */
class GacDataTrxVController extends Controller {

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
     * Lists all GacDataTrxV models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new GacDataTrxVSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $searchModelStatisticSummary = new GacDataStatisticSummaryVSearch();
        $dataProviderStatisticSummary = $searchModelStatisticSummary->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'searchModelStatisticSummary' => $searchModelStatisticSummary,
                    'dataProviderStatisticSummary' => $dataProviderStatisticSummary,
        ]);
    }

    /**
     * Displays a single GacDataTrxV model.
     * @param integer $FiscalYear
     * @param string $InstitutionalCode
     * @return mixed
     */
    public function actionView($FiscalYear, $InstitutionalCode) {
        return $this->render('view', [
                    'model' => $this->findModel($FiscalYear, $InstitutionalCode),
        ]);
    }

    /**
     * Creates a new GacDataTrxV model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new GacDataTrxV();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'FiscalYear' => $model->FiscalYear, 'InstitutionalCode' => $model->InstitutionalCode]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing GacDataTrxV model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $FiscalYear
     * @param string $InstitutionalCode
     * @return mixed
     */
    public function actionUpdate($FiscalYear, $InstitutionalCode) {
        $model = $this->findModel($FiscalYear, $InstitutionalCode);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'FiscalYear' => $model->FiscalYear, 'InstitutionalCode' => $model->InstitutionalCode]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing GacDataTrxV model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $FiscalYear
     * @param string $InstitutionalCode
     * @return mixed
     */
    public function actionDelete($FiscalYear, $InstitutionalCode) {
        $this->findModel($FiscalYear, $InstitutionalCode)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GacDataTrxV model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $FiscalYear
     * @param string $InstitutionalCode
     * @return GacDataTrxV the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($FiscalYear, $InstitutionalCode) {
        if (($model = GacDataTrxV::findOne(['FiscalYear' => $FiscalYear, 'InstitutionalCode' => $InstitutionalCode])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionConsolidationActions(array $id) {
        $model = new ModalConsolidationActions();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->action_type == 'Disapprove') {
                GacDataTrxdetU::updateAll([
                    'ApprovedFlag' => 0, 'ApprovedDate' => Date('Y-m-d h:i:sa'),
                    'ApprovalUser' => Yii::$app->user->identity->id], [
                    'EntityCode' => $model->entity_code,
                    'FiscalYear' => $model->fiscal_year,
                ]);
                
                GacApprovalStatus::updateApprovalStatus($model->fiscal_year, $model->entity_code, "Disapprove");
                
            } elseif ($model->action_type == 'Post') {
                GacDataTrxdetU::updateAll([
                    'PostedFlag' => 1, 'DatePosted' => Date('Y-m-d h:i:sa')], [
                    'EntityCode' => $model->entity_code,
                    'FiscalYear' => $model->fiscal_year,
                ]);
                
                GacApprovalStatus::updateApprovalStatus($model->fiscal_year, $model->entity_code, "Post");
                
            } else {
                GacDataTrxdetU::updateAll([
                    'PostedFlag' => 0, 'DatePosted' => Date('Y-m-d h:i:sa')], [
                    'EntityCode' => $model->entity_code,
                    'FiscalYear' => $model->fiscal_year,
                ]);
                
                GacApprovalStatus::updateApprovalStatus($model->fiscal_year, $model->entity_code, "Unpost");
                
            }
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('modalConsolidationActions', [
                        'model' => $model,
                        'entity_code' => $id['InstitutionalCode'],
                        'fiscal_year' => $id['FiscalYear']
            ]);
        }
    }

}
