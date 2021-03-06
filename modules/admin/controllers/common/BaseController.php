<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/15
 * Time: 16:35
 */

namespace app\modules\admin\controllers\common;


use app\common\components\BaseWebController;
use app\common\services\applog\AppLogService;
use app\common\services\UrlService;
use app\models\admin\Admin;

class BaseController extends BaseWebController
{
    //分页数
    protected $page_size = 25;
    //session name
    protected $auth_session_name = "admin_auth_session";
    //当前用户信息
    protected $current_user = null;
    //平台加密盐
    protected $app_salt = "shenfengshan";
    //不需要验证的方法
    public $allowAllAction = [
        'admin/user/login'
    ];

    public function __construct($id, $module, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->layout = "main";
    }

    /**
     * 控制器前置操作 判断登陆状态 和 用户赋值
     * @param \yii\base\Action $action
     * @return bool
     */
    public function beforeAction($action)
    {
        $is_login = $this->checkLoginStatus();

        if (in_array($action->getUniqueId(), $this->allowAllAction)) {
            return true;
        }

        if (!$is_login) {
            if (\Yii::$app->request->isAjax) {
                return $this->renderJson([], "未登录,请返回用户中心", -302);
            } else {
                return $this->redirect(UrlService::buildAdminUrl('/user/login'));
            }
        }

        //admin 日志记录
        AppLogService::addAppLog($this->current_user['id']);

        return true;
    }


    /**
     * 验证是否登陆
     * @return bool
     */
    public function checkLoginStatus()
    {
        $auth_session = $this->getSession($this->auth_session_name);
        if (!$auth_session) {
            return false;
        }
        list($auth_token, $id) = explode("#", $auth_session);
        if (!$auth_token || !$id) {
            return false;
        }

        if ($id && preg_match("/^\d+$/", $id)) {
            $user_info = Admin::findOne(['id' => $id, 'status' => 1]);
            if (!$user_info) {
                $this->removeAuthToken();
                return false;
            }
            if ($auth_token != $this->geneAuthToken($user_info)) {
                $this->removeAuthToken();
                return false;
            }
            $this->current_user = $user_info;
            \Yii::$app->params['current_user'] = $user_info;
            return true;
        }
        return true;
    }

    /**
     * 移除session
     */
    public function removeAuthToken()
    {
        $this->removeSession($this->auth_session_name);
    }

    /**
     * 设置登陆状态
     * @param $user_info
     */
    public function setLoginStatus($user_info)
    {
        $auth_token = $this->geneAuthToken($user_info);
        $this->setSession($this->auth_session_name, $auth_token . "#" . $user_info['id']);
    }

    /**
     * 生成Token
     * @param $user_info
     * @return string
     */
    public function geneAuthToken($user_info)
    {
        return md5($user_info['login_name'] . $user_info['login_pwd']
            . $user_info['login_salt'] . $this->app_salt);
    }


}