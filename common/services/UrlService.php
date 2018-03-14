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

class UrlService
{
    /**
     * 构建Admin模块所有链接
     * @param $path
     * @param array $params
     */
    public function buildAdminUrl($path, $params = [])
    {
        $path = Url::toRoute(array_merge([$path], $params));
        return "/admin" . $path;
    }

    /**
     * 构建Web模块所有链接
     * @param $path
     * @param array $params
     * @return string
     */
    public function buildWebUrl($path, $params = [])
    {
        $path = Url::toRoute(array_merge([$path], $params));
        return "/web" . $path;
    }

    /**
     * 构建Www模块所有链接
     * @param $path
     * @param array $params
     * @return string
     */
    public function buildWwwUrl($path, $params = [])
    {
        $path = Url::toRoute(array_merge([$path], $params));
        return "/www" . $path;
    }

    /**
     * 空链接
     * @param $path
     * @param array $params
     * @return string
     */
    public function buildNullUrl()
    {
        return "javascript:void(0);";
    }

}