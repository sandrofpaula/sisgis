<?php

namespace app\modules\gis\models;

use Yii;

/**
 * This is the model class for table "tb_arquivo".
 *
 * @property int $arquivo_cod_pk
 * @property int $ponto_turistico_cod_fk
 * @property string $arquivo_conteudo_nome
 * @property resource $arquivo_conteudo
 * @property string $arquivo_conteudo_tipo
 *
 * @property PontoTuristico $pontoTuristicoCodFk
 */
class Arquivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $arquivo_conteudo_size_text; 

    public static function tableName()
    {
        return 'tb_arquivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
        [[/*'arquivo_conteudo', 'arquivo_conteudo_tipo'*/], 'required'],
            [['arquivo_conteudo'], 'string'],
            [['arquivo_conteudo_tipo'], 'string', 'max' => 50],
            [['arquivo_conteudo_nome'], 'string', 'max' => 255],
            [['arquivo_conteudo_size'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'arquivo_cod_pk' => 'Arquivo Cod Pk',
            'arquivo_conteudo_nome' => 'Arquivo Nome',
            'arquivo_conteudo' => 'Arquivo Conteudo',
            'arquivo_conteudo_tipo' => 'Arquivo Conteudo Tipo',
            'arquivo_conteudo_size' => 'Tamanho',
        ];
    }

    /**
     * Gets query for [[PontoTuristicoCodFk]].
     *
     * @return \yii\db\ActiveQuery
     */   

}
