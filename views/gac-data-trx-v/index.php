<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use app\models\GacGlobPeriodU;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GacDataTrxVSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consolidations';
$this->params['breadcrumbs'][] = $this->title;

Modal::begin([
    'header' => '<h4>Perform Action</h4>',
    'id' => 'modalActions',
    'size' => 'modal-md'
]);
Modal::end();
?>
<div class="gac-data-trx-v-index">

    <?=
    GridView::widget([
        'id' => 'gridConsolidation',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showPageSummary' => TRUE,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            [
                'attribute' => 'FiscalYear',
                'label' => 'Fiscal Year',
                'width' => '10%',
                'filter' => Html::activeDropDownList(
                        $searchModel, 'FiscalYear', ArrayHelper::map(GacGlobPeriodU::find()->orderBy('ID')->asArray()->all(), 'fiscal_year', 'fiscal_year'), ['class' => 'form-control', 'prompt' => Yii::t('app', 'ALL')]
                )
            ],
            [
                'attribute' => 'InstitutionalCode',
                'width' => '10%',
                'pageSummary' => 'Total',
            ],
            [
                'attribute' => 'EntityDescription',
                'width' => '40%',
            ],
            [
                'attribute' => 'ActualDr',
                'width' => '10%',
                'format' => ['decimal', 2],
                'pageSummary' => TRUE,
            ],
            [
                'attribute' => 'ActualCr',
                'width' => '10%',
                'format' => ['decimal', 2],
                'pageSummary' => TRUE,
            ],
            [
                'attribute' => 'NumTransaction',
                'label' => 'Trans #',
                'width' => '8%',
            ],
            [
                'attribute' => 'ApprovedFlag',
                'label' => 'Approval',
                'width' => '4%',
                'class' => 'kartik\grid\BooleanColumn',
            ],
            [
                'attribute' => 'PostedFlag',
                'label' => 'Post Status',
                'width' => '4%',
                'class' => 'kartik\grid\BooleanColumn',
            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{action}',
                'buttons' => [
                    'action' => function ($url, $model, $key) {
                        return $model->ApprovedFlag === 1 ?
                                Html::a('Action', '#', [
                                    'class' => 'btnActions btn btn-success',
                                    'title' => Yii::t('yii', 'Actions'),
//                                    'data-toggle' => 'modal',
//                                    'data-target' => '#modalExtendContract',
//                                    'data-id' => $key,
//                                    'data-pjax' => '0',
                                        ]
                                ) :
//                                Html::a('Action', '#', [
//                                    'class' => 'btnActions btn btn-success',
//                                    'title' => Yii::t('yii', 'Actions'),
//                                    'disabled' => TRUE,
//                                    'onclick' => FALSE,
//                                        //'data-toggle' => 'modal',
//                                        //'data-target' => '#modalExtendContract',
//                                        //'data-id' => $key,
//                                        //'data-pjax' => '0',
//                                        ]
//                                );
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
                    'type' => GridView::TYPE_INFO,                    
                    'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index'], ['class' => 'btn btn-info']),
                    'showFooter' => FALSE,
                ],
            ]);
            ?>


            <?=
            GridView::widget([
                'dataProvider' => $dataProviderStatisticSummary,
                'filterModel' => $searchModelStatisticSummary,
                'columns' => [
                    ['class' => 'kartik\grid\SerialColumn'],
                    [
                        'attribute' => 'Total_Entity',
                    ],
                    [
                        'attribute' => 'Entity_Entered',
                    ],
                    [
                        'attribute' => 'Entity_Approved',
                    ],
                    [
			'label' => 'Entity Balanced',
                        'attribute' => 'Entity_Balance',
                    ],
                    [
                        'attribute' => 'Entity_Posted',
                    ],
                    [
			'label' => 'Entity Consolidated',
                        'attribute' => 'Entity_Posted',
                    ],
                ],
                'responsive' => true,
                'hover' => true,
                'condensed' => true,
                'floatHeader' => true,
                'panel' => [
                    'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> Data Statistic Summary </h3>',
                    'type' => GridView::TYPE_INFO,
                    'showFooter' => FALSE,
                ],
            ]);
            ?>

            <?php
            //        JS Handler for btnActions click
            $this->registerJs(
                    "$('.btnActions').click(function() {
    $.get(
        'index.php?r=gac-data-trx-v/consolidation-actions',  
        {
            id: $(this).closest('tr').data('key')
        },
        function (data) {
            $('.modal-body').html(data);
            $('#modalActions').modal();
        }  
    );
});"
            );
            ?>

</div>
