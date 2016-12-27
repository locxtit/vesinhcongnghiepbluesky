<?php
/**
 * Adds Foo_Widget widget.
 */
class World_Tour_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'world_tour_widget', // Base ID
			__( 'World Tour', 'text_domain' ), // Name
			array( 'description' => __( 'World Tour Widget', 'text_domain' ), ) // Args
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
		$asiaCategory = get_category_by_slug($instance['asia']);
		$euroCategory = get_category_by_slug($instance['euro']);
		$americaCategory = get_category_by_slug($instance['america']);
		$africaCategory = get_category_by_slug($instance['africa']);
		$australiaCategory = get_category_by_slug($instance['australia']);
		$postvideoslug = $instance['postvideoslug'];
		
		$params=array(
		  'name' => $postvideoslug,
		  'post_type' => 'post',
		  'post_status' => 'publish',
		  'posts_per_page' => 1,
		  'caller_get_posts'=> 1
		);
		
		$my_query = null;
		$my_query = new WP_Query($params);
		
		
		$listCat = array(1=>$asiaCategory,2=>$euroCategory,3=>$americaCategory,4=>$africaCategory,5=>$australiaCategory);
		$continents = array(1=>$instance['asia'],2=>$instance['euro'],3=>$instance['america'],4=>$instance['africa'],5=>$instance['australia']);
		?>
		<div class="container">
			<div class="row">
				<div class="col-md-8">
                	<h3 class="h3-title-the-world">Du lịch vòng quanh thế giới</h3>
					<ul id="tabs" class="nav nav-tabs ul-tabs" data-tabs="tabs">
						<li class="active"><a href="#<?php echo $instance['asia']?>" data-toggle="tab">Châu Á</a></li>
						<li><a href="#<?php echo $instance['euro']?>" data-toggle="tab">Châu Âu</a></li>
						<li><a href="#<?php echo $instance['america']?>" data-toggle="tab">Châu Mỹ</a></li>
						<li><a href="#<?php echo $instance['africa']?>" data-toggle="tab">Châu Phi</a></li>
						<li><a href="#<?php echo $instance['australia']?>" data-toggle="tab">Châu Úc</a></li>
					</ul>
					<div id="my-tab-content" class="tab-content">
					<?php
						for($i = 1;$i<= count($listCat);$i++)
						{
							$showposts = 4;
							$args = array('cat' => $listCat[$i]->cat_ID, 'orderby' => 'post_date', 'order' => 'DESC', 'posts_per_page' => $showposts,'post_status' => 'publish');
							$myposts = get_posts( $args );
							$tabActiveClass = $i==1? 'active': '';
							global $post;
							
							?>
							<div class="tab-pane <?php echo $tabActiveClass;?>" id="<?php echo $continents[$i]?>">
								<div class="row World_Tour">
								<?php
									if(count($myposts) == 0)
									{
										echo '<div class="col-md-12"><p>Không có tour!</p></div>';
									}
									else
									{
										$isFirst = true;
										foreach( $myposts as $post ) : setup_postdata($post);
										global $more; $more = 0;
										?>
										<?php if($isFirst){?>
											<div class="col-md-6">
											<figure>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<?php if(has_post_thumbnail()){
													
													the_post_thumbnail();
												}
												else{
													the_content('');
												}
												
											?>
											</a>
											</figure>
											<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
											<p><?php the_excerpt(); ?></p>
										</div>
										<?php $isFirst = false;
										?>
										<div class="col-md-6">
											<ul class="top-list">
										<?php
										
										}
											else{
											?>
											<li>
												<figure>
													<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
													<?php if(has_post_thumbnail()){
													
														the_post_thumbnail();
														}
														else{
															the_content('');
														}
													?>
												</a>
												</figure>
												<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
												<p><?php $excerpt = get_the_excerpt(); echo $excerpt; ?></p>
											</li>
											<?php
											}
										?>
										<?php endforeach; ?>
										<?php if(!$isFirst){ ?>
											</ul>
											<a href="/category/world-tour/<?php echo $continents[$i];?>" title="Xem thêm" class="xem-them">Xem thêm</a>
											</div>
										<?php }//end check not first?>
											
										<?php
									}//end check has post
								?>
								</div>
							</div>
						<?php
						}//end for
					?>
					</div>
				</div>
                <?php 
					if( $my_query->have_posts() ) {
					  while ($my_query->have_posts()) : $my_query->the_post(); 
						the_content();
					  endwhile;
					}
					wp_reset_query();  // Restore global post data stomped by the_post().
				?>				
				
			</div>
		</div>
		<?php
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
		$asia = ! empty( $instance['asia'] ) ? $instance['asia'] : __( '0', 'text_domain' );
		$euro = ! empty( $instance['euro'] ) ? $instance['euro'] : __( '0', 'text_domain' );
		$america = ! empty( $instance['america'] ) ? $instance['america'] : __( '0', 'text_domain' );
		$africa = ! empty( $instance['africa'] ) ? $instance['africa'] : __( '0', 'text_domain' );
		$australia = ! empty( $instance['australia'] ) ? $instance['australia'] : __( '0', 'text_domain' );
		$postvideoslug = ! empty( $instance['postvideoslug'] ) ? $instance['postvideoslug'] : __( '0', 'text_domain' );
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'asia' ); ?>"><?php _e( 'Asia:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'asia' ); ?>" name="<?php echo $this->get_field_name( 'asia' ); ?>" type="text" value="<?php echo esc_attr( $asia ); ?>">
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'euro' ); ?>"><?php _e( 'Euro:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'euro' ); ?>" name="<?php echo $this->get_field_name( 'euro' ); ?>" type="text" value="<?php echo esc_attr( $euro ); ?>">
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'america' ); ?>"><?php _e( 'America:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'america' ); ?>" name="<?php echo $this->get_field_name( 'america' ); ?>" type="text" value="<?php echo esc_attr( $america ); ?>">
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'africa' ); ?>"><?php _e( 'Africa:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'africa' ); ?>" name="<?php echo $this->get_field_name( 'africa' ); ?>" type="text" value="<?php echo esc_attr( $africa ); ?>">
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'australia' ); ?>"><?php _e( 'Australia:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'australia' ); ?>" name="<?php echo $this->get_field_name( 'australia' ); ?>" type="text" value="<?php echo esc_attr( $australia ); ?>">
		</p>
        
        <p>
		<label for="<?php echo $this->get_field_id( 'postvideoslug' ); ?>"><?php _e( 'Post video:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'postvideoslug' ); ?>" name="<?php echo $this->get_field_name( 'postvideoslug' ); ?>" type="text" value="<?php echo esc_attr( $postvideoslug ); ?>">
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
		$instance['asia'] = ( ! empty( $new_instance['asia'] ) ) ? strip_tags( $new_instance['asia'] ) : '';
		$instance['euro'] = ( ! empty( $new_instance['euro'] ) ) ? strip_tags( $new_instance['euro'] ) : '';
		$instance['america'] = ( ! empty( $new_instance['america'] ) ) ? strip_tags( $new_instance['america'] ) : '';
		$instance['africa'] = ( ! empty( $new_instance['africa'] ) ) ? strip_tags( $new_instance['africa'] ) : '';
		$instance['australia'] = ( ! empty( $new_instance['australia'] ) ) ? strip_tags( $new_instance['australia'] ) : '';
		$instance['postvideoslug'] = ( ! empty( $new_instance['postvideoslug'] ) ) ? strip_tags( $new_instance['postvideoslug'] ) : '';

		return $instance;
	}

} // class Foo_Widget

// register Foo_Widget widget
function register_world_tour_widget() {
    register_widget( 'World_Tour_Widget' );
}
add_action( 'widgets_init', 'register_world_tour_widget' );
?>