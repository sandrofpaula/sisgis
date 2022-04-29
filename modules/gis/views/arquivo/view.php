<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\gis\models\Arquivo */

$this->title = $model->arquivo_cod_pk;
$this->params['breadcrumbs'][] = ['label' => 'Arquivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="arquivo-view">

    <h1><?= Html::encode($this->title) ?></h1>
    

    <p>
        <?= Html::a('Create Arquivo', ['create'], ['class' => 'btn btn-success']) ?>
        <!-- <?= Html::a('Downloads', ['download',  'id' => $model->arquivo_cod_pk], ['target' => '_blank','class' => 'btn btn-warning']) ?> -->
        <?= Html::a('Update', ['update', 'target' => '_blank','id' => $model->arquivo_cod_pk], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('View', ['view', 'id' => $model->arquivo_cod_pk], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->arquivo_cod_pk], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'arquivo_cod_pk',
            //'ponto_turistico_cod_fk',
            'arquivo_conteudo_nome',
            'arquivo_conteudo_tipo',          
            'arquivo_conteudo_size',          
        ],
    ]) ?>

    <!-- <img src="data:<?php echo $model->arquivo_conteudo_tipo?>;charset=utf8;base64,<?php echo base64_encode($model->arquivo_conteudo); ?>" /> -->
    <?php
        if ($model->arquivo_conteudo_tipo=='application/pdf'){
    ?>
        <a href="data:<?php echo $model->arquivo_conteudo_tipo?>;charset=utf8;base64,<?php echo base64_encode($model->arquivo_conteudo); ?>" download>
            <object data="data:<?php echo $model->arquivo_conteudo_tipo?>;base64,<?php echo base64_encode($model->arquivo_conteudo);?>" alt="W3Schools" type="<?php echo $model->arquivo_conteudo_tipo?>" style="zoom:100%; border:1px solid #CCCCCC;" height="1500" width="100%" download></object>
        </a>
    <?php
        }elseif ($model->arquivo_conteudo_tipo=='application/x-zip-compressed' ){
    ?>
        <a href="data:<?php echo $model->arquivo_conteudo_tipo?>;charset=utf8;base64,<?php echo base64_encode($model->arquivo_conteudo); ?>" download>
            <button type="button" alt="Download"  class="btn btn-primary">Download</button>
        </a> 
    <?php
        }else{
    ?>
        <object data="data:<?php echo $model->arquivo_conteudo_tipo?>;base64,<?php echo base64_encode($model->arquivo_conteudo);?>" type="<?php echo $model->arquivo_conteudo_tipo?>" style="zoom:100%; border:1px solid #CCCCCC;"   download></object>
        <br>
        <a href="data:<?php echo $model->arquivo_conteudo_tipo?>;charset=utf8;base64,<?php echo base64_encode($model->arquivo_conteudo); ?>" download>
            <button type="button" alt="Download"  class="btn btn-primary">Download</button>
        </a> 
    <?php
        }
    ?>


</div>
