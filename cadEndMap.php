<?php

include "conexao.php";

$nome = $_POST['nome'];
$site = $_POST['site'];
$telefone = $_POST['telefone'];
$address = $_POST['address'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$type = $_POST['type'];


if($ent = mysql_query("INSERT INTO markers(name,site,telefone,address,lat,lng,type)values('$nome','$site','$telefone','$address','$lat','$lng','$type')")){
		echo "<META http-equiv=refresh content='0; url=close()'><script type='text/javascript'>
		alert('Endereço cadastrado com sucesso!!!');  window.self.close();</script>";		
			}else{
			echo "<META http-equiv=refresh content='0; url=EndMapa.php'><script type='text/javascript'>
		alert('Falha ao atualizar!');
		</script>";	
			}
   
			
	
?>