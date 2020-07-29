<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mschemaprice;
/**
 * MschemaPriceSearch represents the model behind the search form about `app\Models\Mschema`.
 */
class MschemapriceSearch extends Mschemaprice
{
    
    public function rules()
    {
        return [
            [['spriceid','sch_update','active','schedule_rules','cby','cdate','mby','mdate'],'safe'],
            [['priority'],'integer'],
        ];
        # code...
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
          $query = Mschemaprice::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => Yii::$app->params['pageLimit'],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
            # code...
        }

        $query->andFilterWhere(['like','lower(spriceid)',strtolower($this->spriceid)])
        ->andFilterWhere(['like','lower(sch_updated)',strtolower($this->sch_updated)])
        ->andFilterWhere(['=','m_price_schema.active',$this->active])
        ->andFilterWhere(['like','lower(schedule_rules)',strtolower($this->schedule_rules)])
        ->andFilterWhere(['like','lower(priority)',strtolower($this->priority)])
        ->andFilterWhere(['like','lower(cby)',strtolower($this->cby)])
        ->andFilterWhere(['like','lower(cdate)',strtolower($this->cdate)])
        ->andFilterWhere(['like','lower(mby)',strtolower($this->mby)])
        ->andFilterWhere(['like','lower(mdate)',strtolower($this->mdate)]);
          return $dataProvider;
     }
}