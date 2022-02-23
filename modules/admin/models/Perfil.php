<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "tb_perfil".
 *
 * @property int $perfil_cod_pk
 * @property int $modulo_cod_fk
 * @property string $perfil_descricao
 * @property int $perfil_status
 *
 * @property Modulo $moduloCodFk
 * @property Usuario[] $usuarios
 */
class Perfil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_perfil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['modulo_cod_fk', 'perfil_descricao', 'perfil_status'], 'required'],
            [['modulo_cod_fk', 'perfil_status'], 'integer'],
            [['perfil_descricao'], 'string', 'max' => 765],
            [['modulo_cod_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Modulo::className(), 'targetAttribute' => ['modulo_cod_fk' => 'modulo_cod_pk']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'perfil_cod_pk' => 'Código',
            'modulo_cod_fk' => 'Módulo',
            'perfil_descricao' => 'Descrição',
            'perfil_status' => 'Status',
        ];
    }

    /**
     * Gets query for [[ModuloCodFk]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModuloCodFk()
    {
        return $this->hasOne(Modulo::className(), ['modulo_cod_pk' => 'modulo_cod_fk']);
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['perfil_cod_fk' => 'perfil_cod_pk']);
    }
}
