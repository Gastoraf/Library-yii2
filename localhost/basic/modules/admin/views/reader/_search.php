<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\ReaderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reader-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'surname') ?>

    <?= $form->field($model, 'chair_id') ?>

    <?= $form->field($model, 'type_id') ?>

    <?php echo $form->field($model, 'room_id') ?>

    <?php echo $form->field($model, 'deprived_of') ?>

    <?php echo $form->field($model, 'deprived_of_up') ?>

    <?php echo $form->field($model, 'registration_date') ?>

    <?php  echo $form->field($model, 'departure_date') ?>

    <?php  echo $form->field($model, 'should') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
