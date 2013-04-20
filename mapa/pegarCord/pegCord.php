<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Pegar as coordenadas do Google Maps pelo endere�o</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name='keywords' content='geolocation, coordenadas, pegar coordenadas, endereco, latitude, longitude, google, maps, buscar'/>
	<meta property="og:title" content="Pegar as coordenadas do Google Maps pelo endere�o"/>
	<meta property="og:image" content="http://maps.googleapis.com/maps/api/staticmap?center=Belo%20Horizonte,%20Brazil&zoom=4&size=250x250&sensor=false"/>
	
	
    <!-- Le styles -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      #map img {
	    max-width: none;
	  }
    </style>
   
   
  </head>

  <body>
	
<h1 style="margin-top:-50px;  margin-left:25px; font-family:Helvetica; float:left">Pegar Coordenadas</h1>

				<input style="margin:-80px 0 0 510px" class="btn btn-large" id="btn-get-coordinates" value="Pegar Coordenadas" type="button">
			
            
			
<hr style="margin:-20px 0 10px 0" />
    <div class="container" >
   
    	<div class="row-fluid show-grid">
    		<div class="span3">
            
    			<p>
				<label for="endereco" class="required">Endereco</label>
				<input name="endereco" id="endereco" class="text" type="text">
			</p>
	        <p>
	        	<label for="bairro" class="required">Bairro</label>
				<input name="bairro" id="bairro" class="text" type="text">
			</p>
	        <p>
	        	<label for="cidade" class="required">Cidade</label>
				<input name="cidade" id="cidade" class="text" type="text">
			</p>
	        <p>
	        	<label for="estado" class="required">Estado</label>
				<select name="estado" id="estado" class="text" style="width:160px">
				    <option value="AC" label="Acre">Acre</option>
    				<option value="AL" label="Alagoas">Alagoas</option>
    				<option value="AP" label="Amapá">Amapá</option>
    				<option value="AM" label="Amazonas">Amazonas</option>
    				<option value="BA" label="Bahia">Bahia</option>
    				<option value="CE" label="Ceará">Ceará</option>
    				<option value="DF" label="Distrito Federal">Distrito Federal</option>
    				<option value="ES" label="Espírito Santo">Espírito Santo</option>
    				<option value="GO" label="Goiás">Goiás</option>
    				<option value="MA" label="Maranhão">Maranhão</option>
    				<option value="MT" label="Mato Grosso">Mato Grosso</option>
    				<option value="MS" label="Mato Grosso do Sul">Mato Grosso do Sul</option>
    				<option selected="selected" value="MG" label="Minas Gerais">Minas Gerais</option>
    				<option value="PA" label="Pará">Pará</option>
    				<option value="PB" label="Paraíba">Paraíba</option>
    				<option value="PR" label="Paraná">Paraná</option>
    				<option value="PE" label="Pernambuco">Pernambuco</option>
    				<option value="PI" label="Piauí">Piauí</option>
    				<option value="RJ" label="Rio de Janeiro">Rio de Janeiro</option>
    				<option value="RN" label="Rio Grande do Norte">Rio Grande do Norte</option>
    				<option value="RS" label="Rio Grande do Sul">Rio Grande do Sul</option>
    				<option value="RO" label="Rondônia">Rondônia</option>
    				<option value="SC" label="Santa Catarina">Santa Catarina</option>
    				<option value="RR" label="Roraima">Roraima</option>
    				<option value="SP" label="São Paulo">São Paulo</option>
    				<option value="SE" label="Sergipe">Sergipe</option>
    				<option value="TO" label="Tocantins">Tocantins</option>
				</select>
			</p><br />
			
    		</div>
    		<div class="span9">
				<div class="form-inline">
					<label style="margin-left:80px;" for="latitude">Latitude</label><input style="width:120px" name="latitude" id="latitude" class="input-xlarge" placeholder="Latitude" type="text">
					<label for="longitude">Longitude</label><input style="width:120px" name="longitude" id="longitude"  class="input-xlarge" placeholder="Longitude" type="text">
				</p>
	        	<div id="map-canvas" class="col50 f-right">
					<div align="center" id="map" style="width:450px;margin:0 0 0 90px; height:300px;"></div>
				</div><!-- /map-canvas -->
     		</div>
    
    </div> <!-- /container -->
	<script	type="text/javascript" src="jquery.min.js"></script>
	<script	type="text/javascript" src="jquery.validate.min.js"></script>
	<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
	<script type="text/javascript">
