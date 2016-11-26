<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>

<div class="login-logo" style="margin-top: 2%; font-weight: bold">
    <a href="index.php">Government Accounting Consolidation<br/>System</a>
</div>
<!-- /.login-logo -->
<div class="login-box" style="margin-top: 0%">
    <!--    <div class="login-logo" style="margin-bottom: 5px">
            <a href="index.php">GAC System</a>
        </div>
         /.login-logo -->
    <div class="row" style="height: 130px; text-align: center">
        <img src="../web/images/coa.png" />
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php
        $form = ActiveForm::begin([
                    'id' => 'login-form',
        ]);
        ?>
        <div class="form-group has-feedback">
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        </div>

        <div class="form-group has-feedback">
            <?= $form->field($model, 'password')->passwordInput() ?>
        </div>

        <div class="row">
            <div class="col-xs-4">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>

        <?php ActiveForm::end(); ?>
        <!--<a href="index.php?r=user/forgot-password">I forgot my password</a><br>-->
    </div>
</div>
<!-- /.login-box -->
