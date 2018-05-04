<?php
/**
 * 封装引入JS css 文件函数
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/18
 * Time: 11:44
 */

namespace app\common\services;


class StaticService extends BaseService
{
    /**
     * 引入JS 文件
     * @param $path
     * @param $depend
     */
    public static function includeAppJsStatic($path, $depend)
    {
        self::includeAppStatic('js', $path, $depend);
    }

    /**
     * 引入CSS 文件
     * @param $path
     * @param $depend
     */
    public static function includeAppCssStatic($path, $depend)
    {
        self::includeAppStatic('css', $path, $depend);
    }

    /**
     * 引入 公共方法
     * @param $type CSS js
     * @param $path
     * @param $depend
     */
    protected static function includeAppStatic($type, $path, $depend)
    {
        $release_version = defined("RELEASE_VERSION") ? RELEASE_VERSION : time();
        $path = $path . "?ver=".$release_version;
        if ($type == "js"){
            \Yii::$app->getView()->registerJsFile($path, ["depends" => $depend]);
        } elseif ($type == "css") {
            \Yii::$app->getView()->registerCssFile($path, ["depends" => $depend]);
        }
    }
}