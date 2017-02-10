<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GacGfsChapterU */

$this->title = $model->ChapterCode;
$this->params['breadcrumbs'][] = ['label' => 'Gac Gfs Chapter Us', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-gfs-chapter-u-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ChapterCode], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ChapterCode], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ChapterCode',
            'ChapterDescription',
            'ClassificationFlag',
            'Standard',
        ],
    ]) ?>

</div>
