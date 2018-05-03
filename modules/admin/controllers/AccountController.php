<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/18
 * Time: 19:26
 */

namespace app\modules\admin\controllers;


use app\common\services\ConstantMapService;
use app\common\services\UrlService;
use app\models\user\User;
use app\modules\admin\controllers\common\BaseController;

class AccountController extends BaseController
{
    /**
     * 管理员列表页面
     * @return string
     */
    public function actionIndex()
    {
        $status = $this->post('status', '-1');
        $mix_kw = $this->post('mix_kw', '');
        $p = $this->post('p');
        $p = $p ? $p : 0;

        $query = User::find();
        if ($status > ConstantMapService::$status_default) {
            $query->andWhere(['status' => $status]);
        }

        if ($mix_kw) {
            $where_name = ['like', 'login_name', $mix_kw];
            $where_mobile = ['like', 'mobile', $mix_kw];
            $query->andWhere(['or', $where_name, $where_mobile]);
        }

        $total_res_count = $query->count();
        $total_pages = ceil($total_res_count / $this->page_size);

        $list = $query->offset(($p - 1) * $this->page_size)
            ->limit($this->page_size)->all();

        return $this->render('index', [
            'list' => $list,
            'status_mapping' => ConstantMapService::$status_mapping,
            'search_conditions' => [
                'mix_ky' => $mix_kw,
                'status' => $status,
                'p' => $p
            ],
            'pages' => [
                'total_count' => $total_res_count,
                'page_size' => $this->page_size,
                'total_page' => $total_pages,
                'p' => $p
            ]
        ]);
    }


    /**
     * 添加和修改
     * @return string
     */
    public function actionSet()
    {
        if (\Yii::$app->request->isGet) {
            $uid = intval($this->get('uid', 0));
            $info = User::findOne(['uid' => $uid]);
            return $this->render('set', [
                'info' => $info
            ]);
        }
        $nickname = trim($this->post("nickname", ""));
        $mobile = trim($this->post("mobile", 0));
        $email = trim($this->post("email", ""));
        $login_name = trim($this->post("login_name", ""));
        $login_pwd = $this->post("login_pwd", "");
        $status = intval($this->post("status", 1));
        $date_now = time();
        $uid = intval($this->post("uid", 0));

        if (!preg_match('/^[a-zA-Z0-9\x{4e00}-\x{9fa5}]{2,20}$/u', $nickname)) {
            return $this->renderJson([], "昵称只支持中文、字母、数字的组合，2-20个字符", -1);
        }
        if (!preg_match('/^1[345678][0-9]{9}$/', $mobile)) {
            return $this->renderJson([], '请输入符合要求的手机号码', -1);
        }
        if (!preg_match('/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/', $email)) {
            return $this->renderJson([], '请输入符合要求的邮箱', -1);
        }
        if (!preg_match('/^[a-zA-z][a-zA-Z0-9]{4,20}$/', $login_name)) {
            return $this->renderJson([], '登陆名只支持字母开头和数字的组合，5-20个字符', -1);
        }
        if (mb_strlen($login_pwd, "utf-8") < 5 || mb_strlen($login_pwd, "utf-8") > 20) {
            return $this->renderJson([], "请输入5-20位的密码", -1);
        }
        if (!in_array($status, [0, 1])) {
            return $this->renderJson([], ConstantMapService::$default_error, -1);
        }
        $has_in = User::find()->where(['login_name' => $login_name])
            ->andWhere(['<>', 'login_name', $login_name])->count();
        if ($has_in) {
            return $this->renderJson([], "登陆名已经存在，请重试", -1);
        }

        $info = User::findOne(['uid' => $uid]);
        if ($info) {
            $user_model = $info;
        } else {
            $user_model = new User();
            $user_model->setSalt();
            $user_model->created_time = $date_now;
        }

        $user_model->nickname = $nickname;
        $user_model->mobile = $mobile;
        $user_model->email = $email;
        $user_model->sex = 0;
        $user_model->avatar = ConstantMapService::$default_avatar;
        $user_model->login_name = $login_name;
        if ($login_pwd != ConstantMapService::$default_pwd) {
            $user_model->setPassword($login_pwd);
        }
        $user_model->status = $status;
        $user_model->updated_time = $date_now;
        $user_model->save(0);
        return $this->renderJson([], "操作成功");
    }


    /**
     * 详细信息
     * @return string
     */
    public function actionInfo()
    {
        $uid = intval($this->get('uid', 0));
        $reback_url = UrlService::buildWebUrl("/account/index");
        if (!$uid) {
            return $this->redirect($reback_url);
        }

        $info = User::findOne(['uid' => $uid]);
        if (!$info) {
            return $this->redirect($reback_url);
        }


        return $this->render('info', [
            'info' => $info
        ]);
    }

    /**
     * 删除 和 恢复
     */
    public function actionOps()
    {
        $act = $this->post("act", "");
        $id = $this->post("id", 0);
        if (!$id) {
            return $this->renderJSON([], "请选择要操作的账号", -1);
        }

        if (!in_array($act, ['remove', 'recover'])) {
            return $this->renderJSON([], "操作有误，请重试", -1);
        }

        $info = User::find()->where(['uid' => $id])->one();
        if (!$info) {
            return $this->renderJSON([], "指定账号不存在", -1);
        }
        if ($act == "remove"){
            $info->status = 0;
        } else {
            $info->status = 1;
        }
        $info->updated_time = time();
        $info->save(0);
        return $this->renderJson([], "操作成功");
    }

}