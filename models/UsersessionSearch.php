<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usersession;
use yii\db\Expression;

/**
 * UsersessionSearch represents the model behind the search form about `app\models\Usersession`.
 */
class UsersessionSearch extends Usersession
{
    /**
     * @inheritdoc
    */
    
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['user.NAME', 'user.MOBILENO', 'user.BIRTHDATE', 'user.MOTHERNAME']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SSID', 'SECRETKEY', 'IMEIID', 'userid', 'user.NAME', 'user.MOBILENO', 'user.BIRTHDATE', 'user.MOTHERNAME'], 'safe'],
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
        // var_dump($params);die();
        $query = Usersession::find();
        
        $query->joinWith(['user']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => Yii::$app->params['pageLimit'],
            ],
        ]);

        $this->load($params);
        // var_dump($dataProvider);die();

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        $dataProvider->sort->attributes['user.NAME'] = [
          'asc' => ['M_USER.NAME' => SORT_ASC],
          'desc' => ['M_USER.NAME' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['user.MOBILENO'] = [
          'asc' => ['M_USER.MOBILENO' => SORT_ASC],
          'desc' => ['M_USER.MOBILENO' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['user.BIRTHDATE'] = [
          'asc' => ['M_USER.BIRTHDATE' => SORT_ASC],
          'desc' => ['M_USER.BIRTHDATE' => SORT_DESC],
        ];
        
        $dataProvider->sort->attributes['user.MOTHERNAME'] = [
          'asc' => ['M_USER.MOTHERNAME' => SORT_ASC],
          'desc' => ['M_USER.MOTHERNAME' => SORT_DESC],
        ];

        if (isset($params['UsersessionSearch']['user.BIRTHDATE']) && $params['UsersessionSearch']['user.BIRTHDATE']) {
            $date = date_format(date_create($this->getAttribute('user.BIRTHDATE')), 'Y-m-d');
            // var_dump(str_replace('-', '', $date));die();
            $query->andFilterWhere(['=', 'M_USER.BIRTHDATE', str_replace('-', '', $date)]);
        }
        // grid filtering conditions
        $query->andFilterWhere(['=', 'lower(SSID)', strtolower($this->SSID)])
            ->andFilterWhere(['=', 'lower(SECRETKEY)', strtolower($this->SECRETKEY)])
            ->andFilterWhere(['=', 'lower(IMEIID)', strtolower($this->IMEIID)])
            ->andFilterWhere(['=', 'lower(USER_SESSIONS.userid)', strtolower($this->userid)])
            ->andFilterWhere(['=', 'lower(M_USER.NAME)', strtolower($this->getAttribute('user.NAME'))])
            ->andFilterWhere(['=', 'lower(M_USER.MOBILENO)', strtolower($this->getAttribute('user.MOBILENO'))])
            // ->andFilterWhere(['=', 'lower(M_USER.BIRTHDATE)', str_replace('-', '', date_format(date_create(strtolower($this->getAttribute('user.BIRTHDATE')), 'Y-)m-d'))])
            ->andFilterWhere(['=', 'lower(M_USER.MOTHERNAME)', strtolower($this->getAttribute('user.MOTHERNAME'))]);

        return $dataProvider;
    }
}
