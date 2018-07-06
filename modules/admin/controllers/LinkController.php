<?php
/**
 * Created by PhpStorm.
 * User: ehailuo
 * Date: 2018/7/5
 * Time: 14:11
 */

namespace app\modules\admin\controllers;


use app\common\services\ConstantMapService;
use app\models\config\Link;
use app\modules\admin\controllers\common\BaseController;

class LinkController extends BaseController
{
    /**
     * 友情链接列表
     */
    public function actionIndex()
    {
        $status = $this->get('status', '-1');
        $mix_kw = $this->get('mix_kw', '');
        $p = $this->get('p', 1);
        $p = (($p < 1) ? 0 : $p);

        $query = Link::find();
        if ($mix_kw) {
            $query->andWhere(['title' => $mix_kw]);
        }
        if ($status > ConstantMapService::$status_default) {
            $query->andWhere(['status' => $status]);
        }

        $total_res_count = $query->count();
        $total_pages = ceil($total_res_count / $this->page_size);

        $list = $query->offset(($p - 1) * $this->page_size)
            ->limit($this->page_size)->orderBy(['created_time' => SORT_DESC])->all();

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

    public function actionSet()
    {
        if (\Yii::$app->request->isPost) {
            $id = intval($this->post("id", 0));
            $title = trim($this->post("title", ""));
            $url = trim($this->post("url", ""));
            $pics = $this->post("pic", []);
            $remark = trim($this->post("remark", ""));
            $sort = trim($this->post("sort", 1));
            $status = trim($this->post("status", 1));
            $sort = ($sort < 1 ? 1 : $sort);
            $sort = ($sort > 255 ? 255 : $sort);
            $date_now = time();
            if (mb_strlen($title, "utf-8") < 1) {
                $this->renderJson([], "title不能为空", -1);
            }
            if (mb_strlen($url, "utf-8") < 1) {
                $this->renderJson([], "Url不能为空", -1);
            }
            if (count($pics) > 1) {
                return $this->renderJson([], "图片最多上传一张图片，请删除多余的图片提交!", -1);
            }
            if ($id) {
                $link_model = Link::find()->where(['id' => $id])->one();
            } else {
                $link_model = new Link();
                $link_model->created_time = $date_now;
            }
            $link_model->title = $title;
            $link_model->url = $url;
            $link_model->pic = $pics[0];
            $link_model->remark = $remark;
            $link_model->status = $status;
            $link_model->sort = $sort;
            $link_model->updated_time = $date_now;
            $link_model->save(0);
            return $this->renderJson([], "操作成功");
        }
        $id = intval($this->get("id", 0));
        $info = [];
        if ($id) {
            $info = Link::find()->where(["id" => $id])->one();
        }
        return $this->render("set", [
            'info' => $info
        ]);
    }

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

        $info = Link::find()->where(['id' => $id])->one();
        if (!$info) {
            return $this->renderJSON([], "指定link不存在", -1);
        }
        if ($act == "remove") {
            $info->status = 0;
        } else {
            $info->status = 1;
        }
        $info->updated_time = time();
        $info->save(0);
        return $this->renderJson([], "操作成功");
    }
}