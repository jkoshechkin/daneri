<?php
/**
 * Created by PhpStorm.
 * User: jkosh
 * Date: 06.05.2018
 * Time: 8:27
 */

$images = $category->getImages();
//if(!isset($pic_id))
    $pic = $category->getImage();
//else{
//    foreach ($images as $image){
//        if($image->id==$pic_id)
//            $pic = $image;
//    }
//}

?>

<div class="page-top" id="templatemo_services">
</div> <!-- /.page-header -->

<div class="container" style="margin-top: 50px">
    <div class="row">

        <div class="col-md-6 hidden-xs hidden-sm">
            <?php $i=0;
            foreach ($images as $image):?>

                <?php if($i==3): $i=0; endif;?>
                <?php if($i==0): ?>
                    <div class="row">
                        <div class="col-md-4">
                <?endif;?>
                <?php if($i>0): ?>
                    <div class="col-md-4">
                <?endif;?>

                <?php if($image->id!=$pic->id): ?>
                    <div class="user-album-view" id="<?=$image->getUrl()?>">
                        <img src="<?=$image->getUrl('x150')?>">
                        <a class="group3" style="display: none" href="<?=$image->getUrl()?>"></a>
                    </div>
                <?php else:?>
                    <div class="user-album-view pic-selected" id="<?=$image->getUrl()?> " name="click">
                        <img src="<?=$image->getUrl('x150')?>">
                        <!--                        <a class="group3" style="display: none" href="--><?//=$image->getUrl()?><!--"></a>-->
                    </div>
                <?php endif;?>

                <?php if($i==0 OR $i==1): ?>
                    </div>
                <?endif;?>
                <?php if($i==2): ?>
                    </div></div>
                <?endif;?>

            <?php $i++; endforeach; ?>
            <?php if($i<3): ?>
                </div>
            <?endif;?>
        </div>

        <div class="col-md-6">
            <h1 style="text-align: center; margin-bottom: 20px;"><?=Yii::t('app', 'Trip to')?> <?=$article->title;?></h1>
            <?=$article->content;?>
        </div>

        <div class="col-md-12 hidden-xs hidden-sm">
            <table width="100%" border="0">
                <tr>
                    <td valign="middle"  width="70%" style="padding-right: 10px;">
                        <a class="album-main-pic group3" href="<?=$pic->getUrl()?>"><img id="mainpic" style="max-width: 100%; max-height: 500px; display: block; margin-left: auto;
  margin-right: auto;" src="<?=$pic->getUrl()?>"></a>
                    </td>
                    <td valign="middle" width="30%" style="padding-left: 10px;">
                        <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
                            'events' => $events,
                            'id' => 'calendar_list_trip',
                            'defaultView' => 'listWeek',
                            'clientOptions' => [
                                'height' => 350,
                            ],

//                'aspectRatio' =>2,
//                'timeFormat' => 'h(:mm)t',
                            'themeSystem' => 'bootstrap4',
                        ));
                        ?>
                    </td>
                </tr>
            </table>

        </div>
        <div class="gallery-mobile-view owl-carousel hidden-md hidden-lg" style="margin-top: 30px; margin-bottom: 30px;">

            <?php foreach ($images as $image):?>
                <img style="width: 100%" src="<?=$image->getUrl()?>">
            <?php endforeach; ?>

        </div> <!-- /.our-listing -->

        <div class="col-md-4 align-middle hidden-md hidden-lg">

            <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
                'events' => $events,
                'id' => 'calendar_list_trip1',
                'defaultView' => 'listWeek',
                'clientOptions' => [
                    'height' => 'auto',
                ],

    //                'aspectRatio' =>2,
    //                'timeFormat' => 'h(:mm)t',
                'themeSystem' => 'bootstrap4',
            ));
            ?>

        </div>

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="our-view owl-carousel hidden-xs hidden-sm">

            <?php foreach ($offers as $offer):

                            $image = $offer->getImage(); ?>
                        <a href="<?=\yii\helpers\Url::to(['offer-view', 'id' => $offer->id])?>">
                            <div class="list-item">
                                <div class="list-thumb">
                                    <div class="title">
                                        <h4><?=$offer_articles[$offer->id]['title']?></h4>
                                    </div>
                                    <img src="<?=$image->getUrl('270x200')?>" alt="<?=$offer_articles[$offer->id]['title']?>">
                                </div> <!-- /.list-thumb -->
                                <div class="list-content">
                                    <h2 style="margin-top: 10px; font-size: 14px;"><?=$offer_articles[$offer->id]['minicontent']?></h2>
                                    <!--<span>SILVER HOTEL, 4 NIGHTS, 5 STARS</span>-->
                                </div> <!-- /.list-content -->
                            </div> <!-- /.list-item -->
                        </a>

                        <?php endforeach; ?>

        </div> <!-- /.our-listing -->




    </div> <!-- /.row -->
</div> <!-- /.container -->
