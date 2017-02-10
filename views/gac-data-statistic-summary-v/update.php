<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GacDataStatisticSummaryV */

$this->title = 'Update Gac Data Statistic Summary V: ' . $model->ENTERED;
$this->params['breadcrumbs'][] = ['label' => 'Gac Data Statistic Summary Vs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ENTERED, 'url' => ['view', 'id' => $model->ENTERED]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gac-data-statistic-summary-v-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
