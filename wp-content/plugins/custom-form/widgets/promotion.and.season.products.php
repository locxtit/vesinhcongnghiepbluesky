<?php
/**
 * Adds Foo_Widget widget.
 */
class Promotion_And_Season_Products_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'promotion_and_season_products_widget', // Base ID
			__( 'Promotion And Season Products', 'text_domain' ), // Name
			array( 'description' => __( 'Promotion And Season Products', 'text_domain' ), ) // Args
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
		$iframeUrl = WP_BACKEND_URL.$instance['iframeUrl'];
		$ifWidth = $instance['ifWidth'];
		$ifHeight = $instance['ifHeight'];
		?>
		<iframe id="boxPromotionAndSeasonProducts" name="boxPromotionAndSeasonProducts" src="<?php echo $iframeUrl;?>" width="<?php echo $ifWidth; ?>" height="<?php echo $ifHeight; ?>" style="margin: 0;  border: none; overflow: hidden;" scrolling="no"></iframe>
		<?php
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$iframeUrl = ! empty( $instance['iframeUrl'] ) ? $instance['iframeUrl'] : __( 'New title', 'text_domain' );
		$ifWidth = ! empty( $instance['ifWidth'] ) ? $instance['ifWidth'] : __( '100%', 'text_domain' );
		$ifHeight = ! empty( $instance['ifHeight'] ) ? $instance['ifHeight'] : __( '100', 'text_domain' );
		
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'iframeUrl' ); ?>"><?php _e( 'Iframe Url:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'iframeUrl' ); ?>" name="<?php echo $this->get_field_name( 'iframeUrl' ); ?>" type="text" value="<?php echo esc_attr( $iframeUrl ); ?>">
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'ifWidth' ); ?>"><?php _e( 'Width:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'ifWidth' ); ?>" name="<?php echo $this->get_field_name( 'ifWidth' ); ?>" type="text" value="<?php echo esc_attr( $ifWidth ); ?>">
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'ifHeight' ); ?>"><?php _e( 'Height:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'ifHeight' ); ?>" name="<?php echo $this->get_field_name( 'ifHeight' ); ?>" type="text" value="<?php echo esc_attr( $ifHeight ); ?>">
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
		$instance['iframeUrl'] = ( ! empty( $new_instance['iframeUrl'] ) ) ? strip_tags( $new_instance['iframeUrl'] ) : '';
		$instance['ifWidth'] = ( ! empty( $new_instance['ifWidth'] ) ) ? strip_tags( $new_instance['ifWidth'] ) : '';
		$instance['ifHeight'] = ( ! empty( $new_instance['ifHeight'] ) ) ? strip_tags( $new_instance['ifHeight'] ) : '';

		return $instance;
	}

} // class Foo_Widget

// register Foo_Widget widget
function register_promotion_and_season_products_widget() {
    register_widget( 'Promotion_And_Season_Products_Widget' );
}
add_action( 'widgets_init', 'register_promotion_and_season_products_widget' );
?>