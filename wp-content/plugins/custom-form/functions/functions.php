<?php

function wpcf_plugin_url( $path = '' ) {
	$url = untrailingslashit( WP_CF_PLUGIN_URL );

	if ( ! empty( $path ) && is_string( $path ) && false === strpos( $path, '..' ) )
		$url .= '/' . ltrim( $path, '/' );

	return $url;
}

//minhbn: get curent page url
if(!function_exists('wpcf_curpageurl')){
	function wpcf_curpageurl() {
		$pageURL = 'http';
		
		if ((isset($_SERVER["HTTPS"])) && ($_SERVER["HTTPS"] == "on"))
			$pageURL .= "s";
			
		$pageURL .= "://";
		
		if ($_SERVER["SERVER_PORT"] != "80")
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
			
		else
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		
		return $pageURL;
	}
}


?>