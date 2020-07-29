<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mregistration;

/**
 * MproductSearch represents the model behind the search form about `app\Models\Mproduct`.
 */
class MregistrationSearch extends Mregistration
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account_no', 'cby', 'cdate', 'mby', 'mdate', 'account_name', 'flag', 'alamat', 'propinsi', 'kota', 'terminal_id', 'enc_card_number'], 'safe'],
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
        $query = Mregistration::find();

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

        // $query->andFilterWhere(['like', 'productid', $this->productid])
        // ->andFilterWhere(['like', 'ACTIVE', $this->ACTIVE])
        // ->andFilterWhere(['like', 'NOTE', $this->NOTE])
        // ->andFilterWhere(['like', 'cby', $this->cby])
        // ->andFilterWhere(['like', 'CDATE', $this->CDATE])
        // ->andFilterWhere(['like', 'MBY', $this->MBY])
        // ->andFilterWhere(['like', 'MDATE', $this->MDATE])
        // ->andFilterWhere(['like', 'ACTIVE', $this->ACTIVE])
        // ->orderBy('productid ASC' );

        //grid filtering conditions
        $query->andFilterWhere(['like', 'account_no', $this->account_no])
        ->andFilterWhere(['like', 'account_name', $this->account_name])
        ->andFilterWhere(['like', 'flag', $this->flag])
            ->andFilterWhere(['like', 'lower(cby)', strtolower($this->mby)])
            ->andFilterWhere(['like', 'cdate', $this->cdate])
            ->andFilterWhere(['like', 'mby', $this->mby])
            ->andFilterWhere(['like', 'mdate', $this->mdate])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'propinsi', $this->propinsi])
            ->andFilterWhere(['like', 'kota', $this->kota])
            ->andFilterWhere(['like', 'terminal_id', $this->terminal_id])
            ->orderBy('account_no ASC' );
        //cek jika diawali %

        return $dataProvider;
    }
}
