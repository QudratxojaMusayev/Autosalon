<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Position */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Positsiyalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="position-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Yangilash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a("O'chirish", ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code',
            'description',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>