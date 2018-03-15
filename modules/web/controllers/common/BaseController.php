<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/15
 * Time: 16:37
 */

namespace app\modules\web\controllers\common;


use app\common\components\BaseWebController;

class BaseController extends BaseWebController
{
    public function __construct($id, $module, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->layout = "main";
    }


}