<?php

namespace app\controllers;

use Yii;
use app\models\GacDataTrxV;
use app\models\GacDataTrxVSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GacDataTrxVController implements the CRUD actions for GacDataTrxV model.
 */
class GacDataTrxVController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
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
    public function actionIndex()
    {
        $searchModel = new GacDataTrxVSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GacDataTrxV model.
     * @param integer $FiscalYear
     * @param string $InstitutionalCode
     * @return mixed
     */
    public function actionView($FiscalYear, $InstitutionalCode)
    {
        return $this->render('view', [
            'model' => $this->findModel($FiscalYear, $InstitutionalCode),
        ]);
    }

    /**
     * Creates a new GacDataTrxV model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
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
    public function actionUpdate($FiscalYear, $InstitutionalCode)
    {
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
    public function actionDelete($FiscalYear, $InstitutionalCode)
    {
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
    protected function findModel($FiscalYear, $InstitutionalCode)
    {
        if (($model = GacDataTrxV::findOne(['FiscalYear' => $FiscalYear, 'InstitutionalCode' => $InstitutionalCode])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
