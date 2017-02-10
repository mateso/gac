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
    $form->field($model, 'fiscal_year')->dropDownList(
            ArrayHelper::map(GacGlobPeriodU::find()->where(['closed_flag' => 1])->all(), 'fiscal_year', 'fiscal_year'), [
        'prompt' => 'Select Fiscal Year',
    ]);
    ?>                                               

    <div class="form-group">
        <?= Html::submitButton('Close Year', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>                       

