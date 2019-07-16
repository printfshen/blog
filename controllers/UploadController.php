<?php
/**
 * Created by PhpStorm.
 * User: ehailuo
 * Date: 2018/5/4
 * Time: 10:41
 */

namespace app\controllers;


use app\common\components\BaseWebController;
use app\common\services\UploadService;
use app\common\services\UrlService;

class UploadController extends BaseWebController
{
    protected $allow_file = ["jpg", "gif", "bmp", "jpeg", "png"];//设置允许上传文件的类型

    public function actionPlupload()
    {
        $bucket = $this->post('bucket');
        $type = $this->post('type');
        $call_back_target = 'window.parent.upload';

        if (!$_FILES || !isset($_FILES['file'])) {
            return "<script type='text/javascript'>{$call_back_target}.error('没有选择文件');</script>";
        }

        $file_name = $_FILES['file']['name'];

        $tmp_file_extend = explode(".", $file_name);
        if (!in_array(strtolower(end($tmp_file_extend)), $this->allow_file)) {
            return "<script type='text/javascript'>{$call_back_target}.error('请上传图片文件,jpg,png,jpeg,gif');</script>";
        }

        $ret = UploadService::uploadByFile($_FILES['file']['name'], $_FILES['file']['tmp_name'], $bucket);

        if ($ret['code'] == 200) {
            $path = UrlService::buildPicUrl($bucket, $ret['path']);

            echo json_encode(array("error" => "0", "src" => $path, "name" => $ret['path']));
        } else {
            echo json_encode(array("error" => "上传有误，清检查服务器配置！"));
        }
    }

    /**
     * editor.md上传
     * {
     * success : 0 | 1, //0表示上传失败;1表示上传成功
     * message : "提示的信息",
     * url     : "图片地址" //上传成功时才返回
     * }
     * @return string
     */
    public function actionEditorMdUpload()
    {
        $bucket = $this->post('bucket', 'article');
        $type = $this->post('type');

        $files = $_FILES['editormd-image-file'];
        if (!$_FILES || !isset($files)) {
            return json_encode([
                'success' => 0,
                'message' => '没有选择文件',
                'url' => ''
            ]);
        }

        $file_name = $files['name'];

        $tmp_file_extend = explode(".", $file_name);
        if (!in_array(strtolower(end($tmp_file_extend)), $this->allow_file)) {
            return json_encode([
                'success' => 0,
                'message' => '上传格式有问题,请重新上传',
                'url' => ''
            ]);
        }

        $ret = UploadService::uploadByFile($file_name, $files['tmp_name'], $bucket);

        if ($ret['code'] == 200) {
            $path = UrlService::buildPicUrl($bucket, $ret['path']);
            return json_encode([
                'success' => 1,
                'message' => '没有选择文件',
                'url' => $path
            ]);
            echo json_encode(array("error" => "0", "src" => $path, "name" => $ret['path']));
        } else {
            return json_encode([
                'success' => 0,
                'message' => '上传有误，清检查服务器配置！',
                'url' => ''
            ]);
        }
    }
}