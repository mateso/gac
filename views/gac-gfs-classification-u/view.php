<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GacGfsClassificationU */

$this->title = $model->ClassificationCode;
$this->params['breadcrumbs'][] = ['label' => 'Gac Gfs Classification Us', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-gfs-classification-u-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ClassificationCode], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ClassificationCode], [
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
            'ClassificationCode',
            'ClassificationDescription',
        ],
    ]) ?>

</div>
