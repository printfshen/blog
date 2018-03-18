<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/18
 * Time: 21:52
 */

namespace app\modules\admin\controllers;


use app\modules\admin\controllers\common\BaseController;

class TimelineController extends BaseController
{
    /**
     * 时间表
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}