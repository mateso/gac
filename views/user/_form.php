<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use app\models\GacEntitySectorU;
use yii\helpers\ArrayHelper;
use app\models\GacEntitySubsectorU;
use app\models\GacEntityListV;

/* @var $this yii\web\View */
/* @var $model app\models\User */
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
                $entitySubSectorData = [];
                $entityListData = [];
                $entityCodeLabel = '';
                if (!$model->isNewRecord) {
                    $model->entity_sector_id = $model::getEntitySectorIdByUserId($model->id);
                    $model->entity_sub_sector_id = $model::getEntitySubSectorIdByUserId($model->id);
                    $entitySubSectorData = ArrayHelper::map(GacEntitySubsectorU::find()
                                            ->where(['SectorID' => $model->entity_sector_id])
                                            ->all(), 'SubSectorID', 'SubSectorDescription');
                    $entityListData = ArrayHelper::map(GacEntityListV::find()
                                            ->where(['SectorID' => $model->entity_sector_id, 'SubSectorID' => $model->entity_sub_sector_id])
                                            ->all(), 'InstitutionalCode', 'EntityDescription');
                }
                ?>

                <?php
                $form = ActiveForm::begin(['type' => ActiveForm::TYPE_VERTICAL]);
                echo Form::widget([
                    'model' => $model,
                    'form' => $form,
                    'columns' => 3,
                    'attributes' => [
                        'firstname' => [
                            'type' => Form::INPUT_TEXT,
                            'options' => ['placeholder' => 'Enter Firstname...']
                        ],
                        'lastname' => [
                            'type' => Form::INPUT_TEXT,
                            'options' => ['placeholder' => 'Enter Surname...']
                        ],
                        'username' => [
                            'type' => Form::INPUT_TEXT,
                            'options' => ['placeholder' => 'Enter Username...']
                        ],
                        'password_hash' => [
                            'type' => Form::INPUT_PASSWORD,
                            'options' => ['placeholder' => 'Enter Password...'],
                            'visible' => $model->isNewRecord,
                        ],
                        'password_hash_repeat' => [
                            'type' => Form::INPUT_PASSWORD,
                            'options' => ['placeholder' => 'Confirm Password...'],
                            'visible' => $model->isNewRecord,
                        ],
                        'phone' => [
                            'type' => Form::INPUT_TEXT,
                            'options' => ['placeholder' => 'Enter Phone Number...']
                        ],
                        'email' => [
                            'type' => Form::INPUT_TEXT,
                            'options' => ['placeholder' => 'Enter Email...']
                        ],
                        'entity_sector_id' => [
                            'type' => Form::INPUT_DROPDOWN_LIST,
                            'items' => ArrayHelper::map(GacEntitySectorU::find()->all(), 'SectorID', 'SectorDescription'),
                            'options' => [
                                'prompt' => 'Select Sector',
                                'onchange' => '
                $.get("index.php?r=gac-entity-sector-u/load-entity-sub-sector-items&id=' . '"+$(this).val(), function(data){
                $("select#user-entity_sub_sector_id").html(data);
                    })'
                            ],
                        ],
                        'entity_sub_sector_id' => [
                            'type' => Form::INPUT_DROPDOWN_LIST,
                            'items' => $entitySubSectorData,
                            'options' => [
                                'prompt' => 'Select Sub Sector',
                                'onchange' => '
                $.get("index.php?r=gac-entity-sub-sector-u/load-entity-list-items&id=' . '"+$(this).val()+"&sid="+$("#user-entity_sector_id").val(), function(data){
                $("select#user-institutional_code").html(data);
                    })'
                            ],
                        ],
                        'institutional_code' => [
                            'type' => Form::INPUT_DROPDOWN_LIST,
                            'items' => $entityListData,
                            'options' => [
                                'prompt' => 'Select Institution',
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
