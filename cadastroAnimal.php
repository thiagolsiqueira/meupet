
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::Cadastro Animal::.</title>
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
  
  function valida(){
	  var email = document.getElementById('email');
	  if(email.value==null  || email.value=="" || email.value.indexOf('@')==-1){
		alert('Campo email está em branco ou não é um email válido');
		email.focus(); 
		return false;
		}
  };
  </script>
  
  
  
   <!-- CALENDÁRIO -->
<link rel="stylesheet" href="calendario/jquery-ui.css" />
  <script src="calendario/jquery-1.8.3.js"></script>
  <script src="calendario/jquery-ui.js"></script>
   <script src="calendario/tradutor.js"></script>
</head>
  <hr/>

    <h1 style="font-size:24px; font-family:verdana;color:#666; padding-left:10px">Cadastro de Animal</h1>
        <hr/>
<body style="overflow:hidden">
<div style="margin-left:10px;">
 <form action="cadUser.php" method="post" onsubmit="return valida()" id="cadastro" name="cadastro"  enctype="multipart/form-data">

 
      <br />
      <label style="padding-right:5px;padding-top:5px;">Dono do Animal: </label>
      <input style="width:300px ;;padding-right:5px;padding-top:5px; float:left"  type="text" id="nomeProp" name="nomeProp" size="60" />
            <label style="padding-right:5px;margin:-23px 0 2px 330px;">Nome do Animal:</label>
      <input style="padding-right:5px;padding-top:6px; padding-left:5px;width:300px; margin:2px 0 0 19px" type="text" name="nomeAnimal" id="nome" size="30">
<br /><br />

      <label style="padding-right:5px;padding-top:5px;padding-left:5px"> Data de Nasc: </label>
<input style="width:125px;;padding-right:5px;padding-top:5px;float:left"; type="text" id="datepicker" name="dataNasc"/>
      <label style="margin:-23px 0 5px 145px">Raça:</label>
      <input style="width:153px; margin:0 0 0 8px; float:left" type="text" name="raca" id="raca" size="30">

      <label  style="padding-right:5px;padding-top:5px; margin:-25px 0 0 330px">Sexo:</label>
      <select style="width:150px; float:left; margin:0 0 0 23px" name="sexo">
        <option value="Selecione"> Selecione o Sexo </option>
        <option value="M"> Macho </option>
        <option value="F"> Fêmea </option>
      </select>
      
      <label  style="padding-right:5px;padding-top:5px;padding-left:5px; margin:-22px 0 0 483px">Espécie:</label>
      <select style="width:155px; float:left; margin:0 0 0 5px" name="especie">
        <option value="Selecione"> Selecione a espécie </option>
        <option value="canino"> Canina </option>
        <option value="felino"> Felina </option>
        <option value="peixe"> Peixe </option>
        <option value="passaros"> Passáros </option>
        <option value="repteis"> Répteis </option>
        <option value="bovina"> Bovina </option>
        <option value="outras"> Outras </option>
      </select>
      <br /><br />
      
         <label style="padding-right:5px;padding-top:5px;padding-left:5px;margin:0 0 0 0">Idade:</label>
      <input  style="width:125px; float:left;margin:-0 0 0 0" type="text" id="idade" name="idade" size="10">
      
      <label style="padding-right:5px;padding-top:5px;padding-left:5px;margin:-23px 0 0 143px">Cor:</label>
      <input style="float:left;padding-right:5px;padding-top:5px; width:150px;margin:0 0 0 10px" type="text" name="cor" size="20">
      <label style="padding-right:5px;padding-top:5px;margin:-23px 0 0 335px ">Foto</label>
      <input style="float:left;padding-right:5px;padding-top:5px;margin:0 0 0 25px" type="file" id="foto"  name="foto"/>
     
     
      <br /><br />
      
      
      <label style="padding-right:5px;padding-top:5px;">Telefone: </label>
      <input style="width:126px;" type="text" id="telefoneRes" name="telefoneRes" size="40" />
      <label style="padding-right:5px;margin-top:-59px;padding-left:145px">Celular: </label>
      <input style="width:150px; margin-left:145px ;float:left" type="text" id="telefoneCel" name="telefoneCel" size="40" />

            <label style="margin:-22px 0 3px 335px">Email:</label>
      <input style="padding-right:5px;padding-top:5px;; width:300px; margin: 0 0 0 27px" type="text" placeholder="example@email.com" name="email" id="email" size="60" />

      <br /> 
      <label style="margin-right:5px;padding-top:4px; margin-top:10px">Login:</label>
      <input style="float:left;width:300px" type="text" placeholder="digite um apelido..." id="login2" name="login" />
      <label style="margin:-23px 0 0 335px; padding-top:4px;" >Senha:</label>
      <input style="float:left; margin:0 0 0 20px; width:140px"  type="password" placeholder="use letras e números" id="senha" name="senha"/>
      <label style="margin:-23px 0 0 490px;padding-top:4px; " >Confirma Senha</label>
      <input style="margin:0 0 0 10px; width:140px" type="password" placeholder="use letras e números" id="confirmaSenha" name="confirmaSenha"/>
     <br /><br />
           <label style="margin:0 0 5px 0;padding-top:4px; " >Selecione o médico</label>
           
        <select style="width:155px; float:left;margin-right:10px" name="idmedico">
           <?php 
		   
		   include ('conexao.php');
		   $id = $_GET['id'];
		   
		   $sql = mysql_query("select m.idmedico,u.nome from usuario u inner join medico m on(m.idusuario = u.idusuario)")or die (mysql_error());
		   
		   while($select = mysql_fetch_array($sql)){
			   
			   ?>
               
            <option value="<?php echo $select[0];?>"><?php echo $select[1];?></option>
            
            <?php 
		   }
		   ?>
           </select>
		   
		  
      <input  class="btn btn-navbar"   type="reset"  value="Limpar"/>
      <input  class="btn btn-navbar"  type="submit" value="Cadastrar">
      <br />
    </form>
    </div>
</body>
</html>