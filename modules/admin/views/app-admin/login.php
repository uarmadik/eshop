<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<h1>It will be login form</h1>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'rememberMe')->checkbox([
        'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ]) ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>

<div class="col-lg-offset-1" style="color:#999;">
    You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
    To modify the username/password, please check out the code <code>app\models\User::$users</code>.
</div>
