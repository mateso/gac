<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GacDataTrxdetU */

$this->title = 'Add Transaction';
$this->params['breadcrumbs'][] = ['label' => 'Transactions List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



<?=

$this->render('_form', [
    'model' => $model,
])
?>
                        


