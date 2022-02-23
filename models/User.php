<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;


class User extends ActiveRecord implements IdentityInterface
{       
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    public $senhaAtual;
    public $novaSenha;
    public $confirm;

    
    	
	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dbsisadmin.tb_usuario';
    }


    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
        //$user = User::findOne(['USU_ID_USUARIO' => $id]);        
        //return new static($user);
    }

    /**
     * @inheritdoc
     */
	public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    /*public static function findByUsername($username)
    {
       return static::findOne(['USU_NOME' => $username]);       
    }*/
    
	
    public static function findByUsername($username)
    {        
    	$user = User::findOne(['usuario_login' => $username]);
    	
        if (strcasecmp($user->usuario_login, $username) === 0) {
        	return new static($user);
        }
        
        return null;
    }
    
    

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->usuario_cod_pk;
    }	
    
 	/*public function getUsername()
    {
        return $this->USU_NOME;
    }*/
        
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->usuario_senha === md5($password);
    }
}
