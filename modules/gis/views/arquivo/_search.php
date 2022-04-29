<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\gis\models\arquivoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="arquivo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'arquivo_cod_pk') ?>

    <!-- <?php //echo  $form->field($model, 'ponto_turistico_cod_fk') ?> -->

    <?= $form->field($model, 'arquivo_conteudo_nome') ?>
    
    <?= $form->field($model, 'arquivo_conteudo_tipo') ?>
    
    <?= $form->field($model, 'arquivo_conteudo') ?>



    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
