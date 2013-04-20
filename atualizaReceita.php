<?php
include "conexao.php";
include "verifica.php";

$login_usuario = $_SESSION["login_usuario"];

$sql = mysql_query("SELECT * FROM usuario WHERE login = '$login_usuario'");
while($linha = mysql_fetch_array($sql)){
	$id			 		= $linha['idusuario'];
	
}



$id=$_POST['idreceita'];
$data = implode('-',array_reverse(explode('/',$_POST['data'])));
$descricao= $_POST['descricao'];



if( $sql=mysql_query( "UPDATE receita SET data= '$data', descricao = '$descricao' WHERE idreceita='$id'")){
			echo "<META http-equiv=refresh content='0; url=upReceita'><script type='text/javascript'>
		alert('Atualizado com sucesso!!!');  window.self.close();</script>";		
			}else{
			echo "<META http-equiv=refresh content='0; url=consulta.php'><script type='text/javascript'>
		alert('Falha ao atualizar!');
		</script>";	
			}


?>