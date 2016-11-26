<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GacGlobPeriodU */

$this->title = 'Update Gac Glob Period U: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Global Periods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gac-glob-period-u-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
