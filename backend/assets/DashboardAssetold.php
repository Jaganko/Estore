<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/font-awesome/css/font-awesome.min.css',
        'bootstrap/css/bootstrap.min.css',
        'css/simple-sidebar.css',
    ];
    public $js = [
        'jquery/jquery.min.js',
        'bootstrap/js/bootstrap.bundle.min.js',

    ];

}
