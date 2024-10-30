<style>
.slider12 {
	height: 145px;
	overflow: hidden;
	padding: 0 0 10px;
	positive:relative;
	width:100%;
}
.slider12 .viewport {
	float: left;
	width: 506px;
	height: 156px;
	overflow: hidden;
	position: relative;
}
.slider12 .disable {
	visibility: hidden;
}
.slider12 .overview {
	list-style: none;
	position: absolute;
	padding: 0;
	margin: 0;
	left: 0 top:  0;
}
.slider12 .overview li {
	float: left;
	margin: 0 10px 0 0;
	padding: 1px;
	height: 154px;
	width: 170px;
}
.slider12 .overview li img {
	height: 75px;
	width: 150px;
}
.watch_later_property,.watch_later_property_like
{
    margin: 0px 2px 2px 0px;
    border-radius: 3px;
    right: 0;
    bottom: 0;
    position: absolute;
    padding: 3px;
    border: 1px solid #333;
    background: rgba(255, 255, 255, 0.5);
    cursor:pointer;
}
.slider12 .buttons {
	background: url("<?php echo $img_folder_path.'prevArr.png'?>") no-repeat;
	display: block;
	margin: 30px 0px 0 0;
	background-size: 20px 20px;
	text-indent: -999em;
	float: left;
	width: 18px;
	height: 18px;
	overflow: hidden;
	position: relative;
	cursor:pointer;
} 
.slider12 .next {
	background: url("<?php echo $img_folder_path.'nextArr.png'?>") no-repeat;
	background-size: 20px 20px;
	margin: 30px 0 0 10px;
}
@media screen and (max-width: 960px) {
.slider12 .viewport {
	width: calc(100% - 56px) !important;
}
}
@media screen and (max-width: 480px) {
}
</style>
<script>
$hdwt(document).ready(function(){	
	$hdwt('.slider12').slider({ display: 1 });
});
	
$hdwt(document).ready(function(){
	$hdwt('.recent_video_property').mouseover(function(){
		var getid = (this.id).split('recent_video_property_')[1];
		$hdwt('#recent_video_'+getid).show();
		  
	}).mouseout(function(){
		var getid = (this.id).split('recent_video_property_')[1];
		$hdwt('#recent_video_'+getid).hide();
	});	
	$hdwt('.rec_video_property').mouseover(function(){
		var getid = (this.id).split('rec_video_property_')[1];
		$hdwt('#like_video_'+getid).show();
		  
	}).mouseout(function(){
		var getid = (this.id).split('rec_video_property_')[1];
		$hdwt('#like_video_'+getid).hide();
	});	
	$hdwt('.watch_later_property_like').click(function(){
		var getid = (this.id).split('like_video_')[1]; 
	    $hdwt.post(location.href,{watchlater:getid}, function( data ) 
	    {
		    if(data=="success")
		    {
		        $hdwt('#like_video_'+getid).html('<img src="<?php echo $img_folder_path.'right.png';?>" style="width:15px; height:15px;"/>');
		    }
		    
	    });		
	    return false;
	    
	});
	
	$hdwt('.watch_later_property').click(function(){
		var getid = (this.id).split('recent_video_')[1]; 
	    $hdwt.post(location.href,{watchlater:getid}, function( data ) 
	    {
		    if(data=="success")
		    {
		        $hdwt('#recent_video_'+getid).html('<img src="<?php echo $img_folder_path.'right.png';?>" style="width:15px; height:15px;"/>');
		    }
		    
	    });		
	    return false;
	    
	});
	
});
</script>
<?php 
$siteurl                   = get_option ( 'siteurl' );
$slider_url = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/js/jquery.slider.min.js';
$video .='<script type="text/javascript" src="'.$slider_url.'"></script>';

$video .= '<div style="background: white; width: 100%; box-shadow: 0 1px 2px #989898;">';

