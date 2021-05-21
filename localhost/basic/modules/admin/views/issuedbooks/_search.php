<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\IssuedbooksSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="issuedbooks-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'reader_id') ?>

    <?= $form->field($model, 'book_id') ?>

    <?= $form->field($model, 'date_of_issue') ?>

    <?= $form->field($model, 'issued_before') ?>

    <?php // echo $form->field($model, 'returned') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
