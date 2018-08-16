<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\bootstrap\Modal;
use kartik\datetime\DateTimePicker;
//use kartik\form\ActiveForm;

//use kartik\widgets\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Trip */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="trip-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'category_id')->dropDownList($items);?>

    <?= $form->field($model, 'start')->widget(DateTimePicker::classname(),[
        'options' => ['placeholder' => 'Start time ...'],
//        'type' => DateTimePicker::TYPE_INLINE,
        'readonly' => true,
        'pluginOptions' => [
            'autoclose' => true,
            'minuteStep' => 15
        ]
    ]) ?>

    <?= $form->field($model, 'end')->widget(DateTimePicker::classname(),[
        'options' => ['placeholder' => 'End time ...'],
//        'type' => DateTimePicker::TYPE_INLINE,
        'readonly' => true,
        'pluginOptions' => [
            'autoclose' => true,
            'minuteStep' => 15
        ]
    ]) ?>

<!--    --><?//= $form->field($model, 'end')->textInput() ?>

<!--    --><?//= $form->field($model, 'place')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
