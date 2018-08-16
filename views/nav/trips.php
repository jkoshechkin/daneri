<div class="page-top" id="templatemo_services">
</div> <!-- /.page-header -->

<div class="container" style="margin-top: 50px">
    <div class="row">

        <?php foreach ($categories as $category):
                $image = $category->getImage();?>
        <a href="<?=\yii\helpers\Url::to(['trip-view', 'id' => $category->id])?>">
        <div class="trip-info">
            <div class="col-md-8">
                <img style="width: 100%" src="<?=$image->getUrl('1600x780')?>" alt="<?=$art_array[$category->id]['title']?>">
            </div>
            <div class="col-md-4">
                <div class="trip-info-caption">
                    <h3 class="title"><?=Yii::t('app', 'DAILY TRIPS TO')?> <?=$art_array[$category->id]['title']?></h3>
                    <p><?=$art_array[$category->id]['minicontent']?></p>
                    <!--<p>Take a deep breath and swim at the idyllic Kolokitha beach at Kavos Krios, completing your wonderful sailing trip in an earthly paradise that combines beauty and history. During the sailing trip you will have the opportunity to sunbathe, swim and snorkel or fish.</p>-->
                </div>
            </div>
        </div></a>

        <?php endforeach;?>

    </div> <!-- /.row -->
</div> <!-- /.container -->