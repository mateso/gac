<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GacNoteItemrangesUSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gac-note-itemranges-u-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'ItemCode') ?>

    <?= $form->field($model, 'ViewableMask') ?>

    <?= $form->field($model, 'NonViewableMask') ?>

    <?= $form->field($model, 'NoteNo') ?>

    <?php // echo $form->field($model, 'ItemStart') ?>

    <?php // echo $form->field($model, 'ItemEnd') ?>

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
