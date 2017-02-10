<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\GacDataTrxdetU;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GacDataTrxdetUSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transactions List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-data-trxdet-u-index">
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- Start of Approve Records Modal popup -->
    <?php
    Modal::begin([
        'header' => '<h4>Approve Records<h4>',
        'id' => 'modalApproveRecords',
        'size' => 'modal-md'
    ]);

    echo "<div id='modalApproveRecordsContent'></div>";

    Modal::end();
    ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showPageSummary' => TRUE,
        // set your toolbar
        'toolbar' => [
            ['content' =>
                Html::button('<i class="glyphicon glyphicon-thumbs-up"></i> Approve Records', [
                    'type' => 'button',
                    'id' => 'btnApproveRecords',
                    'title' => 'Approve',
                    'class' => 'btn btn-danger',
                    'value' => Url::to('index.php?r=gac-data-trxdet-u/approve-records')
                ])
            ],
            '{toggleData}',
            '{export}',
        ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            [
                'attribute' => 'GFSCode',
                'width' => '10%',
            ],
            [
                'attribute' => 'GFSCodeDesc',
                'label' => 'GFS Description',
                'value' => function ($model) {
                    return $model::getGFSCodeDesc($model->GFSCode);
                },
                'pageSummary' => 'Total',
            ],
            [
                'attribute' => 'FiscalYear',
                'label' => 'Fiscal Year',
                'width' => '10%',
                'filter' => Html::activeDropDownList(
                        $searchModel, 'FiscalYear', 
                        ArrayHelper::map(GacDataTrxdetU::find()->select('FiscalYear')->distinct()->all(), 'FiscalYear', 'FiscalYear'), ['class' => 'form-control', 'prompt' => Yii::t('app', 'ALL')]
                )
            ],
            [
                'attribute' => 'ApprovedBudget',
                'width' => '10%',
                'hAlign' => 'right',
                'format' => ['decimal', 2],
                'pageSummary' => TRUE,
            ],
            [
                'attribute' => 'Reallocation',
                'label' => 'Reallocation',
                'width' => '10%',
                'hAlign' => 'right',
                'format' => ['decimal', 2],
                'pageSummary' => TRUE,
            ],
            [
                'attribute' => 'ActualDr',
                'width' => '10%',
                'hAlign' => 'right',
                'format' => ['decimal', 2],
                'pageSummary' => TRUE,
            ],
            [
                'attribute' => 'ActualCr',
                'width' => '10%',
                'hAlign' => 'right',
                'format' => ['decimal', 2],
                'pageSummary' => TRUE,
            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return $model->ApprovedFlag != 1 ?
                                Html::a('<span class="glyphicon glyphicon-pencil"></span>', yii::$app->urlManager->createUrl(['gac-data-trxdet-u/update', 'id' => $model->ID]), [
                                        ]
                                ) :
                                '';
                    },
                            'delete' => function ($url, $model, $key) {
                        return $model->ApprovedFlag != 1 ?
                                Html::a('<span class="glyphicon glyphicon-trash"></span>', yii::$app->urlManager->createUrl(['gac-data-trxdet-u/delete', 'id' => $model->ID]), [
                                        ]
                                ) :
                                '';
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
                    'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add Transaction', ['create'], ['class' => 'btn btn-success']),
                    'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index'], ['class' => 'btn btn-info']),
//            'afterOptions' => [
//                'class' => 'pull-right',
//            ],
                    'showFooter' => TRUE,
                ],
            ]);
            ?>
</div>
