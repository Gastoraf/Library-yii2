<?php

use app\components\RequestmenuWidjet;
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>

<?= RequestmenuWidjet::widget(); ?>

<h2>Запрос №11</h2>

<div class="alert" style="background: white">
  Получить перечень читателей, у которых на руках некоторая книга и читателя, который раньше всех ее должен сдать
</div>

<div class="container">
  <div class="row">
    <div class="col-12 col-md-6">
      <?php $form = ActiveForm::begin();?>

        <?= $form->field($filterModel, 'name')->textInput()->label('Название книги:') ?>


        <div class="form-group">
          <?= Html::submitButton('Получить', ['class' => 'btn btn-primary', 'name' => 'filter-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-12"><b>Всего: <?=$count?></b></div>

      <? foreach ($readers2 as $reader2): ?>
      <div class="col-12"><b>Читатель, который должен сдать раньше всех: <?=$reader2['name']?></b></div>
      <? endforeach; ?>

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
<!-- </div> -->
