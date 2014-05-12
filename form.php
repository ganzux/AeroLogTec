<form name="form1" method="post" action="checklogin.php">
	<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
		<tr>
			<td>
				<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
					<tr>
						<td colspan="2"> <strong> <?php echo $inicio_titulo;?> </strong></td>
					</tr>
					<tr>
						<td width="30%"> <?php echo $inicio_usuario;?> </td>
						<td width="70%"><input name="usuario" type="text" id="usuario"></td>
					</tr>
					<tr>
						<td><?php echo $inicio_password;?></td>
						<td><input name="pass" type="password" id="pass"></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input type="submit" name="Submit" value="<?php echo $inicio_boton;?>"></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</form>