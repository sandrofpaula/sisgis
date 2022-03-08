<!--<script type="text/javascript">
    function Checar_checkbox() {
        var checkbox = document.getElementsByName('selection[]');
        var Itemcheckbox = "";
        for (var i = 0; i < checkbox.length; i++) {
            if (checkbox[i].checked) {
                //var Itemcheckbox = Itemcheckbox+checkbox[i].value+';';
                Itemcheckbox = Itemcheckbox + checkbox[i].value + '/';
            }
        }
        var url = "https://www.google.com/maps/dir/Current+Location/" + Itemcheckbox ;
        window.open(url);
    }
</script>-->
<script type="text/javascript">
   function limpar_coordenadas(){
        localStorage.clear(); //limpar
        window.location.reload(true);
    }
   function Checar_checkbox() {
        var checkbox = document.getElementsByName('selection[]');
        var Itemcheckbox = "";
        var coord =  Marcar_checkbox();
        
        for (var i = 0; i < checkbox.length; i++) {
            if(checkbox[i].name == localStorage.getItem(checkbox[i].value)){
                console.log(checkbox[i]);
                console.log(Itemcheckbox);
                Itemcheckbox = Itemcheckbox + checkbox[i].value + '/';
            }
        }
        console.log(Itemcheckbox)
        //var url = "https://www.google.com/maps/dir/Current+Location/" + Itemcheckbox;
        //var url = "https://www.google.com/maps/dir/Current+Location" + localStorage.getItem("coordenadas");
        var url = "https://www.google.com/maps/dir/Current+Location" + coord;
        window.open(url);
        localStorage.clear(); //limpar
        //alert("A rota foram limpa!");
         window.location.reload(true);
    }
    function Marcar_checkbox(){
        const a = document.getElementsByName("selection[]");
        var NewCoordenada="/";

        if(!localStorage.getItem("coordenadas")){
            var coordenadas="/";
            //localStorage.setItem("coordenadas" , coordenadas);//
        }else{
            if(page != paginaAnterior){
                coordenadas=localStorage.getItem("coordenadas");
                paginaAnterior = page;
                //localStorage.setItem("page" ,  page);//
            }
            
        }
        for(i=0;i<a.length;i++){
            
            console.log(a[i].name);
            if(!a[i].checked){
                if(a[i].name == localStorage.getItem(a[i].value)){
                localStorage.removeItem(a[i].value);
                console.log("Descelecionado"); 
                }
            }else{
                localStorage.setItem(a[i].value, a[i].name);
                console.log("Selecionado");
            }   
        }
        //localStorage.setItem("coordenadas" , coordenadas); //criar container no localStorage
        for(j=0;j<localStorage.length;j++){
        // coordenadas=localStorage.getItem("coordenadas"); //criar container no localStorage
        NewCoordenada=NewCoordenada+localStorage.key(j)+"/"
        console.log(localStorage.key(j));// captura todas as key (container)
            
        }
        console.log(NewCoordenada);
        //localStorage.setItem("" , NewCoordenada);
       return NewCoordenada;
    }

    function carregar(){
        const a = document.getElementsByName("selection[]");
        for(i=0;i<a.length;i++){
            if(a[i].name == localStorage.getItem(a[i].value)){
                a[i].checked=true;
            }
        }
    }
</script>
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\gis\models\pontoturisticoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pontoturisticos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pontoturistico-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pontoturistico', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <a class='btn btn-primary' onclick="Checar_checkbox()" name='visualizar' target='_blank'><i class="glyphicon glyphicon-globe"></i> Gerar Rota</a>
    <a class='btn btn-default' onclick="limpar_coordenadas()" name='visualizar' ><i class="glyphicon glyphicon-trash"></i> Limpar Rota</a>
    <!--<a class='btn btn-success'  name='visualizar' ><i class="glyphicon glyphicon-map-marker"></i> Add coordenadas</a>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => function($data) 
                {
                    return ['value' => $data->ponto_turistico_latitude.','. $data->ponto_turistico_longitude];
                }, 
            ],
               
            //'ponto_turistico_cod_pk',
            [
                'attribute' => 'ponto_turistico_cod_pk',
                'value' => 'ponto_turistico_cod_pk',
                'headerOptions' => ['style' => 'text-align: center;'],
                'contentOptions' => ['style' => 'text-align: center; width:10px'],

                'value' => function ($data) {
                    return $data->ponto_turistico_cod_pk;
                },
            ],
            [
                'attribute' => 'ponto_turistico_nome',
                'value' => 'ponto_turistico_nome',
                'headerOptions' => ['style' => 'text-align: center;'],
                'contentOptions' => ['style' => 'width:350px'],

                'value' => function ($data) {
                    return $data->ponto_turistico_nome;
                },
            ],
            //'ponto_turistico_nome',
           // 'ponto_turistico_descricao',
            [
                'attribute' => 'ponto_turistico_endereço',
                'value' => 'ponto_turistico_endereço',
               // 'headerOptions' => ['style' => 'text-align: center;'],
                //'contentOptions' => ['style' => 'text-align: center; width:125px'],

                'value' => function ($data) {
                    return $data->ponto_turistico_endereço;
                },
            ],
            //'ponto_turistico_latitude',
            //'ponto_turistico_longitude',
            [
                // 'attribute' => 'UNID_ADM_CODIGO_PK',
                'format' => 'html',
                 'attribute' => 'COORDENADAS',
                 //'value' => 'UNID_ADM_CODIGO_PK',
                 'headerOptions' => ['style' => 'text-align: center;'],
                 'contentOptions' => ['style' => 'text-align: center; width:50px'],

                 'value' => function ($data) {
                     //'<i class="material-icons">&#xe55e;</i>'.
                     return 'Latitude <br>'.$data->ponto_turistico_latitude . '<br>'.'Longitude <br>'. $data->ponto_turistico_longitude;
                 },
             ],
             /*[
                'attribute' => 'COORDENADAS',
                'value' => function ($model) {
                     return \Yii::$app->formatter->asUrl('https://www.google.com/maps/dir/Current+Location/'.$model->ponto_turistico_latitude . ','. $model->ponto_turistico_longitude, ['target' => '_blank']);
                 },
                'format' => 'raw',
            ],*/

            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['style' => 'text-align: center;'],
                'contentOptions' => ['style' => 'text-align: center; width:150px'],
                'template' => '<div class="btn-group btn-group-sm" role="group">{ponto--}{view}{update}{delete} </div>',
                'buttons' => [
                    'ponto' => function ($url, $model, $key) {
                        return Html::a('<i class="glyphicon glyphicon-map-marker"></i>', ['coordenadas', 'id' => $model->ponto_turistico_cod_pk], [
                            
                            'class' => 'btn btn-warning btn-sm',
                            //'target' => '_blank',
                            'format' => 'raw',
                            'data-toggle' => 'tooltip',
                            'title' => 'Ponto'
                        ]);
                    },                    
                ],
            ],
        ],
    ]); ?>


</div>
<script>
        var c=document.getElementsByName("selection[]");
            for (i=0;i<c.length;i++){
                c[i].addEventListener("click", Marcar_checkbox);
            }
        window.addEventListener(carregar());
</script>