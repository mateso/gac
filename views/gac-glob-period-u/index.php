<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GacGlobPeriodUSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Global Periods';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-glob-period-u-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'ID',
            [
                'attribute' => 'period_type',
                'width' => '13%',
            ],
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
            // 'initialized_flag',
            // 'closed_flag',
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
                    'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add Period', ['create'], ['class' => 'btn btn-success']), 'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index'], ['class' => 'btn btn-info']),
                    'showFooter' => false
                ],
            ]);
            ?>
</div>
