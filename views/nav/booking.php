<?php

/**
 * Created by PhpStorm.
 * User: jkosh
 * Date: 07.05.2018
 * Time: 15:23
 */?>

<div class="page-top" id="templatemo_booking">
</div> <!-- /.page-header -->
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-12">
            <h1 style="text-align: center; margin-bottom: 20px;"><?=$statement->title?></h1>
            <?=$statement->content?>
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
        <div class="col-md-12 hidden-xs hidden-sm">

<!--            <div id='calendar'></div>-->

            <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
                'events' => $events,
                'id' => 'calendar',
//                'defaultView' => 'listWeek',
//                'timeFormat' => 'h(:mm)t',
                'themeSystem' => 'bootstrap4',
            ));
            ?>

        </div>

        <div class="col-md-12 hidden-md hidden-lg">

            <!--            <div id='calendar'></div>-->

            <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
                'events' => $events,
                'id' => 'calendar_list',
                'defaultView' => 'listWeek',
//                'timeFormat' => 'h(:mm)t',
                'themeSystem' => 'bootstrap4',
                'clientOptions' => [
                    'height' => 'auto',
                ]
            ));
            ?>

        </div>

    </div>
</div>
