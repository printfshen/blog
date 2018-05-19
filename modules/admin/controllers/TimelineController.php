<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/18
 * Time: 21:52
 */

namespace app\modules\admin\controllers;


use app\common\services\ConstantMapService;
use app\models\timeline\Timeline;
use app\modules\admin\controllers\common\BaseController;

class TimelineController extends BaseController
{
    /**
     * 时间表
     * @return string
     */
    public function actionIndex()
    {
        $status = $this->get('status', '-1');
        $mix_kw = $this->get('mix_kw', '');
        $p = $this->get('p', 1);
        $p = (($p < 1) ? 0 : $p);

        $query = Timeline::find();
        if ($status > ConstantMapService::$status_default) {
            $query->andWhere(['status' => $status]);
        }

        $total_res_count = $query->count();
        $total_pages = ceil($total_res_count / $this->page_size);

        if ($mix_kw) {
            $title_serach = ['like', 'title', $mix_kw];
            $content_serach = ['like', 'content', $mix_kw];
            $query->andWhere(['OR', $title_serach, $content_serach]);
        }

        $list = $query->offset(($p - 1) * $this->page_size)->limit($this->page_size)
            ->all();

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
            $id = intval($this->get("id", 0));
            $info = [];
            if ($id) {
                $info = Timeline::find()->where(["id" => $id])->one();
            }
            return $this->render("set", [
                'info' => $info
            ]);
        }
        $id = intval($this->post("id", 0));
        $title = trim($this->post("title", ""));
        $date = strtotime($this->post("date", date("Y-m-d", time())));
        $content = trim($this->post("content", ""));
        $pics = $this->post("pics", "");
        $pic = !empty($pics) ? $pics[0] : "";
        $status = intval($this->post("status", 1));
        $date_now = time();

        if (!$content) {
            return $this->renderJson([], "请输入内容", -1);
        }
        if (count($pics) > 1) {
            return $this->renderJson([], "图片最多上传一张图片，请删除多余的图片提交!", -1);
        }

        if ($id) {
            $timeline_model = Timeline::findOne(['id' => $id]);
        } else {
            $timeline_model = new Timeline();
            $timeline_model->created_time = $date_now;
        }

        $timeline_model->title = $title;
        $timeline_model->content = $content;
        $timeline_model->pic = $pic;
        $timeline_model->icon = "";
        $timeline_model->status = $status;
        $timeline_model->date = $date;
        $timeline_model->updated_time = $date_now;
        $timeline_model->save(0);
        return $this->renderJson([], "操作成功");
    }


    public function actionOps()
    {
        $act = $this->post("act", "");
        $id = $this->post("id", 0);
        if (!$id) {
            return $this->renderJSON([], "请选择要操作的时间轴", -1);
        }

        if (!in_array($act, ['remove', 'recover'])) {
            return $this->renderJSON([], "操作有误，请重试", -1);
        }

        $info = Timeline::find()->where(['id' => $id])->one();
        if (!$info) {
            return $this->renderJSON([], "指定时间轴不存在", -1);
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