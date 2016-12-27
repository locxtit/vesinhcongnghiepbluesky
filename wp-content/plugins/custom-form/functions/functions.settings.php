<?php

function wpcf_admin_menu() {
	 $icon_url = wpcf_plugin_url( 'Images/menu-icon.png' );
	add_object_page( __( 'Custom Form ', 'custom-form' ), __( 'Airline Settings', 'custom-form' ), 'manage_options', 'airline-services-settings', '', $icon_url );
	add_submenu_page( 'airline-services-settings', 'Airline Service Settings', 'Service Settings', 'manage_options', 'airline-services-settings', 'airline_services_settings' );
    
    $URL = get_option( 'airline_portal_url' );
    if('' == $URL)
    {
        update_option( 'airline_portal_url', 'http://dev.tl.lisa.com.vn');
    }
    
    $URL = get_option( 'airline_portal_load_box_search_method' );
    
    if('' == $URL)
    {
        update_option( 'airline_portal_load_page_home_method', '/Home/Index');
    }
    
    if('' == $URL)
    {
        update_option( 'airline_portal_load_box_search_method', '/Home/IFrameWP');
    }
    
    $URL = get_option( 'airline_portal_search_result_url' );
    if('' == $URL)
    {
        update_option( 'airline_portal_search_result_url', 'tra-ve-may-bay');
    }
    
    $URL = get_option( 'airline_portal_iframe_width' );
    if('' == $URL)
    {
        update_option( 'airline_portal_iframe_width', '500');
    }
    
    $URL = get_option( 'airline_portal_iframe_height' );
    if('' == $URL)
    {
        update_option( 'airline_portal_iframe_height', '450');
    }
    
    $URL = get_option( 'airline_portal_quick_search_ifram_width' );
    if('' == $URL)
    {
        update_option( 'airline_portal_quick_search_ifram_width', '200');
    }
    
    $URL = get_option( 'airline_portal_quick_search_iframe_height' );
    if('' == $URL)
    {
        update_option( 'airline_portal_quick_search_iframe_height', '450');
    }
    
     $URL = get_option( 'airline_portal_quick_search_iframe_css' );
    if('' == $URL)
    {
        update_option( 'airline_portal_quick_search_iframe_css', 'background: transparent;');
    }
    
     $URL = get_option( 'airline_portal_popup_contact_post' );
    if('' == $URL)
    {
        update_option( 'airline_portal_popup_contact_post', '131');
    }
    
    $URL = get_option( 'airline_portal_payment_method_post' );
    if('' == $URL)
    {
        update_option( 'airline_portal_payment_method_post', '133');
    }
    
     $URL = get_option( 'airline_portal_introduction_flight_post' );
    if('' == $URL)
    {
        update_option( 'airline_portal_introduction_flight_post', '135');
    }
    
    $URL = get_option( 'airline_portal_header_post' );
    if('' == $URL)
    {
        update_option( 'airline_portal_header_post', '278');
    }
    
    $URL = get_option( 'airline_portal_footer_post' );
    if('' == $URL)
    {
        update_option( 'airline_portal_footer_post', '280');
    }
    
    $URL = get_option( 'airline_portal_posts_per_page' );
    if('' == $URL)
    {
        update_option( 'airline_portal_posts_per_page', '10');
    }
    
    $URL = get_option( 'airline_show_title_page' );
    if('' == $URL)
    {
        update_option( 'airline_show_title_page', '0');
    }
    $URL = get_option( 'airline_show_title_post' );
    if('' == $URL)
    {
        update_option( 'airline_show_title_post', '0');
    }
    $URL = get_option( 'airline_show_author' );
    if('' == $URL)
    {
        update_option( 'airline_show_author', '0');
    }
    $URL = get_option( 'airline_show_navigation_post' );
    if('' == $URL)
    {
        update_option( 'airline_show_navigation_post', '0');
    }
    
    $URL = get_option( 'airline_portal_search_hotel_url' );
    if('' == $URL)
    {
        update_option( 'airline_portal_search_hotel_url', 'http://iframe.agoda.com/vi-vn/index.html?cid=1656633');
    }
    
    $URL = get_option( 'airline_portal_search_hotel_iframe_width' );
    if('' == $URL)
    {
        update_option( 'airline_portal_search_hotel_iframe_width', '500');
    }
    
    $URL = get_option( 'airline_portal_search_hotel_iframe_height' );
    if('' == $URL)
    {
        update_option( 'airline_portal_search_hotel_iframe_height', '500');
    }
    
    $URL = get_option( 'airline_portal_search_hotel_iframe_scrollheight' );
    if('' == $URL)
    {
        update_option( 'airline_portal_search_hotel_iframe_scrollheight', '0');
    }
    
     $URL = get_option( 'airline_portal_search_hotel_css' );
    if('' == $URL)
    {
        update_option( 'airline_portal_search_hotel_css', 'background: transparent;');
    }
    
}

