$(document).ready(function(){

	//variables globales
	var searchBoxes = $(".text");
	var inputNombre = $("#Nombre");
	var reqUserNombre = $("#req-Nombre");
	var inputApellido = $("#Apellido");
	var reqApellido = $("#req-Apellido");
	var inputCargo = $("#Cargo");
    var reqCargo = $("#req-Cargo");
    var inputCelular = $("#Celular");
    var reqCelular = $("#req-Celular");
    var inputCedula = $("#Cedula");
	var reqCedula = $("#req-Cedula");
	var inputFechaIngreso = $("#FechaIngreso");
	var reqFechaIngreso = $("#req-FechaIngreso");

	//funciones de validacion
	function validateNombre(){
		//NO cumple longitud minima
		if(inputNombre.val().length < 4){
			reqUserNombre.addClass("error");
			inputNombre.addClass("error");
			return false;
		}
		//SI longitud pero NO solo caracteres A-z
		else if(!inputNombre.val().match(/^[a-zA-Z]+$/)){
			reqUserNombre.addClass("error");
			inputNombre.addClass("error");
			return false;
		}
		// SI longitud, SI caracteres A-z
		else{
			reqUserNombre.removeClass("error");
			inputNombre.removeClass("error");
			return true;
		}
    }

	//funciones de Apellido
	function validateApellido(){
			//NO cumple longitud minima
			if(inputApellido.val().length < 4){
				reqApellido.addClass("error");
				inputApellido.addClass("error");
				return false;
			}
			//SI longitud pero NO solo caracteres A-z
			else if(!inputApellido.val().match(/^[a-zA-Z]+$/)){
				reqApellido.addClass("error");
				inputApellido.addClass("error");
				return false;
			}
			// SI longitud, SI caracteres A-z
			else{
				reqApellido.removeClass("error");
				inputApellido.removeClass("error");
				return true;
			}
		}

	//funciones de Cargo
	function validateCargo(){
		//NO cumple longitud minima
		if(inputCargo.val().length < 4){
			reqCargo.addClass("error");
			inputCargo.addClass("error");
			return false;
		}
		//SI longitud pero NO solo caracteres A-z
		else if(!inputCargo.val().match(/^[a-zA-Z]+$/)){
			reqCargo.addClass("error");
			inputCargo.addClass("error");
			return false;
		}
		// SI longitud, SI caracteres A-z
		else{
			reqCargo.removeClass("error");
			inputCargo.removeClass("error");
			return true;
		}
    }

    //Funcion Celular
    function validateCelular(){
		//NO tiene minimo de 5 caracteres o mas de 12 caracteres
		if(inputCelular.val().length < 11){
			reqCelular.addClass("error");
			inputCelular.addClass("error");
			return false;
        }
        
        //SI longitud pero NO solo caracteres A-z
		else if(!inputCelular.val().match(/^[0-9]{11}$/)){
			reqCelular.addClass("error");
			inputCelular.addClass("error");
			return false;
        }
        
		// SI longitud, Solo valido numeros 
		else if(isNaN(inputCelular.val())){
			reqCelular.addClass("error");
			inputCelular.addClass("error");
			return false;
        }
        
		// SI rellenado, SI email valido
		else{
			reqCelular.removeClass("error");
			inputCelular.removeClass("error");
			return true;
		}
	}

    //Funcion Cedula
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

	//Funcion FechaIngreso
	function validateFecha(){
	//Si no hay nada
	if(inputFechaIngreso.val()==""){
	reqFechaIngreso.addClass("error");
	inputFechaIngreso.addClass("error");
	return false;
	}
	// SI rellenado, SI email valido
	else{
		reqFechaIngreso.removeClass("error");
		inputFechaIngreso.removeClass("error");
		return true;
	}
	}
    
	//controlamos la validacion en los distintos eventos
	// Perdida de foco
	inputNombre.blur(validateNombre);
    inputCedula.blur(validateCedula);
    inputCelular.blur(validateCelular);
	inputApellido.blur(validateApellido);  
	inputCargo.blur(validateCargo);  
	inputFechaIngreso.blur(validateFecha);
	
	// Pulsacion de tecla
    inputNombre.keyup(validateNombre);
    inputCelular.keyup(validateCelular);
	inputApellido.keyup(validateApellido);
	inputCargo.keyup(validateCargo);
	
	
	// Envio de formulario
	$("#Formulario").submit(function(){
		if(validateNombre() &  validateApellido() & validateCedula()  & validateCargo() & validateCelular() & validateFecha())
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
   
   