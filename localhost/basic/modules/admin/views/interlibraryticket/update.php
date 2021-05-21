<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Interlibraryticket */

$this->title = 'Изменить межбиблиотечный обонимент: ' . $model->reader->name;
$this->params['breadcrumbs'][] = ['label' => 'Межбиблиотечные абонименты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="interlibraryticket-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'reader' => $reader
    ]) ?>

</div>
