<?php

namespace app\models\config;

use Yii;

/**
 * This is the model class for table "config".
 *
 * @property string $name
 * @property string $value
 */
class Config extends \yii\db\ActiveRecord
{
    /**
     * config表 配置批量文件修改
     * @param $params
     */
    public static function UpdateConfig($params)
    {
        if ($params) {
            foreach ($params as $key => $_item) {
                $config_model = static::find()->where(['name' => $key])->one();
                if ($config_model) {
                    $config_model->value = $_item;
                    $config_model->save(0);
                }
            }
        }
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['value'], 'string'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'value' => 'Value',
        ];
    }
}
