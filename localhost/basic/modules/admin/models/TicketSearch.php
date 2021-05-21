<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Ticket;

/**
 * TicketSearch represents the model behind the search form of `app\modules\admin\models\Ticket`.
 */
class TicketSearch extends Ticket
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'schedule_id', 'age_owner', 'luggage_number'], 'integer'],
            [['buy_datetime', 'fio_owner', 'gender_owner'], 'safe'],
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
        $query = Ticket::find();

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
            'schedule_id' => $this->schedule_id,
            'buy_datetime' => $this->buy_datetime,
            'age_owner' => $this->age_owner,
            'luggage_number' => $this->luggage_number,
        ]);

        $query->andFilterWhere(['like', 'fio_owner', $this->fio_owner])
            ->andFilterWhere(['like', 'gender_owner', $this->gender_owner]);

        return $dataProvider;
    }
}
