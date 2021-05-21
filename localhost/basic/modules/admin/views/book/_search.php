<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\BookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'author') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'room_id') ?>

    <?= $form->field($model, 'year_of_publishing') ?>

    <?php echo $form->field($model, 'row_number') ?>

    <?php echo $form->field($model, 'rack_number') ?>

    <?php echo $form->field($model, 'shelf_number') ?>

    <?php echo $form->field($model, 'receipt_date') ?>

    <?php echo $form->field($model, 'total') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
