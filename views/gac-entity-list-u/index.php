<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use app\models\GacEntitySectorU;
use app\models\GacEntitySubSectorU;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GacEntityListUSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Entity List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-entity-list-u-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'ID',
            [
                'attribute' => 'SectorID',
                'value' => function ($model) {
                    return GacEntitySectorU::getSectorDescBySectorId($model->SectorID);
                },
                'width' => '15%',
                'filter' => Html::activeDropDownList(
                        $searchModel, 'SectorID', ArrayHelper::map(GacEntitySectorU::find()->orderBy('SectorID')->asArray()->all(), 'SectorID', 'SectorDescription'), ['class' => 'form-control', 'prompt' => Yii::t('app', 'ALL')]
                )
            ],
            [
                'attribute' => 'SubSectorID',
                'value' => function ($model) {
                    return GacEntitySubSectorU::getSubSectorDescBySubSectorId($model->SubSectorID);
                },
                'width' => '20%',
                'filter' => Html::activeDropDownList(
                        $searchModel, 'SubSectorID', ArrayHelper::map(GacEntitySubSectorU::find()->orderBy('SubSectorID')->asArray()->all(), 'SubSectorID', 'SubSectorDescription'), ['class' => 'form-control', 'prompt' => Yii::t('app', 'ALL')]
                )
            ],
            [
                'attribute' => 'EntityDescription',
                'width' => '25%',
            ],
            [
                'attribute' => 'InstitutionalCode',
                'width' => '5%',
                'hAlign' => 'left',
            ],
            [
                'attribute' => 'VoteCode',
                'width' => '5%',
                'hAlign' => 'left',
            ],
            [
                'attribute' => 'EntityCode',
                'width' => '5%',
                'hAlign' => 'left',
            ],
            // 'TransRelation',
            // 'ActiveFlag',
            // 'DateCreated',
            // 'UserCreated',
            // 'DateModified',
            // 'UserModified',
            // 'ContactPerson',
            // 'ContactNumber',
            // 'Region',
            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Yii::$app->urlManager->createUrl(['gac-entity-list-u/view', 'id' => $model->ID, 'edit' => 't']), [
                                    'title' => Yii::t('yii', 'Edit'),
                        ]);
                    },
                        ],
                    ],
                ],
                'responsive' => true,
                'hover' => true,
                'condensed' => true,
                'floatHeader' => true,
                'panel' => [
                    'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> ' . Html::encode($this->title) . ' </h3>',
                    'type' => 'info',
                    'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add Entity', ['create'], ['class' => 'btn btn-success']), 'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index'], ['class' => 'btn btn-info']),
                    'showFooter' => false
                ],
            ]);
            ?>
</div>
