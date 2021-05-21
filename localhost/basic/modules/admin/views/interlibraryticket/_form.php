<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Interlibraryticket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="interlibraryticket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reader_id')->textInput() ?>

    <?= $form->field($model, 'reader_id')->dropDownList(\yii\helpers\ArrayHelper::map($reader, 'id', 'name'))->label('Читатель') ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year_of_publishing')->textInput() ?>

    <?= $form->field($model, 'order_date')->textInput() ?>

    <?= $form->field($model, 'date_of_receiving')->textInput() ?>

    <?= $form->field($model, 'return_date')->textInput() ?>

    <?= $form->field($model, 'returned')->dropDownList([ 'Да' => 'Да', 'Нет' => 'Нет', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'reimbursed')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
