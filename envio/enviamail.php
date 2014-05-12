<?php
    require '../lang.php';
    require '../func.php';
    require "mailer/class.phpmailer.php";

    $lang =  $_POST[idioma];

    if ( $lang == "001" )
        $lang  ="es";
    else if ( $lang == "002" )
        $lang  ="en";
    else
        $lang = setLang();
    require '../lang/traduccion_'. $lang .'.php';

    $fecha = time ();
    $formato = date("Y-m-d_H-i-s",$fecha);
    $rutaXML = "../datos/datos.xml";

    $sTexto .= "<HTML><HEAD><TITLE></TITLE></HEAD><BODY>".$enviar_evio_texto;
    $sTexto .= "<br><br>".$enviar_evio_antes_nombre.$_POST[nombre].$enviar_evio_despues_nombre;
    $sTexto .= "<br><br>".$enviar_evio_explicacion;
    $sTexto .= " <a href='http://www.aero-log-tec.com/pagos/pagar/realizarPago.php?id=".getNextDataNumber()."'><img src='http://www.aero-log-tec.com/pagos/images/visa.png'>".$enviar_evio_nombre_enlace."</a>";

    if ($_POST[otros]!="")
        $sTexto .= "<br><br>".$enviar_evio_antes_otros."<br>".$_POST[otros]."<br>".$enviar_evio_despues_otros;
    $sTexto .= "</BODY></HTML>";

    $ext = ( envia_correo($_POST[email], $enviar_evio_asunto, $sTexto, $enviar_evio_origen, $formato, $enviar_envio_remitente, $_POST[email2],$_POST[nombre]) );


    $miXML = new SimpleXMLElement( $rutaXML, null, true );
    $XMLHijo = $miXML->addChild('row');
    $XMLHijo->addChild('cell', getNextDataNumber() );
    $XMLHijo->addChild('cell', normaliza( $_POST[nombre] ) );
    $XMLHijo->addChild('cell', normaliza( $_POST[email] ) );
    $XMLHijo->addChild('cell', normaliza( $_POST[importe] ) );
    $XMLHijo->addChild('cell', $_POST[moneda] );
    $XMLHijo->addChild('cell', getMoneda($_POST[moneda]) );
    $XMLHijo->addChild('cell', normaliza( $_POST[otros] ) );
    $XMLHijo->addChild('cell', normaliza( date("Y-m-d H:i:s",$fecha)) );
    $XMLHijo->addChild('cell', normaliza( $formato.".".$ext) );
    $XMLHijo->addChild('cell', $_POST[idioma] );
    $miXML->asXML( $rutaXML );
    echo $enviar_evio_ok;

    

    function getext($filename) {
        $ext = substr($filename, strrpos($filename,".") + 1);
        return $ext;
    }


    function envia_correo($sPara, $sAsunto, $sTexto, $sDe, $formato, $enviar_envio_remitente, $sPara2, $nombre) {
        foreach ($_FILES as $vAdjunto) {
            if ($vAdjunto["size"] > 0) {
                move_uploaded_file ($vAdjunto['tmp_name'], "../ficheros/".$vAdjunto[ 'name' ]);
                $ext = getext( $vAdjunto[ 'name' ] );
                rename("../ficheros/".$vAdjunto[ 'name' ],"../ficheros/".$formato.".".$ext);
            }
        }

        if ($bHayFicheros)
            $sTexto .= $sAdjuntos."\n\n----_Separador-de-mensajes_----\n";

        envio($sDe, $sTexto, "../ficheros/".$formato.".".$ext, "factura.".$ext, $sPara, $sAsunto, $enviar_envio_remitente, $sPara2,$nombre);

        return $ext;
    }


    function normaliza($TEXTO) {
        $TEXTO=ereg_replace ("/", "-", $TEXTO);
        $TEXTO=ereg_replace ("<", "< ", $TEXTO);
        $TEXTO=ereg_replace (">", " >", $TEXTO);
        $TEXTO=strtr(strtolower("$TEXTO"),//pone todo el TEXTO a minusculas
        "ÀÁÂÃÄÅàáâãäåÈÉÊËèéêëÌÍÎÏìíîïÒÓÔÕÖØòóôõöøÙÚÛÜùúûüÇçÑñÿ",
        "aaaaaaaaaaaaeeeeeeeeiiiiiiiioooooooooooouuuuuuuuccnny");//estas dos líneas cambian todos los caracteres "raros" a estándar
        return utf8_encode($TEXTO);//fin
    }

    function envio($mailRemitente,$cuerpoMensaje,$rutaFichero,$nombreArchivo,$mailDestino,$asutno, $remitente, $sPara2,$nombre){
        $mail = new PHPMailer();
        $mail->Host = "localhost";

        $mail->From = $mailRemitente;
        $mail->FromName = $remitentet;
        $mail->Subject = $asutno;
        $mail->AddAddress($mailDestino,$nombre);
        $mail->AddCC( $sPara2 );
        $mail->AddBCC( $mailRemitente );

        $body  = $cuerpoMensaje;
        $mail->Body = $body;
        $mail->AltBody = "C&S";
        $mail->AddAttachment($rutaFichero);
        //$mail->AddAttachment("files/demo.zip", "demo.zip");
        $mail->Send();
    }

?>

<script type="text/javascript">
    var pagina = '../list.php';
    var milisegundos = 1;
    function redireccion() {
        document.location.href=pagina;
    }
    setTimeout("redireccion()",milisegundos);
</script>