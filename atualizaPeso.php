<?php
include "conexao.php";
include "verifica.php";

$login_usuario = $_SESSION["login_usuario"];

$sql = mysql_query("SELECT * FROM usuario WHERE login = '$login_usuario'");
while($linha = mysql_fetch_array($sql)){
	$id			 		= $linha['idusuario'];
	
}



$idpeso=$_POST['idpeso'];
$dataAtual=date('Y/m/d');
$data = implode('-',array_reverse(explode('/',$_POST['data'])));
$peso= $_POST['peso'];
$idpront = $_POST['idpront'];
$sql = mysql_query("select a.idanimal from animal a inner join prontuario p on(p.idanimal = a.idanimal)
inner join peso pe on(pe.idpront = p.idprontuario) where pe.idpeso=$idpeso")or die(mysql_error());

while($ida = mysql_fetch_array($sql)){
$idAnimal  = $ida[0];
}

$sql2 = mysql_query("select max(pe.data) from peso pe inner join prontuario p on(p.idprontuario=pe.idpront)
inner join animal a on (a.idanimal = p.idanimal)where a.idanimal = $idAnimal") or die(mysql_error());
while($linha2 = mysql_fetch_array($sql2)){
	$dataMax			 		= $linha2[0];
	
}

$dt = date('Y/m/d');
if($dataMax>=$dt){


if( $sql=mysql_query( "UPDATE peso SET data= '$data', peso = '$peso' WHERE idpeso='$idpeso'")or die(mysql_error())){
			echo "<META http-equiv=refresh content='1; url=atendimento.php?idAnimal='$idAnimal''><script type='text/javascript'>
		alert('Atualizado com sucesso!!!');  window.self.close();</script>";		
			}}else{
			echo "<META http-equiv=refresh content='1; url=atendimento.php?idAnimal='$idAnimal''><script type='text/javascript'>
		alert('Só é permitido atualizar o peso do dia atual!!!');  window.self.close();</script>";
			}


?>