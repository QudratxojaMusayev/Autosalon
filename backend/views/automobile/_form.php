<?php

use common\models\Marka;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Automobile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="automobile-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'marka_id')->dropDownList(
        ArrayHelper::map(Marka::find()->all(), 'id', 'name'),
        ['prompt' => '-Markani tanlang-',
            'onchange' => '
             $.post("index.php?r=position/lists&id="+$(this).val(),function( data ) 
                   {
                              $( "select#position" ).html( data );
                   });
             ']
    ) ?>

    <?= $form->field($model, 'color_id')->dropDownList(
        ArrayHelper::map(\common\models\Color::find()->all(), 'id', 'description')
    ) ?>

    <?= $form->field($model, 'position_id')->dropDownList(
        ArrayHelper::map(\common\models\Position::find()->all(), 'id', 'description'),
        ['id' => 'position']
    ) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('yii', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
