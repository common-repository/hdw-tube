<style>
.watch_later_property
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

.playlist_title_h3 {
	padding: 5px;
	font-family: calibri;
	color: #000;
	font-size: 14px;
	font-weight: bold;
	cursor: pointer;
	border-radius: 3px;
}

.playlist_title_h3:hover {
	color: #ffffff !important;;
	background: #555;
}

.playlist_container_div {
	margin-top: 5px;
	max-height: 200px;
	overflow: auto;
	border: 1px solid #CCC;
	padding: 10px;
	background: #efefef;
	box-shadow: 0 1px 0 #fff, inset 0 1px 1px rgba(0, 0, 0, 0.2);
}

.yclone_btn_unsubscripe {
	cursor: pointer;
	font-size: 16px;
	font-family: calibri;
	border-radius: 2px;
	margin: 10px 0px 0px 10px;
	display: block;
	border: 1px solid #ccc;
	color: #999;
	background-image: linear-gradient(to top, #f6f6f6 0, #fcfcfc 100%);
}

.channel_hover_message:hover{
    text-decoration: underline;
}
.channel_setting_btn {
	display: inline-block;
	border: 1px solid #d3d3d3;
	background: #f8f8f8;
	border-radius: 2px;
	cursor: pointer;
	padding: 2px 5px 2px 5px;
	box-shadow: 0 1px 0 rgba(0, 0, 0, 0.05);
}

.channel_setting_btn:hover {
	background: #F0F0F0;
}

.yclone_btn_post1 {
	font-family: calibri;
	height: 100%;
	font-size: 14px;
	padding: 0px 10px 0px 10px;
	color: white;
	cursor: pointer;
	line-height: 46px;
	margin-left: 10px;
	border-radius: 2px;
	border: 1px solid transparent;
	display: inline-block;
	background-color: #1b7fcc;
}

.yclone_btn_post1:active {
	position: relative;
	top: 1px;
}

.yclone_btn_subscribe {
	font-family: calibri;
	font-size: 14px;
	display: inline-block;
	cursor: pointer;
	padding: 1px 10px 1px 10px;
	border-radius: 3px;
	box-shadow: 0 1px 2px rgb(58, 9, 9);
	color: #fefefe;
	background-image: linear-gradient(to top, #b01d13 0, #c6282c 100%);
}

.yclone_btn_subscribe:active {
	position: relative;
	top: 1px;
}

.video_heading_h1:hover {
	color: #333 !important;
	border-bottom: 3px solid #cc181e !important;
}

.video_heading_h1 {
	color: #B8B8B8;
	font-weight: bold;
	cursor: pointer;
	font-size: 12px;
	margin-left: 10px;
}

.video_heading_h2:hover {
	border: 1px solid #c6c6c6;
	padding: 0px 10px 0px 10px;
	border-radius: 2px;
	background: #f0f0f0;
	color: #333;
}

.video_heading_h2:active {
	position: relative;
	top: 1px;
}

.video_heading_h2 {
	border: 1px solid #ffffff;
	padding: 0px 10px 0px 10px;
	color: #B8B8B8;
	font-weight: bold;
	cursor: pointer;
	font-size: 12px;
	margin-left: 10px;
}

.video_subscription_title_h1 {
	border: 1px solid #ccc;
	margin: 2px 0px 0px 5px;
	color: #777;
	padding: 2px;
	font-size: 11px;
}

.y_channel_title_h1:hover {
	color: #1b7fcc !important;
}

.video_title_h1 {
	padding-bottom: 10px;
	color: #000;
	font-size: 22px;
	font-weight: normal;
	cursor: pointer;
	width: 100%;
	overflow: hidden;
}

.channel_title_h1 {
	color: #333;
	font-weight: bold;
	cursor: pointer;
	font-family: arial, sans-serif;
	font-size: 13px;
	margin-left: 10px;
}

.video_count_title {
	font-size: 11px;
	color: #666;
	font-family: arial, sans-serif;
	cursor: pointer;
}

.channel_title_h1:hover,.video_count_title:hover {
	text-decoration: underline;
}

.watch_menu_edit
{
    background: #f8f8f8;
    color: #333;
    padding: 5px 10px;
    border: solid 1px #d3d3d3;
    display: inline-block;    
    font-weight: bold;
    font-size: 11px;
    vertical-align: middle;
    cursor: pointer;
    border-radius: 2px;
    box-shadow: 0 1px 0 rgba(0,0,0,0.05);
}
.watch_menu_edit:hover
{
    background: #E0E0E0;
    border: solid 1px #d3d3d3;
}

.watch_menu_edit1:hover
{
    background: #f8f8f8;
    color: #333;
    border: solid 1px #d3d3d3 !important;
    display: inline-block;    
    font-weight: bold;
    font-size: 11px;
    vertical-align: middle;
    cursor: pointer;
    border-radius: 2px;
    box-shadow: 0 1px 0 rgba(0,0,0,0.05);
}

.no_video_found
{
    background: #262626;
    background-image: -moz-linear-gradient(top,#383838 0,#131313 100%);
    background-image: -ms-linear-gradient(top,#383838 0,#131313 100%);
    background-image: -o-linear-gradient(top,#383838 0,#131313 100%);
    background-image: -webkit-linear-gradient(top,#383838 0,#131313 100%);
    background-image: linear-gradient(to bottom,#383838 0,#131313 100%);
    padding:30px;
    
}

.error_message_not{
    
    padding: 0 5px 14px;
    border-bottom: 1px solid #888;
    font-size: 19px;
    font-weight: normal;
    text-shadow: 0 2px 2px #000;
    color:#fff;
}

#watch_lk_dlk {
	color:#666;
	font-size:11px;
}

#watch_lk {
	margin-right: 10px;
}
@media screen and (max-width: 850px) {
#video_share_1_content input, #video_share_2_content textarea, #video_share_3_content input, #video_share_3_content #email_message_content {
	width: 100% !important;
}
#watch_related_v_lst, #widget_related_v_lst_des {
	width: 100% !important;
	margin-left: 0 !important;
}
}

@media screen and (max-width: 480px) {
#y_show_report, #watch_comment {
	clear: left !important;
}
#y_show_about{
	margin:0 !important;
}
#watch_comment, .yclone_btn_post1 {
	margin-top:10px !important;	
}

#watch_comment{
	margin-left:0 !important;
}
#video_s_lk_d, #set_lk_dlk_menu{
	height:auto !important;
	text-align:center !important;
}
#video_s_lk_d div, .videolike, .videodislike{
	float:none !important;
	display: inline-block !important;
}
#video_c_lk_dlk_d{
	text-align:none !important;
}
}
</style>
<script type="text/javascript">
<!--
function changePlaylist(id){
	//id = id.replace( /^\D+/g, '');
	var url = window.location.href;
	url = url.replace(/(v=).*?(&|$)/g,'$1' + id + '$2');
	window.location.href = url;
}
//-->
</script>
<script>
$hdwt(document).ready(function(){	
	$hdwt('.video_heading_h1').click(function (){
			$hdwt('.video_heading_h1').css('border-bottom', '0px solid #ffffff');
			$hdwt('.video_heading_h1').css('color', '#B8B8B8');
			
			$hdwt('.y_show_content_select').hide();
			$hdwt(this).css('border-bottom', '3px solid #cc181e');
			$hdwt(this).css('color', '#333');
			
			$hdwt('#' + this.id + '_content').show();
		});

	$hdwt('#post_your_messge').click(function(){

		
		var mess =$hdwt("#txt_comment_video").val(); 
		var videoid = $hdwt('#current_video_id').val();
	    var user_src = $hdwt('#icon_user_1').attr('src');
		var myname= $hdwt('#user_comment_name').val();
		
		var msg = '<div style="margin-top: 10px;">';
		msg +='<div style="float: left;"><img src="'+user_src+'" style="margin-right: 10px; width: 50px; height: 50px;" /></div>';
		msg +='<div style="float: left;"><span style="color: #2793e6; font-size:13px; padding: 0 5px; font-weight: bold;">'+myname+'</span><span style="color: #999; font-size:13px; padding-left: 10px;">1 seconds ago</span><br><span style="font-size:15px;">'+mess+'</span></div>';
		msg +='<div style="clear: both"></div>';
		msg +='</div>';

		if ($hdwt.trim($hdwt("#txt_comment_video").val()) != '') 
		{
			 $hdwt.post(location.href,{commentbyvideo:videoid,commentmessage:mess}, function( data ) {
				 $hdwt('#after_message').after( msg );
				 $hdwt("#txt_comment_video").val("");
				 
			 });		 
		}		
	});

	$hdwt('.wl_video_property').mouseover(function(){
		var getid = (this.id).split('wl_video_property_')[1];
		$hdwt('#wl_video_'+getid).show();
		  
	}).mouseout(function(){
		var getid = (this.id).split('wl_video_property_')[1];
		$hdwt('#wl_video_'+getid).hide();
	});


	
	$hdwt('.watch_later_property').click(function(){

		var getid = (this.id).split('wl_video_')[1]; 
		var getit = (this.id);
	    $hdwt.post(location.href,{watchlater:getid}, function( data ) 
	    {
	    	if(data=='delete')
		    {
		    	$hdwt('#'+getit).html('<img src="<?php echo $img_folder_path;?>watch_later.png" style="width:15px; height:15px;">');
		    }
		    else
		    {		    
		    	$hdwt('#'+getit).html('<img src="<?php echo $img_folder_path;?>right.png" style="width:15px; height:15px;">');
		    }
		    
	    });		  
	    return false;
	    
	});

	$hdwt('.unsubscribe_channel').click(function(){
		   $hdwt.post(location.href,{unsubscribechannel:this.id}, function( data ) {
			   $hdwt('#after_subscribe').show();
			   $hdwt('#before_unsubscribe').hide();
			   $hdwt('#after_unsubscribe').hide();	
		   });		
	});

	$hdwt('.subscribe_channel').click(function(){

		var channelname = $hdwt('#channel_title_sub').val();
		   $hdwt.post(location.href,{subscribechannel:this.id,subsc_channel_name:channelname}, function( data ) {
			   $hdwt('#after_unsubscribe').show();
			   $hdwt('#before_subscribe').hide();	
			   $hdwt('#after_subscribe').hide();	
		   });		
	});

	$hdwt('.videolike').click(function(){
		var channelid = $hdwt('#liked_channel_id').val();
		$hdwt.post(location.href,{videolike:this.id,videochannelid:channelid}, function( data ) {
		   if(data =="1")
		   {
			   $hdwt('.videolike').css('color','#1b7fcc');
			   $hdwt('.videodislike').css('color','#B8B8B8');
		   }
		   else
		   {
			   $hdwt('.videolike').css('color','#B8B8B8');
			   $hdwt('.videodislike').css('color','#B8B8B8');
		   }
		  	
		});		
	});

	$hdwt('.videodislike').click(function(){
		var channelid = $hdwt('#liked_channel_id').val();
		$hdwt.post(location.href,{videodislike:this.id,videochannelid:channelid}, function( data ) {
		   if(data =="0")
		   {
			   $hdwt('.videodislike').css('color','#333');
			   $hdwt('.videolike').css('color','#B8B8B8');
		   }
		   else
		   {
			   $hdwt('.videodislike').css('color','#B8B8B8');
			   $hdwt('.videolike').css('color','#B8B8B8');
		   }		  	
		});		
	});

	$hdwt('.playlist_title_h3').click(function(){
		var videoid = $hdwt('#current_video_id').val();
	    var videocount = $hdwt('#'+this.id+' span').html();
	    videocount = parseInt(videocount.split('(')[1].split(')')[0]);
		$hdwt.post(location.href,{addvideotoplaylist:this.id,playlistvideoid:videoid}, function( data ) {
			var status = data.split('`')[0];
			var pl_id = data.split('`')[1];
		    if(status == 1)
		    {
		    	videocount++; 
		    	$hdwt('#'+ pl_id +' span').html(' (' + videocount + ')');
		    }
		    else
		    {
		    	videocount--;
		    	$hdwt('#'+ pl_id +' span').html(' (' + videocount + ')');
		    }		    
		});		
	});


	$hdwt('.add_videoto_watchlater').click(function(){

		var getid = (this.id).split('wl_id_')[1]; 
		var count = $hdwt('#count_video_wl').html();
		count = parseInt(count.split('(')[1].split(')')[0]);
	    $hdwt.post(location.href,{watchlater:getid}, function( data ) 
	    {
		    	  if(data =='success'  )
		    	  {
		    		  count++;
			    	  $hdwt('#count_video_wl').html(' (' + count + ')');
		    	  }
		    	  else
		    	  {
		    		  count--;
			    	  $hdwt('#count_video_wl').html(' (' + count + ')');
		    	  }
	    });	
	    
	});

	$hdwt('#btn_report_video').click(function(){
		var message = $hdwt('#txt_report_message').val();
		var issue   = $hdwt('#select_issue').val();
		var r_vid = '<?php echo $_GET ['v'];?>';
		$hdwt.post(location.href,{reportvideo:message,rvid:r_vid,rissue:issue},function(data)
		{
			$hdwt('#txt_report_message').val('');
	    });
	});
});

