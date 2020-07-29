<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mlayout;

/**
 * InflokasiSearch represents the model behind the search form about `app\Models\Inflokasi`.
 */
class MlayoutSearch extends Mlayout
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['layoutid', 'width', 'length', 'cby', 'cdate', 'mby', 'mdate'], 'safe'],
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
        $query = Mlayout::find();

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

        $query->andFilterWhere(['like', 'layoutid', $this->layoutid])
            ->andFilterWhere(['like', 'width', $this->width])
            ->andFilterWhere(['like', 'length', $this->length])
            ->andFilterWhere(['like', 'cby', $this->cby])
            ->andFilterWhere(['like', 'cdate', $this->mdate])
            ->andFilterWhere(['like', 'mby', $this->mby])
            ->andFilterWhere(['like', 'mdate', $this->mdate])
            ->orderBy('layoutid ASC');

        return $dataProvider;
    }
}
