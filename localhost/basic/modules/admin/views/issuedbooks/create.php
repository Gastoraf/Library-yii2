<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Issuedbooks */

$this->title = 'Доавить книгу в использование';
$this->params['breadcrumbs'][] = ['label' => 'Использующееся книги', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Добавить';
?>
<div class="issuedbooks-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'reader' => $reader,
        'book' => $book,
    ]) ?>

</div>
