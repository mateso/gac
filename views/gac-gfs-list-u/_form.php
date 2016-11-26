<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GacGfsListU */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gac-gfs-list-u-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Chapter')->textInput() ?>

    <?= $form->field($model, 'SubChapter')->textInput() ?>

    <?= $form->field($model, 'Item')->textInput() ?>

    <?= $form->field($model, 'SubItem')->textInput() ?>

    <?= $form->field($model, 'ItemDescription')->textInput() ?>

    <?= $form->field($model, 'GFSTransaction')->textInput() ?>

    <?= $form->field($model, 'GFSHoldingGain')->textInput() ?>

    <?= $form->field($model, 'GFSVolume')->textInput() ?>

    <?= $form->field($model, 'GFSStock')->textInput() ?>

    <?= $form->field($model, 'ActiveFlag')->textInput() ?>

    <?= $form->field($model, 'DateCreated')->textInput() ?>

    <?= $form->field($model, 'UserCreated')->textInput() ?>

    <?= $form->field($model, 'DateModified')->textInput() ?>

    <?= $form->field($model, 'UserModified')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
