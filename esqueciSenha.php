

<?php


include("conexao.php");
	$emailE = $_GET['emailE'];	
			
		$sql="SELECT * FROM usuario where email='$emailE'";
		$res=mysql_query($sql);
		$dados=mysql_fetch_row($res);
		
		$login=$dados[1];
		$senha=$dados[2];
		$email=$dados[3];
		
if($emailE==$email){
$destinatario = $email;
$assunto = "Recuperação de senha";
$msg .= "CONFORME SOLICITADO SEGUE SEUS DADOS DE ACESSO:"  ."\n";
$msg .= "login:  " ."$login"."\n";
$msg .= "senha:  " ."$senha"."\n";


mail($destinatario,$assunto,$msg);
echo "<META http-equiv=refresh content='0; url=index.php'><script type='text/javascript'>
		alert('Seu login e senha foram enviados para seu email');  window.self.close();</script>";
}else{
	echo "<META http-equiv=refresh content='0; url=index.php'><script type='text/javascript'>
		alert('Email inválido, digite um email válido');  window.self.close();</script>";
}
?>

