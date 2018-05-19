<?php

namespace app\models\article;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property integer $c_id
 * @property integer $user_id
 * @property string $pic
 * @property string $username
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $keywords
 * @property integer $status
 * @property integer $is_top
 * @property integer $is_original
 * @property integer $hits
 * @property integer $updated_time
 * @property integer $created_time
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_id', 'user_id', 'pic', 'username', 'title', 'description', 'content', 'keywords', 'status', 'is_top', 'is_original', 'hits', 'updated_time', 'created_time'], 'required'],
            [['c_id', 'user_id', 'status', 'is_top', 'is_original', 'hits', 'updated_time', 'created_time'], 'integer'],
            [['content'], 'string'],
            [['pic'], 'string', 'max' => 500],
            [['username'], 'string', 'max' => 100],
            [['title'], 'string', 'max' => 200],
            [['description', 'keywords'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'c_id' => 'C ID',
            'user_id' => 'User ID',
            'pic' => 'Pic',
            'username' => 'Username',
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'keywords' => 'Keywords',
            'status' => 'Status',
            'is_top' => 'Is Top',
            'is_original' => 'Is Original',
            'hits' => 'Hits',
            'updated_time' => 'Updated Time',
            'created_time' => 'Created Time',
        ];
    }
}
