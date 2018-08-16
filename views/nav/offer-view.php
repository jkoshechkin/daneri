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

<div class="page-top" id="templatemo_offers">
</div> <!-- /.page-header -->

<div class="container hidden-xs hidden-sm" style="margin-top: 50px">
    <div class="row">

        <div class="col-md-4">
            <?php $i=0;
            foreach ($images as $image):?>

                <?php if($i==2): $i=0; endif;?>
                <?php if($i==0): ?>
                    <div class="row">
                        <div class="col-md-6">
                <?endif;?>
                <?php if($i>0): ?>
                    <div class="col-md-6">
                <?endif;?>

                <?php if($image->id!=$pic->id): ?>
                    <div class="user-album-view" id="<?=$image->getUrl()?>">
                        <img src="<?=$image->getUrl('x150')?>">
                        <a class="group3" style="display: none" href="<?=$image->getUrl()?>"></a>
                    </div>
                <?php else:?>
                    <div class="pic-selected user-album-view" id="<?=$image->getUrl()?>" name="click">
                        <img src="<?=$image->getUrl('x150')?>">
                        <!--                        <a class="group3" style="display: none" href="--><?//=$image->getUrl()?><!--"></a>-->
                    </div>
                <?php endif;?>

                <?php if($i==0): ?>
                    </div>
                <?endif;?>
                <?php if($i==1): ?>
                    </div></div>
                <?endif;?>

            <?php $i++; endforeach; ?>
            <?php if($i<2): ?>
                </div>
            <?endif;?>
        </div>

        <div class="col-md-8">
            <a class="album-main-pic group3" href="<?=$pic->getUrl()?>"><img id="mainpic" style="max-width: 100%; max-height: 500px; display: block; margin-left: auto; margin-right: auto;" src="<?=$pic->getUrl()?>"></a>
        </div>

    </div>
</div>

<div class="container">
    <div class="row">

        <div class="col-md-4 hidden-xs hidden-sm">
            <div class="gallery-mobile-view owl-carousel" style="margin-top: 30px; margin-bottom: 30px;">

                <?php foreach ($trips as $trip): $image = $trip->getImage();?>
                <a href="<?=\yii\helpers\Url::to(['trip-view', 'id' => $trip->id])?>" style="display: block; position: relative">
                    <div style="padding-top: 10px; padding-left: 10px; font-size: 20px; font-weight: bold; color: #595959; background: rgba(250,250,250,0.4); display: block; position: absolute; width: 100%; height: 100%"><?=Yii::t('app', 'Reserve trip to')?> <?=$trip_articles[$trip->id]['title']?></div>
                    <img style="width: 100%" src="<?=$image->getUrl('x250')?>">
                </a>

                <?php endforeach; ?>

            </div> <!-- /.our-listing -->
        </div>
        <div class="col-md-8" style="padding: 30px;">
            <h1 style="text-align: center; margin-bottom: 20px;"><?=$article->title;?></h1>
            <?=$article->content;?>
        </div>
    </div>
</div>


<div class="container hidden-md hidden-lg">
    <div class="row">
        <div class="gallery-mobile-view owl-carousel" style="margin-top: 30px; margin-bottom: 30px;">

            <?php foreach ($images as $image):?>

                        <img style="width: 100%" src="<?=$image->getUrl()?>">


            <?php endforeach; ?>

        </div> <!-- /.our-listing -->

    </div> <!-- /.row -->
</div> <!-- /.container -->
