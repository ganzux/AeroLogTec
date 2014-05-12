<?php
require '../bbdd/conecta4.php';
require '../envio/mailer/class.phpmailer.php';
// DATO                                     NOMBRE DEL DATO         LONG/TIPO	COMENTARIOS
// Fecha                                    Ds_Date                 dd/mm/yyyy  Fecha de la transacci�n
// Hora                                     Ds_Hour                 HH:mm  	Hora de la transacci�n
// Importe                                  Ds_Amount               12 / Núm. 	Mismo valor que en la petici�n.
// Moneda                                   Ds_Currency             4 / Núm. 	Mismo valor que en la petici�n. 4 se considera su longitud m�xima.
// Número pedido                            Ds_Order                12 / A-N. 	Mismo valor que en la petici�n.
// Identificaci&oacute;n de comercio: c&oacute;digo FUC   Ds_MerchantCode         9 / N.      Mismo valor que en la petici&oacute;n.
// Terminal                                 Ds_Terminal             3 / Núm.    Número de terminal que le asignar� su banco. 3 se considera su longitud m�xima.
// Firma para el comercio                   Ds_Signature            40 / A-N    Ver a pie de p�gina las instrucciones para su c�lculo.
// C&oacute;digo de respuesta                      Ds_Response             4 / Núm.    Ver tabla siguiente
// Datos del comercio                       Ds_MerchantData         1024 / A-N  Informaci&oacute;n opcional enviada por el comercio en el formulario de pago.
// Pago Seguro                              Ds_SecurePayment        1 / Núm.    0 Si el pago NO es seguro 1 Si el pago es seguro
// Tipo de operaci&oacute;n                        Ds_TransactionType      1 / A-N     envío en el formulario de pago
// País del titular                         Ds_Card_Country         3/Núm       País de emisi&oacute;n de la tarjeta con la que se ha intentado realizar el pago. En el siguiente enlace es posible consultar los c�digos de pa�s y su correspondencia: http://unstats.un.org/unsd/methods/m49/m49alpha.htm
// C&oacute;digo de autorizaci&oacute;n                   Ds_AuthorisationCode    6/ A-N      C&oacute;digo alfanumérico de autorizaci�n asignado a la aprobaci�n de la transacci�n por la instituci�n  autorizadora.
// Idioma del titular                       Ds_ConsumerLanguage     3 / Núm     El valor 0, indicará que no se ha determinado el idioma del cliente. (opcional). 3 se considera su longitud m�xima.
// Tipo de Tarjeta                          Ds_Card_Type            1 / A-N     Valores posibles:  C � Cr�dito D - D�bito
if ( isset($_GET["Ds_Date"]) ) $Ds_Date = $_GET["Ds_Date"]; else if ( isset($_POST["Ds_Date"]) ) $Ds_Date = $_POST["Ds_Date"];
if ( isset($_GET["Ds_Hour"]) ) $Ds_Hour = $_GET["Ds_Hour"]; else if ( isset($_POST["Ds_Hour"]) ) $Ds_Hour = $_POST["Ds_Hour"];
if ( isset($_GET["Ds_Amount"]) ) $Ds_Amount = $_GET["Ds_Amount"]; else if ( isset($_POST["Ds_Amount"]) ) $Ds_Amount = $_POST["Ds_Amount"];
if ( isset($_GET["Ds_Currency"]) ) $Ds_Currency = $_GET["Ds_Currency"]; else if ( isset($_POST["Ds_Currency"]) ) $Ds_Currency = $_POST["Ds_Currency"];
if ( isset($_GET["Ds_Order"]) ) $Ds_Order = $_GET["Ds_Order"]; else if ( isset($_POST["Ds_Order"]) ) $Ds_Order = $_POST["Ds_Order"];
if ( isset($_GET["Ds_MerchantCode"]) ) $Ds_MerchantCode = $_GET["Ds_MerchantCode"]; else if ( isset($_POST["Ds_MerchantCode"]) ) $Ds_MerchantCode = $_POST["Ds_MerchantCode"];
if ( isset($_GET["Ds_Terminal"]) ) $Ds_Terminal = $_GET["Ds_Terminal"]; else if ( isset($_POST["Ds_Terminal"]) ) $Ds_Terminal = $_POST["Ds_Terminal"];
if ( isset($_GET["Ds_Signature"]) ) $Ds_Signature = $_GET["Ds_Signature"]; else if ( isset($_POST["Ds_Signature"]) ) $Ds_Signature = $_POST["Ds_Signature"];
if ( isset($_GET["Ds_Response"]) ) $Ds_Response = $_GET["Ds_Response"]; else if ( isset($_POST["Ds_Response"]) ) $Ds_Response = $_POST["Ds_Response"];
if ( isset($_GET["Ds_MerchantData"]) ) $Ds_MerchantData = $_GET["Ds_MerchantData"]; else if ( isset($_POST["Ds_MerchantData"]) ) $Ds_MerchantData = $_POST["Ds_MerchantData"];
if ( isset($_GET["Ds_SecurePayment"]) ) $Ds_SecurePayment = $_GET["Ds_SecurePayment"]; else if ( isset($_POST["Ds_SecurePayment"]) ) $Ds_SecurePayment = $_POST["Ds_SecurePayment"];
if ( isset($_GET["Ds_TransactionType"]) ) $Ds_TransactionType = $_GET["Ds_TransactionType"]; else if ( isset($_POST["Ds_TransactionType"]) ) $Ds_TransactionType = $_POST["Ds_TransactionType"];
if ( isset($_GET["Ds_Card_Country"]) ) $Ds_Card_Country = $_GET["Ds_Card_Country"]; else if ( isset($_POST["Ds_Card_Country"]) ) $Ds_Card_Country = $_POST["Ds_Card_Country"];
if ( isset($_GET["Ds_AuthorisationCode"]) ) $Ds_AuthorisationCode = $_GET["Ds_AuthorisationCode"]; else if ( isset($_POST["Ds_AuthorisationCode"]) ) $Ds_AuthorisationCode = $_POST["Ds_AuthorisationCode"];
if ( isset($_GET["Ds_ConsumerLanguage"]) ) $Ds_ConsumerLanguage = $_GET["Ds_ConsumerLanguage"]; else if ( isset($_POST["Ds_ConsumerLanguage"]) ) $Ds_ConsumerLanguage = $_POST["Ds_ConsumerLanguage"];
if ( isset($_GET["Ds_Card_Type"]) ) $Ds_Card_Type = $_GET["Ds_Card_Type"]; else if ( isset($_POST["Ds_Card_Type"]) ) $Ds_Card_Type = $_POST["Ds_Card_Type"];

