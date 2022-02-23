<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;

//use app\models\Alterarsenha;


$model = new User;
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Aterar Senha';
$this->params['breadcrumbs'][] = ['label' => 'Usuários', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php //$form = ActiveForm::begin(['action' => 'user/updateSenha']); ?>
    
	
<?php 
$user = User::findOne(Yii::$app->user->id);
?>
<style type="text/css">

    #box{
    /*definimos a largura do box*/
    color: #FFFFFF;
    text-shadow: #000000 0.1em 0.1em 0.2em;
    /*width:300px;*/
    width: auto;
    /* definimos a altura do box */
    /*height:100px;*/
    height: auto;
    /* definimos a cor de fundo do box */
    /*background-color:#6495ed;*/
    background-color:#3A6ED2    ;
    /* definimos o quão arredondado irá ficar nosso box */
    border-radius: 10px;
    /* Declaração para aparecer no Firefox */
    -moz-border-radius: 10px;
    /* Para exibir nos outros navegadores como Chrome, safari, opera*/
    -webkit-border-radius: 10px;
    }
</style>
<div id="box">
<?php

echo Html::label('&nbsp;&nbsp;&nbsp;Cod. Usuário: '.$user->usuario_cod_pk, 'user-form');
echo '<br />';
echo Html::label('&nbsp;&nbsp;&nbsp;Nome: '.$user->usuario_nome, 'user-form');
echo '<br />';
echo Html::label('&nbsp;&nbsp;&nbsp;Login: '.$user->usuario_login, 'user-form');
echo '<br/>'; 
echo Html::label('&nbsp;&nbsp;&nbsp;E-mail: '.$user->usuario_email, 'user-form');
echo '<br/>'; 
/*
echo 'Nome: '.$user->first_name.' '.$user->last_name.'<br/>';
echo 'Login: '.$user->username.'<br/>';
echo 'E-mail: '.$user->email.'<br/>';
*/
?>
</div>
<div class="form-group">
    <?= $form->field($model, 'senhaAtual')->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'novaSenha')->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'confirm')->passwordInput(['maxlength' => true]) ?>
</div>
<!--
<span class="glyphicon glyphicon-ok-circle"></span>
<span class="glyphicon glyphicon-ok-circle" style="color:green;"></span>

-->
<?php

/*function generatePassword($qtyCaraceters = 8)
{
    //Letras minúsculas embaralhadas
    $smallLetters = str_shuffle('abcdefghijklmnopqrstuvwxyz');
 
    //Letras maiúsculas embaralhadas
    $capitalLetters = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
 
    //Números aleatórios
    $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
    $numbers .= 1234567890;
 
    //Caracteres Especiais
    $specialCharacters = str_shuffle('!@#$%*-');
 
    //Junta tudo
    $characters = $capitalLetters.$smallLetters.$numbers.$specialCharacters;
 
    //Embaralha e pega apenas a quantidade de caracteres informada no parâmetro
    $password = substr(str_shuffle($characters), 0, $qtyCaraceters);
 
    //Retorna a senha
    return $password;
}*/
//echo generatePassword(10);
//echo Yii::$app->user->identity->username.'<br />';
//echo Yii::$app->user->identity->id.'<br />';
//echo Yii::$app->user->identity->password.'<br />';
/*$nivel= Yii::$app->user->identity->user_level;
if($nivel=='Admin'){
    $check=$nivel;
}
echo 'user_level:'. $check;*/
////
//$model = seg_usuario::model()->ativos()->findByAttributes(array('USU_NOME'=>Yii::app()->user->name));
////
//ECHO Yii::$app->user->identity->user_level;
////////////////////////////
//$User = User::find()->where(['username'=>Yii::$app->user->identity->username])->one();
//$User = $User['first_name'];
//echo $user_level.'<br />';

//echo $user['password'].'<br />';


//$User = User::find()->where(['username'=>Yii::$app->user->identity->username])->one();  
//echo $User['password'];


//echo Html::a("Link", ["user/view"]);

	//echo $form->field($model, 'password')->passwordInput()->label('Senha Atual');
	//echo $form->field($model, 'password')->passwordInput()->label('Nova Senha');
	//echo $form->field($model, 'password')->passwordInput()->label('Confirmação Nova Senha');
	//echo Html::checkbox('reveal-password', false, ['id' => 'reveal-password']);
	//echo Html::label('Show password', 'reveal-password'); 
?>
    <div class="form-group">
        <?php echo Html::submitButton('Confirmar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
