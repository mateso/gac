<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GacEntitySubSectorUSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gac Entity Sub Sector Us';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-entity-sub-sector-u-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Gac Entity Sub Sector U', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'SubSectorID',
            'SubSectorDescription',
            'SectorID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
