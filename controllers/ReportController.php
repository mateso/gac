<?php

namespace app\controllers;

use Yii;
use app\models\GacGlobPeriodU;
use app\models\ModalConsolidationStatus;
use yii\filters\AccessControl;
use app\models\ModalGfsList;
use app\models\ModalEntityList;
use app\models\ModalReportParameters;
use app\models\ModalEliminationEntries;

class ReportController extends \yii\web\Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'view', 'update'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
        ];
    }

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionFinancialPerformance() {

        $model = new ModalReportParameters();

        if ($model->load(Yii::$app->request->post())) {
            $vote_code = $this->getVoteCode($model);
            $curr_fiscal_yr = $model->fiscal_year;

            return $this->render('financialPerformance', [
                        'vote_code' => $vote_code,
                        'curr_fiscal_yr' => $curr_fiscal_yr,
            ]);
        } else {
            return $this->renderAjax('modalReportParameters', [
                        'model' => $model,
            ]);
        }
    }

    public function actionFinancialPosition() {

        $model = new ModalReportParameters();

        if ($model->load(Yii::$app->request->post())) {
            $vote_code = $this->getVoteCode($model);
            $curr_fiscal_yr = $model->fiscal_year;

            return $this->render('financialPosition', [
                        'vote_code' => $vote_code,
                        'curr_fiscal_yr' => $curr_fiscal_yr,
            ]);
        } else {
            return $this->renderAjax('modalReportParameters', [
                        'model' => $model,
            ]);
        }
    }

    public function actionChangesInEquity() {

        $model = new ModalReportParameters();

        if ($model->load(Yii::$app->request->post())) {
            $vote_code = $this->getVoteCode($model);
            $curr_fiscal_yr = $model->fiscal_year;

            return $this->render('changesInEquity', [
                        'vote_code' => $vote_code,
                        'curr_fiscal_yr' => $curr_fiscal_yr,
            ]);
        } else {
            return $this->renderAjax('modalReportParameters', [
                        'model' => $model,
            ]);
        }
    }

    public function actionCashFlowStatement() {

        $model = new ModalReportParameters();

        if ($model->load(Yii::$app->request->post())) {
            $vote_code = $this->getVoteCode($model);
            $curr_fiscal_yr = $model->fiscal_year;

            return $this->render('cashFlowStatement', [
                        'vote_code' => $vote_code,
                        'curr_fiscal_yr' => $curr_fiscal_yr,
            ]);
        } else {
            return $this->renderAjax('modalReportParameters', [
                        'model' => $model,
            ]);
        }
    }

    public function actionBudgetVsActual() {

        $model = new ModalReportParameters();

        if ($model->load(Yii::$app->request->post())) {
            $vote_code = $this->getVoteCode($model);
            $curr_fiscal_yr = $model->fiscal_year;

            return $this->render('budgetVsActual', [
                        'vote_code' => $vote_code,
                        'curr_fiscal_yr' => $curr_fiscal_yr,
            ]);
        } else {
            return $this->renderAjax('modalReportParameters', [
                        'model' => $model,
            ]);
        }
    }

    public function actionSegmentedFinancialPerformance() {

        $model = new GacGlobPeriodU();

        if ($model->load(Yii::$app->request->post())) {
            $vote_code = 0;
            $curr_fiscal_yr = $model->fiscal_year;
            return $this->render('segmentedFinancialPerformance', [
                        'vote_code' => $vote_code,
                        'curr_fiscal_yr' => $curr_fiscal_yr,
            ]);
        } else {
            return $this->renderAjax('modalSegmentedReport', [
                        'model' => $model,
            ]);
        }
    }

    public function actionSegmentedFinancialPosition() {

        $model = new GacGlobPeriodU();

        if ($model->load(Yii::$app->request->post())) {
            $vote_code = 0;
            $curr_fiscal_yr = $model->fiscal_year;
            return $this->render('segmentedFinancialPosition', [
                        'vote_code' => $vote_code,
                        'curr_fiscal_yr' => $curr_fiscal_yr,
            ]);
        } else {
            return $this->renderAjax('modalSegmentedReport', [
                        'model' => $model,
            ]);
        }
    }

    public function actionSegmentedCashFlowStatement() {

        $model = new GacGlobPeriodU();

        if ($model->load(Yii::$app->request->post())) {
            $vote_code = 0;
            $curr_fiscal_yr = $model->fiscal_year;
            return $this->render('segmentedCashFlowStatement', [
                        'vote_code' => $vote_code,
                        'curr_fiscal_yr' => $curr_fiscal_yr,
            ]);
        } else {
            return $this->renderAjax('modalSegmentedReport', [
                        'model' => $model,
            ]);
        }
    }

    public function actionTrialBalance() {
        $model = new ModalReportParameters();

        if ($model->load(Yii::$app->request->post())) {
            $vote_code = $this->getVoteCode($model);
            $curr_fiscal_yr = $model->fiscal_year;

            return $this->render('trialBalance', [
                        'vote_code' => $vote_code,
                        'curr_fiscal_yr' => $curr_fiscal_yr,
            ]);
        } else {
            return $this->renderAjax('modalReportParameters', [
                        'model' => $model,
            ]);
        }
    }

    public function actionConsolidationStatus() {
        $model = new ModalConsolidationStatus();

        if ($model->load(Yii::$app->request->post())) {
            $status = $model->status;
            $curr_fiscal_yr = $model->curr_fiscal_year;

            return $this->render('consolidationStatus', [
                        'status' => $status,
                        'curr_fiscal_yr' => $curr_fiscal_yr,
            ]);
        } else {
            return $this->renderAjax('modalConsolidationStatus', [
                        'model' => $model,
            ]);
        }
    }

    public function actionEntityList() {
        $model = new ModalEntityList();

        if ($model->load(Yii::$app->request->post())) {
            $SubSectorDescription = $model->sub_sector_description;

            return $this->render('entityList', [
                        'SubSectorDescription' => $SubSectorDescription,
            ]);
        } else {
            return $this->renderAjax('modalEntityList', [
                        'model' => $model,
            ]);
        }
    }

    public function actionGfsList() {
        $model = new ModalGfsList();

        if ($model->load(Yii::$app->request->post())) {
            $classification_desc = $model->classification_desc;
            $subchapter_desc = $model->subchapter_desc;

            return $this->render('gfsList', [
                        'classification_desc' => $classification_desc,
                        'subchapter_desc' => $subchapter_desc,
            ]);
        } else {
            return $this->renderAjax('modalGfsList', [
                        'model' => $model,
            ]);
        }
    }

    public function actionNotes() {
        $model = new ModalReportParameters();

        if ($model->load(Yii::$app->request->post())) {
            $vote_code = $this->getVoteCode($model);
            $curr_fiscal_yr = $model->fiscal_year;

            return $this->render('notes', [
                        'vote_code' => $vote_code,
                        'curr_fiscal_yr' => $curr_fiscal_yr,
            ]);
        } else {
            return $this->renderAjax('modalReportParameters', [
                        'model' => $model,
            ]);
        }
    }

    public function actionEliminationEntries() {
        $model = new ModalEliminationEntries();

        if ($model->load(Yii::$app->request->post())) {
            $report_type = $model->report_type;
            $curr_fiscal_yr = $model->fiscal_year;

            return $this->render('eliminationEntries', [
                        'report_type' => $report_type,
                        'curr_fiscal_yr' => $curr_fiscal_yr,
            ]);
        } else {
            return $this->renderAjax('modalEliminationEntries', [
                        'model' => $model,
            ]);
        }
    }

    public function getVoteCode($model) {
        if (Yii::$app->user->can('consolidator')) {
            if ($model->vote_code == 0) {
                $vote_code = $model->vote_code;
            } elseif ($model->vote_code == 1) {
                $vote_code = $model->entity_sub_sector;
            } else {
                $vote_code = $model->entity_list;
            }
        } else {
            $vote_code = Yii::$app->user->identity->institutional_code;
        }
        return $vote_code;
    }

}
