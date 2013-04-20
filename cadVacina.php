<?php

include "conexao.php";
include "verifica.php";

$login_usuario = $_SESSION["login_usuario"];

$sql = mysql_query("SELECT u.idusuario,m.idmedico FROM usuario u inner join medico m on(m.idusuario=u.idusuario) WHERE login = '$login_usuario'");
while($linha = mysql_fetch_array($sql)){
	$id			 		= $linha[0];
	$idmedico 			= $linha[1];
	
}


$idAnimal = $_POST['idAnimal'];

 if(!empty($_POST['revacina'])){

				$revacina = implode('-',array_reverse(explode('/',$_POST['revacina'])));

 }else{$revacina = date("d/m/y");}
	

$vacina = $_POST['vacina'];
$data =  implode('-',array_reverse(explode('/',$_POST['data'])));
$laboratorio = $_POST['laboratorio'];



$sql2 = mysql_query("SELECT * from prontuario where idanimal = '$idAnimal'");
while($linha2 = mysql_fetch_array($sql2)){
	$idpront		 		= $linha2['idprontuario'];
	
}




if($ent = mysql_query("INSERT INTO vacina(vacina,data,laboratorio,idpront,idmedico,revacina)values('$vacina','$data','$laboratorio','$idpront','$idmedico','$revacina')")){
			echo "<META http-equiv=refresh content='0; url=atendimento.php?idAnimal=$idAnimal'><script type='text/javascr0ipt'>
		alert('Consulta registrada com Sucesso');  window.self.close();</script>";		
			}else{
			echo "<META http-equiv=refresh content='0; url=telaMedico.php'><script type='text/javascript'>
		alert('Falha ao cadastradar!');
		</script>";	
			}

?>