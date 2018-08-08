<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/18
 * Time: 19:34
 */

namespace app\modules\admin\controllers;


use app\modules\admin\controllers\common\BaseController;

class RoleController extends BaseController
{
    /**
     * 角色管理
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionSet()
    {
        if (\Yii::$app->request->isGet){
            return $this->render('set');
        }
    }
}