</script>

<?php
ini_set('display_errors', 0);
require_once (dirname ( __FILE__ ) . '/isMobile.php');
$get_settings = $wpdb->get_row("SELECT * FROM $settings_table_name");

$get_video_id = $_GET ['v'];
$get_p_id = $_GET['playlist'];
$get_lkpid = $_GET['playlistlk'];
$get_wlid = $_GET['playlistwl'];

$flashvars = 'baseW=' . $siteurl . '&id=' . encrypt_decrypt ( 'encrypt', 1 );

if($get_video_id != ''){
    $flashvars .= "&vid=" . $get_video_id;
}

if($get_p_id != ''){

    $flashvars .= "&pid=" . $get_p_id;
}
else if($get_lkpid != ''){
    $flashvars .= "&lpid=" . $get_lkpid;
}
else if($get_wlid != ''){
    $flashvars .= "&wlid=" . $get_wlid;
}


views ( $get_video_id );
watchview($get_video_id);
addmytags($get_video_id);

$check_own_video = @$wpdb->get_row ($wpdb->prepare("select * from " . $video_table_name . " WHERE user_id=%d AND video_id=%d",$current_user->ID ,$get_video_id ));

$watch_palyer .='<div style="/* padding: 0px 100px 0px 170px; position: absolute; */ right: 0; left: 0; z-index: 90; top: 0; background: white; margin-top: 40px;">';

