<!--/**

/**
 * * Descripción: Formulario actualización de datos de usuario
 * *
 * * Descripción extensa: Iremos añadiendo cosas complejas en PHP.
 * *
 * * @author  Taras <al361933@uji.es> <fulanito@example.com>
 * * @copyright 2019 Taras
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 2

 * */
-->

<main>
	<h1>Gestión de Usuarios </h1>
	<form class="fom_usuario" action="?action=actualizar" method="POST">

        <?php

        include("C:\wamp64\www\wp\EI1042\LAB\P1\includes\gestionBD.php");
        
        
        $table = "A_cliente";

        $consulta=consultarId($pdo,$table,$_GET['client_id']);
        
        
		$client_id=$consulta[0]["client_id"];
		$userName=$consulta[0]["nombre"];
		$userSurname=$consulta[0]["apellidos"];
		$email=$consulta[0]["email"];
		$dni=$consulta[0]["dni"];
		$passwd=$consulta[0]["clave"];
		$photo=$consulta[0]["foto_file"];
		?>

		<legend>Datos básicos</legend>
		<label for="client_id">ID</label>
		<br/>
		<input type="text" name="client_id" class="item_requerid" size="20" maxlength="25" value="<?php print $client_id ?>"
		 placeholder=""  readonly />
		<br/>
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