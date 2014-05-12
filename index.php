<?php 
//error_reporting(0);
require 'func.php';
require 'lang.php';
require 'lang/traduccion_'. setLang() .'.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php require 'includes/head.php'; ?>

<body>
	<div id="contenedor_general">
	
		<?php require 'includes/menu.php'; ?>
	
		<div id="contenedor-contenido" align="center">
			<?php 
			if ( estaLogado() ){
					echo "<div id='titulo'>".$inicio_texto.$_SESSION['username']."</div>";
			} else
				require 'form.php';
			?>
		</div>
		<?php require 'includes/pie.php'; ?>
	</div>
</body>
</html>