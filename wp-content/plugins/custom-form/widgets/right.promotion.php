<?php
/**
 * Adds Right_Promotion widget.
 */
class Right_Promotion extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Right_Promotion', // Base ID
			__( 'Right Promotion', 'text_domain' ), // Name
			array( 'description' => __( 'Right Promotion', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		// echo $args['before_widget'];
		// if ( ! empty( $instance['title'] ) ) {
			// echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		// }
		global $wpdb;
		$post_id = $instance['post_id'];
		$post_1 = get_post($post_id);
		//var_dump($post_1);
		if($post_1)
		{
			?>
			<section id="right-promotion" class="widget">
				<!--<h3 class="widget-title"><a><?php echo $instance['title']; ?></a></h3>-->
				<div><?php echo $post_1->post_content; ?></div>
			</section>
			
			<?php
		}
		
		
		
		// echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		$post_id = ! empty( $instance['post_id'] ) ? $instance['post_id'] : __( '0', 'text_domain' );
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'post_id' ); ?>"><?php _e( 'post_id:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'post_id' ); ?>" name="<?php echo $this->get_field_name( 'post_id' ); ?>" type="text" value="<?php echo esc_attr( $post_id ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['post_id'] = ( ! empty( $new_instance['post_id'] ) ) ? strip_tags( $new_instance['post_id'] ) : '';

		return $instance;
	}

} // class Foo_Widget

// register Foo_Widget widget
function register_right_promotion_widget() {
    register_widget( 'Right_Promotion' );
}
add_action( 'widgets_init', 'register_right_promotion_widget' );
?>