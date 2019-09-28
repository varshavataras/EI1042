<!DOCTYPE html>
<html>
<!--**
 * * Descripción: Procesa formulario 0
 * *
 * * 
 * * @author  Lola <dllido@uji.es>
 * * @version 1
 * *  * * -->
<head>
	<meta charset="UTF-8">
	<title>Bienvenido </title>
	<META name="Author" content="dllido">
</head>


<body>
<p>
<?php

$conf= $_REQUEST["conf"];
print "-".$conf."-</p>";
if ($conf=="S") phpinfo();
?>
</body>
</html>