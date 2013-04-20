<?php
include "conexao.php";
include "scripts php/verifica.php";

$login_usuario = $_SESSION["login_usuario"];

$sql = mysql_query("SELECT * FROM adm WHERE login = '$login_usuario'");
while($linha = mysql_fetch_array($sql)){
	$id			 		= $linha['idAnimal'];
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastro</title>
<script language="Javascript">
function confirmacao(id) {
     var resposta = confirm("Cuidado! Você quer mesmo excluir essa conta?");
 
     if (resposta == true) {
          window.location.href = "deletar.php?id="+id;
     }
}
</script>
<style type="text/css" media="all">@import url("projetoInterno.css");</style>
</head>

<body></h1>
<?php
						include ("conexao.php");
					
					
						$id=$_GET['idAnimal'];
                
						$sql="SELECT * FROM usuarios where idAnimal=$id";
						$res=mysql_query($sql);
						$dados=mysql_fetch_row($res);
		$id=$dados[0];
		$nomeAnimal=$dados[1];
		$nomeProprietario=$dados[2];
		$genero=$dados[3];
		$dataNasc=$dados[4];
		$raca=$dados[5];
		$pedigree=$dados[6];
		$nomePai=$dados[7];
		$nomeMae=$dados[8];
		$email=$dados[9];
		$login=$dados[10];
		$senha=$dados[11];
		$fotos=$dados[12];
	

?>


<div id="menu">
<img class="logoDentro" src="logoDentro.png" alt="logoDentro" />
<ul id="lista">
<li><a href="" title="Perfil">Perfil</a></li>
<li style="width:100px;"><a href="" title="Vacinas">Vacinas</a></li>
<li style="width:100px;"><a href="" title="Consultas">Consultas</a></li>
<li><a href="" title="Fotos"> Fotos </a></li>
<li><a href="" title="Mapa">Mapa</a></li>
</ul></div>


<div id="principal">


<div id="proprietario">
    <h1 style="margin:10px 0 0 30px; font-family:verdana;color:#666">Cadastro do Pet</h1>
        	<form action="cadUser.php" method="post">
        
                <br /><br />
           		<label>Nome do Animal: </label>
                <input type="text" name="nomeAnimal" value="<?php echo $nomeAnimal;?>" size="40" />
                <label>Nome do Proprietário: </label>
                <input type="text" name="nomeProprietario" value="<?php echo $nomeProprietario;?>" size="40" /><br /><br />
                 <label> Data de Nascimento: </label>
               <input type="date" name="dataNasc" value="<?php echo $dataNasc;?>"/>
                <label>Raça:</label>
                <input type="text" name="raca" size="30" <?php echo $raca?>><br /><br />
                <label>pedigree:</label>
                <input type="text" name="pedigree" size="30" <?php echo $pedigre;?>><br /><br />
                <label>Nome da Pai:</label>
                <input type="text" name="nomePai" size="20" <?php echo $nomePai;?>>
                <label>Nome da Mae:</label>
                <input type="text" name="nomeMae" size="30" <?php echo $nomeMae;?>><br /><br />
                <label>Genero:</label>
               <select name="genero"> 
                			<option value="<?php echo $genero;?>"> Selecione o gênero </option>
                            <option value="Masculino"> Macho </option>
                            <option value="Feminino"> Fêmea </option>
               </select> <br /><br />
              
               <label>Email:</label>
               <input type="text" placeholder="example@email.com" name="email" size="40" <?php echo $email;?> /> 	Confirma email: <input type="text" name="confirmaEmail" size="40"/><br /><br />
               <label>Login</label>
               <input type="text" placeholder="digite um apelido..." name="login" size="20" <?php echo $login;?>/>
                 <label>Senha</label>
               <input type="password" placeholder="use letras e números" name="senha" <?php echo $senha;?>/>
               <label>Confirma Senha</label>
               <input type="password" placeholder="use letras e números" name="confirmaSenha"/>
              <br /><br /><label>foto</label>  <input type="file" placeholder="use letras e números" name="fotos"/><br />
       
                           <input style="width:150px; height:50px; margin:20px 0 0 500px; " type="reset" value="Cancelar">
                           <input style="width:150px; height:50px; margin:20px 0 0 0 " type="button" onclick="confirmacao('<?php echo $id;?>')" value="Deletar "><br />
                           
                           
                           q                          
            </form>
               <img class="pegadinhas" src="pegadasInterno.png" alt="pegadas" />
             
         </div>
         <img class="dogs" src="dogs.png" alt="dogs" />
       
   		<img class="pegadasInterna" src="pegadas.png" alt="pegadinhas" />
   
   </div>
   
   
         
</body>
</html>