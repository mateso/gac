<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GacDataStatisticSummaryV */

$this->title = 'Create Gac Data Statistic Summary V';
$this->params['breadcrumbs'][] = ['label' => 'Gac Data Statistic Summary Vs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-data-statistic-summary-v-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
