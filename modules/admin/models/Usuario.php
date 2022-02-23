<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "tb_usuario".
 *
 * @property int $usuario_cod_pk
 * @property int $modulo_cod_fk
 * @property int $perfil_cod_fk
 * @property string $usuario_nome
 * @property string $usuario_login
 * @property string $usuario_email
 * @property string $usuario_tel
 * @property string $usuario_senha
 * @property int $usuario_status
 *
 * @property Modulo $moduloCodFk
 * @property Perfil $perfilCodFk
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['modulo_cod_fk', 'perfil_cod_fk', 'usuario_status', 'usuario_nome', 'usuario_login', 'usuario_email', 'usuario_tel', 'usuario_senha'], 'required'],
            [['modulo_cod_fk', 'perfil_cod_fk', 'usuario_status'], 'integer'],
            [['usuario_nome'], 'string', 'max' => 150],
          //  [['usuario_nome'], 'filter', 'filter'=>'strtoupper '],//mb_strtoupper
           // [['usuario_nome'], 'filter', 'filter'=>'strtolower'],
            [['usuario_login'], 'string', 'max' => 50],
            [['usuario_email'], 'string', 'max' => 100],
            [['usuario_tel'], 'string', 'max' => 15],
            [['usuario_senha'], 'string', 'max' => 1000],
            [['modulo_cod_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Modulo::className(), 'targetAttribute' => ['modulo_cod_fk' => 'modulo_cod_pk']],
            [['perfil_cod_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['perfil_cod_fk' => 'perfil_cod_pk']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'usuario_cod_pk' => 'Código',
            'modulo_cod_fk' => 'Módulo',
            'perfil_cod_fk' => 'Perfil',
            'usuario_nome' => 'Nome',
            'usuario_login' => 'Login',
            'usuario_email' => 'E-mail',
            'usuario_tel' => 'Tel.',
            'usuario_senha' => 'Senha',
            'usuario_status' => 'Status',
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
     * Gets query for [[PerfilCodFk]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerfilCodFk()
    {
        return $this->hasOne(Perfil::className(), ['perfil_cod_pk' => 'perfil_cod_fk']);
    }
}
