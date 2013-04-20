<?php
include "scripts php/conexao.php";
include "scripts php/verifica.php";

$login_usuario = $_SESSION["login_usuario"];

$sql = mysql_query("SELECT * FROM usuario WHERE login = '$login_usuario'");
while($linha = mysql_fetch_array($sql)){
	$id			 		= $linha['id'];
	
}

$id=$_POST['id'];
$medicamento = $_POST['medicamento'];
$diasTratamento = $_POST['diasTratamento'];
$primeiraDose = implode('-',array_reverse(explode('/',$_POST['primeiraDose'])));
$horario = $_POST['horario'];
$posologia = $_POST['posologia'];

if( $sql=mysql_query( "UPDATE medicamentos SET medicamento= '$medicamento', diasTratamento = '$diasTratamento',primeiraDose = '$primeiraDose',horario = '$horario', posologia='$posologia' WHERE idVet='$id'")){
			echo "<META http-equiv=refresh content='0; url=medicamentos.php'><script type='text/javascript'>
		alert('Atualizado com sucesso!!!');  window.self.close();</script>";		
			}else{
			echo "<META http-equiv=refresh content='0; url=medicamentos.php'><script type='text/javascript'>
		alert('Falha ao atualizar!');
		</script>";	
			}


?>