<?php

/******************************************************************
/* Deleting the Table Row
******************************************************************/

$addchannel_table_name     = $wpdb->prefix . "youtube_add_channel";
$addchannellist_table_name = $wpdb->prefix . "youtube_addchannellist";
$channel_table_name        = $wpdb->prefix . "youtube_channel";
$channeltags_table_name    = $wpdb->prefix . "youtube_channeltags";
$channel_chating_table     = $wpdb->prefix . "youtube_channel_comment";
$comment_table_name        = $wpdb->prefix . "youtube_comments";
$iconbanner_table_name     = $wpdb->prefix . "youtube_iconbanner";
$likedplaylist_table_name  = $wpdb->prefix . "youtube_likedplaylist";
$likedislike_table_name    = $wpdb->prefix . "youtube_likevideo";
$playlisttitle_table_name  = $wpdb->prefix . "youtube_playlistname";
$playlist_table_name       = $wpdb->prefix . "youtube_playlist";
$recommeded_table_name     = $wpdb->prefix . "youtube_recommended";
$subscribtion_table_name   = $wpdb->prefix . "youtube_subscriptions";
$video_table_name          = $wpdb->prefix . "youtube_video";
$watchlater_table_name     = $wpdb->prefix . "youtube_watchlater";
$watchhistory_table_name   = $wpdb->prefix . "youtube_watchhistory";

if($_GET['page'] == 'channels' && $_GET['opt'] == 'delete') {
    
	$wpdb->query($wpdb->prepare("DELETE FROM $addchannel_table_name WHERE channelid=%d",$_GET['id']));
	
	$wpdb->query($wpdb->prepare("DELETE FROM $addchannellist_table_name WHERE channelid=%d",$_GET['id']));
	
	$wpdb->query($wpdb->prepare("DELETE FROM $channel_table_name WHERE channel_id=%d",$_GET['id']));
	
	$wpdb->query($wpdb->prepare("DELETE FROM $channeltags_table_name WHERE channelid=%d",$_GET['id']));
	
	$wpdb->query($wpdb->prepare("DELETE FROM $channel_chating_table WHERE channelid=%d",$_GET['id']));
	
	$wpdb->query($wpdb->prepare("DELETE FROM $comment_table_name WHERE channel_id=%d",$_GET['id']));
	
	$wpdb->query($wpdb->prepare("DELETE FROM $iconbanner_table_name WHERE channelid=%d",$_GET['id']));
	
	$wpdb->query($wpdb->prepare("DELETE FROM $likedplaylist_table_name WHERE channelid=%d",$_GET['id']));
	
	$wpdb->query($wpdb->prepare("DELETE FROM $likedislike_table_name WHERE channel_id=%d",$_GET['id']));
	
	$wpdb->query($wpdb->prepare("DELETE FROM $likedislike_table_name WHERE lk_dlk_channelid=%d",$_GET['id']));
	
	$wpdb->query($wpdb->prepare("DELETE FROM $playlisttitle_table_name WHERE channelid=%d",$_GET['id']));
	
	$wpdb->query($wpdb->prepare("DELETE FROM $playlist_table_name WHERE channelid=%d",$_GET['id']));
	
	$wpdb->query($wpdb->prepare("DELETE FROM $recommeded_table_name WHERE r_channelid=%d",$_GET['id']));
	
	$wpdb->query($wpdb->prepare("DELETE FROM $subscribtion_table_name WHERE channel_id=%d",$_GET['id']));
	
	$wpdb->query($wpdb->prepare("DELETE FROM $subscribtion_table_name WHERE subsc_channel_id=%d",$_GET['id']));
	
	$wpdb->query($wpdb->prepare("DELETE FROM $video_table_name WHERE channel_id=%d",$_GET['id']));
	
	$wpdb->query($wpdb->prepare("DELETE FROM $watchlater_table_name WHERE channeid=%d",$_GET['id']));
	
	$wpdb->query($wpdb->prepare("DELETE FROM $watchhistory_table_name WHERE u_channelid=%d",$_GET['id']));
	
	echo '<script>window.location="?page=channels";</script>';
}

?>