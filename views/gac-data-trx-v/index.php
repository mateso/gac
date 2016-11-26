<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use app\models\GacGlobPeriodU;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GacDataTrxVSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consolidations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-data-trx-v-index">

    <?=
    GridView::widget([
        'id' => 'gridConsolidation',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
            ],
            [
                'attribute' => 'FiscalYear',
                'label' => 'Fiscal Year',
                'width' => '10%',
                'value' => function ($model) {
                    return GacGlobPeriodU::getFiscalYearDesc($model->FiscalYear);
                },
                'filter' => Html::activeDropDownList(
                        $searchModel, 'FiscalYear', ArrayHelper::map(GacGlobPeriodU::find()->orderBy('ID')->asArray()->all(), 'ID', 'fiscal_year'), ['class' => 'form-control', 'prompt' => Yii::t('app', 'ALL')]
                )
            ],
            [
                'attribute' => 'InstitutionalCode',
                'width' => '10%',
            ],
//            [
//                'attribute' => 'EntityCode',
//                'width' => '10%',
//            ],
            [
                'attribute' => 'EntityDescription',
                'width' => '44%',
            ],
            [
                'attribute' => 'NumTransaction',
                'width' => '10%',
            ],
            [
                'class' => 'kartik\grid\BooleanColumn',
                'attribute' => 'ApprovedFlag',
                'width' => '10%',
            ],
            // 'ApprovedDate',
            // 'PostedFlag',
            // 'DatePosted',
            // 'ClosedFlag',
            [
                'class' => 'kartik\grid\CheckboxColumn',
                'width' => '5%',
                'headerOptions' => ['class' => 'kartik-sheet-style'],
            ],
        ],
        'responsive' => true,
        'hover' => true,
        'condensed' => true,
        'floatHeader' => true,
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> ' . Html::encode($this->title) . ' </h3>',
            'type' => GridView::TYPE_INFO,
            'after' => Html::button('<i class="glyphicon glyphicon-thumbs-up"></i> Post Records', ['type' => 'button', 'title' => 'Post Records', 'class' => 'btn btn-success', 'id' => 'btnPostRecords']),
            'showFooter' => TRUE,
        ],
    ]);
    ?>

    <?php
    $this->registerJs(
            "$('#btnPostRecords').click(function() {
                
var keys = $('#gridConsolidation').yiiGridView('getSelectedRows');
$.post({
   url: 'index.php?r=gac-data-trxdet-u/post-records', // your controller action
   dataType: 'json',
   data: {keylist: keys},
   success: function(data) {
      alert('I did it! Processed checked rows.')
   },
});

});
    "
    );
    ?>
</div>