/******************************************************************
*BUILD PAGE UI
*******************************************************************/
function airline_services_settings() { 
?>
    <div class="wrap">
        <?php screen_icon( 'themes' ); ?> <h2>Airline Service Settings</h2>
        <form method="POST" action="">
            <table class="form-table">
		  <tr valign="top">
                    <th  style="width: 15%;">
                        <label>
                            Booking URL:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="airline_portal_url" id="airline_portal_url" size="80%" value="<?php echo get_option( 'airline_portal_url' ) ?>" />
                    </td>   
                </tr>
		  <tr valign="top">
                    <th  style="width: 15%;">
                        <label>
                           Load the home page function:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="airline_portal_load_page_home_method" id="airline_portal_load_page_home_method" size="80%" value="<?php echo get_option( 'airline_portal_load_page_home_method' ) ?>" />
                    </td>   
                </tr>
		  
		  <tr valign="top">
                    <th  style="width: 15%;">
                        <label>
                           Load the box search function:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="airline_portal_load_box_search_method" id="airline_portal_load_box_search_method" size="80%" value="<?php echo get_option( 'airline_portal_load_box_search_method' ) ?>" />
                    </td>   
                </tr>
		  
		  <tr valign="top">
                    <th  style="width: 15%;">
                        <label>
                            Page search result:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="airline_portal_search_result_url" id="airline_portal_search_result_url" size="80%" value="<?php echo get_option( 'airline_portal_search_result_url' ) ?>" />
                    </td>   
                </tr>
		</tr>
		  <tr valign="top">
                    <th  style="width: 15%;">
                        <label>
                            Page home iframe width:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="airline_portal_iframe_width" id="airline_portal_iframe_width" size="80%" value="<?php echo get_option( 'airline_portal_iframe_width' ) ?>" />
                    </td>   
                </tr>
		<tr valign="top">
                    <th  style="width: 15%;">
                        <label>
                            Page home iframe height:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="airline_portal_iframe_height" id="airline_portal_iframe_height" size="80%" value="<?php echo get_option( 'airline_portal_iframe_height' ) ?>" />
                    </td>   
                </tr>
		
		<tr valign="top">
                    <th  style="width: 15%;">
                        <label>
                            Box search iframe width:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="airline_portal_quick_search_ifram_width" id="airline_portal_quick_search_ifram_width" size="80%" value="<?php echo get_option( 'airline_portal_quick_search_ifram_width' ) ?>" />
                    </td>   
                </tr>
		<tr valign="top">
                    <th  style="width: 15%;">
                        <label>
                            Box search iframe height:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="airline_portal_quick_search_iframe_height" id="airline_portal_quick_search_iframe_height" size="80%" value="<?php echo get_option( 'airline_portal_quick_search_iframe_height' ) ?>" />
                    </td>   
                </tr>
		
		<tr valign="top">
                    <th  style="width: 15%;">
                        <label>
                            Box search iframe css:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="airline_portal_quick_search_iframe_css" id="airline_portal_quick_search_iframe_css" size="80%" value="<?php echo get_option( 'airline_portal_quick_search_iframe_css' ) ?>" />
                    </td>   
                </tr>
		
		<tr valign="top">
                    <th  style="width: 15%;">
                        <label>
                            Popup Contact Post(Id):
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="airline_portal_popup_contact_post" id="airline_portal_popup_contact_post" size="80%" value="<?php echo get_option( 'airline_portal_popup_contact_post' ) ?>" />
                    </td>   
                </tr>
		<tr valign="top">
                    <th  style="width: 15%;">
                        <label>
                            Popup Payment Methods Post(Id):
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="airline_portal_payment_method_post" id="airline_portal_payment_method_post" size="80%" value="<?php echo get_option( 'airline_portal_payment_method_post' ) ?>" />
                    </td>   
                </tr>
		<tr valign="top">
                    <th  style="width: 15%;">
                        <label>
                            Popup Introduct Flights Post(Id):
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="airline_portal_introduction_flight_post" id="airline_portal_introduction_flight_post" size="80%" value="<?php echo get_option( 'airline_portal_introduction_flight_post' ) ?>" />
                    </td>   
                </tr>
		  <tr valign="top">
                    <th  style="width: 15%;">
                        <label>
                            Header Post(Id):
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="airline_portal_header_post" id="airline_portal_header_post" size="80%" value="<?php echo get_option( 'airline_portal_header_post' ) ?>" />
                    </td>   
                </tr>
		  <tr valign="top">
                    <th  style="width: 15%;">
                        <label>
                            Footer Post(Id):
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="airline_portal_footer_post" id="airline_portal_footer_post" size="80%" value="<?php echo get_option( 'airline_portal_footer_post' ) ?>" />
                    </td>   
                </tr>
		  
		   <tr valign="top">
                    <th  style="width: 15%;">
                        <label>
                            Posts Per Page:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="airline_portal_posts_per_page" id="airline_portal_posts_per_page" size="80%" value="<?php echo get_option( 'airline_portal_posts_per_page' ) ?>" />
                    </td>   
                </tr>
		   
		   <tr valign="top">
                    <th  style="width: 15%;">
                        <label>
                            Show title page:
                        </label> 
                    </th>
                    <td>
                        <input type="checkbox" name="airline_show_title_page" id="airline_show_title_page" size="80%" value="<?php echo get_option( 'airline_show_title_page' ) ?>"  <?php if(get_option( 'airline_show_title_page' ) === '1') echo ' checked="checked"';?> />
                    </td>   
                </tr>
		    <tr valign="top">
                    <th  style="width: 15%;">
                        <label>
                            Show title post:
                        </label> 
                    </th>
                    <td>
                        <input type="checkbox" name="airline_show_title_post" id="airline_show_title_post" size="80%" value="<?php echo get_option( 'airline_show_title_post' ) ?>"  <?php if(get_option( 'airline_show_title_post' ) === '1') echo ' checked="checked"';?> />
                    </td>   
                </tr>
		    <tr valign="top">
                    <th  style="width: 15%;">
                        <label>
                            Show navigation post:
                        </label> 
                    </th>
                    <td>
                        <input type="checkbox" name="airline_show_navigation_post" id="airline_show_navigation_post" size="80%" value="<?php echo get_option( 'airline_show_navigation_post' ) ?>"  <?php if(get_option( 'airline_show_navigation_post' ) === '1') echo ' checked="checked"';?> />
                    </td>   
                </tr>
		    <tr valign="top">
                    <th  style="width: 15%;">
                        <label>
                            Show author post:
                        </label> 
                    </th>
                    <td>
                        <input type="checkbox" name="airline_show_author" id="airline_show_author" size="80%" value="<?php echo get_option( 'airline_show_author' ) ?>"  <?php if(get_option( 'airline_show_author' ) === '1') echo ' checked="checked"';?> />
                    </td>   
                </tr>
		    <tr valign="top">
                    <th  style="width: 15%;">
                        <label>
                            Page hotel search iframe URL:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="airline_portal_search_hotel_url" id="airline_portal_search_hotel_url" size="80%" value="<?php echo get_option( 'airline_portal_search_hotel_url' ) ?>" />
                    </td>   
                </tr>
		  <tr valign="top">
                    <th  style="width: 15%;">
                        <label>
                            Page hotel search iframe width:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="airline_portal_search_hotel_iframe_width" id="airline_portal_search_hotel_iframe_width" size="80%" value="<?php echo get_option( 'airline_portal_search_hotel_iframe_width' ) ?>" />
                    </td>   
                </tr>
		<tr valign="top">
                    <th  style="width: 15%;">
                        <label>
                            Page hotel search iframe height:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="airline_portal_search_hotel_iframe_height" id="airline_portal_search_hotel_iframe_height" size="80%" value="<?php echo get_option( 'airline_portal_search_hotel_iframe_height' ) ?>" />
                    </td>   
                </tr>
		
		  <tr valign="top">
                    <th  style="width: 15%;">
                        <label>
                            Page hotel search iframe ScrollHeight:
                        </label> 
                    </th>
                    <td>
                        <input type="checkbox" name="airline_portal_search_hotel_iframe_scrollheight" id="airline_portal_search_hotel_iframe_scrollheight" size="80%" value="<?php echo get_option( 'airline_portal_search_hotel_iframe_scrollheight' ) ?>"  <?php if(get_option( 'airline_portal_search_hotel_iframe_scrollheight' ) === '1') echo ' checked="checked"';?> />
                    </td>   
                </tr>
		
		<tr valign="top">
                    <th  style="width: 15%;">
                        <label>
                            Page hotel search iframe css:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="airline_portal_search_hotel_css" id="airline_portal_search_hotel_css" size="80%" value="<?php echo get_option( 'airline_portal_search_hotel_css' ) ?>" />
                    </td>   
                </tr>
                <tr>
                  <td>
                    <input type="hidden" value="submit" name="submit"/> 
                    <input type="submit" value="Save settings" class="button-primary"/>  
                  </td>
                </tr>
            </table>
        </form>
    </div>
<?php
}

