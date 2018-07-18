<?php
/**
 * Created by PhpStorm.
 * User: ehailuo
 * Date: 2018/7/10
 * Time: 11:34
 */

namespace app\modules\admin\controllers;


use app\modules\admin\controllers\common\BaseController;

class WaterController extends BaseController
{
    /**
     * 水印
     */
    public function actionIndex()
    {
        if (\Yii::$app->request->isPost){
            var_dump($_POST);exit;
        }
        return $this->render("index");
    }
}