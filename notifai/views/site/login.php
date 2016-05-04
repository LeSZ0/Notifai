<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Por favor, logueate para acceder';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1 class='page-head-line'><?= Html::encode($this->title) ?></h1>

    <h4> Ingresar con Facebook <strong> / </strong>Google :</h4>
    <br />
    <a href="index.html" class="btn btn-social btn-facebook">
        <i class="fa fa-facebook"></i>&nbsp; Cuenta de Facebook
    </a>
    &nbsp;OR&nbsp;
    <a href="index.html" class="btn btn-social btn-google">
        <i class="fa fa-google-plus"></i>&nbsp; Cuenta de Google
    </a>
    <hr />

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [ 
            'template' => "{label}<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-2 col-lg-3\">{input} &nbsp; {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <div class="col-lg-offset-2">
                <?= Html::a('No tengo una cuenta, registrarme ', '/web/usuario/create') ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-11">
                <?= Html::submitButton('Ingresar', ['class' => 'btn btn-info', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

    <div class="col-lg-offset-1" style="color:#999;">
        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
    </div>
</div>
