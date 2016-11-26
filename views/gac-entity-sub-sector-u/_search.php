<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GacEntitySubSectorUSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gac-entity-sub-sector-u-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'SubSectorID') ?>

    <?= $form->field($model, 'SubSectorDescription') ?>

    <?= $form->field($model, 'SectorID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
