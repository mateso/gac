<?php

namespace app\controllers;

use Yii;
use app\models\GacGfsItemsU;
use app\models\GacGfsItemsUSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use \app\models\GacGfsSubchapterU;
use app\models\GacGfsListV;

/**
 * GacGfsItemsUController implements the CRUD actions for GacGfsItemsU model.
 */
class GacGfsItemsUController extends Controller {

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
     * Lists all GacGfsItemsU models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new GacGfsItemsUSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GacGfsItemsU model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new GacGfsItemsU model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new GacGfsItemsU();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing GacGfsItemsU model.
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
     * Deletes an existing GacGfsItemsU model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GacGfsItemsU model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GacGfsItemsU the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = GacGfsItemsU::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionLoadGfsListsByItemCode($id, $scc) {
        $subChapterCode = GacGfsSubchapterU::getSubChapterCodeBySubChapterId($scc);
        $chapterCode = GacGfsSubchapterU::getChapterCodeBySubChapterId($scc);
        $countGFSLists = GacGfsListV::find()
                ->where(['ItemCode' => $id, 'SubChapterCode' => $subChapterCode, 'ChapterCode' => $chapterCode])
                ->count();

        $gfsLists = GacGfsListV::find()
                ->where(['ItemCode' => $id, 'SubChapterCode' => $subChapterCode, 'ChapterCode' => $chapterCode])
                ->orderBy(['ItemDescription' => SORT_ASC])
                ->all();
        if ($countGFSLists > 0) {
            echo "<option></option>";
            foreach ($gfsLists as $gfsList) {
                echo "<option value='" . $gfsList->GFSMCode . "'>" . $gfsList->ItemDescription . "</option>";
            }
        } else {
            echo "<option>Select GFS Code</option>";
        }
    }

    public function actionLoadGfsListsByClassificationCode($id, $subChapterCode, $chapterCode) {
        $countGFSLists = GacGfsListV::find()
                ->where(['ClassificationCode' => $id, 'subChapterCode' => $subChapterCode, 'ChapterCode' => $chapterCode])
                ->count();

        $gfsLists = GacGfsListV::find()
                ->where(['ClassificationCode' => $id, 'subChapterCode' => $subChapterCode, 'ChapterCode' => $chapterCode])
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

    public function actionGetItemDefinitionByGfsItemCode($id) {
        return GacGfsListV::getItemDefinitionByGfsItemCode($id);
    }

}
