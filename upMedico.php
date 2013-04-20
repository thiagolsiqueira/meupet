<?php
include "conexao.php";
include "verifica.php";

$login_usuario = $_SESSION["login_usuario"];

$sql = mysql_query("SELECT u.idusuario,u.nome,m.crmv,m.ufCRMV,m.idmedico, u.email, u.telefoneRes, u.telefoneCel FROM usuario u inner join medico m on(m.idusuario=u.idusuario) WHERE login = '$login_usuario'")or die(mysql_error());
while($linha = mysql_fetch_array($sql)){
	$id			 		= $linha[0];
	$idmedico = $linha[4];
	$medico				= $linha[1];
	$crmv				= $linha[2];
	$uf				    = $linha[3];
	$email				= $linha[5];
	$telefoneRes		= $linha[6];
	$telefoneCel   	  	= $linha[7];
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::Cadastro Veterinário
::.</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<style type="text/css" media="all">
@import url("css/projetoInterno.css");
</style>
<script type='text/javascript'>
<!--
function fechar() 
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
</head>

<body style="overflow:hidden">
<hr/>
<h1 style="font-size:24px; font-family:verdana;color:#666; padding-left:10px">Alterar Cadastro Veterinário</h1>
<hr/>
<div style="margin-left:10px;">
  <form  action="atualizaMedico.php" method="post" onsubmit="return validaCamposMed()" enctype="multipart/form-data">
    <div style="width:330px;float:left">
      <label>Veterinario: </label>
      <input   type="text" id="nomeVet" name="nomeVet" size="60" readonly="true" style="width:290px" value="<?php echo $medico;?>"/>
      <label>CRMV:</label>
      <input type="text" name="crmv" id="crmv" size="30" value=""<?php echo $crmv;?>"">
      <label>UF - CRMV:</label>
      <select name="uf">
        <option value="Selecione"> <?php echo $uf;?> </option>
        <option value="AC"> AC </option>
        <option value="AP"> AP </option>
        <option value="AL"> AL </option>
        <option value="AM"> AM </option>
        <option value="BA"> BA </option>
        <option value="CE"> CE </option>
        <option value="DF"> DF </option>
        <option value="ES"> ES </option>
        <option value="GO"> GO </option>
        <option value="MA"> MA </option>
        <option value="MT"> MT </option>
        <option value="MS"> MS </option>
        <option value="MG"> MG </option>
        <option value="PA"> PA </option>
        <option value="PB"> PB </option>
        <option value="PR"> PR </option>
        <option value="PE"> PE </option>
        <option value="PI"> PI </option>
        <option value="RJ"> RJ </option>
        <option value="RN"> RN </option>
        <option value="RS"> RS </option>
        <option value="RO"> RO </option>
        <option value="RR"> RR </option>
        <option value="SC"> SC </option>
        <option value="SP"> SP </option>
        <option value="SE"> SE </option>
        <option value="TO"> TO </option>
      </select>
    </div>
    
    <div style="width:300px; margin:0 0 0 350px">   
     <label >Email:</label>
    <input style="width:290px" type="text" placeholder="example@email.com" name="email" id="email" size="40" value="<?php echo $email;?>" />

    <label>Telefone:</label>
    <input type="text" id="telefoneRes" name="telefoneRes" size="40" value="<?php echo $telefoneRes;?>" />
    <label>Celular: </label>
    <input name="telefoneCel" size="40" value="<?php echo $telefoneCel;?>" />
 </div>
    
    

<div style="margin:0 0 0 0">
    <input  class="btn btn-navbar"   type="reset"  value="Limpar"/>
    <input class="btn btn-navbar"  type="submit" value="Cadastrar"></div>
    <br />
  </form>
</div>
</body>
</html>