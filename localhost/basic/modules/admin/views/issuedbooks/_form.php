<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Issuedbooks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="issuedbooks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reader_id')->dropDownList(\yii\helpers\ArrayHelper::map($reader, 'id', 'surname'))->label('Читатель') ?>

    <?= $form->field($model, 'book_id')->dropDownList(\yii\helpers\ArrayHelper::map($book, 'id', 'name'))->label('Книга') ?>

    <?= $form->field($model, 'date_of_issue')->textInput() ?>

    <?= $form->field($model, 'issued_before')->textInput() ?>

    <?= $form->field($model, 'returned')->dropDownList([ 'Да' => 'Да', 'Нет' => 'Нет', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
