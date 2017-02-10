<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GacDataStatisticSummaryVSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gac-data-statistic-summary-v-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Total_Entity') ?>

    <?= $form->field($model, 'Entity_Entered') ?>

    <?= $form->field($model, 'Entity_Approved') ?>

    <?= $form->field($model, 'Entity_Balance') ?>

    <?= $form->field($model, 'Entity_Posted') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
