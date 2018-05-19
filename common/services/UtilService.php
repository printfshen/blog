<?php
/**
 * 只封装通用方法
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/15
 * Time: 14:08
 */

namespace app\common\services;


use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

class UtilService extends BaseService
{
    public static function getRootPath()
    {
        $vendor_path = \Yii::$app->vendorPath;
        return dirname($vendor_path);
    }

    /**
     * 获取IP地址
     * @return string
     */
    public static function getIp()
    {
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];

        return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : "";
    }

    /**
     * Yii2中的XSS防范策略封装 原样输出
     * @param $dispaly_text
     * @return string
     */
    public static function encode($dispaly_text)
    {
        return Html::encode($dispaly_text);
    }

    /**
     * Yii2中的XSS防范策略封装 删除XSS攻击代码
     * @param $dispaly_text
     * @return string
     */
    public static function process($dispaly_text)
    {
        return HtmlPurifier::process($dispaly_text);
    }


}