<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\User;
use yii\helpers\ArrayHelper;
use app\models\GacEntityListV;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'username',
                'width' => '13%',
            ],
            [
                'attribute' => 'id',
                'label' => 'Fullname',
                'value' => 'fullName',
                'width' => '15%',
                'filter' => Html::activeDropDownList(
                        $searchModel, 'id', ArrayHelper::map(User::find()->select(['id', 'firstname', 'lastname'])->orderBy(['firstname' => SORT_ASC])->all(), 'id', 'fullName'), ['class' => 'form-control', 'prompt' => 'ALL']
                )
            ],
            [
                'attribute' => 'institutional_code',
                'width' => '25%',
                'value' => function($model) {
                    return $model->gacEntityListU->getEntityDesc($model->institutional_code);
                },
                'filter' => Html::activeDropDownList(
                        $searchModel, 'institutional_code', ArrayHelper::map(GacEntityListV::find()->select(['InstitutionalCode', 'EntityDescription'])->orderBy(['EntityDescription' => SORT_ASC])->all(), 'InstitutionalCode', 'EntityDescription'), ['class' => 'form-control', 'prompt' => 'ALL']
                )
            ],
            [
                'attribute' => 'phone',
                'width' => '10%',
            ],
            'email:email',
            [
                'attribute' => 'status',
                'width' => '9%',
                'value' => function ($model) {
                    if ($model->status == 0) {
                        return 'Deleted';
                    } else {
                        return 'Active';
                    }
                },
                'filter' => Html::activeDropDownList(
                        $searchModel, 'status', [1 => 'Active', 0 => 'Deleted'], ['class' => 'form-control', 'prompt' => 'ALL']
                )
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
        'responsive' => true,
        'hover' => true,
        'condensed' => true,
        'floatHeader' => true,
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> ' . Html::encode($this->title) . ' </h3>',
            'type' => 'info',
            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add User', ['create'], ['class' => 'btn btn-success']), 'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index'], ['class' => 'btn btn-info']),
            'showFooter' => false
        ],
    ]);
    ?>

</div>
