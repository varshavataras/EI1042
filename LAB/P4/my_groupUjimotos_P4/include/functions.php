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


//Estas 2 instrucciones me aseguran que el usuario accede a través del WP. Y no directamente
if ( ! defined( 'WPINC' ) ) exit;

if ( ! defined( 'ABSPATH' ) ) exit;




//Funcion instalación plugin. Crea tabla
function UjiMotos_MP_CrearT($tabla){
    $MP_pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD); 
    $query="CREATE TABLE IF NOT EXISTS $tabla (person_id INT(11) NOT NULL AUTO_INCREMENT, nombre VARCHAR(100),  email VARCHAR(100),  foto_file VARCHAR(100), clienteMail VARCHAR(100),  PRIMARY KEY(person_id))";
    $consult = $MP_pdo->prepare($query);
    $consult->execute (array());
}


function UjiMotos_MP_Update_Form($consulta)
{
	$client_id=$consulta[0]["person_id"];
	$client_name=$consulta[0]["nombre"];
	$client_email=$consulta[0]["email"];
	$client_fotofile=$consulta[0]["foto_file"];
	$client_mail=$consulta[0]["clienteMail"];
?>

<form class="fom_usuario" id="formularioUpdate" action="?action=my_datos_ujimotos&proceso_ujimotos=actualizar_ujimotos" method="POST" enctype="multipart/form-data">
	<label for="client_id">ID</label>
		<br/>
		<input type="text" name="client_id" class="item_requerid" size="20" maxlength="25" value="<?php print $client_id ?>"
		 placeholder=""  readonly />
		<br/>
	<label for="client_name">Nombre</label>
		<br/>
		<input type="text" name="client_name" class="item_requerid" size="20" maxlength="25" value="<?php print $client_name ?>"
		 placeholder=""  />
		<br/>
	<label for="client_email">Email</label>
		<br/>
		<input type="text" name="client_email" class="item_requerid" size="20" maxlength="25" value="<?php print $client_email ?>"
		 placeholder=""  />
		<br/>
	<label for="client_fotofile">Foto</label>
 <p><img id="img_foto" src="" width="100" height="60"></p>
    <br/>
	<input type="file" name="foto_file" id="foto_file" value="<?php print $client_fotofile ?>" required/>
		<br/>
	<label for="client_mail">Añadido por</label>
		<br/>
		<input type="text" name="client_mail" class="item_requerid" size="20" maxlength="25" value="<?php print $client_mail ?>"
		 placeholder="" readonly />
	
		<br/>
	<input type="submit" value="Enviar" onclick="return comprueba_extension(this.form, this.form.client_fotofile.value)"/> 
        <input type="reset" value="Deshacer"/>
</form>

<script type="text/javascript" charset="utf-8">

ready();

</script>



<?php	
}


function UjiMotos_MP_Register_Form($MP_user , $user_email)
{//formulario registro amigos de $user_email



    ?>
    
    <h1>Gestión de Usuarios </h1>
    <form class="fom_usuario" id="formularioRegistro"  action="?action=my_datos_ujimotos&proceso_ujimotos=registrar_ujimotos" method="POST" enctype="multipart/form-data" >
        <label for="clienteMail">Tu correo</label>
        <br/>
        <input type="text" name="clienteMail"  size="20" maxlength="25" value="<?php print $user_email?>"
        readonly required/>
        <br/>
        <legend>Datos básicos</legend>
        <label for="nombre">Nombre</label>
        <br/>
        <input type="text" name="userName" class="item_requerid" size="20" maxlength="25" value="<?php print $MP_user["userName"] ?>"
        placeholder="Nombre" required/>
        <br/>
        <label for="email">Email</label>
        <br/>
        <input type="text" name="email" class="item_requerid" size="20" maxlength="25" value="<?php print $MP_user["email"] ?>"
        placeholder="mail@example.com" required/>
        <br/>
        <label for="foto_file">Foto</label>
	<p> <img id="img_foto" src="" width="100" height="60"></p>
        <br/>
        <input type="file" name="foto_file" id="foto_file" value="<?php print $MP_user["foto_file"] ?>"
         />
	
        <p>
        <input type="submit" value="Enviar" onclick="return comprueba_extension(this.form, this.form.foto_file.value)" >
        <input type="reset" value="Deshacer">
		

		
    </form>
	
	
    <script type="text/javascript" charset="utf-8">

	ready();

    </script>	

<?php
}

