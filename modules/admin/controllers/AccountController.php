<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/18
 * Time: 19:26
 */

namespace app\modules\admin\controllers;


use app\modules\admin\controllers\common\BaseController;

class AccountController extends BaseController
{
    /**
     * 管理员列表页面
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}