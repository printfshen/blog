<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/18
 * Time: 21:37
 */

namespace app\modules\admin\controllers;


use app\modules\admin\controllers\common\BaseController;

class CategoryController extends BaseController
{
    /**
     * 文章分类
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}