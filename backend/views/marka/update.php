<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Marka */

$this->title =  $model->name. ' markasini yangilash';
$this->params['breadcrumbs'][] = ['label' => 'Markalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Yangilash';
?>
<div class="marka-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
