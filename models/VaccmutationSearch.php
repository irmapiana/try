<?php

namespace app\models;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use Yii;

/**
 * This is the model class for table "V_ACCMUTATION".
 *
 * @property string $MUTATION_STATUS_CODE
 * @property string $BANK_ACCOUNT_ID
 * @property string $MUTATIONID
 * @property string $userid
 * @property string $MTYPE
 * @property string $AMOUNT
 * @property string $noteS
 * @property string $BDATE
 * @property string $cby
 * @property string $cdate
 * @property string $mby
 * @property string $mdate
 * @property string $SCHEMAID
 * @property string $sch_updatedD
 * @property integer $ENDBALANCE
 */
class VaccmutationSearch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_rewardmutation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['end_balance'], 'integer'],
            [['userid', 'cby', 'mby'], 'string', 'max' => 20],
            [['reward_mutationid'], 'string', 'max' => 75],
            [['mtype'], 'string', 'max' => 2],
            [['remark'], 'string', 'max' => 100],
            [['cdate', 'mdate'], 'string', 'max' => 12],
            [['point'], 'string', 'max' => 19],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'reward_mutationid' => 'NO. MUTASI',
            'userid' => 'AKUN',
            'mtype' => 'TIPE',
            'cby' => 'cby',
            'cdate' => 'TANGGAL',
            'mby' => 'mby',
            'mdate' => 'Tanggal',
            'remark' => 'remark',
            'point' => 'point',
            'end_balance' => 'Endbalance',

        ];
        
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
        $query = Vaccmutation::find();

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

      /*  if (Yii::$app->request->get('from_date')) {
            $query->andFilterWhere(['>', 'cdate', new Expression("TO_DATE('" . Yii::$app->request->get('from_date') . "', 'yyyy/mm/dd')")]);
        }
        if (Yii::$app->request->get('to_date')) {
            $query->andFilterWhere(['<', 'cdate', new Expression("TO_DATE('" . Yii::$app->request->get('to_date') . "', 'yyyy/mm/dd')")]);
        }*/

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
        
        // grid filtering conditions
        $query->andFilterWhere(['like', 'lower(userid)', strtolower($this->userid)])
            ->andFilterWhere(['like', 'lower(reward_mutationid)', strtolower($this->reward_mutationid)])
            ->andFilterWhere(['like', 'lower(MTYPE)', strtolower($this->mtype)])
            ->andFilterWhere(['like', 'lower(ENDBALANCE)', strtolower($this->end_balance)])
            ->andFilterWhere(['like', 'lower(cby)', strtolower($this->cby)])
            // ->andFilterWhere(['like', 'lower(cdate'), strtolower($this->cdate)])
            ->andFilterWhere(['like', 'lower(mby)', strtolower($this->mby)])
            ->andFilterWhere(['like', 'lower(mdate)', strtolower($this->mdate)])
            ->orderBy('cdate DESC' );


        return $dataProvider;
    }

    function validateDate($date)
    {
        $d = \DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') == $date;
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function getMutationtype()
    {
        return $this->hasOne(Mmutationtype::className(), ['mtype' => 'mtype']);
    }


}
