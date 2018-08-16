<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "article_en".
 *
 * @property string $id
 * @property int $category_id
 * @property string $title
 * @property string $minicontent
 * @property string $content
 * @property string $keywords
 * @property string $description
 */
class ArticleEn extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article_en';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'minicontent', 'content'], 'required'],
            [['category_id'], 'integer'],
            [['minicontent', 'content'], 'string'],
            [['title', 'keywords', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'title' => 'Title',
            'minicontent' => 'Minicontent',
            'content' => 'Content',
            'keywords' => 'Keywords',
            'description' => 'Description',
        ];
    }

    public function getCategory(){
        return $this ->hasOne(Category::className(),['id'=>'category_id']);
    }
}
