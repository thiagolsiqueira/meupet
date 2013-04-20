<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>.::MEU PET::.</title>
<style type="text/css" media="all">
@import url("css/projeto.css");
</style>
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- POUP-UP  -->
<script type="text/javascript" src="poup/jquery.min.js"></script>
<script src="poup/poup.js"></script>

<!-- VALIDA CAMPOS -->
<script src="js/validacampos.js"></script>
<script src="js/validacamposMed.js"></script>

<!-- CALENDÁRIO -->
<link rel="stylesheet" href="calendario/jquery-ui.css" />
  <script src="calendario/jquery-1.8.3.js"></script>
  <script src="calendario/jquery-ui.js"></script>
   <script src="calendario/tradutor.js"></script>

<!-- Inclusão do Jquery -->
<script type="text/javascript" src="ajax.js" ></script>
<!-- Inclusão do Jquery Validate -->
<script type="text/javascript" src="ajax_validator.js" ></script>

<script>function cadastro(URL) {
 
  var width = 710;
  var height = 530;
 
var left = 400;
  var top = 110;
 
  window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, locatiobar=no, directories=no, menubar=no, resizable=no, fullscreen=no, titlebar=no');
 
}</script>


<script>

function logar(){

  if(document.cadastro.log.value=="") {
		alert("O Campo Login é obrigatório!");
		log.focus();
		return false;
	}else if(document.cadastro.senha.value==""){
		alert("O Campo Senha é obrigatório!");
		senha.focus();
		return false;
	}
	}</script>
<body>

<!-- TESTE DE FORMULARIO CADASTRO -->

<div id="boxes">

<div id="princial">
  <div id="logo">
    <h1 style="border-bottom-style:none;"><a dhref="#" title=""><img src="meupet.png" alt="#"/></a> <a href="mapa.php" title="mapa" style="margin-left:40px"><img src="images/dog_map.png" alt="mapa" /></a></h1>
  </div>
  <div id="login">
    <form method="post" action="login.php" onSubmit="return logar(); return false;" id="cadastro" name="cadastro" >
      <p style="margin-top:50px; margin-left:30px"> Login:
        <input style="width:275px ; margin:0 0 0 10px" type="text" name="login" id="log" placeholder="digite seu login" />
      </p>
      <p style="margin-left:30px"> Senha:
        <input style="width:275px ; margin:10px 0 0 4px" type="password" name="senha" id="senha" placeholder="digite sua senha" />
      </p>
       <a style="margin-left:30px; width:200px; margin-top:5PX" href="" onClick="javascript:cadastro('cadastroMedico.php');"  class="btn btn-large" style="color:black;">Cadastro</a> 
       <a href="#dialog2" name="modal"  style="margin:5px 0 0 30px;  color:black; float:left; width:200px" class="btn btn-large">Esqueceu a senha?</a>
      </p>
      <p>
        <input style="width:100px; height:80px; margin:-100px 0 0 265px" class="btn btn-large" type="submit" value="logar" />
        <!--<input p0poo9o type="button" onClick="javascript:abrir('cadastro.php');" class="btn btn-large" value="Cadastro" style="width:130px"/> </p> --> 
      </p>
    </form>
    <div id="dialog2" class="window"> <a href="#" class="close">Fechar [X]</a><br />
    <form method="get" action="esqueciSenha.php" >
      <span style="font-weight:bold"> Email: </span>
      <input  type="text" name="emailE" placeholder="digite seu email" />
      <p style="margin:0 0 0 163px">
        <input class="btn" type="submit" value="Enviar" />
    </form>
  </div>
  </div>
  <img id="cachorro" src="cat_dog.png" alt="cachorro"/> </div>
</body>
</html>
