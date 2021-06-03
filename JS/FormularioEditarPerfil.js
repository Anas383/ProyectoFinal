//DECLARACION DE VARIABLES

let nombre=document.getElementById('nombre');
let apellido1=document.getElementById('primerApellido');
let apellido2=document.getElementById('segundoApellido');
let usuario=document.getElementById('usuario');
let email = document.getElementById("email");
let telefono=document.getElementById('telefono');
let dni = document.getElementById("dni");
let formularioEditarPerfil= document.getElementById('FormularioEditarPerfil');



//MENSAJES DE ERROR

let errorNombre=document.getElementById('mError-nombre');
let errorApellido1=document.getElementById('mError-apellido1');
let  errorApellido2=document.getElementById('mError-apellido2');
let errorUsuario=document.getElementById('mError-usuario');
let errorEmail=document.getElementById('mError-email');
let errorTelefono=document.getElementById('mError-telefono');
let errorDNI=document.getElementById('mError-dni');

//PATRONES
const patrones={
    patronNom:/^[A-Za-záéíóúáéíóúÁÉÍÓÚàèìòùÀÈÌÒÙ ]{1,10}$/,
    patronAp:/^[A-Za-záéíóúáéíóúÁÉÍÓÚàèìòùÀÈÌÒÙ ]{1,30}$/,
    patronUsuario : /^[a-zA-z0-9ü][a-z0-9ü_]{3,9}$/,    
    patronEmail : /\S{1,}@\S{2,}\.\S{2,}/i,
    patronTelefono:/(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}/,
    patronDNI : /\d\d\d\d\d\d\d\d+(T|R|W|A|G|M|Y|F|P|D|X|B|N|J|Z|S|Q|V|H|L|C|K|E){1}/i

}



//EVENTOS
usuario.addEventListener("keyup", validarUsuario);
usuario.addEventListener("blur", validarUsuario);
nombre.addEventListener("keyup", validarNombre);
nombre.addEventListener("blur", validarNombre);
apellido1.addEventListener("keyup", validarApellido1);
apellido1.addEventListener("blur", validarApellido1);
apellido2.addEventListener("keyup", validarApellido2);
apellido2.addEventListener("blur", validarApellido2);
email.addEventListener("keyup", validarEmail);
email.addEventListener("blur", validarEmail);
telefono.addEventListener("keyup", validarTelefono);
telefono.addEventListener("blur", validarTelefono);
dni.addEventListener("keyup", validarDNi);

//FUNCION VALIDAR NOMBRE
function validarNombre() {
    if (patrones.patronNom.test(nombre.value)) {

        console.log("correcto");
        //PARA ACTIVAR EL MENSAJE DE ERROR CORRECTO Y DESACTIVAR EL INCORRECTO
        nombre.className = "form-control is-valid";
        errorNombre.classList.remove('mensajeError-activo');
        errorNombre.classList.add('mensajeError-oculto');
        nombre.value = nombre.value[0].toUpperCase() + nombre.value.slice(1);   
        return true;

        //FUNCION PARA PONER LA PRIMERA LETRA EN MAYUSCULA
        nombre.value = nombre.value[0].toUpperCase() + nombre.value.slice(1);

        return true;


    }else{
        console.log("incorrecto");
        nombre.className = "form-control is-invalid";
        errorNombre.classList.remove('mensajeError-oculto');
        errorNombre.classList.add('mensajeError-activo');7

        return false; 
    }

}

//FUNCION VALIDAR APELLIDO1
function validarApellido1() {
    if (patrones.patronAp.test(apellido1.value)) {

        console.log("correcto");
        //PARA ACTIVAR EL MENSAJE DE ERROR CORRECTO Y DESACTIVAR EL INCORRECTO
        apellido1.className = "form-control is-valid";
        errorApellido1.classList.remove('mensajeError-activo');
        errorApellido1.classList.add('mensajeError-oculto');
        
        // //FUNCION PARA PONER LA PRIMERA LETRA EN MAYUSCULA
        apellido1.value = apellido1.value[0].toUpperCase() + apellido1.value.slice(1);
        return true;


    }else{
        console.log("incorrecto");
        apellido1.className = "form-control is-invalid";
        errorApellido1.classList.remove('mensajeError-oculto');
        errorApellido1.classList.add('mensajeError-activo');

        return false; 
    }

}

//FUNCION VALIDAR APELLIDO2
function validarApellido2() {
    if (patrones.patronAp.test(apellido2.value)) {

        console.log("correcto");
        //PARA ACTIVAR EL MENSAJE DE ERROR CORRECTO Y DESACTIVAR EL INCORRECTO
        apellido2.className = "form-control is-valid";
        errorApellido2.classList.remove('mensajeError-activo');
        errorApellido2.classList.add('mensajeError-oculto');
        
        // //FUNCION PARA PONER LA PRIMERA LETRA EN MAYUSCULA
        apellido2.value = apellido2.value[0].toUpperCase() + apellido2.value.slice(1);
        return true;


    }else{
        console.log("incorrecto");
        apellido2.className = "form-control is-invalid";
        errorApellido2.classList.remove('mensajeError-oculto');
        errorApellido2.classList.add('mensajeError-activo');

        return false; 
    }

}

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


// VALIDAR EMAIL
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



// VALIDAR TELEFONO

function validarTelefono() {
    if (patrones.patronTelefono.test(telefono.value)) {

        console.log("correcto");
        //PARA ACTIVAR EL MENSAJE DE ERROR CORRECTO Y DESACTIVAR EL INCORRECTO
        telefono.className = "form-control is-valid";
        errorTelefono.classList.remove('mensajeError-activo');
        errorTelefono.classList.add('mensajeError-oculto');
        return true;
    }else{
        console.log("incorrecto");
        telefono.className = "form-control is-invalid";
        errorTelefono.classList.remove('mensajeError-oculto');
        errorTelefono.classList.add('mensajeError-activo');
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
formularioEditarPerfil.addEventListener("submit", (e) => {

    if(validarUsuario() && validarNombre() &&  validarApellido1() && validarApellido2() && validarTelefono() && validarDNi() && validarEmail()){

    }else{
        e.preventDefault();
    }
});

