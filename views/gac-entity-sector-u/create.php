<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GacEntitySectorU */

$this->title = 'Create Gac Entity Sector U';
$this->params['breadcrumbs'][] = ['label' => 'Gac Entity Sector Us', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-entity-sector-u-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
