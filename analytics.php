<script>
$hdwt(document).ready(function(){

	$hdwt('.analytics_hover_status').click(function()
	{		   		
		   $hdwt('#analytics_all_status').hide();
		   $hdwt('#'+ this.id +'_content').show();
		   
	});

	$hdwt('.analytics_back_btn').click(function()
	{
		 $hdwt('#analytics_all_status').show();
		 $hdwt('.analytics_hover_status').show();
		 $hdwt('.analytics_all_status_content').hide();
	});
});
</script>

<style>

.analytics_top10_videos tr{
   border-bottom: 1px solid #DDDDDD !important;
}
.analytics_top10_videos tr td {

    border:none!important;
}
.analytics_back_btn
{
    margin: 15px;
    cursor: pointer;
   
}
.analytics_channel_title {
	color: #222;
	font-size: 21px;
	font-weight: normal;
	line-height: 23px;
	cursor: pointer;
}

.analytics_channel_title:hover {
	text-decoration: underline;
	color: #1b7fcc;
}

.top_10video_title{
color:#1b7fcc;
cursor:pointer;
width:300px; 
overflow:hidden;
}

.top_10video_title:hover
{
    text-decoration: underline;
}

.analytics_channel_details {
	color: #999;
	font-size: 11px;
	font-weight: normal;
	padding-top:5px;
}

.analytics_channel_btn {
	margin-top: 7px;
	border-radius: 2px;
	color: #fff;
	font-size: 10px;
	padding: 5px;
	text-transform: uppercase;
	background-color: #ccc;
	display: inline-block;
}

.analytics_all_status_content{
    display:none;
}
.analytics_hover_status
{
    border:1px solid #fff;
    border-left: 1px solid #ccc;
    padding:10px;
    cursor:pointer;
}
.analytics_hover_status:hover{

    border:1px solid #C0C0C0;
    background:#F0F0F0;
    
}
</style>

<?php
$analytics .='<div style="border-bottom: 1px solid #D0D0D0; padding: 10px;">';

/********************** * Channel Profile**************/

$analytics_user_info  = $wpdb->get_row($wpdb->prepare("SELECT * FROM $channel_table_name WHERE userid=%d AND channel_id=%d",$current_user->ID,$_SESSION['your_current_channel']));

$analytics_count_videos = $wpdb->get_results($wpdb->prepare("SELECT * FROM $video_table_name WHERE channel_id=%d",$_SESSION['your_current_channel']));

$analytics .='	<div style="float: left; cursor: pointer;"><img src="'.$analytics_user_info->channel_icon.'"	style="width: 68px; height: 68px;" /></div>';
$analytics .='	<div style="margin-left: 10px; float: left;">';

$analytics .='		<div class="analytics_channel_title" onclick="location.href=\''.$pluginurl.'channel='.$analytics_user_info->channel_id.'\'">'.$analytics_user_info->channel_name.'</div>';
$analytics .='		<div class="analytics_channel_details">videos  : '.count($analytics_count_videos).'  Created : '.date("F j, Y",strtotime($analytics_user_info->datetime)).'</div>';
$analytics .='		<div class="analytics_channel_btn">CHANNEL</div>';
$analytics .='	</div><div style="clear: both;"></div>';

$analytics .='	<div style="margin-top: 10px; color: #666; font-size: 16px; font-weight: normal;">Last 30 days ('.date("F j, Y",strtotime('-29 days')).' - to - '.date("F j, Y",strtotime(date("Y-m-d"))).')</div>';
 
 
$analytics .=' </div>';


$analytics .='<div id="analytics_all_status">';

/***PERFORMANCE TAB***/

$analytics .='<div style="border-bottom: 1px solid #D0D0D0; padding: 10px;">';

$analytics .='	<div>Performance</div>';

$analytics .='	<div style="float: left; width: 40%;" class="analytics_hover_status" id="analytics_view">';
$analytics .='		<div style="vertical-align: middle;"><img src="'.$img_folder_path.'analytics_bar.png" /></div>';
$analytics .='		<div>Views</div>';

$table_name = $wpdb->prefix.'youtube_watchhistory';
$get_views = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE videoid=%d AND currenttime BETWEEN NOW() - INTERVAL 30 DAY AND NOW()",$_GET['analytics']));

$analytics .='		<div>'.count($get_views).'</div>';
$analytics .='	</div>';

