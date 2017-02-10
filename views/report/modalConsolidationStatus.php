<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\GacDataTrxdetU;

/* @var $this yii\web\View */
/* @var $model app\models\GacDataTrxdetU */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gac-data-trxdet-u-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'status')->dropDownList(
            ['All' => 'All', 'Posted' => 'Posted', 'Unposted' => 'Unposted'], [
        'prompt' => 'Select Status',
    ]);
    ?> 

    <?=
    $form->field($model, 'curr_fiscal_year')->dropDownList(
            ArrayHelper::map(GacDataTrxdetU::find()->select('FiscalYear')->distinct()->all(), 'FiscalYear', 'FiscalYear'), [
        'prompt' => 'Select Fiscal Year',
    ]);
    ?> 

    <div class="form-group">
        <?= Html::submitButton('View Report', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>                       

