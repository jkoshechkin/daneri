<?php
/**
 * Created by PhpStorm.
 * User: jkosh
 * Date: 10.05.2018
 * Time: 9:57
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;


$date = new DateTime($trip->start);
?>

<div class="page-top" id="templatemo_booking">
</div> <!-- /.page-header -->

<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 style="text-align: center; margin-bottom: 20px;"><?=Yii::t('app', 'Reservation trip on')?> <?=$category->title?> <?=\Yii::$app->formatter->asDatetime($trip->start);?></h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <?php if( Yii::$app->session->hasFlash('success') ): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('success'); ?>
            </div>
        <?php endif;?>
        <?php if( Yii::$app->session->hasFlash('danger') ): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('danger'); ?>
            </div>
        <?php endif;?>
    </div>
    </div>
</div>

<div class="container" style="margin-top: 50px; margin-bottom: 50px">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($appointment, 'fio')->textInput();?>

            <?= $form->field($appointment, 'date')->widget(\kartik\datetime\DateTimePicker::classname(), [
//                'options' => ['placeholder' => 'Start time ...'],
//        'type' => DateTimePicker::TYPE_INLINE,
                'readonly' => true,

                'pluginOptions' => [
                    'autoclose' => true,
//                    'minuteStep' => 15,
                    'minView' => 2,
                    'startView' => 4,
                    'format' => 'yyyy-mm-dd'
//                    'setEndDate' => Yii::$app->formatter->asDatetime(date('Y-m-d'))
                ]
            ]) ?>

<!--            --><?//= $form->field($appointment, 'date')->widget(\yii\jui\DatePicker::classname(), [
//                'clientOptions' => [
//                    'changeYear' => true,
//                    'changeMonth' => true,
//
//                ],
//                'options' => [
//                        'style' =>'border-width:1px; border-radius: 4px; height:34px;',
//                    'class' => 'form-control',
//
//                ]
//            ]) ?>

            <?= $form->field($appointment, 'citizenship')->textInput();?>

            <?= $form->field($appointment, 'passport')->textInput();?>

            <?= $form->field($appointment, 'contacts')->textInput(['placeholder' => Yii::t('app', 'Tel, Viber, WhatsApp, Instagram, Facebook')]);?>

            <?= $form->field($appointment, 'count')->textInput(['placeholder' => Yii::t('app', 'Max count').': '.(\app\models\Trip::MAX_COUNT - $trip->place)]);?>

            <?= $form->field($appointment, 'comments')->textarea(['placeholder' => Yii::t('app', 'Please provide names and passport details of other guests. Write down your eating and rest preferences.'), 'rows' => 4]);?>

            <?= $form->field($appointment, 'code')->textInput(['placeholder' => Yii::t('app', 'Only for hotels!')]);?>


            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

