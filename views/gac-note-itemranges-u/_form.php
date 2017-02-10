<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use yii\helpers\ArrayHelper;
use app\models\GacNoteItemsU;

/* @var $this yii\web\View */
/* @var $model app\models\GacNoteItemrangesU */
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
                        'NoteNo' => [
                            'type' => Form::INPUT_DROPDOWN_LIST,
                            'items' => ArrayHelper::map(GacNoteItemsU::find()->all(), 'NoteNo', 'NoteNo'),
                            'options' => [
                                'prompt' => 'Select Note...'
                            ],
                        ],
                        'ItemStart' => [
                            'type' => Form::INPUT_TEXT,
                            'options' => ['placeholder' => 'Enter Item Start...'],
                        ],
                        'ItemEnd' => [
                            'type' => Form::INPUT_TEXT,
                            'options' => ['placeholder' => 'Enter Item End...']
                        ],
                        'ActiveFlag' => [
                            'type' => Form::INPUT_DROPDOWN_LIST,
                            'items' => ['1' => 'Active', '0' => 'Inactive'],
                            'options' => [
                                'prompt' => 'Select Flag...'
                            ],
                        ],
//                        'DateCreated' => [
//                        ],
//                        'UserCreated' => [
//                        ],
//                        'DateModified' => [
//                        ],
//                        'UserModified' => [
//                        ],
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