if($get_settings->show_uploadbtn == "yes")
{
$video  .='<div id="yclone_ch_like_videos" style="padding: 10px; border-bottom: 1px solid #B8B8B8;">';
$video .='<div style="font-weight: bold; color: #333; font-size: 18px; padding-bottom: 10px;">Recent uploads</div>';
$date = strtotime(date('Y-m-d H:i:s').' -1 month');
$get_date = date('Y-m-d H:i:s', $date);
$recent_uploads = $wpdb->get_results($wpdb->prepare("SELECT * from $video_table_name WHERE channel_id=%d AND video_upload_time >='".$get_date."' ORDER BY video_id DESC LIMIT 0,".$get_settings->noofvidmenuvid,intval($_GET['channel'])));
if($recent_uploads){
$video .='<div id="recent_upload_gal_div" style="width: 100%; position: relative; height: 156px; overflow: hidden;">';
$video .='<div class="slider12">';  
$video .='<a style="margin-right:10px;" class="buttons prev">left</a>';
$video .='<div class="viewport">';
$video .='<ul style="padding:0 !important;" class="overview">';

for($i=0;$i<count($recent_uploads);$i++){
    
    $n = date('Y-m-d H:i:s');
    $video_upload_time = date_diff(date_create($recent_uploads[$i]->video_upload_time),date_create($n));
    
    $up_ago = "";
    if ($video_upload_time->y > 0) {
        $up_ago = $video_upload_time->y . " years ago";
    } else
    if ($video_upload_time->m > 0) {
        $up_ago = $video_upload_time->m . " months ago";
    } else
    if ($video_upload_time->d > 0) {
        $up_ago = $video_upload_time->d . " days ago";
    } else
    if ($video_upload_time->h > 0) {
        $up_ago = $video_upload_time->h . " hours ago";
    } else
    if ($video_upload_time->m > 0) {
        $up_ago = $video_upload_time->m . " mins ago";
    } else
    if ($video_upload_time->s > 0) {
        $up_ago = "Just now";
    }
        
    $video .='<li style="list-style-type: none !important;">';
    $video .='<div class="recent_video_property" id="recent_video_property_'.$recent_uploads[$i]->video_id.'" onclick="location.href=\''.$pluginurl.'v='.$recent_uploads[$i]->video_id.'\'" style="position:relative; height:90px; width:170px;  cursor:pointer; background-size:170px 90px; background-image: url('.$recent_uploads[$i]->video_thumpnails.');">';
    $video .='<div title="watch later" style="display:none;  height: 15px; " id="recent_video_'.$recent_uploads[$i]->video_id.'" class="watch_later_property"><img src="'.$img_folder_path.'watch_later.png" style="width:15px; height:15px;"/></div>';
    $video .='</div>';
    $video .='<div class="y_channel_title" style="cursor:pointer; font-size:13px; width:170px; height:20px; overflow:hidden; color: #1b7fcc; font-weight:bold;" onclick="location.href=\''.$pluginurl.'v='.$get_like_list[$i]->lk_dlk_videoid.'\'">'.$recent_uploads[$i]->video_title.'</div>';
    $video .='<div style="color:#999;  font-size: 11px; width:170px; overflow:hidden;">'.$recent_uploads[$i]->video_view.' views - '.$up_ago.'</div>';
    $video .='</li>';
}
$video .='</ul>';
$video .='</div>';
$video .='<a class="buttons next">right</a>';
$video .='</div>';
$video .='<div style="clear: both;"></div></div>';
            }
            else {
$video .='<div style="height:200px;">No Recent Uploads</div>';
}
$video .='</div>';
}
$get_like_list = $wpdb->get_results($wpdb->prepare("SELECT * FROM $likedislike_table_name WHERE channelid=%d AND status=1 ORDER BY id DESC LIMIT 0,25",intval($_GET['channel'])));
if($get_like_list){
$video  .='<div id="yclone_ch_like_videos" style="padding: 10px; border-bottom: 1px solid #B8B8B8;">';
/* *********************************** * LIKED VIDEOS * ******************************************************/


$video .='<div style="font-weight: bold; color: #333; font-size: 18px; padding-bottom: 10px;">Liked Videos</div>';
$video .='<div style="width: 100%; position: relative; height: 156px; overflow: hidden;">';
$video .='<div class="slider12">';
$video .='<a style="margin-right:10px;" class="buttons prev">left</a>';
$video .='<div class="viewport">';
$video .='<ul style="padding:0 !important;" class="overview">';

for($i=0;$i<count($get_like_list);$i++)
{
   $get_channel_id = $wpdb->get_row($wpdb->prepare("SELECT * FROM $video_table_name WHERE video_id=%d",$get_like_list[$i]->lk_dlk_videoid));
    $get_channel_info = $wpdb->get_row ($wpdb->prepare("SELECT * FROM $channel_table_name WHERE channel_id=%d",$get_channel_id->channel_id));
    
    
    $video .='<li style="list-style-type: none !important;">';
    $video .='<div class="rec_video_property" id="rec_video_property_'.$get_channel_id->video_id.'" onclick="location.href=\''.$pluginurl.'v='.$get_channel_id->video_id.'\'" style="position:relative; height:90px; width:170px; cursor:pointer; background-size:170px 90px; background-image: url('.$get_channel_id->video_thumpnails.');">';
    $video .='<div title="watch later" style="display:none;  height: 15px; " id="like_video_'.$get_channel_id->video_id.'" class="watch_later_property_like"><img src="'.$img_folder_path.'watch_later.png" style="width:15px; height:15px;"/></div>';
    $video .='</div>';
    $video .='<div class="y_channel_title" style="cursor:pointer; font-size:13px; width:170px; height:20px; overflow:hidden; color: #1b7fcc; font-weight:bold;" onclick="location.href=\''.$pluginurl.'v='.$get_like_list[$i]->lk_dlk_videoid.'\'">'.$get_channel_id->video_title.'</div>';
    $video .='<div style="color:#999;  margin-top: -3px; font-size: 11px;  width:170px; overflow:hidden;"><div style="display: inline-block;">by </div><div style="cursor:pointer; padding-left:3px; display: inline-block;" class="y_channel_title" onclick="location.href=\''.$pluginurl.'channel='.$get_channel_id->channel_id.'\'">'.$get_channel_info->channel_name.'</div></div>';
    $video .='<div style="color:#999;  font-size: 11px; width:170px; overflow:hidden;">'.$recomd_you_video[$i]->video_view.' views - '.$up_ago.'</div>';   
    $video .='</li>';
    
   
}
$video .='</ul>';
$video .='</div>';
$video .='<a class="buttons next">right</a>';
$video .='</div>';

$video .='</div></div>';
}
else {
    $video .='<div style="height:200px;">No Recent Likes</div>';
}
$video .='</div>';
?>