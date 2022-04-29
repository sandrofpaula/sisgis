<?php

namespace app\modules\gis\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\gis\models\Arquivo;

/**
 * arquivoSearch represents the model behind the search form of `app\modules\gis\models\Arquivo`.
 */
class arquivoSearch extends Arquivo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
        [['arquivo_cod_pk'/*, 'ponto_turistico_cod_fk'*/], 'integer'],
            [['arquivo_conteudo_nome','arquivo_conteudo', 'arquivo_conteudo_tipo'], 'safe'],
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
        $query = Arquivo::find();

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
            'arquivo_cod_pk' => $this->arquivo_cod_pk,
            //'ponto_turistico_cod_fk' => $this->ponto_turistico_cod_fk,
        ]);

        $query->andFilterWhere(['like', 'arquivo_conteudo', $this->arquivo_conteudo])
            ->andFilterWhere(['like', 'arquivo_conteudo_nome', $this->arquivo_conteudo_nome])
            ->andFilterWhere(['like', 'arquivo_conteudo_tipo', $this->arquivo_conteudo_tipo]);

        return $dataProvider;
    }
}
