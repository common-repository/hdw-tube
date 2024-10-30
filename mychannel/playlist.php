<style>
.slider_playlist{
	height: 150px;
	overflow: hidden;
	padding: 0 0 10px;
	positive:relative;
	width: 100%;
	
}
.slider_playlist .viewport {
	float: left;
	width: 506px;
	height: 170px;
	overflow: hidden;
	position: relative;
}
.slider_playlist .disable {
	visibility: hidden;
}
.slider_playlist .overview {
	list-style: none;
	position: absolute;
	padding: 0;
	margin: 0;
	width: 570px;
	left: 0 top:  0;
}
.slider_playlist .overview li {
	float: left;
	margin: 0 10px 0 0;
	padding: 1px;
	height: 160px;
	width: 180px;
}
.slider_playlist .overview li img {
	height: 75px;
	width: 150px;
}
.slider_playlist .buttons {
	background: url("<?php echo $img_folder_path.'prevArr.png'?>") no-repeat;
	display: block;
	margin: 30px 0 0 0;
	background-size: 20px 20px;
	text-indent: -999em;
	float: left;
	width: 18px;
	height: 18px;
	overflow: hidden;
	position: relative;
	cursor:pointer;
} 
.slider_playlist .next {
	background: url("<?php echo $img_folder_path.'nextArr.png'?>") no-repeat;
	background-size: 20px 20px;
	background-position: 0 0;
	margin: 30px 0 0 10px;
}
.mychannel_playlist_title{
    cursor: pointer;
    font-weight: bold;
    color: #1b7fcc;
}
.mychannel_playlist_title:hover{
    text-decoration:underline;
}
.lk_playlist_channel_name:hover{
    text-decoration:underline;
    color: #1b7fcc;
}
@media screen and (max-width: 960px) {
.yclone_btn_playlist {
	clear: left;
	float: left !important;
}
.slider_playlist .viewport {
	width: calc(100% - 56px) !important;
}
}
@media screen and (max-width: 480px) {
}
</style>
<script>
$hdwt(document).ready(function(){	
	$hdwt('.slider_playlist').slider({ display: 1 });	
});
</script>
<?php
$slider_url = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/js/jquery.slider.min.js';
$playlist .='<script type="text/javascript" src="'.$slider_url.'"></script>';
$playlist .='<div style="background: white; padding: 10px; box-shadow: 0 1px 2px #989898;">';
$playlist .='<div id="ch_playlist_dv" style="font-weight: bold; color: #333; font-size: 18px; padding-bottom: 10px;">Playlists by '.$channel_profile->channel_name.'</div>';
	
