<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Msellprice;

/**
 * MsellpriceSearch represents the model behind the search form about `app\models\Msellprice`.
 */
class MsellpriceSearch extends Msellprice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppitemid', 'spriceid', 'ppitem_validfrom', 'ppitem_validuntil', 'cby', 'cdate', 'mby', 'mdate'], 'safe'],
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
        $query = Msellprice::find();

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
        $query->andFilterWhere(['like', 'lower(ppitemid)', strtolower($this->ppitemid)])
            ->andFilterWhere(['like', 'lower(spriceid)', strtolower($this->spriceid)])
            ->andFilterWhere(['like', 'lower(ppitem_validfrom)', strtolower($this->ppitem_validfrom)])
            ->andFilterWhere(['like', 'lower(ppitem_validuntil)', strtolower($this->ppitem_validuntil)])
            ->andFilterWhere(['like', 'lower(cby)', strtolower($this->cby)])
            ->andFilterWhere(['like', 'lower(cdate)', strtolower($this->cdate)])
            ->andFilterWhere(['like', 'lower(mby)', strtolower($this->mby)])
            ->andFilterWhere(['like', 'lower(mdate)', strtolower($this->mdate)])
            ->orderBy('ppitemid ASC');

        return $dataProvider;
    }
}
