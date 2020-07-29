<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Productmenu;
use yii\db\Expression;

/**
 * MsalescommissionSearch represents the model behind the search form about `app\models\Msalescommission`.
 */
class ProductmenuSearch extends Productmenu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_menuid', 'itemid', 'next_class', 'SCOMMISSION_VALIDFROM', 'SCOMMISSION_VALIDUNTIL', 'cby', 'cdate', 'mby', 'mdate'], 'safe'],
            [['item_seq'], 'number'],
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
        $query = Productmenu::find();

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
            ->andFilterWhere(['like', 'lower(itermid)', strtolower($this->itemid)])
            ->andFilterWhere(['like', 'item_seq', $this->item_seq])
            ->andFilterWhere(['like', 'lower(active)', strtolower($this->active)]);

        return $dataProvider;
    }
}
