<?php

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
                    'prompt' => 'Select Sector',
                    'onchange' => '
                $.get("index.php?r=gac-entity-sector-u/load-entity-sub-sector-items&id=' . '"+$(this).val(), function(data){
                $("select#gacentitylistu-subsectorid").html(data);
                });'
                ],
                'value' => GacEntitySectorU::getSectorDescBySectorId($model->SectorID),
            ],
            [
                'attribute' => 'SubSectorID',
                'format' => 'raw',
                'type' => DetailView::INPUT_DROPDOWN_LIST,
                'items' => ArrayHelper::map(GacEntitySubSectorU::find()->where(['SectorID' => $model->SectorID])->all(), 'SubSectorID', 'SubSectorDescription'),
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
            ],
            [
                'attribute' => 'EntityDescription',
//                'type' => DETAILVIEW::INPUT_TEXTAREA,
            ],
            [
                'attribute' => 'ActiveFlag',
                'format' => 'raw',
                'type' => DetailView::INPUT_DROPDOWN_LIST,
                'items' => ['1' => 'Active', '0' => 'Inactive'],
                'value' => $model->ActiveFlag == 1 ? "Active" : "Inactive"
            ],
            [
                'attribute' => 'ContactPerson',
            ],
            [
                'attribute' => 'ContactNumber',
            ],
            [
                'attribute' => 'Region',
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
