<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;

class DocsController extends \yii\web\Controller {

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

    public function actionGvtFinStatCodes2014() {
        $this->downloadFile('Government Finance Statistics Codes 2014.pdf');
    }

    public function actionGvtFinStatManual2014() {
        $this->downloadFile('Government Finance Statistics Manual 2014.pdf');
    }

    public function actionIpsasb2016Vol1() {
        $this->downloadFile('IPSASB-2016-Handbook-Volume-1.pdf');
    }

    public function actionIpsasb2016Vol2() {
        $this->downloadFile('IPSASB-2016-Handbook-Volume-2.pdf');
    }

    public function actionPubSecInstTab2016() {
        $this->downloadFile('Public Sector Institutional Table 2016.pdf');
    }

    public function actionAboutSystem() {
        $this->downloadFile('About GACS v2.1.pdf');
    }

    public function actionHelp() {
        $this->downloadFile('GACS User Guide.pdf');
    }

    public function downloadFile($file) {
        $path = Yii::getAlias('@webroot') . '/books';
        $file = $path . '/' . $file;
        if (file_exists($file)) {
            Yii::$app->response->sendFile($file)->send();
        }
    }

}
