<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Msalesreward;
use yii\db\Expression;

/**
 * MsalesrewardSearch represents the model behind the search form about `app\models\Msalesreward`.
 */
class MsalesrewardSearch extends Msalesreward
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reward_typeid', 'spriceid', 'productid', 'itemid', 'rewarditem_validfrom', 'rewarditem_validuntil', 'cby', 'cdate', 'mby', 'mdate'], 'safe'],
            [['reward_minimum', 'reward_maximum'], 'integer'],
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
        $query = Msalesreward::find();

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
            'reward_minimum' => $this->reward_minimum,
            'reward_maximum' => $this->reward_maximum,
        ]);

        if ($this->rewarditem_validfrom) {
            $query->andFilterWhere(['>=', 'rewarditem_validfrom', new Expression("TO_DATE('" . $this->rewarditem_validfrom . "', 'dd-mm-yyyy')")]);
        }
        if ($this->rewarditem_validuntil) {
            $query->andFilterWhere(['<=', 'rewarditem_validfrom', new Expression("TO_DATE('" . $this->rewarditem_validuntil . "', 'dd-mm-yyyy')")]);
        }

        $query->andFilterWhere(['like', 'lower(reward_typeid)', strtolower($this->reward_typeid)])
            ->andFilterWhere(['=', 'lower(spriceid)', strtolower($this->spriceid)])
            ->andFilterWhere(['like', 'lower(productid)', strtolower($this->productid)])
            ->andFilterWhere(['like', 'lower(itemid)', strtolower($this->itemid)])
            //->andFilterWhere(['like', 'lower(SREWARD_VALIDFROM)', strtolower($this->SREWARD_VALIDFROM)])
            //->andFilterWhere(['like', 'lower(SREWARD_VALIDUNTIL)', strtolower($this->SREWARD_VALIDUNTIL)])
            ->andFilterWhere(['like', 'lower(cby)', strtolower($this->cby)])
            ->andFilterWhere(['like', 'lower(cdate)', strtolower($this->cdate)])
            ->andFilterWhere(['like', 'lower(mby)', strtolower($this->mby)])
            ->andFilterWhere(['like', 'lower(mdate)', strtolower($this->mdate)]);

        return $dataProvider;
    }
}
