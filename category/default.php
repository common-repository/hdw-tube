<?php

/******************************************************************
/* Execute Actions
******************************************************************/

global $wpdb;
$table_name = $wpdb->prefix .'youtube_category';
switch($_GET['opt']) {
	case 'add':
		require_once('add.php');
		break;
	case 'edit':
		require_once('editing.php');
		break;
	case 'delete':
		require_once('delete.php');
		break;
	default:
		require_once('grid.php');		
}
?>