var geocoder;
var map;
var infowindow = new google.maps.InfoWindow();
var marker;

$(document).ready(function(){
    //Show maps admin
    $('#btn-get-coordinates').live('click',function(){
    	adminMapsCoordinates();
    });
    if( $('#latitude').val() && $('#longitude').val() ){
    	adminMapsCoordinates();
    }


    //Prevent from submit on press ENTER
    $('#form-cadastro-empreendimento').keypress(function (e) {
    	  if(e.which == 13 && e.target.nodeName != "TEXTAREA"){
	    	adminGetAddressToCoordinates();
    	   	return false;
    	   }
    });

});



/**
 * Admin Maps Coordinates
 * @desc Gerencia a exibi��o do mapa no Insert de Imoveis.
 * @author Emerson Carvalho <emerson.broga@gmail.com>
 */
function adminMapsCoordinates() {

    //Exibe as coordenadas e o mapa.
	$('#map').fadeIn();
	
	geocoder = new google.maps.Geocoder();
	var latlng = new google.maps.LatLng(40.730885,-73.997383);
	var mapOptions = {
		    scrollwheel: true,
			zoom: 15,
			center: latlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
    }
	map = new google.maps.Map(document.getElementById("map"), mapOptions);
	adminGetAddressToCoordinates();
	return false;	 
}	




/**
 * Admin Get Address To Coordinates
 * @desc Pega a string de endereco e gera o pointer no mapa.
 * @author Emerson Carvalho <emerson.broga@gmail.com>
 */
function adminGetAddressToCoordinates() {
   // var address = document.getElementById("address").value;
   var endereco = new Array();
   endereco[1] = $('#endereco').val();
   endereco[2] = $('#cidade').val();
   endereco[3] = $('#bairro').val();
   endereco[4] = $('#estado').val();
   endereco[5] = ' - Brasil';
   
   var address = endereco.join(' ');
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);

        //Passo os valores para o form.
        updateCoordinatesValues(results[0].geometry.location.lat(),results[0].geometry.location.lng());
        marker = new google.maps.Marker({
        	draggable: true,
            map: map,
            position: results[0].geometry.location           
            
        });

        //Se rua, bairro e cidade estiverem vazios o zom mostra o brasil.
        if(endereco[1] == '' && endereco[2] == '' && endereco[3] == '')
           map.setZoom(4);
        else
            map.setZoom(15);
            
      //DRAG AND DROP 
      google.maps.event.addListener(marker, "dragend", function(event) {
    	  var point = marker.getPosition();
          window.setTimeout(function(){
        	   map.panTo(point);
        	   updateCoordinatesValues(point.lat(), point.lng());
        	   
              }, 100);
       });
      } else {
    	       
    	  showFeedback('#maps-feedback', 'Localiza��o n�o encontrada.');
    	  $('#map').fadeOut();
    	  updateCoordinatesValues('','');
    	  
      }
    });
  }


/**
 * Update CoordinatesValues
 * @desc Atualiza o valor das coordenadas.
 * @param lat String com o valor de Latitude.
 * @param long String com o valor de Longitude.
 * @author Emerson Carvalho <emerson.broga@gmail.com>
 */
function updateCoordinatesValues(lat, lng)
{
	$('#latitude').val(lat);
    $('#longitude').val(lng);
    return;
}

/**
 * Show Feedback
 * @desc Exibe mensagens de feedback.
 * @param element Seletor jQuery para o elemento onde sera mostrada a mensagem.
 * @param message Texto da mensagem a ser exibida.
 * @author Emerson Carvalho <emerson.broga@gmail.com>
 */
function showFeedback(element, message) 
{
	if ( $(element).is(':visible'))
        $(element).text(message);
    else        
        $(element).text(message).fadeOut().fadeIn();

    return;
    
}

</script>
    

  </body>
</html>
