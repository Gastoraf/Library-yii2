<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\components\TablemenuWidjet;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\LostbooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Утерянные книги';
//$this->params['breadcrumbs'][] = $this->title;
?>
<?= TablemenuWidjet::widget(); ?>
<div class="lostbooks-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить утерянную книгу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'book_id',
                'filter' => \app\models\library\Book::find()->select(['name', 'id'])->indexBy('id')->column(),
                'value' => 'book.name'
            ],
            [
                'attribute' => 'reader_id',
                'filter' => \app\models\library\Reader::find()->select(['surname', 'name', 'id'])->indexBy('id')->column(),
                'value' => 'reader.surname'
            ],
            [
                'attribute' => 'room_id',
                'filter' => \app\models\library\Room::find()->select(['name', 'id'])->indexBy('id')->column(),
                'value' => 'room.name'
            ],
            // 'book_id',
            // 'reader_id',
            // 'room_id',
            'lost_date',
            'reimbursed',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
