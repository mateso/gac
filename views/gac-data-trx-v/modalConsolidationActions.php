<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\GacEntityListU;

/* @var $this yii\web\View */
/* @var $model app\models\GacDataTrxdetU */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gac-data-trxdet-u-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'entity_code')->textInput(
            ['readonly' => TRUE, 'value' => $entity_code]);
    ?>

    <?=
    $form->field($model, 'entity_desc')->textInput(
            ['readonly' => TRUE, 'value' => GacEntityListU::getEntityDesc($entity_code)]);
    ?>

    <?=
    $form->field($model, 'fiscal_year')->textInput(
            ['readonly' => TRUE, 'value' => $fiscal_year]);
    ?>

    <?=
    $form->field($model, 'action_type')->dropDownList(
            ['Disapprove' => 'Disapprove', 'Post' => 'Post', 'Unpost' => 'Unpost'], [
        'prompt' => 'Select Action',
    ]);
    ?> 

    <?=
    $form->field($model, 'remarks')->textarea();
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>                       

