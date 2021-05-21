<?php
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
?>
<style type="text/css">
A {
  color: black; /* Цвет ссылок */
}
</style>

<div class="wrap">
  <?php
  echo Nav::widget([
    'activateItems' => false,
    'options' => ['class' => 'nav-justified'],
    'items' => [
      ['label' => 'Запрос №1', 'url' => ['/requests/request1']],
    ['label' => 'Запрос №2 ', 'url' => ['/requests/request2']],
    ['label' => 'Запрос №3 ', 'url' => ['/requests/request3']],
    ['label' => 'Запрос №4 ', 'url' => ['/requests/request4']],
    ['label' => 'Запрос №5 ', 'url' => ['/requests/request5']],
    ['label' => 'Запрос №6 ', 'url' => ['/requests/request6']],
    ['label' => 'Запрос №7 ', 'url' => ['/requests/request7']],
    ['label' => 'Запрос №8 ', 'url' => ['/requests/request8']],
    ['label' => 'Запрос №9 ', 'url' => ['/requests/request9']],
    ['label' => 'Запрос №10 ', 'url' => ['/requests/request10']],
    ['label' => 'Запрос №11 ', 'url' => ['/requests/request11']],
    ['label' => 'Запрос №12 ', 'url' => ['/requests/request12']],
    ['label' => 'Запрос №13 ', 'url' => ['/requests/request13']],
  ],
]);
?>


</div>
