<?php
include("./gestionBD.php");


/**
 * * Descripción: Actualizar datos de usuario
 * *
 * * Descripción extensa: Iremos añadiendo cosas complejas en PHP.
 * *
 * * @author  Taras <al361933@uji.es> <fulanito@example.com>
 * * @copyright 2019 Taras
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 2

 * */


function handler($pdo,$table)
{
    
    $datos = $_REQUEST;
    if (count($_REQUEST) < 6) {
        $data["error"] = "No has rellenado el formulario correctamente";
        return;
    }
    $query = "UPDATE $table SET nombre = ?, apellidos = ?, email= ?, dni = ?, clave = ?,  foto_file = ? WHERE client_id=? ";
    
    echo $query;
    try { 
        $a=array($_REQUEST['userName'], $_REQUEST['userSurname'], $_REQUEST['email'], $_REQUEST['dni'], $_REQUEST['passwd'] , $_REQUEST['photo'], $_REQUEST['client_id'] );
        print_r ($a);
        
        $consult = $pdo->prepare($query);
        $a=$consult->execute(array($_REQUEST['userName'], $_REQUEST['userSurname'], $_REQUEST['email'], $_REQUEST['dni'], $_REQUEST['passwd'], $_REQUEST['photo'], $_REQUEST['client_id'] ));
        if (1>$a)echo "InCorrecto";
    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
}

$table = "A_cliente";
handler( $pdo,$table);
?>