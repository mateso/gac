<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use yii\helpers\ArrayHelper;
use app\models\GacGfsChapterU;

/* @var $this yii\web\View */
/* @var $model app\models\GacGfsListU */
/* @var $form yii\widgets\ActiveForm */

$subChapterList = [];
$itemList = [];
$subItemList = [];
?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="box-body">
                <?php
                $form = ActiveForm::begin(['type' => ActiveForm::TYPE_VERTICAL]);
                echo Form::widget([
                    'model' => $model,
                    'form' => $form,
                    'columns' => 3,
                    'attributes' => [
                        'Chapter' => [
                            'type' => Form::INPUT_DROPDOWN_LIST,
                            'items' => ArrayHelper::map(GacGfsChapterU::find()->all(), 'ChapterCode', 'ChapterDescription'),
                            'options' => [
                                'prompt' => 'Select Chapter',
                                'onchange' => '$.get("index.php?r=gac-gfs-chapter-u/load-sub-chapter-list&id=' . '"+$(this).val(), function(data){
                $("select#gacgfslistu-subchapter").html(data);
                });
                
                if($(this).val() != 3){                         
                $("#gacgfslistu-gfsholdinggain").prop("disabled", true);
                $("#gacgfslistu-gfsvolume").prop("disabled", true);
                $("#gacgfslistu-gfsholdinggain").val("00000000");
                $("#gacgfslistu-gfsvolume").val("00000000");
                }else{
                $("#gacgfslistu-gfsholdinggain").prop("disabled", false);
                $("#gacgfslistu-gfsvolume").prop("disabled", false);
                $("#gacgfslistu-gfsholdinggain").val("");
                $("#gacgfslistu-gfsvolume").val("");
                }',
                            ],
                        ],
                        'SubChapter' => [
                            'type' => Form::INPUT_DROPDOWN_LIST,
                            'items' => $subChapterList,
                            'options' => [
                                'prompt' => 'Select Sub Chapter',
                                'onchange' => '$.get("index.php?r=gac-gfs-subchapter-u/load-gfs-items-u&id=' . '"+$(this).val(), function(data){
                $("select#gacgfslistu-item").html(data);
                });',
                            ],
                        ],
                        'Item' => [
                            'type' => Form::INPUT_DROPDOWN_LIST,
                            'items' => $itemList,
                            'options' => [
                                'prompt' => 'Select GFS Item',
                                'onchange' => '$.get("index.php?r=gac-gfs-items-u/load-gfs-lists-by-item-code&id=' . '"+$(this).val()+"&scc="+$("#gacgfslistu-subchapter").val(), function(data){
                $("select#gacgfslistu-subitem").html(data);
                });',
                            ],
                        ],
                        'SubItem' => [
                            'type' => Form::INPUT_TEXT,
                            'options' => [
                                'disabled' => TRUE,
                                'placeholder' => 'Sub item will be generated automatically...',                               
                                ],                           
                        ],
                        'ItemDescription' => [
                            'type' => Form::INPUT_TEXTAREA,
                            'options' => ['placeholder' => 'Enter Item Description...']
                        ],
                        'GFSTransaction' => [
                            'type' => Form::INPUT_TEXT,
                            'options' => ['placeholder' => 'Enter GFS Transaction...']
                        ],
                        'GFSHoldingGain' => [
                            'type' => Form::INPUT_TEXT,
                            'options' => ['placeholder' => 'Enter GFS Holding Gain...']
                        ],
                        'GFSVolume' => [
                            'type' => Form::INPUT_TEXT,
                            'options' => ['placeholder' => 'Enter GFS Volume...']
                        ],
                        'GFSStock' => [
                            'type' => Form::INPUT_TEXT,
                            'options' => ['placeholder' => 'Enter GFS Stock...']
                        ],
                        'ActiveFlag' => [
                            'type' => Form::INPUT_DROPDOWN_LIST,
                            'items' => ['1' => 'Active', '0' => 'Inactive'],
                            'options' => [
                                'prompt' => 'Select Active Flag',
                            ],
                        ],
                    ],
                ]);

                echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Save') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'margin-left: 0px']);

                ActiveForm::end();
                ?>   
            </div>
            <!-- ./box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

