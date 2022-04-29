<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\modules\gis\models\Arquivo */
/* @var $form yii\widgets\ActiveForm */
$this->params['breadcrumbs'][] = ['label' => 'Anexar arquivos blob', ];
?>

<div class="arquivo-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?php //echo $form->field($model, 'ponto_turistico_cod_fk')->textInput(['value' => 1]) ?> -->

    <!-- <?= $form->field($model, 'arquivo_conteudo')->textInput() ?> -->
    <?php
			echo  $form->field($model, 'arquivo_conteudo')->widget(FileInput::className(),[
					'options' => [
						'accept' => 'doc/*', 'file/*',
						'enableLabel' => TRUE,
					],
					'pluginOptions' => [
						'language'=> Yii::$app->language,
						'allowedFileExtensions' => ['zip','jpeg','jpg','png','doc','docx','xls', 'xlsx','ppt','pptx','pdf',],
						'showPreview' => false,
						'maxFileSize' => 20480, //20480, //10240
						'showPreview' => true,
						'showCaption' => true,
						'showRemove' => true,
						'showUpload' => false,
						'maxFileCount' => 1, 
					],
			]) ;   
		?>

    <!-- <?= $form->field($model, 'arquivo_conteudo_tipo')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
