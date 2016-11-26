<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\detail\DetailView;
use app\models\GacEntitySectorU;
use app\models\GacEntitySubSectorU;

/* @var $this yii\web\View */
/* @var $model app\models\GacEntityListU */

$this->title = $model->EntityDescription;
$this->params['breadcrumbs'][] = ['label' => 'Entity List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-entity-list-u-view">

    <?=
    DetailView::widget([
        'model' => $model,
        'condensed' => false,
        'hover' => true,
        'mode' => Yii::$app->request->get('edit') == 't' ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
        'panel' => [
            'heading' => $this->title,
            'type' => DetailView::TYPE_INFO,
        ],
        'attributes' => [
//            'ID',
            [
                'attribute' => 'SectorID',
                'format' => 'raw',
                'type' => DetailView::INPUT_DROPDOWN_LIST,
                'items' => ArrayHelper::map(GacEntitySectorU::find()->all(), 'SectorID', 'SectorDescription'),
                'options' => [
                    'prompt' => 'Select Sector'
                ],
                'value' => GacEntitySectorU::getSectorDescBySectorId($model->SectorID),
            ],
            [
                'attribute' => 'SubSectorID',
                'format' => 'raw',
                'type' => DetailView::INPUT_DROPDOWN_LIST,
                'items' => ArrayHelper::map(GacEntitySubSectorU::find()->all(), 'SubSectorID', 'SubSectorDescription'),
                'options' => [
                    'prompt' => 'Select SubSector'
                ],
                'value' => GacEntitySubSectorU::getSubSectorDescBySubSectorId($model->SubSectorID),
            ],
            'InstitutionalCode',
            [
                'attribute' => 'VoteCode',
            ],
            [
                'attribute' => 'EntityCode',
//                'format' => 'raw',
//                'type' => DetailView::INPUT_DROPDOWN_LIST,
//                'items' => ArrayHelper::map(ContractType::find()->orderBy('desc_en')->asArray()->all(), 'contract_type_id', 'desc_en'), 'options' => ['prompt' => 'Select Contract Type'],
//                'value' => $model->contractType->getContractTypeName($model->contract_type_id),
            ],
            [
                'attribute' => 'EntityDescription',
//                'type' => DETAILVIEW::INPUT_TEXTAREA,
            ],
            [
                'attribute' => 'TransRelation',
//                'type' => DETAILVIEW::INPUT_HTML5_INPUT,
//                'inputType' => 'number',
//                'options' => ['min' => 1, 'max' => 5, 'step' => 1, 'placeholder' => 'Enter Lot Number...'],
//                'value' => $model->lot_no,
            ],
            [
                'attribute' => 'ActiveFlag',
                'format' => 'raw',
                'type' => DetailView::INPUT_DROPDOWN_LIST,
                'items' => ['1' => 'Active', '0' => 'Inactive'],
                'value' => $model->ActiveFlag == 1 ? "ACTIVE" : "INACTIVE"
            ],
//            'DateCreated',
//            'UserCreated',
//            'DateModified',
//            'UserModified',
            [
                'attribute' => 'ContactPerson',
//                'format' => ['date', 'php:d-M-Y'],
//                'type' => DetailView::INPUT_WIDGET,
//                'widgetOptions' => [
//                    'class' => DateControl::classname(),
//                    'type' => DateControl::FORMAT_DATE,
//                ],
            ],
            [
                'attribute' => 'ContactNumber',
//                'format' => ['date', 'php:d-M-Y'],
//                'type' => DetailView::INPUT_WIDGET,
//                'widgetOptions' => [
//                    'class' => DateControl::classname(),
//                    'type' => DateControl::FORMAT_DATE,
//                ],
            ],
            [
                'attribute' => 'Region',
//                'format' => 'raw',
//                'type' => DetailView::INPUT_DROPDOWN_LIST,
//                'items' => ArrayHelper::map(FinancialYear::find()->orderBy('financial_year_id')->asArray()->all(), 'financial_year_id', 'desc_en'), 'options' => ['prompt' => 'Select Financial Year'],
//                'value' => $model->financialYear->getFinancialYearName($model->financial_year_id),
            ],
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->ID],
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ],
        'enableEditMode' => true,
    ])
    ?>

</div>
