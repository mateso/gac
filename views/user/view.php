<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->getFullName();
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->username;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'username',
            //'password_hash',
            'firstname',
            'lastname',
            [
                'attribute' => 'institutional_code',
                'value' => $model->gacEntityListU->getEntityDesc($model->institutional_code),
            ],
            'phone',
            'email:email',
        //'login_counts',
        //'last_login_date',
        //'failed_login_attempts',
        //'auth_key',
        //'last_password_update_date',
        //'created_at',
        //'created_by',
        //'password_reset_token',
        //'updated_at',
        //'image',
        //'status',
        ],
    ])
    ?>

<?= Html::a('<i class="glyphicon glyphicon-log-in"></i>Roles', ['admin/assignment/view', 'id' => $model->id], ['class' => 'btn btn-primary', 'style' => 'float:right;margin-right:5px;']); ?>
</div>
