<?php

namespace app\controllers;

use Yii;
use app\models\GacGfsSubchapterU;
use app\models\GacGfsSubchapterUSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\GacGfsListV;

/**
 * GacGfsSubchapterUController implements the CRUD actions for GacGfsSubchapterU model.
 */
class GacGfsSubchapterUController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
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
     * Lists all GacGfsSubchapterU models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new GacGfsSubchapterUSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GacGfsSubchapterU model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new GacGfsSubchapterU model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new GacGfsSubchapterU();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing GacGfsSubchapterU model.
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
     * Deletes an existing GacGfsSubchapterU model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GacGfsSubchapterU model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GacGfsSubchapterU the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = GacGfsSubchapterU::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionLoadGfsItems($id) {
        $subChapterCode = GacGfsSubchapterU::getSubChapterCodeBySubChapterId($id);
        $chapterCode = GacGfsSubchapterU::getChapterCodeBySubChapterId($id);
        $countGFSItems = GacGfsListV::find()
                ->select(['ItemCode', 'ItemShortDescription'])
                ->distinct()
                ->where(['ChapterCode' => $chapterCode, 'SubChapterCode' => $subChapterCode])
                ->count();

        $gfsItems = GacGfsListV::find()
                ->select(['ItemCode', 'ItemShortDescription'])
                ->distinct()
                ->where(['ChapterCode' => $chapterCode, 'SubChapterCode' => $subChapterCode])
                ->orderBy(['ItemShortDescription' => SORT_ASC])
                ->all();

        if ($countGFSItems > 0) {
            echo "<option>Select GFS Item</option>";
            foreach ($gfsItems as $gfsItem) {
                echo "<option value='" . $gfsItem->ItemCode . "'>" . $gfsItem->ItemShortDescription . "</option>";
            }
        } else {
            echo "<option>No GFS Item</option>";
        }
    }

    public function actionGetChapterCodeBySubChapterId($id) {
        return GacGfsSubchapterU::getChapterCodeBySubChapterId($id);
    }

    public function actionGetSubChapterDefinitionBySubChapterId($id) {
        return GacGfsSubchapterU::getSubChapterDefinitionBySubChapterId($id);
    }

}
