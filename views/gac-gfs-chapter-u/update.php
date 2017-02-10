<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GacGfsChapterU */

$this->title = 'Update Gac Gfs Chapter U: ' . $model->ChapterCode;
$this->params['breadcrumbs'][] = ['label' => 'Gac Gfs Chapter Us', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ChapterCode, 'url' => ['view', 'id' => $model->ChapterCode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gac-gfs-chapter-u-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
