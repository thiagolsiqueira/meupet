<?php
include "conexao.php";
include "scripts php/verifica.php";
$login_usuario = $_SESSION["login_usuario"];

$sql = mysql_query("SELECT * FROM usuario WHERE login = '$login_usuario'");
while($linha = mysql_fetch_array($sql)){
	$id			 		= $linha['id'];
	$nome = $linha['nomeProprietario'];
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::Fotos::.</title>
<script>
var dayarray=new Array("Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado")
var montharray=new Array("1","2","3","4","5","6","7","8","9","10","11","12")

function getthedate(){
var mydate=new Date()
var year=mydate.getYear()
if (year < 1900)
year+=1900
var day=mydate.getDay()
var month=mydate.getMonth()
var daym=mydate.getDate()


if (daym<10)
daym="0"+daym
var hours=mydate.getHours()
var minutes=mydate.getMinutes()
var seconds=mydate.getSeconds()
var dn="AM"
if (hours>=24)
dn="PM"
if (hours>24){
hours=hours-24
}
if (hours==0)
hours=24
if (minutes<=9)
minutes="0"+minutes
if (seconds<=9)
seconds="0"+seconds
//change font size here
var cdate="<font color='#000000'>Hoje é <font color=black >"+dayarray[day]+" - "+daym+"/"+montharray[month]+"/"+year+   "</font><br>  ,são exatamente:<font color=black>"+hours+":"+minutes+":"+seconds+"</font><br><font color='#000000'>Bem vindo, <?php echo "$nome" ?>!</font>"
if (document.all)
document.all.clock.innerHTML=cdate
else if (document.getElementById)
document.getElementById("clock").innerHTML=cdate
else
document.write(cdate)
}
if (!document.all&&!document.getElementById)
getthedate()
function goforit(){
if (document.all||document.getElementById)
setInterval("getthedate()",1000)
}

 

</script>

<script>
function logout(){
	location.href="logout.php";
}
function confirmacao(id) {
     var resposta = confirm("Cuidado! Você quer mesmo excluir essa conta?");
 
     if (resposta == true) {
          window.location.href = "deletar.php?id="+id;
     }
}

</script>
<style type="text/css" media="all">@import url("projetoInterno.css");</style>
<style type="text/css" media="all">@import url("projeto.css");</style>
	<link href="jquery/style.css" rel="stylesheet" type="text/css" media="all" /> 
		<link href="jquery/jphotogrid.css" rel="stylesheet" type="text/css" media="screen" /> 
		<!--[if IE]>
			<link href="jphotogrid.ie.css" rel="stylesheet" type="text/css" media="screen" />
		<![endif]--> 
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script src="jquery/jphotogrid.js"></script>
		<script src="jflickrfeed.js"></script>
		<script src="jquery/setup.js"></script>
</script>

<link href="bootstrap.min.css" rel="stylesheet">
</head>
</head>

<body onLoad="goforit()">
<div style=" width:100%; height:150px;"class="navbar-inner">
<div id="principal">
<img class="logoDentro" src="logoDentro.png" alt="logoDentro" />
<span id="clock" style="text-align:center;margin-left:397px;width:250px;margin-top:30px; font-family:Helvetica; font-size:12px;  float:left; background:#b6b6b6;border-top-left-radius: 10px 10px; 
border-top-right-radius:  10px 10px; 
border-bottom-right-radius:  10px 10px; 
border-bottom-left-radius: 10px 10px;"></span>

<ul id="menu"  >
<li class="btn btn-large"><a style="text-decoration:none;color:black;"href="scripts php/perfil.php" title="Perfil">Perfil</a></li>
<li class="btn btn-large"><a style="text-decoration:none;color:black;" href="scripts php/consulta.php" title="Consultas">Consultas</a></li>
<li class="btn btn-large"><a style="text-decoration:none;color:black;" href="scripts php/medicamentos.php" title="Medicação">Medicação</a></li>
<li class="btn btn-large"><a style="text-decoration:none;color:black;" href="scripts php/galeria.php" title="Fotos"> Fotos </a></li>
<li class="btn btn-large"><a style="text-decoration:none;color:black;" href="scripts php/mapa.php" title="Mapa">Mapa</a></li>
<li class="btn btn-large"><a style="text-decoration:none;color:black;" onclick="logout()" title="Logout">Sair</a></li>

</ul>
</div>
</div>
<div id="princial">

     <form style="margin:15px 0 0 0" action="scripts php/up.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
		
					
            <input type="file" name="fotos" />
            <input class="btn" style="height:25px; margin-top:-10px" type="submit" value="Upload" />

	</form>	
    
<div id="container">

			
			<ul id="pg">
            <?php 
				
				include("conexao.php");
					
				$sql= "SELECT * FROM galeria WHERE idAnimal = $id";
				
			
				$res = mysql_query($sql) or die ("não foi possível realizar a consulta");
				
				while($linha = mysql_fetch_array($res)){
					
					$fotos = $linha['fotos'];
					$idFoto = $linha['id'];
						echo "<li><img src='fotos_galeria/".$fotos."'/> <a href=deletaFoto.php?idFoto=$idFoto></a></li> ";
						
			
				}
				
				?>
			</ul>
		</div>
  	    </div>
</div>


</body>
</html>