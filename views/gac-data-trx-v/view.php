<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GacDataTrxV */

$this->title = $model->FiscalYear;
$this->params['breadcrumbs'][] = ['label' => 'Gac Data Trx Vs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-data-trx-v-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'FiscalYear' => $model->FiscalYear, 'InstitutionalCode' => $model->InstitutionalCode], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'FiscalYear' => $model->FiscalYear, 'InstitutionalCode' => $model->InstitutionalCode], [
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
            'FiscalYear',
            'InstitutionalCode',
            'EntityCode',
            'EntityDescription',
            'NumTransaction',
            'ApprovedFlag',
            'ApprovedDate',
            'PostedFlag',
            'DatePosted',
            'ClosedFlag',
        ],
    ]) ?>

</div>
