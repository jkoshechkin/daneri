<div class="page-top" id="templatemo_offers">
</div> <!-- /.page-header -->

<div class="container" style="margin-top: 50px">


        <?php $i=0; foreach ($categories as $category):
            $image = $category->getImage();?>
            <?php if($i==2): $i=0; endif;?>

            <?php if($i==0): ?>
                <div class="row">
                    <div class="offer-info">
                    <div class="col-md-6" style="margin-bottom: 50px; padding: 2%">
            <?endif;?>
             <?php if($i==1): ?>
                        <div class="offer-info">
                            <div class="col-md-6" style="margin-bottom: 50px; padding: 2%">
             <?endif;?>
                <a href="<?=\yii\helpers\Url::to(['offer-view', 'id' => $category->id])?>">
                    <img style="width: 100%" src="<?=$image->getUrl('350x260')?>" alt="<?=$art_array[$category->id]['title']?>">

                    <div class="offer-info-caption">
                        <h3 class="title"><?=$art_array[$category->id]['title']?></h3>
                        <p><?=$art_array[$category->id]['minicontent']?></p>
                        <!--<p>Take a deep breath and swim at the idyllic Kolokitha beach at Kavos Krios, completing your wonderful sailing trip in an earthly paradise that combines beauty and history. During the sailing trip you will have the opportunity to sunbathe, swim and snorkel or fish.</p>-->
                    </div>
                </a>

            <?php if($i==0): ?>
            </div></div>
            <?endif;?>
            <?php if($i==1): ?>
            </div></div>
            </div>
            <?endif;?>

        <?php $i++; endforeach;?>

    </div> <!-- /.row -->
</div> <!-- /.container -->