<?php

/******************************************************************
/* Deleting the Table Row
******************************************************************/
if($_GET['page'] == 'playlists' && $_GET['opt'] == 'delete') {
	$pl_table_name = $wpdb->prefix . "youtube_playlist";
	$wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id=%d",$_GET['id']));
	$wpdb->query($wpdb->prepare("DELETE FROM $pl_table_name WHERE playlistid=%d",$_GET['id']));
	echo '<script>window.location="?page=playlists";</script>';
}

?>