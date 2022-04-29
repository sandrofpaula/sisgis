<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\gis\models\Arquivo */

$this->title = 'Update Arquivo: ' . $model->arquivo_cod_pk;
$this->params['breadcrumbs'][] = ['label' => 'Arquivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->arquivo_cod_pk, 'url' => ['view', 'id' => $model->arquivo_cod_pk]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="arquivo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
