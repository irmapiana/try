<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Taccmutation;

/**
 * TaccmutationSearch represents the model behind the search form about `app\models\Taccmutation`.
 */
class TaccmutationSearch extends Taccmutation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MUTATIONID', 'userid', 'MTYPE', 'noteS', 'BDATE', 'cby', 'cdate', 'mby', 'mdate', 'SCHEMAID', 'sch_updatedD'], 'safe'],
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
        $query = Taccmutation::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
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
            'AMOUNT' => $this->AMOUNT,
            'ENDBALANCE' => $this->ENDBALANCE,
        ]);

        $query->andFilterWhere(['like', 'MUTATIONID', $this->MUTATIONID])
            ->andFilterWhere(['like', 'userid', $this->userid])
            ->andFilterWhere(['like', 'MTYPE', $this->MTYPE])
            ->andFilterWhere(['like', 'noteS', $this->noteS])
            ->andFilterWhere(['like', 'BDATE', $this->BDATE])
            ->andFilterWhere(['like', 'cby', $this->cby])
            ->andFilterWhere(['like', 'cdate', $this->cdate])
            ->andFilterWhere(['like', 'mby', $this->mby])
            ->andFilterWhere(['like', 'mdate', $this->mdate])
            ->andFilterWhere(['like', 'SCHEMAID', $this->SCHEMAID])
            ->andFilterWhere(['like', 'sch_updatedD', $this->sch_updatedD]);

        return $dataProvider;
    }
}
