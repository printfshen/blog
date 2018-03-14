<?php

namespace app\controllers;

use app\common\components\BaseWebController;
use yii\log\FileTarget;

class ErrorController extends BaseWebController
{
    /**
     * 默认报错首页
     * @return string
     */
    public function actionError()
    {
        //记录错误信息到文件和数据库
        $this->getError();

        return $this->render('error');
    }


    /**
     * 对报错的处理
     * 写入报错日志
     * 写入数据库
     */
    private function getError()
    {
        //获取报错
        $error = \Yii::$app->errorHandler->exception;
        //写入文件操作
        if ($error) {
            $file = $error->getFile();
            $line = $error->getLine();
            $message = $error->getMessage();
            $code = $error->getCode();

            $log = new FileTarget();
            $log->logFile = \Yii::$app->getRuntimePath() . "/logs/err.log";

            $err_msg = $message . "  [file:{$file}]__[line:{$line}]__[code:{$code}]__"
                . "[url:{$_SERVER['REQUEST_URI']}]__[POST_DATA:"
                . http_build_query($_POST) . "]";

            $log->messages[] = [
                $err_msg,
                1, //错误级别
                'application',
                microtime(true),
            ];
            $log -> export();

            //写入数据库操作
        }
    }

}
