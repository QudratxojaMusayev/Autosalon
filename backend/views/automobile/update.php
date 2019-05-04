<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Automobile */

$this->title = 'Yangilash : ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Avtomobillar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Yangilash';
?>
<div class="automobile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>