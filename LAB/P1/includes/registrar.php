<?php
include("./gestionBD.php");

/**
* Descripción: Insercion de usuarios en base de datos a traves de datos obtenidos por formulario
*@title: Formulario de insercion de usuarios
* @author Ivan <al362851@uji.es> * @copyright 2019 Ivan
* @license CC-BY-NC-SA
*/


function handler($pdo,$table)
{
    $datos = $_REQUEST;
    if (count($_REQUEST) < 6) {
        $data["error"] = "No has rellenado el formulario correctamente";
        return;
    }
    $query = "INSERT INTO     $table (nombre,apellidos,email,dni,clave,foto_file)
                        VALUES (?,?,?,?,?,?)";
                       
    echo $query;
    try { 
        $a=array($_REQUEST['userName'], $_REQUEST['userSurname'], $_REQUEST['email'], $_REQUEST['dni'], $_REQUEST['passwd'] , $_REQUEST['photo'] );
        print_r ($a);
        $consult = $pdo->prepare($query);
        $a=$consult->execute(array($_REQUEST['userName'], $_REQUEST['userSurname'], $_REQUEST['email'], $_REQUEST['dni'], $_REQUEST['passwd'] , $_REQUEST['photo']  ));
        if (1>$a)echo "InCorrecto";
    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
}

$table = "A_cliente";
var_dump($_POST);
handler( $pdo,$table);
?>