<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GacGfsChapterU */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gac-gfs-chapter-u-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ChapterCode')->textInput() ?>

    <?= $form->field($model, 'ChapterDescription')->textInput() ?>

    <?= $form->field($model, 'ClassificationFlag')->textInput() ?>

    <?= $form->field($model, 'Standard')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
