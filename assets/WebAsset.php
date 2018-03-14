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
class WebAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public function registerAssetFiles($view)
    {
        $release_version = define("RELEASE_VERSION") ? RELEASE_VERSION : time();
        $this->css = [

        ];
        $this->js = [

        ];
        parent::registerAssetFiles($view);
    }

}
