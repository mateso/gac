<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GacEntitySubSectorU */

$this->title = 'Create Gac Entity Sub Sector U';
$this->params['breadcrumbs'][] = ['label' => 'Gac Entity Sub Sector Us', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-entity-sub-sector-u-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
