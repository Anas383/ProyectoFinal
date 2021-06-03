// DECLARACION DE VARIABLES
let usuario=document.getElementById('usuario');
let password = document.getElementById('password');

// MENSAJES DE ERROR
let errorUsuario=document.getElementById('mError-usuario');
let errorPassword=document.getElementById('mError-password');

//PATRONES
const patrones={
    patronUsuario : /^[a-zA-z0-9ü][a-z0-9ü_]{3,9}$/,    
    patronPassword : /^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@,$,€,¿,?,¡,*,#,&]).*$/,
}


//EVENTOS
usuario.addEventListener("keyup", validarUsuario);
usuario.addEventListener("blur", validarUsuario);
password.addEventListener("keyup", validarPassword);
password.addEventListener("blur", validarPassword);


//FUNCION VALIDAR USUARIO
function validarUsuario() {
    if (patrones.patronUsuario.test(usuario.value)) {
        console.log("correcto");
        usuario.className = "form-control is-valid";
        errorUsuario.classList.remove('mensajeError-activo');
        errorUsuario.classList.add('mensajeError-oculto');
        
        return true;
   
        
    }else{

        console.log("incorrecto");
        usuario.className = "form-control is-invalid";
        errorUsuario.classList.remove('mensajeError-oculto');
        errorUsuario.classList.add('mensajeError-activo');

        return false;

    }

}


//FUNCION VALIDAR PASSWORD
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