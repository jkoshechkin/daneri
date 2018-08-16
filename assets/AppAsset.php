<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '//fonts.googleapis.com/css?family=Open+Sans:400,800,700,600,300',
        'css/site.css',
        'css/animate.css',
//        'css/bootstrap.min.css',
        'css/font-awesome.css',
        'css/templatemo_misc.css',
        'css/templatemo_style.css',
        'css/colorbox.css',
//        'css/dist/fullcalendar.print.css',
//        'css/dist/fullcalendar.css'

    ];
    public $js = [
        'js/main.js',
        'js/plugins.js',
//        'js/bootstrap.js',
        'js/min/main.min.js',
        'js/min/plugins.min.js',
//        'js/vendor/jquery.gmap3.min.js',
//        'js/vendor/jquery-1.11.0.min.js',
//        'js/dist/jquery-3.3.1.js',
//        'js/vendor/modernizr-2.6.1-respond-1.1.0.min.js',
        'js/jquery.colorbox.js',
//        'js/instafeed.min.js',
//        'js/bootstrap-datetimepicker.js',
//        'js/dist/fullcalendar.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
