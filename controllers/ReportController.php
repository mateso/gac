<?php

namespace app\controllers;

class ReportController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionChangesInEquity() {
        return $this->render('changesInEquity', [
                    'entity' => 1.34,
                    'year' => 2015,
                        ]
        );
    }

    public function actionFinancialPerformance() {
        return $this->render('financialPerformance');
    }

    public function actionFinancialPosition() {
        return $this->render('financialPosition');
    }

    public function actionCashFlowStatement() {
        return $this->render('cashFlowStatement');
    }

    public function actionBudgetVsActual() {
        return $this->render('budgetVsActual');
    }

}
