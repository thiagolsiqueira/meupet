<?php
include "conexao.php";
include "verifica.php";

$login_usuario = $_SESSION["login_usuario"];

$sql = mysql_query("SELECT * FROM usuario u inner join medico m on(m.idusuario=u.idusuario) WHERE login = '$login_usuario'");
while($linha = mysql_fetch_array($sql)){
	$id			 		= $linha['idusuario'];
	
	$medico				= $linha['nome'];
	$crmv				= $linha['crmv'];
	$uf				    = $linha['ufCRMV'];
	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
* {
	margin: 0 auto;
	padding: 0 auto;
}
.fontes p {
	margin: 10px 0 0 0;
	font-family: Helvetica;
	font-weight: bold
}
;
span {
	margin-right: 10px
}
;
</style>
<title>.::PRONTUÁRIO::.</title>
</head>

<body style="background:url(images/pegada.jpg) no-repeat; font-family:Helvetica;">
<?php 

include ("conexao.php");

$idconsulta = $_GET['id'];
$prontuario = mysql_query("select a.nomeAnimal,a.especie,a.raca,a.idade,a.sexo,u.nome,c.queixa,c.sinaisclinicos,c.prognostico
,c.diagnostico,c.examelab, c.tratamento, c.data from animal a inner join usuario u on(u.idusuario = a.idusuario) inner join
prontuario p on(p.idanimal = a.idanimal) inner join consulta c on(c.idpront = p.idprontuario) where c.idconsulta=$idconsulta");


while($cons = mysql_fetch_array($prontuario)){
	$nomeAnimal		 		= $cons[0];
	$especie 				= $cons[1];
	$raca				= $cons[2];
	$idade 				= $cons[3];
	$sexo 				= $cons[4];
	$nome 				= $cons[5];
	$queixa 				= $cons[6];
	$sinaisclinicos 				= $cons[7];
	$prognostico 				= $cons[8];
	$diagnostico 				= $cons[9];
	$examelab 				= $cons[10];
	$tratamento 				= $cons[11];
	$data = $cons[12];
	
	
}

?>
<div style="width:800px; display:table;"> <img src="logoDentro.png" title="logo" style="margin-top:20px; margin-bottom:20px" />
  <div class="fontes">
    <hr />
    <p style="margin-bottom:5px">Animal: <?php echo $nomeAnimal ;?></p>
    <p style="margin-bottom:5px">Espécie: <?php echo $especie ;?></p>
    <p style="margin-bottom:5px">Raça: <?php echo $raca ;?></p>
    <p style="margin-bottom:5px;">Idade: <?php echo $idade ;?> <span style="margin-left:300px"> Sexo: <?php echo $sexo?> </span></p>
    <p style="margin-bottom:5px;">Cliente: <?php echo $nome ;?></p>
  </div>
  <hr />
  <p style="margin-bottom:25px;margin-top:20px">Data da Consulta:<?php echo date("d/m/Y", strtotime( $data ));;?></p>
  <div class="fontes">
    <?php


if(!empty($queixa)){
	
echo "<p>QUEIXA DO DONO DO ANIMAL:</p> <span>$queixa</span> <br /><br />";
}

if(!empty($sinaisclinicos)){
echo "<p>SINAIS CLÍNICOS:</p> $sinaisclinicos <br /><br />";}

if(!empty($prognostico)){
echo "<p>PROGNÓSTICO:</p> $prognostico <br /><br />";}

if(!empty($diagnostico)){
echo "<p>DIAGNÓSTICA:</p> $diagnostico <br /><br />";}

if(!empty($examelab)){
echo "<p>EXAME LABORATORIAL:</p> $examelab <br /><br />";}

if(!empty($tratamento)){
echo "<p>TRATAMENTO:</p> $tratamento <br /><br />";}




?>
  </div>
  <hr />
  <p style="font-family:Helvetica; text-align:center; font-size:10px">Todos os direitos reservados ao meupet</p>
  <a href="javascript:self.print()"><img style="margin-left:375px; margin-top:20px" width="70" height="70" src="images/print.png" title="print" /></a> </div>
</div>
</body>
</html>