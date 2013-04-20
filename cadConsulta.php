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
$queixa = $_POST['queixa'];
$sinaisclinicos = $_POST['sinaisclinicos'];
$prognostico = $_POST['prognostico'];
$diagnostico = $_POST['diagnostico'];
$examelab = $_POST['examelab'];
$tratamento = $_POST['tratamento'];


$sql2 = mysql_query("SELECT * from prontuario where idanimal = '$idAnimal'");
while($linha2 = mysql_fetch_array($sql2)){
	$idpront		 		= $linha2['idprontuario'];
	
}




if(!empty($_POST['retorno'])){

				$retorno = implode('-',array_reverse(explode('/',$_POST['retorno'])));
				
				$agendar = mysql_query("insert into agendaconsulta(idmed,idanimal,dataAgenda,idpront)
				values('$idmedico','$idAnimal','$retorno','$idpront')")or die(mysql_error());

 }else{$retorno=date('y/m/d');}

$data = date('y/m/d');






$email = mysql_query("select u.email from usuario u inner join animal a on(a.idusuario = u.idusuario) where a.idanimal =$idAnimal")or die(mysql_error());
if(!empty($_POST['enviar'])){
$destinatario = $email;
$assunto = "Marcacao de Consulta";
$msg .= "Sua consulta está marcada para o dia $retorno:"  ."\n";

mail($destinatario,$assunto,$msg);
}else{};



if($ent = mysql_query("INSERT INTO consulta(diagnostico,queixa,data,tratamento,examelab,retorno,sinaisclinicos,prognostico,idmed,idpront)values('$diagnostico','$queixa','$data','$tratamento','$examelab','$retorno','$sinaisclinicos','$prognostico','$idmedico','$idpront')")or die (mysql_error())){
			echo "<META http-equiv=refresh content='0; url=atendimento.php?idAnimal=$idAnimal'><script type='text/javascr0ipt'>
		alert('Consulta registrada com Sucesso');  window.self.close();</script>";		
			}else{
			echo "<META http-equiv=refresh content='0; url=telaMedico.php '><script type='text/javascript'>
		alert('Falha ao cadastradar! );
		</script>";	
			}

?>