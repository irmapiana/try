<?php

namespace app\Models;

use Yii;
use yii\base\Model;
use yii\data\activeDataProvider;
use app\models\Mregrpoint;
use yii\db\Expression;

/**
 * MregrpointSearch represents the model behind the search form about `app\Models\Mregrpoint`.
 */
class MregrpointSearch extends Mregrpoint
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['RRPOINTID', 'RRPLEVEL_CODE', 'RRPOINT_VALIDFROM', 'RRPOINT_VALIDUNTIL', 'cby', 'cdate', 'mby', 'mdate'], 'safe'],
            [['RRPOINT_0', 'RRPOINT_1', 'RRPOINT_2'], 'number'],
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
        $query = Mregrpoint::find();

        // add conditions that should always apply here

        $dataProvider = new activeDataProvider([
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
            'RRPOINT_0' => $this->RRPOINT_0,
            'RRPOINT_1' => $this->RRPOINT_1,
            'RRPOINT_2' => $this->RRPOINT_2,
        ]);

        if ($this->RRPOINT_VALIDFROM) {
            $query->andFilterWhere(['>=', 'RRPOINT_VALIDFROM', new Expression("TO_DATE('" . $this->RRPOINT_VALIDFROM . "', 'dd-mm-yyyy')")]);
        }
        if ($this->RRPOINT_VALIDUNTIL) {
            $query->andFilterWhere(['<=', 'RRPOINT_VALIDUNTIL', new Expression("TO_DATE('" . $this->RRPOINT_VALIDUNTIL . "', 'dd-mm-yyyy')")]);
        }

        $query->andFilterWhere(['like', 'RRPOINTID', $this->RRPOINTID])
            ->andFilterWhere(['=', 'RRPLEVEL_CODE', $this->RRPLEVEL_CODE])
            // ->andFilterWhere(['like', 'RRPOINT_VALIDFROM', $this->RRPOINT_VALIDFROM])
            // ->andFilterWhere(['like', 'RRPOINT_VALIDUNTIL', $this->RRPOINT_VALIDUNTIL])
            ->andFilterWhere(['like', 'cby', $this->cby])
            ->andFilterWhere(['like', 'cdate', $this->cdate])
            ->andFilterWhere(['like', 'mby', $this->mby])
            ->andFilterWhere(['like', 'mdate', $this->mdate]);

        return $dataProvider;
    }
}
