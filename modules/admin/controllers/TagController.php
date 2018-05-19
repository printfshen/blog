<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/18
 * Time: 21:39
 */

namespace app\modules\admin\controllers;


use app\common\services\ConstantMapService;
use app\models\tag\Tag;
use app\modules\admin\controllers\common\BaseController;

class TagController extends BaseController
{
    /**
     * 文章标签 tag
     * @return string
     */
    public function actionIndex()
    {
        $status = $this->get('status', '-1');
        $mix_kw = $this->get('mix_kw', '');
        $p = $this->get('p', 1);
        $p = (($p < 1) ? 0 : $p);

        $query = Tag::find();
        if ($status > ConstantMapService::$status_default) {
            $query->andWhere(['status' => $status]);
        }

        if ($mix_kw) {
            $where_name = ['like', 'name', $mix_kw];
            $query->andWhere(['or', $where_name]);
        }

        $total_res_count = $query->count();
        $total_pages = ceil($total_res_count / $this->page_size);

        $list = $query->offset(($p - 1) * $this->page_size)
            ->limit($this->page_size)->orderBy(['created_time' => SORT_DESC, "id" => SORT_DESC])->all();

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
     * 添加
     * @return string
     */
    public function actionSet()
    {
        if (\Yii::$app->request->isGet) {
            return $this->render("set");
        }
        $tags = $this->post("tags", "");
        $date_now = time();

        if (mb_strlen($tags, "utf-8") < 1) {
            return $this->renderJson([], "标签不能为空", -1);
        }
        $tmp = explode(",", $tags);
        if (!$tmp) {
            return $this->renderJson([], "标签不能为空", -1);
        }
        $data = [];
        foreach ($tmp as $item) {
            $data[] = [
                'name' => $item,
                'status' => 1,
                'updated_time' => $date_now,
                'created_time' => $date_now,
            ];
        }
        \Yii::$app->db->createCommand()->batchInsert(
            Tag::tableName(),
            ['name', 'status', 'updated_time', 'created_time'],
            $data
        )->execute();
        return $this->renderJson([], "操作成功");
    }

    /**
     * 修改
     */
    public function actionEdit()
    {
        if (\Yii::$app->request->isGet) {
            $id = $this->get("id", 0);
            $info = [];
            if ($id) {
                $info = Tag::findOne(['id' => $id]);
            }
            return $this->render("edit", [
                'info' => $info
            ]);
        }

        $id = $this->post("id", 0);
        $name = $this->post("name", "");
        $status = $this->post("status", 0);
        $date_now = time();

        if (mb_strlen($name, "utf-8") < 1) {
            return $this->renderJson([], "请填写名称", -1);
        }

        if (!$id) {
            $tag_model = new Tag();
        } else {
            $tag_model = Tag::findOne(['id' => $id]);
            $tag_model->created_time = $date_now;
        }

        $tag_model->name = $name;
        $tag_model->status = $status;
        $tag_model->updated_time = $date_now;

        $tag_model->save(0);
        return $this->renderJson([], "操作成功");
    }

    /**
     * 删除 和  恢复
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

        $info = Tag::find()->where(['id' => $id])->one();
        if (!$info) {
            return $this->renderJSON([], "指定账号不存在", -1);
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