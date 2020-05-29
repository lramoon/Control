$(document).ready(function(){
	//variables globales
	var searchBoxes = $(".text");
    var inputCedula = $("#cedula");
    var reqCedula = $("#req-cedula");

	//funciones de validacion
    function validateCedula(){
		
		//NO tiene minimo de 5 caracteres o mas de 12 caracteres
		if(inputCedula.val().length < 9){
			reqCedula.addClass("error");
			inputCedula.addClass("error");
			return false;
        }
        
        //SI longitud pero NO solo caracteres A-z
		else if(!inputCedula.val().match(/^([VE]-)\d{4,9}$/i)){
			reqCedula.addClass("error");
			inputCedula.addClass("error");
			return false;
        }
        
		// SI rellenado, SI email valido
		else{
			reqCedula.removeClass("error");
			inputCedula.removeClass("error");
			return true;
		}
		
	}
    
    
	//controlamos la validacion en los distintos eventos
	// Perdida de foco
    inputCedula.blur(validateCedula);
	
	// Pulsacion de tecla
    inputCedula.keyup(validateCedula);
	
	
	// Envio de formulario
	$("#Formulario").submit(function(){
		if(validateCedula())
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