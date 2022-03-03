<?php

namespace app\modules\gis\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\gis\models\Pontoturistico;

/**
 * pontoturisticoSearch represents the model behind the search form of `app\modules\gis\models\Pontoturistico`.
 */
class pontoturisticoSearch extends Pontoturistico
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ponto_turistico_cod_pk'], 'integer'],
            [['ponto_turistico_nome', 'ponto_turistico_descricao', 'ponto_turistico_endereço', 'ponto_turistico_latitude', 'ponto_turistico_longitude'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Pontoturistico::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>[
                'pageSize'=>5
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
            'ponto_turistico_cod_pk' => $this->ponto_turistico_cod_pk,
        ]);

        $query->andFilterWhere(['like', 'ponto_turistico_nome', $this->ponto_turistico_nome])
            ->andFilterWhere(['like', 'ponto_turistico_descricao', $this->ponto_turistico_descricao])
            ->andFilterWhere(['like', 'ponto_turistico_endereço', $this->ponto_turistico_endereço])
            ->andFilterWhere(['like', 'ponto_turistico_latitude', $this->ponto_turistico_latitude])
            ->andFilterWhere(['like', 'ponto_turistico_longitude', $this->ponto_turistico_longitude]);

        return $dataProvider;
    }
}
