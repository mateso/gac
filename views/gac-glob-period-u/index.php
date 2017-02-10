<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GacGlobPeriodUSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Global Periods';
$this->params['breadcrumbs'][] = $this->title;

Modal::begin([
    'header' => '<h4>Close Year</h4>',
    'id' => 'modalCloseYear',
    'size' => 'modal-md'
]);
Modal::end();
?>
<div class="gac-glob-period-u-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'fiscal_year',
                'width' => '13%',
            ],
            [
                'attribute' => 'period_description',
                'width' => '15%',
            ],
            [
                'attribute' => 'period_start_date',
                'width' => '25%',
                'hAlign' => 'left',
            ],
            [
                'attribute' => 'period_end_date',
                'width' => '25%',
                'hAlign' => 'left',
            ],
            [
                'attribute' => 'closed_flag',
                'width' => '13%',
                'hAlign' => 'left',
                'value' => function ($model) {
                    if ($model->closed_flag == 0) {
                        return 'Closed';
                    } else {
                        return 'Open';
                    }
                },
            ],
            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Yii::$app->urlManager->createUrl(['gac-glob-period-u/view', 'id' => $model->ID, 'edit' => 't']), [
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
                    'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add Period', ['create'], ['class' => 'btn btn-success']),
                    'after' => Html::button('<i class="glyphicon glyphicon-lock"></i> Close Year', ['type' => 'button', 'title' => 'Close Year', 'class' => 'btn btn-danger', 'id' => 'btnCloseYear']),
                    'showFooter' => false
                ],
            ]);
            ?>
        </div>

        <?php
//        JS Handler for Financial Statement Report
        $this->registerJs(
                "$('#btnCloseYear').click(function() {
    $.get(
        'index.php?r=gac-glob-period-u/close-year',         
        function (data) {
            $('.modal-body').html(data);
            $('#modalCloseYear').modal();
        }  
    );
});"
        );
        ?>
