<?php

namespace app\assets;

use yii\web\AssetBundle;

class AdminAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//'css/site.css',
//'web/css/bootstrap.min.css',
//'web/css/bootstrap-grid.min.css',
        'web/css/style.css',

    ];
    public $js = [
        'web/js/bootstrap.min.js',
        'web/js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
