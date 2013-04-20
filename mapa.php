<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Mapas</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <script>


function voltar(){
	location.href="index.php";
}
</script>
 
<title>.::Cadastro::.</title>
<style type="text/css" media="all">@import url("css/projetoInterno.css");</style>
<style type="text/css" media="all">@import url("css/projeto.css");</style>

</head>

<body >
<div style=" width:100%; height:150px; position:absolute; top:0;"class="navbar-inner">
   <div id="principal">
   <img style="margin-top:-60px; margin-bottom:20px" class="logoDentro" src="logoDentro.png" alt="logoDentro" />
       <input type="button" onclick="voltar()" class="btn btn-navbar" value="Voltar" style="width:100px;margin-left:200px; float:left" />

 					 <div style="margin:100px 0 0 0;width:800px; height:420px;" >
  
  
  <iframe style="width:820px;height:450px; margin-left:80px;border:#c6c6c6 solid 2px;
			border-top-left-radius: 10px 10px; 
			border-top-right-radius:  10px 10px; 
			border-bottom-right-radius:  10px 10px; 
			border-bottom-left-radius: 10px 10px;background:#f9fedd; padding-bottom:10px;" frameborder="0" scrolling="no" src="mapa/phpsqlajax_map.htm">
  </iframe>
    				</div>
                    
<div style="margin-top:170px">
<p style="margin-left:300px;padding-right:15px; float:left"><img src="images/pet.png" title="petshp" />Petshop</p>
<p style="padding-top:5px;padding-right:10px; float:left"><img src="images/doc.png" title="clínica" />Clínicas</p>
<p style="padding-top:5px; margin-left:3px"><img src="images/pd.png" title="petshp" />Clínicas e Petshops</p></div>
	</div>


        
  
</body>
</html>