<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/4/14
 * Time: 21:32
 */

namespace app\common\services;


class ConstantMapService
{
    public static $status_default = -1;
    public static $default_avatar = 'default_avatar';
    public static $default_pwd = "******";
    public static $default_syserror = '系统繁忙，请稍后再试';
    public static $default_error = "参数错误";
    public static $default_nodata = '暂无数据';
    public static $default_no_auth = "暂无权限";

    public static $status_mapping = [
        '-1' => '请选择状态',
        '1' => '正常',
        '0' => '已删除',
    ];

    public static $state_mapping = [
        0 => '<div class="label label-table label-danger">删除</div>',
        1 => '<div class="label label-table label-success">有效</div>'
    ];
}