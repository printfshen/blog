<?php

namespace app\models\timeline;

use Yii;

/**
 * This is the model class for table "timeline".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $pic
 * @property string $icon
 * @property integer $status
 * @property integer $date
 * @property integer $updated_time
 * @property integer $created_time
 */
class Timeline extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'timeline';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'pic', 'icon', 'status', 'date', 'updated_time', 'created_time'], 'required'],
            [['content'], 'string'],
            [['status', 'date', 'updated_time', 'created_time'], 'integer'],
            [['title', 'pic', 'icon'], 'string', 'max' => 255],
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
            'content' => 'Content',
            'pic' => 'Pic',
            'icon' => 'Icon',
            'status' => 'Status',
            'date' => 'Date',
            'updated_time' => 'Updated Time',
            'created_time' => 'Created Time',
        ];
    }
}
