<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/4/15
 * Time: 20:16
 */

namespace app\models\form;


use app\models\user\User;
use yii\base\Model;

class admin_user_login_form extends Model
{
    public $login_name;
    public $login_pwd;

    public function rules()
    {
        return [
            [['login_name'], 'required', 'message' => "请输入登陆账号", 'on' => 'login'],
            [['login_pwd'], 'required', 'message' => "请输入密码", 'on' => 'login'],
            ['login_name', 'validateCheckLoginName']
        ];
    }

    public function scenarios()
    {
        return [
            'login' => ['login_name', 'login_pwd'],
        ];
    }

    /**
     * 验证用户和密码
     * @param $attribute
     * @param $params
     */
    public function validateCheckLoginName($attribute, $params)
    {
        $user_model = new User();
        $user_info = $user_model->getUserByLogin_name($this->login_name);

        if (!$user_info) {
            return $this->addError($attribute, '账号不存在');
        }

        if (!$user_info->verifyPassword($this->login_pwd)) {
            return $this->addError('login_pwd', '密码不正确');
        }
    }
}