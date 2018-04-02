<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/17
 * Time: 14:59
 */

namespace app\modules\admin\controllers;


use app\models\User;
use app\modules\admin\controllers\common\BaseController;

class UserController extends BaseController
{
    /**
     * 登陆页面
     * @return string
     */
    public function actionLogin()
    {
        if (\Yii::$app->request->isGet) {
            $this->layout = "login_main";


            return $this->render('login');
        }

        $user_model = new User();
        $user_model->scenario = 'login';
        $ret = $user_model->load(\Yii::$app->request->post());
        $user_model->validate();
        var_dump($user_model->errors);

        $login_name = trim($this->post("login_name", ""));
        $login_pwd = trim($this->post('login_pwd', ""));
        var_dump($this->post(null));
    }


}