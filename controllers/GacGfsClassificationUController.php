<?php

namespace app\controllers;

use Yii;
use app\models\GacGfsClassificationU;
use app\models\GacGfsClassificationUSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\GacGfsSubchapterU;
use app\models\GacGfsListV;

/**
 * GacGfsClassificationUController implements the CRUD actions for GacGfsClassificationU model.
 */
class GacGfsClassificationUController extends Controller {

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
     * Lists all GacGfsClassificationU models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new GacGfsClassificationUSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GacGfsClassificationU model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new GacGfsClassificationU model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new GacGfsClassificationU();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ClassificationCode]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing GacGfsClassificationU model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ClassificationCode]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing GacGfsClassificationU model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GacGfsClassificationU model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GacGfsClassificationU the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = GacGfsClassificationU::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionLoadGfsListsByClassificationCode($id, $itemId, $scc) {
        $itemCode = $itemId;
        $subChapterCode = GacGfsSubchapterU::getSubChapterCodeBySubChapterID($scc);
        $chapterCode = GacGfsSubchapterU::getChapterCodeBySubChapterID($scc);
        $countGFSLists = GacGfsListV::find()
                ->where(['ClassificationCode' => $id, 'ItemCode' => $itemCode, 'subChapterCode' => $subChapterCode, 'ChapterCode' => $chapterCode])
                ->count();

        $gfsLists = GacGfsListV::find()
                ->where(['ClassificationCode' => $id, 'ItemCode' => $itemCode, 'subChapterCode' => $subChapterCode, 'ChapterCode' => $chapterCode])
                ->orderBy(['ItemDescription' => SORT_ASC])
                ->all();

        if ($countGFSLists > 0) {
            echo "<option></option>";
            foreach ($gfsLists as $gfsList) {
                echo "<option value='" . $gfsList->GFSMCode . "'>" . $gfsList->ItemDescription . "</option>";
            }
        } else {
            echo "<option></option>";
        }
    }

}
