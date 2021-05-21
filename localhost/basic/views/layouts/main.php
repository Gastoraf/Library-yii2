<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\components\TablemenuWidjet;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php $this->registerCsrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
  <link rel="stylesheet" href="css/site.css">
</head>
<body>
  <?php $this->beginBody() ?>

  <div class="wrap" >
    <?php
    NavBar::begin([
      'brandLabel' => false,
      'brandUrl' => Yii::$app->homeUrl,
      'options' => [
        'class' => 'col-md-2',
      ],
    ]);
    echo Nav::widget([
      'options' => ['class' => 'nav nav-stacked col-md-2'],
      'items' => [
        ['label' => 'Главная', 'url' => ['/library/main'],],
        Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId())['admin'] != null ? (
        ['label' => 'Таблицы', 'url' => ['/admin/book']]
        ) : ('<li>'.'</li>'),
        !Yii::$app->user->isGuest ? (
            ['label' => 'Запросы', 'url' => ['/requests/request1']]
        ) : ('<li>'.'</li>'),
        Yii::$app->user->isGuest ? (
            ['label' => 'Войти', 'url' => ['/library/login']]
        ) : (
            '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Выйти из (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>'
        )
      ],
    ]);
    NavBar::end();
    ?>

    <div class="col-md-10" >
      <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <!--  -->
        <?= $content ?>
      </div>
    </div>


    <?php $this->endBody() ?>
  </body>
  </html>
  <?php $this->endPage() ?>
