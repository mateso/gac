<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GacGlobPeriodUSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gac-glob-period-u-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'period_type') ?>

    <?= $form->field($model, 'fiscal_year') ?>

    <?= $form->field($model, 'period_description') ?>

    <?= $form->field($model, 'period_start_date') ?>

    <?php // echo $form->field($model, 'period_end_date') ?>

    <?php // echo $form->field($model, 'initialized_flag') ?>

    <?php // echo $form->field($model, 'closed_flag') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
