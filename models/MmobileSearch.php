<?php

namespace app\Models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mmobile;
use yii\db\Expression;

/**
 * MregrpointSearch represents the model behind the search form about `app\Models\Mregrpoint`.
 */
class MmobileSearch extends Mmobile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mobileid', 'mobilepin', 'mobileno', 'deviceid', 'cby', 'cdate', 'mby', 'mdate'], 'safe'],
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
        $query = Mmobile::find();

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
        $query->andFilterWhere(['like', 'mobileid', $this->mobileid])
            ->andFilterWhere(['like', 'mobilepin', $this->mobilepin])
            ->andFilterWhere(['like', 'mobileno', $this->mobileno])
            ->andFilterWhere(['like', 'deviceid', $this->deviceid])
            // ->andFilterWhere(['like', 'RRPOINT_VALIDFROM', $this->RRPOINT_VALIDFROM])
            // ->andFilterWhere(['like', 'RRPOINT_VALIDUNTIL', $this->RRPOINT_VALIDUNTIL])
            ->andFilterWhere(['like', 'cby', $this->cby])
            ->andFilterWhere(['like', 'cdate', $this->cdate])
            ->andFilterWhere(['like', 'mby', $this->mby])
            ->andFilterWhere(['like', 'mdate', $this->mdate])
            ->orderBy('mobileid ASC');

        return $dataProvider;
    }
}
