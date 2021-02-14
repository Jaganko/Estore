<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;
/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DashboardAsset extends AssetBundle
{
	   public function init() {
        $this->jsOptions['position'] = View::POS_BEGIN;
        parent::init();
    }
	
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        
        'theme-plugin/bootstrap/css/font-awesome.min.css',
        'theme-plugin/bootstrap/css/ionicons.min.css',
        'theme-plugin/assets/css/core.min.css',
        'theme-plugin/assets/css/app.min.css',
        'theme-plugin/assets/css/style.min.css',
    ];
    public $js = [   		
      'theme-plugin/assets/js/core.min.js', 
      'theme-plugin/assets/js/app.min.js',
      'theme-plugin/assets/js/script.min.js',
    ];
	
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
