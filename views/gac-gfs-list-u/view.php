<?php

use kartik\detail\DetailView;
use yii\helpers\ArrayHelper;
use app\models\GacGfsChapterU;
use app\models\GacGfsSubChapterU;
use app\models\GacGfsItemsU;

/* @var $this yii\web\View */
/* @var $model app\models\GacGfsListU */

$this->title = $model->GFSTransaction;
$this->params['breadcrumbs'][] = ['label' => 'GFS List', 'url' => ['index']];
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
            'heading' => 'GFS Transaction No ' . $this->title,
            'type' => DetailView::TYPE_INFO,
        ],
        'attributes' => [
//            'ID',
            [
                'attribute' => 'Chapter',
                'format' => 'raw',
                'type' => DetailView::INPUT_DROPDOWN_LIST,
                'items' => ArrayHelper::map(GacGfsChapterU::find()->all(), 'ChapterCode', 'ChapterDescription'),
                'options' => [
                    'prompt' => 'Select Chapter'
                ],
                'value' => GacGfsChapterU::getChapterDescByChapterCode($model->Chapter),
            ],
            [
                'attribute' => 'SubChapter',
                'format' => 'raw',
                'type' => DetailView::INPUT_DROPDOWN_LIST,
                'items' => ArrayHelper::map(GacGfsSubChapterU::find()->where(['ChapterCode' => $model->Chapter])->all(), 'ID', 'SubChapterDescription'),
                'options' => [
                    'prompt' => 'Select Sub Chapter'
                ],
                'value' => GacGfsSubChapterU::getSubChapterDescBySubChapterCode(GacGfsSubChapterU::getSubChapterCodeBySubChapterId($model->SubChapter), $model->Chapter),
            ],
            [
                'attribute' => 'Item',
                'format' => 'raw',
                'type' => DetailView::INPUT_DROPDOWN_LIST,
                'items' => ArrayHelper::map(GacGfsItemsU::find()->where(['ChapterCode' => $model->Chapter, 'SubChapterCode' => $model->SubChapter])->all(), 'ItemCode', 'ItemShortDescription'),
                'options' => [
                    'prompt' => 'Select Item'
                ],
                'value' => GacGfsItemsU::getItemDescByItemCode($model->Item, $model->SubChapter, $model->Chapter),
            ],
            [
                'attribute' => 'SubItem',
                'format' => 'raw',
                'type' => DetailView::INPUT_TEXT,
                'options' => [
                    'disabled' => TRUE,
                ],
            ],
            [
                'attribute' => 'ItemDescription',
                'format' => 'raw',
                'type' => DetailView::INPUT_TEXTAREA,
            ],
            [
                'attribute' => 'GFSTransaction',
                'type' => DETAILVIEW::INPUT_TEXT,
            ],
            [
                'attribute' => 'GFSHoldingGain',
                'type' => DETAILVIEW::INPUT_TEXT,
            ],
            [
                'attribute' => 'GFSVolume',
                'type' => DETAILVIEW::INPUT_TEXT,
            ],
            [
                'attribute' => 'GFSStock',
                'type' => DETAILVIEW::INPUT_TEXT,
            ],
            [
                'attribute' => 'ActiveFlag',
                'format' => 'raw',
                'type' => DetailView::INPUT_DROPDOWN_LIST,
                'items' => ['1' => 'Active', '0' => 'Inactive'],
                'value' => $model->ActiveFlag == 1 ? "Active" : "Inactive"
            ],
//            'DateCreated',
//            'UserCreated',
//            'DateModified',
//            'UserModified',
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
