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
</style>
<title>.::RECEITA::.</title>
</head>

<body style="background:url(images/pegada.jpg) no-repeat; font-family:Helvetica;">
<?php 

include ("conexao.php");

$idreceita = $_GET['id'];
$receita = mysql_query("select a.nomeAnimal,a.especie,a.raca,u.nome,r.data,r.descricao from animal a inner join usuario u on(u.idusuario = a.idusuario) inner join
prontuario p on(p.idanimal = a.idanimal) inner join receita r on(r.idpront = p.idprontuario) where r.idreceita=$idreceita");


while($rec = mysql_fetch_array($receita)){
	$nomeAnimal		 		= $rec[0];
	$especie 				= $rec[1];
	$raca				= $rec[2];
	$nome 				= $rec[3];
	$datareceita 				= $rec[4];
	$descricao 				= $rec[5];
	
	
	
}

?>
<div style="width:800px; height:900px"> <img src="logoDentro.png" title="logo" style="margin-top:20px; margin-bottom:20px" />
  <div style="margin-left:400px; margin-bottom:10px; border-top:2px solid #c6c6c6;padding-top:5px"> <span style="font-family:Helvetica; font-size:12px; font-weight:bold; padding-left:35px; ">Data da receita: </span><span style="font-family:Helvetica; font-size:12px; padding-right:20px"><?php echo date("d/m/Y", strtotime( $datareceita ));?></span> <span style="font-family:Helvetica; font-size:12px; font-weight:bold">Data de Emissão: </span><span style="font-family:Helvetica; font-size:12px;"><?php echo date('d/m/Y');?></span> </div>
  <div class="fontes">
    <hr />
    <hr />
    <h1 style="text-align:center; font-family:Helvetica;"> Receituário </h1>
    <hr />
    <hr />
    <p style="margin-bottom:5px; margin-top:20px; font-weight:bold">Nome do Animal: <?php echo $nomeAnimal ;?></p>
    <br />
    <textarea rows="3" cols="50" style="border:none; overflow:hidden;background:none; width:800px;height:350px; font-family:Helvetica; font-size:14px; line-height:20px; resize:none; padding:0 0 10px 0; "> <?php echo "$descricao";?></textarea>
    <div style="text-align:center;font-family:Helvetica; font-size:14px;; width:300px; border-top:1px solid black; margin-bottom:20px"><span><?php echo $medico;?></span><br />
      <span><?php echo $crmv;?>-<?php echo $uf;?></span></div>
    <hr />
    <p style="font-family:Helvetica; text-align:center; font-size:10px">Todos os direitos reservados ao meupet</p>
    <a href="javascript:self.print()"><img style="margin-left:375px; margin-top:20px" width="70" height="70" src="images/print.png" title="print" /></a> </div
>
</div>
</body>
</html>