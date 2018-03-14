<?php

namespace app\controllers;

use app\common\components\BaseWebController;

class DefaultController extends BaseWebController
{
    /**
     * 默认首页
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
