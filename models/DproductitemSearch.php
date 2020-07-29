<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dproductitem;

/**
 * DproductitemSearch represents the model behind the search form about `app\models\Dproductitem`.
 */
class DproductitemSearch extends Dproductitem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productid', 'itemid', 'note', 'cby', 'cdate', 'mby', 'mdate', 'itemname', 'active, transaction_type', 'denom', 'shortname', 'header_receipt', 'nominal_alias', 'footer_receipt', 'denom_notation', 'logo'], 'safe'],
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
        $query = Dproductitem::find();

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

        // grid filtering conditions
        $query->andFilterWhere(['like', 'lower(productid)', strtolower($this->productid)])
            ->andFilterWhere(['like', 'lower(itemid)', strtolower($this->itemid)])
            ->andFilterWhere(['like', 'lower(note)', strtolower($this->note)])
            ->andFilterWhere(['like', 'lower(cby)', strtolower($this->cby)])
            ->andFilterWhere(['like', 'lower(cdate)', strtolower($this->cdate)])
            ->andFilterWhere(['like', 'lower(mby)', strtolower($this->mby)])
            ->andFilterWhere(['like', 'lower(mdate)', strtolower($this->mdate)])
            ->andFilterWhere(['like', 'lower(itemname)', strtolower($this->itemname)])
            ->andFilterWhere(['like', 'lower(active)', strtolower($this->active)])
            ->andFilterWhere(['like', 'lower(transaction_type)', strtolower($this->transaction_type)])
            ->andFilterWhere(['like', 'lower(denom)', strtolower($this->denom)])
            ->andFilterWhere(['like', 'lower(shortname)', strtolower($this->shortname)])
            ->andFilterWhere(['like', 'lower(header_receipt)', strtolower($this->header_receipt)])
            ->andFilterWhere(['like', 'lower(nominal_alias)', strtolower($this->nominal_alias)])
            ->andFilterWhere(['like', 'lower(footer_receipt)', strtolower($this->footer_receipt)])
            ->andFilterWhere(['like', 'lower(denom_notation)', strtolower($this->denom_notation)])
            ->andFilterWhere(['like', 'lower(logo)', strtolower($this->logo)])
            ->orderBy('productid,itemid ASC');

        return $dataProvider;
    }
}
