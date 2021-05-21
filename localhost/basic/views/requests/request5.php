<?php

use app\components\RequestmenuWidjet;
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\db\Query;
?>

<?= RequestmenuWidjet::widget(); ?>

<h2>Запрос №5</h2>

<div class="alert" style="background: white">
  Определить пункт выдачи, на которой самое большое (маленькое)
  число читателей, читателей-задолжников, самая большая сумма задолженности
</div>

<div class="container">
  <div class="row">
    <div class="col-12 col-md-6">
      <?php $form = ActiveForm::begin();
      ?>

      <?= $form->field($filterModel, 'type_of_readers')->dropDownList(['Самое большое число читателей' => 'Самое большое число читателей', 'Самое маленькое число читателей' => 'Самое маленькое число читателей','Самое большое число читателей-задолжников' => 'Самое большое число читателей-задолжников','Самое маленькое число читателей-задолжников' => 'Самое маленькое число читателей-задолжников', 'Cамая большая сумма задолженности'=>'Cамая большая сумма задолженности'])->label('Кафедра:')?>

      <div class="form-group">
        <?= Html::submitButton('Получить', ['class' => 'btn btn-primary', 'name' => 'filter-button']) ?>
      </div>
      <?php ActiveForm::end(); ?>
    </div>
  </div>

  <div class="row">
    <div class="col-12"><b>Всего: <?=$count?></b></div>
    <div class="col-12">
      <? if(count($rooms) == 0): ?>
      <h3>Ничего не найдено</h3>
    <? else: ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Автор</th>
        </tr>
      </thead>
      <tbody>
        <? foreach ($rooms as $room): ?>
        <tr>
          <th scope="row"><?=$room['id']?></th>
          <td><?=$room['name']?></td>
        </tr>
      <? endforeach; ?>
    </tbody>
  </table>
<? endif;?>
</div>
</div>
<div class="row">
  <div class="col-12">
    <?= LinkPager::widget(['pagination' => $pagination]) ?>
  </div>
</div>
</div>
