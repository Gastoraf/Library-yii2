<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Reader */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Читатели', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="reader-view">

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
            'name',
            'surname',
            [
                    'attribute' => 'chair_id',
                    'value' => $model->chair->name
            ],
            [
                    'attribute' => 'type_id',
                    'value' => $model->type->name
            ],
            [
                    'attribute' => 'room_id',
                    'value' => $model->room->name
            ],
            // 'chair_id',
            // 'type_id',
            // 'room_id',
            'deprived_of',
            'deprived_of_up',
            'registration_date',
            'departure_date',
            'should',
        ],
    ]) ?>

</div>
