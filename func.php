<?php

function getMoneda($moneda){
    $retorno ="";
    if ($moneda=="978")
        $retorno="€";
    else if ($moneda=="840")
        $retorno="$";
    else if ($moneda=="826")
        $retorno="£";
    return $retorno;
}

// Nos dice si está logado un usario
function estaLogado() {
    if ( isset($_SESSION['username']) && $_SESSION['username']!="" ){
        if ( isset($_SESSION['password']) && $_SESSION['password']!="" ){
            return true;
        }
    }
    return false;
}

// Nos devuelve el número de datos que tiene nuestro XML de datos
function getDataNumber(){
    $i = 0;
    $rutaXML = "../datos/datos.xml";

    if (file_exists($rutaXML)){
        $pagoConcreto = simplexml_load_file($rutaXML);
        if($pagoConcreto){
            foreach ($pagoConcreto->row as $datosConcreto){
                $i++;
            }
        } else $i=-1;
    } else $i=-2;

    return $i;
}

function getNextDataNumber(){
    return getDataNumber()+1;
}

// Nos devuelve los datos del XML según un identificador dado
function getDataFromId($id){
    $separador = "|@|@#%";
    $devolucion = "error";
    $rutaXML = "../datos/datos.xml";

    if (file_exists($rutaXML)){
    $pagoConcreto = simplexml_load_file($rutaXML);
    if($pagoConcreto){
        foreach ($pagoConcreto->row as $datosConcreto){
            if ( $id == $datosConcreto->cell[0] ){
                $devolucion = $datosConcreto->cell[0].$separador.
                        $datosConcreto->cell[1].$separador.
                        $datosConcreto->cell[2].$separador.
                        $datosConcreto->cell[3].$separador.
                        $datosConcreto->cell[4].$separador.
                        $datosConcreto->cell[5].$separador.
                        $datosConcreto->cell[6].$separador.
                        $datosConcreto->cell[7].$separador.
                        $datosConcreto->cell[8].$separador.
                        $datosConcreto->cell[9];
                return $devolucion;
            }
        }
    } else $devolucion .= " Sintaxis XML inválida";
} else $devolucion .= " Abriendo datos.xml";

    return $devolucion;
}
?>