<?php
include "conexao.php";
include "verifica.php";

$login_usuario = $_SESSION["login_usuario"];

$sql = mysql_query("SELECT * FROM usuario WHERE login = '$login_usuario'");
while($linha = mysql_fetch_array($sql)){
	$id			 		= $linha['idusuario'];
	$dataAtual = date('d/m/Y');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::Vacinas::.</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<style type="text/css" media="all">
@import url("css/projetoInterno.css");
</style>
</head>
<script type='text/javascript'>
<!--
function FecharJanela() 
{
ww = window.open(window.location, "_self");
ww.close();
} 
-->
</script>
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
  
   <!-- CALENDÁRIO -->
<link rel="stylesheet" href="calendario/jquery-ui.css" />
  <script src="calendario/jquery-1.8.3.js"></script>
  <script src="calendario/jquery-ui.js"></script>
   <script src="calendario/tradutor.js"></script>
<body style="overflow:hidden">
<hr/>
<h1 style="font-size:24px; font-family:verdana;color:#666">Vacinas</h1>
<hr/>
<form  action="cadVacina.php" method="post"  enctype="multipart/form-data">
  <label style="float:left;padding-right:5px;padding-top:5px;">Data: </label>
  <input style="width:160px;padding:5px 0 0 0; margin-left:60px; height:25px" type="text" value="<?php echo $dataAtual;?>" readonly="true" name="data"/>
  <br />
  <br />
  <label style="float:left;padding:5px 5px 0 0">Vacina/Verm: </label>
  <input style="width:125px;padding-right:5px;padding-top:5px; width:350px" type="text"  name="vacina"/>
  <br />
  <br />
  <label style="float:left;padding:5px 15px 0 0">Laboratório: </label>
  <input style="width:125px; width:350px" type="text"  name="laboratorio"/>
  <input type="text" style="display:none;" value=<?php echo $idAnimal=$_GET['id'];?> name="idAnimal" />
  <br />
  <br />
  <label style="float:left;padding-right:5px;padding-top:5px;">Revacina: </label>
  <input style="width:160px;padding:5px 0 0 0; margin-left:30px; height:25px;float:left" type="text" id="datepicker" name="revacina"/>
  <br />
  <br />
  <input style="margin-top:-62px;margin-left:5px" class="btn btn-navbar"  type="submit" onclick="FecharJanela()" value="Cadastrar">
  <br />
</form>
</body>
</html>