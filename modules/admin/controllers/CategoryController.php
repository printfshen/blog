<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/18
 * Time: 21:37
 */

namespace app\modules\admin\controllers;


use app\common\services\ConstantMapService;
use app\common\services\TreeService;
use app\models\category\Category;
use app\modules\admin\controllers\common\BaseController;

class CategoryController extends BaseController
{
    /**
     * 文章分类
     * @return string
     */
    public function actionIndex()
    {
        $status = $this->get('status', '-1');
        $mix_kw = $this->get('mix_kw', '');
        $p = $this->get('p', 1);
        $p = (($p < 1) ? 0 : $p);

        $query = Category::find();

        if ($status > ConstantMapService::$status_default) {
            $query->andWhere(['status' => $status]);
        }

        if ($mix_kw) {
            $where_name = ['like', 'name', $mix_kw];
            $where_keyword = ['like', 'keyword', $mix_kw];
            $query->andWhere(['or', $where_name, $where_keyword]);
        }

        $total_res_count = $query->count();
        $total_pages = ceil($total_res_count / $this->page_size);

        $list = $query->offset(($p - 1) * $this->page_size)
            ->limit($this->page_size)->asArray()
            ->orderBy(["sort" => SORT_ASC, 'id' => SORT_DESC])->all();

        $list = TreeService::getTree($list);

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
     * 分类修改
     */
    public function actionSet()
    {
        if (\Yii::$app->request->isGet) {
            $id = $this->get("id", 0);
            $info = [];
            $query = Category::find();
            $new_query = clone $query;
            if ($id) {
                $info = $query->where(['id' => $id])->one();
            }
            $list = $new_query->asArray()->orderBy(["sort" => SORT_DESC])->all();
            $list = TreeService::getTree($list);

            return $this->render("set", [
                "info" => $info,
                'list' => $list
            ]);
        }

        $id = intval($this->post("id", 0));
        $f_id = intval($this->post("f_id", 0));
        $name = trim($this->post("name", ""));
        $description = trim($this->post("description", ""));
        $keyword = trim($this->post("keyword", ""));
        $sort = intval($this->post("sort", 255));
        $status = intval($this->post("status", 1));

        if (mb_strlen($name, "utf-8") < 1) {
            return $this->renderJson([], "请填写分类名称", -1);
        }

        $sort = $sort > 255 ? 255 : $sort;
        $sort = $sort < 1 ? 1 : $sort;
        $date_now = time();
        if ($id) {
            $category_model = Category::findOne(['id' => $id]);
        } else {
            $category_model = new Category();
            $category_model->created_time = $date_now;
        }

        $category_model->fid = $f_id;
        $category_model->name = $name;
        $category_model->keyword = $keyword;
        $category_model->description = $description;
        $category_model->sort = $sort;
        $category_model->status = $status;
        $category_model->updated_time = $date_now;
        $category_model->save(0);
        return $this->renderJson([], "操作成功");
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

        $info = Category::find()->where(['id' => $id])->one();
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