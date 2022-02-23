<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\gis\models\Pontoturistico */

$this->title = 'Create Pontoturistico';
$this->params['breadcrumbs'][] = ['label' => 'Pontoturisticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pontoturistico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
