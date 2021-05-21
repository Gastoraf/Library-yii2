<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Lostbooks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lostbooks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'book_id')->dropDownList(\yii\helpers\ArrayHelper::map($book, 'id', 'name'))->label('Книга') ?>

    <?= $form->field($model, 'reader_id')->dropDownList(\yii\helpers\ArrayHelper::map($reader, 'id', 'surname'))->label('Читатель') ?>

    <?= $form->field($model, 'room_id')->dropDownList(\yii\helpers\ArrayHelper::map($room, 'id', 'name'))->label('Комната') ?>

    <?= $form->field($model, 'lost_date')->textInput() ?>

    <?= $form->field($model, 'reimbursed')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
