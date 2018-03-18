<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/18
 * Time: 20:22
 */

namespace app\modules\admin\controllers;


use app\modules\admin\controllers\common\BaseController;

class ArticleController extends BaseController
{
    /**
     * 文章页面
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}