<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\gis\models\pontoturisticoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pontoturistico-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ponto_turistico_cod_pk') ?>

    <?= $form->field($model, 'ponto_turistico_nome') ?>

    <?= $form->field($model, 'ponto_turistico_descricao') ?>

    <?= $form->field($model, 'ponto_turistico_endereço') ?>

    <?= $form->field($model, 'ponto_turistico_latitude') ?>

    <?php // echo $form->field($model, 'ponto_turistico_longitude') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
