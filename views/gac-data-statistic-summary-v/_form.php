<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GacDataStatisticSummaryV */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gac-data-statistic-summary-v-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Total_Entity')->textInput() ?>

    <?= $form->field($model, 'Entity_Entered')->textInput() ?>

    <?= $form->field($model, 'Entity_Approved')->textInput() ?>

    <?= $form->field($model, 'Entity_Balance')->textInput() ?>

    <?= $form->field($model, 'Entity_Posted')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
