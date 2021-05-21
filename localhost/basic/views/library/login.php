<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Войти';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
  <h1>Вход в админку</h1>

  <?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'layout' => 'horizontal',
    'fieldConfig' => [
      'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
      'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
  ]); ?>

  <?= $form->field($model, 'username')->label('Логин')->textInput(['autofocus' => true]) ?>

  <?= $form->field($model, 'password')->label('Пароль')->passwordInput() ?>

  <?= $form->field($model, 'rememberMe')->checkbox([
    'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ])->label('Запомнить меня') ?>

    <div class="form-group">
      <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
      </div>
    </div>

    <?php ActiveForm::end(); ?>

    <p>Не зарегистрированы?</p>
    <a class="btn btn-default btn" href="/registration" role="button">Регистрация</a>

  </div>