$analytics .='	<div style="float: left; width: 40%;" class="analytics_hover_status" id="analytics_subscribers">';
$analytics .='		<div style="vertical-align: middle;"><img src="'.$img_folder_path.'analytics_bar.png" /></div>';
$analytics .='		<div>SUBSCRIBERS</div>';

$table_name = $wpdb->prefix.'youtube_subscriptions';
$get_subscription = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE subsc_channel_id=%d AND current_time BETWEEN NOW() - INTERVAL 30 DAY AND NOW()",$_SESSION['your_current_channel']));

$analytics .='		<div>'.count($get_subscription).'</div>';
$analytics .='	</div><div style="clear: both;"></div>';
$analytics .='</div>';


/***ENGAGEMENT TAB***/

$analytics .='<div style="border-bottom: 1px solid #D0D0D0; padding: 10px;">';

$analytics .='	<div>Engagement</div>';

$analytics .='	<div style="float: left; width: 30%;" class="analytics_hover_status" id="analytics_likes">';
$analytics .='		<div style="vertical-align: middle;"><img src="'.$img_folder_path.'analytics_bar.png" /></div>';
$analytics .='		<div>Likes</div>';

$table_name = $wpdb->prefix.'youtube_likevideo';
$get_likes = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE lk_dlk_videoid=%d AND status=1 AND currentime BETWEEN NOW() - INTERVAL 30 DAY AND NOW()",$_GET['analytics']));

$analytics .='		<div>'.count($get_likes).'</div>';
$analytics .='	</div>';

$analytics .='	<div style="float: left; width: 30%;" class="analytics_hover_status" id="analytics_dislikes">';
$analytics .='		<div style="vertical-align: middle;"><img src="'.$img_folder_path.'analytics_bar.png" /></div>';
$analytics .='		<div>DISLIKES</div>';

$table_name = $wpdb->prefix.'youtube_likevideo';
$get_dislikes = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE lk_dlk_videoid=%d AND status=0 AND currentime BETWEEN NOW() - INTERVAL 30 DAY AND NOW()",$_GET['analytics']));

$analytics .='		<div>'.count($get_dislikes).'</div>';
$analytics .='	</div>';

$analytics .='	<div style="float: left; width: 30%;" class="analytics_hover_status" id="analytics_comments">';
$analytics .='		<div style="vertical-align: middle;"><img src="'.$img_folder_path.'analytics_bar.png" /></div>';
$analytics .='		<div>COMMENTS</div>';

$table_name = $wpdb->prefix.'youtube_comments';
$get_comments = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE video_id=%d AND comments_time BETWEEN NOW() - INTERVAL 30 DAY AND NOW()",$_GET['analytics']));

$analytics .='		<div>'.count($get_comments).'</div>';
$analytics .='	</div><div style="clear: both;"></div>';

$analytics .='</div></div>';


/***********REPORT OF ANALYTICS VIEW*******************/

$analytics .='<div id="analytics_view_content" class="analytics_all_status_content">';

$analytics .='<div style="height:50px; background:#F8F8F8; border:1px solid #E8E8E8;">';

$analytics .='<div style="float:left; width:150px; text-align:center; background:#C8C8C8; height:50px; border:1px solid #E8E8E8;"><span style="text-transform: uppercase; color: #444; font-size: 11px; font-weight: bold;">VIEWS</span><br><span style="font-size: 20px; color:#222;">'.count($get_views).'</span></div>';
$analytics .='<div style="float:left;" class="analytics_back_btn">GO BACK</div><div style="clear:both;"></div>';
$analytics .='</div>';

$analytics .='<div style=" padding:20px; border-bottom: 1px solid #D0D0D0;"><img src="'.$pluginurl.'analytics_view_chart='.$_GET['analytics'].'"/></div>';

$analytics .='</div>';


/***********REPORT OF ANALYTICS SUBSCRIPTIONS*******************/

$analytics .='<div id="analytics_subscribers_content" class="analytics_all_status_content">';

$analytics .='<div style="height:50px; background:#F8F8F8; border:1px solid #E8E8E8;">';

$analytics .='<div style="float:left; width:150px; text-align:center; background:#C8C8C8; height:50px; border:1px solid #E8E8E8;"><span style="text-transform: uppercase; color: #444; font-size: 11px; font-weight: bold;">SUBSCRIPTIONS</span><br><span style="font-size: 20px; color:#222;">'.count($get_subscription).'</span></div>';
$analytics .='<div style="float:left;" class="analytics_back_btn">GO BACK</div><div style="clear:both;"></div>';
$analytics .='</div>';

