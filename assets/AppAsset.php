<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/ionicons.min.css',
        'css/AdminLTE.min.css',
        'css/skins/_all-skins.min.css',
        'plugins/iCheck/flat/blue.css',
        //'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
        'css/site.css',
        'css/jquery.growl.css'
    ];
    public $js = [
        'js/main.js',
        //'plugins/jQuery/jquery-2.2.4.min.js',
        //'js/bootstrap/bootstrap.min.js',
        //'plugins/jQueryUI/jquery-ui.min.js',
        //'js/raphael.min.js',
        //'plugins/sparkline/jquery.sparkline.min.js',
        //'plugins/slimScroll/jquery.slimscroll.min.js',
        //'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        //'plugins/fastclick/fastclick.js',
        //'js/app.min.js',
        //'js/dashboard.js',
        //'js/jquery.growl.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
