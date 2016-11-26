<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GacGlobPeriodU */

$this->title = 'Add Period';
$this->params['breadcrumbs'][] = ['label' => 'Global Periods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-glob-period-u-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
