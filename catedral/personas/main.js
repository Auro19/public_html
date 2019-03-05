$(document).ready(function(){  


    //variables globales  
    var searchBoxes = $(".text");  
    var inputNombreBenef1 = $("#nombreBenef1");  
    var reqNombreBenef1 = $("#req-nombreBenef1");  
    /*var inputPassword1 = $("#password1");  
    var reqPassword1 = $("#req-password1");  
    var inputPassword2 = $("#password2");  
    var reqPassword2 = $("#req-password2");  
    var inputEmail = $("#email");  
    var reqEmail = $("#req-email");  */
	
	
	//funciones de validacion  
function validateNombreBenef1(){  
    //NO cumple longitud minima  
    if(inputNombreBenef1.val().length < 70){  
        reqNombreBenef1.addClass("error");  
        inputNombreBenef1.addClass("error");  
        return false;  
    }  
    //SI longitud pero NO solo caracteres A-z  
    else if(!inputNombreBenef1.val().match(/^[a-zA-Z]+$/)){  
        reqNombreBenef1.addClass("error");  
        inputNombreBenef1.addClass("error");  
        return false;  
    }  
    // SI longitud, SI caracteres A-z  
    else{  
        reqNombreBenef1.removeClass("error");  
        inputNombreBenef1.removeClass("error");  
        return true;  
    }  
	
	
	//controlamos la validacion en los distintos eventos  
// Perdida de foco  
inputNombreBenef1.blur(validateNombreBenef1);  
//inputEmail.blur(validateEmail);  
//inputPassword1.blur(validatePassword1);  
//inputPassword2.blur(validatePassword2);    
  
// Pulsacion de tecla  
inputNombreBenef1.keyup(validateNombreBenef1);  
//inputPassword1.keyup(validatePassword1);  
//inputPassword2.keyup(validatePassword2);  
  
// Envio de formulario  
$("#form1").submit(function(){  
    if(validateUsername() /*& validatePassword1() & validatePassword2() & validateEmail()*/)  
        return true;  
    else  
        return false;  
}); 
)}; 