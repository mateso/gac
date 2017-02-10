<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GacApprovalStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gac Approval Statuses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-approval-status-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Gac Approval Status', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ApprovalStatusId',
            'EntityCode',
            'FiscalYear',
            'ApprovedFlag',
            'PostedFlag',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
