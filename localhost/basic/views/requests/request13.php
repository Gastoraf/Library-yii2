<?php

use app\components\RequestmenuWidjet;
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<?= RequestmenuWidjet::widget(); ?>

<h2>Запрос №13</h2>

<div class="alert" style="background: white">
  Получить перечень и общее число книг, заказанных на межбиблиотечном абонементе за последний месяц, семестр, год.
</div>

<div class="container">
  <div class="row">
    <div class="col-12 col-md-6">
      <?php $form = ActiveForm::begin();
      ?>

      <?= $form->field($filterModel, 'time')->dropDownList(['Месяц' => 'Месяц','Семестр' => 'Семестр','Год' => 'Год'])->label('За какой период:')?>


      <div class="form-group">
        <?= Html::submitButton('Получить', ['class' => 'btn btn-primary', 'name' => 'filter-button']) ?>
      </div>
      <?php ActiveForm::end(); ?>
    </div>
  </div>

  <div class="row">
    <div class="col-12"><b>Всего: <?=$count?></b></div>
    <div class="col-12">
      <? if(count($books) == 0): ?>
      <h3>Ничего не найдено</h3>
    <? else: ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Читатель</th>
          <th scope="col">Книга</th>
          <th scope="col">Дата заказа</th>
          <th scope="col">Дата получения</th>
        </tr>
      </thead>
      <tbody>
        <? foreach ($books as $book): ?>
        <tr>
          <th scope="row"><?=$book['id']?></th>
          <td><?=$book['reader']['name'] . ' ' . $book['reader']['surname']?></td>
          <td><?=$book['name']?></td>
          <td><?=$book['order_date']?></td>
          <td><?=$book['date_of_receiving']?></td>
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
