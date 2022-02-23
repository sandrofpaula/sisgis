<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "tb_modulo".
 *
 * @property int $modulo_cod_pk
 * @property string $modulo_descricao
 * @property string $modulo_id
 *
 * @property Perfil[] $perfils
 * @property Usuario[] $usuarios
 */
class Modulo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_modulo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['modulo_descricao', 'modulo_id'], 'required'],
            [['modulo_descricao', 'modulo_id'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'modulo_cod_pk' => 'Módulo',
            'modulo_descricao' => 'Descrição',
            'modulo_id' => 'ID do módulo',
        ];
    }

    /**
     * Gets query for [[Perfils]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerfils()
    {
        return $this->hasMany(Perfil::className(), ['modulo_cod_fk' => 'modulo_cod_pk']);
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['modulo_cod_fk' => 'modulo_cod_pk']);
    }
}
