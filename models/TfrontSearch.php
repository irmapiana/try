<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
/**
 * TfrontSearch represents the model behind the search form about `app\Models\Tfront`.
 */
class TfrontSearch extends Tfront
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['front_trxid', 'subscriber_id', 'subscriber_name', 'userid', 'settlflag', 'accountno', 'productid', 'rc', 'data1', 'data2', 'data3', 'data4', 'data5', 'data6', 'data7', 'data8', 'data9', 'data10', 'data11', 'data12', 'data13', 'data14', 'data15', 'data16', 'data17', 'data18', 'data19', 'data20', 'data21', 'data22', 'data23', 'data24', 'data25', 'data26', 'data27', 'data28', 'data29', 'data30', 'cby', 'cdate', 'mby', 'mdate', 'itemid', 'tdate', 'spriceid', 'sch_updated', 'amount', 'admin_fee', 'purchase_price', 'selling_fee', 'PRINT', 'nuber_of_bills', 'BACK_SCHEMAID', 'sch_updatedD', 'BACK_sch_updated', 'data31'], 'safe'],
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
        $query = Tfront::find();

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
            ->andFilterWhere(['like', 'enc_subscriber_id', $this->enc_subscriber_id])
            ->andFilterWhere(['like', 'subscriber_name', $this->subscriber_name])
            ->andFilterWhere(['like', 'userid', $this->userid])
            ->andFilterWhere(['like', 'settlflag', $this->settlflag])
            ->andFilterWhere(['like', 'accountno', $this->accountno])
            ->andFilterWhere(['like', 'spriceid', $this->spriceid])
            ->andFilterWhere(['like', 'rc', $this->rc])
            ->andFilterWhere(['like', 'data1', $this->data1])
            ->andFilterWhere(['like', 'data2', $this->data2])
            ->andFilterWhere(['like', 'data3', $this->data3])
            ->andFilterWhere(['like', 'data4', $this->data4])
            ->andFilterWhere(['like', 'data5', $this->data5])
            ->andFilterWhere(['like', 'data6', $this->data6])
            ->andFilterWhere(['like', 'data7', $this->data7])
            ->andFilterWhere(['like', 'data8', $this->data8])
            ->andFilterWhere(['like', 'data9', $this->data9])
            ->andFilterWhere(['like', 'data10', $this->data10])
            ->andFilterWhere(['like', 'data11', $this->data11])
            ->andFilterWhere(['like', 'data12', $this->data12])
            ->andFilterWhere(['like', 'data13', $this->data13])
            ->andFilterWhere(['like', 'data14', $this->data14])
            ->andFilterWhere(['like', 'data15', $this->data15])
            ->andFilterWhere(['like', 'data16', $this->data16])
            ->andFilterWhere(['like', 'data17', $this->data17])
            ->andFilterWhere(['like', 'data18', $this->data18])
            ->andFilterWhere(['like', 'data19', $this->data19])
            ->andFilterWhere(['like', 'data20', $this->data20])
            ->andFilterWhere(['like', 'data21', $this->data21])
            ->andFilterWhere(['like', 'data22', $this->data22])
            ->andFilterWhere(['like', 'data23', $this->data23])
            ->andFilterWhere(['like', 'data24', $this->data24])
            ->andFilterWhere(['like', 'data25', $this->data25])
            ->andFilterWhere(['like', 'data26', $this->data26])
            ->andFilterWhere(['like', 'data27', $this->data27])
            ->andFilterWhere(['like', 'data28', $this->data28])
            ->andFilterWhere(['like', 'data29', $this->data29])
            ->andFilterWhere(['like', 'data30', $this->data30])
            ->andFilterWhere(['like', 'cby', $this->cby])
            ->andFilterWhere(['like', 'cdate', $this->cdate])
            ->andFilterWhere(['like', 'mby', $this->mby])
            ->andFilterWhere(['like', 'mdate', $this->mdate])
            ->andFilterWhere(['like', 'amount', $this->amount])
            ->andFilterWhere(['like', 'admin_fee', $this->admin_fee])
            ->andFilterWhere(['like', 'purchase_price', $this->purchase_price])
            ->andFilterWhere(['like', 'itemid', $this->itemid])
            ->andFilterWhere(['like', 'productid', $this->productid])
            ->andFilterWhere(['like', 'selling_fee', $this->selling_fee])
            ->andFilterWhere(['like', 'number_of_bills', $this->number_of_bills])
            ->andFilterWhere(['tdate'=>$this->tdate])
            ->andFilterWhere(['like', 'sch_updated', $this->sch_updated])
            ->andFilterWhere(['like', 'data31', $this->data31]);

        return $dataProvider;
    }
}
