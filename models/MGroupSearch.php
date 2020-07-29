<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MGroup;

/**
 * MGroupSearch represents the model behind the search form about `app\models\MGroup`.
 */
class MGroupSearch extends MGroup
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GROUPID', 'note', 'cby', 'cdate', 'mby', 'mdate', 'GROUPNAME'], 'safe'],
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
        $query = MGroup::find();

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
        $query->andFilterWhere(['like', 'GROUPID', $this->GROUPID])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'cby', $this->cby])
            ->andFilterWhere(['like', 'cdate', $this->cdate])
            ->andFilterWhere(['like', 'mby', $this->mby])
            ->andFilterWhere(['like', 'mdate', $this->mdate])
            ->andFilterWhere(['like', 'GROUPNAME', $this->GROUPNAME]);

        return $dataProvider;
    }
}
