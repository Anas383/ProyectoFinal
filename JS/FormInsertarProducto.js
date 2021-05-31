let nombre=document.getElementById('nombre');
let categorias=document.getElementById('categorias');
let formulario= document.getElementById('FormularioAñadirProductos');
let errorNombre=document.getElementById('mError-nombre');

const patrones={
    patronNom:/./,
    

}

nombre.addEventListener("keyup", validarNombre);
nombre.addEventListener("blur", validarNombre);


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

formulario.addEventListener("submit", (e) => {

    if(validarNombre()){

    }else{
        e.preventDefault();
    }
});