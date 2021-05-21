<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\components\TablemenuWidjet;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ReaderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Читатели';
//$this->params['breadcrumbs'][] = $this->title;
?>
<?= TablemenuWidjet::widget(); ?>
<div class="reader-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить четателя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'surname',
            [
                'attribute' => 'chair_id',
                'filter' => \app\models\library\Chair::find()->select(['name', 'id'])->indexBy('id')->column(),
                'value' => 'chair.name'
            ],
            [
                'attribute' => 'type_id',
                'filter' => \app\models\library\Type::find()->select(['name', 'id'])->indexBy('id')->column(),
                'value' => 'type.name'
            ],
            [
                'attribute' => 'room_id',
                'filter' => \app\models\library\Room::find()->select(['name', 'id'])->indexBy('id')->column(),
                'value' => 'room.name'
            ],
            // 'chair_id',
            // 'type_id',
            // 'room_id',
            //'deprived_of',
            //'deprived_of_up',
            'registration_date',
            //'departure_date',
            'should',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
