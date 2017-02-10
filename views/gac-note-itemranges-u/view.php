<?php

use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GacNoteItemrangesU */

$this->title = $model->NoteNo;
$this->params['breadcrumbs'][] = ['label' => 'Note Item Ranges', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-note-itemranges-u-view">

    <?=
    DetailView::widget([
        'model' => $model,
        'condensed' => false,
        'hover' => true,
        'mode' => Yii::$app->request->get('edit') == 't' ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
        'panel' => [
            'heading' => 'Note No ' . $this->title,
            'type' => DetailView::TYPE_INFO,
        ],
        'attributes' => [
//            'ID',
            'NoteNo',
            'ItemStart',
            'ItemEnd',
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
