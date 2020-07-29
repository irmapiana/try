<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Muser;

/**
 * MuserSearch represents the model behind the search form about `app\Models\Muser`.
 */
class MuserSearch extends Muser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'password', 'cby', 'cdate', 'mby', 'mdate', 'name', 'group_user', 'mobileno', 'webgroup_user'], 'safe'],
            [['status_user'], 'number'],
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
        $query = Muser::find();

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
        $query->andFilterWhere([
            'status_user' => $this->status_user,
        ]);

        $query->andFilterWhere(['like', 'lower(userid)', strtolower($this->userid)])
            ->andFilterWhere(['like', 'lower(password)', strtolower($this->password)])
            ->andFilterWhere(['like', 'lower(cby)', strtolower($this->cby)])
            ->andFilterWhere(['like', 'lower(cdate)', strtolower($this->cdate)])
            ->andFilterWhere(['like', 'lower(mby)', strtolower($this->mby)])
            ->andFilterWhere(['like', 'lower(mdate)', strtolower($this->mdate)])
            ->andFilterWhere(['like', 'lower(name)', strtolower($this->name)])
            ->andFilterWhere(['like', 'lower(group_user)', strtolower($this->group_user)])
            ->andFilterWhere(['like', 'lower(mobileno)', strtolower($this->mobileno)])
            ->andFilterWhere(['like', 'lower(webgroup_user)', strtolower($this->webgroup_user)]);

        return $dataProvider;
    }
}
