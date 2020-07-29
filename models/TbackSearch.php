<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
/**
 * TfrontSearch represents the model behind the search form about `app\Models\Tfront`.
 */
class TbackSearch extends Tback
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['front_trxid', 'accountno', 'productid', 'itemid','tdate', 'settlflag', 'rc'], 'safe'],
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
        $query = Tback::find();

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
        $query->andFilterWhere(['like', 'front_trxid', $this->front_trxid])
            ->andFilterWhere(['like', 'accountno', $this->accountno])
            ->andFilterWhere(['like', 'productid', $this->productid])
            ->andFilterWhere(['like', 'itemid', $this->itemid])
            ->andFilterWhere(['like', 'tdate', $this->tdate])
            ->andFilterWhere(['like', 'settlflag', $this->settlflag])
            ->andFilterWhere(['like', 'rc', $this->rc]);
        return $dataProvider;
    }
}
