<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\GacDataTrxdetU */

$this->title = $model->TransCtrlNum;
$this->params['breadcrumbs'][] = ['label' => 'Transactions List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Transaction Number <?= Html::encode($this->title) ?></h3>
                <p></p>
                <p>
                    <?php
                    if ($model->ApprovedFlag != 1) {                       
                        echo '<a href="' . Url::to(['update', 'id' => $model->ID]) . '" class = "btn btn-primary"]>Update</a> ';
                        echo '<a href="' . Url::to(['delete', 'id' => $model->ID]) . '" class = "btn btn-danger" method = "post" onclick = "alert("Are you sure you want to delete this item?")"]>Delete</a>';
                    }
                    ?>   
                </p>
            </div>
            <div class="box-body">    
                <?=
                DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        //'ID',
                        //'TransCtrlNum',
                        //'EntityCode',
                        //'BookID',
                        [
                            'attribute' => 'GFSSubchapterCode',
                            'label' => 'GFS Subchapter',
                            'value' => $model::getSubchapterDescByTrxID($model->ID),
                        ],
                        [
                            'attribute' => 'GFSItemCode',
                            'label' => 'GFS Item',
                            'value' => $model::getItemDescByTrxID($model->ID),
                        ],
                        [
                            'attribute' => 'GFSCodeDesc',
                            'label' => 'GFS Description',
                            'value' => $model::getGFSCodeDesc($model->GFSCode),
                        ],
                        [
                            'attribute' => 'ClassificationCode',
                            'visible' => $model->ClassificationCode > 0,
                        ],
                        [
                            'attribute' => 'GFSCode',
                        ],
                        //'ClassificationCode',
                        [
                            'attribute' => 'FiscalYear',
                            'value' => $model->FiscalYear,
                        ],
                        //'NoteNo',
                        'ApprovedBudget',
                        'Reallocation',
                        [
                            'attribute' => 'Actual',
                            'value' => $model->ActualCr != '' ? $model->ActualCr : $model->ActualDr,
                        ],
                        [
                            'attribute' => 'EliminationFlag',
                            'label' => '',
//                            'visible' => $model->EliminationFlag != '',
                            'value' => $model->EliminationFlag == 1 ? 'Actual Within Govt Entity' : 'Actual Outside Govt Entity',
                        ],
                    //'EntryDate',
                    //'EntryUser',
                    //'ApprovedFlag',
                    //'ApprovedDate',
                    //'ApprovalUser',
                    //'PostedFlag',
                    //'PostedUser',
                    //'ClosedFlag',
                    ],
                ])
                ?>
            </div>
            <!-- ./box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
