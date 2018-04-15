<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/4/14
 * Time: 20:48
 */

namespace app\models\form;


use yii\base\Model;

class IndexSearchForm extends Model
{
    public $status;
    public $mix_kw;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            ['status', 'required'],
            ['id', 'required'],
        ];
    }
}