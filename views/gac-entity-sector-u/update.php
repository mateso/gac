<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GacEntitySectorU */

$this->title = 'Update Gac Entity Sector U: ' . $model->SectorID;
$this->params['breadcrumbs'][] = ['label' => 'Gac Entity Sector Us', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->SectorID, 'url' => ['view', 'id' => $model->SectorID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gac-entity-sector-u-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
