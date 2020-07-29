<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Promo;

/**
 * BankSearch represents the model behind the search form about `app\models\Bank`.
 */
class PromoSearch extends Promo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url_image', 'url_content'], 'safe'],
            [['promo_seq', 'active'], 'number']
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
        $query = Promo::find();

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
        $query->andFilterWhere(['like', 'lower(promo_seq)', strtolower($this->promo_seq)])
            ->andFilterWhere(['like', 'lower(url_image)', strtolower($this->url_image)])
            ->andFilterWhere(['like', 'lower(url_content)', strtolower($this->url_content)])
            ->andFilterWhere(['like', 'lower(active)', strtolower($this->active)]);

        return $dataProvider;
    }
}
