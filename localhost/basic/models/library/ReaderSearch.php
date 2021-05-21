<?php


namespace app\models\library;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class ReaderSearch extends Reader
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'chair_id', 'type_id', 'room_id'], 'integer'],
            [['name', 'surname'], 'string'],
            [['should'], 'double'],
            [['deprived_of', 'deprived_of_up', 'registration_date', 'departure_date'], 'date']
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
    public function search($params, $query)
    {
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
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
            'chair_id' => $this->chair_id,
            'type_id' => $this->type_id,
            'room_id' => $this->room_id,
            'deprived_of' => $this->deprived_of,
            'deprived_of_up' => $this->deprived_of_up,
            'registration_date' => $this->registration_date,
            'departure_date' => $this->departure_date,
            'should' => $this->should,
        ]);
        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname]);

        return $dataProvider;
    }

}
