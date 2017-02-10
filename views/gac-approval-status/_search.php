<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GacApprovalStatusSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gac-approval-status-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ApprovalStatusId') ?>

    <?= $form->field($model, 'EntityCode') ?>

    <?= $form->field($model, 'FiscalYear') ?>

    <?= $form->field($model, 'ApprovedFlag') ?>

    <?= $form->field($model, 'PostedFlag') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
