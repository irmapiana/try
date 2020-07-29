<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MMenugroup;

/**
 * MMenugroupSearch represents the model behind the search form about `app\models\MMenugroup`.
 */
class MMenugroupSearch extends MMenugroup
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menucode', 'group_user', 'cdate', 'cby', 'mdate', 'mby'], 'safe'],
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
        $query = MMenugroup::find();

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
        $query->andFilterWhere(['like', 'menucode', $this->menucode])
            ->andFilterWhere(['like', 'group_user', $this->group_user])
            ->andFilterWhere(['like', 'cdate', $this->cdate])
            ->andFilterWhere(['like', 'cby', $this->cby])
            ->andFilterWhere(['like', 'mdate', $this->mdate])
            ->andFilterWhere(['like', 'mby', $this->mby]);

        return $dataProvider;
    }
}
