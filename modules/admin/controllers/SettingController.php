<?php
/**
 * Created by PhpStorm.
 * User: ehailuo
 * Date: 2018/7/4
 * Time: 10:49
 */

namespace app\modules\admin\controllers;


use app\common\services\KeywordService;
use app\models\config\Config;
use app\modules\admin\controllers\common\BaseController;
use yii\db\Exception;

class SettingController extends BaseController
{
    /**
     * 屏蔽词管理
     */
    public function actionKeyword()
    {
        if (\Yii::$app->request->isPost) {
            $keywords = $this->post("keywords", "");
            $data['keywords'] = $keywords;
            Config::UpdateConfig($data);
            return $this->renderJson([], "操作成功");
        }
        $keywords = Config::find()->where(['name' => 'keywords'])->one();
        return $this->render("keyword", [
            'keyword' => $keywords
        ]);
    }
}