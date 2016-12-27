<?php
function wpcf_Bluesky_Post_Contact( $atts ){   
    $page_data = get_post( 3534);
    return $page_data->post_content;   
}
?>