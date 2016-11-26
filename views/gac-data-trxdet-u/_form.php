<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\GacGfsSubchapterU;
use app\models\GacGlobPeriodU;
use app\models\GacGfsListV;
use app\models\GacGfsClassificationU;

/* @var $this yii\web\View */
/* @var $model app\models\GacDataTrxdetU */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gac-data-trxdet-u-form">

    <?php
    $gfsItemsData = [];
    $gfsCodeData = [];
    $lblGFSCode = '';
    $ChapterCode = 0;
    if (!$model->isNewRecord) {
        $model->SubchapterId = $model::getSubchapterIdByTrxId($model->ID);
        $SubChapterCode = GacGfsSubchapterU::getSubChapterCodeBySubChapterId($model->SubchapterId);
        $ChapterCode = GacGfsSubchapterU::getChapterCodeBySubChapterId($model->SubchapterId);
        $model->ItemCode = $model::getItemCodeByTrxId($model->ID);
        $gfsItemsData = ArrayHelper::map(GacGfsListV::find()
                                ->where(['ChapterCode' => $ChapterCode, 'SubChapterCode' => $SubChapterCode])
                                ->all(), 'ItemCode', 'ItemShortDescription');
        $gfsCodeData = ArrayHelper::map(GacGfsListV::find()
                                ->where(['ItemCode' => $model->ItemCode, 'SubChapterCode' => $SubChapterCode, 'ChapterCode' => $ChapterCode])
                                ->all(), 'GFSMCode', 'ItemDescription');
        $lblGFSCode = $model->GFSCode;
    }
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-5 border-right">  

                            <?php $form = ActiveForm::begin(); ?>

                            <?=
                            $form->field($model, 'FiscalYear')->dropDownList(
                                    ArrayHelper::map(GacGlobPeriodU::find()->all(), 'ID', 'fiscal_year'), [
                                'prompt' => 'Select Fiscal Year',
                                'onchange' => '
                              $.get(
        "index.php?r=gac-glob-period-u/get-period-definition-by-period-id",         
        {
            id: $("#gacdatatrxdetu-fiscalyear").val()
        },
        function (data) {
$("label#lblItemDefinition").html(data);
        });',
                            ]);
                            ?>

                            <?=
                            $form->field($model, 'SubchapterId')->dropDownList(
                                    ArrayHelper::map(GacGfsSubchapterU::find()->all(), 'ID', 'SubChapterDescription'), [
                                'prompt' => 'Select GFS Subchapter',
                                'onchange' => '                                      
$.get(
        "index.php?r=gac-gfs-subchapter-u/get-sub-chapter-definition-by-sub-chapter-id",         
        {
            id: $("#gacdatatrxdetu-subchapterid").val()
        },
        function (data) {
$("label#lblItemDefinition").html(data);
        });
        
                $.get("index.php?r=gac-gfs-subchapter-u/load-gfs-items&id=' . '"+$(this).val(), function(data){
                $("select#gacdatatrxdetu-itemcode").html(data);
                    });                      
                    
$.get(
        "index.php?r=gac-gfs-subchapter-u/get-chapter-code-by-sub-chapter-id",         
        {
            id: $("#gacdatatrxdetu-subchapterid").val()
        },
        function (data) {
            var chapterCode = data;
                if(chapterCode == 3){                         
                $("label[for=gacdatatrxdetu-classificationcode]").show();
            $("#gacdatatrxdetu-classificationcode").show();
                }else{
                $("label[for=gacdatatrxdetu-classificationcode]").hide();
            $("#gacdatatrxdetu-classificationcode").hide();
                }
        }  
    );   
//              $("#gacdatatrxdetu-gfscode").val(0);
                $("label#lblGFSCode").hide();
                $("label#lblGFSCode").html("");'
                            ]);
                            ?>

                            <?=
                            $form->field($model, 'ItemCode')->dropDownList(
                                    $gfsItemsData, [
                                'prompt' => 'Select GFS Item',
                                'onchange' => '   
$.get(
        "index.php?r=gac-gfs-items-u/get-item-definition-by-gfs-item-code",         
        {
            id: $("#gacdatatrxdetu-itemcode").val()
        },
        function (data) {
$("label#lblItemDefinition").html(data);
        }  
    );
    
                if(!$("#gacdatatrxdetu-classificationcode").is(":visible")){
                $.get("index.php?r=gac-gfs-items-u/load-gfs-lists-by-item-code&id="+$(this).val()+"&scc="+$("#gacdatatrxdetu-subchapterid").val(), function(data){
                $("select#gacdatatrxdetu-gfscode").html(data);
                    });
                    }
                    
                $("label#lblGFSCode").hide();
                $("label#lblGFSCode").html("");'
                            ]);
                            ?>

                            <?=
                            $form->field($model, 'ClassificationCode')->dropDownList(
                                    ArrayHelper::map(GacGfsClassificationU::find()->all(), 'ClassificationCode', 'ClassificationDescription'), [
                                'prompt' => 'Select Classification',
                                'onchange' => '   
//$.get(
//        "index.php?r=gac-gfs-items-u/get-item-definition-by-gfs-item-code",         
//        {
//            id: $("#gacdatatrxdetu-itemcode").val()
//        },
//        function (data) {
//$("label#lblItemDefinition").html(data);
//        }  
//    );
    
                $.get("index.php?r=gac-gfs-classification-u/load-gfs-lists-by-classification-code&id="+$(this).val()+"&itemId="+$("#gacdatatrxdetu-itemcode").val()+"&scc="+$("#gacdatatrxdetu-subchapterid").val(), function(data){
                $("select#gacdatatrxdetu-gfscode").html(data);
                    });
                    
if($("#gacdatatrxdetu-classificationcode").val()!=1){
$("#gacdatatrxdetu-approvedbudget").prop("disabled", true);
$("#gacdatatrxdetu-reallocation").prop("disabled", true);
}else{
$("#gacdatatrxdetu-approvedbudget").prop("disabled", false);
$("#gacdatatrxdetu-reallocation").prop("disabled", false);
}
'
                            ]);
                            ?>


                            <?=
                            $form->field($model, 'GFSCode')->dropDownList(
                                    $gfsCodeData, [
                                'prompt' => 'Select GFS Code',
                                'onchange' => '
                $.get("index.php?r=gac-gfs-list-u/get-gfs-code-desc&id=' . '"+$(this).val(), function(data){
$("div#divGFSCode").show();
$("label#lblGFSCode").show();
$("label#lblGFSCode").html(data);
                
$.get(
        "index.php?r=gac-gfs-list-u/get-item-definition-by-gfs-code",         
        {
            id: $("#gacdatatrxdetu-gfscode").val()
        },
        function (data) {
$("label#lblItemDefinition").html(data);
        }  
    );

                    })'
                            ]);
                            ?>
                            <label id="lblGFSCode"><?= $lblGFSCode ?></label>

                            <?= $form->field($model, 'ApprovedBudget')->textInput() ?>

                            <?= $form->field($model, 'Reallocation')->textInput() ?>

                            <?= $form->field($model, 'Actual')->textInput() ?>

                            <div class="form-group">
                                <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>

                        </div>
                        <div class="col-md-7">
                            <p class="text-center">
                                <strong>Item Definition</strong>
                            </p>
                            <label id="lblItemDefinition"></label>
                        </div>

                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- ./box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

<?php
$this->registerJs(
"$(document).ready(function() {            
//Toggle the display of classification label and it's dropdownlist
if( $ChapterCode == 3){
$('label[for=gacdatatrxdetu-classificationcode]').show();
$('#gacdatatrxdetu-classificationcode').show();
}else{
$('label[for=gacdatatrxdetu-classificationcode]').hide();
$('#gacdatatrxdetu-classificationcode').hide();
}

//Toggle the enable and disable of approve and reallocation textboxes
if( $ChapterCode == 3 && $('#gacdatatrxdetu-classificationcode').val()==1){
$('#gacdatatrxdetu-approvedbudget').prop('disabled', false);
$('#gacdatatrxdetu-reallocation').prop('disabled', false);
}
else if($ChapterCode == 3 && $('#gacdatatrxdetu-classificationcode').val()!=1){
$('#gacdatatrxdetu-approvedbudget').prop('disabled', true);
$('#gacdatatrxdetu-reallocation').prop('disabled', true);
}})"
);
?>
