<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>.::MEU PET::.</title>
</head>

<body>
<?php

include "conexao.php";

$nomeProp = $_POST['nomeProp'];
$email = $_POST['email'];
$nivel = 1;
$telefoneRes = $_POST['telefoneRes'];
$telefoneCel = $_POST['telefoneCel'];
$email=$_POST['email'];
$senha=$_POST['senha'];


$sql="SELECT * FROM `usuario` WHERE `login` = '{$_POST['login']}'";//monto a query





        $q = mysql_query( $sql );//executo a query

        if( mysql_num_rows( $q ) > 0 ){//se retornar algum resultado
               echo "<META http-equiv=refresh content='0; url=index.php'><script type='text/javascript'>
		alert('usuário já cadastrado');  window.self.close();</script>";	
		}else{
          $login=$_POST['login'];



if($sql2 = mysql_query("INSERT INTO usuario(nome,email,nivel,telefoneRes,telefoneCel,login,senha)values('$nomeProp','$email','$nivel','$telefoneRes','$telefoneCel','$login','$senha')")){
	
	
			
$animal = mysql_query("SELECT * FROM USUARIO WHERE login = '$login'");

	while($usuario = mysql_fetch_array($animal)){
		$idUsuario = $usuario['idusuario'];	
	
	}
	
	
	
$nome = $_POST['nomeAnimal'];
$data=date("d/m/y");
$dataNasc = implode('-',array_reverse(explode('/',$_POST['dataNasc'])));
$raca = $_POST['raca'];
$sexo = $_POST['sexo'];
$idade = $_POST['idade'];
$cor = $_POST['cor'];
$idmedico=$_POST['idmedico'];

$especie = $_POST['especie'];

 $pasta = "fotos/";
     
    /* formatos de imagem permitidos */
    $permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp");
		 
		 
    if(isset($_POST)){
        $nome_imagem    = $_FILES['foto']['name'];
        $tamanho_imagem = $_FILES['foto']['size'];
         
        /* pega a extensão do arquivo */
        $ext = strtolower(strrchr($nome_imagem,"."));
         
        /*  verifica se a extensão está entre as extensões permitidas */
        if(in_array($ext,$permitidos)){
             
            /* converte o tamanho para KB */
            $tamanho = round($tamanho_imagem / 1024);
             
            if($tamanho < 1024){ //se imagem for até 1MB envia
                $nome_atual = md5(uniqid(time())).$ext; //nome que dará a imagem
                $tmp = $_FILES['foto']['tmp_name']; //caminho temporário da imagem
                 
                /* se enviar a foto, insere o nome da foto no banco de dados */
                if(move_uploaded_file($tmp,$pasta.$nome_atual)){
					
					
	if($sql3 = mysql_query("INSERT INTO animal(nomeAnimal, dataNasc, sexo, raca, idade, especie, cor, foto, idusuario,idmed)values('$nome', '$dataNasc', '$sexo', '$raca', '$idade', '$especie', '$cor', '$nome_atual','$idUsuario','$idmedico')")or die (mysql_error())){
		
					$cad = mysql_query("SELECT * FROM animal where idusuario='$idUsuario'");

	while($cadastro = mysql_fetch_array($cad)){
		$idanim = $cadastro['idanimal'];
		
		
	}
	
	$dataCad = date("y/m/d");		
	
	$sql4 = mysql_query("insert into cadanimal(data,idusuario,idanimal)values('$dataCad','$idUsuario','$idanim')");
	$sql5 = mysql_query("insert into prontuario(idanimal)values('$idanim')");


		echo "<META http-equiv=refresh content='0; url=index.php'><script type='text/javascript'>
		alert('Conta cadastrada com Sucesso: Um email foi enviado com seu usuario e senha');  window.self.close();</script>";			
		
	
$destinatario = $email;
$assunto = "Cadastrado com sucesso!";
$msg .= "Seu cadastro foi realizado com sucesso e abaixo segue seus dados para acesso:"  ."\n";
$msg .= "login:  " ."$login"."\n";
$msg .= "senha:  " ."$senha"."\n";

mail($destinatario,$assunto,$msg);

			}else{echo "<META http-equiv=refresh content='0; url=index.php'><script type='text/javascript'>
		alert('FALHA AO CADASTRAR!');  window.self.close();</script>";}
		$DELUSER= mysql_query("delete from usuario where idusuario = '$idUsuario'");
                
            }else{
				echo "<META http-equiv=refresh content='0; url=index.php'><script type='text/javascript'>
		alert('A IMAGEM DEVE TER NO MÁXIMO 1MB');  window.self.close();</script>";
		$DELUSER= mysql_query("delete from usuario where idusuario = '$idUsuario'");
            }
        }else{
			echo "<META http-equiv=refresh content='0; url=index.php'><script type='text/javascript'>
		alert('APENAS ARQUIVOS JPG, GIF, BMP,PNG!');  window.self.close();</script>";
		$DELUSER= mysql_query("delete from usuario where idusuario = '$idUsuario'");
        }}
    else{
		echo "<META http-equiv=refresh content='0; url=index.php'><script type='text/javascript'>
		alert('VOCÊ NÃO INSERIU UMA IMAGEM');  window.self.close();</script>";
		$DELUSER= mysql_query("delete from usuario where idusuario = '$idUsuario'");
        exit;
    
		}
	
		
		}
		
}
		
		}
		
?>
</body>
</html>