<?php


namespace common\models;


use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Card extends ActiveRecord
{

    public static function tableName()
    {
        return '{{card}}';
    }

    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['title'], 'string', 'min' => 3, 'max' => 50],
            [['description'], 'string', 'min' => 3, 'max' => 255],
            [['img'], 'string'],
            [['views'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Title of card',
            'description' => 'Description of card',
        ];
    }

}