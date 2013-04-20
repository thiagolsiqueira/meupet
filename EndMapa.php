<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script>



function validaCampos(){
	
	
	var nome = document.getElementById('nome');
	var site = document.getElementById('site');
	var telefone = document.getElementById('telefone');
	var address=document.getElementById('address');
	var lat=document.getElementById('lat');
	var lng = document.getElementById('lng');
	var type = document.getElementById('type');
	
	if(nome.value == null || nomevalue == ""){
		alert('Nome do Peshop ou Clínica é obrigatório!');
		nome.focus();
		return false;
	}   
	if(site.value==null || site.value==""){
	alert('Site é obritatório!');
		site.focus();
		return false;}
	
	if(telefone.value==null  || telefone.value=="" ){
		alert('Telefone é obritatório');
		telefone.focus(); 
		return false;}
	if(address.value==null  || address.value=="" ){
		alert('Endereço é obritatório');
		address.focus(); 
		return false;}
	if(lat.value==null  || lat.value=="" ){
		alert('Campo latitude é obrigatório!');
		lat.focus(); 
		return false;}
	if(lng.value==null || lng.value==""){
		alert('Campo longitude é obritatório');
		lng.focus();
		return false;}
	if(type.value==null || type.value==""){
			alert('As senhas não conferem!'); senha.focus();return false;}
				if(foto.value==null || foto.value==""){
			alert('você deve inserir uma foto!'); foto.focus();return false;}
	return true;
}


</script>
<title>.::Cadastro::.</title>
<style type="text/css" media="all">
@import url("css/projetoInterno.css");
</style>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="overflow:hidden">
<div style="width:800px">
  <h1  style="margin:10px 0 0 30px; font-family:verdana;color:#000">Cadastrar Petshop ou Clínica no Mapa</h1>
  <form action="cadEndMap.php" method="post" onsubmit="return validaCampos()" enctype="multipart/form-data">
    <br />
    <hr/>
    <br />
    <div style="width:390px;height:300px;display:block; float:left">
    
    <label>Nome do Pet/Clínica: </label>
    <input style="width:370px" type="text" id="nome" name="nome" size="60"/>
    
    <label>Site: </label>
    <input style="width:370px" type="text" id="site" name="site" size="40" />
    
        
    <label>Latitude:</label>
    <input style="width:170px; float:left" type="text" name="lat" id="lat" size="30">
    <label style="margin:-25px 0 5px 200px">Longitude:</label>
    <input style="width:170px; margin:0 0 0 20px"  type="text" name="lng" id="lng" size="20">


   
    </div>
    <br />
    <br />
    <div style="width:390px; height:300px;display:block; margin:-35px 0 0 410px ">
    <label>Endereço:</label>
    <input style="width:370px" type="text" name="address" id="address" size="30">
    <label> Telefone: </label>
    <input style="width:170px; float:left" type="text" name="telefone" id="telefone"/>
    <label style="margin:-20px 0 0 192px">Tipo:</label>
    <select style="width:190px; margin:0 0 0 10px" name="type" id="type">
      <option value="Selecione"> Selecione o tipo </option>
      <option value="petshop"> Petshop </option>
      <option value="clinica"> Clínica </option>
      <option value="pd"> Pet/Clínica </option>
    </select>
        <br />
    <br />
   
    <input style="margin:12px 0 0 0" class="btn btn-navbar"   type="reset"  value="Limpar"/>
    <input style="margin:12px 0 0 0" class="btn btn-navbar"  type="submit" value="Cadastrar">
    </div>
    

    <br />
  </form>
  <iframe src="mapa/pegarCord/pegCord.php" scrolling="no" width="800px" height="450px" style="margin:-150px 0 0 0" ></iframe>
</div>
</body>
</html>