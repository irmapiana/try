<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Igateproductmapper;

/**
 * BankSearch represents the model behind the search form about `app\models\Bank`.
 */
class IgateproductmapperSearch extends Igateproductmapper
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productid','itemid', 'product_type'], 'safe'],
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
        $query = Igateproductmapper::find();

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
        $query->andFilterWhere(['like', 'lower(productid)', strtolower($this->productid)])
            ->andFilterWhere(['like', 'lower(itemid)', strtolower($this->itemid)])
            ->andFilterWhere(['like', 'lower(product_type)', strtolower($this->product_type)]);

        return $dataProvider;
    }
}
