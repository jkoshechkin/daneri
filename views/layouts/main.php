<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <meta name="author" content="jkoshechkin">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="shortcut icon" href="/favs/favicon16.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="/favs/favicon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favs/favicon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favs/favicon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favs/favicon-152.png">
</head>
<body>
<?php $this->beginBody() ?>

<div class="loaderArea">
    <div class="loader"></div>
</div>

<div class="site-header" style="z-index: 10000">
    <div class="container">
        <div class="main-header">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-10">
                    <div class="logo">
                        <a href="<?=\yii\helpers\Url::home()?>">
                            <img src="/images/logo.png" alt="travel html5 template" title="travel html5 template">
                        </a>
                    </div> <!-- /.logo -->
                </div> <!-- /.col-md-4 -->
                <div class="col-md-9 col-sm-6 col-xs-2">
                    <div class="main-menu">
                        <ul class="visible-lg visible-md">
                            <li class="lang-select">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?=Yii::$app->language;?>
                                    </button>
                                    <?= app\modules\languages\widgets\ListWidget::widget(['tpl_lang' => 'but-list']) ?>
                                </div>
                            </li>
                            <?php if(Yii::$app->controller->action->id=='index'):?><li class="active menu-but"><a href="<?=\yii\helpers\Url::home()?>"><?=Yii::t('app', 'Home')?></a></li><? else:?><li class="menu-but"><a href="<?=\yii\helpers\Url::home()?>"><?=Yii::t('app', 'Home')?></a></li><?php endif;?>
                            <?php if(Yii::$app->controller->action->id=='trips' OR Yii::$app->controller->action->id=='trip-view'):?><li class="active menu-but"><a href="<?=\yii\helpers\Url::to(['/trips'])?>"><?=Yii::t('app', 'Trips')?></a></li><? else:?><li class="menu-but"><a href="<?=\yii\helpers\Url::to(['/trips'])?>"><?=Yii::t('app', 'Trips')?></a></li><?php endif;?>
                            <?php if(Yii::$app->controller->action->id=='offers' OR Yii::$app->controller->action->id=='offer-view'):?><li class="active menu-but"><a href="<?=\yii\helpers\Url::to(['/offers'])?>"><?=Yii::t('app', 'Our offer')?></a></li><? else:?><li class="menu-but"><a href="<?=\yii\helpers\Url::to(['/offers'])?>"><?=Yii::t('app', 'Our offer')?></a></li><?php endif;?>
                            <?php if(Yii::$app->controller->action->id=='booking'):?><li class="active menu-but"><a href="<?=\yii\helpers\Url::to(['/booking'])?>"><?=Yii::t('app', 'Booking')?></a></li><? else:?><li class="menu-but"><a href="<?=\yii\helpers\Url::to(['/booking'])?>"><?=Yii::t('app', 'Booking')?></a></li><?php endif;?>
                            <?php if(Yii::$app->controller->action->id=='contacts'):?><li class="active menu-but"><a href="<?=\yii\helpers\Url::to(['/contacts'])?>"><?=Yii::t('app', 'Contacts')?></a></li><? else:?><li class="menu-but"><a href="<?=\yii\helpers\Url::to(['/contacts'])?>"><?=Yii::t('app', 'Contacts')?></a></li><?php endif;?>
                        </ul>

                        <a href="#" class="toggle-menu visible-sm visible-xs">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div> <!-- /.main-menu -->
                </div> <!-- /.col-md-8 -->
            </div> <!-- /.row -->
        </div> <!-- /.main-header -->
        <div class="row">
            <div class="col-md-12 visible-sm visible-xs">
                <div class="menu-responsive">
                    <ul>
                        <?php if(Yii::$app->controller->action->id=='index'):?><li class="active"><a href="<?=\yii\helpers\Url::home()?>"><?=Yii::t('app', 'Home')?></a></li><? else:?><li><a href="<?=\yii\helpers\Url::home()?>"><?=Yii::t('app', 'Home')?></a></li><?php endif;?>
                        <?php if(Yii::$app->controller->action->id=='trips' OR Yii::$app->controller->action->id=='trip-view'):?><li class="active"><a href="<?=\yii\helpers\Url::to(['/trips'])?>"><?=Yii::t('app', 'Trips')?></a></li><? else:?><li><a href="<?=\yii\helpers\Url::to(['/trips'])?>"><?=Yii::t('app', 'Trips')?></a></li><?php endif;?>
                        <?php if(Yii::$app->controller->action->id=='offers' OR Yii::$app->controller->action->id=='offer-view'):?><li class="active"><a href="<?=\yii\helpers\Url::to(['/offers'])?>"><?=Yii::t('app', 'Our offer')?></a></li><? else:?><li><a href="<?=\yii\helpers\Url::to(['/offers'])?>"><?=Yii::t('app', 'Our offer')?></a></li><?php endif;?>
                        <?php if(Yii::$app->controller->action->id=='booking'):?><li class="active"><a href="<?=\yii\helpers\Url::to(['/booking'])?>"><?=Yii::t('app', 'Booking')?></a></li><? else:?><li><a href="<?=\yii\helpers\Url::to(['/booking'])?>"><?=Yii::t('app', 'Booking')?></a></li><?php endif;?>
                        <?php if(Yii::$app->controller->action->id=='contacts'):?><li class="active"><a href="<?=\yii\helpers\Url::to(['/contacts'])?>"><?=Yii::t('app', 'Contacts')?></a></li><? else:?><li><a href="<?=\yii\helpers\Url::to(['/contacts'])?>"><?=Yii::t('app', 'Contacts')?></a></li><?php endif;?>
                        <li><strong><?=Yii::t('app', 'select language')?></strong></li>
                        <li><?= app\modules\languages\widgets\ListWidget::widget() ?></li>
                    </ul>
                </div> <!-- /.menu-responsive -->
            </div> <!-- /.col-md-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.site-header -->


