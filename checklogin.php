<?php
require 'fichero.php';
session_start();

$usuario	= "";
$password	= "";

if ( isset($_GET["usuario"]) )
	$usuario = $_GET["usuario"];
if ( isset($_POST["usuario"]) )
	$usuario = $_POST["usuario"];
if ( isset($_GET["pass"]) )
	$password = $_GET["pass"];
if ( isset($_POST["pass"]) )
	$password = $_POST["pass"];
	
$datos_config = leer_fichero_completo("datos/users.ito");
$dato = explode(";", $datos_config);

$arr = array();
for ($i=0;$i<count($dato);$i++){
	$tupla = explode(",", $dato[$i]);
	$arr[trim($tupla[0])] = trim($tupla[1]);
}


if ( $usuario!="" && $password!="" ){
	if ( $password==$arr[$usuario] ){
		$_SESSION['username'] = $usuario;
		$_SESSION['password'] = $password;
	}
}
header("Location: index.php");
?>