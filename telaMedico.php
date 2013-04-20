<?php
include "conexao.php";
include "verifica.php";

$login_usuario = $_SESSION["login_usuario"];

$sql = mysql_query("SELECT u.idusuario,u.nome,m.crmv,m.ufCRMV,m.idmedico FROM usuario u inner join medico m on(m.idusuario=u.idusuario) WHERE login = '$login_usuario'");
while($linha = mysql_fetch_array($sql)){
	$id			 		= $linha[0];
	$idmedico = $linha[4];
	$medico				= $linha[1];
	$crmv				= $linha[2];
	$uf				    = $linha[3];
	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>

<link href="css/bootstrap.min.css" rel="stylesheet">
<script>
function logout(){
	location.href="logout.php";
}

function voltar(){
	location.href="telaMedico.php";
}

function confirmacao(idAnimal) {
     var resposta = confirm("Cuidado! Você quer mesmo excluir essa consulta?");
 
     if (resposta == true) {
          window.location.href = "deletarAnimal.php?idanimal="+idAnimal;
		 
		  
     }}
	 
	 
	 function abrir(URL) {
 
  var width2 = 890;
  var height2 = 742;
 
var left2 = 300;
  var top2 = 110;
 
  window.open(URL,'janela', 'width='+width2+', height='+height2+', top='+top2+', left='+left2+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
 
}

function cadastro(URL) {
 
  var width = 710;
  var height = 530;
 
  window.open(URL,'janela', 'width='+width+', height='+height+', top=300, left=400, scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
 
}

function cadMed(URL) {
 
  var width = 710;
  var height = 350;
 
  window.open(URL,'janela', 'width='+width+', height='+height+', top=300, left=400, scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
 
}
</script>
<title>.::Tela Médico::.</title>

<style type="text/css" media="all">
@import url("css/projetoInterno.css");
</style>
<style type="text/css" media="all">
@import url("css/projeto.css");
</style>
 <script src="jquery/jquery-1.9.1.js"></script>
  <script src="jquery/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
  
</head>

<body >


<div style=" width:100%; height:150px; position:absolute; top:0;"class="navbar-inner">
<div id="principal"> <img style="margin-bottom:20px; margin-right:100px; margin-top:60px; float:left" class="logoDentro" src="logoDentro.png" alt="logoDentro" />
<div style="margin-left:-400px; margin-top:-30px">
<br /><br /><br /><script language="JavaScript">

	document.write("<font color='#ffffff' size='2,5' face='Helvetica'>")
	var mydate=new Date()
	var year=mydate.getYear()
	if (year<2000)
	year += (year < 1900) ? 1900 : 0
	var day=mydate.getDay()
	var month=mydate.getMonth()
	var daym=mydate.getDate()
	if (daym<10)
	daym="0"+daym
	var dayarray=new Array("Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado")
	var montharray=new Array(" de Janeiro de "," de Fevereiro de "," de Março de ","de Abril de ","de Maio de ","de Junho de","de Julho de ","de Agosto de ","de Setembro de "," de Outubro de "," de Novembro de "," de Dezembro de ")
	document.write("   "+dayarray[day]+", "+daym+" "+montharray[month]+" "+year+" ")
	document.write("</b></i></font>")
	</script>
<br />
 <span style="font-family:Helvetica; color:white; margin-left:9px">Bem vindo Dr.<?php echo $medico;?></span>
    <br />
   <br />
   <input type="button" onClick="javascript:abrir('EndMapa.php');" class="btn btn-large" value="Cadastrar Endereço no Mapa" style="width:250px;height:40px;  margin-bottom:2px; margin-top:-15px"/>
   <input type="button" onclick="logout()" class="btn btn-navbar" value="Sair" style="margin-bottom:10px; width:250px; height:40px" />
 </div>

 <hr/>
    <h1 style="font-size:24px; font-family:verdana;color:#666">Animais Cadastrados</h1>
     <form style="margin:-40px 0 0 300px; width:300px;" enctype="multipart/form-data" method="post" action="telaMedico.php">

    <input style="margin:5px 0 0 0; height:27px;float:left" name="nome" id="nome" type="text"  placeholder=" Listar todos" />
    <input style="margin:5px 0 0 3px;height:36px; float:left" class="btn btn-navbar" name="buscar" type="submit" value="Buscar" />
         <input type="button" onClick="javascript:cadastro('cadastroAnimal.php');" class="btn btn-large" value="Cadastrar Animal" style=" margin:-38px 0 0 295px;float:left"/>
         <input type="button" onClick="javascript:cadMed('upMedico.php');" class="btn btn-large" value="Alterar Cadastro Médico" style="margin:-60px 0 0 440px"/>

  </form>
       <hr style="margin:-10px 0 20px 0"/>

<div class="tabVac" id="lista">
    
     <table class="table" style="background:white;">
      <thead>
  <tr style="background:#c6c6c6" >
    <td class="coluna-Vac0" align="center">id</td>
    <td class="coluna-Vac1" align="center">Animal</td>
    <td class="coluna-Vac2" align="center">Dono</td>
    <td class="coluna-Vac3" align="center">Nova</td>
  </tr>
  
  </thead>
	</table>
    
    <div class="scrollVac" style="margin-top:-20px">
		<table class="table" style="background:white;">
			<tbody>
  <?php 

 if(!empty($_POST['nome'])){

				$nome = $_POST['nome'];	

 }else{$nome='%';}
					$seleciona = mysql_query (
					
					"SELECT * FROM animal a inner join usuario u on(u.idusuario = a.idusuario) WHERE a.nomeAnimal like '$nome%' and a.idmed = $idmedico ORDER BY u.nome DESC");
                    
 
						while ($vet = mysql_fetch_array($seleciona)){
							                                                        
													
							$idAnimal = $vet['idanimal'];
							$nomeAnimal = $vet['nomeAnimal'];
							$nome = $vet['nome'];
						
				    
        	?>
  <tr align="center">
    <td class="coluna-Vac0" align="center" ><?php echo $idAnimal;?></td>
    <td class="coluna-Vac1" align="center"><?php echo $nomeAnimal;?></td>
    <td class="coluna-Vac2" align="center"><?php echo $nome;?></td>
    <td  class="coluna-Vac3" align="center"><a class="btn btn-navbar" style="width:60px" href="atendimento.php?idAnimal=<?php echo $idAnimal;?>" title="consulta">Consulta</a></td>
  </tr>
 
  <?php
			}
		    ?>
  </tbody>
		</table>
	</div>
</div>

 <hr/>
    <h1 style="font-size:24px; font-family:verdana;color:#666">Consulta com Retorno</h1>
      <hr/>
      
      
      
      <div class="tabVac" id="lista">
    
     <table class="table" style="background:white;">
      <thead>
  <tr style="background:#c6c6c6" >
    <td class="coluna-Vac0" align="center">Retorno</td>
    <td class="coluna-Vac1" align="center">Animal</td>
    <td class="coluna-Vac2" align="center">Dono</td>
    <td class="coluna-Vac3" align="center">Nova</td>
  </tr>
  
  </thead>
	</table>
    
    <div class="scrollVac" style="margin-top:-20px">
		<table class="table" style="background:white;">
			<tbody>
  <?php 


					$seleciona = mysql_query (
					
					"SELECT * FROM animal a inner join usuario u on(u.idusuario = a.idusuario) inner join agendaconsulta ac on(ac.idanimal=a.idanimal) WHERE ac.idanimal=$idAnimal ORDER BY ac.dataAgenda DESC");
                    
 
						while ($vet = mysql_fetch_array($seleciona)){
							                                                        
													
							$idAnimal = $vet['idanimal'];
							$nomeAnimal = $vet['nomeAnimal'];
							$nome = $vet['nome'];
							$dataAgenda = $vet['dataAgenda'];
						
				    
        	?>
  <tr align="center">
    <td class="coluna-Vac0" align="center" ><?php echo date("d/m/Y", strtotime( $dataAgenda));?></td>
    <td class="coluna-Vac1" align="center"><?php echo $nomeAnimal;?></td>
    <td class="coluna-Vac2" align="center"><?php echo $nome;?></td>
    <td  class="coluna-Vac3" align="center"><a class="btn btn-navbar" style="width:60px" href="atendimento.php?idAnimal=<?php echo $idAnimal;?>" title="consulta">Consulta</a></td>
  </tr>
 
  <?php
			}
		    ?>
  </tbody>
		</table>
	</div>
</div>
  <div style="margin:100px 0 0 0;width:800px; height:420px;" > </div>
  

</div></div>
</body>
</html>