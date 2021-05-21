<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\components\TablemenuWidjet;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\InterlibraryticketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Межбиблиотечные абонименты';
//$this->params['breadcrumbs'][] = $this->title;
?>
<?= TablemenuWidjet::widget(); ?>
<div class="interlibraryticket-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить межбиблиотечный билет', ['create'], ['class' => 'btn btn-success']) ?>
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
                'filter' => \app\models\library\Reader::find()->select(['name', 'id'])->indexBy('id')->column(),
                'value' => 'reader.name'
            ],
            'author',
            'name',
            'year_of_publishing',
            //'order_date',
            //'date_of_receiving',
            //'return_date',
            //'returned',
            //'reimbursed',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