require_once 'search.php';
$watch_palyer .= $topmenu;
$vstatus = '';
if(!$check_own_video){
	$vstatus = 'video_status=0  AND ';
}
$video_profile   = $wpdb->get_row($wpdb->prepare("SELECT * FROM $video_table_name WHERE $vstatus video_id=%d",$get_video_id));
if($video_profile){

$watch_palyer .='<div style="width: 100%;  font-family: arial,sans-serif; background: #ffffff; ">';
$watch_palyer .='<input type="hidden" id="current_video_id" value="'.$get_video_id.'"/>';

if($get_settings->sh_relateddvid == "yes")
{
    $watch_palyer .='<div style="float:left; width:100%;" id="player_side">';
}
else 
{
    $watch_palyer .='<div style="float:left; width:100%;" id="player_side">';
}
$watch_palyer .='<div id="video_player_div" style="width:100%; margin-top:10px;">';
$html5 = '';
$video_type = explode('`',$video_profile->video_type);
switch ($video_type[0]) {
	case 'youtube' :
		$url_string = parse_url ( $video_profile->video_url, PHP_URL_QUERY );
		parse_str ( $url_string, $args );
		$html5 .= '<iframe title="YouTube video player" width="100%" height="350" src="http://www.youtube.com/embed/' . $args ['v'] . '" frameborder="0" allowfullscreen></iframe>';
		break;
	case 'dailymotion' :
		$html5 .= '<iframe frameborder="0" width="100%" height="350" src="' . $video_profile->video_url . '"></iframe>';
		break;
	case 'rtmp' :
		$url_string = str_replace ( 'rtmp', 'http', $video_type[1] ) . '/' . $video_profile->video_url . '/playlist.m3u8';
		$html5 .= '<video poster="' . $video_profile->video_thumpnails . '" onclick="this.play();" width="100%" height="350" controls>';
		$html5 .= '<source src="' . $url_string . '" />';
		$html5 .= '</video>';
		break;
	default :
		$html5 .= '<video poster="' . $video_profile->video_thumpnails . '" onclick="this.play();" width="100%" height="350" controls>';
		$html5 .= '<source src="' . $video_profile->video_url . '" />';
		$html5 .= '</video>';
}
$detect = new isMobile_DetectTube();
if ($detect->isMobile()) {
	$watch_palyer .= $html5;
}else{
$watch_palyer .='<object id="rtmp_live" style="height: 350px; width: 100%; margin:0px !important;">';
$watch_palyer .='<param name="movie" value="' . $player_url . '">';
$watch_palyer .='<param name="flashvars">';
$watch_palyer .='<param name="allowFullScreen" value="true">';
$watch_palyer .='<param name="allowScriptAccess" value="always">';
$watch_palyer .='<param name="flashvars" value="' . $flashvars . '" />';
$watch_palyer .='<embed src="' . $player_url . '" flashvars="' . $flashvars . '" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="100%" height="350"></embed>';
$watch_palyer .='</object>';
}
$watch_palyer .='</div>';

$watch_palyer .='<div style=" background:white;">';

/* ********************************************** * IF OWN VIDEO  * ************************************************************ */
if($check_own_video)
{
    $watch_palyer .='<div style="border-bottom:1px solid #e6e6e6; padding:10px;">';
    $watch_palyer .='<div style="float:left;  border: solid 1px #ffffff; padding: 3px 10px;" title="Info and settings" class="watch_menu_edit1" onclick="location.href=\''.$pluginurl.'video_edit='.$get_video_id.'\'"><img src="'.$img_folder_path.'edit.png" style="width:15px; height:15px;"/></div>';
    $watch_palyer .='<div style="float: right;" class="watch_menu_edit" onclick="location.href=\''.$pluginurl.'analytics='.$get_video_id.'\'">Analytics</div>';
    $watch_palyer .='<div style="float: right; margin-right:10px;" class="watch_menu_edit" onclick="location.href=\''.$pluginurl.'videomanager='.$_SESSION['your_current_channel'].'\'">Video Manager</div>';
    $watch_palyer .='<div style="clear:both;"></div>';
    $watch_palyer .='</div>';

}

/* ********************************************** * VIDEO INFORMATION * ************************************************************ */


$channel_profile = @$wpdb->get_row("SELECT * FROM $channel_table_name WHERE channel_id=".$video_profile->channel_id);
$count_video = @$wpdb->get_results ( "SELECT * FROM $video_table_name WHERE channel_id=".$video_profile->channel_id);
$count_subscriptions = @$wpdb->get_results ( "SELECT * FROM $subscribtion_table_name WHERE subsc_channel_id=".$video_profile->channel_id);

if (filter_var ( $channel_profile->channel_icon, FILTER_VALIDATE_EMAIL ))
{
    $user_icon_src = "http://www.gravatar.com/avatar/" . md5 ( strtolower ( $channel_profile->channel_icon ) ) . "?d=" . urlencode ( $default ) . "&s=40";
}
else
{
    $user_icon_src = $channel_profile->channel_icon;
}

$channel_url    = $pluginurl.'channel='.$video_profile->channel_id;

$watch_palyer .='<div  style="padding:10px;" class="video_title_h1">'.$video_profile->video_title.'</div>';
  
$watch_palyer .='<div id="video_s_lk_d" style="padding:10px; height:50px">';
$watch_palyer .='<div style="float:left;"><img src="'.$user_icon_src.'" style="width:50px; height:50px;"/></div>';
  
$watch_palyer .='<div style="float:left;" id="video_t_s_d">';
$watch_palyer .='<div><div style="float:left;" id="channel_title_sub" class="channel_title_h1" onclick="location.href=\''.$channel_url.'\'">'.$channel_profile->channel_name.'</div><div class="video_count_title" style="float:left; margin: 2px 0px 0px 5px;" onclick="location.href=\''.$channel_url.'\'">  '.count($count_video).' videos</div><div style="clear:both;"></div></div>';

/* ************************************ * SUBSCRIBTIONS * ********************************************* */

if($get_settings->sh_subscription == "yes")
{
if($current_user->ID)
{
    if($check_own_video)
    {
        $watch_palyer .='<div class="channel_setting_btn" style="float:left; margin:0px 0px 0px 10px;">';
        $watch_palyer .='<div style="float:left;"><img src="'.$img_folder_path.'channelsetting.png" style="width:15px; height:15px"/></div>';
        $watch_palyer .='<div style="float:left; color: #333; font-family: calibri; font-weight: bold; font-size: 13px; margin-left:5px;" onclick="location.href=\''.$channel_url.'\'">Channel Settings</div>';
        $watch_palyer .='<div style="clear:both;"></div>';
        $watch_palyer .='</div>';
    }
    else
    {
        $chceck_subscripe = @$wpdb->get_row($wpdb->prepare("SELECT * FROM $subscribtion_table_name WHERE channel_id=%d AND subsc_channel_id=%d",$_SESSION ['your_current_channel'],$video_profile->channel_id));
        
        if($chceck_subscripe)
        {
            $watch_palyer .='<div id="before_unsubscribe" class="yclone_btn_unsubscripe" style="float:left; margin:10px 0px 0px 10px; display:block;">';
            $watch_palyer .='<div style="float:left;"><img src="'.$img_folder_path.'close_icon.png" style="border-radius: 3px; margin: 2px 4px 0px 5px; width: 15px; height: 15px;"/></div>';
            $watch_palyer .='<div style="float:left; padding-right: 5px; " id="'.$video_profile->channel_id.'" class="unsubscribe_channel">Unsubscribe</div>';
            $watch_palyer .='<div style="clear:both;"></div>';
            $watch_palyer .='</div>';
        }
        else 
        {      
            $watch_palyer .='<div id="before_subscribe" class="yclone_btn_subscribe" style="float:left; margin: 0px 0px 0px 10px; display:block;">';
            $watch_palyer .='<div style="float:left;"><img src="'.$img_folder_path.'subscr_red_btn.png" style="border-radius: 3px; margin-right: 5px; width: 15px; height: 11px;"/></div>';
            $watch_palyer .='<div style="float:left;" id="'.$video_profile->channel_id.'" class="subscribe_channel" >Subscribe</div>';
            $watch_palyer .='<div style="clear:both;"></div>';
            $watch_palyer .='</div>';
        }
        
        $watch_palyer .='<div id="after_unsubscribe" class="yclone_btn_unsubscripe" style="float:left; margin:10px 0px 0px 10px; display:none;">';
        $watch_palyer .='<div style="float:left;"><img src="'.$img_folder_path.'close_icon.png" style="border-radius: 3px; margin-right: 5px; width: 15px; height: 15px;"/></div>';
        $watch_palyer .='<div style="float:left; padding-right: 5px; " id="'.$video_profile->channel_id.'" class="unsubscribe_channel">Unsubscribe</div>';
        $watch_palyer .='<div style="clear:both;"></div>';
        $watch_palyer .='</div>';
        
        $watch_palyer .='<div id="after_subscribe" class="yclone_btn_subscribe" style="float:left; margin: 0px 0px 0px 10px; display:none;">';
        $watch_palyer .='<div style="float:left;"><img src="'.$img_folder_path.'subscr_red_btn.png" style="border-radius: 3px; margin-right: 5px; width: 15px; height: 11px;"/></div>';
        $watch_palyer .='<div style="float:left;" id="'.$video_profile->channel_id.'" class="subscribe_channel">Subscribe</div>';
        $watch_palyer .='<div style="clear:both;"></div>';
        $watch_palyer .='</div>';
          
    }
}
else 
{
    $watch_palyer .='<div class="yclone_btn_subscribe" style="float:left; margin: 0px 0px 0px 10px;">';
    $watch_palyer .='<div style="float:left;"><img src="'.$img_folder_path.'subscr_red_btn.png" style="border-radius: 3px; margin-right: 5px; width: 15px; height: 11px;"/></div>';
    $watch_palyer .='<div style="float:left;">Subscribe</div>';
    $watch_palyer .='<div style="clear:both;"></div>';
    $watch_palyer .='</div>';
}

/******************************/



$watch_palyer .='<div style="float:left;" class="video_subscription_title_h1">'.count($count_subscriptions).'</div>'; 
} $watch_palyer .='<div style="clear:both;"></div>';
$count_likes  = $wpdb->get_results($wpdb->prepare("SELECT * FROM $likedislike_table_name WHERE lk_dlk_videoid=%d AND status=1",$get_video_id));
$count_dislikes  = $wpdb->get_results($wpdb->prepare("SELECT * FROM $likedislike_table_name WHERE lk_dlk_videoid=%d AND status=0",$get_video_id));

$watch_palyer .='</div>';
   
$watch_palyer .='<div style="float:right; text-align:right;" id="video_c_lk_dlk_d">';
$watch_palyer .='<div style="color: #333; font-size:19px;">'.$video_profile->video_view.'</div>';
$watch_palyer .='<div id="watch_lk_dlk" style="color:#666; font-size:11px;"><div  id="watch_lk" style="float:left;"><img src="'.$img_folder_path.'like.png" style="height:15px; width:15px;"/>'.count($count_likes).'</div><div style="float:right;" id="watch_dlk" ><img src="'.$img_folder_path.'dislike.png" style="height:15px; width:15px;"/>'.count($count_dislikes).'</div><div style="clear:both;"></div></div>';
$watch_palyer .='</div><div style="clear:both;"></div>';
$watch_palyer .='</div>';

/* ********************************************** * LIKE / DISLIKE * ************************************************************ */
   
$checkthis = @$wpdb->get_row($wpdb->prepare("SELECT * FROM $likedislike_table_name WHERE userid=%d AND channelid=%d AND lk_dlk_videoid=%d AND lk_dlk_channelid=%d",$current_user->ID,$_SESSION['your_current_channel'],$get_video_id,$video_profile->channel_id));

if(!$checkthis)
{
    $color1 = '#B8B8B8';
    $color2 = '#B8B8B8';
}
else if($checkthis->status==1)
{
    $color1 = '#1b7fcc';
    $color2 = '#B8B8B8';    
}
else{
    
    $color1 = '#B8B8B8';
    $color2 = '#333';
}

$watch_palyer .='<div id="set_lk_dlk_menu" style="border-bottom: 1px solid #e6e6e6; padding: 10px 10px 0px 10px;">';


if($current_user->ID)
{   if($get_settings->sh_like == "yes")
    {
      $watch_palyer .='<div class="video_heading_h2 videolike" style="color:'.$color1.'; float:left;" title="I like this" id="'.$get_video_id.'">Like</div>';
    }
    
    if($get_settings->sh_dislike == "yes")
    {
        $watch_palyer .='<div class="video_heading_h2 videodislike" style="color:'.$color2.'; float:left;" title="I dislike this" id="'.$get_video_id.'">DisLike</div>';
    }
}
else 
{
    if($get_settings->sh_like == "yes")
    {
        $watch_palyer .='<div class="video_heading_h2 videolike" style="color:'.$color1.'; float:left;" title="I like this" >Like</div>';
    }
    
    if($get_settings->sh_dislike == "yes")
    {
        $watch_palyer .='<div class="video_heading_h2 videodislike" style="color:'.$color2.'; float:left;" title="I dislike this">DisLike</div>';
    }
}

$watch_palyer .='<input type="hidden" id="liked_channel_id" value="'.$video_profile->channel_id.'"/>';

/* ********************************************** * VIDEO MENU * ************************************************************ */

if($get_settings->sh_menu_report == 1)
{
    $watch_palyer .='<div class="video_heading_h1" id="y_show_report" style="float:right;">Report</div>';
}

if($get_settings->sh_menu_statistics == 1)
{
    $watch_palyer .='<div class="video_heading_h1" id="y_show_statistics" style="float:right;">Statistics</div>';
}

if($get_settings->sh_menu_addto == 1)
{
    $watch_palyer .='<div class="video_heading_h1" id="y_show_addto" style="float:right;">Add to</div>';
}

if($get_settings->sh_menu_share == 1)
{
    $watch_palyer .='<div class="video_heading_h1" id="y_show_share" style="float:right;">Share</div>';
}

if($get_settings->sh_menu_about == 1)
{
    $watch_palyer .='<div class="video_heading_h1" id="y_show_about" style="float:right; color:#333; border-bottom:3px solid #cc181e;">About</div>';
}

$watch_palyer .='<div class="video_heading_h1" style="clear:both;"></div>';
    
$watch_palyer .='</div>';
   
/* ********************************************** * VIDEO CONTENT * ************************************************************ */

if($get_settings->sh_menu_report == 1)
{
    
    $watch_palyer .='<div id="y_show_report_content" class="y_show_content_select" style="border-bottom:1px solid #f0f0f0; padding:10px; display:none;">';
       
    if($current_user->ID){
    $watch_palyer .='<div style="font-size: 12px; font-weight: bold;">What is the issue?*</div><div>
            <select id="select_issue">
                <option value="Child Abuse">Child Abuse</option>
                <option value="Violent or repulsive content">Violent or repulsive content</option>
                <option value="Hateful or abusive content">Hateful or abusive content</option>
                <option value="Harmful dangerous acts">Harmful dangerous acts</option>
                <option value="Sexual content">Sexual content</option>
                <option value="Spam or misleading">Spam or misleading</option>
                <option value="Infringes my rights">Infringes my rights</option>
                <option value="Captions report (CVAA)">Captions report (CVAA)</option>   
            </select>
            </div>';
    $watch_palyer .='<div style="font-size: 12px; font-weight: bold;">Message</div>';
    $watch_palyer .='<div><textarea id="txt_report_message" rows="3" cols="4" style="resize:none; width:70%; height:45px;"></textarea></div>';
    $watch_palyer .='<div id="btn_report_video" style="margin-top:10px; background: red; color: #fff; display: inline-block; padding: 0 10px; font-size:12px; border: 1px solid red; border-radius: 2px; font-weight: bold; cursor: pointer;">Report</div>';
    }else {
        $watch_palyer .='<div>Login to report this video</div>';
    }
    
    $watch_palyer .='</div>';
}

if($get_settings->sh_menu_statistics == 1)
{
    $watch_palyer .='<div id="y_show_statistics_content" class="y_show_content_select" style="display:none;">';
            require_once (dirname ( __FILE__ ) . '/mygraph/analytics_v.php');
            $watch_palyer .=$analytics;
    $watch_palyer .='</div>';
}

if($get_settings->sh_menu_addto == 1)
{
    $watch_palyer .='<div id="y_show_addto_content" class="y_show_content_select" style=" padding:10px; display:none;">';
    if($current_user->ID){
    
    $watch_palyer .='<span style="font-weight:bold; font-size:14px;">Playlist</span>';
            
    $watch_palyer .='<div class="playlist_container_div">';
    $get_wl_count = @$wpdb->get_results($wpdb->prepare("SELECT * FROM $watchlater_table_name WHERE channelid=%d",$_SESSION['your_current_channel']));
    $watch_palyer .='<div class="playlist_title_h3 add_videoto_watchlater" id="wl_id_'.$_GET['v'].'" >Watch Later<span id="count_video_wl" style="font-weight:normal; color:#A8A8A8;"> ('.count($get_wl_count).')</span></div>';
    for($i=0;$i<count($getplaylist);$i++)
    {
        $get_playlist_info = @$wpdb->get_results("SELECT * from $playlist_table_name WHERE playlistid=".$getplaylist[$i]->id);        
        $watch_palyer .='<div id="'.$getplaylist[$i]->id.'" class="playlist_title_h3">'.$getplaylist[$i]->playlistname.'<span id="count_video_playlist" style="font-weight:normal; color:#A8A8A8;"> ('.count($get_playlist_info).')</span></div>';     
    }
    $watch_palyer .='</div>';
            
    }else {
        $watch_palyer .='<div>Login to add this video</div>';
    }
    $watch_palyer .='</div>';
}

if($get_settings->sh_menu_share == 1)
{
    $watch_palyer .='<div id="y_show_share_content" class="y_show_content_select" style="padding:10px; display:none;">';
                    
       require_once 'sharevideo.php';   
       $watch_palyer .=$sharecontent;
    $watch_palyer .='</div>';
}

if($get_settings->sh_menu_about == 1)
{
$watch_palyer .='<div id="y_show_about_content" class="y_show_content_select" style="padding:10px; display:block;">';

$watch_palyer .='<div style="color: #333; font-weight: bold;">Published on '.date("F j, Y",strtotime($video_profile->video_upload_time)).'</div>';
$watch_palyer .='<div style="font-size:12px;">'.$video_profile->video_description.'</div>';
$watch_palyer .='<div style="color: #333; font-size:11px; font-weight: bold;">Category <span style="color:#999;">'.$video_profile->video_category.'</span></div>';
$watch_palyer .='</div>';
}

/* ********************************************** * COMMENTS ON VIDEO * ************************************************************ */
   

$get_video_comment = @$wpdb->get_results($wpdb->prepare("SELECT * FROM $comment_table_name WHERE video_id=%d ORDER BY comments_time DESC",$get_video_id));
$get_channel_prof = @$wpdb->get_row($wpdb->prepare("SELECT * FROM $channel_table_name WHERE userid=%d AND channel_id=%d",$current_user->ID,$_SESSION['your_current_channel']));

$watch_palyer .='<input type="hidden" id="user_comment_name" value="'.$get_channel_prof->channel_name.'"/>';

if($get_settings->sh_comments == "yes")
{
$watch_palyer .='<div id="y_show_comments" style="margin-top:15px; padding:10px;">';
   
$watch_palyer .='<div style="text-transform: uppercase; color: #666; font-size: 13px; font-weight: bold; cursor: default;">ALL COMMENTS</div>';
   
$watch_palyer .='<div style="margin-top:10px; height:50px;">';
   

$watch_palyer .='<div style="float:left; height:100%;"><img id="icon_user_1" src="'.$get_channel_prof->channel_icon.'" style="width:50px; height:100%;border: 1px solid #ccc;"/></div>';
$watch_palyer .='<div id="watch_comment" style="float:left; width: 65%; margin-left: 5px; height: 100%;"><textarea id="txt_comment_video" rows="3" cols="4" style="resize:none; width:100%; height:100%; padding: 0;"></textarea></div>';

if($current_user->ID)
{
    $watch_palyer .='<div style="float:left" id="post_your_messge" class="yclone_btn_post1">Post</div>';
}
else 
{
    $watch_palyer .='<div style="float:left" class="yclone_btn_post1">Post</div>';
}
  
$watch_palyer .='<div style="clear:both;" id="after_message"></div>';

for($i=0;$i<count($get_video_comment);$i++)
{
    
    $n = date('Y-m-d H:i:s');
    $video_upload_time = date_diff(
            date_create($get_video_comment[$i]->comments_time),
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
    
    $watch_palyer .= '<div style="margin-top: 10px;">';
    $watch_palyer .='<div style="float: left;"><img src="'.$get_video_comment[$i]->channel_icon.'" style="margin-right: 10px; width: 50px; height: 50px;" /></div>';
    $watch_palyer .='<div style="float: left;"><span class="channel_hover_message" style="cursor:pointer; color: #2793e6; font-size:13px; padding: 0 5px; font-weight: bold;">'.$get_video_comment[$i]->channel_name.'</span><span style="color: #999; font-size:13px; padding-left: 10px;">'.$up_ago.'</span><br><span style="font-size:15px;">'.$get_video_comment[$i]->message.'</span></div>';
    $watch_palyer .='<div style="clear: both"></div>';
    $watch_palyer .='</div>';
}
   
$watch_palyer .='</div>';
   
$watch_palyer .='</div>';
}
   
$watch_palyer .='</div>';

$watch_palyer .='</div>';

 /* ********************************************** * RELATED VIDEOS * ************************************************************ */

$get_tags = @$wpdb->get_row($wpdb->prepare("SELECT * FROM $video_table_name WHERE video_id=%d",$_GET['v']));
$all_tags = explode(',', $get_tags->video_tags);
$video_query .= 'video_title LIKE "%'.$get_tags->video_title.'%" OR video_tags LIKE "%'.$get_tags->video_title.'%" ';
for($k=1;$k<count($all_tags);$k++)
{
   // if($k!=1){
        $video_query .= ' OR ';
   // }
    $video_query .= 'video_title LIKE "%'.$all_tags[$k].'%" OR video_tags LIKE "%'.$all_tags[$k].'%" ';
}

$watch_related_video =@$wpdb->get_results("SELECT * FROM $video_table_name WHERE ".$video_query." LIMIT 0,".$get_settings->noofrelatedvid);

if($get_settings->sh_relateddvid == "yes")
{
$watch_palyer .='<div style="float:left; clear: left; width:100%; margin-top:20px; background:white; "><h3>Related Videos</h3>';
$cti = 0;
for($i=0; $i<count($watch_related_video); $i++)
{
    if($watch_related_video [$i]->video_id != $_GET['v'])
    {
	    $video_url      = $pluginurl.'v='.$watch_related_video [$i]->video_id;
	    $channel_url    = $pluginurl.'channel='.$watch_related_video[$i]->channel_id;
	    
	    $get_channel_info = @$wpdb->get_row("SELECT * FROM $channel_table_name WHERE channel_id=".$watch_related_video[$i]->channel_id);
	    
	    
	    $n = date('Y-m-d H:i:s');
	    $video_upload_time = date_diff(
	            date_create($watch_related_video[$i]->video_upload_time),
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
	    if($cti % 2 == 0){
	    	$watch_palyer .= "<div style='clear:both;'></div>";
	    }
	    $cti = $cti +1;
	    
	    $watch_palyer .='<div id="watch_related_v_lst" style="margin-bottom:15px; width:49%; float:left; ';
	    if($cti % 2 == 0){
	    	$watch_palyer .=' margin-left: 1%;';
		}
		$watch_palyer .='">';
	    $watch_palyer .='<div class="wl_video_property" id="wl_video_property_'.$watch_related_video [$i]->video_id.'" style="float:left; margin-right:5px; cursor:pointer; background-image: url('.$watch_related_video [$i]->video_thumpnails.');width: 120px; height:68px; background-size: 120px 90px; background-position: 0px -12px; position:relative; overflow: hidden;"   onclick="location.href=\''.$video_url.'\'">';
	        
	    $watch_palyer .='<div title="watch later" style="display:none;  height: 15px; " id="wl_video_'.$watch_related_video [$i]->video_id.'" class="watch_later_property"><img src="'.$img_folder_path.'watch_later.png" style="width:15px; height:15px;"/></div>';
	        
	    $watch_palyer .='     </div>';
	    $watch_palyer .='<div style="float:left; width: calc(100% - 125px); word-wrap: break-word; overflow: hidden;">';    
	    $watch_palyer .='<div class="y_channel_title_h1" style="cursor:pointer; font-size:13px;  overflow:hidden; color: #333; font-weight:bold;" onclick="location.href=\''.$video_url.'\'" >'.$watch_related_video [$i]->video_title.'</div>';
	    $watch_palyer .='<div style="color:#999; font-size: 11px;   overflow:hidden;"><div style="display: inline-block;">by </div><div style="cursor:pointer; padding-left:3px; font-size:12px; font-weight:bold; display: inline-block;" class="y_channel_title" onclick="location.href=\''.$channel_url.'\'">'.$get_channel_info->channel_name.'</div></div>';
	    $watch_palyer .='<div style="color:#999; font-size: 11px;  overflow:hidden;">'.$watch_related_video [$i]->video_view.' views - '.$up_ago.'</div>';   
	    $watch_palyer .='</div>';
	    $watch_palyer .='<div style="clear:both;"></div>';
	    $watch_palyer .='</div>';
    }
}

$watch_palyer .='</div>';

}
$watch_palyer .='<div style="clear:both;"></div>';

$watch_palyer .='</div>';
}
else 
{
    $watch_palyer .='<div style="width: 100%;  font-family: arial,sans-serif; background: #ffffff; ">';
    
    $watch_palyer .='<div style="margin: 10px 0; color:#fff; padding: 5px 10px; width:70%; background-color: #b91f1f; border:1px solid #a11b1a;">! An error occurred during validation.</div>';
    
    $watch_palyer .='<div class="no_video_found" style="width:90%; height:330px;">';
    
    $watch_palyer .='<div class="error_message_not">Sorry, there is no video here.</div>';
    $watch_palyer .='<div style="color:#fff; margin-top:10px;">Either it was deleted or it has been set to private.</div>';
    $watch_palyer .='<div style="margin-top: 75px; margin-left: calc(50% - 70px);"><img src="'.$img_folder_path.'error_vid.png"/></div></div>';
    
    $watch_palyer .='</div>';
    
}

$watch_palyer .='</div>';
?>