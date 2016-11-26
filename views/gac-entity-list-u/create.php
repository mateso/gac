<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GacEntityListU */

$this->title = 'Add Entity';
$this->params['breadcrumbs'][] = ['label' => 'Entity List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-entity-list-u-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
