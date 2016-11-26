<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GacNoteItemrangesU */

$this->title = 'Add Note Item Range';
$this->params['breadcrumbs'][] = ['label' => 'Note Item Ranges', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-note-itemranges-u-create">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