$playlist .='<div class="slider_playlist">';
$playlist .='<a class="buttons prev" style="margin-right:10px;">left</a>';
$playlist .='<div class="viewport">';
$playlist .='<ul style="padding:0 !important;" class="overview">';
/* * ********************** * LIKED pLAYLIST * ******************************/
$getplaylists = $wpdb->get_results($wpdb->prepare("SELECT * FROM $likedislike_table_name WHERE channelid=%d AND status=1",$_GET['channel']));
if($getplaylists){
$playlist .='<li style="list-style-type: none !important;">';
$getvideoinfo1 = $wpdb->get_row($wpdb->prepare("SELECT * FROM $video_table_name WHERE video_id=%d",$getplaylists[0]->lk_dlk_videoid));
$getvideoinfo2 = $wpdb->get_row($wpdb->prepare("SELECT * FROM $video_table_name WHERE video_id=%d",$getplaylists[1]->lk_dlk_videoid));
$getvideoinfo3 = $wpdb->get_row($wpdb->prepare("SELECT * FROM $video_table_name WHERE video_id=%d",$getplaylists[2]->lk_dlk_videoid));
$isbackground = (!empty($getvideoinfo1->video_thumpnails)) ? "background-image: url('" . $getvideoinfo1->video_thumpnails . "');" : "background:#f1f1f1;" ;
$playlist .='<div id="play_list_select" onMouseOver="var a =sk;  $pl(a).show();" onMouseOut="var a =sk; $pl(a).hide();" style="' . $isbackground . 'margin-right: 15px; width: 175px; height: 100px; background-repeat: round;">';
if($getplaylists){
    $playlist .='<div id="sk" style="position: absolute; display: none; cursor: pointer; background: rgba(0, 0, 0, 0.5);" onClick="location.href = \''.$pluginurl.'playlistlk='.$_GET['channel'].'&v='.$getplaylists[0]->lk_dlk_videoid.'\';">';
    $playlist .='<div style="margin: 40px 73px; color: #fff; font-weight: bold; font-size: 16px;">Play</div>';
    $playlist .='</div>';
}
$playlist .='<div style="width: 73%; height: 100%; float: left;"></div>';
$playlist .='<div style="width: 20%; height: 90%; padding: 5px; text-align:center; background: rgba(0, 0, 0, 0.81); float: left;">';
$playlist .='<span style="font-size: 15px; color: White; font-weight: bold;">'.count($getplaylists).'</span><br>';
$playlist .='<span style="font-size: 11px; color: White; font-weight: bold;">Videos</span>';
$playlist .='<img src="'.$getvideoinfo2->video_thumpnails.'" style="width: 40px; height: 20px" />';
$playlist .='<img src="'.$getvideoinfo3->video_thumpnails.'" style="width: 40px; height: 20px" />';
$playlist .='</div>';
$playlist .='<div style="clear: both">';
$playlist .='</div>';
$playlist .='</div>';
$playlist .='<div class="mychannel_playlist_title" onclick="location.href=\''.$pluginurl.'playlistlv&ch='.$_GET['channel'].'\'">Liked videos</div>';
$playlist .='<div style="font-size:12px; color:#555;">'.count($getplaylists).' videos</div>';
$playlist .='</li>';
}
for($i=0;$i<count($getplaylist);$i++){
    
    $n = date('Y-m-d H:i:s');
    $video_upload_time = date_diff(
            date_create($getplaylist[$i]->pdate),
            date_create($n));
    
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
    
    
    
    $playlist .='<li style="list-style-type: none !important;">';
    
$getplaylists = $wpdb->get_results($wpdb->prepare("SELECT * FROM $playlist_table_name WHERE playlistid=%d",$getplaylist[$i]->id));
$getvideoinfo1 = $wpdb->get_row($wpdb->prepare("SELECT * FROM $video_table_name WHERE video_id=%d",$getplaylists[0]->videoid));
$getvideoinfo2 = $wpdb->get_row($wpdb->prepare("SELECT * FROM $video_table_name WHERE video_id=%d",$getplaylists[1]->videoid));
$getvideoinfo3 = $wpdb->get_row($wpdb->prepare("SELECT * FROM $video_table_name WHERE video_id=%d",$getplaylists[2]->videoid));
    $isbackground = (!empty($getvideoinfo1->video_thumpnails)) ? "background-image: url('" . $getvideoinfo1->video_thumpnails . "');" : "background:#f1f1f1;" ;
    
    $playlist .='<div id="play_list_select" onMouseOver="var a =s'.$i.';  $pl(a).show();" onMouseOut="var a =s'.$i.'; $pl(a).hide();" style="' . $isbackground . ' margin-right: 15px; width: 175px; height: 100px; background-repeat: round;">';
    if($getplaylists){
    $playlist .='<div id="s'.$i.'" style="position: absolute; display: none; cursor: pointer; background: rgba(0, 0, 0, 0.5);" onClick="location.href = \''.$pluginurl.'playlist='.$getplaylist[$i]->id.'&v='.$getplaylists[0]->videoid.'\';">'; 
    $playlist .='<div style="margin: 40px 73px; color: #fff; font-weight: bold; font-size: 16px;">Play</div>';
    $playlist .='</div>';
    }
    
    $playlist .='<div style="width: 73%; height: 100%; float: left;"></div>';
    $playlist .='<div style="width: 20%; height: 90%; padding: 5px; text-align:center; background: rgba(0, 0, 0, 0.81); float: left;">';					
    $playlist .='<span style="font-size: 15px; color: White; font-weight: bold;">'.count($getplaylists).'</span><br>';
    $playlist .='<span style="font-size: 11px; color: White; font-weight: bold;">Videos</span>';
    $playlist .='<img src="'.$getvideoinfo2->video_thumpnails.'" style="width: 40px; height: 20px" />';
    $playlist .='<img src="'.$getvideoinfo3->video_thumpnails.'" style="width: 40px; height: 20px" />';				
    $playlist .='</div>';
    $playlist .='<div style="clear: both">';
    $playlist .='</div>';
    $playlist .='</div>';
    $playlist .='<div class="mychannel_playlist_title" onclick="location.href=\''.$pluginurl.'playlist='.$getplaylist[$i]->id.'\'">'.$getplaylist[$i]->playlistname.'</div>';
    $playlist .='<div style="font-size:12px; color:#555;">'.count($getplaylists).' videos - '.$up_ago.'</div>';
    $playlist .='</li>';
    
}
$playlist .='</ul>';
$playlist .='</div>';
$playlist .='<a class="buttons next">right</a>';
$playlist .='</div>';

