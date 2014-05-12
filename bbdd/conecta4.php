<?php

//CONEXION A BASE MYSQL
function conectarse() {
    if (!($link=@mysql_connect('localhost','user','pass'))){
        $resultado = "Ocurri&oacute; un error al acceder a la base de datos.";
    } else if (!@mysql_select_db('myaerolog',$link)) {						// Si no conecta con la tabla
        $resultado = "Ocurri&oacute; un error al acceder a la tabla de datos.";
    } else {															// En otro caso, la conexión ha sido correcta
        $resultado = $link;												// El resultado es el identificador de enlace
    }
    return $resultado;
}

function lanza($sql){
    mysql_query($ssql, conectarse());
}

function getData(){
    $ssql="SELECT * FROM correo";
    $query = mysql_query($ssql, conectarse());
    $numeroreg= mysql_num_rows($query);
    $datosPorComas="";
    if ($numeroreg>0){
        $cont=0;
        while ($damefila=mysql_fetch_object($query)){
            $datosPorComas .= $damefila->id.",".
                    $damefila->nombre.",".
                    $damefila->correo.",".
                    $damefila->precio.",".
                    $damefila->moneda.",".
                    $damefila->datos.",".
                    $damefila->fecha.",".
                    $damefila->fichero.",".
                    $damefila->idioma;
        }
    }
}

function eraseData($id){
    $ssql="DELETE FROM stock WHERE id=".$id;
    mysql_query($ssql, conectarse());
}

?>