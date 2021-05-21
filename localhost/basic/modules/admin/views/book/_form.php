<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'room_id')->dropDownList(\yii\helpers\ArrayHelper::map($room, 'id', 'name'))->label('Комната') ?>

    <?= $form->field($model, 'room_id')->textInput() ?>

    <?= $form->field($model, 'year_of_publishing')->textInput() ?>

    <?= $form->field($model, 'row_number')->textInput() ?>

    <?= $form->field($model, 'rack_number')->textInput() ?>

    <?= $form->field($model, 'shelf_number')->textInput() ?>

    <?= $form->field($model, 'receipt_date')->textInput() ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
