<!--/**
*@title: Formulario de insercion de usuarios
* @author Ivan <al362851@uji.es> * @copyright 2019 Ivan
* @license CC-BY-NC-SA
*/
-->

<main>
	<h1>Borrado de usuario </h1>
	<form class="form_usuario" action="?action=delete" method="GET">
		<fieldset>
		<legend>Datos básicos</legend>
		<label for="nombre">Identificador del cliente</label>
		<br/>
		<input type="text" name="client_id" class="item_requerid" size="20" maxlength="25" value="<?php print $client_id ?>"
		  />
		<br/>
		<br/>
		</fieldset>
		<input type="submit" value="Eliminar">
		<input type="reset" value="Deshacer">
	</form>
</main>