<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Interlibraryticket */

$this->title = 'Создать межбиблиотечный абонимент';
$this->params['breadcrumbs'][] = ['label' => 'Межбиблиотечные абонименты', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Добавить';
?>
<div class="interlibraryticket-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'reader' => $reader
    ]) ?>

</div>
