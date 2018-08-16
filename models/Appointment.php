<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "appointment".
 *
 * @property string $id
 * @property int $trip_id
 * @property string $fio
 * @property string $date
 * @property string $citizenship
 * @property string $passport
 * @property int $count
 * @property string $comments
 */
class Appointment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'appointment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['trip_id', 'fio', 'date', 'citizenship', 'passport', 'count', 'contacts'], 'required'],
            [['trip_id', 'count'], 'integer'],
//            [['date'], 'safe'],
            [['comments'], 'string'],
            [['fio', 'citizenship', 'passport', 'contacts', 'code'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'trip_id' => 'Trip ID',
            'fio' => Yii::t('app', 'Last Name and First Name'),
            'date' => Yii::t('app', 'Date of birth'),
            'citizenship' => Yii::t('app', 'Citizenship'),
            'passport' => Yii::t('app', 'Passport number'),
            'count' => Yii::t('app', 'Count of people'),
            'comments' => Yii::t('app', 'Comments'),
            'contacts' => Yii::t('app', 'Contacts'),
            'code' => Yii::t('app', 'Hotel Code')
        ];
    }

    public function getHotel(){
        return $this ->hasOne(Hotel::className(),['code'=>'code']);
    }
}
