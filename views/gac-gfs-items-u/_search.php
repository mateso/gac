<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GacGfsItemsUSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gac-gfs-items-u-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'ItemCode') ?>

    <?= $form->field($model, 'ItemShortDescription') ?>

    <?= $form->field($model, 'ItemDefinition') ?>

    <?= $form->field($model, 'SubChapterCode') ?>

    <?php // echo $form->field($model, 'ChapterCode') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
