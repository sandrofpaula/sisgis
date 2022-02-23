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
<div align="center">           
<div class="site-index">
	<div class="jumbotron">
		<p><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/logo_admin.png" width="300"></p>
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
                    echo Html::a('Admin', ['admin/'], ['class' => 'btn-lightgrey']);
                    echo Html::a('Gis', ['gis/'], ['class' => 'btn-lightgrey']);
                    //echo '<br>usuario_cod_pk: '.Yii::$app->user->identity->usuario_cod_pk;
                    //echo '<br>usuario_cod_pk: '.Yii::$app->user->id;
                }
            
            ?>
              <!--  <?= Html::a('Suporte', ['admin/'], ['class' => 'btn-lightgrey']) ?>-->
            </p>
    </div>   	
</div>
<!--
<br>
<br>
<span class="label label-purple">purple</span>
<span class="label label-thistle">thistle</span>
<span class="label label-chocolate">chocolate</span>
-->