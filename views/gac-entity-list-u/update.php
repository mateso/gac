<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GacEntityListU */

$this->title = 'Update Gac Entity List U: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Gac Entity List Us', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gac-entity-list-u-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
