<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\GacDataTrxdetU;
use app\models\GacApprovalStatus;

/* @var $this yii\web\View */
/* @var $model app\models\GacDataTrxdetU */
/* @var $form yii\widgets\ActiveForm */

$approvedYearModel = GacApprovalStatus::find()->where(['ApprovedFlag' => 1, 'EntityCode' => Yii::$app->user->identity->institutional_code])->all();
$sql = 'SELECT fiscal_year FROM gac_glob_period_u WHERE fiscal_year NOT IN(SELECT FiscalYear FROM gac_approval_status)';
?>

<div class="gac-data-trxdet-u-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'FiscalYear')->dropDownList(
            ArrayHelper::map(GacDataTrxdetU::find()->select('FiscalYear')->distinct()->all(), 'FiscalYear', 'FiscalYear'), [
        'prompt' => 'Select Fiscal Year',
    ]);
    ?>                                               

    <div class="form-group">
        <?= Html::submitButton('Approve Records', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>                       

