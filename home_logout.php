<style>
.slider_yclonehome {
	height: 145px;
	overflow: hidden;
	padding: 0 0 10px;
	positiion:relative;
	width: 100%;
}
.slider_yclonehome .viewport {
	float: left;
	width: calc(100% - 88px);
	height: 145px;
	overflow: hidden;
	position: relative;
}
.slider_yclonehome .disable {
	visibility: hidden;
}
.slider_yclonehome .overview {
	list-style: none;
	position: absolute;
	padding: 0;
	margin: 0;
	left: 0 top:  0;
}
.slider_yclonehome .overview li {
	float: left;
	margin: 0 10px 0 0;
	height: 154px;
	width: 170px;
}
.slider_yclonehome .overview li img {
	height: 75px;
	width: 150px;
}
.slider_yclonehome .buttons {
	background: url("<?php echo $img_folder_path.'prevArr.png'?>") no-repeat;
	display: block;
	margin: 30px 0px 0 0;
	background-size:50%;
	text-indent: -999em;
	float: left;
	width: 39px;
	height: 37px;
	overflow: hidden;
	position: relative;
	cursor:pointer;
}
.slider_yclonehome .next {
	background: url("<?php echo $img_folder_path.'nextArr.png'?>") no-repeat;
	background-size:50%;
	background-position: 0 0;
	margin: 30px 0 0 10px;
}
.video_title_span
{
	color: #468aca;
	font-weight: bold;
	cursor: pointer;		
	font-size:13px;
}
.channel_name_span {
	color: #2793e6;
	cursor: pointer;		
	font-size:12px;
}
.views_day_span {
    font-size:12px;
	color: #555;
}
.channel_title_span {
	color: #333;
	font-size: 20px;
	font-weight: bold;
	font-family: calibri;
	cursor: pointer;
}
.channel_title_span:hover {
	color: #2793e6;
}
.video_title_yt{
    color: #468aca;
    font-weight: bold;
    font-size: 13px;
    cursor:pointer;
	line-height: 1;
    margin-bottom: 5px;
}
.video_title_yt:hover{
    text-decoration:underline;
}
.video_channel_yt{
    color: #555;
    font-size:11px;
    line-height:20px;
}.video_channel_yt:hover{
    color:#468aca;
    cursor:pointer;
    text-decoration:underline;
}

@media screen and (max-width: 850px) {
#top_right_right, #top_right_left{
	width: 90% !important;
}
}

@media screen and (max-width: 480px) {
#top_video_part, #top_video_left, #top_video_right {
	width: 100% !important;
}
#top_right_right, #top_right_left{
	width: 45% !important;
}
}
</style>
<script>
$hdwt(document).ready(function ()
{
	$hdwt('.slider_yclonehome').slider({ display: 1 });
});
</script>
<?php
$get_settings = $wpdb->get_row("SELECT * FROM $settings_table_name");

$get_all_video_list = $wpdb->get_results("SELECT * FROM $video_table_name WHERE video_status=0  ORDER BY video_view DESC");

$get_channel_info = $wpdb->get_row ( "SELECT * FROM $channel_table_name WHERE channel_id=" . $get_all_video_list[0]->channel_id );

$watch_related_video = $wpdb->get_results ("SELECT * FROM $video_table_name" );

