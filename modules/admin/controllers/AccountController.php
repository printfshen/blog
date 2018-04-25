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
        return $this->render('set');
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

}