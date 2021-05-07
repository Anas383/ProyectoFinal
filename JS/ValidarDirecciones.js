let cp = document.getElementById('cp');
let provincia = document.getElementById('provincia');
let comunidadAutonoma = document.getElementById('comunidadAutonoma');
let calle = document.getElementById('calle');
let numero = document.getElementById('numero');
let piso = document.getElementById('piso');
let portal = document.getElementById('portal');
let formularioDirecciones=document.getElementById('formularioDirecciones');


const patrones={
    patronCP:/^[0-9]{5}$/,
    patronProvincia:/^.\D+$/,
    patronComunidadAutonoma:/^.\D+$/,
    patronCalle: /^(C\/)\s?[a-zA-Z]{2,}$/,
    patronPiso: /^(Bajo|bajo|[1-9]{1,3})º[A-Za-z]{1,9}$/,
    patronPortal: /^(Portal|Escalera) [A-Za-z]{1,9}$/,
    patronNumero: /^\d+$/
}

cp.addEventListener("keyup", validarCP);
cp.addEventListener("blur", validarCP);
cp.addEventListener("keyup", validarCP1);
cp.addEventListener("blur", validarCP1);
cp.addEventListener("keyup", validarCP2);
cp.addEventListener("blur", validarCP2);
cp.addEventListener("blur", validarProvincia);
cp.addEventListener("blur", validarCA);
provincia.addEventListener("keyup", validarProvincia);
provincia.addEventListener("blur", validarProvincia);
provincia.addEventListener("blur", validarProvincia);
comunidadAutonoma.addEventListener("keyup", validarCA);
comunidadAutonoma.addEventListener("blur", validarCA);
comunidadAutonoma.addEventListener("onchange", validarCA);
calle.addEventListener("keyup", validarCalle);
calle.addEventListener("blur", validarCalle);
piso.addEventListener("keyup", validarPiso);
piso.addEventListener("blur", validarPiso);
portal.addEventListener("keyup", validarPortal);
portal.addEventListener("blur", validarPortal);
numero.addEventListener("keyup", validarNumero);

numero.addEventListener("blur", validarNumero);

function validarCP1(cPostal){

    let provincias = {
        1: "Álava", 2: "Albacete", 3: "Alicante", 4: "Almería", 5: "Ávila",
        6: "Badajoz", 7: "Islas Baleares", 08: "Barcelona", 09: "Burgos", 10: "Cáceres",
        11: "Cádiz", 12: "Castellón", 13: "Ciudad Real", 14: "Córdoba", 15: "La Coruña",
        16: "Cuenca", 17: "Gerona", 18: "Granada", 19: "Guadalajara", 20: "Guipúzcoa",
        21: "Huelva", 22: "Huesca", 23: "Jaén", 24: "León", 25: "Lérida",
        26: "La Rioja", 27: "Lugo", 28: "Madrid", 29: "Málaga", 30: "Murcia",
        31: "Navarra", 32: "Orense", 33: "Asturias", 34: "Palencia", 35: "Las Palmas de Gran Canaria",
        36: "Pontevedra", 37: "Salamanca", 38: "Santa Cruz de Tenerife", 39: "Cantabria", 40: "Segovia",
        41: "Sevilla", 42: "Soria", 43: "Tarragona", 44: "Teruel", 45: "Toledo",
        46: "Valencia", 47: "Valladolid", 48: "Vizcaya", 49: "Zamora", 50: "Zaragoza",
        51: "Ceuta", 52: "Melilla"
    };
    if(cPostal.length == 5 && cPostal <= 52999 && cPostal >= 1000){
        
        return provincias[parseInt(cPostal.substring(0, 2))];
    }
    if(patrones.patronCP.test(cp.value)){

        cp.className="form-control is-valid";
    	return true;
    }
    else{
        cp.className="form-control is-invalid";
  		return false;
    }
}
function validarCP2(cPostal){

    let comunidades = {
        1: "País Vasco", 2: "Castilla-La Mancha", 3: "Comunidad Valenciana", 4: "Andalucía", 5: "Castilla y León",
        6: "Extremadura", 7: "Islas Baleares", 08: "Cataluña", 09: "Castilla y León", 10: "Extremadura",
        11: "Andalucía", 12: "Comunidad Valenciana", 13: "Castilla-La Mancha", 14: "Andalucía", 15: "Galicia",
        16: "Castilla-La Mancha", 17: "Cataluña", 18: "Andalucía", 19: "Castilla-La Mancha", 20: "País Vasco",
        21: "Andalucía", 22: "Aragón", 23: "Andalucía", 24: "Castilla y León", 25: "Cataluña",
        26: "La Rioja", 27: "Galicia", 28: "Madrid", 29: "Andalucía", 30: "Murcia",
        31: "Navarra", 32: "Galicia", 33: "Asturias", 34: "Castilla y León", 35: "Islas Canarias",
        36: "Galicia", 37: "Castilla y León", 38: "Islas Canarias", 39: "Cantabria", 40: "Castilla y León",
        41: "Andalucía", 42: "Castilla y León", 43: "Cataluña", 44: "Aragón", 45: "Castilla-La Mancha",
        46: "Comunidad Valenciana", 47: "Castilla y León", 48: "País Vasco", 49: "Castilla y León", 50: "Aragón",
        51: "Ceuta", 52: "Melilla"
    };
    if(cPostal.length == 5 && cPostal <= 52999 && cPostal >= 1000){

        return comunidades[parseInt(cPostal.substring(0, 2))];
    }
    if(patrones.patronCP.test(cp.value)){

        cp.className="form-control is-valid";
    	return true;
    }
    else{
        cp.className="form-control is-invalid";
    	return false;
    }
}
let inputCP = cp;
inputCP.onkeyup = function(){
    provincia.value = validarCP1(inputCP.value);
    comunidadAutonoma.value = validarCP2(inputCP.value);
}

