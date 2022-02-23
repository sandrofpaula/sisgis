<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Perfil */

$this->title = $model->perfil_cod_pk;
$this->params['breadcrumbs'][] = ['label' => 'Perfils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="perfil-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->perfil_cod_pk], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->perfil_cod_pk], [
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
            'perfil_cod_pk',
            [
                'attribute' => 'modulo_cod_fk',
                'value'=>function($data){
                    return $data->moduloCodFk->modulo_descricao;
                },
            ],
            'perfil_descricao',
            [
                'attribute' => 'perfil_status',
                'format' => 'html',
                'value'=>function($data){
                    if($data->perfil_status==1){
                        //return '<font color="green"><b>'.$data->sTATUSEQUIPAMENTOCODFK->STATUS_EQUIPAMENTO_DESCRICAO.'</b></font>';
                        return '<span style="color:#039a03;text-shadow: 1px 1px 0px #000;"><b>ATIVO</b></span>';
                    }elseif($data->perfil_status==0){
                       // return '<font color="orange"><b>'.$data->sTATUSEQUIPAMENTOCODFK->STATUS_EQUIPAMENTO_DESCRICAO.'</b></font>';
                        return '<span style="color:#DF7401;text-shadow: 1px 1px 0px #000;"><b>INATIVO</b></span>';
                    }
                },
            ],
        ],
    ]) ?>

</div>
