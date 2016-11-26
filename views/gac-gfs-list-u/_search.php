<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GacGfsListUSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gac-gfs-list-u-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'Chapter') ?>

    <?= $form->field($model, 'SubChapter') ?>

    <?= $form->field($model, 'Item') ?>

    <?= $form->field($model, 'SubItem') ?>

    <?php // echo $form->field($model, 'ItemDescription') ?>

    <?php // echo $form->field($model, 'GFSTransaction') ?>

    <?php // echo $form->field($model, 'GFSHoldingGain') ?>

    <?php // echo $form->field($model, 'GFSVolume') ?>

    <?php // echo $form->field($model, 'GFSStock') ?>

    <?php // echo $form->field($model, 'ActiveFlag') ?>

    <?php // echo $form->field($model, 'DateCreated') ?>

    <?php // echo $form->field($model, 'UserCreated') ?>

    <?php // echo $form->field($model, 'DateModified') ?>

    <?php // echo $form->field($model, 'UserModified') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
