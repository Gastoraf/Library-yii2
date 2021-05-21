<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Issuedbooks;

/**
 * IssuedbooksSearch represents the model behind the search form of `app\modules\admin\models\Issuedbooks`.
 */
class IssuedbooksSearch extends Issuedbooks
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'reader_id', 'book_id'], 'integer'],
            [['date_of_issue', 'issued_before', 'returned'], 'safe'],
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
        $query = Issuedbooks::find();

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
            'book_id' => $this->book_id,
            'date_of_issue' => $this->date_of_issue,
            'issued_before' => $this->issued_before,
        ]);

        $query->andFilterWhere(['like', 'returned', $this->returned]);

        return $dataProvider;
    }
}
