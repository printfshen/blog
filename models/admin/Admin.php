<?php

namespace app\models\admin;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property string $id 用户id
 * @property string $nickname 用户名
 * @property string $mobile 手机号码
 * @property string $email 邮箱地址
 * @property int $sex 1：男 2：女 0：没填写
 * @property string $avatar 头像
 * @property string $login_name 登录用户名
 * @property string $login_pwd 登录密码
 * @property string $login_salt 登录密码的随机加密秘钥
 * @property int $status 1：有效 0：无效
 * @property int $updated_time 最后一次更新时间
 * @property int $created_time 插入时间
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sex', 'status', 'updated_time', 'created_time'], 'integer'],
            [['updated_time', 'created_time'], 'required'],
            [['nickname', 'email'], 'string', 'max' => 100],
            [['mobile', 'login_name'], 'string', 'max' => 20],
            [['avatar'], 'string', 'max' => 64],
            [['login_pwd', 'login_salt'], 'string', 'max' => 32],
            [['login_name'], 'unique'],
        ];
    }
    /**
     * 查询一条数据
     * @param $condition
     * @return array|null|\yii\db\ActiveRecord
     */
    public function getInfo($condition)
    {
        return static::find()->where($condition)->one();
    }
    /**
     * 校验密码
     * @param $password
     * @return bool
     */
    public function verifyPassword($password)
    {
        return $this->login_pwd == $this->getSaltPassword($password);
    }
    /**
     * 用户密码加密  规则 md5(password + md5(salt))
     * @param $password
     * @return string
     */
    public function getSaltPassword($password)
    {
        return md5(md5($password) . md5($this->login_salt));
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nickname' => 'Nickname',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'sex' => 'Sex',
            'avatar' => 'Avatar',
            'login_name' => 'Login Name',
            'login_pwd' => 'Login Pwd',
            'login_salt' => 'Login Salt',
            'status' => 'Status',
            'updated_time' => 'Updated Time',
            'created_time' => 'Created Time',
        ];
    }
}
