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
use app\models\category\Category;
use app\models\tag\Tag;
use app\modules\admin\controllers\common\BaseController;
use app\common\services\ConstantMapService;


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

        $query = Article::find();
        if ($status > ConstantMapService::$status_default) {
            $query->andWhere(['status' => $status]);
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
            $info = [];
            if ($id) {
                $info = Article::findOne(['id' => $id]);
            }

            $category_list = Category::find()->where(['status' => 1])->asArray()->all();
            $category_list = TreeService::getTree($category_list);

            $tag_list = Tag::find()->where(['status' => 1])->all();

            return $this->render("set", [
                'info' => $info,
                'category_list' => $category_list,
                'tag_list' => $tag_list
            ]);
        }
    }

    /**
     * 删除 和恢复
     */
    public function actionOps()
    {

    }
}