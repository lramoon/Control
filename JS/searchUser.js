$(document).ready(function(){
	//variables globales
	var searchBoxes = $(".text");
    var inputUsername = $("#user");
    var reqUsername = $("#req-user");

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
    
    
	//controlamos la validacion en los distintos eventos
	// Perdida de foco
    inputUsername.blur(validateUsername);
	
	// Pulsacion de tecla
    inputUsername.keyup(validateUsername);
	
	
	// Envio de formulario
	$("#Formulario").submit(function(){
		if(validateUsername())
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