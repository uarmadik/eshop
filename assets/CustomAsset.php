<?php


namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

class CustomAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
//        'css/bootstrap.css',
        'css/jquery-ui.css',
        'css/gallery.css',
    ];
    public $js = [
//        'js/bootstrap.bundle.js',
        'js/admin.js',
        'js/jquery-ui.js',
        'js/gallery.js',
        'js/hammer.min.js',
        'js/main.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public $jsOptions = ['position' => View::POS_END];

}