<?php
include "scripts php/conexao.php";
include "scripts php/verifica.php";

$login_usuario = $_SESSION["login_usuario"];

$sql = mysql_query("SELECT * FROM usuario WHERE login = '$login_usuario'");
while($linha = mysql_fetch_array($sql)){
	$id			 		= $linha['id'];
	
}

$id=$_POST['idVet'];
$nomeVet = $_POST['nomeVet'];
$dataConsulta = implode('-',array_reverse(explode('/',$_POST['dataConsulta'])));
$clinica = $_POST['clinica'];
$hora = $_POST['hora'];
$lembrete = $_POST['lembrete'];
$idAnimal = $_POST['idAnimal'];

if( $sql=mysql_query( "UPDATE consulta SET nomeVet= '$nomeVet', dataConsulta = '$dataConsulta',hora='$hora',clinica = '$clinica',lembrete = '$lembrete', idAnimal='$idAnimal' WHERE idVet='$id'")){
			echo "<META http-equiv=refresh content='0; url=consulta.php'><script type='text/javascript'>
		alert('Atualizado com sucesso!!!');  window.self.close();</script>";		
			}else{
			echo "<META http-equiv=refresh content='0; url=consulta.php'><script type='text/javascript'>
		alert('Falha ao atualizar!');
		</script>";	
			}


?>