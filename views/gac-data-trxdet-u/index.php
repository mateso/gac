<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\GacGlobPeriodU;
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
                    'class' => 'btn btn-default',
                    'value' => Url::to('index.php?r=gac-data-trxdet-u/approve-records')
                ])
            ],
            '{toggleData}',
            '{export}',
        ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            // 'ID',
            // 'TransCtrlNum',
            // 'EntityCode',
            // 'BookID',
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
            // 'ClassificationCode',
            [
                'attribute' => 'FiscalYear',
                'label' => 'Fiscal Year',
                'width' => '10%',
                'value' => function ($model) {
                    return $model->fiscalYear->getFiscalYearDesc($model->FiscalYear);
                },
                'filter' => Html::activeDropDownList(
                        $searchModel, 'FiscalYear', ArrayHelper::map(GacGlobPeriodU::find()->orderBy('ID')->asArray()->all(), 'ID', 'fiscal_year'), ['class' => 'form-control', 'prompt' => Yii::t('app', 'ALL')]
                )
            ],
            // 'NoteNo',
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
                'attribute' => 'Actual',
                'width' => '10%',
                'hAlign' => 'right',
                'format' => ['decimal', 2],
                'pageSummary' => TRUE,
            ],
            // 'EntryDate',
            // 'EntryUser',
            // 'ApprovedFlag',
            // 'ApprovedDate',
            // 'ApprovalUser',
            // 'PostedFlag',
            // 'PostedUser',
            // 'ClosedFlag',
            ['class' => 'kartik\grid\ActionColumn'],
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
            'showFooter' => false
        ],
    ]);
    ?>
</div>
