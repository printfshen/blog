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

        if ($error){
            $model_error_log->err_code = $error->getCode();

            if (isset($error->statusCode))
                $model_error_log->http_code = $error->statusCode;

            if (method_exists($error, "getName"))
                $model_error_log->err_name = $error->getName();

            $model_error_log->created_time = date("Y-m-d H:i:s");

            $model_error_log->save();
        }
    }
}