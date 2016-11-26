<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GacDataTrxdetUSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gac-data-trxdet-u-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'TransCtrlNum') ?>

    <?= $form->field($model, 'EntityCode') ?>

    <?= $form->field($model, 'BookID') ?>

    <?= $form->field($model, 'GFSCode') ?>

    <?php // echo $form->field($model, 'ClassificationCode') ?>

    <?php // echo $form->field($model, 'FiscalYear') ?>

    <?php // echo $form->field($model, 'NoteNo') ?>

    <?php // echo $form->field($model, 'ApprovedBudget') ?>

    <?php // echo $form->field($model, 'Reallocation') ?>

    <?php // echo $form->field($model, 'Actual') ?>

    <?php // echo $form->field($model, 'EntryDate') ?>

    <?php // echo $form->field($model, 'EntryUser') ?>

    <?php // echo $form->field($model, 'ApprovedFlag') ?>

    <?php // echo $form->field($model, 'ApprovedDate') ?>

    <?php // echo $form->field($model, 'ApprovalUser') ?>

    <?php // echo $form->field($model, 'PostedFlag') ?>

    <?php // echo $form->field($model, 'PostedUser') ?>

    <?php // echo $form->field($model, 'ClosedFlag') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
