<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/18
 * Time: 14:10
 */

namespace app\modules\admin\controllers;


use app\modules\admin\controllers\common\BaseController;

class DashboardController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}