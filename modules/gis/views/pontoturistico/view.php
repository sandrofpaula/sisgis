<link href="http://fonts.googleapis.com/css?family=Open+Sans:600" type="text/css" rel="stylesheet" />
<link href="../../../web/google_maps/estilo_autocomplete.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../../../web/google_maps/jquery.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-4bmvcyJRirX5Z63iwSMm-4BxNQQlIoU&callback=initialize"> </script>
<script type="text/javascript" src="google_maps/jquery.min.js"></script>
<script type="text/javascript" src="google_maps/jquery-ui.custom.min.js"></script>
<script type="text/javascript">
    var geocoder;
    var map;
    var marker;

    function initialize() {
        <?php
        if (!empty($model->ponto_turistico_latitude) or !empty($model->ponto_turistico_longitude)) { ?>
            var latlng = new google.maps.LatLng(<?php echo $model->ponto_turistico_latitude; ?>, <?php echo $model->ponto_turistico_longitude; ?>); //Manaus - Sede da SEMED

        <?php } else { ?>
            var latlng = new google.maps.LatLng(-3.0932134, -60.01405110000002); //Manaus - Sede da SEMED
        <?php } ?>
        var options = {
            zoom: 18,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById("mapa"), options);

        geocoder = new google.maps.Geocoder();

        marker = new google.maps.Marker({
            map: map,
            draggable: true,
        });

        marker.setPosition(latlng);
    }

    $(document).ready(function() {

        initialize();

        function carregarNoMapa(endereco) {
            geocoder.geocode({
                'address': endereco + ', Brasil',
                'region': 'BR'
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        var latitude = results[0].geometry.location.lat();
                        var longitude = results[0].geometry.location.lng();

                        $('#txtEndereco').val(results[0].formatted_address);
                        $('#txtLatitude').val(latitude);
                        $('#txtLongitude').val(longitude);

                        var location = new google.maps.LatLng(latitude, longitude);
                        marker.setPosition(location);
                        map.setCenter(location);
                        map.setZoom(16);
                    }
                }
            })
        }

        $("#btnEndereco").click(function() {
            if ($(this).val() != "")
                carregarNoMapa($("#txtEndereco").val());
        })

        $("#txtEndereco").blur(function() {
            if ($(this).val() != "")
                carregarNoMapa($(this).val());
        })

        google.maps.event.addListener(marker, 'drag', function() {
            geocoder.geocode({
                'latLng': marker.getPosition()
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        $('#txtEndereco').val(results[0].formatted_address);
                        $('#txtLatitude').val(marker.getPosition().lat());
                        $('#txtLongitude').val(marker.getPosition().lng());
                    }
                }
            });
        });

        $("#txtEndereco").autocomplete({
            source: function(request, response) {
                geocoder.geocode({
                    'address': request.term + ', Brasil',
                    'region': 'BR'
                }, function(results, status) {
                    response($.map(results, function(item) {
                        return {
                            label: item.formatted_address,
                            value: item.formatted_address,
                            latitude: item.geometry.location.lat(),
                            longitude: item.geometry.location.lng()
                        }
                    }));
                })
            },
            select: function(event, ui) {
                $("#txtLatitude").val(ui.item.latitude);
                $("#txtLongitude").val(ui.item.longitude);
                var location = new google.maps.LatLng(ui.item.latitude, ui.item.longitude);
                marker.setPosition(location);
                map.setCenter(location);
                map.setZoom(16);
            }
        });

    });
</script>
<style>
    #map {
        width: 100%;
        height: 400px;
    }
</style>
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\gis\models\Pontoturistico */

$this->title = $model->ponto_turistico_cod_pk;
$this->params['breadcrumbs'][] = ['label' => 'Pontoturisticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pontoturistico-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ponto_turistico_cod_pk], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ponto_turistico_cod_pk], [
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
            'ponto_turistico_cod_pk',
            'ponto_turistico_nome',
            'ponto_turistico_descricao',
            'ponto_turistico_endereço',
            'ponto_turistico_latitude',
            'ponto_turistico_longitude',
        ],
    ]) ?>

</div>
<div class="col-sm-12" style="height: 600px">
            <div id="mapa" style="width: 100%; height: 100%"></div>
        </div><br><br>