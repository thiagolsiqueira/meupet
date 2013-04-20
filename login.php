

<?php

include "conexao.php";

$login	= $_POST['login'];
$senha	= $_POST['senha'];


$sql = mysql_query("SELECT * FROM usuario WHERE login = '$login'");
$cont = mysql_num_rows($sql);
while($linha = mysql_fetch_array($sql)){
	$senha_db = $linha['senha'];
	$nivel = $linha['nivel'];
}

if($cont == 0){

	echo "
	<META HTTP-EQUIV=REFRESH CONTENT='0; URL=index.php'>
	<script type=\"text/javascript\">
	alert(\"O nome de usuario não corresponde.\");
	</script>";
	
}else{

	if($senha_db != $senha){//confere senha
	
	echo "
	<META HTTP-EQUIV=REFRESH CONTENT='0; URL=index.php'>
	<script type=\"text/javascript\">
	alert(\"A senha não corresponde.\");
	</script>";
	
}else if($nivel==1){
	session_start();
	$_SESSION['login_usuario'] = $login;
	$_SESSION['senha_usuario'] = $senha;
	echo "
	<META HTTP-EQUIV=REFRESH CONTENT='0; URL=telaAnimal.php'>
	<script type=\"text/javascript\">
	document.location.href=telaMedico.php;
	</script>";
	}else{
	
	session_start();
	$_SESSION['login_usuario'] = $login;
	$_SESSION['senha_usuario'] = $senha;
	echo "
	<META HTTP-EQUIV=REFRESH CONTENT='0; URL=telaMedico.php'>
	<script type=\"text/javascript\">
document.location.href=telaMedico.php;
	</script>";
	}
	
}

?>
