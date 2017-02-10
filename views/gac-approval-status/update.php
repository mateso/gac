<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GacApprovalStatus */

$this->title = 'Update Gac Approval Status: ' . $model->ApprovalStatusId;
$this->params['breadcrumbs'][] = ['label' => 'Gac Approval Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ApprovalStatusId, 'url' => ['view', 'id' => $model->ApprovalStatusId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gac-approval-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
