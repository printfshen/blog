<?php
/**
 * 构建链接地址
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/14
 * Time: 23:05
 */

namespace app\common\services;


use yii\helpers\Url;

class UrlService extends BaseService
{
    /**
     * 构建Admin模块所有链接
     * @param $path
     * @param array $params
     */
    public static function buildAdminUrl($path, $params = [])
    {
        $domain_config = \Yii::$app->params['domain'];
        $path = Url::toRoute(array_merge([$path], $params));
        return $domain_config['admin'] . $path;
    }

    /**
     * 构建Web模块所有链接
     * @param $path
     * @param array $params
     * @return string
     */
    public static function buildWebUrl($path, $params = [])
    {
        $domain_config = \Yii::$app->params['domain'];
        $path = Url::toRoute(array_merge([$path], $params));
        return $domain_config['web'] . $path;
    }

    /**
     * 构建Www模块所有链接
     * @param $path
     * @param array $params
     * @return string
     */
    public static function buildWwwUrl($path, $params = [])
    {
        $domain_config = \Yii::$app->params['domain'];
        $path = Url::toRoute(array_merge([$path], $params));
        return $domain_config['www'] . $path;
    }

    /**
     * 空链接
     * @param $path
     * @param array $params
     * @return string
     */
    public static function buildNullUrl()
    {
        return "javascript:void(0);";
    }

    /**
     * 上传 图片链接
     * @param $bucket
     * @param $file_key
     * @return string
     */
    public static function buildPicUrl($bucket, $file_key)
    {
        $domain_config = \Yii::$app->params['domain'];
        $upload_config = \Yii::$app->params['upload'];
        return $domain_config['www'] . $upload_config[$bucket] . "/" . $file_key;
    }

    /**
     * 图片链接
     * @param $path
     * @return string
     */
    public static function buildImgUrl($path)
    {
        $domain_config = \Yii::$app->params['domain'];
        return $domain_config['www'] . '/images' . $path;
    }

}