$sql="INSERT INTO myaerolog.rescaixa (`Ds_Date`,`Ds_Hour`,`Ds_Amount`,`Ds_Currency`,`Ds_Order`,
    `Ds_MerchantCode`,`Ds_Terminal`,`Ds_Signature`,`Ds_Response`,`Ds_MerchantData`,
    `Ds_SecurePayment`,`Ds_TransactionType`,`Ds_Card_Country`,`Ds_AuthorisationCode`,`Ds_ConsumerLanguage`,
    `Ds_Card_Type`)
    VALUES ('".$Ds_Date."','".$Ds_Hour."','".$Ds_Amount."','".$Ds_Currency."','".$Ds_Order."','".
$Ds_MerchantCode."','".$Ds_Terminal."','".$Ds_Signature."','".$Ds_Response."','".$Ds_MerchantData."','".
$Ds_SecurePayment."','".$Ds_TransactionType."','".$Ds_Card_Country."','".$Ds_AuthorisationCode."','".$Ds_ConsumerLanguage."','".
$Ds_Card_Type."')";

$textoMensaje = "";
$textoMensaje .= "<H2>Se ha efectuado un pago en aero-log-tec</H2>";
$textoMensaje .= "<p>Fecha: ".$Ds_Date."</p>";
$textoMensaje .= "<p>Hora: ".$Ds_Hour."</p>";

if ( $Ds_Currency=="978" )
    $textoMensaje .= "<p>Importe: ".($Ds_Amount/100)." &euro;</p>";
else if ( $Ds_Currency=="840" )
    $textoMensaje .= "<p>Importe: ".($Ds_Amount/100)." &#36</p>";
else
    $textoMensaje .= "<p>Importe: ".($Ds_Amount/100)." ".$Ds_Currency."</p>";

$textoMensaje .= "<p>N&uacute;mero de orden: ".$Ds_Order."</p>";

$respuesta = $Ds_Response;

if ( $Ds_Response>=0 && $Ds_Response <100 )
    $respuesta .= " -> Transacci&oacute;n autorizada para pagos y preautorizaciones.";
else if ( $Ds_Response==900 )
    $respuesta .= " -> Transacci&oacute;n autorizada para devoluciones y confirmaciones .";
else if ( $Ds_Response==101 )
    $respuesta .= " -> Tarjeta caducada.";
else if ( $Ds_Response==102 )
    $respuesta .= " -> Tarjeta en excepci&oacute;n transitoria o bajo sospecha de fraude.";
else if ( $Ds_Response==104 )
    $respuesta .= " -> Operaci&oacute;n no permitida para esa tarjeta o terminal.";
else if ( $Ds_Response==116 )
    $respuesta .= " -> Disponible insuficiente.";
else if ( $Ds_Response==118 )
    $respuesta .= " -> Tarjeta no registrada.";
else if ( $Ds_Response==129 )
    $respuesta .= " -> C&oacute;digo de seguridad (CVV2/CVC2) incorrecto.";
else if ( $Ds_Response==180 )
    $respuesta .= " -> Tarjeta ajena al servicio.";
else if ( $Ds_Response==184 )
    $respuesta .= " -> Error en la autenticaci&oacute;n del titular.";
else if ( $Ds_Response==190 )
    $respuesta .= " -> Denegaci&oacute;n sin especificar Motivo.";
else if ( $Ds_Response==191 )
    $respuesta .= " -> Fecha de caducidad err&oacute;nea.";
else if ( $Ds_Response==202 )
    $respuesta .= " -> Tarjeta en excepci&oacute;n transitoria o bajo sospecha de fraude con retirada de tarjeta.";
else if ( $Ds_Response==912 ||  $Ds_Response==9912 )
    $respuesta .= " -> Emisor no disponible.";
else
    $respuesta .= " -> Transacci&oacute;n denegada.";

$textoMensaje .= "<p>Respuesta: ".$respuesta."</p>";


$mail = new PHPMailer();
$mail->Host = "localhost";

$mail->From = "mcartes@aero-log-tec.com";
$mail->FromName = "C&S AEROLOGTEC";
$mail->Subject = "Pago realizado en C&S AERO-LOG-TEC";
$mail->AddAddress("mcartes@aero-log-tec.com","Manuel Cartes");
$mail->Body = $textoMensaje;
$mail->AltBody = "C&S";
$mail->Send();

//lanza($sql);
?>