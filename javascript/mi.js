function navega(destino){
	location.href=destino;
}

function alertError(Mensaje){
    try{
        var d = new Date();
        var tiempoActual = d.getTime();
        document.getElementById("tiempoError").value = tiempoActual;
        document.getElementById("tipoError").value = "1";
        document.getElementById("mensajeError").value = Mensaje;
        muestraUOcultaCapaDeErrores("CapaErrores");
    } catch(e){
        alert(Mensaje + e)
    }
}

function alertMensaje(Mensaje){
    try{
        var d = new Date();
        var tiempoActual = d.getTime();
        document.getElementById("tiempoError").value = tiempoActual;
        document.getElementById("tipoError").value = "0";
        document.getElementById("mensajeError").value = Mensaje;
        muestraUOcultaCapaDeErrores("CapaErrores");
    } catch(e){
        alert(Mensaje + e)
    }
}

// Funci�n que muestra u oculta la capa de errores seg�n tenga contenido o no
function muestraUOcultaCapaDeErrores(idCapa){

    var tipo,mensaje;
    try{ tipo = document.getElementById("tipoError") } catch(e){alert("Error al recoger tipoError")}
    try{
        mensaje = document.getElementById("mensajeError").value
        if (mensaje!="")
            document.getElementById(idCapa).innerHTML=document.getElementById("mensajeError").value;

    } catch(e){}

    try{

        if(tipo.value==0)
            ocultaError(idCapa);
        else if(tipo.value==1)
            muestraError(idCapa);
        else if (tipo.value==2)
            muestraMensaje(idCapa);

    }catch(e){}

}// muestraUOcultaCapaDeErrores

function ocultaError(idCapa){
    try{
        capaErrores = document.getElementById(idCapa);
    } catch(e){
        alert("Error al obtener la capa de errores")
    }
    capaErrores.style.display='none';
}

function muestraError(idCapa){
    try{
        capaErrores = document.getElementById(idCapa);
    } catch(e){
        alert("Error al obtener la capa de errores")
    }
    capaErrores.style.backgroundImage = "url(images/error.gif)";
    capaErrores.style.display='block';
    capaErrores.style.color="red";
}

function muestraMensaje(idCapa){
    try{
        capaErrores = document.getElementById(idCapa);
    } catch(e){
        alert("Error al obtener la capa de errores")
    }
    capaErrores.style.backgroundImage = "url(images/ok.png)";
    capaErrores.style.display='block';
    capaErrores.style.color="green";
}


// Segundos en los que queremos que desaparezca la capa de errores/mensajes. Con -1 No desaparece
var segundosDeCapa = 10;
// Cada segundo lanza la funci�n que muestra u oculta la capa de errores
function cron(){
    try {
        var d = new Date();
        var tiempoActual = d.getTime();

        // Si hubo un error en el Servidor, establecemos el tiempo del error
        if (document.getElementById("serverError").value=="true" && document.getElementById("tiempoError").value=="")
            document.getElementById("tiempoError").value = tiempoActual;
        var tiempoDelError = document.getElementById("tiempoError").value;

        var tiempoCapa = Math.abs(tiempoDelError-tiempoActual);

        if (segundosDeCapa!=-1 && tiempoDelError!="" && tiempoCapa>(segundosDeCapa*1000))
            document.getElementById("tipoError").value="0";
    }catch(e){}

    try{ muestraUOcultaCapaDeErrores("CapaErrores"); }catch(e){}
}
time=setInterval(cron, 500);

function cogename(){
    var name = document.getElementById("factura").value;
    document.getElementById("nombre_fichero").innerHTML = name;
}