<?php

namespace app\models\user;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property string $uid
 * @property string $nickname
 * @property string $mobile
 * @property string $email
 * @property integer $sex
 * @property string $avatar
 * @property string $login_name
 * @property string $login_pwd
 * @property string $login_salt
 * @property integer $status
 * @property string $updated_time
 * @property string $created_time
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sex', 'status'], 'integer'],
            [['updated_time', 'created_time'], 'required'],
            [['updated_time', 'created_time'], 'safe'],
            [['nickname', 'email'], 'string', 'max' => 100],
            [['mobile', 'login_name'], 'string', 'max' => 20],
            [['avatar'], 'string', 'max' => 64],
            [['login_pwd', 'login_salt'], 'string', 'max' => 32],
            [['login_name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
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

    /**
     * 根据login_name查询出 用户信息
     * @param $login_name
     * @return array|null|\yii\db\ActiveRecord
     */
    public function getUserByLogin_name($login_name)
    {
        return static::find()->where(['login_name' => $login_name])->one();
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


}
