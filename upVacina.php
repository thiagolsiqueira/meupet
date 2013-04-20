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
<title>.::Atualização de vacinas::.</title>
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
                
						$sql="SELECT v.idvacina,v.vacina,v.data,v.laboratorio,v.idpront,v.idmedico,v.revacina,a.idanimal FROM vacina v inner join prontuario p on(p.idprontuario = v.idpront)inner join animal a on(a.idanimal = p.idanimal) where v.idvacina=$id";
						$res=mysql_query($sql);
						$dados=mysql_fetch_row($res) or die (mysql_error());
		$idvacina=$dados[0];
		$vacina=$dados[1];
		$data=$dados[2];
		$laboratorio=$dados[3];
		$idpront = $dados[4];
		$idmed = $dados[5];
		$revacina = $dados[6];
		$idAnimal = $dados[7];




?>

    <hr/>

    <h1 style="font-size:24px; font-family:verdana;color:#666">Atualização de Vacinas</h1>
        <hr/>
        	<form  action="atualizaVacina.php" method="post"  enctype="multipart/form-data" >
     
        
           
            <label style="float:left;padding-right:5px;padding-top:5px;">Data: </label>
            <input style="width:160px;padding:5px 0 0 0; margin-left:60px; height:25px" type="date" id="data" readonly="true" name="data" value="<?php echo $data;?>"/><br /><br />
            <label style="float:left;padding:5px 5px 0 0">Vacina/Verm: </label>
            <input style="width:125px;padding-right:5px;padding-top:5px; width:350px" type="text"  name="vacina" value="<?php echo $vacina;?>"/> <br /><br />
            <label style="float:left;padding:5px 15px 0 0">Laboratório: </label>
            <input style="width:125px; width:350px" type="text"  name="laboratorio" value="<?php echo $laboratorio;?>"/>
                <input type="text" style="display:none;" value=<?php echo $idpront;?> name="idpront" />
               <input type="text" style="display:none;" value=<?php echo $idAnimal;?> name="idAnimal" />
                <input type="text" style="display:none;" value=<?php echo $idvacina;?> name="idvacina" />
            
             
      
      <br />   <br />
      <label style="float:left;padding-right:5px;padding-top:5px;">Revacina: </label>
            <input style="width:160px;padding:5px 0 0 0; margin-left:30px; height:25px;float:left" type="text" id="datepicker" name="revacina" value="<?php echo date("d/m/Y", strtotime( $revacina));?>"/><br /><br />
            <input style="margin-top:-60px; margin-left:20px" class="btn btn-navbar"  type="submit"  value="Atualizar">
            <br />
        
   
   </div>
   
   
         
</body>
</html>