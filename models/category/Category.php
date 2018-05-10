<?php

namespace app\models\category;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $fid
 * @property string $name
 * @property string $keyword
 * @property string $description
 * @property integer $sort
 * @property integer $status
 * @property integer $updated_time
 * @property integer $created_time
 */
class Category extends \yii\db\ActiveRecord
{
    public $lev;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fid', 'name', 'keyword', 'description', 'sort', 'status', 'updated_time', 'created_time'], 'required'],
            [['fid', 'sort', 'status', 'updated_time', 'created_time'], 'integer'],
            [['name'], 'string', 'max' => 40],
            [['keyword'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fid' => 'Fid',
            'name' => 'Name',
            'keyword' => 'Keyword',
            'description' => 'Description',
            'sort' => 'Sort',
            'status' => 'Status',
            'updated_time' => 'Updated Time',
            'created_time' => 'Created Time',
        ];
    }
}
