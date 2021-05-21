<?php

use app\components\RequestmenuWidjet;
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<?= RequestmenuWidjet::widget(); ?>

<h2>Запрос №9</h2>

<div class="alert" style="background: white">
  Получить перечень и общее число книг,
  заказанных данным читателем за последний месяц, семестр, год, список книг, которые у него на руках.
</div>

<div class="container">
  <div class="row">
    <div class="col-12 col-md-6">
      <?php $form = ActiveForm::begin();
      ?>

      <?= $form->field($filterModel, 'nameReader')->textInput()->label('Имя читателя:') ?>

      <?= $form->field($filterModel, 'chair')->dropDownList($chairsArr)->label('Кафедра:')?>

      <?= $form->field($filterModel, 'room')->dropDownList($roomsArr)->label('Читальный зал:')?>

      <?= $form->field($filterModel, 'type')->dropDownList($typesArr)->label('Категория:')?>

      <?= $form->field($filterModel, 'time')->dropDownList(['Месяц' => 'Месяц','Семестр' => 'Семестр','Год' => 'Год'])->label('За какой период:')?>

      <div class="form-group">
        <?= Html::submitButton('Получить', ['class' => 'btn btn-primary', 'name' => 'filter-button']) ?>
      </div>
      <?php ActiveForm::end(); ?>
    </div>
  </div>

  <div class="row">
    <? foreach ($readers as $reader): ?>
    <div class="col-12"><b>Имя читателя: <?=$reader['name']?></b></div>
  <? endforeach; ?>
  <div class="col-12">
    <? if(count($readers) == 0): ?>
    <h3>Ничего не найдено</h3>
  <? else: ?>
<? endif;?>
</div>
</div>

<div class="row">
  <div class="col-12"><b>Количество заказанных книг: <?=count($books)?></b></div>
  <div class="col-12">
    <? if(count($books) == 0): ?>
    <h3>Ничего не найдено</h3>
  <? else: ?>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Автор</th>
        <th scope="col">Название</th>
        <th scope="col">Читальный зал</th>
        <th scope="col">Дата публикации</th>
      </tr>
    </thead>
    <tbody>
      <? foreach ($books as $book): ?>
      <tr>
        <th scope="row"><?=$book['id']?></th>
        <td><?=$book['author']?></td>
        <td><?=$book['name']?></td>
        <td><?=$book['room']['name']?></td>
        <td><?=$book['year_of_publishing']?></td>
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

<div class="row">
  <div class="col-12"><b>На руках: <?=count($bookNow)?></b></div>
  <div class="col-12">
    <? if(count($bookNow) == 0): ?>
    <h3>Ничего не найдено</h3>
  <? else: ?>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Автор</th>
        <th scope="col">Название</th>
        <th scope="col">Читальный зал</th>
        <th scope="col">Дата публикации</th>
      </tr>
    </thead>
    <tbody>
      <? foreach ($bookNow as $bookN): ?>
      <tr>
        <th scope="row"><?=$bookN['id']?></th>
        <td><?=$bookN['author']?></td>
        <td><?=$bookN['name']?></td>
        <td><?=$bookN['room']['name']?></td>
        <td><?=$bookN['year_of_publishing']?></td>
      </tr>
    <? endforeach; ?>
  </tbody>
</table>
<? endif;?>
</div>
</div>
<div class="row">
<div class="col-12">
  <?= LinkPager::widget(['pagination' => $pagination2]) ?>
</div>
</div>
