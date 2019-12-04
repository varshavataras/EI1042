<?php
	
	if(isset($_POST['submit'])){
		$imagen=$_POST['foto_file'];
		if (empty($imagen)){
			echo "<p>AGREGA UNA FOTO PARA EL USUARIO";	
		}
	}
	
 ?>
