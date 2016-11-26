<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GacDataTrxV */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gac-data-trx-v-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'FiscalYear')->textInput() ?>

    <?= $form->field($model, 'InstitutionalCode')->textInput() ?>

    <?= $form->field($model, 'EntityCode')->textInput() ?>

    <?= $form->field($model, 'EntityDescription')->textInput() ?>

    <?= $form->field($model, 'NumTransaction')->textInput() ?>

    <?= $form->field($model, 'ApprovedFlag')->textInput() ?>

    <?= $form->field($model, 'ApprovedDate')->textInput() ?>

    <?= $form->field($model, 'PostedFlag')->textInput() ?>

    <?= $form->field($model, 'DatePosted')->textInput() ?>

    <?= $form->field($model, 'ClosedFlag')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
