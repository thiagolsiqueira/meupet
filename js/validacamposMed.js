function validaCamposMed(){
	
	var nomeVet = document.getElementById('nomeVet');
	var senha = document.getElementById('senha');
	var confirmaSenha = document.getElementById('confirmaSenha');
	var ufCRMV=document.getElementById('ufCRMV');
	var email = document.getElementById('email');
	var crmv = document.getElementById('crmv');

	if(nomeVet.value==null || nomeVet.value==""){
	alert('Nome do veterin�rio � obrigat�rio!');
		nomeVet.focus();
		return false;}
	if(crmv.value==null || crmv.value==""){
	alert('N�mero do CRMV � obrigat�rio!');
		crmv.focus();
		return false;
		}
	
	if(ufCRMV.value==null  || ufCRMV.value=="" ){
		alert('UF do CRMV do veterin�rio � obrigat�rio');
		ufCRMV.focus(); 
		return false;
		}
	if(email.value==null  || email.value=="" || email.value.indexOf('@')==-1){
		alert('Campo email est� em branco ou n�o � um email v�lido');
		email.focus(); 
		return false;
		}
	
		
		if(senha.value==null || senha.value=="" && confirmaSenha.value==null || confirmaSenha.value=="" || senha.value.length < 6){
		alert('Campo senha � obrigat�rio e deve acima de 6 caracteres');;
		senha.focus();
		return false;}
		if(senha.value!=confirmaSenha.value){
			alert('As senhas n�o conferem!'); senha.focus();return false;}
				if(foto.value==null || foto.value==""){
			alert('voc� deve inserir uma foto!'); foto.focus();return false;}
	return true;
}