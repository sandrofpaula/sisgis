<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Perfil;

/**
 * perfilSearch represents the model behind the search form of `app\modules\admin\models\Perfil`.
 */
class perfilSearch extends Perfil
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['perfil_cod_pk', 'modulo_cod_fk', 'perfil_status'], 'integer'],
            [['perfil_descricao'], 'safe'],
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
        $query = Perfil::find();

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
            'perfil_cod_pk' => $this->perfil_cod_pk,
            'modulo_cod_fk' => $this->modulo_cod_fk,
            'perfil_status' => $this->perfil_status,
        ]);

        $query->andFilterWhere(['like', 'perfil_descricao', $this->perfil_descricao]);

        return $dataProvider;
    }
}
