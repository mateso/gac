<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GacApprovalStatus */

$this->title = $model->ApprovalStatusId;
$this->params['breadcrumbs'][] = ['label' => 'Gac Approval Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-approval-status-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ApprovalStatusId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ApprovalStatusId], [
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
            'ApprovalStatusId',
            'EntityCode',
            'FiscalYear',
            'ApprovedFlag',
            'PostedFlag',
        ],
    ]) ?>

</div>
