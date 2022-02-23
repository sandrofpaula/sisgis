<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl.'/css/button.css';?>">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<!--
<link rel="stylesheet" href="<?php //echo Yii::$app->request->baseUrl.'/icofont/css/icofont.min.css"';?>">
-->

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Modulo */
/* @var $form yii\widgets\ActiveForm */
// Option 1: Uses the `icon-framework` setup in Yii config params. 
//Icon::map($this, Icon::EL); // Maps the Elusive icon font framework
//echo Icon::show('user'); 
//echo Icon::show('user', ['class'=>'fa-2x', 'framework' => Icon::FAS]); 


?>
<div class="modulo-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="panel panel-default">
        
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fas fa-sitemap "></i> <?= 'Cadastrar de Módulos' ?></h3>
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'modulo_descricao')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'modulo_id')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
    </div>
    

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
