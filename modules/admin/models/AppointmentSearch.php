<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Appointment;

/**
 * AppointmentSearch represents the model behind the search form of `app\models\Appointment`.
 */
class AppointmentSearch extends Appointment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'trip_id', 'count'], 'integer'],
            [['fio', 'date', 'citizenship', 'passport', 'contacts', 'comments', 'code'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Appointment::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'trip_id' => $this->trip_id,
            'date' => $this->date,
            'count' => $this->count,
        ]);

        $query->andFilterWhere(['like', 'fio', $this->fio])
            ->andFilterWhere(['like', 'citizenship', $this->citizenship])
            ->andFilterWhere(['like', 'passport', $this->passport])
            ->andFilterWhere(['like', 'contacts', $this->contacts])
            ->andFilterWhere(['like', 'comments', $this->comments])
            ->andFilterWhere(['like', 'code', $this->code]);

        return $dataProvider;
    }
}
