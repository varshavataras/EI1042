<?php
include("./gestionBD.php");


function handler($pdo,$table)
{
    
    $objeto=consultarJson($pdo,$table);
    
    $rows=json_decode($objeto,true);

    
  
    print '<table><thead>';
    foreach ( array_keys($rows[0])as $key) {
        echo "<th>", $key,"</th>";
    }
    print "</thead>";
    foreach ($rows as $row) {
        print "<tr>";
        foreach ($row as $key => $val) {
            echo "<td>", $val, "</td>";
        }
        $cliente = $row["client_id"];
        echo "<td>", "<a href=?action=update&client_id=$cliente>Actualizar</a>", "</td>";
        echo "<td>", "<a href=?action=delete&client_id=$cliente>Borrar</a>", "</td>";
        print "</tr>";
    }
    print "</table>";
    
}


$table = "A_cliente";

try{handler($pdo,$table);}
catch (PDOException $e) {
echo "Failed to get DB handle: " . $e->getMessage() . "\n";
exit;
}

    ?>
