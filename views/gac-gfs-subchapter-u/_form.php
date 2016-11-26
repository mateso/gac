<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GacGfsSubchapterU */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gac-gfs-subchapter-u-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'SubChapterCode')->textInput() ?>

    <?= $form->field($model, 'SubChapterDescription')->textInput() ?>

    <?= $form->field($model, 'ChapterCode')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
