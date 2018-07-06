<?php

namespace app\models\config;

use Yii;

/**
 * This is the model class for table "link".
 *
 * @property integer $id
 * @property string $title
 * @property string $url
 * @property string $pic
 * @property integer $sort
 * @property string $remark
 * @property integer $status
 * @property integer $updated_time
 * @property integer $created_time
 */
class Link extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'link';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'url', 'pic', 'remark', 'updated_time', 'created_time'], 'required'],
            [['sort', 'status', 'updated_time', 'created_time'], 'integer'],
            [['title', 'url', 'pic'], 'string', 'max' => 100],
            [['remark'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'url' => 'Url',
            'pic' => 'Pic',
            'sort' => 'Sort',
            'remark' => 'Remark',
            'status' => 'Status',
            'updated_time' => 'Updated Time',
            'created_time' => 'Created Time',
        ];
    }
}
