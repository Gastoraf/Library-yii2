<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\components\TablemenuWidjet;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Книги';
//$this->params['breadcrumbs'][] = $this->title;
?>
<?= TablemenuWidjet::widget(); ?>

<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить книгу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'author',
            'name',
            [
                'attribute' => 'room_id',
                'filter' => \app\models\library\Room::find()->select(['name', 'id'])->indexBy('id')->column(),
                'value' => 'room.name'
            ],
            'year_of_publishing',
            'row_number',
            'rack_number',
            'shelf_number',
            'receipt_date',
            'total',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
