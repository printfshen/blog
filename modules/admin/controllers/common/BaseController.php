<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/15
 * Time: 16:35
 */

namespace app\modules\admin\controllers\common;


use app\common\components\BaseWebController;

class BaseController extends BaseWebController
{
    //分页数
    protected $page_size = 25;
    //session name
    protected $auth_session_name = "admin_auth";
    //当前用户信息
    protected $current_user = null;
    //不需要验证的方法
    public $allowAllAction = [

    ];

    public function __construct($id, $module, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->layout = "main";
    }

    public function beforeAction($action)
    {
        return true;
    }


}