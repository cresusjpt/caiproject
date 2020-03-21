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
        //'css/site.css',
        'https://fonts.googleapis.com/css?family=Roboto:300,400,900|Playfair+Display:400,700,900',
        'template_asset/fonts/icomoon/style.css',

        'template_asset/css/bootstrap.min.css',
        'template_asset/css/jquery-ui.css',
        'template_asset/css/owl.carousel.min.css',
        'template_asset/css/owl.theme.default.min.css',
        'template_asset/css/owl.theme.default.min.css',
        'template_asset/css/jquery.fancybox.min.css',
        'template_asset/css/bootstrap-datepicker.css',
        'template_asset/fonts/flaticon/font/flaticon.css',
        'template_asset/css/aos.css',
        'template_asset/css/style.css',
    ];
    public $js = [

        'template_asset/js/jquery-3.3.1.min.js',
        'template_asset/js/jquery-migrate-3.0.1.min.js',
        'template_asset/js/jquery-ui.js',
        'template_asset/js/popper.min.js',
        'template_asset/js/bootstrap.min.js',
        'template_asset/js/owl.carousel.min.js',
        'template_asset/js/jquery.stellar.min.js',
        'template_asset/js/jquery.countdown.min.js',
        'template_asset/js/bootstrap-datepicker.min.js',
        'template_asset/js/jquery.easing.1.3.js',
        'template_asset/js/aos.js',
        'template_asset/js/jquery.fancybox.min.js',
        'template_asset/js/jquery.sticky.js',

        'template_asset/js/main.js'

    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
