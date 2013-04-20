<?php
include "conexao.php";
include "verifica.php";

$login_usuario = $_SESSION["login_usuario"];

$sql = mysql_query("SELECT * FROM usuario u inner join medico m on(m.idusuario=u.idusuario) WHERE login = '$login_usuario'");
while($linha = mysql_fetch_array($sql)){
	$id			 		= $linha['idusuario'];
	
	$medico				= $linha['nome'];
	$crmv				= $linha['crmv'];
	$uf				    = $linha['ufCRMV'];
	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style type="text/css"></style>
  <script>
	function abrir(URL) {
 
  var width = 940;
  var height = 742;
 
var left = 200;
  var top = 110;
 
  window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
 
}

function logout(){
	location.href="logout.php";
}

function voltar(){
	location.href="telaMedico.php";
}
</script>

  <!-- POUP-UP  -->
  <script type="text/javascript" src="poup/jquery.min.js"></script>
  <script src="poup/poup.js"></script>

  <!-- CALENDÁRIO -->
  <link rel="stylesheet" href="calendario/jquery-ui.css" />
  <script src="calendario/jquery-1.8.3.js"></script>
  <script src="calendario/jquery-ui.js"></script>
  <script src="calendario/tradutor.js"></script>
  <title>.::Atendimento::.</title>
  <style type="text/css" media="all">
@import url("css/projetoInterno.css");
</style>
  <style type="text/css" media="all">
@import url("css/projeto.css");
</style>
  <link rel="stylesheet" href="abasForm/abas.css" />
  <link rel="stylesheet" href="css/projeto.css" />
  <script src="jquery/jquery-1.9.1.js"></script>
  <script src="jquery/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  
<!---------------------------------deletar vacina--------------------------------------->  
  function deletarVacina(id) {
	  
	 
     var resposta = confirm("Cuidado! Você quer mesmo excluir esta vacina?");
 
     if (resposta == true) {
          window.location.href = "delVacina.php?id="+id;
     }
}
  
  
  
  <!-----------------------------------deletar peso------------------------------------->
    function delPeso(id) {
	  
	 
     var resposta = confirm("Cuidado! Você quer mesmo excluir este peso?");
 
     if (resposta == true) {
          window.location.href = "delPeso.php?id="+id;
     }
}

  <!-----------------------------------deletar rceita------------------------------------->
 function delReceita(id) {
	  
	 
     var resposta = confirm("Cuidado! Você quer mesmo excluir esta receita?");
 
     if (resposta == true) {
          window.location.href = "delReceita.php?id="+id;
     }
}



</script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
  <script>
  $(function() {
    $( "#datepicker2" ).datepicker();
  });
  </script>
  </head>

  <body onload="document.body.focus();">
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
    <span style="font-family:Helvetica; color:white; margin-left:9px">Bem vindo Dr.<?php echo $medico;?></span> <br />
    <br />
    <input type="button" onclick="voltar()" class="btn btn-navbar" value="Voltar" style="width:100px; float:left" />
    <input type="button" onclick="logout()" class="btn btn-navbar" value="Sair" style="margin-top:-40px; margin-left:108px;margin-bottom:10px; width:100px" />
  </div>
    <div id="princial" >
    <?php
	
				$idAnimal = $_GET['idAnimal'];	

 		
		
		$sql=("SELECT u.nome,a.nomeAnimal,a.dataNasc,a.idade,c.data,a.especie,a.raca,a.sexo, u.idusuario, a.foto, p.idprontuario FROM animal a inner join usuario u on(u.idusuario=a.idusuario) inner join cadAnimal c on (u.idusuario=a.idusuario) inner join prontuario p on(p.idanimal = a.idanimal) WHERE a.idanimal = '$idAnimal'");

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
        <li><a href="#tabs-1">DADOS PRINCIPAIS</a></li>
        <li><a href="#tabs-2">ACOMPANHAMENTO</a></li>
        <li><a href="#tabs-3">ATENDIMENTO</a></li>
        <li><a href="#tabs-4">RECEITA</a></li>
      </ul>
        
        <!----------------------------------------------------------------- DADOS PRINCIPAIS ------------------------------------------------------------------------------------>
        <div id="tabs-1">
        <div style="height:354px; width:200px; border:solid 1px #CCCCCC;; float:left; background:#F8F8F8;"> <img width="200px" height="150" src="fotos/<?php echo"$foto"; ?>" alt="fotos" /><br />
          </div>
        <div style="margin-left:206px;">
            <p>Dados do Animal</p>
          </div>
        <div style="background:#F8F8F8;height:125px; width:652px;margin-left:207px; border:solid 1px #CCCCCC; padding-top:10px; padding-left:5px">
            <label style="float:left; margin:5px 10px 0 0">Data Nasc: </label>
            <input type="text" id="datepicker" value="<?php echo date("d/m/Y", strtotime( $dataNascimento ));?>" readonly="true" style="width:90px; float:left; margin-right:5px"/>
            <label style="float:left; margin:5px 10px 0 0">Idade: </label>
            <input type="text" value="<?php echo $idade;?>" readonly="true" style="width:30px;float:left"/>
            <label style="float:left; margin:5px 10px 0 140px">Cadastro: </label>
            <input type="text" value="<?php echo date("d/m/Y", strtotime($dataCad));?>" readonly="true" style="width:90px"/>
            <label style="float:left; padding:5px 17px 0 0">Cadastro: </label>
            <input type="text" value="<?php echo $especie;?>" readonly="true" style="width:193px"/>
            <br />
            <label style=" padding:5px 47px 0 0; float:left">Raça: </label>
            <input type="text" value="<?php echo $raca;?>" readonly="true" style="width:193px;float:left"/>
            <label style="margin:5px 10px 0 140px; padding-right:30px; float:left">Sexo: </label>
            <input type="text" value="<?php echo $sexo;?>" readonly="true" style="width:90px"/>
          </div>
        <div style="margin-left:206px;margin-top:30px">
            <p>Dados do Atendimento</p>
          </div>
        <div style="height:60px;width:654px; margin-left:207px; border:solid 1px #CCCCCC;background:#F8F8F8;">
            <label style="margin:5px 0 5px 8px">Médico Veterinário: </label>
            <label style="margin:5px 0 0 8px;float:left; padding-top:4px; padding-right:4px">CRMV:</label>
            <input type="text" value="<?php echo $crmv;?>" readonly="true" style="width:50px;float:left"/>
            <input type="text" value="<?php echo $uf;?>" readonly="true" style="width:30px;float:left; margin-left:5px"/>
            <input type="text" value="<?php echo $medico;?>" readonly="true" style="width:420px;float:left; margin-left:10px"/>
          </div>
        <div style="height:40px;width:654px; margin-left:207px; margin-top:20px; padding-top:10px;border:solid 1px #CCCCCC;background:#F8F8F8;">
            <label style="margin:5px 347px 0 8px;float:left; padding-right:4px">DATA DA CONSULTA:</label>
            <input type="text" value="<?php echo date("d/m/Y");?>" readonly="true" style="width:90px;float:left"/>
          </div>
      </div>
        
        <!----------------------------------------------------------------- ACOMPANHAMENTO ------------------------------------------------------------------------------------>
        
        <div id="tabs-2" style="height:630px">
        <div>
            <div style="width:853px; height:20px; background:#C6C6C6; margin:0 0 10px 0; font-family:Helvetica; padding-left:5px;font-weight:bold">Vacinas e Vermífogos</div>
            <div class="tabVac" id="lista">
            <table class="table" style="background:white;">
                <thead>
                <tr style="background:#c6c6c6" >
                    <td class="coluna-Vac0" align="center">Data</td>
                    <td class="coluna-Vac1" align="center">Vacinas/Vermífogos</td>
                    <td class="coluna-Vac2" align="center">Revac/Dose</td>
                    <td class="coluna-Vac3" align="center">Veterinário</td>
                    <td class="coluna-Vac5" align="center">Alterar</td>
                  </tr>
              </thead>
              </table>
            <div class="scrollVac" style="margin-top:-20px">
                <table class="table" style="background:white;">
                <tbody>
                    <?php 

					$seleciona = mysql_query (
					
					"SELECT v.data,v.vacina,us.nome,v.revacina,v.idvacina FROM vacina v inner join medico m on (m.idmedico = v.idmedico) inner join usuario us on(us.idusuario = m.idusuario) where v.idpront = '$idpront' order by v.data desc" );
                    
 
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
                    <td  align="center" class="coluna-Vac5"><a style="font-weight: bold; overflow:none" class="btn btn-warning" href="upVacina.php?id=<?php echo $idvacina;?>" target="_blank" 
        onclick="window.open(this.href, this.target, 'width=500,height=390'); return false;">Alterar</a></td>
                  </tr>
                    <?php
			}
		    ?>
                  </tbody>
              </table>
              </div>
          </div>
            <div> <a style="font-weight: bold; margin:10px 0 0 5px" class="btn btn-navbar" href="vacina.php?id=<?php echo $idAnimal;?>" target="_blank" 
        onclick="window.open(this.href, this.target, 'width=550,height=370'); return false;">Novo</a> </div>
          </div>
        <hr />
        <!--------------------------------------------------------TABELA DE CONSULTAS REALIZADAS--------------------------------------------------------------------------->
        
        <div style="float:left;width:450px; margin-left:-15px;height:215px;">
            <div style="width:417px; height:20px; background:#C6C6C6; margin:0 0 10px 13px; font-family:Helvetica; padding-left:5px;font-weight:bold">Consultas Realizadas(histórico)</div>
            <div class="tabCons" id="lista">
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
            <div class="scrollCons"  style=" margin-top:-20px">
                <table class="table" style="background:white;">
                <tbody>
                    <?php 

					$seleciona = mysql_query (
					
					"SELECT c.data,user.nome,c.retorno,c.idconsulta from consulta c inner join medico m on(m.idmedico=c.idmed) inner join usuario user on(user.idusuario=m.idusuario) where c.idpront = '$idpront'");
                    
 
						while ($cons = mysql_fetch_array($seleciona)){
							                                                        
						
							$data = $cons[0];
							$veterinario = $cons[1];
							$retorno = $cons[2];
							$idconsulta = $cons[3];
							
							
						
				    
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
        
        <!-----------------------------------------------------------------------CADASTRO DE PESO---------------------------------------------------->
        <div style="float:left; margin-left:20px;width:360px; height:215px;">
            <div style="width:382px; height:20px; background:#C6C6C6; font-family:Helvetica;font-weight:bold; margin:0 0 10px 0; padding-left:5px">Peso</div>
            <div class="tabPeso" id="lista">
            <table class="table" style="background:white;">
                <thead>
                <tr style="background:#c6c6c6;" align="center"  >
                    <td class="coluna-peso0" align="center">Data</td>
                    <td class="coluna-peso1" align="center">Peso</td>
                    <td class="coluna-peso3" align="center">Alterar</td>
                  </tr>
              </thead>
              </table>
            <div class="scrollPeso" style=" margin-top:-18px">
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
                    <tr align="center">
                    <td class="coluna-peso0" align="center"><?php echo date("d/m/Y", strtotime( $data ));?></td>
                    <td class="coluna-peso1" align="center"><?php echo $peso;?></td>
                    <td  class="coluna-peso3" align="center"><a style="font-weight: bold;" class="btn btn-warning" href="upPeso.php?id=<?php echo $idpeso;?>" target="_blank" 
        onclick="window.open(this.href, this.target, 'width=400,height=220'); return false;">Alterar</a></td>
                  </tr>
                    <?php
			}
		    ?>
                  </tbody>
              </table>
              </div>
          </div>
            <div> <a style="font-weight: bold; margin-top:10px" class="btn btn-navbar" href="peso.php?id=<?php echo $idAnimal;?>" target="_blank" 
        onclick="window.open(this.href, this.target, 'width=400,height=300'); return false;">Novo</a> </div>
          </div>
        <!---------------------------------------------------------FIM DA TAB2----------------------------------------------------> 
      </div>
        <!---------------------------------------------------------FIM DA TAB2----------------------------------------------------> 
        <!----------------------------------------------------------------- PRONTUARIO/ATENDIMENTO ------------------------------------------------------------------------------------>
        <div id="tabs-3">
        <form  action="cadConsulta.php" method="post" onsubmit="return validaCamposMed()" enctype="multipart/form-data">
            <br />
            <h1>Atendimento</h1>
            <hr/>
            <br />
            <label style="padding-right:5px;padding-top:5px;">Queixa do paciente: </label>
            <textarea rows="3" cols="100" style="width:850px"  name="queixa" style="resize:none;">
            </textarea>
            <br />
            <br />
            <label style="padding-right:5px;padding-top:5px;">Sinais Clínicos: </label>
            <textarea rows="3" cols="100" style="width:850px"  name="sinaisclinicos" style="resize:none;">
            </textarea>
            <br />
            <br />
            <label style="padding-right:5px;padding-top:5px;">Prognóstico: </label>
            <textarea rows="3" cols="100" style="width:850px"  name="prognostico" style="resize:none;">
            </textarea>
            <br />
            <br />
            <label style="padding-right:5px;padding-top:5px;">Diagnóstico: </label>
            <textarea rows="3" cols="100" style="width:850px"  name="diagnostico" style="resize:none;">
            </textarea>
            <br />
            <br />
            <label style="padding-right:5px;padding-top:5px;">Exame Laboratorial: </label>
            <textarea rows="3" cols="100" style="width:850px"  name="examelab" style="resize:none;">
            </textarea>
            <br />
            <br />
            <label style="padding-right:5px;padding-top:5px;">Tratamento: </label>
            <textarea rows="3" cols="100" style="width:850px"  name="tratamento" style="resize:none;">
            </textarea>
            <br />
            <br />
            <br />
            <br />
            <div style="width:850px;height:35px; background:#f8f8f8;padding:6px 0 0 5px">
            <label style="float:left;padding-right:5px;padding-top:5px;">Retorno: </label>
            <input style="width:160px;padding:5px 0 0 0; margin-left:20px; height:25px; float:left" type="text" id="datepicker2" name="retorno"/>
            <div style="padding:3px 0 0 0"> <label style="float:left;margin:0 10px 0 10px; ">Enviar por email:</label><input style="padding-top:-4px" type="checkbox" name="enviar" value="1" class="checkbox"/></div>

         
          </div>
            <input type="text" style="display:none;" value=<?php echo $idAnimal;?> name="idAnimal" />
            <br />
            <br />
            <input style="margin-top:-12px;margin-left:684px"  class="btn btn-navbar"   type="reset"  value="Limpar"/>
            <input style="margin-top:-12px" class="btn btn-navbar"  type="submit" value="Cadastrar">
            <br />
          </form>
      </div>
        <!----------------------------------------------------------------- RECEITA ------------------------------------------------------------------------------------>
        <div id="tabs-4">
        <div>
            <div>
            <h1  style=" font-family:Helvetica;"> Receita</h1>
            <form  action="cadReceita.php" method="post"  enctype="multipart/form-data">
                <br />
                <hr/>
                <br />
                <label style="float:left;padding-right:5px;padding-top:5px;">Data: </label>
                <input style="width:160px;padding:5px 0 0 0; margin-left:60px; height:25px" type="text" readonly="true" value="<?php echo $dataAtual=date('d/m/Y');?>"  name="data"/>
                <br />
                <br />
                <label style="float:left;padding:5px 15px 0 0">Descrição: </label>
                <textarea rows="3" cols="100" style="width:850px; height:300px"  name="descricao"></textarea>
                <br />
                <br />
                <input type="text" style="display:none"  value="<?php echo $idpront;?>" name="idpront" />
                <input type="text" style="display:none"  value="<?php echo $idAnimal;?>" name="idAnimal" />
                <input style="margin-top:-12px;margin-left:682px"  class="btn btn-navbar"   type="reset"  value="Limpar"/>
                <input style="margin-top:-12px" class="btn btn-navbar"  type="submit" value="Cadastrar">
                <br />
              </form>
          </div>
            <div class="tabContainer" id="lista">
            <table class="table" style="background:white;">
                <thead>
                <tr style="background:#c6c6c6;" >
                    <th class="tabela-coluna0" align="center">Data</th>
                    <th class="tabela-coluna1" align="center">Animal</th>
                    <th class="tabela-coluna2" align="center">Dono</th>
                    <th class="tabela-coluna3" align="center">Médico</th>
                 <!--   <th class="tabela-coluna4" align="center">Deletar</th>-->
                    <th class="tabela-coluna5" align="center">Alterar</th>
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
					
					"SELECT r.data,a.nomeAnimal, u.nome, r.idreceita FROM animal a inner join usuario u on(u.idusuario = a.idusuario) inner join prontuario p on(p.idanimal = a.idanimal) inner join  receita r  on(r.idpront=p.idprontuario)where p.idprontuario ='$idpront' order by r.data asc " );
                    
 
						while ($receita = mysql_fetch_array($rec)){
							                                                        
						
							$data = $receita[0];
							$animal = $receita[1];
							$dono = $receita[2];
							$idreceita = $receita[3];
					
							
						
				    
        	?>
                <tr align="center" style="padding-top:-20px">
                    <td class="tabela-coluna0"  align="center"><?php echo date("d/m/Y", strtotime( $data ));?></td>
                    <td class="tabela-coluna1" align="center"><?php echo $animal;?></td>
                    <td class="tabela-coluna2" align="center"><?php echo $dono;?></td>
                    <td class="tabela-coluna3" align="center"><?php echo $medico;?></td>
                  <!--  <td  class="tabela-coluna4" align="center"><a class="btn btn-danger" onclick="delReceita('<?php echo $idreceita;?>')" href="javascript:func()" title="excluir">Excluir</a></td>-->
                    <td  class="tabela-coluna5" align="center"><a style="font-weight: bold;" class="btn btn-warning" href="upReceita.php?id=<?php echo $idreceita;?>" target="_blank" 
        onclick="window.open(this.href, this.target, 'width=590,height=465'); return false;">Alterar</a></td>
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