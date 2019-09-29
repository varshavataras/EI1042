<?php
include("./gestionBD.php");

/**
* Descripción: Borrado de usuarios en base de datos a traves del identificadorde usuario introducido por formulario
*@title: Formulario de borrado de usuarios
* @author Ivan <al362851@uji.es> * @copyright 2019 Ivan
* @license CC-BY-NC-SA
*/


function handler($pdo,$table)
{
    $datos = $_REQUEST;
    if (count($_REQUEST) < 12) {
        $data["error"] = "No has rellenado el formulario correctamente";
        return;
    }
    $query = "DELETE   FROM   $table WHERE client_id =(?)";
                       
    echo $query;
    try { 
        $a=array($_REQUEST['client_id']);
        print_r ($a);
        $consult = $pdo->prepare($query);
        $a=$consult->execute(array($_REQUEST['client_id']));
        if (1>$a)echo "InCorrecto";
    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
}

$table = "A_cliente";
var_dump($_POST);
handler( $pdo,$table);
?>