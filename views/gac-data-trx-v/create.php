<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GacDataTrxV */

$this->title = 'Create Gac Data Trx V';
$this->params['breadcrumbs'][] = ['label' => 'Gac Data Trx Vs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-data-trx-v-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
