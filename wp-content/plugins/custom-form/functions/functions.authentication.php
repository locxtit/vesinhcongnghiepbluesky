<?php
/*
Author: vietsky Team
URL: vietsky.com
Description: integrate login & logout functions with vietsky Memeber Site
*/


	define( 'vietsky_USER_COOKIE_KEY', 'user_vietsky_cookie_dump_key' );
	function get_vietsky_user() {
		if( USING_SESSION ) {
            if ( '' == session_id() ) {
                 session_start();
            }
			$vietsky_user_session_key = get_vietsky_user_session_key();
			return isset( $_SESSION[ $vietsky_user_session_key ] ) ? json_decode( base64_decode( $_SESSION[ $vietsky_user_session_key ] ))  : null;
		} else {
			if( isset( $_COOKIE[ vietsky_USER_COOKIE_KEY ] ) ) {
				$s_user = $_COOKIE[ vietsky_USER_COOKIE_KEY ];
				if( null != $s_user && '' != $s_user) {
					return json_decode( base64_decode( $s_user ) );
				}
			}
		}
		return null;
	}

	function set_vietsky_user_cookie( $user ) {
		//$time = time() + 3600;
		$expireCookie = get_option( 'vietsky_portal_expire_cookie' );
		$time = time() + intval($expireCookie);
		$s_user = base64_encode( json_encode( $user ) ); 
		setcookie( vietsky_USER_COOKIE_KEY, $s_user, $time, '/' );
	}

	function delete_vietsky_user_cookie() {
		setcookie( vietsky_USER_COOKIE_KEY, '', 0, '/' );
	}

	function get_vietsky_user_session_key() {
		return sha1( $_SERVER['REMOTE_ADDR'] . wp_nonce_tick() );
	}

	function vietsky_ajax_logout() {
		$result = array(
			'success' => false,
			'message' => ''
		);
		
		$nonce = isset( $_REQUEST['_wpnonce'] ) ? $_REQUEST['_wpnonce'] : '';
		if( wp_verify_nonce( $nonce, 'vietsky_login_wpnonce' ) == false ) {
			$result['message'] = 'Hacking attemp!';
		} else {
			$result['success'] = vietsky_logout();
		}
		wp_send_json( $result );
		die();
	}

	function vietsky_logout() {
		if( USING_SESSION ) {
            if ( '' == session_id() ) {
                 session_start();
            }
			$_SESSION[ get_vietsky_user_session_key() ] = null;
		}
		delete_vietsky_user_cookie();
		return true;
	}

	add_action( 'wp_ajax_nopriv_vietsky_logout', 'vietsky_ajax_logout' );
	add_action( 'wp_ajax_vietsky_logout', 'vietsky_ajax_logout' );
	
	?>