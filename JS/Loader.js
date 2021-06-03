window.addEventListener("load", function()
{
    // CUANDO LA PAGINA AUN NO ESTA CARGADA SE MUESTRA LOAD QUE ES EL load Y CUANDO ESTA 
    // CARGADA SE MUESTRA loader2 EL CUAL ES UNA CLASE QUE QUITA EL LOADER
    document.getElementById("loader").classList.toggle("loader2");
})