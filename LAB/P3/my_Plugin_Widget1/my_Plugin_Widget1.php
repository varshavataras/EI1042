<?php
/*
Plugin Name: my_Plugin_Widget1
Description: Este plugin añade un widget que pone un título y una descripción.
Author: dllido
Author Email: dllido@uji.es
Version: 1.0
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/


// Registramos el widget
function load_my_widget() {
	register_widget( 'my_widget1' );
}
add_action( 'widgets_init', 'load_my_widget' );

// Creamos el widget 
class my_widget1 extends WP_Widget {

public function __construct() {
		$widget_ops = array( 
			'classname' => 'my_widget',
			'description' => 'My Widget is awesome',
		);
		parent::__construct( 'my_widget1', 'My Widget1', $widget_ops );
	}	


// Creamos la parte pública del widget

public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
$direccion = apply_filters( 'widget_title', $instance['direccion'] );

// los argumentos del antes y después del widget vienen definidos por el tema
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
if ( ! empty( $direccion ) )
echo $args['before_direccion'] . $direccion . $args['after_direccion'];

// Aquí es donde debemos introducir el código que queremos que se ejecute
echo 'Hola Mundo' ;
echo $args['after_widget'];
}
		
// Backend  del widget
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'Titulo', 'my_widget_domain' );

}
	
if ( isset( $instance[ 'direccion' ] ) ) {	
$direccion = $instance[ 'direccion' ];
}
else{
$direccion = __( 'Dirección', 'my_widget_domain' );	
}	
// Formulario del backend
 ?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Titulo:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'direccion' ); ?>"><?php _e( 'Dirección:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'direccion' ); ?>" name="<?php echo $this->get_field_name( 'direccion' ); ?>" type="text" value="<?php echo esc_attr( $direccion ); ?>" />
</p>
<?php	
}
// Actualizamos el widget reemplazando las viejas instancias con las nuevas
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['direccion'] = ( ! empty( $new_instance['direccion'] ) ) ? strip_tags( $new_instance['direccion'] ) : '';
return $instance;
}
} // La clase wp_widget termina aquí
?>
