<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mproductmapper;

/**
 * MproductSearch represents the model behind the search form about `app\Models\Mproduct`.
 */
class MproductmapperSearch extends Mproductmapper
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productid1','itemid1', 'productid2', 'itemid2', 'switch', 'info', 'active'], 'safe'],
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
        $query = Mproductmapper::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => Yii::$app->params['pageLimit'],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // $query->andFilterWhere(['like', 'productid', $this->productid])
        // ->andFilterWhere(['like', 'ACTIVE', $this->ACTIVE])
        // ->andFilterWhere(['like', 'NOTE', $this->NOTE])
        // ->andFilterWhere(['like', 'cby', $this->cby])
        // ->andFilterWhere(['like', 'CDATE', $this->CDATE])
        // ->andFilterWhere(['like', 'MBY', $this->MBY])
        // ->andFilterWhere(['like', 'MDATE', $this->MDATE])
        // ->andFilterWhere(['like', 'ACTIVE', $this->ACTIVE])
        // ->orderBy('productid ASC' );

        //grid filtering conditions
        $query->andFilterWhere(['like', 'lower(info)', strtolower($this->info)])
            ->andFilterWhere(['like', 'lower(productid1)', strtolower($this->productid1)])
            ->andFilterWhere(['like', 'itemid1', $this->itemid1])
            ->andFilterWhere(['like', 'productid2', $this->productid2])
            ->andFilterWhere(['like', 'itemid2', $this->itemid2])
           ->andFilterWhere(['like', 'active', $this->active])
           ->andFilterWhere(['like', 'switch', $this->switch])
            ->orderBy('productid1 ASC' );
        //cek jika diawali %

        return $dataProvider;
    }
}
