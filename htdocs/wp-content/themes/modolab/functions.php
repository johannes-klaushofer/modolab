<?php
	// customize ACF path
	function acf_settings_path($path){
		return get_template_directory().'/plugins/advanced-custom-fields-pro/';
	}
	add_filter('acf/settings/path', 'acf_settings_path');
	
	// customize ACF dir
	function acf_settings_dir($dir){
		return get_template_directory_uri().'/plugins/advanced-custom-fields-pro/';
	}
	add_filter('acf/settings/dir', 'acf_settings_dir');
	
	// hide ACF field group menu item
	add_filter('acf/settings/show_admin', '__return_false');
	
	// include ACF
	include_once(get_stylesheet_directory().'/plugins/advanced-custom-fields-pro/acf.php');
	
	// activate theme
	function mytheme_setup_options(){
		if(function_exists('acf_add_local_field_group')){
			$_FILES['acf_import_file'] = array(
				'name' => 'fields.json',
				'tmp_name' => get_template_directory().'/fields.json'
			);
			include_once(get_stylesheet_directory().'/plugins/advanced-custom-fields-pro/admin/settings-tools.php');
			$acfSettings = new acf_settings_tools();
			$acfSettings->import();
		}
	}
	add_action('after_switch_theme', 'mytheme_setup_options');
	
	// remove editor
	function remove_editor(){
		remove_post_type_support('post', 'editor');
		remove_post_type_support('page', 'editor');
	}
	add_action('admin_init', 'remove_editor');
?>