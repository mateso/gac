<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GacNoteItemrangesU */

$this->title = 'Update Gac Note Itemranges U: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Gac Note Itemranges Us', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gac-note-itemranges-u-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
