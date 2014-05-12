function cargaCapaCargando(){
    try{
        var newdiv = document.createElement('div');
        newdiv.setAttribute('id', "cargando");
        newdiv.className ="cargando";
        getSize();
        newdiv.style.height = myScrollHeight + 'px';
        document.body.appendChild(newdiv);
        document.getElementById("cargando").style.display = "block";
    } catch(e){
        alert("Error al mostrar la capa de cargando - Consulte al Administrador\n"+e);
    }
}//capaC
var myWidth,myHeight,myScroll,myScrollWidth,myScrollHeight;
function getSize() {
    if (self.innerHeight) { // NO IE
            myWidth = window.innerWidth;
            myHeight = window.innerHeight;
            myScroll = window.pageYOffset;
    } else if (document.documentElement && document.documentElement.clientHeight) { // IE6
            myWidth = document.documentElement.clientWidth;
            myHeight = document.documentElement.clientHeight;
            myScroll = document.documentElement.scrollTop;
    } else if (document.body) { // Other IE, such as IE7
            myWidth = document.body.clientWidth;
            myHeight = document.body.clientHeight;
            myScroll = document.body.scrollTop;
    }
    if (window.innerHeight && window.scrollMaxY) {
            myScrollWidth = document.body.scrollWidth;
            myScrollHeight = window.innerHeight + window.scrollMaxY;
    } else if (document.body.scrollHeight > document.body.offsetHeight) { // No Explorer Mac
            myScrollWidth = document.body.scrollWidth;
            myScrollHeight = document.body.scrollHeight;
    } else { // Explorer Mac... ¿Explorer 6 Strict, Mozilla y Safari?
            myScrollWidth = document.body.offsetWidth;
            myScrollHeight = document.body.offsetHeight;
    }
}