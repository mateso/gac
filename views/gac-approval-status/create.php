<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GacApprovalStatus */

$this->title = 'Create Gac Approval Status';
$this->params['breadcrumbs'][] = ['label' => 'Gac Approval Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-approval-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
