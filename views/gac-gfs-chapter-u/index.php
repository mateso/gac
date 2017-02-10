<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GacGfsChapterUSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gac Gfs Chapter Us';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-gfs-chapter-u-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Gac Gfs Chapter U', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ChapterCode',
            'ChapterDescription',
            'ClassificationFlag',
            'Standard',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
