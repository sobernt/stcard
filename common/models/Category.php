<?php


namespace common\models;


use yii\db\ActiveRecord;

class Category  extends ActiveRecord
{
    public static function tableName()
    {
        return '{{category}}';
    }

    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['name'], 'string', 'min' => 3, 'max' => 50],
            [['description'], 'string', 'min' => 3, 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'name of category',
            'description' => 'Description of category',
        ];
    }
}