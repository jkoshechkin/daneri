<?php

/* @var $this yii\web\View */


?>
<div class="flexslider">
    <ul class="slides">
        <?php foreach ($categories as $category):
            if($category->type==\app\models\Category::PLACE):
                foreach ($articles as $article):
                    if($category->id==$article->category_id):
                        $image = $category->getImage(); ?>
                        <li>
                            <div class="overlay"></div>
                            <img src="<?=$image->getUrl('1600x780')?>" alt="<?=$article->title?>">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5 col-lg-4">
                                        <div class="flex-caption visible-lg">
                                            <!--<span class="price">$8,450</span>-->
                                            <h3 class="title"><?=Yii::t('app', 'DAILY TRIPS TO')?> <?=$article->title?></h3>
                                            <?=$article->minicontent?>
                                            <a href="/trip/<?=$article->category_id?>" class="slider-btn"><?=Yii::t('app', 'Reserve trip to')?> <?=$article->title?></a>
                                        </div>
                                        <div class="flex-caption-mid visible-md"><a href="/trip/<?=$article->category_id?>" class="slider-btn"><?=Yii::t('app', 'Reserve trip to')?> <?=$article->title?></a></div>
                                    </div>
                                </div>
                            </div>
                        </li>
        <?php  endif; endforeach; endif; endforeach; ?>

    </ul>
</div> <!-- /.flexslider -->


<div class="container">
    <div class="trip-list visible-sm visible-xs">

    <?php foreach ($categories as $category):
        if($category->type==\app\models\Category::PLACE):
            foreach ($articles as $article):
                if($category->id==$article->category_id): ?>
                    <a href="/trip/<?=$article->category_id?>" class="list-btn"><?=Yii::t('app', 'Reserve trip to')?> <?=$article->title?></a>
                <?php  endif; endforeach; endif; endforeach; ?>

    </div>
</div>

<div class="container" style="margin-bottom: 30px">
    <div class="row">
        <div class="our-listing owl-carousel">

            <?php foreach ($categories as $category):
            if($category->type==\app\models\Category::OFFERS):
            foreach ($articles as $article):
            if($category->id==$article->category_id):
            $image = $category->getImage(); ?>

            <div class="list-item">
                <div class="list-thumb">
                    <div class="title">
                        <h4><?=$article->title?></h4>
                    </div>
                    <img src="<?=$image->getUrl('270x200')?>" alt="<?=$article->title?>">
                </div> <!-- /.list-thumb -->
                <div class="list-content">
                    <h2 style="margin-top: 10px; font-size: 14px;"><?=$article->minicontent?></h2>
                    <!--<span>SILVER HOTEL, 4 NIGHTS, 5 STARS</span>-->
                    <a href="/offer/<?=$category->id?>" class="price-btn"><?=Yii::t('app', 'Read more')?></a>
                </div> <!-- /.list-content -->
            </div> <!-- /.list-item -->

            <?php  endif; endforeach; endif; endforeach; ?>

        </div> <!-- /.our-listing -->
    </div> <!-- /.row -->
</div> <!-- /.container -->

<!--<div class="middle-content"></div>-->
