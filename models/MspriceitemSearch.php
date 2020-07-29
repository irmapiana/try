<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mspriceitem;
use yii\db\Expression;

/**
 * MspriceitemSearch represents the model behind the search form about `app\Models\Mspriceitem`.
 */
class MspriceitemSearch extends Mspriceitem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sfitemid', 'spriceid', 'productid', 'itemid', 'sfitem_validfrom', 'sfitem_validuntil', 'cby', 'cdate', 'mby', 'mdate'], 'safe'],
            [['sfitem_fee'], 'number'],
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
        // var_dump($params);die();
        $query = Mspriceitem::find();

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
            'sfitem_fee' => $this->sfitem_fee,
        ]);

        if ($this->sfitem_validfrom) {
            $query->andFilterWhere(['>=', 'sfitem_validfrom', new Expression("TO_DATE('" . $this->sfitem_validfrom . "', 'dd-mm-yyyy')")]);
        }
        if ($this->sfitem_validuntil) {
            $query->andFilterWhere(['<=', 'sfitem_validuntil', new Expression("TO_DATE('" . $this->sfitem_validuntil . "', 'dd-mm-yyyy')")]);
        }
        $query->andFilterWhere(['like', 'lower(sfitemid)', strtolower($this->sfitemid)])
            ->andFilterWhere(['=', 'lower(spriceid)', strtolower($this->spriceid)])
            ->andFilterWhere(['like', 'lower(productid)', strtolower($this->productid)])
            ->andFilterWhere(['like', 'lower(itemid)', strtolower($this->itemid)])
            // ->andFilterWhere(['like', 'lower(SPITEM_VALIDFROM)', strtolower($this->SPITEM_VALIDFROM)])
            // ->andFilterWhere(['like', 'lower(SPITEM_VALIDUNTIL)', strtolower($this->SPITEM_VALIDUNTIL)])
            ->andFilterWhere(['like', 'lower(cby)', strtolower($this->cby)])
            ->andFilterWhere(['like', 'lower(cdate)', strtolower($this->cdate)])
            ->andFilterWhere(['like', 'lower(mby)', strtolower($this->mby)])
            ->andFilterWhere(['like', 'lower(mdate)', strtolower($this->mdate)])
            ->orderBy('sfitemid,productid,itemid ASC');
        
        return $dataProvider;
    }
}
