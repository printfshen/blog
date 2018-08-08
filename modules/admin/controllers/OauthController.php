<?php
/**
 * Created by PhpStorm.
 * User: ehailuo
 * Date: 2018/8/7
 * Time: 14:30
 */

namespace app\modules\admin\controllers;


use app\modules\admin\controllers\common\BaseController;

class OauthController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}