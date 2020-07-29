<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Taccmutationtmp;

/**
 * TaccmutationtmpSearch represents the model behind the search form about `app\models\Taccmutationtmp`.
 */
class TaccmutationtmpSearch extends Taccmutationtmp
{
    /**
     * @inheritdoc
     */
    
     public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['mutationdetail.MUTATION_STATUS_CODE','mutationdetail.BANK_ACCOUNT_ID']);
    }
    
    public function rules()
    {
        return [
            [['MUTATIONID', 'userid', 'MTYPE', 'noteS', 'BDATE', 'cby', 'cdate', 'mby', 'mdate', 'SCHEMAID', 'sch_updatedD','mutationdetail.MUTATION_STATUS_CODE','mutationdetail.BANK_ACCOUNT_ID'], 'safe'],
            [['AMOUNT'], 'number'],
            [['ENDBALANCE'], 'integer'],
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
        $query = Taccmutationtmp::find();
        
        $query->joinWith(['mutationdetail']);

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
        
          $dataProvider->sort->attributes['mutationdetail.MUTATION_STATUS_CODE'] = [
              'asc' => ['T_ACCMUTATION_DETAILS.MUTATION_STATUS_CODE' => SORT_ASC],
              'desc' => ['T_ACCMUTATION_DETAILS.MUTATION_STATUS_CODE' => SORT_DESC],
         ];
          
            $dataProvider->sort->attributes['mutationdetail.BANK_ACCOUNT_ID'] = [
              'asc' => ['T_ACCMUTATION_DETAILS.BANK_ACCOUNT_ID' => SORT_ASC],
              'desc' => ['T_ACCMUTATION_DETAILS.BANK_ACCOUNT_ID' => SORT_DESC],
         ];


        // grid filtering conditions
        $query->andFilterWhere([
            'AMOUNT' => $this->AMOUNT,
            'ENDBALANCE' => $this->ENDBALANCE,
        ]);

        $query->andFilterWhere(['like', 'lower(MUTATIONID)', $this->MUTATIONID])
              //->andFilterWhere(['<>','lower(MUTATION_STATUS_CODE)', Yii::$app->params['mutationBatal']])
             ->andFilterWhere(['like','lower(T_ACCMUTATION_DETAILS.MUTATION_STATUS_CODE)',strtolower($this->getAttribute('mutationdetail.MUTATION_STATUS_CODE'))])
             ->andFilterWhere(['like','lower(T_ACCMUTATION_DETAILS.BANK_ACCOUNT_ID)',strtolower($this->getAttribute('mutationdetail.BANK_ACCOUNT_ID'))])
             ->andFilterWhere(['<>','lower(T_ACCMUTATION_DETAILS.MUTATION_STATUS_CODE)', Yii::$app->params['mutationBatal']])
            ->andFilterWhere(['like', 'lower(userid)', strtolower($this->userid)])
            ->andFilterWhere(['like', 'lower(MTYPE)', strtolower($this->MTYPE)])
            ->andFilterWhere(['like', 'lower(noteS)', strtolower($this->noteS)])
            ->andFilterWhere(['like', 'lower(BDATE)', strtolower($this->BDATE)])
            ->andFilterWhere(['like', 'lower(cby)', strtolower($this->cby)])
            ->andFilterWhere(['like', 'lower(cdate)', strtolower($this->cdate)])
            ->andFilterWhere(['like', 'lower(mby)', strtolower($this->mby)])
            ->andFilterWhere(['like', 'lower(mdate)', strtolower($this->mdate)])
            ->andFilterWhere(['like', 'lower(SCHEMAID)', strtolower($this->SCHEMAID)])
            ->andFilterWhere(['like', 'lower(sch_updatedD)', strtolower($this->sch_updatedD)])
            ->andFilterWhere(['=', 'T_ACCMUTATION_DETAILS.MUTATION_STATUS_CODE', '0002'])
            ->orderBy('T_ACCMUTATION_TMP.cdate DESC' );

        return $dataProvider;
    }
}
