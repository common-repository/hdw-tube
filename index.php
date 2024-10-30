<?php
/******************************************************************
Plugin Name: HDW Tube 
Plugin URI: http://www.appten.net/wordpress/hdw-tube-wp.html
Description: HDW Tube Plugin for Wordpress Websites.
Version: 1.3
Author: Mr. HDW Tube
Author URI: http://www.appten.net
******************************************************************/

require_once 'channel.php';
require_once 'tabs.php';
require_once('installer.php');
require_once('uninstaller.php');
require_once('main_widget.php');
require_once('related_widget.php');

add_action( 'init', 'hdwtube_plugin_js' );

function hdwtube_plugin_js() 
{       
    wp_enqueue_script('jquery');  
}

function hdwtube_head_script() {
		echo '<script type="text/javascript">var $hdwt = jQuery.noConflict();</script>';
}
add_action( 'wp_head', 'hdwtube_head_script' );
$dar = wp_upload_dir();
define('HDW_UPLOAD_ROOT',$dar['basedir'].'/hdw-tube/');
define('HDW_UPLOAD_URL',$dar['baseurl'].'/hdw-tube/');

if (is_admin()) {
	
	add_action("admin_menu", "hdwtube_plugin_menu");
	register_activation_hook(__FILE__,'hdwtube_db_install');
	register_activation_hook(__FILE__,'hdwtube_db_install_data');
	add_action('plugins_loaded', 'hdwtube_update_db_check');
	register_uninstall_hook(__FILE__, 'hdwtube_db_uninstall');
}

function hdwtube_plugin_menu() {
	add_menu_page('HDW Tube Settings', 'HDW Tube', 'administrator', 'hdwtube','hdwtube_plugin_pages');
	add_submenu_page('hdwtube','HDW Tube Config','Configuration','administrator','configuration','hdwtube_plugin_pages');
	add_submenu_page('hdwtube','HDW Tube Category','Category','administrator','category','hdwtube_plugin_pages');
	add_submenu_page('hdwtube','HDW Tube Category','Channels','administrator','channels','hdwtube_plugin_pages');
	add_submenu_page('hdwtube','HDW Tube Category','PlayLists','administrator','playlists','hdwtube_plugin_pages');
	add_submenu_page('hdwtube','HDW Tube Category','Videos','administrator','videos','hdwtube_plugin_pages');
	add_submenu_page('hdwtube','HDW Tube Category','Subscriptions','administrator','subscriptions','hdwtube_plugin_pages');
	add_submenu_page('hdwtube','HDW Tube Category','Reports','administrator','reports','hdwtube_plugin_pages');
	add_submenu_page('hdwtube','HDW Tube Category','Recommended','administrator','recommended','hdwtube_plugin_pages');
	add_submenu_page('hdwtube','HDW Tube Category','Documentation','administrator','documentation','hdwtube_plugin_pages');
}

function hdwtube_plugin_pages() {
	require_once (dirname(__FILE__) . "/".$_GET["page"]."/default.php");
}
?>
