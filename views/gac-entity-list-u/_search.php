<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GacEntityListUSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gac-entity-list-u-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'SectorID') ?>

    <?= $form->field($model, 'SubSectorID') ?>

    <?= $form->field($model, 'InstitutionalCode') ?>

    <?= $form->field($model, 'VoteCode') ?>

    <?php // echo $form->field($model, 'EntityCode') ?>

    <?php // echo $form->field($model, 'EntityDescription') ?>

    <?php // echo $form->field($model, 'TransRelation') ?>

    <?php // echo $form->field($model, 'ActiveFlag') ?>

    <?php // echo $form->field($model, 'DateCreated') ?>

    <?php // echo $form->field($model, 'UserCreated') ?>

    <?php // echo $form->field($model, 'DateModified') ?>

    <?php // echo $form->field($model, 'UserModified') ?>

    <?php // echo $form->field($model, 'ContactPerson') ?>

    <?php // echo $form->field($model, 'ContactNumber') ?>

    <?php // echo $form->field($model, 'Region') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
