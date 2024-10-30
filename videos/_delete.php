<?php
/******************************************************************
/* Deleting the Table Row
******************************************************************/
if($_GET['page'] == 'videos' && $_GET['opt'] == 'delete') {
	$vid_table_name            = $wpdb->prefix . "youtube_video";
	$comment_table_name        = $wpdb->prefix . "youtube_comments";
	$likedislike_table_name    = $wpdb->prefix . "youtube_likevideo";
	$playlist_table_name       = $wpdb->prefix . "youtube_playlist";
	$watchlater_table_name     = $wpdb->prefix . "youtube_watchlater";
	$watchhistory_table_name   = $wpdb->prefix . "youtube_watchhistory";
	
	$wpdb->query($wpdb->prepare("DELETE FROM $vid_table_name WHERE video_id=%d",intval($_GET['id'])));
	$wpdb->query($wpdb->prepare("DELETE FROM $comment_table_name WHERE video_id=%d",intval($_GET['id'])));
	$wpdb->query($wpdb->prepare("DELETE FROM $likedislike_table_name WHERE lk_dlk_videoid=%d",intval($_GET['id'])));
	$wpdb->query($wpdb->prepare("DELETE FROM $playlist_table_name WHERE videoid=%d",intval($_GET['id'])));
	$wpdb->query($wpdb->prepare("DELETE FROM $watchlater_table_name WHERE videoid=%d",intval($_GET['id'])));
	$wpdb->query($wpdb->prepare("DELETE FROM $watchhistory_table_name WHERE videoid=%d",intval($_GET['id'])));
	
	echo '<script>window.location="?page=videos";</script>';
}

?>