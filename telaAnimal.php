<?php
include "conexao.php";
include "verifica.php";

$login_usuario = $_SESSION["login_usuario"];

$sql = mysql_query("SELECT u.idusuario, a.idanimal, u.nome FROM usuario u inner join animal a on(a.idusuario=u.idusuario) WHERE login = '$login_usuario'");
while($linha = mysql_fetch_array($sql)){
	$idusuario		 		= $linha[0];
	$idanimal				= $linha[1];
$dono				= $linha[2];
	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title>.::TELA DO ANIMAL::.</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<script>
function logout(){
	location.href="logout.php";
}

function abrir(URL) {
 
  var width = 940;
  var height = 742;
 
var left = 200;
  var top = 110;
 
  window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
 
}
</script>
<link rel="stylesheet" href="abasForm/abas.css" />
<link rel="stylesheet" href="css/projeto.css" />
<script src="jquery/jquery-1.9.1.js"></script>
<script src="jquery/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<script>
  $(function() {
    $( "#tabs" ).tabs();
  });</script>
<title>.::Tela do Animal::.</title>
<style type="text/css" media="all">
@import url("css/projetoInterno.css");
</style>
<style type="text/css" media="all">
@import url("css/projeto.css");
</style>
</head>

<body >
<div style=" width:100%; height:150px; position:absolute; top:0;;" class="navbar-inner">
  <div id="principal"> <img style=" margin-bottom:20px; margin-right:100px; float:left" class="logoDentro" src="logoDentro.png" alt="logoDentro" />
    <div style="margin-left:-400px"> <br />
      <br />
      <br />
      <script language="JavaScript">

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
      <span style="font-family:Helvetica; color:white; margin-left:9px">Bem vindo Sr(a).<?php echo $dono;?></span> <br />
      <br />
      <input type="button" onclick="logout()" class="btn btn-navbar" value="Sair" style="margin-top:5px; margin-left:108px;margin-bottom:10px; width:100px" />
    </div>
    <div id="princial" >
      <?php
	
				

 		
		
		$sql=("SELECT u.nome,a.nomeAnimal,a.dataNasc,a.idade,c.data,a.especie,a.raca,a.sexo, u.idusuario, a.foto, p.idprontuario FROM animal a inner join usuario u on(u.idusuario=a.idusuario) inner join cadAnimal c on (u.idusuario=a.idusuario) inner join prontuario p on(p.idanimal = a.idanimal) WHERE a.idanimal = '$idanimal'");

		$res=mysql_query($sql)or die(mysql_error());
		$dados=mysql_fetch_row($res);
		
		$nomeDono=$dados[0];
		$nomeAnimal=$dados[1];
		$dataNascimento=$dados[2];
		$idade = $dados[3];
		$dataCad=$dados[4];
		$especie=$dados[5];
		$raca=$dados[6];
		$sexo=$dados[7];
		$idusuario =$dados[8];
		$foto = $dados[9];
		$idpront = $dados[10]; 
		?>
      <div style="margin:20px 0 20px 0; border:1px solid #F2F2F2; width:900px; height:50px;">
        <label style="float:left; padding:18px 0 0 5px;">Animal:</label>
        <input style="margin:12px 0 0 5px;height:20px; background:#FFF; width:300px; float:left"  type="text" value="<?php echo "$nomeAnimal";?>" readonly="true"/>
        <label style="float:left; padding:18px 0 0 5px;">DONO DO ANIMAL:</label>
        <input style="margin:12px 0 0 5px;height:20px; background:#FFF; width:50px"  type="text" value="<?php echo "$idusuario";?>" readonly="true"/>
        <input style="margin:12px 0 0 0;height:20px; background:#FFF; width:300px"  type="text" value="<?php echo "$nomeDono";?>" readonly="true"/>
      </div>
      <div id="tabs" style="width:895px">
        <ul>
          <li><a href="#tabs-1">CONSULTAS</a></li>
          <li><a href="#tabs-2">VACINAS</a></li>
          <li><a href="#tabs-3">PESOS</a></li>
          <li><a href="#tabs-4">RECEITAS</a></li>
        </ul>
        
        <!----------------------------------------------------------------- CONSULTAS ------------------------------------------------------------------------------------>
        <div id="tabs-1">
          <hr />
          <H1 style="text-align:center; font-family:Helvetica">Histórico de Consultas</H1>
          <hr />
          <div class="tabCons2" id="lista">
            <table class="table" style="background:white;">
              <thead>
                <tr style="background:#c6c6c6" >
                  <td class="coluna-Cons0" align="center">Data</td>
                  <td class="coluna-Cons1" align="center">Veterinário</td>
                  <td class="coluna-Cons2" align="center">Retorno</td>
                  <td class="coluna-Cons3" align="center">Visualizar</td>
                </tr>
              </thead>
            </table>
            <div class="scrollCons2"  style=" margin-top:-20px">
              <table class="table" style="background:white;">
                <tbody>
                  <?php 

					$seleciona = mysql_query (
					
					"SELECT c.data,u.nome,c.retorno, c.idconsulta, p.idprontuario from animal a inner join prontuario p on(p.idanimal = a.idanimal) inner join
					consulta c on(c.idpront = p.idprontuario) inner join medico m on(m.idmedico = c.idmed)
					inner join usuario u on(u.idusuario = m.idusuario) where a.idanimal = $idanimal");
                    
 
						while ($cons = mysql_fetch_array($seleciona)){
							                                                        
						
							$data = $cons[0];
							$veterinario = $cons[1];
							$retorno = $cons[2];
							$idconsulta = $cons[3];
							$idpront = $cons[4];
							
							
						
				    
        	?>
                  <tr align="center">
                    <td class="coluna-Cons0" align="center"><?php echo date("d/m/Y", strtotime( $data ));?></td>
                    <td class="coluna-Cons1" align="center"><?php echo $veterinario;?></td>
                    <td class="coluna-Cons2" align="center"><?php echo date("d/m/Y", strtotime( $retorno));?></td>
                    <td class="coluna-Cons3" align="center"><a style="font-weight: bold;" class="btn btn-warning" href="visualizarPront.php?id=<?php echo $idconsulta;?>" target="_blank" 
        onclick="window.open(this.href, this.target, 'width=800,height=980'); return false;">Visualizar</a></td>
                  </tr>
                  <?php
			}
		    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!---------------------------------------------------------FIM DA TAB1----------------------------------------------------> 
        
        <!----------------------------------------------------------------- VACINAS ------------------------------------------------------------------------------------>
        
        <div id="tabs-2" >
          <hr />
          <H1 style="text-align:center">Histórico de Vacinas</H1>
          <hr />
          <div class="tabVac2" id="lista">
            <table class="table" style="background:white;">
              <thead>
                <tr style="background:#c6c6c6" >
                  <td class="coluna-Vac0" align="center">Data</td>
                  <td class="coluna-Vac1" align="center">Vacinas/Vermífogos</td>
                  <td class="coluna-Vac2" align="center">Revac/Dose</td>
                  <td class="coluna-Vac3" align="center">Veterinário</td>
                </tr>
              </thead>
            </table>
            <div class="scrollVac2" style="margin-top:-20px">
              <table class="table" style="background:white;">
                <tbody>
                  <?php 

					$seleciona = mysql_query (
					
					"SELECT v.data,v.vacina,us.nome,v.revacina,v.idvacina FROM vacina v inner join medico m on (m.idmedico = v.idmedico) inner join usuario us on(us.idusuario = m.idusuario) where v.idpront = '$idpront'" );
                    
 
						while ($vet = mysql_fetch_array($seleciona)){
							                                                        
						
							$data = $vet[0];
							$vacina = $vet[1];
							$med = $vet[2];
							$revacina = $vet[3];
							$idvacina = $vet[4];
							
						
				    
        	?>
                  <tr align="center">
                    <td align="center" class="coluna-Vac0" ><?php echo date("d/m/Y", strtotime( $data ));?></td>
                    <td align="center" class="coluna-Vac1"><?php echo $vacina;?></td>
                    <td align="center" class="coluna-Vac2"><?php echo date("d/m/Y", strtotime( $revacina ));?></td>
                    <td align="center" class="coluna-Vac3"><?php echo $med;?></td>
                  </tr>
                  <?php
			}
		    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!---------------------------------------------------------FIM DA TAB2----------------------------------------------------> 
        <!----------------------------------------------------------------- PRONTUARIO/ATENDIMENTO ------------------------------------------------------------------------------------>
        <div id="tabs-3">
          <hr />
          <H1 style="text-align:center">Histórico de Peso</H1>
          <hr />
          <div class="tabVac2" id="lista">
            <table class="table" style="background:white;">
              <thead>
                <tr style="background:#c6c6c6;" align="center"  >
                  <td class="coluna-Vac0" align="center">Data</td>
                  <td class="coluna-Vac1" align="center">Peso</td>
                </tr>
              </thead>
            </table>
            <div class="scrollVac2" style=" margin-top:-18px">
              <table class="table" styles="background:white;">
                <tbody>
                  <?php 

					$pes = mysql_query (
					
					"SELECT p.idpeso,p.data,p.peso,p.idpront FROM peso p inner join prontuario i on (p.idpront = i.idprontuario) where i.idprontuario = '$idpront' order by p.data" );
                    
 
						while ($p = mysql_fetch_array($pes)){
							                                                        
						
							$idpeso = $p[0];
							$data = $p[1];
							$peso = $p[2];
							$pront = $p[3];
						
							
						
				    
        	?>
                  <tr align="center" style="background:white">
                    <td class="coluna-Vac0" align="center"><?php echo date("d/m/Y", strtotime( $data ));?></td>
                    <td class="coluna-Vac1" align="center"><?php echo $peso;?></td>
                  </tr>
                  <?php
			}
		    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!---------------------------------------------------------FIM DA TAB3----------------------------------------------------> 
        
        <!----------------------------------------------------------------- RECEITA ------------------------------------------------------------------------------------>
        <div id="tabs-4">
          <hr />
          <H1 style="text-align:center">Histórico de Receitas</H1>
          <hr />
          <div class="tabContainer" id="lista">
            <table class="table" style="background:white;">
              <thead>
                <tr style="background:#c6c6c6;" >
                  <th class="tabela-coluna0" align="center">Data</th>
                  <th class="tabela-coluna1" align="center">Animal</th>
                  <th class="tabela-coluna2" align="center">Dono</th>
                  <th class="tabela-coluna3" align="center">Médico</th>
                  <th class="tabela-coluna5" align="center">Visualizar</th>
                </tr>
              </thead>
            </table>
            <div class="scrollContainer" style="padding-top:-20px; margin-top:-18px">
              <table class="table" style="background:white;">
                <tbody>
                  <div style="overflow:auto;">
                
                <?php 

					$rec = mysql_query (
					
					"SELECT r.data,a.nomeAnimal, u.nome,(select u.nome from usuario u
					inner join medico m on(m.idusuario = u.idusuario) inner join animal a on(a.idmed = m.idmedico) inner join prontuario p on(p.idanimal = a.idanimal)where
					p.idprontuario=$idpront) as medico, r.idreceita FROM animal a inner join usuario u on(u.idusuario = a.idusuario) inner join prontuario p on(p.idanimal = a.idanimal) inner join  receita r  on(r.idpront=p.idprontuario)where p.idprontuario ='$idpront' order by r.data desc " );
                    
 
						while ($receita = mysql_fetch_array($rec)){
							                                                        
						
							$data = $receita[0];
							$animal = $receita[1];
							$dono = $receita[2];
							$nomeMed = $receita[3];
							$idreceita = $receita[4];
					
							
						
				    
        	?>
                <tr align="center" style="padding-top:-20px">
                  <td class="tabela-coluna0"  align="center"><?php echo date("d/m/Y", strtotime( $data ));?></td>
                  <td class="tabela-coluna1" align="center"><?php echo $animal;?></td>
                  <td class="tabela-coluna2" align="center"><?php echo $dono;?></td>
                  <td class="tabela-coluna3" align="center"><?php echo $nomeMed;?></td>
                  <td  class="tabela-coluna5" align="center"><a style="font-weight: bold;" class="btn btn-warning" href="visualizarReceita.php?id=<?php echo $idreceita;?>" target="_blank" 
        onclick="window.open(this.href, this.target, 'width=800,height=800'); return false;">Visualizar</a></td>
                </tr>
                <?php
			}
		    ?>
                  </tbody>
                
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>