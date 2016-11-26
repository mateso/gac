<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\GacGfsChapterU;
use app\models\GacGfsSubChapterU;
use app\models\GacGfsItemsU;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GacGfsListUSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'GFS List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-gfs-list-u-index">

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'ID',
            [
                'attribute' => 'Chapter',
                'width' => '10%',
                'value' => function ($model) {
                    return GacGfsChapterU::getChapterDescByChapterCode($model->Chapter);
                },
                'filter' => Html::activeDropDownList(
                        $searchModel, 'Chapter', ArrayHelper::map(GacGfsChapterU::find()->all(), 'ChapterCode', 'ChapterDescription'), ['class' => 'form-control', 'prompt' => Yii::t('app', 'ALL')]
                )
            ],
            [
                'attribute' => 'SubChapter',
                'width' => '15%',
                'value' => function ($model) {
                    return GacGfsSubChapterU::getSubChapterDescBySubChapterCode($model->SubChapter, $model->Chapter);
                },
                'filter' => Html::activeDropDownList(
                        $searchModel, 'SubChapter', ArrayHelper::map(GacGfsSubChapterU::find()->all(), 'SubChapterCode', 'SubChapterDescription'), ['class' => 'form-control', 'prompt' => Yii::t('app', 'ALL')]
                )
            ],
            [
                'attribute' => 'Item',
                'width' => '35%',
                'value' => function ($model) {
                    return GacGfsItemsU::getItemDescByItemCode($model->Item, $model->SubChapter, $model->Chapter);
                },
                'filter' => Html::activeDropDownList(
                        $searchModel, 'Item', ArrayHelper::map(GacGfsItemsU::find()->all(), 'ItemCode', 'ItemShortDescription'), ['class' => 'form-control', 'prompt' => Yii::t('app', 'ALL')]
                )
            ],
            // 'SubItem',
            [
                'attribute' => 'ItemDescription',
                'width' => '30%',
            ],
            // 'GFSTransaction',
            // 'GFSHoldingGain',
            // 'GFSVolume',
            // 'GFSStock',
            // 'ActiveFlag',
            // 'DateCreated',
            // 'UserCreated',
            // 'DateModified',
            // 'UserModified',
            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Yii::$app->urlManager->createUrl(['gac-gfs-list-u/view', 'id' => $model->ID, 'edit' => 't']), [
                                    'title' => Yii::t('yii', 'Edit'),
                        ]);
                    },
                        ],
                    ],
                ],
                'responsive' => true,
                'hover' => true,
                'condensed' => true,
                'floatHeader' => true,
                'panel' => [
                    'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> ' . Html::encode($this->title) . ' </h3>',
                    'type' => 'info',
                    'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add GFS List', ['create'], ['class' => 'btn btn-success']), 'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index'], ['class' => 'btn btn-info']),
                    'showFooter' => false
                ],
            ]);
            ?>
</div>
