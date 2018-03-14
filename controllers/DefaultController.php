<?php

namespace app\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    /**
     * 默认首页
     * @return string
     */
    public function actionIndex()
    {
        return "默认页面";
    }
}
