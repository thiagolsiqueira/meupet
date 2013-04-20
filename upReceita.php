<?php
include "conexao.php";
include "verifica.php";

$login_usuario = $_SESSION["login_usuario"];

$sql = mysql_query("SELECT * FROM usuario WHERE login = '$login_usuario'");
while($linha = mysql_fetch_array($sql)){
	$id			 		= $linha['idusuario'];
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::Atualização de Receitas::.</title>
 <link href="css/bootstrap.min.css" rel="stylesheet">
<style type="text/css" media="all">@import url("css/projetoInterno.css");</style>

<script type='text/javascript'>
<!--
function fechar() 
{
ww = window.open(window.location, "_self");
ww.close();
} 
-->
</script>
</head>

<body style="overflow:hidden">
<?php
						include ("conexao.php");
					
					
						$id=$_GET['id'];
                
						$sql="SELECT data,descricao FROM receita where idreceita=$id";
						$res=mysql_query($sql);
						$dados=mysql_fetch_row($res) or die (mysql_error());
						
		$data=$dados[0];
		$descricao=$dados[1];





?>
 <hr/>


    <h1 style="font-size:24px; font-family:verdana;color:#666">Alteração de Receita</h1>
     <hr/>
        	<form  action="atualizaReceita.php" method="post"  enctype="multipart/form-data" >
     
           
           
            <label style="float:left;padding-right:5px;padding-top:5px;">Data: </label>
            <input style="width:160px;padding:5px 0 0 0; margin-left:60px; height:25px" type="date" readonly="true" id="data" name="data" value="<?php echo $data;?>"/><br /><br />
            <label style="float:left;padding:5px 5px 0 0">Descrição: </label>
            <textarea rows="3" cols="100" style="width:500px; height:200px" id="conteudo" name="descricao"><?php echo $descricao;?></textarea>
              <input style="display:none;" type="text"  name="idreceita" value="<?php echo $id;?>"/>
      
      <br />   <br />
      
        
            <input style="margin-top:-30px" class="btn btn-navbar" onclick="fechar()" type="submit" value="Atualizar">
            <br />
        
   
   </div>
   
   
         
</body>
</html>