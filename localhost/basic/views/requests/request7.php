<?php

use app\components\RequestmenuWidjet;
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<?= RequestmenuWidjet::widget(); ?>

<h2>Запрос №7</h2>

<div class="alert" style="background: white">
  Получить перечень и общее число читателей, лишенных права пользования библиотекой, сроком более двух месяцев, во всей библиотеке,
  по признаку принадлежности к кафедре, факультету, курсу, группе, по категориям читателей.
</div>

<div class="container">
  <div class="row">
    <div class="col-12 col-md-6">
      <?php $form = ActiveForm::begin();
      ?>

      <?= $form->field($filterModel, 'chair')->dropDownList($chairsArr)->label('Кафедра:')?>

      <?= $form->field($filterModel, 'room')->dropDownList($roomsArr)->label('Читальный зал:')?>

      <?= $form->field($filterModel, 'type')->dropDownList($typesArr)->label('Категория:')?>

      <div class="form-group">
        <?= Html::submitButton('Получить', ['class' => 'btn btn-primary', 'name' => 'filter-button']) ?>
        <?= Html::a('Показать все', ['requests/request7'], ['class' => 'btn btn-success']) ?>
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
          <th scope="col">Лишенный с</th>
          <th scope="col">Лишенный до</th>
          <th scope="col">Зарегистрирован</th>
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
          <td><?=$reader['deprived_of']?></td>
          <td><?=$reader['deprived_of_up']?></td>
          <td><?=$reader['registration_date']?></td>
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
