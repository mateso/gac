<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\GacEntitySubsectorU;

/* @var $this yii\web\View */
/* @var $model app\models\GacEntitySubsectorU */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gac-data-trxdet-u-form">

    <?php $form = ActiveForm::begin(); ?>         

    <?=
    $form->field($model, 'sub_sector_description')->dropDownList(
            ArrayHelper::map(GacEntitySubsectorU::find()->all(), 'SubSectorDescription', 'SubSectorDescription'), [
        'prompt' => 'Select Sub Sector',
    ]);
    ?> 

    <div class="form-group">
        <?= Html::submitButton('View Report', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>                       

