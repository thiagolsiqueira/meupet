<?php

include ("conexao.php");
$id = $_GET['id'];

                
						$sql="SELECT a.idanimal FROM receita r inner join prontuario p on(p.idprontuario = r.idpront)
						inner join animal a on(a.idanimal = p.idanimal) where idreceita=$id";
						$res=mysql_query($sql);
						$dados=mysql_fetch_row($res) or die (mysql_error());
						
		$idAnimal=$dados[0];


if( $sql=mysql_query( "DELETE FROM receita where idreceita='$id'")
or die (mysql_error())){
			echo "<META http-equiv=refresh content='0; url=atendimento.php?idAnimal=$idAnimal'><script type='text/javascript'>
		 window.self.close();</script>";		
			}else{
			echo "<META http-equiv=refresh content='0; url=atendimento.php?idAnimal=$idAnimal'><script type='text/javascript'>
		alert('Falha ao deletar!');
		</script>";	
			}

?>

