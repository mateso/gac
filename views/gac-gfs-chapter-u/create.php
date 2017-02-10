<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GacGfsChapterU */

$this->title = 'Create Gac Gfs Chapter U';
$this->params['breadcrumbs'][] = ['label' => 'Gac Gfs Chapter Us', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gac-gfs-chapter-u-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
