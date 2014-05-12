<?php
session_start();
require '../func.php';
?>
<HTML>
    <HEAD>
        <script type="text/javascript" src="sha1.js"></script>
        <link rel="stylesheet" type="text/css" href="estilo.css" type="text/css"/>
    </HEAD>

<?php
$datoPago = "";
$separador = "|@|@#%";

if ( isset($_GET["id"]) )   $datoPago = $_GET["id"]; else if ( isset($_POST["id"]) )  $datoPago = $_POST["id"];

$datoPago = getDataFromId( $datoPago );

list($xmlId, $xmlName ,$xmlMail ,$xmlPrice ,$xmlMonedaId ,$xmlMonedaSymbol ,$xmlDatos ,$xmlFecha ,$xmlFcihero, $idioma) = explode($separador,$datoPago);

if ($_GET["id"] == "dolares"){
    $xmlId          = "000";
    $xmlName        = "Álvaro";
    $xmlMail        = "itoito@gmail.com";
    $xmlPrice       = "200";
    $xmlMonedaId    = "840";
    $xmlMonedaSymbol= "\$";
    $xmlDatos       = "Nada de nada";
    $xmlFecha       = "2011-01-20 11:44:14";
    $xmlFcihero     = "2011-01-20 11:44:14.pdf";
    $idioma         = "001";
}




if ($xmlId==null || $xmlId=="error"){
    ?>
    <script type="text/javascript">
        var pagina = 'http://www.aero-log-tec.com';
        var milisegundos = 0;
        function redireccion() {
            document.location.href=pagina;
        }
        setTimeout("redireccion()",milisegundos);
    </script>
    <?php
    }

    empty($Formulario)?ShowForm($xmlPrice,$xmlMonedaId,$idioma,$xmlFecha,$xmlId):ShowError();
    exit;
?>

<?PHP


function ShowError () {
    echo "<table width=100% height=50%>
            <tr>
                <td>
                    <p>
                        <h2>
                            <center>
                                Compruebe que todos los datos del formulario son correctos
                            </center>
                        </h2>
                    </p>
                </td>
            </tr>
        </table>
    </body>
</html>\n";
}

function ShowForm ($amount,$currency,$idioma,$xmlFecha,$xmlId) {

    // Posted data
    global $HTTP_POST_VARS;
    $amount *= 100;

    $url_tpvv='https://sis.sermepa.es/sis/realizarPago';

    if ($currency==840)
        $clave='U80U2VVT28T06A2Q';
    else
        $clave='4651RG56617TH458';

    $name='C S AEROLOG';

    if ($currency==840)
        $code='322075888';
    else
        $code='297810319';

    $order = str_replace("-" , "", substr($xmlFecha, 2) );
    $order = str_replace(" " , "", $order);
    $order = str_replace(":" , "", $order);

    $order = date("mdHi");

    $order = str_pad($xmlId, 4, "0", STR_PAD_LEFT) . substr($order, 0, 9);

    $transactionType='0';
    $urlMerchant='http://www.aero-log-tec.com/pagos/pagar/resultado.php';

    $terminal='001';

    $message = $amount.$order.$code.$currency.$transactionType.$urlMerchant.$clave;
    $signature = strtoupper(sha1($message));

    echo "
        <body>
            <form name=compra action=$url_tpvv method=post>
                <input type=hidden name=Ds_Merchant_Amount value='$amount' />
                <input type=hidden name=Ds_Merchant_Currency value='$currency' />
                <input type=hidden name=Ds_Merchant_Order  value='$order' />
                <input type=hidden name=Ds_Merchant_ConsumerLanguage value='$idioma' />
                <input type=hidden name=Ds_Merchant_MerchantCode value='$code' />
                <input type=hidden name=Ds_Merchant_Terminal value='$terminal' />
                <input type=hidden name=Ds_Merchant_TransactionType value='$transactionType' />
                <input type=hidden name=Ds_Merchant_MerchantURL value='$urlMerchant' />
                <input type=hidden name=Ds_Merchant_MerchantSignature value='$signature' />
                <input type=hidden name=Ds_Merchant_UrlOK value='http://www.aero-log-tec.com/pagos/pagar/exito.php' />
                <input type=hidden name=Ds_Merchant_UlrKO value='http://www.aero-log-tec.com/pagos/pagar/error.php' />
                <!--input type='submit'-->
            </form>
            <script language=JavaScript>
                cargaCapaCargando();
                document.forms[0].submit();
            </script>
        </body>
    </html>";
}
?>