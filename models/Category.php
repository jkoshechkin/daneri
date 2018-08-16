<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property string $id
 * @property int $type
 */
class Category extends \yii\db\ActiveRecord
{
    public $gallery;
    const MAX_PICS=12;
    const PLACE=1;
    const OFFERS=2;
    const INDEX=0;
    const BOOKING=3;
    const CONTACTS=4;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
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
            [['type'], 'required'],
            [['type'], 'integer'],
            [['gallery'], 'file', 'extensions' => ['png','jpg'], 'maxFiles' => 12, 'maxSize' => 3*(1024*1024)],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'gallery' => 'Галерея',
        ];
    }

    public function getArticleEn(){
        return $this ->hasOne(ArticleEn::className(),['category_id'=>'id']);
    }

    public function uploadGallery(){
        if($this->validate()){
            foreach ($this->gallery as $file){
                $path = 'upload/store/' .$file->baseName.'.'.$file->extension;
                $file->saveAs($path);
                $this->attachImage($path);
                @unlink($path);
            }
            return true;}
        else{
            return false;
        }

    }
}
