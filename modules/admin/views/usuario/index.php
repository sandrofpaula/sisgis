<!--icones-->
<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
<!--icones-->

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

use kartik\select2\Select2;
use kartik\date\DatePicker;
use kartik\datetime\DateTimePicker;
use kartik\depdrop\DepDrop;//
//use app\models\User;
use app\modules\admin\models\Modulo;
use app\modules\admin\models\Perfil;

use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\usuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Usuario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'usuario_cod_pk',
            'usuario_nome',
            'usuario_login',
            [
                'attribute' => 'modulo_cod_fk',
                'value' => 'modulo_cod_fk',
                'headerOptions'=>['style'=>'text-align: center;'],
                'format' => 'html',
                //'contentOptions'=>['style'=>'text-align: center; width:225px'],
                'contentOptions'=>['style'=>'text-align: left; width:225px'],
                'filter' => \kartik\select2\Select2::widget([
                    'model'=>$searchModel,
                    'data' => ArrayHelper::map(Modulo::find()->asArray()->all(), 'modulo_cod_pk', 'modulo_descricao'),
                    'attribute'=>'modulo_cod_fk',
                    'pluginOptions'=>[
                        'placeholder'=>'- Selecione - ',
                        //'allowClear' => true,
                    ]
                ]),
                'value'=>function($data){
                    return $data->moduloCodFk->modulo_descricao;
                },
            ],
            [
                'attribute' => 'perfil_cod_fk',
                'value' => 'perfil_cod_fk',
                'headerOptions'=>['style'=>'text-align: center;'],
                'format' => 'html',
                //'contentOptions'=>['style'=>'text-align: center; width:225px'],
                'contentOptions'=>['style'=>'text-align: left; width:225px'],
                'filter' => \kartik\select2\Select2::widget([
                    'model'=>$searchModel,
                    'data' => ArrayHelper::map(Perfil::find()->asArray()->all(), 'perfil_cod_pk', 'perfil_descricao'),
                    'attribute'=>'perfil_cod_fk',
                    'pluginOptions'=>[
                        'placeholder'=>'- Selecione - ',
                        //'allowClear' => true,
                    ]
                ]),
                'value'=>function($data){
                    return $data->perfilCodFk->perfil_descricao;
                },
            ],
            [
                'attribute' => 'usuario_status',
                'value' => 'usuario_status',
                //'headerOptions'=>['style'=>'text-align: center;'],
                //'contentOptions'=>['style'=>'text-align: center; width:125px'],
                'format' => 'html',
                'filter' => \kartik\select2\Select2::widget([
                    'model'=>$searchModel,
                    'data' => [1 => "ATIVO", 0 => "INATIVO"],
                    'attribute'=>'usuario_status',
                    'pluginOptions'=>[
                        'placeholder'=>'- Selecione - ',
                        'allowClear' => true,
                    ]
                ]),
                'value'=>function($data){
                   // return $data->moduloCodFk->modulo_descricao;
                    if($data->usuario_status==1){
                        //return '<font color="green"><b>'.$data->sTATUSEQUIPAMENTOCODFK->STATUS_EQUIPAMENTO_DESCRICAO.'</b></font>';
                        return '<span style="color:#039a03;text-shadow: 1px 1px 0px #000;"><b>ATIVO</b></span>';
                    }elseif($data->usuario_status==0){
                       // return '<font color="orange"><b>'.$data->sTATUSEQUIPAMENTOCODFK->STATUS_EQUIPAMENTO_DESCRICAO.'</b></font>';
                        return '<span style="color:#DF7401;text-shadow: 1px 1px 0px #000;"><b>INATIVO</b></span>';
                    }
                },
            ],
            //'usuario_email:email',
            //'usuario_tel',
            //'usuario_senha',

            //['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Ações',
                'headerOptions'=>['style'=>'text-align: center;'],
                'contentOptions'=>['style'=>'text-align: center; width:150px'],
                'template' => '<div class="btn-group btn-group-sm" role="group"> {view} {update} {delete} {password}</div>',
                 //'visible'=> $consulta,
                 /*'visibleButtons' => [
                                       
                    'view' => function ($model, $key, $index) {
                       return $model->checkNivel!=1 or  $model->checkDev==1? true : false;
                     
                       //return $model->checkNivel==1 ? false : true;
                    },
                    'update' => function ($model, $key, $index) {
                       return $model->checkNivel!=1 or  $model->checkDev==1 ? true : false;
                    },
                    'delete' => function ($model, $key, $index) {
                        return $model->checkNivel!=1 or  $model->checkDev==1? true : false;
                    },
                    'password' => function ($model, $key, $index) {
                        return $model->checkNivel!=1 or  $model->checkDev==1 ? true : false;
                    },

                ],
                */
                 'buttons' => [
       
               /* 'view' => function($url,$model,$key){
                return '<button type="button" title="Visualizar" class="btn btn-primary" onClick="location.href = \''.Yii::$app->request->baseUrl.'/index.php?r=user/view&id='.$key.'\';">
                            <span class="glyphicon glyphicon-eye-open"></span>
                            </button>';
                },
                'update' => function($url,$model,$key){
                return '<button type="button" title="Editar" class="btn btn-primary" onClick="location.href = \''.Yii::$app->request->baseUrl.'/index.php?r=user/update&id='.$key.'\';">
                            <span class="glyphicon glyphicon-pencil"></span>
                            </button>';
                },
                'delete' => function($url,$model,$key){
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>',$url, ['class' => 'btn btn-danger', 'title' =>'Excluir',
                        'data' => [
                            'confirm' => 'Deseja realmente excluir este item?',
                            'method' => 'post',
                        ],
                    ]);
                },*/

                'password' => function($url,$model,$key){
                return Html::a('<span class="glyphicon glyphicon-retweet"></span>',$url, ['class' => 'btn btn-warning', 'title' =>'Resetar Senha',
                    'format' => 'html',    
                    'data' => [
                            'confirm' => 'Deseja realmente resetar a senha de '.$model->usuario_nome.' ('.$model->usuario_login.')  E-mail: '.$model->usuario_email.'?',
                            'method' => 'post',
                            
                            
                        ],
                ]);
                },
                ],
            ]
        ],
    ]); ?>


</div>
