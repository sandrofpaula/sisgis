<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\gis\models\Pontoturistico */

$this->title = 'Update Pontoturistico: ' . $model->ponto_turistico_cod_pk;
$this->params['breadcrumbs'][] = ['label' => 'Pontoturisticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ponto_turistico_cod_pk, 'url' => ['view', 'id' => $model->ponto_turistico_cod_pk]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pontoturistico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
