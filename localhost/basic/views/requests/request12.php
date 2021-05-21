<?php

use app\components\RequestmenuWidjet;
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<?= RequestmenuWidjet::widget(); ?>

<h2>Запрос №12</h2>

<div class="alert" style="background: white">
  Выдать полную информацию о читателе по его фамилии - группу, курс,
  факультет или кафедру, правонарушения, их количество, штрафы, утерянные книги и т.п.
</div>

<div class="container">
  <div class="row">
    <div class="col-12 col-md-6">
      <?php $form = ActiveForm::begin();
      ?>

      <?= $form->field($filterModel, 'surnameReader')->textInput()->label('Фамилия читателя:') ?>

      <div class="form-group">
        <?= Html::submitButton('Получить', ['class' => 'btn btn-primary', 'name' => 'filter-button']) ?>
      </div>
      <?php ActiveForm::end(); ?>
    </div>
  </div>

  <div class="row">
    <div class="col-12"><b>Всего: <?=$count?></b></div>
    <div class="col-12">
      <? if(count($readers) == 0): ?>
      <h3>Ничего не найдено</h3>
    <? else: ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Имя</th>
          <th scope="col">Фамилия</th>
          <th scope="col">Кафедра</th>
          <th scope="col">Категория</th>
          <th scope="col">Читальный зал</th>
          <th scope="col">Зарегистрирован</th>
          <th scope="col">Утерянные книги</th>
          <th scope="col">Правонарушения</th>
          <th scope="col">Должен</th>
        </tr>
      </thead>
      <tbody>
        <? foreach ($readers as $reader): ?>
        <tr>
          <th scope="row"><?=$reader['id']?></th>
          <td><?=$reader['name']?></td>
          <td><?=$reader['surname']?></td>
          <td><?=$reader['chair']['name']?></td>
          <td><?=$reader['type']['name']?></td>
          <td><?=$reader['room']['name']?></td>
          <td><?=$reader['registration_date']?></td>

          <td><? foreach ($books as $book): ?>
          <div class="col-12"><p><?=$book['name']?></p></div>
          <? endforeach; ?></td>

          <td><? print(count($books)) ?></td>
          <td><?=$reader['should']?></td>
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
