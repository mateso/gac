<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\GacGfsSubchapterU;

/* @var $this yii\web\View */
/* @var $model app\models\ModalGfsList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gac-data-trxdet-u-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'classification_desc')->dropDownList(
            ['Transaction' => 'Transaction', 'Holding Gain' => 'Holding Gain',
        'Change Volume' => 'Change Volume', 'Stock' => 'Stock'], [
        'prompt' => 'Select Classification',
    ]);
    ?>          

    <?=
    $form->field($model, 'subchapter_desc')->dropDownList(
            ArrayHelper::map(GacGfsSubchapterU::find()->all(), 'SubChapterDescription', 'SubChapterDescription'), [
        'prompt' => 'Select Sub Chapter',
    ]);
    ?> 

    <div class="form-group">
        <?= Html::submitButton('View Report', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>                       

