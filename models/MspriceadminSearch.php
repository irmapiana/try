<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mspriceadmin;

/**
 * MspriceadminSearch represents the model behind the search form about `app\models\Mspriceadmin`.
 */
class MspriceadminSearch extends Mspriceadmin
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aitemid', 'spriceid', 'productid', 'itemid', 'aitem_validfrom', 'aitem_validuntil', 'cby', 'cdate', 'mby', 'mdate'], 'safe'],
            [['aitem_fee'], 'number'],
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
        $query = Mspriceadmin::find();

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

        $query->andFilterWhere(['like', 'lower(aitemid)', strtolower($this->aitemid)])
            // ->andFilterWhere(['like', 'spriceid', $this->spriceid])
            ->andFilterWhere(['like', 'lower(productid)', strtolower($this->productid)])
            ->andFilterWhere(['like', 'lower(itemid)', strtolower($this->itemid)])
            ->andFilterWhere(['like', 'lower(aitem_validfrom)', strtolower($this->aitem_validfrom)])
            ->andFilterWhere(['like', 'lower(aitem_validuntil)', strtolower($this->aitem_validuntil)])
            ->andFilterWhere(['like', 'cby', $this->cby])
            ->andFilterWhere(['like', 'cdate', $this->cdate])
            ->andFilterWhere(['like', 'mby', $this->mby])
            ->andFilterWhere(['like', 'mdate', $this->mdate]);

        return $dataProvider;
    }
}
