<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/17
 * Time: 14:59
 */

namespace app\modules\admin\controllers;


use app\models\form\admin_user_login_form;
use app\models\user\User;
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

        $data_form = $this->post(null);

        $user_model = new admin_user_login_form();
        $user_model->scenario = 'login';
        $user_model->load(['admin_user_login_form' => $data_form]);
        if (!$user_model->validate()) {
            var_dump($user_model->errors);
            exit;
        }

        $login_name = trim($this->post("login_name", ""));
        $login_pwd = trim($this->post('login_pwd', ""));
        var_dump($this->post(null));
    }


}