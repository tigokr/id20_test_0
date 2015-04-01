<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $publicated_at
 * @property string $title
 * @property string $text
 * @property integer $subject_id
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['publicated_at', 'title', 'text'], 'required'],
            [['publicated_at'], 'safe'],
            [['title', 'text'], 'string'],
            [['subject_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'publicated_at' => 'Publicated At',
            'title' => 'Title',
            'text' => 'Text',
            'subject_id' => 'Subject ID',
        ];
    }
}
