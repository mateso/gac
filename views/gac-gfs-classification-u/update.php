<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GacGfsClassificationU */

$this->title = 'Update Gac Gfs Classification U: ' . $model->ClassificationCode;
$this->params['breadcrumbs'][] = ['label' => 'Gac Gfs Classification Us', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ClassificationCode, 'url' => ['view', 'id' => $model->ClassificationCode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gac-gfs-classification-u-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
