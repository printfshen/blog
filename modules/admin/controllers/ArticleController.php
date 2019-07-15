<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/18
 * Time: 20:22
 */

namespace app\modules\admin\controllers;


use app\common\services\TreeService;
use app\models\article\Article;
use app\models\article\ArticleTag;
use app\models\category\Category;
use app\models\tag\Tag;
use app\modules\admin\controllers\common\BaseController;
use app\common\services\ConstantMapService;
use yii\db\Exception;


class ArticleController extends BaseController
{
    /**
     * 文章页面
     * @return string
     */
    public function actionIndex()
    {
        $status = $this->get('status', '-1');
        $mix_kw = $this->get('mix_kw', '');
        $p = $this->get('p', 1);
        $p = (($p < 1) ? 0 : $p);

        $query = Article::find()->joinWith(['category']);
        if ($status > ConstantMapService::$status_default) {
            $query->andWhere([Article::tableName() . '.status' => $status]);
        }

        if ($mix_kw) {
            $title_name = ['like', 'title', $mix_kw];
            $description_mobile = ['like', 'description', $mix_kw];
            $keywords_mobile = ['like', 'keywords', $mix_kw];
            $query->andWhere(['or', $title_name, $description_mobile, $keywords_mobile]);
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

    /**
     *  添加 和 修改
     */
    public function actionSet()
    {
        if (\Yii::$app->request->isGet) {
            $id = $this->get("id", 0);
            $info = $info_tag = [];
            if ($id) {
                $info = Article::findOne(['id' => $id]);
                $info_tag = ArticleTag::find()->where(['article_id' => $id])->asArray()->all();
                $info_tag = array_column($info_tag, 'tag_id');
            }
            $category_list = Category::find()->where(['status' => 1])->asArray()->all();
            $category_list = TreeService::getTree($category_list);

            $tag_list = Tag::find()->where(['status' => 1])->all();

            return $this->render("set", [
                'info' => $info,
                'info_tag' => $info_tag,
                'category_list' => $category_list,
                'tag_list' => $tag_list
            ]);
        }

        $id = intval($this->post("id", 0));
        $c_id = intval($this->post("c_id", 0));
        $keywords = $this->post("keywords", []);
        $pics = $this->post("pics", []);
        $pic = !empty($pics) ? $pics[0] : [];
        $title = trim($this->post("title", ""));
        $description = trim($this->post("description", ""));
        $content = trim($this->post("content", ""));
        $is_top = intval($this->post("is_top", 0));
        $is_original = intval($this->post("is_original", 0));
        $status = intval($this->post("status", 0));
        $date_time = time();

        if ($c_id >= ConstantMapService::$state_mapping) {
            return $this->renderJson([], "请选择分类", -1);
        }
        if (count($keywords) < 1) {
            return $this->renderJson([], "请选择keywords", -1);
        }
        if (count($pics) > 1) {
            return $this->renderJson([], '图片最多上传一张图片，请删除多余的图片提交!', -1);
        }
        if (mb_strlen($title, "utf-8") < 1) {
            return $this->renderJson([], "title不能为空", -1);
        }
        if (mb_strlen($description, "utf-8") < 1) {
            return $this->renderJson([], "简介不能为空", -1);
        }
        if (mb_strlen($content, "utf-8") < 1) {
            return $this->renderJson([], "内容不能为空", -1);
        }

        $keyword = implode(",", $keywords);

        $tr = \Yii::$app->db->beginTransaction();
        try {
            if ($id) {
                $article_model = Article::findOne(['id' => $id]);
                ArticleTag::deleteAll(['article_id' => $id]);
            } else {
                $article_model = new Article();
                $article_model->created_time = $date_time;
            }
            $article_model->c_id = $c_id;
            $article_model->user_id = $this->current_user->id;
            $article_model->pic = $pic;
            $article_model->username = $this->current_user->nickname;
            $article_model->title = $title;
            $article_model->description = $description;
            $article_model->content = $content;
            $article_model->keywords = $keyword;
            $article_model->status = $status;
            $article_model->is_top = $is_top;
            $article_model->is_original = $is_original;
            $article_model->hits = 0;
            $article_model->updated_time = $date_time;
            $article_model->save(0);

            $data = [];
            foreach ($keywords as $_item) {
                array_push($data, [
                    'article_id' => $article_model->id,
                    'tag_id' => $_item
                ]);
            }
            \Yii::$app->db->createCommand()->batchInsert(
                ArticleTag::tableName(),
                ['article_id', 'tag_id'],
                $data
            )->execute();

            $tr->commit();
            return $this->renderJson([], "操作成功");
        } catch (Exception $e) {
            $tr->rollBack();
            return $this->renderJson([], '操作失败', -1);
        }

    }

    /**
     * 删除 和恢复
     */
    public function actionOps()
    {
        $act = $this->post("act", "");
        $id = $this->post("id", 0);
        if (!$id) {
            return $this->renderJSON([], "请选择要操作的文章", -1);
        }

        if (!in_array($act, ['remove', 'recover'])) {
            return $this->renderJSON([], "操作有误，请重试", -1);
        }

        $info = Article::find()->where(['id' => $id])->one();
        if (!$info) {
            return $this->renderJSON([], "指定文章不存在", -1);
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