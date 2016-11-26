<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GacEntitySubSectorU */

$this->title = 'Update Gac Entity Sub Sector U: ' . $model->SubSectorID;
$this->params['breadcrumbs'][] = ['label' => 'Gac Entity Sub Sector Us', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->SubSectorID, 'url' => ['view', 'id' => $model->SubSectorID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gac-entity-sub-sector-u-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
