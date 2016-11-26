<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GacGfsClassificationU */

$this->title = 'Create Gac Gfs Classification U';
$this->params['breadcrumbs'][] = ['label' => 'Gac Gfs Classification Us', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-gfs-classification-u-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
