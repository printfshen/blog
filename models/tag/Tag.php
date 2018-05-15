<?php

namespace app\models\tag;

use Yii;

/**
 * This is the model class for table "tag".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property integer $updated_time
 * @property integer $created_time
 */
class Tag extends \yii\db\ActiveRecord
{
    public static function HasInByName($name)
    {
        return static::find()->where(['name' => $name])->count();
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'status', 'updated_time', 'created_time'], 'required'],
            [['status', 'updated_time', 'created_time'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
            'updated_time' => 'Updated Time',
            'created_time' => 'Created Time',
        ];
    }
}
