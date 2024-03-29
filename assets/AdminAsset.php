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
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public function registerAssetFiles($view)
    {
        $release_version = defined("RELEASE_VERSION") ? RELEASE_VERSION : time();
        $this->css = [
            //Open Sans Font [ OPTIONAL ]
            'https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700',
            //Bootstrap Stylesheet [ REQUIRED ]
            'plugins/nifty-v2.5/demo/css/bootstrap.min.css',
            //Nifty Stylesheet [ REQUIRED ]
            'plugins/nifty-v2.5/demo/css/nifty.css',
            ////Nifty Premium Icon [ DEMONSTRATION ]
            'plugins/nifty-v2.5/demo/css/demo/nifty-demo-icons.min.css',
            //Demo [ DEMONSTRATION ]
            'plugins/nifty-v2.5/demo/css/demo/nifty-demo.min.css',
            //Magic Checkbox [ OPTIONAL ]复选框美化
            'plugins/nifty-v2.5/demo/plugins/magic-check/css/magic-check.min.css',
            //Pace - Page Load Progress Par [OPTIONAL] 网页加载进度条
            'plugins/nifty-v2.5/demo/plugins/pace/pace.min.css',
            //图标样式
            'plugins/nifty-v2.5/demo/plugins/ionicons/css/ionicons.css',
            'plugins/nifty-v2.5/demo/plugins/font-awesome/css/font-awesome.min.css',
            //switchery 开关按钮
            'plugins/switchery/switchery.min.css',
            'css/admin/style.css'
        ];
        $this->js = [
            //Pace - Page Load Progress Par [OPTIONAL] 网页加载进度条
            'plugins/nifty-v2.5/demo/plugins/pace/pace.min.js',
            //jQuery [ REQUIRED ]
            'plugins/nifty-v2.5/demo/js/jquery-2.2.4.min.js',
            //BootstrapJS [ RECOMMENDED ]
            'plugins/nifty-v2.5/demo/js/bootstrap.min.js',
            //NiftyJS [ RECOMMENDED ]
            'plugins/nifty-v2.5/demo/js/nifty.min.js',
            //Demo script [ DEMONSTRATION ]
            'plugins/nifty-v2.5/demo/js/demo/nifty-demo.min.js',
            //Sparkline [ OPTIONAL ]
            'plugins/nifty-v2.5/demo/plugins/sparkline/jquery.sparkline.min.js',
            //switchery 开关按钮
            'plugins/switchery/switchery.min.js',
            'plugins/layer-v3.1.1/layer.js',
            'js/admin/common.js'

        ];
        parent::registerAssetFiles($view);
    }

}
