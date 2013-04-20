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
<title>.::Atualização de Peso::.</title>
 <link href="css/bootstrap.min.css" rel="stylesheet">
<style type="text/css" media="all">@import url("css/projetoInterno.css");</style>

<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
  
   <!-- CALENDÁRIO -->
<link rel="stylesheet" href="calendario/jquery-ui.css" />
  <script src="calendario/jquery-1.8.3.js"></script>
  <script src="calendario/jquery-ui.js"></script>
   <script src="calendario/tradutor.js"></script>

</head>

<body style="overflow:hidden">
<?php
						include ("conexao.php");
			
						$id=$_GET['id'];
                
						$sql="SELECT * FROM peso where idpeso=$id";
						$res=mysql_query($sql);
						$dados=mysql_fetch_row($res);
		$id=$dados[0];
		$data=$dados[1];
		$peso=$dados[2];
		$idpront=$dados[3];
		


?>


   <hr/>
    <h1 style="font-size:24px; font-family:verdana;color:#666">Alteração de Peso</h1>
       <hr/>
        	<form  action="atualizaPeso.php" method="post"  enctype="multipart/form-data">
         
            <label style="float:left;padding-right:5px;padding-top:5px;">Data: </label>
            <input style="width:160px;padding:5px 0 0 0; margin-left:60px; height:25px" type="date" id="data" name="data" readonly="true" value="<?php echo $data;?>"/><br /><br />
            <label style="float:left;padding:5px 5px 0 0">Peso: </label>
            <input style="width:125px;padding-right:5px;padding-top:5px; margin-left:60px; width:50px; float:left" type="text"  name="peso" value="<?php echo $peso;?>"/> <br /><br />
             <input type="text" style="display:none;" value=<?php echo $idpront;?> name="idpront" />
             <input type="text" style="display:none;" value=<?php echo $id;?> name="idpeso" />
            
             
           
            <input style="margin-top:-62px; margin-left:10px; width:90px" class="btn btn-navbar"   type="submit" value="Atualizar">
            <br />
        
   
   </div>
   
   
         
</body>
</html>