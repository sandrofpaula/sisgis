<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\widgets\MaskedInput;

use yii\jui\Dialog;
/* @var $this yii\web\View */
/* @var $model app\modules\gis\models\Pontoturistico */
/* @var $form yii\widgets\ActiveForm */
?>

<!--
 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-4bmvcyJRirX5Z63iwSMm-4BxNQQlIoU&callback=initMap" type="text/javascript"></script>  
-->

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-4bmvcyJRirX5Z63iwSMm-4BxNQQlIoU&callback=initMap"> </script>
<style>
	#map {
		width: 100%;
		height: 400px;
	}
</style>
<div class="pontoturistico-form">

	<?php $form = ActiveForm::begin(); ?>


	<?= $form->field($model, 'ponto_turistico_nome')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'ponto_turistico_descricao')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'ponto_turistico_endereço')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'ponto_turistico_latitude')->textInput(['maxlength' => true, 'id' => 'txtLatitude']) ?>

	<?= $form->field($model, 'ponto_turistico_longitude')->textInput(['maxlength' => true, 'id' => 'txtLongitude']) ?>


	<body>
		<div id="map"></div><br><br>



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

				map = new google.maps.Map(document.getElementById("map"), options);

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



		<script>
			/*
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(-3.0932134, -60.01405110000002),
          
          zoom: 15
        });
        var infoWindow = new google.maps.InfoWindow;

          downloadUrl('resultado.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
      */
		</script>

	</body>



	<div class="form-group">
		<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>