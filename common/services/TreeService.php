<?php
/**
 * Created by PhpStorm.
 * User: ehailuo
 * Date: 2018/5/10
 * Time: 9:33
 */

namespace app\common\services;


class TreeService extends BaseService
{
    /**
     * 无限分类树形图
     * @param $list
     * @param int $id
     * @param int $lev
     * @return array
     */
    public static function getTree($list, $id = 0, $lev = 1)
    {
        $bx = '---|';
        $trees = array();
        foreach ($list as $v) {
            if ($v['fid'] == $id) {
                $v['_lev'] = $lev;
                $v['_name'] = str_repeat($bx, $lev - 1) . " " . $v['name'];
                $trees[] = $v;
                $trees = array_merge($trees, self::getTree($list, $v['id'], $lev + 1));
            }
        }
        return $trees;
    }

}