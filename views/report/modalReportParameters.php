<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\GacDataTrxdetU;
use app\models\GacEntitySectorU;

/* @var $this yii\web\View */
/* @var $model app\models\ModalReportParameters */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gac-data-trxdet-u-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'fiscal_year')->dropDownList(
            ArrayHelper::map(GacDataTrxdetU::find()->select('FiscalYear')->distinct()->all(), 'FiscalYear', 'FiscalYear'), [
        'prompt' => 'Select Fiscal Year',
    ]);
    ?> 

    <?=
    $form->field($model, 'vote_code')->dropDownList(
            [0 => 'GOT', 1 => 'Entity Sub Sector', 2 => 'Specific Entity List'], [
        'prompt' => 'Select Vote Code',
        'onchange' => '
                if($("#modalreportparameters-vote_code").val() == 0){
                $("label[for=modalreportparameters-entity_sector]").hide();
                $("#modalreportparameters-entity_sector").hide();
                $("label[for=modalreportparameters-entity_sub_sector]").hide();
//                $("select#modalreportparameters-entity_sub_sector").html("");
                $("#modalreportparameters-entity_sub_sector").hide();
                $("label[for=modalreportparameters-entity_list]").hide();
                $("select#modalreportparameters-entity_list").html("");
                $("#modalreportparameters-entity_list").hide();
            }
            else if($("#modalreportparameters-vote_code").val() == 1){
                $("label[for=modalreportparameters-entity_sector]").show();
                $("#modalreportparameters-entity_sector").show();
                $("label[for=modalreportparameters-entity_sub_sector]").show();
                $("#modalreportparameters-entity_sub_sector").show(); 
                $("label[for=modalreportparameters-entity_list]").hide();
                $("select#modalreportparameters-entity_list").html("");
                $("#modalreportparameters-entity_list").hide();
            }
            else{
                $("label[for=modalreportparameters-entity_sector]").show();
                $("#modalreportparameters-entity_sector").show();
                $("label[for=modalreportparameters-entity_sub_sector]").show();
                $("#modalreportparameters-entity_sub_sector").show();
                $("label[for=modalreportparameters-entity_list]").show();
                $("#modalreportparameters-entity_list").show();
            }',
    ]);
    ?>  

    <?=
    $form->field($model, 'entity_sector')->dropDownList(
            ArrayHelper::map(GacEntitySectorU::find()->all(), 'SectorID', 'SectorDescription'), [
        'prompt' => 'Select Vote Code',
        'onchange' => '
        $.get("index.php?r=gac-entity-sector-u/load-entity-sub-sector-items&id=' . '"+$(this).val(), 
        function(data){
        $("select#modalreportparameters-entity_sub_sector").html(data);
        });'
            ]
    );
    ?>

    <?=
    $form->field($model, 'entity_sub_sector')->dropDownList(
            [], [
        'prompt' => 'Select Sub Sector',
        'onchange' => '
        $.get("index.php?r=gac-entity-sub-sector-u/load-entity-list-items&id=' . '"+$(this).val()+"&sid="+$("#modalreportparameters-entity_sector").val(), 
        function(data){
        $("select#modalreportparameters-entity_list").html(data);
        });'
    ]);
    ?> 

    <?=
    $form->field($model, 'entity_list')->dropDownList(
            [], [
        'prompt' => 'Select Sub Sector',
    ]);
    ?> 

    <div class="form-group">
        <?= Html::submitButton('View Report', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>    

<?php
$this->registerJs(
        "$(document).ready(function() {  
//Toggle the display between consolidator and other users
$('label[for=modalreportparameters-vote_code]').hide();
$('#modalreportparameters-vote_code').hide();
$('label[for=modalreportparameters-entity_sector]').hide();
$('#modalreportparameters-entity_sector').hide();
$('label[for=modalreportparameters-entity_sub_sector]').hide();
$('#modalreportparameters-entity_sub_sector').hide();
$('label[for=modalreportparameters-entity_list]').hide();
$('#modalreportparameters-entity_list').hide();

if( '" . Yii::$app->user->can('consolidator') . "' ){
$('label[for=modalreportparameters-vote_code]').show();
$('#modalreportparameters-vote_code').show();
}})"
);
?>

