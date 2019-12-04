<?php
	
	if(isset($_POST['enviar'])){
		$imagen=$_POST['foto_file'];
		$nombre=$_POST['userName'];
		if (empty($imagen)){
			echo "<p>AGREGA UNA FOTO PARA EL USUARIO</p>";	
		}
		if (empty($nombre)){
			echo "<p>AGREGA UNA FOTO PARA EL USUARIO</p>";	
		}
	}
	
 ?>