<?= $content; ?>


<div class="partner-list">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-4 col-xs-6">
                <div class="partner-item">
                    <img src="/images/partners/partner1.png" alt="">
                </div> <!-- /.partner-item -->
            </div> <!-- /.col-md-2 -->
            <div class="col-md-2 col-sm-4 col-xs-6">
                <div class="partner-item">
                    <img src="/images/partners/partner2.png" alt="">
                </div> <!-- /.partner-item -->
            </div> <!-- /.col-md-2 -->
            <div class="col-md-2 col-sm-4 col-xs-6">
                <div class="partner-item">
                    <img src="/images/partners/partner3.png" alt="">
                </div> <!-- /.partner-item -->
            </div> <!-- /.col-md-2 -->
            <div class="col-md-2 col-sm-4 col-xs-6">
                <div class="partner-item">
                    <img src="/images/partners/partner1.png" alt="">
                </div> <!-- /.partner-item -->
            </div> <!-- /.col-md-2 -->
            <div class="col-md-2 col-sm-4 col-xs-6">
                <div class="partner-item">
                    <img src="/images/partners/partner2.png" alt="">
                </div> <!-- /.partner-item -->
            </div> <!-- /.col-md-2 -->
            <div class="col-md-2 col-sm-4 col-xs-6">
                <div class="partner-item last">
                    <img src="/images/partners/partner3.png" alt="">
                </div> <!-- /.partner-item -->
            </div> <!-- /.col-md-2 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.partner-list -->



<div class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4" style="margin-top: -50px;">
                <div class="footer-logo">
                    <a href="<?=\yii\helpers\Url::home()?>">
                        <img src="/images/logo_foot.png" alt="">
                    </a>
                </div>
            </div> <!-- /.col-md-4 -->
            <div style="font-size: 14px; text-align: center;" class="col-md-4 col-sm-4">

                © www.daneriyachts.com 2018



            </div> <!-- /.col-md-4 -->
            <div class="col-md-4 col-sm-4">
                <ul class="social-icons">
                    <li><a href="#" class="fa fa-facebook"></a></li>
                    <li><a href="#" class="fa fa-twitter"></a></li>
                    <li><a href="#" class="fa fa-linkedin"></a></li>
                    <li><a href="#" class="fa fa-flickr"></a></li>
                    <li><a href="#" class="fa fa-rss"></a></li>
                </ul>
            </div> <!-- /.col-md-4 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.site-footer -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
