<?php

include "conexao.php";

$nomeVet = $_POST['nomeVet'];
$email = $_POST['email'];
$nivel = 2;
$telefoneRes = $_POST['telefoneRes'];
$telefoneCel = $_POST['telefoneCel'];
$email=$_POST['email'];
$senha=$_POST['senha'];
$sql = "SELECT * FROM `usuario` WHERE `login` = '{$_POST['login']}' ";//monto a query

        $q = mysql_query( $sql );//executo a query

        if( mysql_num_rows( $q ) > 0 ){//se retornar algum resultado
               echo "<META http-equiv=refresh content='0; url=index.php'><script type='text/javascript'>
		alert('usuário já cadastrado');  window.self.close();</script>";	
		}else{
          $login=$_POST['login'];



if($sql2 = mysql_query("INSERT INTO usuario(nome,email,nivel,telefoneRes,telefoneCel,login,senha)values('$nomeVet','$email','$nivel','$telefoneRes','$telefoneCel','$login','$senha')")or die (mysql_error())){
			
$vet = mysql_query("SELECT idusuario FROM USUARIO WHERE login = '$login'");



	while($usuario = mysql_fetch_array($vet)){
		$idUsuario = $usuario['idusuario'];	
	
	}
	
	
	
$crmv = $_POST['crmv'];
$ufCRMV = $_POST['ufCRMV'];
				
					
	if($sql3 = mysql_query("INSERT INTO MEDICO (crmv,ufCRMV,idusuario)values('$crmv', '$ufCRMV', $idUsuario)")){
		
		
		
		echo "<META http-equiv=refresh content='0; url=index.php'><script type='text/javascript'>
		alert('Conta cadastrada com Sucesso: Um email foi enviado com seu usuario e senha');  window.self.close();</script>";			
		
		
		$destinatario = $email;
$assunto = "Cadastrado com Sucesso!";
$msg .= "CONFORME SOLICITADO SEGUE SEUS DADOS DE ACESSO:"  ."\n";
$msg .= "login:  " ."$login"."\n";
$msg .= "senha:  " ."$senha"."\n";

		

mail($destinatario,$assunto,$msg);

			}else{echo "<META http-equiv=refresh content='0; url=index.php'><script type='text/javascript'>
		alert('FALHA AO CADASTRAR!');  window.self.close();</script>";}$DELUSER= mysql_query("delete from usuario where idusuario = '$idUsuario'");

		                }
           
		}
				
?>