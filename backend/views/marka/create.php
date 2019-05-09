<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Marka */

$this->title = Yii::t('yii', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Markas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marka-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
