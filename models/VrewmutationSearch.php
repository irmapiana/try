<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vrewmutation;
use yii\db\Expression;

/**
 * VrewmutationSearch represents the model behind the search form about `app\models\Vrewmutation`.
 */
class VrewmutationSearch extends Vrewmutation
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
        $query = Vrewmutation::find();

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

        if (Yii::$app->request->get('from_date') && Yii::$app->request->get('to_date'))
        {
            //tambah 1 hari ke to date
            $time_original = strtotime(Yii::$app->request->get('to_date'));
            $time_add      = $time_original + (3600*24); //add seconds of one day
            $upper_temp      = date("Y-m-d", $time_add);

            $str_upper = strtotime($upper_temp);
            $str_lower = strtotime(Yii::$app->request->get('from_date'));

            $lower_ = date("Y/m/d", $str_lower);
            $upper_ = date("Y/m/d", $str_upper);

            $lower = new Expression("TO_DATE('" . $lower_ . "', 'yyyy/mm/dd')");
            $upper = new Expression("TO_DATE('" . $upper_ . "', 'yyyy/mm/dd')");

            $query->andFilterWhere(['between', 'cdate', $lower, $upper]);
        }

        $query->andFilterWhere(['like', 'reward_mutationid', $this->reward_mutationid])
            ->andFilterWhere(['like', 'userid', $this->userid])
            ->andFilterWhere(['like', 'mtype', $this->mtype])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'cby', $this->cby])
           // ->andFilterWhere(['like', 'cdate', $this->cdate])
            ->andFilterWhere(['like', 'mby', $this->mby])
            ->andFilterWhere(['like', 'mdate', $this->mdate])
            ->orderBy('cdate DESC' );

        return $dataProvider;
    }
    
      function validateDate($date)
    {
        $d = \DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') == $date;
    }
}
