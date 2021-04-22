let usuario=document.getElementById('usuario');
let password = document.getElementById('password');


let errorUsuario=document.getElementById('mError-usuario');

let errorPassword=document.getElementById('mError-password');


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