<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\gis\models\arquivoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Anexar Arquivos Blob';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arquivo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Arquivo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php
    $iconeDownloads='glyphicon glyphicon-cloud-download';
    $iconeDownloads='glyphicon glyphicon-paperclip';
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'arquivo_cod_pk',
            //'ponto_turistico_cod_fk',
            'arquivo_conteudo_nome',
            'arquivo_conteudo_tipo',
            [
                'attribute' => 'arquivo_conteudo_size',
                'value' => 'arquivo_conteudo_size',
                'headerOptions'=>['style'=>'text-align: center;'],
                'contentOptions'=>['style'=>'text-align: center; width:225px'],
                'format' => 'html',
                'value'=>function($data){
                    return $data->arquivo_conteudo_size.'bytes';
                },
            ],
            //'arquivo_conteudo',


            //['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['style' => 'text-align: center;'],
                'contentOptions' => ['style' => 'text-align: center; width:150px'],
                'template' => '<div class="btn-group btn-group-sm" role="group">{downloads-}{view}{update}{delete} </div>',
                'buttons' => [
                    'downloads' => function ($url, $model, $key) {
                        return Html::a('<i class=" glyphicon glyphicon-cloud-download"></i>', ['downloads', 'id' => $model->arquivo_cod_pk], [
                            
                            'class' => 'btn btn-warning btn-sm',
                            //'target' => '_blank',
                            'format' => 'raw',
                            'data-toggle' => 'tooltip',
                            'title' => 'Downloads'
                        ]);
                    },                    
                ],
            ],
        ],
    ]); ?>


</div>
