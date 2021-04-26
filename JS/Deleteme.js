let deleteme = document.getElementById('deleteme');
const errorDeleteme= document.getElementById('mError-deleteme');

formularioDeleteMe = document.getElementById('FormularioDarseDeBaja');
deleteme.addEventListener("keyup", validarDeleteME);

function validarDeleteME(){
    if(deleteme.value=='DeleteMe'){
        deleteme.className = "form-control is-valid";
        errorDeleteme.classList.remove('mensajeError-activo');
        errorDeleteme.classList.add('mensajeError-oculto');
         
        return true;
    }else{
        console.log("incorrecto");
       deleteme.className = "form-control is-invalid";
       errorDeleteme.classList.remove('mensajeError-oculto');
       errorDeleteme.classList.add('mensajeError-activo');7

        return false; 
    }
}

formularioDeleteMe.addEventListener("submit", (e) => {

    if(validarDeleteME()){

    }else{
        e.preventDefault();
    }
});