<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GacGfsSubchapterU */

$this->title = 'Update Gac Gfs Subchapter U: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Gac Gfs Subchapter Us', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gac-gfs-subchapter-u-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