/******************************************************************
*SUBMIT FORM
*******************************************************************/
if ( isset( $_POST['submit'] ) ) {

  /******************************************************************
  *airline_service_settings page
  */  
  if( isset( $_REQUEST['page'] ) && 'airline-services-settings' == $_REQUEST['page'] ) {
    $airline_portal_url= esc_attr( $_POST['airline_portal_url'] );
    $airline_portal_load_page_home_method= esc_attr( $_POST['airline_portal_load_page_home_method'] );
    $airline_portal_load_box_search_method= esc_attr( $_POST['airline_portal_load_box_search_method'] );
    $airline_portal_search_result_url= esc_attr( $_POST['airline_portal_search_result_url'] );
    $airline_portal_iframe_width= esc_attr( $_POST['airline_portal_iframe_width'] );
    $airline_portal_iframe_height= esc_attr( $_POST['airline_portal_iframe_height'] );
    
     $airline_portal_quick_search_ifram_width= esc_attr( $_POST['airline_portal_quick_search_ifram_width'] );
    $airline_portal_quick_search_iframe_height= esc_attr( $_POST['airline_portal_quick_search_iframe_height'] );
    $airline_portal_quick_search_iframe_css= esc_attr( $_POST['airline_portal_quick_search_iframe_css'] );
    
    $airline_portal_popup_contact_post= esc_attr( $_POST['airline_portal_popup_contact_post'] );
    $airline_portal_payment_method_post = esc_attr( $_POST['airline_portal_payment_method_post'] );
    $airline_portal_introduction_flight_post= esc_attr( $_POST['airline_portal_introduction_flight_post'] );
    
    $airline_portal_header_post= esc_attr( $_POST['airline_portal_header_post'] );
    $airline_portal_footer_post= esc_attr( $_POST['airline_portal_footer_post'] );
    
    $airline_portal_posts_per_page= esc_attr( $_POST['airline_portal_posts_per_page'] );
    
    $airline_show_title_page= isset($_POST['airline_show_title_page'])  ? "1" : "0";
    $airline_show_title_post= isset($_POST['airline_show_title_post'])  ? "1" : "0";
    $airline_show_navigation_post= isset($_POST['airline_show_navigation_post'])  ? "1" : "0";
    $airline_show_author= isset($_POST['airline_show_author'])  ? "1" : "0";
    
     $airline_portal_search_hotel_url= esc_attr( $_POST['airline_portal_search_hotel_url'] );
    $airline_portal_search_hotel_iframe_width= esc_attr( $_POST['airline_portal_search_hotel_iframe_width'] );
    $airline_portal_search_hotel_iframe_height= esc_attr( $_POST['airline_portal_search_hotel_iframe_height'] );
    $airline_portal_search_hotel_iframe_scrollheight= isset($_POST['airline_portal_search_hotel_iframe_scrollheight'])  ? "1" : "0";
    $airline_portal_search_hotel_css= esc_attr( $_POST['airline_portal_search_hotel_css'] );
    
    if(''!=$airline_portal_url){
	     update_option( 'airline_portal_url', $airline_portal_url );
    }
    if(''!=$airline_portal_load_page_home_method){
	     update_option( 'airline_portal_load_page_home_method', $airline_portal_load_page_home_method );
    }
    if(''!=$airline_portal_load_box_search_method){
	     update_option( 'airline_portal_load_box_search_method', $airline_portal_load_box_search_method );
    }		
	 if(''!=$airline_portal_search_result_url){
	     update_option( 'airline_portal_search_result_url', $airline_portal_search_result_url );
    }
    
    if(''!=$airline_portal_iframe_width){
	     update_option( 'airline_portal_iframe_width', $airline_portal_iframe_width );
    }
    if(''!=$airline_portal_iframe_height){
	     update_option( 'airline_portal_iframe_height', $airline_portal_iframe_height );
    }
    
    if(''!=$airline_portal_quick_search_ifram_width){
	     update_option( 'airline_portal_quick_search_ifram_width', $airline_portal_quick_search_ifram_width );
    }
    if(''!=$airline_portal_quick_search_iframe_height){
	     update_option( 'airline_portal_quick_search_iframe_height', $airline_portal_quick_search_iframe_height );
    }
     if(''!=$airline_portal_quick_search_iframe_css){
	     update_option( 'airline_portal_quick_search_iframe_css', $airline_portal_quick_search_iframe_css );
    }
    
    if(''!=$airline_portal_popup_contact_post){
	     update_option( 'airline_portal_popup_contact_post', $airline_portal_popup_contact_post );
    }
    if(''!=$airline_portal_payment_method_post){
	     update_option( 'airline_portal_payment_method_post', $airline_portal_payment_method_post );
    }
    if(''!=$airline_portal_introduction_flight_post){
	     update_option( 'airline_portal_introduction_flight_post', $airline_portal_introduction_flight_post );
    }
    if(''!=$airline_portal_header_post){
	     update_option( 'airline_portal_header_post', $airline_portal_header_post );
    }
    if(''!=$airline_portal_footer_post){
	     update_option( 'airline_portal_footer_post', $airline_portal_footer_post );
    }
    
    if(''!=$airline_portal_posts_per_page){
	     update_option( 'airline_portal_posts_per_page', $airline_portal_posts_per_page );
    }
    
     if(''!=$airline_show_title_page){
	     update_option( 'airline_show_title_page', $airline_show_title_page );
    }
     if(''!=$airline_show_title_post){
	     update_option( 'airline_show_title_post', $airline_show_title_post );
    }
     if(''!=$airline_show_navigation_post){
	     update_option( 'airline_show_navigation_post', $airline_show_navigation_post );
    }
     if(''!=$airline_show_author){
	     update_option( 'airline_show_author', $airline_show_author );
    }
    
     if(''!=$airline_portal_search_hotel_url){
	     update_option( 'airline_portal_search_hotel_url', $airline_portal_search_hotel_url );
    }
    
     if(''!=$airline_portal_search_hotel_iframe_width){
	     update_option( 'airline_portal_search_hotel_iframe_width', $airline_portal_search_hotel_iframe_width );
    }
    if(''!=$airline_portal_search_hotel_iframe_height){
	     update_option( 'airline_portal_search_hotel_iframe_height', $airline_portal_search_hotel_iframe_height );
    }
    if(''!=$airline_portal_search_hotel_iframe_scrollheight){
	     update_option( 'airline_portal_search_hotel_iframe_scrollheight', $airline_portal_search_hotel_iframe_scrollheight );
    }
    
     if(''!=$airline_portal_search_hotel_css){
	     update_option( 'airline_portal_search_hotel_css', $airline_portal_search_hotel_css );
    }
    
    echo '<div id="message" class="updated fade"><p><strong>Settings saved.</strong></p></div>';
  }
}

?>