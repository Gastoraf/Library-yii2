<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Interlibraryticket;

/**
 * InterlibraryticketSearch represents the model behind the search form of `app\modules\admin\models\Interlibraryticket`.
 */
class InterlibraryticketSearch extends Interlibraryticket
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'reader_id', 'year_of_publishing'], 'integer'],
            [['author', 'name', 'order_date', 'date_of_receiving', 'return_date', 'returned'], 'safe'],
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
        $query = Interlibraryticket::find();

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
            'reader_id' => $this->reader_id,
            'year_of_publishing' => $this->year_of_publishing,
            'order_date' => $this->order_date,
            'date_of_receiving' => $this->date_of_receiving,
            'return_date' => $this->return_date,
            'reimbursed' => $this->reimbursed,
        ]);

        $query->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'returned', $this->returned]);

        return $dataProvider;
    }
}
