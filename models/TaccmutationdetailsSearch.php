<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Taccmutationdetails;

/**
 * TaccmutationdetailsSearch represents the model behind the search form about `app\models\Taccmutationdetails`.
 */
class TaccmutationdetailsSearch extends Taccmutationdetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MUTATION_ID', 'BANK_ACCOUNT_ID', 'MUTATION_STATUS_CODE', 'cby', 'cdate', 'mby', 'mdate'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Taccmutationdetails::find();

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
        $query->andFilterWhere(['like', 'lower(MUTATION_ID)', strtolower($this->MUTATION_ID)])
            ->andFilterWhere(['like', 'lower(BANK_ACCOUNT_ID)', strtolower($this->BANK_ACCOUNT_ID)])
            ->andFilterWhere(['like', 'lower(MUTATION_STATUS_CODE)', strtolower($this->MUTATION_STATUS_CODE)])
            ->andFilterWhere(['like', 'lower(cby)', strtolower($this->cby)])
            ->andFilterWhere(['like', 'lower(cdate)', strtolower($this->cdate)])
            ->andFilterWhere(['like', 'lower(mby)', strtolower($this->mby)])
            ->andFilterWhere(['like', 'lower(mdate)', strtolower($this->mdate)]);

        return $dataProvider;
    }
}
