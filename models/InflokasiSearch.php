<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\activeDataProvider;
use app\Models\Inflokasi;

/**
 * InflokasiSearch represents the model behind the search form about `app\Models\Inflokasi`.
 */
class InflokasiSearch extends Inflokasi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOKASI_ID', 'LOKASI_PROPINSI', 'LOKASI_KABUPATENKOTA', 'LOKASI_KECAMATAN', 'LOKASI_KELURAHAN'], 'number'],
            [['LOKASI_KODE', 'LOKASI_NAMA'], 'safe'],
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
        $query = Inflokasi::find();

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
            'LOKASI_ID' => $this->LOKASI_ID,
            'LOKASI_PROPINSI' => $this->LOKASI_PROPINSI,
            'LOKASI_KABUPATENKOTA' => $this->LOKASI_KABUPATENKOTA,
            'LOKASI_KECAMATAN' => $this->LOKASI_KECAMATAN,
            'LOKASI_KELURAHAN' => $this->LOKASI_KELURAHAN,
        ]);

        $query->andFilterWhere(['like', 'LOKASI_KODE', $this->LOKASI_KODE])
            ->andFilterWhere(['like', 'LOKASI_NAMA', $this->LOKASI_NAMA]);

        return $dataProvider;
    }
}
