<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GacGfsSubchapterU */

$this->title = 'Create Gac Gfs Subchapter U';
$this->params['breadcrumbs'][] = ['label' => 'Gac Gfs Subchapter Us', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-gfs-subchapter-u-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
