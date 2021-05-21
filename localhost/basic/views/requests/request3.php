<?php

use app\components\RequestmenuWidjet;
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\db\Query;
?>

<?= RequestmenuWidjet::widget(); ?>

<h2>Запрос №3</h2>

<div class="alert" style="background: white">
  Получить перечень двадцати наиболее часто заказываемых книг в
  данном читальном зале для данного факультета, для всего вуза.
</div>

<div class="container">
  <div class="row">
    <div class="col-12 col-md-6">
      <?php $form = ActiveForm::begin();
      ?>

      <?= $form->field($filterModel, 'chair')->dropDownList($chairsArr)->label('Кафедра:')?>

      <?= $form->field($filterModel, 'room')->dropDownList($roomsArr)->label('Читальный зал:')?>

      <div class="form-group">
        <?= Html::submitButton('Получить', ['class' => 'btn btn-primary', 'name' => 'filter-button']) ?>
        <?= Html::a('Показать все', ['requests/request3'], ['class' => 'btn btn-success']) ?>
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
          <th scope="col">Автор</th>
          <th scope="col">Название</th>
          <th scope="col">Читальный зал</th>
          <th scope="col">Дата публикации</th>
          <th scope="col">Ряд</th>
          <th scope="col">Стеллаж</th>
          <th scope="col">Полка</th>
          <th scope="col">Всего</th>
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
          <td><?=$book['row_number']?></td>
          <td><?=$book['rack_number']?></td>
          <td><?=$book['shelf_number']?></td>
          <td><?=$book['total']?></td>
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
