<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MailerController extends Controller {

    private $from = 'my@gmail.com';
    private $to = 'to@gmail.com';

    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex() {
        \Yii::$app->mailer->compose()
                ->setTo('amateso@mof.go.tz')
                ->setFrom(['augustinomateso@gmail.com' => 'Triple Ds'])
                ->setSubject('This is the test mail,please ignore')
                ->setTextBody('This is the body of the mail')
                ->send();
    }

}
