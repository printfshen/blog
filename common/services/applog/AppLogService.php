<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/15
 * Time: 8:44
 */

namespace app\common\services\applog;


use app\common\services\UtilService;
use app\models\log\ErrorLog;
use app\models\user\AppAccessLog;

class AppLogService
{
    /**
     * 报错 写入数据库
     * @param $name
     * @param $content
     */
    public static function addErrorLog($name, $content)
    {
        $error = \Yii::$app->errorHandler->exception;
        $model_error_log = new ErrorLog();
        $model_error_log->app_name = $name;
        $model_error_log->content = $content;
        $model_error_log->ip = UtilService::getIp();

        //获取用户 操作系统 浏览器
        if (!empty($_SERVER['HTTP_USER_AGENT']))
            $model_error_log->ua = $_SERVER['HTTP_USER_AGENT'];

        if ($error) {
            $model_error_log->err_code = $error->getCode();

            if (isset($error->statusCode))
                $model_error_log->http_code = $error->statusCode;

            if (method_exists($error, "getName"))
                $model_error_log->err_name = $error->getName();

            $model_error_log->created_time = time();

            $model_error_log->save();
        }
    }


    /**
     * 用户操作日志
     * @param int $uid
     */
    public static function addAppLog($uid = 0)
    {
        $get_params = \Yii::$app->request->get();
        $post_params = \Yii::$app->request->post();
        if (isset($post_params['summary'])) {
            unset($post_params['summary']);
        }

        $target_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : "";

        $referer = \Yii::$app->request->getReferrer();
        $ua = \Yii::$app->request->getUserAgent();

        $access_log = new AppAccessLog();
        $access_log->uid = $uid;
        $access_log->referer_url = $referer ? $referer : "";
        $access_log->target_url = $target_url;
        $access_log->query_params = json_encode(array_merge($get_params, $post_params));
        $access_log->ua = $ua ? $ua : "";
        $access_log->ip = UtilService::getIp();
        $access_log->created_time = time();
        return $access_log->save(0);
    }
}