/* ********************************* * LIKED PLAYLISTs * **************************************/
$get_liked_playlist = $wpdb->get_results($wpdb->prepare("SELECT * FROM $likedplaylist_table_name WHERE channelid=%d",$_GET['channel']));
if($get_liked_playlist){
$playlist .='<div style="font-weight: bold; color: #333; font-size: 18px; padding-bottom: 10px;">Liked Playlists</div>';

$playlist .='<div class="slider_playlist">';
$playlist .='<a class="buttons prev">left</a>';
$playlist .='<div class="viewport">';
$playlist .='<ul style="padding:0 !important;" class="overview">';

for($j = 0 ; $j < count($get_liked_playlist); $j++)
{
    $getplaylist = $wpdb->get_results($wpdb->prepare("SELECT * FROM $playlisttitle_table_name WHERE id=%d",$get_liked_playlist[$j]->lk_playlist));
    for($i=0;$i<count($getplaylist);$i++)
    {
            $playlist .='<li style="list-style-type: none !important;">';
        
            $getplaylists = $wpdb->get_results($wpdb->prepare("SELECT * FROM $playlist_table_name WHERE playlistid=%d",$getplaylist[$i]->id));
        
            $getvideoinfo1 = $wpdb->get_row($wpdb->prepare("SELECT * FROM $video_table_name WHERE video_id=%d",$getplaylists[0]->videoid));
            $getvideoinfo2 = $wpdb->get_row($wpdb->prepare("SELECT * FROM $video_table_name WHERE video_id=%d",$getplaylists[1]->videoid));
            $getvideoinfo3 = $wpdb->get_row($wpdb->prepare("SELECT * FROM $video_table_name WHERE video_id=%d",$getplaylists[2]->videoid));
        
            $isbackground = (!empty($getvideoinfo1->video_thumpnails)) ? "background-image: url('" . $getvideoinfo1->video_thumpnails . "');" : "background:#f1f1f1;" ;
        
            $playlist .='<div id="play_list_select" onMouseOver="var a =s'.$i.';  $pl(a).show();" onMouseOut="var a =s'.$i.'; $pl(a).hide();" style="' . $isbackground . ' margin-right: 15px; width: 175px; height: 100px; background-repeat: round;">';
        
            if($getplaylists)
            {
                $playlist .='<div id="s'.$i.'" style="position: absolute; display: none; cursor: pointer; background: rgba(0, 0, 0, 0.5);" onClick="location.href = \''.$pluginurl.'playlist='.$getplaylist[$i]->id.'&v='.$getplaylists[0]->videoid.'\';">';
                $playlist .='<div style="margin: 40px 73px; color: #fff; font-weight: bold; font-size: 16px;">Play</div>';
                $playlist .='</div>';
            }
        
            $playlist .='<div style="width: 73%; height: 100%; float: left;"></div>';
            $playlist .='<div style="width: 20%; height: 90%; padding: 5px; text-align:center; background: rgba(0, 0, 0, 0.81); float: left;">';
            $playlist .='<span style="font-size: 15px; color: White; font-weight: bold;">'.count($getplaylists).'</span><br>';
            $playlist .='<span style="font-size: 11px; color: White; font-weight: bold;">Videos</span>';
            $playlist .='<img src="'.$getvideoinfo2->video_thumpnails.'" style="width: 40px; height: 20px" />';
            $playlist .='<img src="'.$getvideoinfo3->video_thumpnails.'" style="width: 40px; height: 20px" />';
            $playlist .='</div>';
            $playlist .='<div style="clear: both">';
            $playlist .='</div>';
            $playlist .='</div>';
            $playlist .='<div class="mychannel_playlist_title" onclick="location.href=\''.$pluginurl.'playlist='.$getplaylist[$i]->id.'\'">'.$getplaylist[$i]->playlistname.'</div>';
            $get_channel_name = $wpdb->get_row($wpdb->prepare("SELECT * FROM $channel_table_name WHERE channel_id=%d",$getplaylist[$i]->channelid));
            $playlist .='<div style="font-size:12px; color:#555; cursor:pointer; ">by <div class="lk_playlist_channel_name" style="display:inline-block;" onclick="location.href=\''.$pluginurl.'channel='.$getplaylist[$i]->channelid.'\'">'.$get_channel_name->channel_name.'</div> - '.count($getplaylists).' videos</div>';
            $playlist .='</li>';
        
    }
}
$playlist .='</ul>';
$playlist .='</div>';
$playlist .='<a class="buttons next">right</a>';
$playlist .='</div>';
}
$playlist .='</div>';
?>