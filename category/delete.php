<?php
/******************************************************************
/* Deleting the Table Row
******************************************************************/
if($_GET['page'] == 'category' && $_GET['opt'] == 'delete') {
	$data = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id=%d",intval($_GET['id'])));
	
	$wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id=%d",intval($_GET['id'])));
	$wpdb->update($wpdb->prefix."youtube_video", array('video_category' => 'others'), array('video_category'=> $data->value));
	
	echo '<script>window.location="?page=category";</script>';
}

?>