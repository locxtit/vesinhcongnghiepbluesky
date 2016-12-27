<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $post;
global $wp_query;
get_header(); ?>
	<div class="single-page clearfix">
      <div class="inner-wrap">
		
         <div id="primary">
		 <?php if( function_exists( 'ample_breadcrumb' ) ) { ample_breadcrumb(); } ?>
            <div id="content">	
				
				<?php
				if ( have_posts() ) 
				{
					$cat = get_category(get_query_var("cat"));
					if( 'GET' == $_SERVER['REQUEST_METHOD']  ){
						$posts_per_page= get_option( 'airline_portal_posts_per_page' );
						$paged = 1;
						if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
						elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
						else { $paged = 1; }
						$args = array('post_type' => 'post', 'cat' => $cat->cat_ID, 'posts_per_page' => $posts_per_page,'paged' => $paged);
						query_posts($args);
						if ( have_posts() ) {
							while (have_posts()) { the_post(); ?>
							<?php get_template_part( 'content', get_post_format() ); ?>
						 <?php }; ?>
						<!-- pagination -->
						<?php
						}else {
							echo '<div class="nopostfound">No post found!</div>';
						}
						 ?>
						<?php													    				
						$max   = intval( $wp_query->max_num_pages );
						/** Add current page to the array */
						if ( $paged >= 1 )
							$links[] = $paged;
						/** Add the pages around the current page to the array */
						if ( $paged >= 3 ) {
							$links[] = $paged - 1;
							$links[] = $paged - 2;
						}									
						if ( ( $paged + 2 ) <= $max ) {
							$links[] = $paged + 2;
							$links[] = $paged + 1;
						}
						echo '<div class="pagination pagination-centered"><ul class="navigation">' . "\n";
						/** Previous Post Link */
						if ( get_previous_posts_link() )
							printf( '<li>%s</li>' . "\n", get_previous_posts_link('&#8592;') );
						/** Link to first page, plus ellipses if necessary */
						if ( ! in_array( 1, $links ) ) {
							$class = 1 == $paged ? ' class="active"' : '';
							printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
							if ( ! in_array( 2, $links ) )
							echo '<li><span>&#8230;</span></li>';
						}
						/** Link to current page, plus 2 pages in either direction if necessary */
						sort( $links );
						foreach ( (array) $links as $link ) {
							$class = $paged == $link ? ' class="active"' : '';
							printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
						}
						/** Link to last page, plus ellipses if necessary */
						if ( ! in_array( $max, $links ) ) {
							if ( ! in_array( $max - 1, $links ) )
							echo '<li><span>&#8230;</span></li>' . "\n";
							$class = $paged == $max ? ' class="active"' : '';
							printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
						}
						/** Next Post Link */
						if ( get_next_posts_link() )
							printf( '<li>%s</li>' . "\n", get_next_posts_link('&#8594;',$max) );
						echo '</ul></div>' . "\n";
						wp_reset_query();
					}
				}
				else {
						// If no content, include the "No posts found" template.
						get_template_part( 'content', 'none' );
				}
			?>					
			</div>
            <?php ample_both_sidebar_select(); ?>
         </div>

         <?php ample_sidebar_select(); ?>
      </div><!-- .inner-wrap -->
   </div><!-- .single-page -->
<?php do_action( 'ample_after_body_content' );
get_footer(); ?>