?>
<script type="text/javascript" charset="utf-8">

function mostrarFoto(file, imagen) {
    var reader = new FileReader();
    reader.addEventListener("load", function () {
        imagen.src = reader.result;
    });
    reader.readAsDataURL(file);
}

function ready() {
    var fichero = document.querySelector("#foto_file");
    var imagen = document.querySelector("#img_foto");
    fichero.addEventListener("change", function (event) {
        mostrarFoto(this.files[0], imagen);
    });
}
ready();

function comprueba_extension(formulario, archivo) {
   
    extensiones_permitidas = new Array(".jpeg", ".jpg");
    var img = document.getElementById("img_foto");

    if (!archivo) {
        //Si no existe archivo, es que no se ha seleccionado un archivo en el formulario
        alert("No has seleccionado ningún archivo");
        return false;
    }

    else{
        //saco la extensión de este nombre de archivo
        extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase();
        
        if(extension != '.jpeg' && extension != '.jpg'){
            alert("Sólo se pueden subir archivos con extensiones JPEG o JPG");
            return false;
        }

        if (img.naturalHeight > 1200 || img.naturalWidth > 1600){
            alert("Sólo se admiten dimensiones menores a 1200x1600");
            alert("Esta imagen mide "+img.naturalHeight+" de altura y "+img.naturalWidth+" de anchura")
            return false;
        }

        else{
        //enviamos el formulario
        formulario.submit();
        return true;
        }
    }

} 





</script>

<?php



//CONTROLADOR
//Esta función realizará distintas acciones en función del valor del parámetro
//$_REQUEST['proceso'], o sea se activara al llamar a url semejantes a 
//https://host/wp-admin/admin-post.php?action=my_datos&proceso=r 

