<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Modulo */

$this->title = 'Update Modulo: ' . $model->modulo_cod_pk;
$this->params['breadcrumbs'][] = ['label' => 'Modulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->modulo_cod_pk, 'url' => ['view', 'id' => $model->modulo_cod_pk]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="modulo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
