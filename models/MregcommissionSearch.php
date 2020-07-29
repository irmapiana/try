<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\activeDataProvider;
use app\models\Mregcommission;

/**
 * MregcommissionSearch represents the model behind the search form about `app\models\Mregcommission`.
 */
class MregcommissionSearch extends Mregcommission
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['RCOMMISSIONID', 'RCLEVEL_CODE', 'RCOMMISSION_VALIDFROM', 'RCOMMISSION_VALIDUNTIL', 'cby', 'cdate', 'mby', 'mdate'], 'safe'],
            [['REGCOST', 'CASHBACK_0', 'RCOMMISSION_1', 'RCOMMISSION_2'], 'number'],
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
     * @return activeDataProvider
     */
    public function search($params)
    {
        $query = Mregcommission::find();

        // add conditions that should always apply here

        $dataProvider = new activeDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'REGCOST' => $this->REGCOST,
            'CASHBACK_0' => $this->CASHBACK_0,
            'RCOMMISSION_1' => $this->RCOMMISSION_1,
            'RCOMMISSION_2' => $this->RCOMMISSION_2,
        ]);

        $query->andFilterWhere(['like', 'RCOMMISSIONID', $this->RCOMMISSIONID])
            ->andFilterWhere(['like', 'RCLEVEL_CODE', $this->RCLEVEL_CODE])
            ->andFilterWhere(['like', 'RCOMMISSION_VALIDFROM', $this->RCOMMISSION_VALIDFROM])
            ->andFilterWhere(['like', 'RCOMMISSION_VALIDUNTIL', $this->RCOMMISSION_VALIDUNTIL])
            ->andFilterWhere(['like', 'cby', $this->cby])
            ->andFilterWhere(['like', 'cdate', $this->cdate])
            ->andFilterWhere(['like', 'mby', $this->mby])
            ->andFilterWhere(['like', 'mdate', $this->mdate]);

        return $dataProvider;
    }
}
