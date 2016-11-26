<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GacNoteItemrangesUSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Note Item Ranges';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-note-itemranges-u-index">

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'ID',
            // 'ItemCode',
            // 'ViewableMask',
            // 'NonViewableMask',
            [
                'attribute' => 'NoteNo',
                'width' => '10%',
            ],
            [
                'attribute' => 'ItemStart',
                'width' => '35%',
            ],
            [
                'attribute' => 'ItemEnd',
                'width' => '35%',
            ],
            [
                'attribute' => 'ActiveFlag',
                'width' => '5%',
                'hAlign' => 'left',
            ],
            // 'DateCreated',
            // 'UserCreated',
            // 'DateModified',
            // 'UserModified',
            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Yii::$app->urlManager->createUrl(['gac-note-itemranges-u/view', 'id' => $model->ID, 'edit' => 't']), [
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
                    'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add Note', ['create'], ['class' => 'btn btn-success']), 'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index'], ['class' => 'btn btn-info']),
                    'showFooter' => false
                ],
            ]);
            ?>
</div>
