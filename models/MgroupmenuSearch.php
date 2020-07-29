<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mgroupmenu;

/**
 * BankSearch represents the model behind the search form about `app\models\Bank`.
 */
class MgroupmenuSearch extends Mgroupmenu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_menuid', 'label', 'resourceid','parent', 'group_menu_seq','cby', 'cdate', 'mby', 'mdate','level', 'bar_type', 'has_group_child', 'category', 'next_class', 'active'], 'safe'],
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
        $query = Mgroupmenu::find();

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
        $query->andFilterWhere(['like', 'lower(group_menuid)', strtolower($this->group_menuid)])
            ->andFilterWhere(['like', 'lower(label)', strtolower($this->label)])
            ->andFilterWhere(['like', 'lower(resourceid)', strtolower($this->resourceid)])
            ->andFilterWhere(['like', 'lower(parent)', strtolower($this->parent)])
            ->andFilterWhere(['like', 'lower(group_menu_seq)', strtolower($this->group_menu_seq)])
            ->andFilterWhere(['like', 'lower(cby)', strtolower($this->cby)])
            ->andFilterWhere(['like', 'lower(cdate)', strtolower($this->cdate)])
            ->andFilterWhere(['like', 'mby', $this->mby])
            ->andFilterWhere(['like', 'mdate', $this->mdate])
            ->andFilterWhere(['like', 'lower(level)', strtolower($this->level)])
            ->andFilterWhere(['like', 'lower(bar_type)', strtolower($this->bar_type)])
            ->andFilterWhere(['like', 'lower(has_group_child)', strtolower($this->has_group_child)])
            ->andFilterWhere(['like', 'lower(category)', strtolower($this->category)])
            ->andFilterWhere(['like', 'lower(next_class)', strtolower($this->next_class)])
            ->andFilterWhere(['like', 'lower(active)', strtolower($this->active)])
            ->orderBy('group_menuid ASC');
            

        return $dataProvider;
    }
}
