<?php

include ("conexao.php");
include ("verifica.php");
$id = $_GET['id'];

$selecionar = mysql_query("select v.idvacina,p.idprontuario,a.idanimal from vacina v inner join prontuario p on(p.idprontuario=v.idpront)
inner join animal a on(p.idanimal = a.idanimal) where v.idvacina = $id")or die(mysql_error());

$v = mysql_fetch_array($selecionar);

$idvacina = $v[0];
$idpront = $v[1];
$idanimal = $v[2];

if( $sql=mysql_query( "DELETE FROM vacina where idpront='$idpront' and idvacina = '$idvacina'")
or die (mysql_error())){
			echo "<META http-equiv=refresh content='0; url=atendimento.php?idAnimal=$idanimal'><script type='text/javascript'>
	  window.self.close();</script>";		
			}else{
			echo "<META http-equiv=refresh content='0; url=telaMedico.php'><script type='text/javascript'>
		alert('Falha ao deletar!');
		</script>";	
			}

?>

