<?php
	/*
	Plugin Name: LOOP Admin Theme
	Plugin URI: http://www.agentur-loop.com/en
	Description: LOOP Admin Theme
	Author: Johannes Klaushofer
	Version: 1.0
	Author URI: http://www.agentur-loop.com/en
	*/
	
	function LOOPAdminTheme(){
		wp_enqueue_style('loop-admin-theme', plugins_url('wp-admin.css', __FILE__));
	}
	add_action('admin_enqueue_scripts', 'LOOPAdminTheme');
	add_action('login_enqueue_scripts', 'LOOPAdminTheme');
	
	function LOOPAdminThemeLogin(){
		echo '<link rel="stylesheet" type="text/css" href="'.plugins_url('wp-login.css', __FILE__).'" media="screen">';
	}
	add_action('login_head', 'LOOPAdminThemeLogin');

?>