function UjiMotos_MP_my_datos()
{ 
    global $user_ID , $user_email,$table;
    
    $MP_pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD); 
    wp_get_current_user();
    if ('' == $user_ID) {
                //no user logged in
                exit;
    }
    
    
    
    if (!(isset($_REQUEST['action'])) or !(isset($_REQUEST['proceso_ujimotos']))) { print("Opciones no correctas $user_email"); exit;}

    get_header();
    echo '<div class="wrap">';

    switch ($_REQUEST['proceso_ujimotos']) {
        
	case "modificar_ujimotos":
		$person=$_REQUEST['id'];
		$a=array();
            	$campo="person_id";
                $query = "SELECT     * FROM  $table      WHERE $campo =?";
                $a=array( $person);
            
            $consult = $MP_pdo->prepare($query);
            $a=$consult->execute($a);
            $rows=$consult->fetchAll(PDO::FETCH_ASSOC);
			
            if (is_array($rows)) {/* Creamos un listado como una tabla HTML*/
               	
				echo "<div>","<table><tr>";
				
				
                foreach ( array_keys($rows[0])as $key) {
					
                    echo "<th>",$key,"</th>";
                }
				
				print "</tr>";
                
                foreach ($rows as $row) {
                    print "<tr>";
                    foreach ($row as $key => $val) {
                        if ($key == 'foto_file'){
                            echo "<td>",'<img src="'.$val.'" />',"</td>";
                        }
                        else{
                            echo "<td>", $val, "</td>";
                        }
                    }
                    print "</tr>";
                }
                print "</table></div>";
            }
            else{echo "No existen valores";}
            break; 
		    
	case "modificar_ujimotos1":
		
        $person=$_REQUEST['id'];
		$a=array();
            	$campo="person_id";
                $query = "SELECT     * FROM  $table      WHERE $campo =?";
                $a=array( $person);
            
		    
			    
		    
            $consult = $MP_pdo->prepare($query);
            $a=$consult->execute($a);
            $rows=$consult->fetchAll(PDO::FETCH_ASSOC);
		    UjiMotos_MP_Update_Form($rows);
		
		
            break; 
		    
            case "actualizar_ujimotos":
		$cliente=$_REQUEST['client_id'];
		$foto_vieja = ("SELECT foto_file FROM $table WHERE person_id='$cliente'");
		if (file_exists($foto_vieja)) {
        		unlink($foto_vieja);
    		} 
		
                $fotoURL="";
                $IMAGENES_USUARIOS = '../fotos/';
                if(array_key_exists('foto_file', $_FILES) && $_POST['client_email']){
                    $fotoURL = $IMAGENES_USUARIOS.$_POST['client_name']."_".$_FILES['foto_file']['name'];
                    if (move_uploaded_file($_FILES['foto_file']['tmp_name'],$fotoURL)){
                        echo "foto subida con éxito";
			
                    }
                }
                $query = "UPDATE $table SET nombre = ?, email= ?,  foto_file = ? WHERE person_id=? ";        
                $a=array($_REQUEST['client_name'], $_REQUEST['client_email'], $fotoURL,$_REQUEST['client_id'] );
                //$pdo1 = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD); 
                $consult = $MP_pdo->prepare($query);
                $a=$consult->execute($a);
                if (1>$a) {echo "InCorrecto $query";}
                else wp_redirect(admin_url( 'admin-post.php?action=my_datos_ujimotos&proceso_ujimotos=listar_ujimotos'));
                break;  
    
        case "registro_ujimotos":
            $MP_user=null; //variable a rellenar cuando usamos modificar con este formulario
            UjiMotos_MP_Register_Form($MP_user,$user_email);
            break;

        case "registrar_ujimotos":
            
            $MP_user=null;
            $nombreuser=$_REQUEST['userName'];
            $emailuser=$_REQUEST['email'];
            
            
            
            if($nombreuser == ""){
                echo "<div>El campo nombre no puede estar vacío</div>";
                UjiMotos_MP_Register_Form($MP_user,$user_email);
                break;  
            }
            if($emailuser == ""){
                echo "<div>El campo de email no puede estar vacío</div>";
                UjiMotos_MP_Register_Form($MP_user,$user_email);
                break;  

            }

            $fotoURL="";
            $IMAGENES_USUARIOS = '../fotos/';
            if(array_key_exists('foto_file', $_FILES) && $_POST['email']){
                $fotoURL = $IMAGENES_USUARIOS.$_FILES['foto_file']['name'];
                if (move_uploaded_file($_FILES['foto_file']['tmp_name'],$fotoURL)){
                    echo "foto subida con éxito";
                }
            }
            $query = "INSERT INTO $table (nombre, email,foto_file,clienteMail) VALUES (?,?,?,?)";         
            $a=array($_REQUEST['userName'], $_REQUEST['email'], $fotoURL,$_REQUEST['clienteMail'] );
            //$pdo1 = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD); 
            $consult = $MP_pdo->prepare($query);
            $a=$consult->execute($a);
            if (1>$a) {echo "InCorrecto $query";}
            else wp_redirect(admin_url( 'admin-post.php?action=my_datos_ujimotos&proceso_ujimotos=listar_ujimotos'));
            break;

        case "listar_ujimotos":
			
            //Listado amigos o de todos si se es administrador.
            $a=array();
            if (current_user_can('administrator')) {$query = "SELECT   *  FROM       $table ";}
            else {$campo="clienteMail";
                $query = "SELECT     * FROM  $table      WHERE $campo =?";
                $a=array( $user_email);
 
            } 
            
            $consult = $MP_pdo->prepare($query);
            $a=$consult->execute($a);
            $rows=$consult->fetchAll(PDO::FETCH_ASSOC);
			
            if (is_array($rows)) {/* Creamos un listado como una tabla HTML*/
               	
				echo "<div>","<table><tr>";
				
				
                foreach ( array_keys($rows[0])as $key) {
					
                    echo "<th>",$key,"</th>";
                }
				
				print "</tr>";
                
                foreach ($rows as $row) {
                    print "<tr>";
                    foreach ($row as $key => $val) {
                        if ($key == 'foto_file'){
                            echo "<td>",'<img src="'.$val.'" />',"</td>";
                        }
                        else{
                            echo "<td>", $val, "</td>";
                        }
                    }
                    print "</tr>";
                }
                print "</table></div>";
            }
            else{echo "No existen valores";}
            break;
        default:
            print "Opción no correcta";
        
    }
    echo "</div>";
    // get_footer ademas del pie de página carga el toolbar de administración de wordpres si es un 
    //usuario autentificado, por ello voy a borrar la acción cuando no es un administrador para que no aparezca.
    if (!current_user_can('administrator')) {

        // for the admin page
        remove_action('admin_footer', 'wp_admin_bar_render', 1000);
        // for the front-end
        remove_action('wp_footer', 'wp_admin_bar_render', 1000);
    }

    get_footer();
    }
//add_action('admin_post_nopriv_my_datos', 'my_datos');
//add_action('admin_post_my_datos', 'my_datos'); //no autentificados
?>
