<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/18
 * Time: 22:07
 */

namespace app\modules\admin\controllers;


use app\modules\admin\controllers\common\BaseController;

class CommentController extends BaseController
{
    /**
     * 文章评论
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}