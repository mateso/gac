<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;
use kartik\datecontrol\Module;

/* @var $this yii\web\View */
/* @var $model app\models\GacGlobPeriodU */

$this->title = $model->fiscal_year;
$this->params['breadcrumbs'][] = ['label' => 'Global Periods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-glob-period-u-view">

    <?=
    DetailView::widget([
        'model' => $model,
        'condensed' => false,
        'hover' => true,
        'mode' => Yii::$app->request->get('edit') == 't' ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
        'panel' => [
            'heading' => 'Fiscal Year ' . $this->title,
            'type' => DetailView::TYPE_INFO,
        ],
        'attributes' => [
            // 'ID',
            'period_type',
            'fiscal_year',
            'period_description',
            [
                'attribute' => 'period_start_date',
                'format' => ['date', 'php:d-M-Y'],
                'type' => DetailView::INPUT_WIDGET,
                'widgetOptions' => [
                    'class' => DateControl::classname(),
                    'type' => DateControl::FORMAT_DATE,
                ],
            ],
            [
                'attribute' => 'period_end_date',
                'format' => ['date', 'php:d-M-Y'],
                'type' => DetailView::INPUT_WIDGET,
                'widgetOptions' => [
                    'class' => DateControl::classname(),
                    'type' => DateControl::FORMAT_DATE,
                ],
            ],
            'initialized_flag',
            'closed_flag',
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->ID],
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ],
        'enableEditMode' => true,
    ])
    ?>

</div>
