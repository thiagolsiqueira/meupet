<?php

include "conexao.php";
include "verifica.php";

$idAnimal = $_POST['idAnimal'];
$sql = mysql_query("select * from prontuario p inner join animal a on(a.idanimal=p.idanimal) where a.idanimal=$idAnimal")or die (mysql_errno());
while($linha = mysql_fetch_array($sql)){
	$id			 		= $linha[0];
	
}
if(!empty($_POST['check'])){
	$opcao=$_POST['check'];
}else{
	$opcao='vazio';}


$idpront = $id;
$data =  implode('-',array_reverse(explode('/',$_POST['data'])));
$peso = $_POST['peso'];



if($ent = mysql_query("INSERT INTO peso(data,peso,idpront)values('$data','$peso','$idpront')")
		or die(mysql_error())){
			echo "<META http-equiv=refresh content='1; url=atendimento.php?idAnimal='$idAnimal''><script type='text/javascript'>
		alert('Atualizado com sucesso!!!$opcao');  window.self.close();</script>";		
			}else{
			echo "<META http-equiv=refresh content='1; url=atendimento.php?idAnimal='$idAnimal''><script type='text/javascript'>
		alert('Só é permitido atualizar a vacina do dia atual!!!');  window.self.close();</script>";
			}

?>