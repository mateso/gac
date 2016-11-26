<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GacGfsItemsU */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gac-gfs-items-u-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ItemCode')->textInput() ?>

    <?= $form->field($model, 'ItemShortDescription')->textInput() ?>

    <?= $form->field($model, 'ItemDefinition')->textInput() ?>

    <?= $form->field($model, 'SubChapterCode')->textInput() ?>

    <?= $form->field($model, 'ChapterCode')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
