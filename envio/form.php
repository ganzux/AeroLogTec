<img id="top" src="images/top.png" alt="">

<div id="form_container">
	<h1>
		<a><?php echo $enviar_titulo; ?></a>
	</h1>

	<form id="miformenvior" name="miformenvior" class="appnitro" enctype="multipart/form-data" method="post" action="envio/enviamail.php">
		<div class="form_description">
			<h2><?php echo $enviar_titulo; ?></h2>
			<p><?php echo $enviar_subtitulo; ?></p>
		</div>						

		<ul>
			<!-- NOMBRE -->
			<li id="li_1" >
				<label class="description" for="nombre">
                                    <?php echo $enviar_nombre; ?> *
				</label>
				<div>
                                    <input id="nombre" name="nombre" class="element text large" type="text" maxlength="255" value=""/>
				</div>
				<p class="guidelines" id="guide_1">
                                    <small>
                                        <?php echo $enviar_nombre_explicacion; ?>
                                    </small>
				</p> 
			</li>

			<!-- CORREO ELECTRÓNICO -->
			<li id="li_2" >
				<label class="description" for="email">
                                    <?php echo $enviar_correo; ?> *
                                </label>
				<div>
                                    <input id="email" name="email" class="element text large" type="text" maxlength="255" value="" />
				</div>
				<p class="guidelines" id="guide_2">
                                    <small>
                                        <?php echo $enviar_correo_ecplicacion; ?>
                                    </small>
				</p>
			</li>

                        <!-- CORREO ELECTRÓNICO BCC -->
			<li id="li_8" >
				<label class="description" for="email2">
                                    <?php echo $enviar_copia; ?>
                                </label>
				<div>
                                    <input id="email2" name="email2" class="element text large" type="text" maxlength="255" value="" />
				</div>
				<p class="guidelines" id="guide_8">
                                    <small>
                                        <?php echo $enviar_copia_explicacion; ?>
                                    </small>
				</p>
			</li>

			<!-- TOTAL -->
			<li id="li_3" >
				<label class="description" for="importe">
                                    <?php echo $enviar_total; ?> *
				</label>
				<div>
                                    <input id="importe" name="importe" class="element text medium" type="text" maxlength="255" value=""/>
                                    <select id="moneda" name="moneda" class="element textarea small">
                                        <OPTION VALUE="978">&euro;</OPTION>
                                        <OPTION VALUE="840">&#36</OPTION>
                                        <!--OPTION VALUE="826">&#163;</OPTION-->
                                        <!--OPTION VALUE="">&#165;</OPTION-->
                                    </select>
				</div>
				<p class="guidelines" id="guide_3">
                                    <small>
                                        <?php echo $enviar_total_explicacion; ?>
                                    </small>
				</p>
			</li>

			<!-- NOTAS -->
			<li id="li_4" >
				<label class="description" for="otros">
                                    <?php echo $enviar_notas; ?>
				</label>
				<div>
                                    <textarea id="otros" name="otros" class="element textarea small"></textarea>
				</div>
				<p class="guidelines" id="guide_4">
                                    <small>
                                        <?php echo $enviar_notas_explicacion; ?>
                                    </small>
				</p> 
			</li>

			<!-- FACTURA -->
			<li id="li_5" >
				<label class="description" for="factura">
                                    <?php echo $enviar_factura; ?> *
				</label>
				<div>
                                    <input id="factura" name="factura" class="element file" type="file" onblur="cogename()"/>
				</div>
                                <label class="description" for="factura" id="nombre_fichero">
				</label>
				<p class="guidelines" id="guide_5">
                                    <small>
                                        <?php echo $enviar_factura_explicacion; ?>
                                    </small>
				</p> 
			</li>

                        <!-- Idioma en el que se envía -->
                        <li id="li_6">
                            <label class="description" for="idioma">
                                    <?php echo $enviar_idioma; ?> *
				</label>
				<div>
                                    <select id="idioma" name="idioma" class="element textarea small">
                                        <OPTION VALUE="001">Espa&ntilde;ol</OPTION>
                                        <OPTION VALUE="002">English</OPTION>
                                        <!--OPTION VALUE="003">Catal&aacute;n</OPTION>
                                        <OPTION VALUE="004">Franc&eacute;s</OPTION>
                                        <OPTION VALUE="005">Alem&aacute;n</OPTION>
                                        <OPTION VALUE="007">Italiano</OPTION>
                                        <OPTION VALUE="009">Portugu&eacute;s</OPTION-->
                                    </select>
				</div>
				<p class="guidelines" id="guide_6">
                                    <small>
                                        <?php echo $enviar_idioma_explicacion; ?>
                                    </small>
				</p>
                        </li>

                        <!-- CheckBox de verificación -->
                        <li id="li_7">
                            <label class="description" for="verificacion">
                                    <?php echo $enviar_acepto; ?> *
				</label>
				<div>
                                    <input type="checkbox" name="verificacion"  id="verifica" value="verificacion" onClick="return validamos()">
				</div>
				<p class="guidelines" id="guide_7">
                                    <small>
                                        <?php echo $enviar_acepto_explicacion; ?>
                                    </small>
				</p>
                        </li>

			<!-- BOTÓN -->
			<li class="buttons">
			    <input type="hidden" name="form_id" value="17943" />
                            <input id="saveForm" class="button_text" type="submit" name="submit" value="<?php echo $enviar_boton; ?>" disabled="disabled"/>
			</li>
		</ul>
	</form>	
</div>
<img id="bottom" src="images/bottom.png" alt="">

