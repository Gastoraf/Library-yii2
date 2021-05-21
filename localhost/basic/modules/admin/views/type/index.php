<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\components\TablemenuWidjet;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\TypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
// $this->params['breadcrumbs'][] = $this->title;
?>
<?= TablemenuWidjet::widget(); ?>
<div class="type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
