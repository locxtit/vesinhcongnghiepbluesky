<?php 

add_action( 'init', 'vietsky_init' );

function vietsky_init() {
    $airlineStyleFile = WP_CF_PLUGIN_URL.'/css/style.css';
    wp_enqueue_style( 'airline_StyleSheets', $airlineStyleFile);

    if ( !is_admin() ){
		
		include_once(WP_CF_PLUGIN_DIR.'/forms/wp.bluesky.header.top.php');     
	    add_shortcode('wpcf-bluesky-header-top', 'wpcf_Bluesky_Header_Top');
		
		include_once(WP_CF_PLUGIN_DIR.'/forms/wp.bluesky.contact.footer.php');     
	    add_shortcode('wpcf-bluesky-contact-footer', 'wpcf_Bluesky_Contact_Footer');
		
		include_once(WP_CF_PLUGIN_DIR.'/forms/wp.bluesky.post.contact.php');     
	    add_shortcode('wpcf-bluesky-post-contact', 'wpcf_Bluesky_Post_Contact');
    }

    if(is_admin())
    {
        // include_once(WP_CF_PLUGIN_DIR.'/functions/functions.settings.php'); 
        // if(!WP_IS_TMS_SOURCE){
			// add_action( 'admin_menu', 'wpcf_admin_menu', 9 );
		// }
		
    }
    
    // add_action('wp_head', 'display_header');
    // add_action('wp_footer', 'display_footer');
    
    //add_action( 'wp_enqueue_scripts', 'render_scripts' );
 
}

function display_header() {
    $page_id=get_option( 'airline_portal_header_post');
    $page_data = get_post( $page_id );
    $content= $page_data->post_content;
	
	$content = str_replace('[php-SEARCH-FORM]',get_search_form(false),$content);
	
    echo $content;
    
    echo '<input type="hidden" name="airlinePortalSearchResultUrl" id="airlinePortalSearchResultUrl" value="' . get_home_url(). '/' . get_option( 'airline_portal_search_result_url' ). '">';
}

function display_footer() {
    
    if(!WP_IS_TMS_SOURCE)
	{
		$post_id=get_option( 'airline_portal_popup_contact_post' );
		$post_data = get_post( $post_id );
		$content_post= $post_data->post_content;
		echo $content_post;
	}
    
    $page_id=get_option( 'airline_portal_footer_post');
    $page_data = get_post( $page_id );
    $content= $page_data->post_content;
	
	// if (WP_THEME == ve24g) {
		// $content = str_replace ('[wpcf-seo-flight]', wpcf_SEO_Flight(null),$content);
		// $content = str_replace ('[wpcf-home-url]', wpcf_Home_Url(),$content);
		// $content = str_replace ('[wpcf-banner-left-right]', wpcf_Banner_Left_Right(),$content);
	// }
    echo $content;
}

function render_scripts() {
	if(!WP_IS_TMS_SOURCE) wp_enqueue_script( 'crossdomain_script', WP_CF_PLUGIN_URL.'/js/page.crossdomain.js');
	else wp_enqueue_script( 'tms_crossdomain_script', WP_CF_PLUGIN_URL.'/js/tms.crossdomain.js');
}




?>