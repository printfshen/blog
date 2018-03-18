<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/18
 * Time: 21:39
 */

namespace app\modules\admin\controllers;


use app\modules\admin\controllers\common\BaseController;

class TagController extends BaseController
{
    /**
     * 文章标签 tag
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}