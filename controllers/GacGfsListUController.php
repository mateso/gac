<?php

namespace app\controllers;

use Yii;
use app\models\GacGfsListU;
use app\models\GacGfsListV;
use app\models\GacGfsListUSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * GacGfsListUController implements the CRUD actions for GacGfsListU model.
 */
class GacGfsListUController extends Controller {

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
     * Lists all GacGfsListU models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new GacGfsListUSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GacGfsListU model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new GacGfsListU model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new GacGfsListU();

        if ($model->load(Yii::$app->request->post())) {
            $model->SubItem = substr($model->GFSTransaction, -3);
            if($model->save){
             return $this->redirect(['view', 'id' => $model->ID]);   
            }
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing GacGfsListU model.
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
     * Deletes an existing GacGfsListU model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $model->ActiveFlag = 0;
        $model->UserModified = Yii::$app->user->identity->id;
        $model->DateModified = $model->DateModified = Date('Y-m-d h:i:sa');
        $model->save();
        return $this->redirect(['index']);
    }

    /**
     * Finds the GacGfsListU model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GacGfsListU the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = GacGfsListU::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionGetGfsCodeDesc($id) {

        $model = GacGfsListV::findOne($id);
        return $model->GFSMCode;
    }

    public function actionGetItemDefinitionByGfsCode($id) {
        $model = GacGfsListV::find(['ItemDefinition'])->where(['GFSMCode' => $id])->one();
        if ($model) {
            return $model->ItemDefinition;
        } else {
            return 'No definition provided';
        }
    }

}
