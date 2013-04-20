<?php

include "conexao.php";
include "verifica.php";

$login_usuario = $_SESSION["login_usuario"];

$sql = mysql_query("SELECT u.idusuario,m.idmedico FROM usuario u inner join medico m on(m.idusuario=u.idusuario) WHERE login = '$login_usuario'")or die(mysql_error());
while($linha = mysql_fetch_array($sql)){
	$id			 		= $linha[0];
	$idmedico 			= $linha[1];
	
}


$idpront = $_POST['idpront'];
$idAnimal = $_POST['idAnimal'];
$data =  implode('-',array_reverse(explode('/',$_POST['data'])));
$descricao = $_POST['descricao'];


if($ent = mysql_query("INSERT INTO receita(data,idpront,descricao)values('$data','$idpront','$descricao')")){
			echo "<META http-equiv=refresh content='0; url=atendimento.php?idAnimal=$idAnimal'><script type='text/javascr0ipt'>
		alert('Peso registrado com Sucesso');  window.self.close();</script>";		
			}else{
			echo "<META http-equiv=refresh content='0; url=telaMedico.php'><script type='text/javascript'>
		alert('Falha ao cadastradar!$idpront, $idAnimal');
		</script>";	
			}

?>