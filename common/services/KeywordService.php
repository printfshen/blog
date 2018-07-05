<?php
/**
 * Created by PhpStorm.
 * User: ehailuo
 * Date: 2018/7/5
 * Time: 9:38
 */

namespace app\common\services;


use app\models\config\Config;

class KeywordService extends BaseService
{
    /**
     * 屏蔽操作方法
     * @param $str  需要验证的字符串
     * @param string $type   todo 做分支操作 暂时没用
     * @return bool|false|int
     */
    public static function shieldWord($str, $type = "1")
    {
        $string = strtolower($str);
        $keyWords = Config::find()->where(['name' => 'keywords'])->select('value')->one();
        if ($keyWords) {
            $keyWordArray = explode(",", $keyWords->value);
            if ($keyWordArray) {
                foreach ($keyWordArray as $_item) {
                    return preg_match('/' . $_item . '/iu', $string);
                }
            }
        }
        return true;
    }
}