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

use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\perfilSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perfils';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfil-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Perfil', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'perfil_cod_pk',
            //'modulo_cod_fk',
            [
                'attribute' => 'modulo_cod_fk',
                'value' => 'modulo_cod_fk',
                'headerOptions'=>['style'=>'text-align: center;'],
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
            'perfil_descricao',
            //'perfil_status',
            [
                'attribute' => 'perfil_status',
                'value' => 'perfil_status',
                //'headerOptions'=>['style'=>'text-align: center;'],
                //'contentOptions'=>['style'=>'text-align: center; width:125px'],
                'format' => 'html',
                'filter' => \kartik\select2\Select2::widget([
                    'model'=>$searchModel,
                    'data' => [1 => "ATIVO", 0 => "INATIVO"],
                    'attribute'=>'perfil_status',
                    'pluginOptions'=>[
                        'placeholder'=>'- Selecione - ',
                        'allowClear' => true,
                    ]
                ]),
                'value'=>function($data){
                   // return $data->moduloCodFk->modulo_descricao;
                    if($data->perfil_status==1){
                        //return '<font color="green"><b>'.$data->sTATUSEQUIPAMENTOCODFK->STATUS_EQUIPAMENTO_DESCRICAO.'</b></font>';
                        return '<span style="color:#039a03;text-shadow: 1px 1px 0px #000;"><b>ATIVO</b></span>';
                    }elseif($data->perfil_status==0){
                       // return '<font color="orange"><b>'.$data->sTATUSEQUIPAMENTOCODFK->STATUS_EQUIPAMENTO_DESCRICAO.'</b></font>';
                        return '<span style="color:#DF7401;text-shadow: 1px 1px 0px #000;"><b>INATIVO</b></span>';
                    }
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
