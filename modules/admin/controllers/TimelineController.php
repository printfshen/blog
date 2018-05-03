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
        $status = $this->post('status', '-1');
        $mix_kw = $this->post('mix_kw', '');
        $p = $this->post('p');
        $p = $p ? $p : 0;

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
            return $this->render("set");
        }

    }
}