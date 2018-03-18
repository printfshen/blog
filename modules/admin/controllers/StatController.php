<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/18
 * Time: 19:42
 */

namespace app\modules\admin\controllers;


class StatController
{
    /**
     * 统计数据页面
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}