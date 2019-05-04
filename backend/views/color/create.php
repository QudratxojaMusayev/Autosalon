<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \common\models\Color */

$this->title = 'Rang qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Ranglar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="color-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
