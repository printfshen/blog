<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/17
 * Time: 14:59
 */

namespace app\modules\admin\controllers;


use app\common\services\UrlService;
use app\models\admin\Admin;
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
        if (\Yii::$app->request->isGet) {
            return $this->render('login');
        }

        $login_name = trim($this->post("login_name", ""));
        $login_pwd = trim($this->post('login_pwd', ""));


        if (!preg_match("/^[1-9a-zA-Z_-]{4,20}$/", $login_name)) {
            return $this->renderJS('请填写登陆账号', UrlService::buildAdminUrl('/user/login'));
        }

        if (mb_strlen($login_pwd, 'utf-8') <= 0) {
            return $this->renderJS('请填写密码', UrlService::buildAdminUrl('/user/login'));
        }

        $user_model = new Admin();
        $user_info = $user_model->getInfo(['login_name' => $login_name]);
        if (!$user_info) {
            return $this->renderJS('用户不存在', UrlService::buildAdminUrl('/user/login'));
        }

        if (!$user_info->verifyPassword($login_pwd)) {
            return $this->renderJS('密码不正确,请重试', UrlService::buildAdminUrl('/user/login'));
        }

        //todo  设置登陆状态
        $this->setLoginStatus($user_info);

        return $this->redirect(UrlService::buildAdminUrl("/"));
    }


    /**
     * 退出登陆
     */
    public function actionLoginOut()
    {
        $this->removeSession($this->auth_session_name);
        $this->redirect(UrlService::buildAdminUrl('/user/login'));
    }
}