$analytics .='<div style="height:250px; padding:20px; border-bottom: 1px solid #D0D0D0;"><img src="'.$pluginurl.'analytics_subscriptions_chart='.$_SESSION['your_current_channel'].'"/></div>';

$analytics .='</div>';


/***********REPORT OF ANALYTICS LIKEs*******************/


$analytics .='<div id="analytics_likes_content" class="analytics_all_status_content">';

$analytics .='<div style="height:50px; background:#F8F8F8; border:1px solid #E8E8E8;">';

$analytics .='<div style=" float:left; width:150px; text-align:center; background:#C8C8C8; height:50px; border:1px solid #E8E8E8;"><span style="text-transform: uppercase; color: #444; font-size: 11px; font-weight: bold;">LIKES</span><br><span style="font-size: 20px; color:#222;">'.count($get_likes).'</span></div>';
$analytics .='<div style="float:left;" class="analytics_back_btn">GO BACK</div><div style="clear:both;"></div>';
$analytics .='</div>';

$analytics .='<div style="height:250px; padding:20px; border-bottom: 1px solid #D0D0D0;"><img src="'.$pluginurl.'analytics_likes_chart='.$_GET['analytics'].'"/></div>';

$analytics .='</div>';


/***********REPORT OF ANALYTICS DISLIKES*******************/


$analytics .='<div id="analytics_dislikes_content" class="analytics_all_status_content">';

$analytics .='<div style="height:50px; background:#F8F8F8; border:1px solid #E8E8E8;">';

$analytics .='<div style="float:left; width:150px; text-align:center; background:#C8C8C8; height:50px; border:1px solid #E8E8E8;"><span style="text-transform: uppercase; color: #444; font-size: 11px; font-weight: bold;">DISLIKES</span><br><span style="font-size: 20px; color:#222;">'.count($get_dislikes).'</span></div>';
$analytics .='<div style="float:left;" class="analytics_back_btn">GO BACK</div><div style="clear:both;"></div>';
$analytics .='</div>';

$analytics .='<div style="height:250px; padding:20px; border-bottom: 1px solid #D0D0D0;"><img src="'.$pluginurl.'analytics_dislikes_chart='.$_GET['analytics'].'"/></div>';

$analytics .='</div>';


/***********REPORT OF ANALYTICS COMMENTS*******************/

$analytics .='<div id="analytics_comments_content" class="analytics_all_status_content">';

$analytics .='<div style="height:50px; background:#F8F8F8; border:1px solid #E8E8E8;">';

$analytics .='<div style="float:left; width:150px; text-align:center; background:#C8C8C8; height:50px; border:1px solid #E8E8E8;"><span style="text-transform: uppercase; color: #444; font-size: 11px; font-weight: bold;">COMMENTS</span><br><span style="font-size: 20px; color:#222;">'.count($get_comments).'</span></div>';
$analytics .='<div style="float:left;" class="analytics_back_btn">GO BACK</div><div style="clear:both;"></div>';
$analytics .='</div>';

$analytics .='<div style="height:250px; padding:20px; border-bottom: 1px solid #D0D0D0;"><img src="'.$pluginurl.'analytics_comments_chart='.$_GET['analytics'].'"/></div>';

$analytics .='</div>';


/***********TOP 10 VIDEOS*******************/

$analytics .='<div style="border-bottom: 1px solid #D0D0D0; padding: 10px;">';

$analytics .='	<div style="margin-bottom:15px;">Top 10 Videos</div>';

$analytics .='	<table class="analytics_top10_videos" style="width:100%; font-size: 13px; border:1px;">';
$analytics .='	<tr style="font-weight:bold;"><td>Videos</td><td>Views</td><td>Likes</td></tr>';

$get_top10_video  = $wpdb->get_results($wpdb->prepare("SELECT * FROM $video_table_name WHERE channel_id=%d ORDER BY video_view DESC LIMIT 0,10",$_SESSION['your_current_channel']));
 
 
 for($i=0;$i<count($get_top10_video);$i++)
{
    $table_name = $wpdb->prefix.'youtube_likevideo';
    $get_likes = $wpdb->get_results("SELECT * FROM $table_name WHERE lk_dlk_videoid=".$get_top10_video[$i]->video_id." AND status=1");
$analytics .='	<tr><td><div class="top_10video_title">'.$get_top10_video[$i]->video_title.'</div></td><td>'.$get_top10_video[$i]->video_view.'</td><td>'.count($get_likes).'</td></tr>';
	
	 }
	
$analytics .='	</table>';


$analytics .='</div>';


?>