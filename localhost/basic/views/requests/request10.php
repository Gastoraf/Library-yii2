<?php

use app\components\RequestmenuWidjet;
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\db\Query;
?>

<?= RequestmenuWidjet::widget(); ?>

<h2>Запрос №10</h2>

<div class="alert" style="background: white">
  Определить, есть ли данная книга в наличии на абонементах, и в каком количестве
</div>

<div class="container">
  <div class="row">
    <div class="col-12 col-md-6">
      <?php $form = ActiveForm::begin();
      ?>

      <?= $form->field($filterModel, 'name')->textInput()->label('Название книги:') ?>

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
          <th scope="col">Автор</th>
          <th scope="col">Название</th>
          <th scope="col">Читальный зал</th>
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
