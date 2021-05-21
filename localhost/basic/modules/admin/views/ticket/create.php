<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Ticket */

$this->title = 'Создание билета';
$this->params['breadcrumbs'][] = ['label' => 'Админка', 'url' => ['/admin/default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Билеты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'schedule' => $schedule
    ]) ?>

</div>
