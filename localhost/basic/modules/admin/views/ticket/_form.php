<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Ticket */
/* @var $form yii\widgets\ActiveForm */
?>
<style>

    .form-group{
        width: 600px;
        margin: 0 auto;
        color: white;
    }
</style>

<div class="ticket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'schedule_id')->dropDownList(\yii\helpers\ArrayHelper::map($schedule, 'id', 'start_point'))->label('Отправление') ?>

    <?= $form->field($model, 'schedule_id')->dropDownList(\yii\helpers\ArrayHelper::map($schedule, 'id', 'end_point'))->label('Прибытие') ?>

    <?= $form->field($model, 'buy_datetime')->textInput()->label('Дата/время покупки') ?>

    <?= $form->field($model, 'fio_owner')->textInput(['maxlength' => true])->label('ФИО') ?>

    <?= $form->field($model, 'gender_owner')->textInput(['maxlength' => true])->label('Пол') ?>

    <?= $form->field($model, 'age_owner')->textInput()->label('Возраст') ?>

    <?= $form->field($model, 'luggage_number')->textInput()->label('Места для багажа') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
