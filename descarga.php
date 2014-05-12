<?php
$sDirectorio = "/pagos/ficheros/";
$sUrlDescargas = $_SERVER["DOCUMENT_ROOT"].$sDirectorio;
$vBarras = array("/", "\\");

$sDocumento = $sUrlDescargas.str_replace($vBarras, "_", $_GET[fichero]);
if (file_exists($sDocumento)){
    header("Content-type: application/force-download");
    header("Content-Disposition: attachment; filename=".basename($_GET[fichero]));
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".filesize($sDocumento));
    readfile($sDocumento);
} else {
    echo "<br>Ha sido imposible descargar el fichero";
}
?>