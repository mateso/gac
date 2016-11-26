<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GacGfsListU */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Gac Gfs List Us', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-gfs-list-u-view">

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
                'attribute' => 'Chapter',
//                'format' => 'raw',
//                'type' => DetailView::INPUT_DROPDOWN_LIST,
//                'items' => ArrayHelper::map(GacEntitySectorU::find()->all(), 'SectorID', 'SectorDescription'),
//                'options' => [
//                    'prompt' => 'Select Sector'
//                ],
//                'value' => GacEntitySectorU::getSectorDescBySectorId($model->SectorID),
            ],
            [
                'attribute' => 'SubChapter',
//                'format' => 'raw',
//                'type' => DetailView::INPUT_DROPDOWN_LIST,
//                'items' => ArrayHelper::map(GacEntitySubSectorU::find()->all(), 'SubSectorID', 'SubSectorDescription'),
//                'options' => [
//                    'prompt' => 'Select SubSector'
//                ],
//                'value' => GacEntitySubSectorU::getSubSectorDescBySubSectorId($model->SubSectorID),
            ],
            'Item',
            [
                'attribute' => 'SubItem',
            ],
            [
                'attribute' => 'ItemDescription',
//                'format' => 'raw',
//                'type' => DetailView::INPUT_DROPDOWN_LIST,
//                'items' => ArrayHelper::map(ContractType::find()->orderBy('desc_en')->asArray()->all(), 'contract_type_id', 'desc_en'), 'options' => ['prompt' => 'Select Contract Type'],
//                'value' => $model->contractType->getContractTypeName($model->contract_type_id),
            ],
            [
                'attribute' => 'GFSTransaction',
//                'type' => DETAILVIEW::INPUT_TEXTAREA,
            ],
            [
                'attribute' => 'GFSHoldingGain',
//                'type' => DETAILVIEW::INPUT_HTML5_INPUT,
//                'inputType' => 'number',
//                'options' => ['min' => 1, 'max' => 5, 'step' => 1, 'placeholder' => 'Enter Lot Number...'],
//                'value' => $model->lot_no,
            ],
            [
                'attribute' => 'GFSVolume',
//                'format' => 'raw',
//                'type' => DetailView::INPUT_DROPDOWN_LIST,
//                'items' => ['1' => 'Active', '0' => 'Inactive'],
//                'value' => $model->ActiveFlag == 1 ? "ACTIVE" : "INACTIVE"
            ],
            [
                'attribute' => 'GFSStock',
//                'format' => ['date', 'php:d-M-Y'],
//                'type' => DetailView::INPUT_WIDGET,
//                'widgetOptions' => [
//                    'class' => DateControl::classname(),
//                    'type' => DateControl::FORMAT_DATE,
//                ],
            ],
            [
                'attribute' => 'ActiveFlag',
//                'format' => ['date', 'php:d-M-Y'],
//                'type' => DetailView::INPUT_WIDGET,
//                'widgetOptions' => [
//                    'class' => DateControl::classname(),
//                    'type' => DateControl::FORMAT_DATE,
//                ],
            ],
            'DateCreated',
            'UserCreated',
            'DateModified',
            'UserModified',
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
