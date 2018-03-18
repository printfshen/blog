<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/17
 * Time: 14:59
 */

namespace app\modules\admin\controllers;


use app\modules\admin\controllers\common\BaseController;

class UserController extends BaseController
{

    public function actionLogin()
    {
        $this->layout = "login_main";
        return $this->render('login');
    }


}