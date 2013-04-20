<?php
include "conexao.php";
include "verifica.php";

$login_usuario = $_SESSION["login_usuario"];

$sql = mysql_query("SELECT * FROM usuario WHERE login = '$login_usuario'");
while($linha = mysql_fetch_array($sql)){
	$id			 		= $linha['idusuario'];
	
}
$idvacina=$_POST['idvacina'];
$idAnimal = $_POST['idAnimal'];
$sql2 = mysql_query("select max(v.data) from vacina v inner join prontuario p on(p.idprontuario=v.idpront)
inner join animal a on (a.idanimal = p.idanimal)where a.idanimal = $idAnimal")or die(mysql_error());
while($linha2 = mysql_fetch_array($sql2)){
	$dataMax			 		= $linha2[0];
	
}

$data = date('Y/m/d');

if($dataMax>=$data){


$vacina= $_POST['vacina'];
$laboratorio=$_POST['laboratorio'];
$idpront = $_POST['idpront'];





if( $sql=mysql_query( "UPDATE vacina SET data= '$data', vacina = '$vacina' WHERE idvacina=$idvacina")or die(mysql_error())){
			echo "<META http-equiv=refresh content='1; url=atendimento.php?idAnimal='$idAnimal''><script type='text/javascript'>
		alert('Atualizado com sucesso!!!');  window.self.close();</script>";		
			}}else{
			echo "<META http-equiv=refresh content='1; url=atendimento.php?idAnimal='$idAnimal''><script type='text/javascript'>
		alert('Só é permitido atualizar a vacina do dia atual!!!');  window.self.close();</script>";
			}


?>