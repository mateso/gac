<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GacEntitySectorUSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gac Entity Sector Us';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-entity-sector-u-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Gac Entity Sector U', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'SectorID',
            'SectorDescription',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
