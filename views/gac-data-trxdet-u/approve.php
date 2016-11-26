<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\GacGlobPeriodU;

/* @var $this yii\web\View */
/* @var $model app\models\GacDataTrxdetU */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gac-data-trxdet-u-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'FiscalYear')->dropDownList(
            ArrayHelper::map(GacGlobPeriodU::find()->all(), 'ID', 'fiscal_year'), [
        'prompt' => 'Select Fiscal Year',
    ]);
    ?>                                               

    <div class="form-group">
        <?= Html::submitButton('Approve Records', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>                       

