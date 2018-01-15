<?php


namespace app\assets;

use yii\web\AssetBundle;

class CustomAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootstrap.css',
    ];
    public $js = [
        'js/bootstrap.bundle.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}