<?php 
//error_reporting(0);
require 'func.php';
require 'lang.php';
require 'lang/traduccion_'. setLang() .'.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php require 'includes/headgrid.php'; ?>

<body>
	<div id="contenedor_general">
	
		<?php require 'includes/menu.php'; ?>
		
		<?php if ( estaLogado() ){ ?>
	
		<div id="contenedor-contenido">
			<div id="titulo">
				<?php echo $listar_titulo; ?>
			</div>

                    <center>
                        <br /><br />
                        <div id="gridbox" style="width:820px; height:270px; background-color:white;">
                        </div>
                    </center>

                    <script>
                        mygrid = new dhtmlXGridObject('gridbox');
                        mygrid.setImagePath("javascript/grid/codebase/imgs/");
                        mygrid.setSkin("dhx_skyblue");
                        mygrid.loadXML("datos/datos.xml");
                        mygrid.attachEvent("onRowSelect", function(id,ind){
                                // id  -> Fila pinchada
                                // ind -> Columna pinchada
                                document.location.href="descarga.php?fichero="+this.cells(id,8).getValue();
                                //header( "Location: descarga.php?fichero="+this.cells(id,5).getValue() );
                            });
                        function ser() {
                            mygrid.setSerializationLevel(false, false, true);
                            document.getElementById("alfa1").innerHTML = mygrid.serialize().replace(/\</g, "&lt;").replace(/\>/g, "&gt;").replace(/\&lt;row/g, "<br/>&lt;row");
                        }
                    </script>
		</div>
		
		<?php } else { ?>
		LOGATE ANTES
		<?php } ?>

		<?php require 'includes/pie.php'; ?>
	</div>
</body>

    <script>
        function descarga(rowid,celInd){
            alert("descarga"+rowid+celInd);
        }
        function descarga2(rowid,celInd){
            alert("descarga2"+rowid+celInd);
        }
    </script>

</html>