<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MMenucfg;

/**
 * MMenucfgSearch represents the model behind the search form about `app\models\MMenucfg`.
 */
class MMenucfgSearch extends MMenucfg
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menucode', 'menuname', 'menutitle', 'menulink', 'menuicon', 'menuparent', 'cdate', 'cby', 'mdate', 'mby'], 'safe'],
            [['menuorder', 'status'], 'number'],
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
        $query = MMenucfg::find();

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
            'MENUORDER' => $this->menuorder,
            'STATUS' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'menucode', $this->menucode])
            ->andFilterWhere(['like', 'menuname', $this->menuname])
            ->andFilterWhere(['like', 'menutitle', $this->menutitle])
            ->andFilterWhere(['like', 'menulink', $this->menulink])
            ->andFilterWhere(['like', 'menuicon', $this->menuicon])
            ->andFilterWhere(['like', 'menuparent', $this->menuparent])
            ->andFilterWhere(['like', 'cdate', $this->cdate])
            ->andFilterWhere(['like', 'cby', $this->cby])
            ->andFilterWhere(['like', 'mdate', $this->mdate])
            ->andFilterWhere(['like', 'mby', $this->mby]);

        return $dataProvider;
    }
}
