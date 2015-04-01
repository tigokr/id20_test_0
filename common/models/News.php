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
    public $ym;

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
            [['subject_id'], 'integer'],
            [['subject_id'], 'default', 'value'=>null],
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

    public function getSubject(){
        return $this->hasOne(Subject::className(), ['id'=>'subject_id']);
    }

    public function afterFind(){
        $this->publicated_at = date('Y-m-d H:i:s', $this->publicated_at);
    }

    public function beforeSave($insert){
        if (parent::beforeSave($insert)) {
            $this->publicated_at = strtotime($this->publicated_at);
            return true;
        } else {
            return false;
        }
    }
}
