<?php

namespace app\controllers;

use Yii;
use app\models\GacDataTrxdetU;
use app\models\GacDataTrxdetUSearch;
use app\models\GacGfsSubchapterU;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Json;

/**
 * GacDataTrxdetUController implements the CRUD actions for GacDataTrxdetU model.
 */
class GacDataTrxdetUController extends Controller {

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
     * Lists all GacDataTrxdetU models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new GacDataTrxdetUSearch();
        $entity_code = Yii::$app->user->identity->institutional_code;
        $condition = "EntityCode = " . "'$entity_code'" . " AND IsVoided = " . "'FALSE'";
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $condition);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GacDataTrxdetU model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new GacDataTrxdetU model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new GacDataTrxdetU(['scenario' => 'create']);

        if ($model->load(Yii::$app->request->post())) {
            $chapterCode = GacGfsSubchapterU::getChapterCodeBySubChapterId($model->SubchapterId);
//            if ($chapterCode == 1) {
//                $model->ClassificationCode = 1;
//                $model->ActualCr = $model->Actual;
//            } else if ($chapterCode == 3 && $model->ClassificationCode == 3) {
//                $model->ActualDr = (-1 * $model->Actual);
//                $model->EliminationFlag = 0;
//            } else {
//                $model->ActualDr = $model->Actual;
//                $model->EliminationFlag = 0;
//            }

            //Start replacement of above commented section
            if ($chapterCode == 1) {
                $model->ClassificationCode = 1;
                $model->ActualCr = $model->Actual;
            } else {
                $model->ActualDr = $model->Actual;
            }
            //End of of above code block

            $model->TransCtrlNum = GacDataTrxdetU::generateTransCtrlNumber($model->FiscalYear);
            $model->EntityCode = (string) Yii::$app->user->identity->institutional_code;
            $model->EntryDate = Date('Y-m-d h:i:sa');
            $model->EntryUser = (int) Yii::$app->user->identity->id;
            $model->IsVoided = FALSE;
            $model->ClosedFlag = 0;
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing GacDataTrxdetU model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->ID]);
            }
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing GacDataTrxdetU model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $model->IsVoided = TRUE;
        $model->VoidedBy = (int) Yii::$app->user->identity->id;
        $model->VoidedDate = Date('Y-m-d h:i:sa');
        $model->save();
        return $this->redirect(['index']);
    }

    /**
     * Finds the GacDataTrxdetU model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GacDataTrxdetU the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = GacDataTrxdetU::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionApproveRecords() {
        $model = new GacDataTrxdetU();

        if ($model->load(Yii::$app->request->post())) {
            GacDataTrxdetU::updateAll([
                'ApprovedFlag' => 1, 'ApprovedDate' => date('Y-m-d h:i:s'),
                'ApprovalUser' => Yii::$app->user->identity->id], [
                'FiscalYear' => $model->FiscalYear,
                'EntityCode' => Yii::$app->user->identity->institutional_code
            ]);
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('modalApproveRecords', [
                        'model' => $model,
            ]);
        }
    }

    public function actionPostRecords() {
        if (isset($_POST['keylist'])) {
            $keys = Json::decode(\Yii::$app->request->post(['keylist']));
            //$keys = Json::decode($_POST['keylist']);
            // you will have the array of pk ids to process in $keys
            // perform batch action on these keys and return status
            // back to ajax call above   
//            foreach ($keys as $key) {
//                echo $key;
//            }

            if (empty($keys)) {
                echo 'tupu';
            } else {
                echo 'ipo';
            }
        }
    }

}
