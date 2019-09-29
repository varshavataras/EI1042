<main>
	<h1>Gestion de Usuarios </h1>
	<form class="fom_usuario" action="?action=controlForm" method="POST">
		<?php 
		$nombre="";
		$apellido="";
		?>
		<fieldset>
			<legend>Datos básicos</legend>
			<label for="nombre">Nombre</label>
			<br/>
			<input type="text" name="nombre" class="item_requerid" size="20" maxlength="25" value="<?php print $nombre ?>"
			 placeholder="Miguel" />
			<br/>
			<label for="apellidos">Apellidos</label>
			<br/>
			<input type="text" name="apellido" class="item_requerid" size="20" maxlength="25" value="<?php print $apellido ?>"
			 placeholder="Cervantes" />
			<br/>
		</fieldset>
		<input type="submit" value="Enviar">
		<input type="reset" value="Deshacer">
	</form>
</main>