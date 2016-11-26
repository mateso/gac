<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GacDataTrxVSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gac-data-trx-v-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'FiscalYear') ?>

    <?= $form->field($model, 'InstitutionalCode') ?>

    <?= $form->field($model, 'EntityCode') ?>

    <?= $form->field($model, 'EntityDescription') ?>

    <?= $form->field($model, 'NumTransaction') ?>

    <?php // echo $form->field($model, 'ApprovedFlag') ?>

    <?php // echo $form->field($model, 'ApprovedDate') ?>

    <?php // echo $form->field($model, 'PostedFlag') ?>

    <?php // echo $form->field($model, 'DatePosted') ?>

    <?php // echo $form->field($model, 'ClosedFlag') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
