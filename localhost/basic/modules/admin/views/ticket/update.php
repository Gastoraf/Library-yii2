<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Ticket */

$this->title = 'Обновление билета: ' . $model->schedule->start_point . ' - ' . $model->schedule->end_point;
$this->params['breadcrumbs'][] = ['label' => 'Админка', 'url' => ['/admin/default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Билеты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="ticket-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'schedule' => $schedule
    ]) ?>

</div>
