<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Madminandfee;

/**
 * MspriceadminSearch represents the model behind the search form about `app\models\Mspriceadmin`.
 */
class MadminandfeeSearch extends Madminandfee
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'spriceid', 'productid', 'itemid', 'valid_from', 'valid_until'], 'safe'],
            [['ks_fee', 'admin', 'fix_admin', 'merchant_fee', 'fix_merchant_fee'], 'number'],
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
        $query = Madminandfee::find();

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
        $query->andFilterWhere([
            'spriceid' => $this->spriceid,
        ]);

        $query->andFilterWhere(['like', 'lower(id)', strtolower($this->id)])
            // ->andFilterWhere(['like', 'spriceid', $this->spriceid])
            ->andFilterWhere(['like', 'lower(productid)', strtolower($this->productid)])
            ->andFilterWhere(['like', 'lower(itemid)', strtolower($this->itemid)])
            ->andFilterWhere(['like', 'lower(valid_from)', strtolower($this->valid_from)])
            ->andFilterWhere(['like', 'lower(valid_until)', strtolower($this->valid_until)]);

        return $dataProvider;
    }
}
