<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GacDataStatisticSummaryV */

$this->title = $model->ENTERED;
$this->params['breadcrumbs'][] = ['label' => 'Gac Data Statistic Summary Vs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-data-statistic-summary-v-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ENTERED], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ENTERED], [
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
            'Total_Entity',
            'Entity_Entered',
            'Entity_Approved',
            'Entity_Balance',
            'Entity_Posted',
        ],
    ]) ?>

</div>
