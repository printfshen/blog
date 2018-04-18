<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/17
 * Time: 14:59
 */

namespace app\modules\admin\controllers;


use app\models\form\admin_user_login_form;
use app\modules\admin\controllers\common\BaseController;

class UserController extends BaseController
{
    /**
     * 登陆页面
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = "login_main";
        $user_model = new admin_user_login_form();
        if (\Yii::$app->request->isGet) {
            return $this->render('login', [
                'model' => $user_model
            ]);

        }

        $data_form = $this->post(null);
        $user_model->scenario = 'login';
        $user_model->load(['admin_user_login_form' => $data_form]);

        if (!$user_model->validate()) {
            return $this->render('login', [
                'model' => $user_model
            ]);
        }

        $login_name = trim($this->post("login_name", ""));
        $login_pwd = trim($this->post('login_pwd', ""));
        var_dump($this->post(null));

    }


}