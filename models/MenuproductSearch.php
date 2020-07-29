<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Menuproduct;

/**
 * BankSearch represents the model behind the search form about `app\models\Bank`.
 */
class MenuproductSearch extends Menuproduct
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_menuid', 'next_class', 'productid', 'itemid'], 'safe'],
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
        $query = Menuproduct::find();

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
        $query->andFilterWhere(['like', 'lower(group_menuid)', strtolower($this->group_menuid)])
            ->andFilterWhere(['like', 'lower(next_class)', strtolower($this->next_class)])
            ->andFilterWhere(['like', 'lower(productid)', strtolower($this->productid)])
            ->andFilterWhere(['like', 'lower(itemid)', strtolower($this->itemid)]);
            
        return $dataProvider;
    }
}
