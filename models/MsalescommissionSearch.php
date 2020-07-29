<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Msalescommission;
use yii\db\Expression;

/**
 * MsalescommissionSearch represents the model behind the search form about `app\models\Msalescommission`.
 */
class MsalescommissionSearch extends Msalescommission
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SCOMMISSIONID', 'spriceid', 'productid', 'itemid', 'SCOMMISSION_VALIDFROM', 'SCOMMISSION_VALIDUNTIL', 'cby', 'cdate', 'mby', 'mdate'], 'safe'],
            [['SCOMMISSION_0', 'SCOMMISSION_1', 'SCOMMISSION_2'], 'number'],
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
        $query = Msalescommission::find();

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
            'SCOMMISSION_0' => $this->SCOMMISSION_0,
            'SCOMMISSION_1' => $this->SCOMMISSION_1,
            'SCOMMISSION_2' => $this->SCOMMISSION_2,
        ]);

        if ($this->SCOMMISSION_VALIDFROM) {
            $query->andFilterWhere(['>=', 'SCOMMISSION_VALIDFROM', new Expression("TO_DATE('" . $this->SCOMMISSION_VALIDFROM . "', 'dd-mm-yyyy')")]);
        }
        if ($this->SCOMMISSION_VALIDUNTIL) {
            $query->andFilterWhere(['<=', 'SCOMMISSION_VALIDUNTIL', new Expression("TO_DATE('" . $this->SCOMMISSION_VALIDUNTIL . "', 'dd-mm-yyyy')")]);
        }

        $query->andFilterWhere(['like', 'lower(SCOMMISSIONID)', strtolower($this->SCOMMISSIONID)])
            ->andFilterWhere(['=', 'lower(spriceid)', strtolower($this->spriceid)])
            ->andFilterWhere(['like', 'lower(productid)', strtolower($this->productid)])
            ->andFilterWhere(['like', 'lower(itemid)', strtolower($this->itemid)])
            //->andFilterWhere(['like', 'lower(SCOMMISSION_VALIDFROM', strtolower($this->SCOMMISSION_VALIDFROM)])
            //->andFilterWhere(['like', 'lower(SCOMMISSION_VALIDUNTIL', strtolower($this->SCOMMISSION_VALIDUNTIL)])
            ->andFilterWhere(['like', 'lower(cby)', strtolower($this->cby)])
            ->andFilterWhere(['like', 'lower(cdate)', strtolower($this->cdate)])
            ->andFilterWhere(['like', 'lower(mby)', strtolower($this->mby)])
            ->andFilterWhere(['like', 'lower(mdate)', strtolower($this->mdate)]);

        return $dataProvider;
    }
}
