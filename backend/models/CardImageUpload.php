<?php


namespace backend\models;


use phpDocumentor\Reflection\Types\String_;
use yii\base\Model;

class CardImageUpload extends Model
{
    /**
     * @var UploadedFile
     */
    public $image;
    public $filename;

    public function rules()
    {
        return [
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if($this->image) {
            $this->filename = time() . "_" . md5($this->image->baseName) . '.' . $this->image->extension;
            if ($this->validate()) {
                $this->image->saveAs('uploads/' . $this->filename);
                return true;
            } else {
                return false;
            }
        } else return false;
    }
}