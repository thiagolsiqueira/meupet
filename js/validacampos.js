
function validaCampos(){
	
	var nomeProp = document.getElementById('nomeProp');
	var senha = document.getElementById('senha');
	var confirmaSenha = document.getElementById('confirmaSenha');
	var nomeProp=document.getElementById('nomeProp');
	var idade = document.getElementById('idade');
	var dataNasc = document.getElementById('dataNasc');
	
	var raca = document.getElementById('raca');
	var email = document.getElementById('email');
	var foto = document.getElementById('foto');
	var nome = document.getElementById('nome');
	var login = document.getElementById('login2');

	if(nomeProp.value==null || nomeProp.value==""){
	alert('Nome do propriétario é obrigatório!');
		nomeProp.focus();
		return false;}
		
		
		
		if(email.value==null  || email.value=="" || email.value.indexOf('@')==-1){
		alert('Campo email está em branco ou não é um email válido');
		raca.focus(); 
		return false;
		}
		
		
			if(nome.value==null || nome.value==""){
	alert('Nome do Animal é obrigatório!');
		nome.focus();
		return false;
		}
		
		
				if(dataNasc.value==null || dataNasc.value==""){
	alert('Campo data de nascimento é obrigatório!');
		dataNasc.focus();
		return false;}
		
		
		if(raca.value==null  || raca.value=="" ){
		alert('Campo raça é obrigatório');
		raca.focus(); 
		return false;
		}
		
		if(idade.value==null || idade.value==""){
	alert('Campo idade faltando preencher!');
		idade.focus();
		return false;}
				
if(foto.value==null || foto.value==""){
			alert('você deve inserir uma foto!'); foto.focus();return false;}
		
		if(login.value==null || login.value==""){
	alert('Login inválido ou em branco');
		login.focus();
		return false;}

	
		
		if(senha.value==null || senha.value=="" && confirmaSenha.value==null || confirmaSenha.value=="" || senha.value.length < 6){
		alert('Campo senha é obrigatório e deve acima de 6 caracteres');;
		senha.focus();
		return false;}
		if(senha.value!=confirmaSenha.value){
			alert('As senhas não conferem!'); senha.focus();return false;}
				
				
				
	return true;}
	