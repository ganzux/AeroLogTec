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
	
		<?php if ( estaLogado() ){ ?>
	
		<div id="contenedor-contenido">
			<div id="titulo">
				<?php echo $enviar_titulo; ?>
			</div>
		</div>
		
		<?php require 'envio/form.php'; ?>
		
		<?php } else {  } ?>
		
		<?php require 'includes/pie.php'; ?>
	</div>
</body>

    <script>

        function error(capa, nombre){
            var error = true;

            if ( document.getElementById(capa).value=="" ){
                alert("<?php echo $enviar_error_generico1; ?>"+nombre+"<?php echo $enviar_error_generico2; ?>");
                document.getElementById("verifica").checked = false;
                document.getElementById(capa).focus();

            } else
                error = false;
            return error;
        }

        function validamos(){

            // OBLIGATORIEDAD
            var errornombre  = error("nombre","<?php echo $enviar_nombre; ?>");
            if (!errornombre)
                var errorcorreo  = error("email","<?php echo $enviar_correo; ?>");
            if (!errornombre && !errorcorreo)
                var errorimporte  = error("importe","<?php echo $enviar_total; ?>");
            if (!errornombre && !errorcorreo && !errorimporte)
                var errorfactura = error("factura","<?php echo $enviar_factura; ?>");

            // IMPORTE -> SÓLO NÚMEROS
            var nume = document.getElementById("importe").value;
            if ( !errornombre && !errorcorreo && !errorimporte && !errorfactura && isNaN(nume) ){
                alert("<?php echo $enviar_error_generico1; ?>"+" <?php echo $enviar_total; ?> "+"<?php echo $enviar_error_generico3; ?>");
                document.getElementById("verifica").checked = false;
                document.getElementById("importe").focus();
            }

            try{
                if ( document.getElementById("verifica").checked  == false )
                    document.getElementById("saveForm").disabled = true;
                else
                    document.getElementById("saveForm").disabled = false;
            } catch (e){
                alert(""+e);
            }
            return true;
        }
    </script>

</html>