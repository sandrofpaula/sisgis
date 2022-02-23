<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Perfil */

$this->title = 'Update Perfil: ' . $model->perfil_cod_pk;
$this->params['breadcrumbs'][] = ['label' => 'Perfils', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->perfil_cod_pk, 'url' => ['view', 'id' => $model->perfil_cod_pk]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perfil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
