<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Muserschemaprice;

/**
 * MschemaSearch represents the model behind the search form about `app\Models\Mschema`.
 */
class MuserschemapriceSearch extends Muserschemaprice
{

    /**
     * @inheritdoc
     */

    public function rules()
    {
        return [
            [['spriceid', 'userid', 'cby', 'cdate', 'mby', 'mdate'], 'safe'],
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
        $query = Muserschemaprice::find();


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => Yii::$app->params['pageLimit'],
            ],
        ]);

        $dataProvider->sort->attributes['userschemaprice.spriceid'] = [
            'asc' => ['m_price_schema.spriceid'],
            'desc' => ['m_price_schema.spriceid'],

        ];


        if (!($this->load($params) && $this->validate())) {
                return $dataProvider;
            }

        // grid filtering conditions

        $query->andFilterWhere(['like', 'lower(spriceid)', strtolower($this->spriceid)])
            ->andFilterWhere(['like', 'lower(userid)', strtolower($this->userid)])
            ->andFilterWhere(['like', 'lower(cby)', strtolower($this->cby)])
            ->andFilterWhere(['like', 'lower(cdate)', strtolower($this->cdate)])
            ->andFilterWhere(['like', 'lower(mby)', strtolower($this->mby)])
            ->andFilterWhere(['like', 'lower(mdate)', strtolower($this->mdate)]);

        return $dataProvider;
    }
}
