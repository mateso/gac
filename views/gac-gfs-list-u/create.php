<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GacGfsListU */

$this->title = 'Add GFS List';
$this->params['breadcrumbs'][] = ['label' => 'GFS List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-gfs-list-u-create">
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
