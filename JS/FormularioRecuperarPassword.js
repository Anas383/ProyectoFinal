//DECLARACION DE VARIABLES
let usuario=document.getElementById('usuario');
let email = document.getElementById("email");
let dni = document.getElementById("dni");
let formulario= document.getElementById('FormularioRecuperarPassword');

//MENSAJES DE ERROR
let errorUsuario=document.getElementById('mError-usuario');
let errorEmail=document.getElementById('mError-email');
let errorDNI=document.getElementById('mError-dni');


//PATRONES
const patrones={
    patronUsuario : /^.{3,15}$/,    
    patronEmail : /\S{1,}@\S{2,}\.\S{2,}/i,
    patronDNI : /\d\d\d\d\d\d\d\d+(T|R|W|A|G|M|Y|F|P|D|X|B|N|J|Z|S|Q|V|H|L|C|K|E){1}/i

}
//EVENTOS
usuario.addEventListener("keyup", validarUsuario);
usuario.addEventListener("blur", validarUsuario);
email.addEventListener("keyup", validarEmail);
email.addEventListener("blur", validarEmail);
dni.addEventListener("keyup", validarDNi);



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


// FUNCION VALIDAR EMAIL
function validarEmail() {
    if (patrones.patronEmail.test(email.value)) {

        console.log("correcto");
        //PARA ACTIVAR EL MENSAJE DE ERROR CORRECTO Y DESACTIVAR EL INCORRECTO
        email.className = "form-control is-valid";
        errorEmail.classList.remove('mensajeError-activo');
        errorEmail.classList.add('mensajeError-oculto');
        return true;
    }else{
        console.log("incorrecto");
        email.className = "form-control is-invalid";
        errorEmail.classList.remove('mensajeError-oculto');
        errorEmail.classList.add('mensajeError-activo');
        return false;  
    }

}


//FUNCION VALIDAR DNI

function validarDNi() {
    if (patrones.patronDNI.test(dni.value) && validarLetraDNI()) {

        
        //PARA ACTIVAR EL MENSAJE DE ERROR CORRECTO Y DESACTIVAR EL INCORRECTO
        dni.className = "form-control is-valid";
        errorDNI.classList.remove('mensajeError-activo');
        errorDNI.classList.add('mensajeError-oculto');


        //FUNCION PARA PONER LA LETRA EN MAYUSCULA
        dni.value = dni.value.toUpperCase();

        return true;

    }else {

        //PARA ACTIVAR EL MENSAJE DE ERROR INCORRECTO Y DESACTIVAR EL CORRECTO
        dni.className = "form-control is-invalid";
       errorDNI.classList.remove('mensajeError-oculto');
       errorDNI.classList.add('mensajeError-activo');


        //FUNCION PARA PONER LA LETRA EN MAYUSCULA
        dni.value = dni.value.toUpperCase();

        return false;
    }


}

function validarLetraDNI() {
    let resultado = false;
    // RECOGEMOS EL NUMERO
    let numero = dni.value.substring(0, 8);
    // HACEMOS EL MODULO DE ESE NUMERO
    numero = numero % 23;
    // ARRAY QUE CONTIENE TODAS LAS LETRAS
    const arrayLetras = ["T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E"];
    //INTRODUCIMOS EL NUMERO COMO POSICION DEL ARRAY LO COMPARAMOS CON LA LETRA DEL DNI PROPORCIONADA POR EL USUARIO
    if (arrayLetras[numero] == dni.value.substring(8,).toUpperCase()) {
        resultado = true;
    } else {
        resultado = false;
    }
    return resultado;
}

// EVENTO PARA NO DEJAR ENVIAR EL FORMULARIO SIN UN CAMPO ESTA FALSE
formulario.addEventListener("submit", (e) => {

    if(validarUsuario()  && validarDNi() && validarEmail()){

    }else{
        e.preventDefault();
    }
});