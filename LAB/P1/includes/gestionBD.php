<?php
include(dirname(__FILE__)."/../../../wp-config.php");

$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);  
function insertar($pdo,$table,$valor) {
    $query = "INSERT INTO    $table (nombre) VALUES (?)";
    $consult = $pdo->prepare($query);
    $a=$consult->execute(array($valor)); 
    if (1>$a)echo "InCorrecto";
                     
}
function borrar($pdo,$table,$valor) {
    $query = "DELETE   FROM   $table WHERE client_id =(?)";
    $consult = $pdo->prepare($query);
    $a=$consult->execute(array($valor)); 
    if (1>$a) echo "InCorrecto1";
                     
}

function consultar($pdo,$table) {
    $query = "SELECT     * FROM       $table "; 
    $consult = $pdo->prepare($query);
    $a=$consult->execute(array());
    if (1>$a)echo "InCorrecto2";
    return ($consult->fetchAll(PDO::FETCH_ASSOC)); 
  
}

function creatablaUsuarios($pdo,$table){
/*CREATE TABLE cliente(
        client_id INT NOT NULL,
        name CHAR(50) NOT NULL,
        surname CHAR(50) NOT NULL,
        address CHAR(50),
        city CHAR(50),
        zip_code CHAR(5),
        foto_file VARCHAR(25),
        CONSTRAINT client_pk PRIMARY KEY(client_id)
    );
    */
    $query="CREATE TABLE IF NOT EXISTS $table (client_id INT(11) NOT NULL AUTO_INCREMENT,
             nombre VARCHAR(100), apellidos VARCHAR(100), email VARCHAR(100), dni VARCHAR(15) ,clave VARCHAR(25), foto_file VARCHAR(25),   PRIMARY KEY(client_id))";
    //echo $query;
    $pdo->exec($query);
}



 ?>
