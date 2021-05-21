<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\TicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = ['label' => 'Админка', 'url' => ['/admin/default/index']];
$this->title = 'Билеты';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .table{
        background: white;
    }
</style>
<div class="ticket-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать билет', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'schedule_id',
                'filter' => \app\models\railway\Schedule::find()->select(['start_point', 'id'])->indexBy('id')->column(),
                'value' => 'schedule.start_point'
            ],
            'buy_datetime',
            'fio_owner',
            'gender_owner',
            'age_owner',
            'luggage_number',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