function  validarCP() {
    if(patrones.patronCP.test(cp.value)){

        cp.className="form-control is-valid";
    	return true;
    }
    else{
        cp.className="form-control is-invalid";
    	return false;
    }
}

//VALIDAR COMUNIDAD AUTONOMA
function validarCA(){

    comunidadAutonoma.value = comunidadAutonoma.value.charAt(0).toUpperCase() + comunidadAutonoma.value.slice(1);
	if(patrones.patronComunidadAutonoma.test(comunidadAutonoma.value)){

		comunidadAutonoma.className="form-control is-valid";
    	return true;
	}
	else{

		comunidadAutonoma.className="form-control is-invalid";
    	return false;
	}
}

//VALIDAR PROVINCIA
function validarProvincia(){

    provincia.value = provincia.value.charAt(0).toUpperCase() + provincia.value.slice(1);
	if(patrones.patronProvincia.test(provincia.value)){

		provincia.className="form-control is-valid";
    	return true;
	}
	else{

		provincia.className="form-control is-invalid";
    	return false;
	}
}

//VALIDAR CALLE
function validarCalle() {
   calle.value =calle.value.charAt(0).toUpperCase() +calle.value.slice(1);
    if(patrones.patronCalle.test(calle.value)){
       calle.className="form-control is-valid";
    	return true;
    }else{
        calle.className="form-control is-invalid";
    	return false;
    }
    
}

//VALIDAR CALLE
function validarPiso() {
    piso.value =piso.value.charAt(0).toUpperCase() +piso.value.slice(1);
     if(patrones.patronPiso.test(piso.value)){
        piso.className="form-control is-valid";
         return true;
     }else{
         piso.className="form-control is-invalid";
         return false;
     }
     
 }

 //VALIDAR CALLE
function validarPortal() {
    portal.value =portal.value.charAt(0).toUpperCase() +portal.value.slice(1);
     if(patrones.patronPortal.test(portal.value)){
        portal.className="form-control is-valid";
         return true;
     }else{
         portal.className="form-control is-invalid";
         return false;
     }
     
 }

 function validarNumero() {
    if(patrones.patronNumero.test(numero.value)){
        numero.className="form-control is-valid";
         return true;
     }else{
         numero.className="form-control is-invalid";
         return false;
     }
 }



 formularioDirecciones.addEventListener("submit", (e) => {

    if( validarCP() &&validarProvincia() && validarCA() && validarCalle() && validarNumero()){
        validarCP();
        validarProvincia(); 
        validarCA() ;
        validarCalle() ;
        validarNumero()
    }else{
        e.preventDefault();
    }
});