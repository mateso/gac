<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GacDataStatisticSummaryVSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gac Data Statistic Summary Vs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-data-statistic-summary-v-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Gac Data Statistic Summary V', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Total_Entity',
            'Entity_Entered',
            'Entity_Approved',
            'Entity_Balance',
            'Entity_Posted',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
