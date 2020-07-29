<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mservice;
use yii\db\Expression;

/**
 * MregrpointSearch represents the model behind the search form about `app\Models\Mregrpoint`.
 */
class MserviceSearch extends Mservice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['service_name', 'build_number', 'url_mode','active','url'], 'safe'],
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
        $query = Mservice::find();

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
        $query->andFilterWhere(['like', 'service_name', $this->service_name])
            ->andFilterWhere(['like', 'build_number', $this->build_number])
            ->andFilterWhere(['like', 'url_mode', $this->url_mode])
            // ->andFilterWhere(['like', 'RRPOINT_VALIDFROM', $this->RRPOINT_VALIDFROM])
            // ->andFilterWhere(['like', 'RRPOINT_VALIDUNTIL', $this->RRPOINT_VALIDUNTIL])
            ->andFilterWhere(['like', 'active', $this->active])
            ->andFilterWhere(['like', 'url', $this->url])
            ->orderBy('service_name ASC');

        return $dataProvider;
    }
}
