<?php
    //view_form.php

/**
 * * Descripción: Controlador principal
 * *
 * * Descripción extensa: Iremos añadiendo cosas complejas en PHP.
 * *
 * * @author  Taras <al361933@uji.es> <fulanito@example.com>
 * * @copyright 2019 Taras
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 2

 * */

//echo $_SERVER['DOCUMENT_ROOT']."/partials/footer.php";
$central = "/../partials/centralForm.php";
if (isset($_REQUEST['action'])) $action = $_REQUEST["action"];
else $action = "home";

switch ($action) {
    case "home":

        $central = "/../partials/centralForm.php";

        break;
    case "controlForm":
        $central = "/controlForm.php";
        break;
    case "crearTabla":
        $central = "/crearTabla.php";
        break;

    case "registro":
         $central = "/../partials/registerForm.php";
        break;
    case "registrar":
        $central = "/registrar.php";
        break;
    case "listar":
        $central = "/listar.php";
        break;
		
    case "listarJson": 
        $central = "/listarJson.php";
        break;
        
	case "borrar":
		$central = "/../partials/deleteForm.php";
        break;
        
	case "delete":
		$central = "/borrar.php";
        break;
        
    case "update":
		$central = "/../partials/updateForm.php";
        break;

    case "actualizar":
		$central = "/update.php";
        break;
        
    default:
        $data["error"] = "Accion No permitida";
        $central = "/../partials/centralForm.php";
}
include(dirname(__FILE__)."/../partials/header.php");
include(dirname(__FILE__)."/../partials/menu.php");
include(dirname(__FILE__).$central);
include(dirname(__FILE__)."/../partials/footer.php");
?>
