<?php

namespace app\models;

use  Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mmessagetemplate;

class MmessagetemplateSearch extends Mmessagetemplate
{
	public function rules()
	{
		return [
			[['code', 'template', 'params', 'cby', 'cdate', 'mby', 'mdate'], 'safe'],
		];
	}

	public function scenarios()
	{
		return Model::scenarios();
	}

	public function search($params)
	{
		$query = Mmessagetemplate::find();

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
		$query->andFilterWhere(['like', 'code', $this->code])
		->andFilterWhere(['like', 'template', $this->template])
		->andFilterWhere(['like', 'params', $this->params])
		->andFilterWhere(['like', 'cby', $this->cby])
		->andFilterWhere(['like', 'cdate', $this->cdate])
		->andFilterWhere(['like', 'mby', $this->mby])
		->andFilterWhere(['like', 'mdate', $this->mdate])
		->orderBy('code ASC');

		return $dataProvider;
	}
}
?>