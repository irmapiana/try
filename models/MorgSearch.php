<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\activeDataProvider;
use app\models\Morg;

/**
 * MorgSearch represents the model behind the search form about `app\models\Morg`.
 */
class MorgSearch extends Morg
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ISOBIT', 'BALANCE'], 'integer'],
            [['ISOVALUE', 'ADDRESS', 'PIC', 'EMAIL', 'TLP', 'CHECKLIMIT', 'cby', 'cdate', 'mby', 'mdate', 'ORGNAME', 'ORGID', 'ITEXT', 'PRINT', 'PARENT_ORGID', 'ISDEALER'], 'safe'],
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
     * @return activeDataProvider
     */
    public function search($params)
    {
        $query = Morg::find();

        // add conditions that should always apply here

        $dataProvider = new activeDataProvider([
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
            'ISOBIT' => $this->ISOBIT,
            'BALANCE' => $this->BALANCE,
        ]);

        $query->andFilterWhere(['like', 'lower(ISOVALUE)', strtolower($this->ISOVALUE)])
            ->andFilterWhere(['like', 'lower(ADDRESS)', strtolower($this->ADDRESS)])
            ->andFilterWhere(['like', 'lower(PIC)', strtolower($this->PIC)])
            ->andFilterWhere(['like', 'lower(EMAIL)', strtolower($this->EMAIL)])
            ->andFilterWhere(['like', 'lower(TLP)', strtolower($this->TLP)])
            ->andFilterWhere(['like', 'lower(CHECKLIMIT)', strtolower($this->CHECKLIMIT)])
            ->andFilterWhere(['like', 'lower(cby)', strtolower($this->cby)])
            ->andFilterWhere(['like', 'lower(cdate)', strtolower($this->cdate)])
            ->andFilterWhere(['like', 'lower(mby)', strtolower($this->mby)])
            ->andFilterWhere(['like', 'lower(mdate)', strtolower($this->mdate)])
            ->andFilterWhere(['like', 'lower(ORGNAME)', strtolower($this->ORGNAME)])
            ->andFilterWhere(['like', 'lower(ORGID)', strtolower($this->ORGID)])
            ->andFilterWhere(['like', 'lower(ITEXT)', strtolower($this->ITEXT)])
            ->andFilterWhere(['like', 'lower(PRINT)', strtolower($this->PRINT)])
            ->andFilterWhere(['like', 'lower(PARENT_ORGID)', strtolower($this->PARENT_ORGID)])
            ->andFilterWhere(['like', 'lower(ISDEALER)', strtolower($this->ISDEALER)])
            ->orderBy('ORGID ASC');

        return $dataProvider;
    }
}
