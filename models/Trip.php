<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trip".
 *
 * @property string $id
 * @property int $category_id
 * @property string $start
 * @property string $end
 * @property int $place
 */
class Trip extends \yii\db\ActiveRecord
{
    const MAX_COUNT=10;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trip';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'start', 'end'], 'required'],
            [['category_id', 'place'], 'integer'],
            [['start', 'end'], 'safe'],
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
            'start' => 'Start',
            'end' => 'End',
            'place' => 'Place',
        ];
    }

    public function getArticleEn(){
        return $this ->hasOne(ArticleEn::className(),['category_id'=>'category_id']);
    }
}
