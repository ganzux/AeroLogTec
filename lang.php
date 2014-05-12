<?php
	session_start();

	function setLang(){
		$lenguajePreferido = "en";
		$lang = "";

		if ( isset($_GET["lang"]) )
			$lang = $_GET["lang"];

		if( !($lang == "" || empty($lang)) ){
			switch($lang){
				case "en": case "es":
				break;
				default:
					$lang = $lenguajePreferido;
			}
		}

		else if ( isset($_SESSION["lang"]) && !$_SESSION["lang"] == "" && !empty($_SESSION["lang"]) )
			$lang = $_SESSION['lang'];

		else
			$lang = $lenguajePreferido;

		$_SESSION['lang'] = $lang;
		return $_SESSION['lang'];
	}
  ?>