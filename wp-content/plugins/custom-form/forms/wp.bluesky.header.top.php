<?php
function wpcf_Bluesky_Contact_Footer( $atts ){   
    $page_data = get_post( 3215 );
    return $page_data->post_content;   
}
?>