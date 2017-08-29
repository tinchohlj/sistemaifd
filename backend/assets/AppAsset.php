<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/main.css',
    ];
    public $js = [
        'js/main.js',
        'js/modal.js',
        'js/table.js',
        'js/yii_overrides.js',       
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',     
        'backend\assets\SweetAlertAsset', 
    ];
}
