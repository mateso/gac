<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;

/* @var $this yii\web\View */
/* @var $model app\models\GacGlobPeriodU */
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
                        'period_type' => [
                            'type' => Form::INPUT_TEXT,
                            'options' => ['placeholder' => 'Enter Period Type...']
                        ],
                        'fiscal_year' => [
                            'type' => Form::INPUT_TEXT,
                            'options' => ['placeholder' => 'Enter Fiscal Year...']
                        ],
                        'period_description' => [
                            'type' => Form::INPUT_TEXT,
                            'options' => ['placeholder' => 'Enter Period Description...']
                        ],
                        'period_start_date' => [
                            'type' => Form::INPUT_WIDGET,
                            'widgetClass' => '\kartik\widgets\DatePicker',
                            'options' => [
                                'pluginOptions' => [
                                    'format' => 'yyyy-mm-dd',
                                //'endDate' => '0d'
                                ],
                            ],
                            'hint' => 'Enter Start Date (yyyy-mm-dd)'
                        ],
                        'period_end_date' => [
                            'type' => Form::INPUT_WIDGET,
                            'widgetClass' => '\kartik\widgets\DatePicker',
                            'options' => [
                                'pluginOptions' => [
                                    'format' => 'yyyy-mm-dd',
                                //'endDate' => '0d'
                                ],
                            ],
                            'hint' => 'Enter End Date (yyyy-mm-dd)'
                        ],
                        'initialized_flag' => [
                            'type' => Form::INPUT_TEXT,
                            'options' => ['placeholder' => 'Enter Initialization Flag...']
                        ],
                        'closed_flag' => [
                            'type' => Form::INPUT_TEXT,
                            'options' => ['placeholder' => 'Enter Closed Flag...']
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
