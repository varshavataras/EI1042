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
    $query = "DELETE   FROM   $table WHERE client_id = ?";
                       
    echo $query;
    try { 
        $a=array($_REQUEST['client_id']);
        print_r ($a);
        $consult = $pdo->prepare($query);
        $a=$consult->execute(array($_REQUEST['client_id']));
        if (1>$a)echo "InCorrecto";
    else{
        echo "CORRECTO";
    }
    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
}

$table = "A_cliente";
handler( $pdo,$table);
?>