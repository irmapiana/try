<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mmconfig;

/**
* 
*/
class MmconfigSearch extends Mmconfig
{
    
    public function rules()
    {
        return [
            [['identifier', 'url_mode', 'active', 'value'], 'safe'],
        ];
        # code...
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Mmconfig::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => Yii::$app->params['pageLimit'],
            ],
        ]);


        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
            # code...
        }

        $query->andFilterWhere(['like','identifier', $this->identifier])
            ->andFilterWhere(['like', 'url_mode', $this->url_mode])
            ->andFilterWhere(['like', 'active', $this->active])
            ->andFilterWhere(['like', 'value', $this->value])
            ->orderBy('identifier ASC');

            return $dataProvider;
    }
}

?>