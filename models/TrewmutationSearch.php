<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Trewmutation;
use yii\db\Expression;

/**
 * TrewmutationSearch represents the model behind the search form about `app\models\Trewmutation`.
 */
class TrewmutationSearch extends Trewmutation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reward_mutationid', 'userid', 'mtype', 'remark', 'cby', 'cdate', 'mby', 'mdate'], 'safe'],
            [['point'], 'number'],
            [['end_balance'], 'integer'],
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
        $query = Trewmutation::find();

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
        $query->andFilterWhere([
            'point' => $this->point,
            'end_balance' => $this->end_balance,
        ]);
        
        if (Yii::$app->request->get('from_date'))
        {
            if (Yii::$app->request->get('to_date') != '') {
                //tambah 1 hari ke to date
                $time_original = strtotime(Yii::$app->request->get('to_date'));
                $time_add      = $time_original + (3600*24); //add seconds of one day
                $upper_temp      = date("Y-m-d", $time_add);

                $str_upper = strtotime($upper_temp);
                $upper_ = date("Y/m/d", $str_upper);
                $upper = new Expression("TO_DATE('" . $upper_ . "', 'yyyy/mm/dd')");
            }

            $str_lower = strtotime(Yii::$app->request->get('from_date'));

            $lower_ = date("Y/m/d", $str_lower);

            $lower = new Expression("TO_DATE('" . $lower_ . "', 'yyyy/mm/dd')");

            if (Yii::$app->request->get('to_date') != '') {
                $query->andFilterWhere(['between', 'cdate', $lower, $upper]);
            } else {
                $query->andFilterWhere(['>=', 'cdate', $lower]);
            }
        }

        $query->andFilterWhere(['like', 'reward_mutationid', $this->reward_mutationid])
            ->andFilterWhere(['like', 'userid', $this->userid])
            ->andFilterWhere(['like', 'mtype', $this->mtype])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'cby', $this->cby])
            ->andFilterWhere(['like', 'mby', $this->mby])
            ->andFilterWhere(['like', 'mdate', $this->mdate])
            ->orderBy('cdate DESC' );

        return $dataProvider;
    }
    
      function validateDate($date)
    {
        $d = \DateTime::createFromFormat('d-M-Y', $date);
        return $d && $d->format('d-M-Y') == $date;
    }

}
