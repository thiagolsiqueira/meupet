<?php

include ("conexao.php");
$id = $_GET['idFoto'];

if( $sql=mysql_query( "DELETE FROM galeria where id='$id'")
or die (mysql_error())){
			echo "<META http-equiv=refresh content='0; url=index.php'><script type='text/javascript'>
		alert('Deletado com sucesso!!!');  window.self.close();</script>";		
			}else{
			echo "<META http-equiv=refresh content='0; url=index.php'><script type='text/javascript'>
		alert('Falha ao deletar!');
		</script>";	
			}

header('location:galeria.php')
?>