$n = date('Y-m-d H:i:s');
$video_upload_time = date_diff(
        date_create($get_all_video_list[0]->video_upload_time),
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


$channel_view .='<div id="logout_home_page" style="width: 100%; border: 15px solid #E0E0E0;">';

$channel_view .='<div id="top_video_part" style="padding: 15px; border-bottom:1px solid #E8E8E8;">';

$channel_view .='<div id="top_video_left" style="float:left; width:70%;">';
$channel_view .='<div style="float:left; cursor:pointer; width:60%;" onclick="location.href=\''.$pluginurl.'v='.$get_all_video_list[0]->video_id.'\'"><img src="'.$get_all_video_list[0]->video_thumpnails.'" style="width:100%; height:260px;"/></div>';
$channel_view .='<div style="width:35%; overflow:hidden; margin-left:10px; float:left;">';
$channel_view .='<div class="video_title_yt" onclick="location.href=\''.$pluginurl.'v='.$get_all_video_list[0]->video_id.'\'">'.$get_all_video_list[0]->video_title.'</div>';
$channel_view .='<div class="video_channel_yt" onclick="location.href=\''.$pluginurl.'channel='.$get_channel_info->channel_id.'\'">by '.$get_channel_info->channel_name.'</div>';
$channel_view .='<div style="color: #555; font-size:11px;">'.$get_all_video_list[0]->video_view.' views - '.$up_ago.'</div>';
$channel_view .='</div>';
$channel_view .='<div style="clear:both;"></div>';

$channel_view .='</div>';

$channel_view .='<div id="top_video_right" style="float:left; width:30%;">';

for($i = 1 ; $i <= 3; $i++)
{

    $n = date('Y-m-d H:i:s');
    $video_upload_time = date_diff(
            date_create($get_all_video_list[$i]->video_upload_time),
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
    
    
    $channel_view .='<div id="top_right_left" style="float:left; cursor:pointer; width:45%;" onclick="location.href=\''.$pluginurl.'v='.$get_all_video_list[$i]->video_id.'\'"><img src="'.$get_all_video_list[$i]->video_thumpnails.'" style="width:100%; height:80px;"/></div>';
    $channel_view .='<div id="top_right_right"  style=" width:45%; height:80px; overflow:hidden; margin-left:10px; float:left;">';
    $channel_view .='<div class="video_title_yt" onclick="location.href=\''.$pluginurl.'v='.$get_all_video_list[$i]->video_id.'\'">'.$get_all_video_list[$i]->video_title.'</div>';
    $channel_view .='<div  class="video_channel_yt" onclick="location.href=\''.$pluginurl.'channel='.$get_channel_info->channel_id.'\'">by '.$get_channel_info->channel_name.'</div>';
    $channel_view .='<div style="color: #555; font-size:11px;">'.$get_all_video_list[$i]->video_view.' views - '.$up_ago.'</div>';
    $channel_view .='</div>';
    $channel_view .='<div style="margin-bottom:10px; clear:both;"></div>';

}

$channel_view .='</div>';
$channel_view .='<div style="clear:both;"></div>';
$channel_view .='</div>';
// Script for top div when div width less than the 696
$channel_view .= '<script type="text/javascript">';
$channel_view .= '$hdwt(document).ready(function(){';

$channel_view .= 'if(parseInt($hdwt("#top_video_part").css("width")) <= 696){';
$channel_view .= '$hdwt("#top_video_left").css("width", "60%");';
$channel_view .= '$hdwt("#top_video_left div").css("width", "90%");';
$channel_view .= '$hdwt("#top_video_right").css("width", "40%");';
$channel_view .= '}';
$channel_view .= '});';
$channel_view .= '</script>';

$channel_view .='<div style="height:100%; background:#F0F0F0;">';

/* *********************************************** * POPULAR Channel * ************************************************* */

$get_all_video_list = $wpdb->get_results("SELECT * FROM $video_table_name WHERE video_status=0 ORDER BY video_view DESC LIMIT 0,".$get_settings->videoperlist);

if($get_settings->sh_popularvideo == "yes")
{
$channel_view .='<div style="background:white; border-bottom:1px solid #C0C0C0; padding:10px;">';
$channel_view .='<div style="float: left;"><img src="'.$img_folder_path.'you_icon.jpg" style="width:25px; height:25px;"/></div><div class="channel_title_span" style="float: left; padding: 1px 0px 0px 10px;">Popular on '.$get_settings->hdw_sitename.'</div><div style="margin-bottom:10px; clear: both;"></div>';

$channel_view .='<div class="slider_yclonehome">';
$channel_view .='<a class="buttons prev">left</a>';
$channel_view .='<div class="viewport">';
$channel_view .='<ul style="padding:0 !important;" class="overview">';

for($i=4;$i<count($get_all_video_list);$i++)
{
    $n = date('Y-m-d H:i:s');
    $video_upload_time = date_diff(
            date_create($get_all_video_list[$i]->video_upload_time),
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
    
    
    $get_channel_info = $wpdb->get_row ( "SELECT * FROM $channel_table_name WHERE channel_id=" . $get_all_video_list[$i]->channel_id );
    
    $channel_view .='<li style="list-style-type: none !important;">
	                  <div class="clas_video_property" id="video_property_'.$i.'" style="position:relative;  cursor:pointer; height:90px; width:170px; background-size: 170px 90px; background-image: url('.$get_all_video_list[$i]->video_thumpnails.');" onclick="location.href=\''.$pluginurl.'v='.$get_all_video_list[$i]->video_id.'\'">';
    $channel_view .='<div title="watch later"   style="display:none; height: 15px;" id="watch_video_'.$i.'" class="watch_later_property"><img src="'.$img_folder_path.'watch_later.png" style="width:15px; height:15px;"/></div>';
    $channel_view .='</div>';
            
$channel_view .='<div class="y_channel_title" style=" cursor:pointer; font-size:13px; width:170px; height:20px; overflow:hidden; color: #1b7fcc; font-weight:bold;" onclick="location.href=\''.$pluginurl.'v='.$get_all_video_list[$i]->video_id.'\'">'.$get_all_video_list[$i]->video_title.'</div>';
$channel_view .='<div style=" color:#999;  margin-top: -3px; font-size: 11px;  width:170px; overflow:hidden;"><div style="display: inline-block;">by </div><div style="cursor:pointer; padding-left:3px; display: inline-block;" class="y_channel_title" onclick="location.href=\''.$pluginurl.'channel='.$get_all_video_list[$i]->channel_id.'\'">'.$get_channel_info->channel_name.'</div></div>';
$channel_view .='<div style=" color:#999;  margin-top: -3px; font-size: 11px; width:170px; overflow:hidden;">'.$get_all_video_list[$i]->video_view.' views - '.$up_ago.'</div>';
            
 $channel_view .='</li>';
}
$channel_view .='</ul>';
$channel_view .='</div>';
$channel_view .='<a class="buttons next">right</a>';
$channel_view .='</div>';

$channel_view .='</div>';
    					        
}

/* *********************************************** * MOVIES * ************************************************* */


$pop_you_video = $wpdb->get_results("SELECT * FROM $video_table_name WHERE video_status=0 AND video_category='FilmandAnimation' ORDER BY video_view DESC LIMIT 0,".$get_settings->videoperlist); //<--  Query for Movies Videos

if($get_settings->sh_movies == "yes")
{
    

$channel_view .='<div style="background:white; border-bottom:1px solid #C0C0C0; padding:10px;">';
$channel_view .='<div style="float: left;"><img src="'.$img_folder_path.'movie_icon.png" style="width:25px; height:25px;"/></div><div class="channel_title_span" style="float: left; padding: 1px 0px 0px 10px;">Movies</div><div style="margin-bottom:10px; clear: both;"></div>';

$channel_view .='<div class="slider_yclonehome">';
$channel_view .='<a class="buttons prev">left</a>';
$channel_view .='<div class="viewport">';
$channel_view .='<ul style="padding:0 !important;" class="overview">';

for($i=0;$i<count($pop_you_video);$i++)
{
    $n = date('Y-m-d H:i:s');
    $video_upload_time = date_diff(
            date_create($pop_you_video[$i]->video_upload_time),
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


    $get_channel_info = $wpdb->get_row ( "SELECT * FROM $channel_table_name WHERE channel_id=" . $pop_you_video[$i]->channel_id );

    $channel_view .='<li style="list-style-type: none !important;">
	                  <div class="clas_video_property" id="video_property_'.$i.'" style="position:relative;  cursor:pointer; height:90px; width:170px; background-size: 170px 90px; background-image: url('.$pop_you_video[$i]->video_thumpnails.');" onclick="location.href=\''.$pluginurl.'v='.$pop_you_video[$i]->video_id.'\'">';
    $channel_view .='<div title="watch later"   style="display:none; height: 15px;" id="watch_video_'.$i.'" class="watch_later_property"><img src="'.$img_folder_path.'watch_later.png" style="width:15px; height:15px;"/></div>';
    $channel_view .='</div>';

    $channel_view .='<div class="y_channel_title" style=" cursor:pointer; font-size:13px; width:170px; height:20px; overflow:hidden; color: #1b7fcc; font-weight:bold;" onclick="location.href=\''.$pluginurl.'v='.$pop_you_video[$i]->video_id.'\'">'.$pop_you_video[$i]->video_title.'</div>';
    $channel_view .='<div style=" color:#999;  margin-top: -3px; font-size: 11px;  width:170px; overflow:hidden;"><div style="display: inline-block;">by </div><div style="cursor:pointer; padding-left:3px; display: inline-block;" class="y_channel_title" onclick="location.href=\''.$pluginurl.'channel='.$pop_you_video[$i]->channel_id.'\'">'.$get_channel_info->channel_name.'</div></div>';
    $channel_view .='<div style=" color:#999;  margin-top: -3px; font-size: 11px; width:170px; overflow:hidden;">'.$pop_you_video[$i]->video_view.' views - '.$up_ago.'</div>';

    $channel_view .='</li>';
}
$channel_view .='</ul>';
$channel_view .='</div>';
$channel_view .='<a class="buttons next">right</a>';
$channel_view .='</div>';

$channel_view .='</div>';
	
}

/* *********************************************** * MUSIC * ************************************************* */


$pop_you_video = $wpdb->get_results("SELECT * FROM $video_table_name WHERE video_status=0 AND  video_category='Music' ORDER BY video_view DESC LIMIT 0,".$get_settings->videoperlist);//<--  Query for Music  Videos

if($get_settings->sh_music == "yes")
{
$channel_view .='<div style="background:white; border-bottom:1px solid #C0C0C0; padding:10px;">';
$channel_view .='<div style="float: left;"><img src="'.$img_folder_path.'music_icon.jpg" style="width:25px; height:25px;"/></div><div class="channel_title_span" style="float: left; padding: 1px 0px 0px 10px;">Music</div><div style="margin-bottom:10px; clear: both;"></div>';

$channel_view .='<div class="slider_yclonehome">';
$channel_view .='<a class="buttons prev">left</a>';
$channel_view .='<div class="viewport">';
$channel_view .='<ul style="padding:0 !important;" class="overview">';

for($i=0;$i<count($pop_you_video);$i++)
{
    $n = date('Y-m-d H:i:s');
    $video_upload_time = date_diff(
            date_create($pop_you_video[$i]->video_upload_time),
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


    $get_channel_info = $wpdb->get_row ( "SELECT * FROM $channel_table_name WHERE channel_id=" . $pop_you_video[$i]->channel_id );

    $channel_view .='<li style="list-style-type: none !important;">
	                  <div class="clas_video_property" id="video_property_'.$i.'" style="position:relative;  cursor:pointer; height:90px; width:170px; background-size: 170px 90px; background-image: url('.$pop_you_video[$i]->video_thumpnails.');" onclick="location.href=\''.$pluginurl.'v='.$pop_you_video[$i]->video_id.'\'">';
    $channel_view .='<div title="watch later"   style="display:none; height: 15px;" id="watch_video_'.$i.'" class="watch_later_property"><img src="'.$img_folder_path.'watch_later.png" style="width:15px; height:15px;"/></div>';
    $channel_view .='</div>';

    $channel_view .='<div class="y_channel_title" style=" cursor:pointer; font-size:13px; width:170px; height:20px; overflow:hidden; color: #1b7fcc; font-weight:bold;" onclick="location.href=\''.$pluginurl.'v='.$pop_you_video[$i]->video_id.'\'">'.$pop_you_video[$i]->video_title.'</div>';
    $channel_view .='<div style=" color:#999;  margin-top: -3px; font-size: 11px;  width:170px; overflow:hidden;"><div style="display: inline-block;">by </div><div style="cursor:pointer; padding-left:3px; display: inline-block;" class="y_channel_title" onclick="location.href=\''.$pluginurl.'channel='.$pop_you_video[$i]->channel_id.'\'">'.$get_channel_info->channel_name.'</div></div>';
    $channel_view .='<div style=" color:#999;  margin-top: -3px; font-size: 11px; width:170px; overflow:hidden;">'.$pop_you_video[$i]->video_view.' views - '.$up_ago.'</div>';

    $channel_view .='</li>';
}
$channel_view .='</ul>';
$channel_view .='</div>';
$channel_view .='<a class="buttons next">right</a>';
$channel_view .='</div>';

$channel_view .='</div>';		

}	
/* *********************************************** * SPORTS * ************************************************* */

if($get_settings->sh_sports == "yes")
{
$pop_you_video = $wpdb->get_results("SELECT * FROM $video_table_name WHERE video_status=0 AND video_category='Sports' ORDER BY video_view DESC LIMIT 0,".$get_settings->videoperlist); //<--  Query for Sports  Videos

$channel_view .='<div style="background:white; border-bottom:1px solid #C0C0C0; padding:10px;">';
$channel_view .='<div style="float: left;"><img src="'.$img_folder_path.'sports_icon.png" style="width:25px; height:25px;"/></div><div class="channel_title_span" style="float: left; padding: 1px 0px 0px 10px;">Sports</div><div style="margin-bottom:10px; clear: both;"></div>';

$channel_view .='<div class="slider_yclonehome">';
$channel_view .='<a class="buttons prev">left</a>';
$channel_view .='<div class="viewport">';
$channel_view .='<ul style="padding:0 !important;" class="overview">';

for($i=0;$i<count($pop_you_video);$i++)
{
    $n = date('Y-m-d H:i:s');
    $video_upload_time = date_diff(
            date_create($pop_you_video[$i]->video_upload_time),
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


    $get_channel_info = $wpdb->get_row ( "SELECT * FROM $channel_table_name WHERE channel_id=" . $pop_you_video[$i]->channel_id );

    $channel_view .='<li style="list-style-type: none !important;">
	                  <div class="clas_video_property" id="video_property_'.$i.'" style="position:relative;  cursor:pointer; height:90px; width:170px; background-size: 170px 90px; background-image: url('.$pop_you_video[$i]->video_thumpnails.');" onclick="location.href=\''.$pluginurl.'v='.$pop_you_video[$i]->video_id.'\'">';
    $channel_view .='<div title="watch later"   style="display:none; height: 15px;" id="watch_video_'.$i.'" class="watch_later_property"><img src="'.$img_folder_path.'watch_later.png" style="width:15px; height:15px;"/></div>';
    $channel_view .='</div>';

    $channel_view .='<div class="y_channel_title" style=" cursor:pointer; font-size:13px; width:170px; height:20px; overflow:hidden; color: #1b7fcc; font-weight:bold;" onclick="location.href=\''.$pluginurl.'v='.$pop_you_video[$i]->video_id.'\'">'.$pop_you_video[$i]->video_title.'</div>';
    $channel_view .='<div style=" color:#999;  margin-top: -3px; font-size: 11px;  width:170px; overflow:hidden;"><div style="display: inline-block;">by </div><div style="cursor:pointer; padding-left:3px; display: inline-block;" class="y_channel_title" onclick="location.href=\''.$pluginurl.'channel='.$pop_you_video[$i]->channel_id.'\'">'.$get_channel_info->channel_name.'</div></div>';
    $channel_view .='<div style=" color:#999;  margin-top: -3px; font-size: 11px; width:170px; overflow:hidden;">'.$pop_you_video[$i]->video_view.' views - '.$up_ago.'</div>';

    $channel_view .='</li>';
}
$channel_view .='</ul>';
$channel_view .='</div>';
$channel_view .='<a class="buttons next">right</a>';
$channel_view .='</div>';

$channel_view .='</div>';
}

/* *********************************************** * GAMMING * ************************************************* */

if($get_settings->sh_gaming == "yes")
{
$pop_you_video = $wpdb->get_results("SELECT * FROM $video_table_name WHERE video_status=0 AND  video_category='Gaming' ORDER BY video_view DESC LIMIT 0,".$get_settings->videoperlist); //<--  Query for games  Videos

$channel_view .='<div style="background:white; border-bottom:1px solid #C0C0C0; padding:10px;">';
$channel_view .='<div style="float: left;"><img src="'.$img_folder_path.'gaming_icon.jpg" style="width:25px; height:25px;"/></div><div class="channel_title_span" style="float: left; padding: 1px 0px 0px 10px;">Gaming</div><div style="margin-bottom:10px; clear: both;"></div>';

$channel_view .='<div class="slider_yclonehome">';
$channel_view .='<a class="buttons prev">left</a>';
$channel_view .='<div class="viewport">';
$channel_view .='<ul style="padding:0 !important;" class="overview">';

for($i=0;$i<count($pop_you_video);$i++)
{
    $n = date('Y-m-d H:i:s');
    $video_upload_time = date_diff(
            date_create($pop_you_video[$i]->video_upload_time),
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


   $get_channel_info = $wpdb->get_row ( "SELECT * FROM $channel_table_name WHERE channel_id=" . $pop_you_video[$i]->channel_id );

    $channel_view .='<li style="list-style-type: none !important; ">
	                  <div class="clas_video_property" id="video_property_'.$i.'" style="position:relative;  cursor:pointer; height:90px; width:170px; background-size: 170px 90px; background-image: url('.$pop_you_video[$i]->video_thumpnails.');" onclick="location.href=\''.$pluginurl.'v='.$pop_you_video[$i]->video_id.'\'">';
    $channel_view .='<div title="watch later"   style="display:none; height: 15px;" id="watch_video_'.$i.'" class="watch_later_property"><img src="'.$img_folder_path.'watch_later.png" style="width:15px; height:15px;"/></div>';
    $channel_view .='</div>';

    $channel_view .='<div class="y_channel_title" style=" cursor:pointer; font-size:13px; width:170px; height:20px; overflow:hidden; color: #1b7fcc; font-weight:bold;" onclick="location.href=\''.$pluginurl.'v='.$pop_you_video[$i]->video_id.'\'">'.$pop_you_video[$i]->video_title.'</div>';
    $channel_view .='<div style=" color:#999;  margin-top: -3px; font-size: 11px;  width:170px; overflow:hidden;"><div style="display: inline-block;">by </div><div style="cursor:pointer; padding-left:3px; display: inline-block;" class="y_channel_title" onclick="location.href=\''.$pluginurl.'channel='.$pop_you_video[$i]->channel_id.'\'">'.$get_channel_info->channel_name.'</div></div>';
    $channel_view .='<div style=" color:#999;  margin-top: -3px; font-size: 11px; width:170px; overflow:hidden;">'.$pop_you_video[$i]->video_view.' views - '.$up_ago.'</div>';

    $channel_view .='</li>';
}
$channel_view .='</ul>';
$channel_view .='</div>';
$channel_view .='<a class="buttons next">right</a>';
$channel_view .='</div>';

$channel_view .='</div>';
}

/*****************************************/

if($get_settings->premium_ids != "")
{

    $ifpremium =explode(",", $get_settings->premium_ids);

    if($ifpremium)
    {
        for($j=0;$j<count($ifpremium);$j++)
        {
         
        $get_channel_info = $wpdb->get_row ( "SELECT * FROM $channel_table_name WHERE channel_id=" . $ifpremium[$j]);



        if(isset($get_channel_info->channel_id)){

        $channel_view .='<div style="background:white; border-bottom:1px solid #C0C0C0; padding:10px;">';
            $channel_view .='<div style="float: left;"><img src="'.$get_channel_info->channel_icon.'" style="width:25px; height:25px;"/></div><div class="channel_title_span" style="float: left; padding: 1px 0px 0px 10px;" onclick="location.href=\''.$pluginurl.'channel='.$get_channel_info->channel_id.'\'">'.$get_channel_info->channel_name.'</div><div style="margin-bottom:10px; clear: both;"></div>';

            $channel_view .='<div class="slider_yclonehome">';
                    $channel_view .='<a class="buttons prev">left</a>';
            $channel_view .='<div class="viewport">';
            $channel_view .='<ul style="padding:0 !important;" class="overview">';

            $subscr_you_video = $wpdb->get_results("SELECT * FROM $video_table_name WHERE video_status=0 AND channel_id=".$ifpremium[$j]." LIMIT 0,".$get_settings->videoperrecommended);

            for($i=0;$i<count($subscr_you_video);$i++)
            {
                    $n = date('Y-m-d H:i:s');
            $video_upload_time = date_diff(
            date_create($subscr_you_video[$i]->video_upload_time),
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


                            $get_channel_info = $wpdb->get_row ( "SELECT * FROM $channel_table_name WHERE channel_id=" . $subscr_you_video[$i]->channel_id );

                            $channel_view .='<li style="list-style-type: none !important; ">
                            <div class="sub_clas_video_property" id="sub_video_property_'.$subscr_you_video[$i]->video_id.'" style="position:relative;   cursor:pointer; height:90px; width:170px; background-size:cover; background-image: url('.$subscr_you_video[$i]->video_thumpnails.');" onclick="location.href=\''.$pluginurl.'v='.$subscr_you_video[$i]->video_id.'\'">';
            	                  $channel_view .='<div title="watch later" style="display:none; height:15px;" id="sub_watch_video_'.$subscr_you_video[$i]->video_id.'" class="sub_watch_later_property"><img src="'.$img_folder_path.'watch_later.png" style="width:15px; height:15px;"/></div>';
                $channel_view .='</div>';

                $channel_view .='<div class="y_channel_title" style=" cursor:pointer; font-size:13px; width:170px; height:20px; overflow:hidden; color: #1b7fcc; font-weight:bold;" onclick="location.href=\''.$pluginurl.'v='.$subscr_you_video[$i]->video_id.'\'">'.$subscr_you_video[$i]->video_title.'</div>';
                $channel_view .='<div style=" color:#999;  margin-top: -3px; font-size: 11px;  width:170px; overflow:hidden;"><div style="display: inline-block;">by </div><div style="cursor:pointer; padding-left:3px; display: inline-block;" class="y_channel_title" onclick="location.href=\''.$pluginurl.'channel='.$subscr_you_video[$i]->channel_id.'\'">'.$get_channel_info->channel_name.'</div></div>';
            $channel_view .='<div style=" color:#999;  margin-top: -3px; font-size: 11px; width:170px; overflow:hidden;">'.$subscr_you_video[$i]->video_view.' views - '.$up_ago.'</div>';

             $channel_view .='</li>';
            }
                        $channel_view .='</ul>';
                        $channel_view .='</div>';
                                $channel_view .='<a class="buttons next">right</a>';
            $channel_view .='</div>';

            $channel_view .='</div>';
            }
         }
      }
}
/***************************************/
	
$channel_view .='</div>';     
?>