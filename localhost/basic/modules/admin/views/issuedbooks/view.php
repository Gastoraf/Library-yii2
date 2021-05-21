<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Issuedbooks */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Утерянные книги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="issuedbooks-view">

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
                    'attribute' => 'reader_id',
                    'value' => $model->reader->surname
            ],
            [
                    'attribute' => 'book_id',
                    'value' => $model->book->name
            ],
            // 'reader_id',
            // 'book_id',
            'date_of_issue',
            'issued_before',
            'returned',
        ],
    ]) ?>

</div>
