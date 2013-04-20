<?php
include "conexao.php";
include "verifica.php";

$login_usuario = $_SESSION["login_usuario"];

$sql = mysql_query("SELECT * FROM usuario WHERE login = '$login_usuario'");
while($linha = mysql_fetch_array($sql)){
	$id			 		= $linha['idusuario'];
	
}


$pegar = mysql_query("select m.idmedico from medico m inner join usuario u on(u.idusuario = m.idusuario) where u.idusuario = $id")or die(mysql_error());
while($l = mysql_fetch_array($pegar)){
	$idmedico			 		= $l[0];
	
}

$nome=$_POST['nomeVet'];
$crmv= $_POST['crmv'];
$ufCRMV = $_POST['uf'];
$email = $_POST['email'];
$telefoneRes = $_POST['telefoneRes'];
$telefoneCel = $_POST['telefoneCel'];



if($sql = mysql_query("update usuario set nome = '$nome',  email = '$email', telefoneRes = '$telefoneRes', telefoneCel = '$telefoneCel' where 
idusuario = $id")or die(mysql_error())){ 

if( $sql2=mysql_query( "UPDATE medico SET crmv = '$crmv', ufCRMV = '$ufCRMV' WHERE idmedico = $idmedico")or die(mysql_error())){
			echo "<META http-equiv=refresh content='1; url=telaMedico.php'><script type='text/javascript'>
		alert('Atualizado com sucesso!!!');  window.self.close();</script>";		
			}}else{
			echo "<META http-equiv=refresh content='1; url=telaMedico.php'><script type='text/javascript'>
		alert('Só é permitido atualizar a vacina do dia atual!!!');  window.self.close();</script>";
			}


?>