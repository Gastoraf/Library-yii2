<?php

use app\components\RequestmenuWidjet;
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<!-- <style type="text/css">
A {
color: black; /* Цвет ссылок */
}
</style> -->

<!-- <link rel="stylesheet" href="../css/site.css"> -->
<?= RequestmenuWidjet::widget(); ?>
<!-- <style>
body {
background: url(../img/1-w.jpg) repeat-y;
-moz-background-size: 100%;
-webkit-background-size: 100%;
-o-background-size: 100%;
background-size: 100%;
}
</style> -->

<h2>Запрос №1</h2>

<div class="alert" style="background: white">
  Получить перечень и общее число читателей для данного читального зала или абонента,
  либо по всей библиотеке, по признаку принадлежности к кафедре, факультету, курсу, группе.
</div>

<div class="container" style="background: url(../img/1-w.jpg) repeat-y;">
  <div class="row">
    <div class="col-12 col-md-6">
      <?php $form = ActiveForm::begin();?>

      <?= $form->field($filterModel, 'chair')->dropDownList($chairsArr)->label('Кафедра:')?>

      <?= $form->field($filterModel, 'room')->dropDownList($roomsArr)->label('Читальный зал:')?>


      <div class="form-group">
        <?= Html::submitButton('Получить', ['class' => 'btn btn-primary', 'name' => 'filter-button']) ?>
        <?= Html::a('Показать все', ['requests/request1'], ['class' => 'btn btn-success']) ?>
      </div>
      <?php ActiveForm::end(); ?>
    </div>
  </div>

  <div class="row wrap-table">

    <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
      'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        'name',
        'surname',
        [
          'attribute' => 'chair_id',
          'filter' => \app\models\library\Chair::find()->select(['name', 'id'])->indexBy('id')->column(),
          'value' => 'chair.name'
        ],
        [
          'attribute' => 'type_id',
          'filter' => \app\models\library\Type::find()->select(['name', 'id'])->indexBy('id')->column(),
          'value' => 'type.name'
        ],
        [
          'attribute' => 'room_id',
          'filter' => \app\models\library\Room::find()->select(['name', 'id'])->indexBy('id')->column(),
          'value' => 'room.name'
        ],
        // 'chair_id',
        // 'type_id',
        // 'room_id',
        'deprived_of',
        'deprived_of_up',
        'registration_date',
        'departure_date',
        'should',

        ['class' => 'yii\grid\ActionColumn'],
      ],
    ]); ?>
  </div>
</div>
<!-- </div> -->
