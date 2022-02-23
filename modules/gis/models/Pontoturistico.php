<?php

namespace app\modules\gis\models;

use Yii;

/**
 * This is the model class for table "tb_ponto_turistico".
 *
 * @property int $ponto_turistico_cod_pk
 * @property string $ponto_turistico_nome
 * @property string $ponto_turistico_descricao
 * @property string $ponto_turistico_endereço
 * @property string $ponto_turistico_latitude
 * @property string $ponto_turistico_longitude
 */
class Pontoturistico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_ponto_turistico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ponto_turistico_nome', 'ponto_turistico_descricao', 'ponto_turistico_endereço', 'ponto_turistico_latitude', 'ponto_turistico_longitude'], 'required'],
            [['ponto_turistico_nome'], 'string', 'max' => 150],
            [['ponto_turistico_descricao', 'ponto_turistico_endereço'], 'string', 'max' => 1000],
            [['ponto_turistico_latitude', 'ponto_turistico_longitude'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ponto_turistico_cod_pk' => 'Ponto Turistico Cod Pk',
            'ponto_turistico_nome' => 'Ponto Turistico Nome',
            'ponto_turistico_descricao' => 'Ponto Turistico Descricao',
            'ponto_turistico_endereço' => 'Ponto Turistico Endereço',
            'ponto_turistico_latitude' => 'Ponto Turistico Latitude',
            'ponto_turistico_longitude' => 'Ponto Turistico Longitude',
        ];
    }
}
