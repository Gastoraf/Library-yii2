<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Lostbooks;

/**
 * LostbooksSearch represents the model behind the search form of `app\modules\admin\models\Lostbooks`.
 */
class LostbooksSearch extends Lostbooks
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'book_id', 'reader_id', 'room_id'], 'integer'],
            [['lost_date'], 'safe'],
            [['reimbursed'], 'number'],
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
        $query = Lostbooks::find();

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
            'book_id' => $this->book_id,
            'reader_id' => $this->reader_id,
            'room_id' => $this->room_id,
            'lost_date' => $this->lost_date,
            'reimbursed' => $this->reimbursed,
        ]);

        return $dataProvider;
    }
}
