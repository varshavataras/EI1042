<!--/**
*@title: Formulario de insercion de usuarios
* @author Ivan <al362851@uji.es> * @copyright 2019 Ivan
* @license CC-BY-NC-SA
*/
-->

<main>
	<h1>GestiÓn de Usuarios </h1>
	<form class="fom_usuario" action="?action=registrar" method="POST">
		<?php 
		$userName="";
		$userSurname="";
		$email="";
		$dni="";
		$passwd="";
		$photo="";
		?>
		<legend>Datos básicos</legend>
		<label for="nombre">Nombre</label>
		<br/>
		<input type="text" name="userName" class="item_requerid" size="20" maxlength="25" value="<?php print $userName ?>"
		 placeholder="Miguel" />
		<br/>
		<label for="apellidos">Apellidos</label>
		<br/>
		<input type="text" name="userSurname" class="item_requerid" size="20" maxlength="40" value="<?php print $userSurname ?>"
		 placeholder="Cervantes Garcia" />
		<br/>
		<label for="email">Email</label>
		<br/>
		<input type="text" name="email" class="item_requerid" size="20" maxlength="25" value="<?php print $email ?>"
		 placeholder="kiko@ic.es" />
		<br/>
		<label for="dni">DNI</label>
		<br/>
		<input type="text" name="dni" class="item_requerid" size="20" maxlength="25" value="<?php print $dni ?>"
		 placeholder="12345678A" />
		<br/>
		<label for="passwd">Clave</label>
		<br/>
		<input type="password" name="passwd" class="item_requerid" size="8" maxlength="25" value="<?php print $passwd ?>"
		/>
		<br/>
		<label for="photo">Foto</label>
		<br/>
		<input type="text" name="photo" class="item_requerid" size="20" maxlength="40" value="<?php print $photo ?>"
		 placeholder="foto.jpg" />
		<br/>
		<input type="submit" value="Enviar">
		<input type="reset" value="Deshacer">
	</form>
</main>