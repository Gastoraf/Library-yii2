<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Reader */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reader-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'chair_id')->dropDownList(\yii\helpers\ArrayHelper::map($chair, 'id', 'name'))->label('Кафедра') ?>

    <?= $form->field($model, 'type_id')->dropDownList(\yii\helpers\ArrayHelper::map($type, 'id', 'name'))->label('Категория') ?>

    <?= $form->field($model, 'room_id')->dropDownList(\yii\helpers\ArrayHelper::map($room, 'id', 'name'))->label('Комната') ?>

    <?= $form->field($model, 'deprived_of')->textInput() ?>

    <?= $form->field($model, 'deprived_of_up')->textInput() ?>

    <?= $form->field($model, 'registration_date')->textInput() ?>

    <?= $form->field($model, 'departure_date')->textInput() ?>

    <?= $form->field($model, 'should')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
