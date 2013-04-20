<?php

include "scripts php/conexao.php";

$id = $_GET['id'];

$sql= mysql_query("SELECT * FROM GALERIA WHERE idAnimal = $id");
$total = count($sql);
			
$pasta = "fotos_galeria/";
     
    /* formatos de imagem permitidos */
    $permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp");
     
    if(isset($_POST)){
        $nome_imagem    = $_FILES['fotos']['name'];
        $tamanho_imagem = $_FILES['fotos']['size'];
         
        /* pega a extensão do arquivo */
        $ext = strtolower(strrchr($nome_imagem,"."));
         
        /*  verifica se a extensão está entre as extensões permitidas */
        if(in_array($ext,$permitidos)){
             
            /* converte o tamanho para KB */
            $tamanho = round($tamanho_imagem / 1024);
             
            if($tamanho < 1024){ //se imagem for até 1MB envia
                $nome_atual = md5(uniqid(time())).$ext; //nome que dará a imagem
                $tmp = $_FILES['fotos']['tmp_name']; //caminho temporário da imagem
                 
                /* se enviar a foto, insere o nome da foto no banco de dados */
				
                if(move_uploaded_file($tmp,$pasta.$nome_atual)){
                    if($total<=24){



$ent = mysql_query("INSERT INTO galeria(fotos,idAnimal)values('$nome_atual','$id')");
			echo "<META http-equiv=refresh content='0; url=galeria.php'><script type='text/javascript'>
		alert('Foto upada com sucesso');  window.self.close();</script>";}else{echo "<META http-equiv=refresh content='0; url=galeria.php'><script type='text/javascript'>
		alert('MÁXIMO DE 25 FOTOS PERTIMIDOS!');
		</script>";}}else{

			echo "<META http-equiv=refresh content='0; url=galeria.php'><script type='text/javascript'>
		alert('FALHA AO ENVIAR ARQUIVO!');
		</script>";	}}else{echo "<META http-equiv=refresh content='0; url=galeria.php'><script type='text/javascript'>
		alert('ARQUIVO MUITO ACIMA DE 1 MEGA!');
		</script>";}}else{
			echo "<META http-equiv=refresh content='0; url=galeria.php'><script type='text/javascript'>
		alert('FALHA AO ENVIAR ARQUIVO: EXTENSÕES PERMITIDAS, JPG,GIF,PNG,BMP!');
		</script>";}}

?>