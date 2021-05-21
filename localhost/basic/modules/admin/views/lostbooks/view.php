<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Lostbooks */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lostbooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lostbooks-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                    'attribute' => 'book_id',
                    'value' => $model->book->name
            ],
            [
                    'attribute' => 'reader_id',
                    'value' => $model->reader->surname
            ],
            [
                    'attribute' => 'room_id',
                    'value' => $model->room->name
            ],
            // 'book_id',
            // 'reader_id',
            // 'room_id',
            'lost_date',
            'reimbursed',
        ],
    ]) ?>

</div>
