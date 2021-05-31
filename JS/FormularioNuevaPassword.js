let password = document.getElementById('password');
let repetirPassword = document.getElementById('repeatPassword');
let formulario= document.getElementById('FormularioNuevaPassword');

let errorPassword=document.getElementById('mError-password');
let errorRepetirContraseña=document.getElementById('mError-repeatPassword');

//PATRONES
const patrones={
 
    patronPassword : /^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@,$,€,¿,?,¡,*,#,&]).*$/,


}

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
    var cambio = document.getElementById("password");
    if(cambio.type == "password"){
        cambio.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        cambio.type = "password";
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
    var cambioR = document.getElementById("repeatPassword");
    if(cambioR.type == "password"){
        cambioR.type = "text";
        $('.iconR').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        cambioR.type = "password";
            $('.iconR').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    } 

    $(document).ready(function () {
    //CheckBox mostrar contraseña
    $('#showRepeatPassword').click(function () {
    $('#repeatPassword').attr('type', $(this).is(':checked') ? 'text' : 'password');
});
});
formulario.addEventListener("submit", (e) => {

    if(validarPassword() && validarRepeatPassword() ){

    }else{
        e.preventDefault();
    }
});