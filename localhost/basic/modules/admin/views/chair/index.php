<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\components\TablemenuWidjet;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ChairSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Кафедры';
//$this->params['breadcrumbs'][] = $this->title;
?>
<?= TablemenuWidjet::widget(); ?>
<div class="chair-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить кафедру', ['create'], ['class' => 'btn btn-success']) ?>
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
