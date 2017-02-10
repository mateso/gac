<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GacGfsChapterUSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gac-gfs-chapter-u-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ChapterCode') ?>

    <?= $form->field($model, 'ChapterDescription') ?>

    <?= $form->field($model, 'ClassificationFlag') ?>

    <?= $form->field($model, 'Standard') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
