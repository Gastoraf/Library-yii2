<?php
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
?>

<div class="wrap">
  <?php
  echo Nav::widget([
    'activateItems' => false,
    'options' => ['class' => 'nav-justified'],
    'items' => [
      ['label' => 'Книги', 'url' => ['/admin/book']],
      ['label' => 'Читатели', 'url' => ['/admin/reader']],
      ['label' => 'Межбиблиотечные абонименты', 'url' => ['/admin/interlibraryticket']],
      ['label' => 'Использующееся книги', 'url' => ['/admin/issuedbooks']],
      ['label' => 'Утерянные книги', 'url' => ['/admin/lostbooks']],
      ['label' => 'Кафедры', 'url' => ['/admin/chair']],
      ['label' => 'Комнаты', 'url' => ['/admin/room']],
      ['label' => 'Категории', 'url' => ['/admin/type']],
    ],
  ]);
  ?>


</div>
