<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Menu;

AppAsset::register($this);
?>
<?php $this->beginPage();?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <!--    <meta name="viewport" content="width=1024">-->
        <?= Html::csrfMetaTags() ?>
        <title>Админка | <?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>


<!--        <link rel="shortcut icon" href="/assets/favicon.ico" type="image/x-icon">-->
<!--        <link rel="icon" type="image/png" href="/assets/images/fav.png" />-->
<!--        <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">-->
<!--        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/assets/images/favicon-152.png">-->
<!--        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/images/favicon-144.png">-->
<!--        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/assets/images/favicon-120.png">-->
<!--        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/images/favicon-114.png">-->
<!--        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/images/favicon-72.png">-->
<!--        <link rel="apple-touch-icon-precomposed" href="/assets/images/favicon-57.png">-->
        <!--    <meta name="viewport" content="width=device-width, initial-scale=0">-->


    </head>
    <body>
    <?php $this->beginBody() ;

    ?>

    <?= \app\modules\admin\components\AdminPanelWidget::Widget(['tpl_admin' => 'admin-panel'])?>

    <table border="0" width="100%"><tr><td width="10%"></td><td width="80%">
                <!--            <div id="logo-bar"><div class="logo"><a href="--><?//= \yii\helpers\Url::home()?><!--"><img src="/images/logo.png"/></a></div><div class="logo-name"><a href="--><?//= \yii\helpers\Url::home()?><!--"><img src="/images/logo_name.png"/></a></div></div>-->
                <div id="main_space">
                    <div class="container" style="width: 100%">
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

                        <?= $content; ?>
                    </div>
                </div>
            </td><td width="10%"></td></tr>
    </table>

    <a href="<?=yii\helpers\Url::home()?>" class="gotoadmin">Перейти на сайт</a>
    <a href="<?=yii\helpers\Url::to(['/site/logout/'])?>" class="gotoadmin" style="right:120px;">Выйти</a>


    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>