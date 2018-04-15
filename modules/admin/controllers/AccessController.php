<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/18
 * Time: 19:39
 */

namespace app\modules\admin\controllers;


use app\modules\admin\controllers\common\BaseController;

class AccessController extends BaseController
{
    /**
     * 权限管理
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', []);
    }


    public function actionSet()
    {
        return $this->render('set');
    }
}