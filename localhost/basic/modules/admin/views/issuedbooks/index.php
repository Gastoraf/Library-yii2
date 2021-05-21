<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\components\TablemenuWidjet;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\IssuedbooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Использующееся книги';
//$this->params['breadcrumbs'][] = $this->title;
?>
<?= TablemenuWidjet::widget(); ?>
<div class="issuedbooks-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить книгу в использование', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'reader_id',
                'filter' => \app\models\library\Reader::find()->select(['surname', 'name', 'id'])->indexBy('id')->column(),
                'value' => 'reader.surname'
            ],
            [
                'attribute' => 'book_id',
                'filter' => \app\models\library\Book::find()->select(['name', 'id'])->indexBy('id')->column(),
                'value' => 'book.name'
            ],
            // 'reader_id',
            // 'book_id',
            'date_of_issue',
            'issued_before',
            'returned',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
