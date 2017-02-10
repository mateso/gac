<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use app\models\GacEntitySectorU;

/* @var $this yii\web\View */
/* @var $model app\models\GacEntityListU */
/* @var $form yii\widgets\ActiveForm */
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
                        'SectorID' => [
                            'type' => Form::INPUT_DROPDOWN_LIST,
                            'items' => ArrayHelper::map(GacEntitySectorU::find()->all(), 'SectorID', 'SectorDescription'),
                            'options' => [
                                'prompt' => 'Select Sector',
                                'onchange' => '
                $.get("index.php?r=gac-entity-sector-u/load-entity-sub-sector-items&id=' . '"+$(this).val(), function(data){
                $("select#gacentitylistu-subsectorid").html(data);
                });'
                            ],
                        ],
                        'SubSectorID' => [
                            'type' => Form::INPUT_DROPDOWN_LIST,
                            'items' => [],
                            'options' => [
                                'prompt' => 'Select Sub Sector',
                            ],
                        ],
                        'InstitutionalCode' => [
                            'type' => Form::INPUT_TEXT,
                            'options' => ['placeholder' => 'Enter Institutional Code...']
                        ],
                        'VoteCode' => [
                            'type' => Form::INPUT_TEXT,
                            'options' => ['placeholder' => 'Enter Vote Code...']
                        ],
                        'EntityCode' => [
                            'type' => Form::INPUT_TEXT,
                            'options' => ['placeholder' => 'Enter Entity Code...']
                        ],
                        'EntityDescription' => [
                            'type' => Form::INPUT_TEXTAREA,
                            'options' => ['placeholder' => 'Enter Entity Description...']
                        ],
                        'ActiveFlag' => [
                            'type' => Form::INPUT_DROPDOWN_LIST,
                            'items' => ['1' => 'Active', '0' => 'Inactive'],
                            'options' => [
                                'prompt' => 'Select Flag',
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

</div>
