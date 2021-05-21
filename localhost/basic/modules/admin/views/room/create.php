<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Room */

$this->title = 'Добавить комнату';
$this->params['breadcrumbs'][] = ['label' => 'Комнаты', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Добавить';
?>
<div class="room-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
