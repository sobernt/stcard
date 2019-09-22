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
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory() {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Title of card',
            'description' => 'Description of card',
        ];
    }

}