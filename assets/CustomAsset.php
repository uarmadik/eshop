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
        'css/jquery-ui.css',
    ];
    public $js = [
//        'js/bootstrap.bundle.js',
        'js/admin.js',
        'js/jquery-ui.js',
        'js/main.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public $jsOptions = ['position' => View::POS_END];

}