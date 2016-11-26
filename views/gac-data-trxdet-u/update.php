<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GacDataTrxdetU */

$this->title = 'Update Transaction Number: ' . $model->TransCtrlNum;
$this->params['breadcrumbs'][] = ['label' => 'Transactions List', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TransCtrlNum, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>  

<?=

$this->render('_form', [
    'model' => $model,
])
?>

