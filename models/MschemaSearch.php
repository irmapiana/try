<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mschema;

/**
 * MschemaSearch represents the model behind the search form about `app\Models\Mschema`.
 */
class MschemaSearch extends Mschema
{
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['schema.orgid','schema.bankcode']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productid', 'itemid', 'schemaid', 'cby', 'cdate', 'mby', 'mdate', 'classname', 'itype', 'fix_ca_adminfee', 'cashbackid', 'invoice_method', 'bankcode', 'orgid', 'active', 'converter', 'destinationid', 'recon_code', 'pid', 'userid', 'cid', 'feebase', 'updated', 'sch_updated', 'calendarid', 'admininclude', 'input1', 'input2', 'input3', 'input4', 'spriceid', 'ppriceid'], 'safe'],
            [['ca_adminfee', 'minus_factor', 'plus_factor', 'ppn'], 'integer'],
            [['multiply_factor'], 'number'],
            [['schema.orgid','schema.bankcode'], 'safe'],
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
        $query = Mschema::find();

        $query->joinWith(['account']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => Yii::$app->params['pageLimit'],
            ],
        ]);

        $dataProvider->sort->attributes['schema.orgid'] = [
              'asc' => ['m_schema.orgid' => SORT_ASC],
              'desc' => ['m_schema.orgid' => SORT_DESC],
         ];

         $dataProvider->sort->attributes['schema.bankcode'] = [
              'asc' => ['schema.bankcode' => SORT_ASC],
              'desc' => ['schema.bankcode' => SORT_DESC],
         ];


        if (!($this->load($params) && $this->validate())) {
                return $dataProvider;
            }

        // grid filtering conditions
        $query->andFilterWhere([
            'ca_adminfee' => $this->ca_adminfee,
            'minus_factor' => $this->minus_factor,
            'plus_factor' => $this->plus_factor,
            'ppn' => $this->ppn,
            'multiply_factor' => $this->multiply_factor,
        ]);

        $query->andFilterWhere(['like','lower(schema.bankcode)',strtolower($this->getAttribute('schema.bankcode'))])
            ->andFilterWhere(['like','lower(m_schema.orgid)',strtolower($this->getAttribute('schema.orgid'))])
            ->andFilterWhere(['like', 'lower(productid)', strtolower($this->productid)])
            ->andFilterWhere(['like', 'lower(itemid)', strtolower($this->itemid)])
            ->andFilterWhere(['like', 'lower(schemaid)', strtolower($this->schemaid)])
            ->andFilterWhere(['like', 'lower(cby)', strtolower($this->cby)])
            ->andFilterWhere(['like', 'lower(cdate)', strtolower($this->cdate)])
            ->andFilterWhere(['like', 'lower(mby)', strtolower($this->mby)])
            ->andFilterWhere(['like', 'lower(mdate)', strtolower($this->mdate)])
            ->andFilterWhere(['like', 'lower(classname)', strtolower($this->classname)])
            ->andFilterWhere(['like', 'lower(itype)', strtolower($this->itype)])
            ->andFilterWhere(['like', 'lower(fix_ca_adminfee)', strtolower($this->fix_ca_adminfee)])
            ->andFilterWhere(['like', 'lower(cashbackid)', strtolower($this->cashbackid)])
            ->andFilterWhere(['like', 'lower(invoice_method)', strtolower($this->invoice_method)])
            ->andFilterWhere(['like', 'lower(bankcode)', strtolower($this->bankcode)])
            ->andFilterWhere(['like', 'lower(orgid)', strtolower($this->orgid)])
            ->andFilterWhere(['=', 'm_schema.active', $this->active])
            ->andFilterWhere(['like', 'lower(converter)', strtolower($this->converter)])
            ->andFilterWhere(['like', 'lower(destinationid)', strtolower($this->destinationid)])
            ->andFilterWhere(['like', 'lower(recon_code)', strtolower($this->recon_code)])
            ->andFilterWhere(['like', 'lower(pid)', strtolower($this->pid)])
            ->andFilterWhere(['like', 'lower(userid)', strtolower($this->userid)])
            ->andFilterWhere(['like', 'lower(cid)', strtolower($this->cid)])
            ->andFilterWhere(['like', 'lower(feebase)', strtolower($this->feebase)])
            ->andFilterWhere(['like', 'lower(updated)', strtolower($this->updated)])
            ->andFilterWhere(['like', 'lower(sch_updated)', strtolower($this->sch_updated)])
            ->andFilterWhere(['like', 'lower(calendarid)', strtolower($this->calendarid)])
            ->andFilterWhere(['like', 'lower(admininclude)', strtolower($this->admininclude)])
            ->andFilterWhere(['like', 'lower(input1)', strtolower($this->input1)])
            ->andFilterWhere(['like', 'lower(input2)', strtolower($this->input2)])
            ->andFilterWhere(['like', 'lower(input3)', strtolower($this->input3)])
            ->andFilterWhere(['like', 'lower(input4)', strtolower($this->input4)])
            ->andFilterWhere(['=', 'spriceid', $this->spriceid])
            ->andFilterWhere(['like', 'lower(ppriceid)', strtolower($this->ppriceid)]);

        return $dataProvider;
    }
    public function getHarga()
    {
        return $this->hasOne(Msellprice::className(), ['spriceid' => 'spriceid']);
    }
}
