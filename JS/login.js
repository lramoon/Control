
$(document).ready(function(){
	//variables globales
	var searchBoxes = $(".text");
	var inputUsername = $("#user");
	var reqUsername = $("#req-user");
	var inputPassword1 = $("#password");
	var reqPassword1 = $("#req-password");
//---------------------------------------------------------------------PRUEBA-----------------------------
        //funciones de validacion
	function validateUsername(){
		//NO cumple longitud minima
		if(inputUsername.val().length < 4){
			reqUsername.addClass("error");
			inputUsername.addClass("error");
			return false;
		}
		//SI longitud pero NO solo caracteres A-z
		else if(!inputUsername.val().match(/^[a-zA-Z]+$/)){
			reqUsername.addClass("error");
			inputUsername.addClass("error");
			return false;
		}
		// SI longitud, SI caracteres A-z
		else{
			reqUsername.removeClass("error");
			inputUsername.removeClass("error");
			return true;
		}
	}
	function validatePassword1(){
		//NO tiene minimo de 5 caracteres o mas de 12 caracteres
		if(inputPassword1.val().length < 5 || inputPassword1.val().length > 12){
			reqPassword1.addClass("error");
			inputPassword1.addClass("error");
			return false;
		}
		// SI longitud, NO VALIDO numeros y letras
		else if(!inputPassword1.val().match(/^[0-9a-zA-Z]+$/)){
			reqPassword1.addClass("error");
			inputPassword1.addClass("error");
			return false;
		}
		// SI rellenado, SI email valido
		else{
			reqPassword1.removeClass("error");
			inputPassword1.removeClass("error");
			return true;
		}
    }
    
//controlamos la validacion en los distintos eventos
	// Perdida de foco
	inputUsername.blur(validateUsername);
	inputPassword1.blur(validatePassword1);  
	 
	
	// Pulsacion de tecla
	inputUsername.keyup(validateUsername);
	inputPassword1.keyup(validatePassword1);
	
	// Envio de formulario
	$("#Formulario").submit(function(){
		if(validateUsername() & validatePassword1())
			return true;
		else
			return false;
	});
	
	//controlamos el foco / perdida de foco para los input text
	searchBoxes.focus(function(){
		$(this).addClass("active");
	});
	searchBoxes.blur(function(){
		$(this).removeClass("active");  
	});

});