<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\usuarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'usuario_cod_pk') ?>

    <?= $form->field($model, 'modulo_cod_fk') ?>

    <?= $form->field($model, 'perfil_cod_fk') ?>

    <?= $form->field($model, 'usuario_nome') ?>

    <?= $form->field($model, 'usuario_login') ?>

    <?php // echo $form->field($model, 'usuario_email') ?>

    <?php // echo $form->field($model, 'usuario_tel') ?>

    <?php // echo $form->field($model, 'usuario_senha') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
