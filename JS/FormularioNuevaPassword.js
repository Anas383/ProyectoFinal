
// DECLARACION DE VARIABLES
let password = document.getElementById('password');
let repetirPassword = document.getElementById('repeatPassword');
let formulario= document.getElementById('FormularioNuevaPassword');
// MENSAJES DE ERROR
let errorPassword=document.getElementById('mError-password');
let errorRepetirContraseña=document.getElementById('mError-repeatPassword');

//PATRONES
const patrones={
 
    patronPassword : /^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@,$,€,¿,?,¡,*,#,&]).*$/,


}

// EVENTOS
password.addEventListener("keyup", validarPassword);
password.addEventListener("blur", validarPassword);
repetirPassword.addEventListener("keyup", validarRepeatPassword);
repetirPassword.addEventListener("blur", validarRepeatPassword);



//FUNCION VALIDAR PASSWORD
function validarPassword() {
    if (patrones.patronPassword.test(password.value)) {

        console.log("correcto");
        //PARA ACTIVAR EL MENSAJE DE ERROR CORRECTO Y DESACTIVAR EL INCORRECTO
        password.className = "form-control is-valid";
        errorPassword.classList.remove('mensajeError-activo');
        errorPassword.classList.add('mensajeError-oculto');
        return true;

    }else{
        console.log("incorrecto");
        password.className = "form-control is-invalid";
        errorPassword.classList.remove('mensajeError-oculto');
        errorPassword.classList.add('mensajeError-activo');
        return false;  
    }

}


//FUNCION VALIDAR REPEAT PASSWORD
function validarRepeatPassword() {
    if (repetirPassword.value==password.value) {

        console.log("correcto");
        //PARA ACTIVAR EL MENSAJE DE ERROR CORRECTO Y DESACTIVAR EL INCORRECTO
        repetirPassword.className = "form-control is-valid";
        errorRepetirContraseña.classList.remove('mensajeError-activo');
        errorRepetirContraseña.classList.add('mensajeError-oculto');
        return true;


    }else{
        console.log("incorrecto");
        repetirPassword.className = "form-control is-invalid";
        errorRepetirContraseña.classList.remove('mensajeError-oculto');
        errorRepetirContraseña.classList.add('mensajeError-activo');
        return false;  
    }

}



function mostrarPassword(){
    // RECOGEMOS EL CAMPO PASSWORD
    let cambio = document.getElementById("password");
    // SI LA CONTRASEÑA ESTA EN TIPO PASSWORD SE CAMBIA A TEXTO
    if(cambio.type == "password"){
        cambio.type = "text";
        // SELECCIONAMOS ESE ICONO Y LO CAMBIAMOS 
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        // EN CASO CONTRARIO QUE EL TIPO PASE A PASSWORD
        cambio.type = "password";
         // SELECCIONAMOS ESE ICONO Y LO CAMBIAMOS 
            $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    } 

    $(document).ready(function () {
        //CheckBox mostrar contraseña
        $('#ShowPassword').click(function () {
        $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
    });
});

function mostrarRepeatPassword(){
     // RECOGEMOS EL CAMPO PASSWORD
    let cambioR = document.getElementById("repeatPassword");
    // SI LA CONTRASEÑA ESTA EN TIPO PASSWORD SE CAMBIA A TEXTO
    if(cambioR.type == "password"){
        cambioR.type = "text";
        // SELECCIONAMOS ESE ICONO Y LO CAMBIAMOS 
        $('.iconR').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        // EN CASO CONTRARIO QUE EL TIPO PASE A PASSWORD
        cambioR.type = "password";
        // SELECCIONAMOS ESE ICONO Y LO CAMBIAMOS 
            $('.iconR').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    } 

    $(document).ready(function () {
    //CheckBox mostrar contraseña
        $('#showRepeatPassword').click(function () {
        $('#repeatPassword').attr('type', $(this).is(':checked') ? 'text' : 'password');
    });
});