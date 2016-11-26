<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GacDataTrxV */

$this->title = 'Update Gac Data Trx V: ' . $model->FiscalYear;
$this->params['breadcrumbs'][] = ['label' => 'Gac Data Trx Vs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->FiscalYear, 'url' => ['view', 'FiscalYear' => $model->FiscalYear, 'InstitutionalCode' => $model->InstitutionalCode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gac-data-trx-v-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
