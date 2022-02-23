<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Usuario;

/**
 * usuarioSearch represents the model behind the search form of `app\modules\admin\models\Usuario`.
 */
class usuarioSearch extends Usuario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuario_cod_pk', 'modulo_cod_fk', 'perfil_cod_fk', 'usuario_status'], 'integer'],
            [['usuario_nome', 'usuario_login', 'usuario_email', 'usuario_tel', 'usuario_senha'], 'safe'],
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
        $query = Usuario::find();

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
            'usuario_cod_pk' => $this->usuario_cod_pk,
            'modulo_cod_fk' => $this->modulo_cod_fk,
            'perfil_cod_fk' => $this->perfil_cod_fk,
            'usuario_status' => $this->usuario_status,
        ]);

        $query->andFilterWhere(['like', 'usuario_nome', $this->usuario_nome])
            ->andFilterWhere(['like', 'usuario_login', $this->usuario_login])
            ->andFilterWhere(['like', 'usuario_email', $this->usuario_email])
            ->andFilterWhere(['like', 'usuario_tel', $this->usuario_tel])
            ->andFilterWhere(['like', 'usuario_senha', $this->usuario_senha]);

        return $dataProvider;
    }
}
