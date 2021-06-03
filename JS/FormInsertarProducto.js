//DECLARACION DE VARIABLES
let nombre=document.getElementById('nombre');
let categorias=document.getElementById('categorias');
let descripcion= document.getElementById("descripcion");
let caracteres = document.getElementById("caracteres");
let formulario= document.getElementById('FormularioAñadirProductos');
//MENSAJES DE ERROR
let errorNombre=document.getElementById('mError-nombre');
//PATRONES
const patrones={
    patronNom:/./,
    

}
//EVENTOS
nombre.addEventListener("keyup", validarNombre);
nombre.addEventListener("blur", validarNombre);
descripcion.addEventListener("keyup", contarCaracteres);
descripcion.addEventListener("focus", contarCaracteres);
descripcion.addEventListener("blur", contarCaracteres);

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
// EVENTO PARA NO DEJAR ENVIAR EL FORMULARIO SIN UN CAMPO ESTA FALSE
formulario.addEventListener("submit", (e) => {

    if(validarNombre()){

    }else{
        e.preventDefault();
    }
});


//Funcion para contar caracteres 
function contarCaracteres(){
    caracteres.innerHTML= "Carácteres restantes: "+ (1000-descripcion.value.length);
}