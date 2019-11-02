<?php
/**
 * * Descripción: Controlador principal
 * *
 * * Descripción extensa: Iremos añadiendo cosas complejas en PHP.
 * *
 * * @author  Lola <dllido@uji.es> 
 * * @copyright 2018 Lola
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 2
 * */
include_once(plugin_dir_path( __FILE__ ).'gestionBD.php');
$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD); 

$table = "A_GrupoClient";
error_reporting(E_ALL);


//Estas 2 instrucciones me aseguran que el usuario accede a través del WP. Y no directamente
if ( ! defined( 'WPINC' ) ) exit;

if ( ! defined( 'ABSPATH' ) ) exit;

//add_action('admin_post_nopriv_my_datos', 'my_datos');//no autentificados
add_action('admin_post_my_datos', 'my_datos'); 

//Funcion instalación plugin. Crea tabla
function CrearT($table){
    
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD); 
    $query="CREATE TABLE IF NOT EXISTS $table (person_id INT(11) NOT NULL AUTO_INCREMENT, nombre VARCHAR(100),  email VARCHAR(100),  foto_file VARCHAR(25), clienteMail VARCHAR(100),  PRIMARY KEY(person_id))";
    $consult = $pdo->prepare($query);
    $consult->execute (array());

}
function Ejecutar_crearT(){
    CrearT("AAA");
}
register_activation_hook( __FILE__, 'Ejecutar_crearT' );




//CONTROLADOR
//Esta función realizará distintas acciones en función del valor del parámetro
//$_REQUEST['proceso'], o sea se activara al llamar a url semejantes a 
//https://host/wp-admin/admin-post.php?action=my_datos&proceso=r 
//if ( ! function_exists( 'my_datos' ) ) {
function my_datos()
{ 
    global $table;
    global $user_ID , $user_email;
    //my_group_install();
    get_currentuserinfo();
    if ('' == $user_ID) {
                //no user logged in
                exit;
    }

    //if (!(isset($_REQUEST['action'])) or !(isset($_REQUEST['proceso'])))  exit;

    get_header();
    echo '<div class="wrap">';
    switch ($_REQUEST['proceso']) {
    
        case "registro":
            
            ?>
            <h1>GestiÓn de Usuarios </h1>
            <form class="fom_usuario" action="?action=my_datos&proceso=registrar" method="POST">
                <label for="clienteMail">Tu correo</label>
                <br/>
                <input type="text" name="clienteMail"  size="20" maxlength="25" value="<?php print $user_email?>"
                readonly />
                <br/>
                <legend>Datos básicos</legend>
                <label for="nombre">Nombre</label>
                <br/>
                <input type="text" name="userName" class="item_requerid" size="20" maxlength="25" value="<?php print $userName ?>"
                placeholder="Miguel Cervantes" />
                <br/>
                <label for="email">Email</label>
                <br/>
                <input type="text" name="email" class="item_requerid" size="20" maxlength="25" value="<?php print $email ?>"
                placeholder="kiko@ic.es" />
                <br/>
                <input type="submit" value="Enviar">
                <input type="reset" value="Deshacer">
            </form>
            <?php
            break;
        case "registrar":
            if (count($_REQUEST) < 3) {
                print ("No has rellenado el formulario correctamente");
                return;
            }
            $query = "INSERT INTO     $table (nombre, email,clienteMail)
                                VALUES (?,?,?)";            
            try { 
                $a=array ($_REQUEST['userName'], $_REQUEST['email'],$_REQUEST['clienteMail'] );
                print_r ($a);
                $consult = $pdo->prepare($query);
                $a= $consult->execute ($a);
                if (1>$a)echo "InCorrecto";
                } 
            catch (PDOExeption $e) {
                    echo ($e->getMessage());
                }
            print "Operación  correcta";
            break;
        case "listar":
            //Listado amigos o de todos si se es administrador.

            if (1==is_admin()) {$rows=consultar();}
            else {$rows=consultarFiltro("clienteMail", $user_email);}

            if (is_array($rows)) {/* Creamos un listado como una tabla HTML*/
                
                print '<div><table><th>';
                foreach ( array_keys($rows[0])as $key) {
                    echo "<td>", $key,"</td>";
                }
                print "</th>";
                foreach ($rows as $row) {
                    print "<tr>";
                    foreach ($row as $key => $val) {
                        echo "<td>", $val, "</td>";
                    }
                    print "</tr>";
                }
                print "</table></div>";
            }
            break;
        default:
            print "Opción no correcta";
        
    }
    echo "</div>";
    get_footer();
    }
//}
//add_action('admin_post_nopriv_my_datos', 'my_datos');
//add_action('admin_post_my_datos', 'my_datos'); //no autentificados
?>