<?php
use yii\helpers\Html;
use app\modules\suporte\models\USUARIO;
use app\modules\suporte\models\usuarioSearch;
/* @var $this yii\web\View */

$this->title = 'Admin';
?>
<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl.'/css/button.css';?>">
<style>
	legend{ color: #006b5c; background-color: #f5f5f5; border-radius: 4px; padding: 5px; }
</style>
<br>
<!--
<div class="admin-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>
</div>
-->
<div align="center">           
<div class="site-index">
	<div class="jumbotron">
		<p><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/logo_gis2.png" width="300"></p>
		<!--<p style="color: #006b5c; font-size: 28px;">SISMAQWEB 2.0</p>-->
		<br/>
            <!--
                <p>
                <?php
					 //$model = USUARIO::findOne(Yii::$app->user->identity->USUARIO_COD_PK);
					 //echo '<br>'. $model->USUARIO_NOME.'<br>';
					 //echo '<br>'. $model->USUARIO_LOGIN.'<br>';
					 //echo '<br>'. Yii::$app->user->identity->USUARIO_COD_PK .'<br>';
				?>
            </p>
            -->

            <p>
            <?php
                if(!Yii::$app->user->isGuest){
                    echo Html::a('Pontos Turísticos', ['pontoturistico/'], ['class' => 'btn-lightgrey']);
                    echo Html::a('Arquivo'          , ['arquivo/'], ['class' => 'btn-lightgrey']);
                    //echo Html::a('Perfil', ['perfil/'], ['class' => 'btn-lightgrey']);
                  //  echo Html::a('Usuário', ['usuario/'], ['class' => 'btn-lightgrey']);
                    //echo '<br>usuario_cod_pk: '.Yii::$app->user->identity->usuario_cod_pk;
                    //echo '<br>usuario_cod_pk: '.Yii::$app->user->id;
                }
            
            ?>
            </p>
    </div>   	
</div>
