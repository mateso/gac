<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GacEntitySectorU */

$this->title = $model->SectorID;
$this->params['breadcrumbs'][] = ['label' => 'Gac Entity Sector Us', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-entity-sector-u-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->SectorID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->SectorID], [
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
            'SectorID',
            'SectorDescription',
        ],
    ]) ?>

</div>
