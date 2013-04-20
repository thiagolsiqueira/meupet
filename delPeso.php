<?php

include ("conexao.php");
include ("verifica.php");
$id = $_GET['id'];

$selecionar = mysql_query("select k.idpeso,p.idprontuario,a.idanimal from peso k inner join prontuario p on(p.idprontuario=k.idpront)
inner join animal a on(p.idanimal = a.idanimal) where k.idpeso =  $id")or die(mysql_error());

$v = mysql_fetch_array($selecionar);

$idpeso = $v[0];
$idpront = $v[1];
$idanimal = $v[2];

if( $sql=mysql_query( "DELETE FROM peso where idpront='$idpront' and idpeso = '$idpeso'")
or die (mysql_error())){
			echo "<META http-equiv=refresh content='0; url=atendimento.php?idAnimal=$idanimal'><script type='text/javascript'>
	  window.self.close();</script>";		
			}else{
			echo "<META http-equiv=refresh content='0; url=telaMedico.php'><script type='text/javascript'>
		alert('Falha ao deletar!');
		</script>";	
			}

?>

