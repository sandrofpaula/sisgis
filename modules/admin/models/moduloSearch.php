<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Modulo;

/**
 * moduloSearch represents the model behind the search form of `app\modules\admin\models\Modulo`.
 */
class moduloSearch extends Modulo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['modulo_cod_pk'], 'integer'],
            [['modulo_descricao', 'modulo_id'], 'safe'],
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
        $query = Modulo::find();

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
            'modulo_cod_pk' => $this->modulo_cod_pk,
        ]);

        $query->andFilterWhere(['like', 'modulo_descricao', $this->modulo_descricao])
            ->andFilterWhere(['like', 'modulo_id', $this->modulo_id]);

        return $dataProvider;
    }
}
