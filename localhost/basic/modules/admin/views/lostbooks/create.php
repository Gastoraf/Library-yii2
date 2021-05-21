<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Lostbooks */

$this->title = 'Добавить утерянную книгу';
$this->params['breadcrumbs'][] = ['label' => 'Утерянные книги', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Добавить';
?>
<div class="lostbooks-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'book' => $book,
        'reader' => $reader,
        'room' => $room,
    ]) ?>

</div>
