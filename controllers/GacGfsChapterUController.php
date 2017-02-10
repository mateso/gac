<?php

namespace app\controllers;

use Yii;
use app\models\GacGfsChapterU;
use app\models\GacGfsChapterUSearch;
use app\models\GacGfsSubChapterU;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GacGfsChapterUController implements the CRUD actions for GacGfsChapterU model.
 */
class GacGfsChapterUController extends Controller {

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
     * Lists all GacGfsChapterU models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new GacGfsChapterUSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GacGfsChapterU model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new GacGfsChapterU model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new GacGfsChapterU();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ChapterCode]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing GacGfsChapterU model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ChapterCode]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing GacGfsChapterU model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GacGfsChapterU model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GacGfsChapterU the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = GacGfsChapterU::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionLoadSubChapterList($id) {
        $count = GacGfsSubChapterU::find()
                ->select(['ID', 'SubChapterDescription'])
                ->where(['ChapterCode' => $id])
                ->count();

        $models = GacGfsSubChapterU::find()
                ->select(['ID', 'SubChapterDescription'])
                ->where(['ChapterCode' => $id])
                ->all();

        if ($count > 0) {
            echo "<option>Select Sub Chapter</option>";
            foreach ($models as $model) {
                echo "<option value='" . $model->ID . "'>" . $model->SubChapterDescription . "</option>";
            }
        } else {
            echo "<option>No Sub Chapter</option>";
        }
    }

}
