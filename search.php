<style>
#slider_one {
	height: 120px;
	overflow: hidden;
	padding: 0 0 10px;
	positive:relative;
	
}

#slider_one .viewport {
	float: left;
	width: 442px;
	height: 125px;
	overflow: hidden;
	position: relative;
}

#slider_one .disable {
	visibility: hidden;
}

#slider_one .overview {
	list-style: none;
	position: absolute;
	padding: 0;
	margin: 0;
	width: 570px;
	left: 0 top:  0;
}

#slider_one .overview li {
	float: left;
	margin: 0 10px 0 0;
	padding: 1px;
	height: 75px;
	width: 150px;
}

#slider_one .overview li img {
	height: 75px;
	width: 150px;
}
#slider_one .buttons {
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
#slider_one .next {
	background: url("<?php echo $img_folder_path.'nextArr.png'?>") no-repeat;
	background-size: 20px 20px;
	background-position: 0 0;
	margin: 30px 0 0 10px;
}
</style>


<style>
.yclone_upload_btn
{
    display: inline-block;
    padding: 5px 10px 5px 10px;
    color: #333;
    border: 1px solid #d3d3d3;
    background: #f8f8f8;
    font-size: 11px;
    font-family: arial,sans-serif;
    font-weight: bold;
    cursor:pointer;
    box-shadow: 0 1px 0 rgba(0,0,0,0.05);
}
.yclone_upload_btn:hover{
    background: #E0E0E0;
}
.yclone_upload_btn:active
{
    position:relative;
    top:1px;
}
.search_box
{
    position: relative;
    overflow: hidden;
    height: 25px;
    border: 1px solid #ccc;
    box-shadow: inset 0 2px 24px #EEE;
}
.search_text_box
{

    margin: 0;
    border: 0;
    outline: none;
    background: transparent;
    font-size: 16px;
    width:100%;
}
.yclone_config_menu:hover
{
    background: rgba(0, 0, 0, 0.67);
}
.yclone_config_menu
{
    cursor:pointer;
    padding:3px;
}
.user_config_menu_opt
{
    color: #1b7fcc;
    font-size: 12px;
    cursor:pointer;
}
.user_config_menu_opt:hover{
    text-decoration: underline;
}
</style>
<script type="text/javascript" src="<?php echo $slider_url;?>"></script>
<script>
$hdwt(document).ready(function(){	
	$hdwt('#slider_one').slider({ display: 1 });	
});
	

$hdwt(document).ready(function(){
	$hdwt('#slider_one').slider({ display: 1 });


	$hdwt('#txt_search_video').keypress(function(event){

	    var pageurl = $hdwt('#search_page_url').val();
	    var myquery = $hdwt('#txt_search_video').val(); 
	    if($hdwt.trim($hdwt("#txt_search_video").val()) != '')
		{
    	    if(event.which==13)
    	    {
    		    var gourl = pageurl+"search_video="+myquery    
    		    location.href= gourl ;
    	    }
		}
	});

	$hdwt('#btn_searchvideo_go').click(function(){
		var pageurl = $hdwt('#search_page_url').val();
	    var myquery = $hdwt('#txt_search_video').val(); 
	    if($hdwt.trim($hdwt("#txt_search_video").val()) != '')
		{
    	   
    		    var gourl = pageurl+"search_video="+myquery    
    		    location.href= gourl ;
    	   
		}
	});

    $hdwt('#nav_yclone_config_menu').click(function(){
        if($hdwt('#open_yclone_config_menu').css('display')=='none'){
            $hdwt('#open_yclone_config_menu').show();
        }
        else
        {
            $hdwt('#open_yclone_config_menu').hide();
        }
    });

    $hdwt('#nav_user_config_menu').click(function(){
        if($hdwt('#open_user_config_menu').css('display')=='none'){
            $hdwt('#open_user_config_menu').show();
        }
        else
        {
            $hdwt('#open_user_config_menu').hide();
        }
    });

});
</script>
<?php 
 
$siteurl = get_option ( 'siteurl' );
$slider_url = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/js/jquery.slider.min.js';
$topmenu .='<script type="text/javascript" src="'.$slider_url.'"></script>';

$topmenu .='<input type="hidden" value="'.$pluginurl.'" id="search_page_url" />';

$get_settings = $wpdb->get_row("SELECT * FROM $settings_table_name");

$topmenu .='<div style="padding-bottom:10px; border-bottom:1px solid #e8e8e8;">';
$topmenu .='<div class="search_box" style="float: left; width:45%;"><input id="txt_search_video" class="search_text_box" type="text" value="" name="search_video" /></div>';
$topmenu .='<div class="search_box" style="cursor: pointer; float: left; text-align: center; vertical-align: middle; width: 50px;">';
$topmenu .='<div id="btn_searchvideo_go"><img src="'.$img_folder_path.'search.png" style="height: 13px; width: 13px;" /></div></div>';

if($current_user->ID){
$topmenu .='<div style="margin-left:10px; cursor:pointer; float: right;" id="nav_user_config_menu"><img src="'.$user_icon_src.'" style="width:25px; height:25px;"/></div>';
$topmenu .='<div style="margin-left:10px; float: right; padding-top:5px; color: #666; font-size: 12px;" >'.$get_user_info->channel_name.'</div>';

if($get_settings->show_uploadbtn == "yes")
{
$topmenu .='<div style="float: right; position:relative; "><div style="float: right; position:relative;" id="nav_yclone_config_menu" class="yclone_upload_btn"><img src="'.$img_folder_path.'upload_config.png" style="width:22px; height:14px;"/></div>';

$topmenu .='<div id="open_yclone_config_menu" style="display:none; position:absolute; background: white; border: 1px solid #8f8f8f; padding: 10px 0px; margin-top: 26px; box-shadow: 1px 1px 0px 0px #C4C4C4; right: 0; width: 165px;">';
$topmenu .='<div class="yclone_config_menu" onclick="location.href=\''.$pluginurl.'channel_switcher\'"><div style="float: left;"><img src="'.$img_folder_path.'dashboard_icon.png" style="width:22px; height:22px; "/></div><div style="float: left; color: black; padding: 2px 0px 0px 5px;">Dashboard</div><div style="clear:both;"></div></div>';
$topmenu .='<div class="yclone_config_menu" onclick="location.href=\''.$pluginurl.'videomanager='.$_SESSION ['your_current_channel'].'\'"><div style="float: left; margin: 0 4px;"><img src="'.$img_folder_path.'manager_icon.png" style="width:15px; height:15px; "/></div><div style="float: left; color: black; padding: 0px 0px 0px 5px;">Video Manager</div><div style="clear:both;"></div></div>';
$topmenu .='<div class="yclone_config_menu" onclick="location.href=\''.$pluginurl.'analytics='.$_SESSION ['your_current_channel'].'\'"><div style="float: left; margin: 0 4px;"><img src="'.$img_folder_path.'chart_bar.png" style="width:15px; height:15px; "/></div><div style="float: left; color: black; padding: 0px 0px 0px 5px;">Analytics</div><div style="clear:both;"></div></div>';
$topmenu .='</div>';
$topmenu .='</div>';


    
        $topmenu .='<div style="float: right;" class="yclone_upload_btn" onclick="location.href=\''.$pluginurl.'upload\'">Upload</div>';
    }
}else {    $topmenu .='<div style="background: #7389F7; color:#fff; float: right;" onclick="showModalDialog(\''.wp_login_url().'\');"><div style="float: right; position:relative;" class="yclone_upload_btn">Login</div></div>';}

$topmenu .='<div style="clear:both;"></div>';
$topmenu .='</div>';



$topmenu .='<div id="open_user_config_menu"  style="display:none; border-bottom:1px solid #e8e8e8;">';

$topmenu .='<div style="float:left; border-right:2px solid #e8e8e8; border-left:2px solid #e8e8e8; width: calc(100% - 131px); padding:10px; overflow:hidden; height:90px;">';

$topmenu .='<div id="slider_one" style="width: 100%; ">';
$topmenu .='<a class="buttons prev" style="margin-right:5px;">left</a>';
$topmenu .='<div class="viewport">';
$topmenu .='<ul style="padding:0 !important;" class="overview">';

/* ************************* * WATCH LATER * ************************************** */

$get_watch_list = $wpdb->get_results($wpdb->prepare("SELECT * FROM $watchlater_table_name WHERE userid=%d AND channelid=%d",$current_user->ID,$_SESSION['your_current_channel']));

$get_thumpnail = $wpdb->get_row("SELECT * FROM $video_table_name WHERE video_id=".$get_watch_list[0]->videoid);

if($get_watch_list)
{
    $src = "background-image:url(".$get_thumpnail->video_thumpnails.");";
}
else 
{
    $src="background-image: linear-gradient(to bottom,#515151 0,#333 100%);";
}

$topmenu .='<li style="list-style-type: none !important;">';
$topmenu .=' <div style=" font-family:calibri; width:160px; height:90px; background-size:160px 90px; '.$src.'">';
$topmenu .=' <div style="cursor:pointer; height:30px;  background-color: rgba(0, 0, 0, 0.65); color:white;" onclick="location.href=\''.$pluginurl.'playlist&watchlater\'">';
$topmenu .=' <div style="float:left; padding: 4px; font-weight: bold;">Watch Later</div>';
$topmenu .=' <div style="float:right; font-size: 15px; padding: 6px; color: #999;">'.count($get_watch_list).'</div>';
$topmenu .=' <div style="clear:both;"></div>';
$topmenu .=' </div>';

if($get_watch_list)
{
    $topmenu .=' <div onMouseOver="$hdwt(showplaywatchlater).show();" onMouseOut="$hdwt(showplaywatchlater).hide();" style="text-align:center; height: 49%; padding-top: 15px; color: white; font-weight: bold;">';
    $topmenu .=' <div id="showplaywatchlater" style="width:55px; margin-left: 45px; display:none; cursor:pointer; padding: 1px 10px 3px 10px; background-color: rgba(0, 0, 0, 0.65);" onclick="location.href=\''.$pluginurl.'playlistwl='.$_SESSION['your_current_channel'].'&v='.$get_watch_list[0]->videoid.'\'">Play All</div>';
    $topmenu .=' </div>';
}

$topmenu .=' </div>';
$topmenu .='</li>';

/* ******************************** * LIKES * ******************************************/

$get_like_list = $wpdb->get_results($wpdb->prepare("SELECT * FROM $likedislike_table_name WHERE userid=%d AND channelid=%s AND status=1",$current_user->ID,$_SESSION['your_current_channel']));

$get_thumpnail = $wpdb->get_row("SELECT * FROM $video_table_name WHERE video_id=".$get_like_list[0]->lk_dlk_videoid);

if($get_thumpnail)
{
    $src = "background-image:url(".$get_thumpnail->video_thumpnails.");";
}
else
{
    $src="background-image: linear-gradient(to bottom,#515151 0,#333 100%);";
}


$topmenu .='<li style="list-style-type: none !important;">';
$topmenu .=' <div style=" font-family:calibri; width:160px; height:90px; background-size:160px 90px; '.$src.'">';
$topmenu .=' <div style="cursor:pointer; height:30px;  background-color: rgba(0, 0, 0, 0.65); color:white;">';
$topmenu .=' <div style="float:left; padding: 4px; font-weight: bold;">Likes</div>';
$topmenu .=' <div style="float:right; font-size: 15px; padding: 6px; color: #999;">'.count($get_like_list).'</div>';
$topmenu .=' <div style="clear:both;"></div>';
$topmenu .=' </div>';

if($get_like_list)
{
    $topmenu .=' <div onMouseOver="$hdwt(showplaylike).show();" onMouseOut="$hdwt(showplaylike).hide();" style="text-align:center; height: 49%; padding-top: 15px; color: white; font-weight: bold;">';
    $topmenu .=' <div id="showplaylike" style="width:55px; margin-left: 45px; display:none; cursor:pointer; padding: 1px 10px 3px 10px; background-color: rgba(0, 0, 0, 0.65);" onclick="location.href=\''.$pluginurl.'playlistlk='.$_SESSION['your_current_channel'].'&v='.$get_like_list[0]->lk_dlk_videoid.'\'">Play All</div>';
    $topmenu .=' </div>';
}

$topmenu .=' </div>';
$topmenu .='</li>';


/* ***************************** * PLAYLIST * ***************************************/

$getplaylist = $wpdb->get_results($wpdb->prepare("SELECT * FROM $playlisttitle_table_name WHERE userid=%d AND channelid=%d",$current_user->ID,$_SESSION['your_current_channel']));

for($i=0;$i<count($getplaylist);$i++)
{
    $get_playlist_info = $wpdb->get_results("SELECT * from $playlist_table_name WHERE playlistid=".$getplaylist[$i]->id);
    
    $get_thumpnail = $wpdb->get_row("SELECT * FROM $video_table_name WHERE video_id=".$get_playlist_info[0]->videoid);
    if($get_thumpnail)
    {
        $src = "background-image:url(".$get_thumpnail->video_thumpnails.");";
    }
    else
    {
        $src="background-image: linear-gradient(to bottom,#515151 0,#333 100%);";
    }
    
    
    $topmenu .='<li style="list-style-type: none !important;">';       
    $topmenu .=' <div style=" font-family:calibri; width:160px; height:90px; background-size:160px 90px; '.$src.'">';
    $topmenu .=' <div style="cursor:pointer; height:30px;  background-color: rgba(0, 0, 0, 0.65); color:white;" onclick="location.href=\''.$pluginurl.'playlist='.$getplaylist[$i]->id.'\'">';
    $topmenu .=' <div style="float:left; padding: 4px; font-weight: bold;">'.$getplaylist[$i]->playlistname.'</div>';
    $topmenu .=' <div style="float:right; font-size: 15px; padding: 6px; color: #999;">'.count($get_playlist_info).'</div>';
    $topmenu .=' <div style="clear:both;"></div>';
    $topmenu .=' </div>';
    if($get_playlist_info){
    $topmenu .=' <div onMouseOver="$hdwt(showplay'.$i.').show();" onMouseOut="$hdwt(showplay'.$i.').hide();" style="text-align:center; height: 49%; padding-top: 15px; color: white; font-weight: bold;">';
    $topmenu .=' <div id="showplay'.$i.'" style="width:55px; margin-left: 45px; display:none; cursor:pointer; padding: 1px 10px 3px 10px; background-color: rgba(0, 0, 0, 0.65);" onclick="location.href=\''.$pluginurl.'playlist='.$getplaylist[$i]->id.'&v='.$get_playlist_info[0]->videoid.'\'">Play All</div>';
    $topmenu .=' </div>';
    }
    $topmenu .=' </div>';
    
    $topmenu .='</li>';
  
}
$topmenu .='</ul>';
$topmenu .='</div>';
$topmenu .='<a class="buttons next">right</a>';
$topmenu .='</div>';



$topmenu .='</div>';

$topmenu .='<div style=" padding:10px; float:right;">';
$topmenu .='<div class="user_config_menu_opt" onclick="location.href=\''.$pluginurl.'channel='.$_SESSION ['your_current_channel'].'\'">My Channel</div>';
if($get_settings->show_uploadbtn == "yes")
{
    $topmenu .='<div class="user_config_menu_opt" onclick="location.href=\''.$pluginurl.'videomanager='.$_SESSION ['your_current_channel'].'\'">Video Manager</div>';
}
$topmenu .='<div class="user_config_menu_opt" onclick="location.href=\''.$pluginurl.'mysubscriptions='.$_SESSION ['your_current_channel'].'\'" >Subscriptions</div>';
if($get_settings->show_uploadbtn == "yes")
{
    $topmenu .='<div class="user_config_menu_opt" onclick="location.href=\''.$pluginurl.'channel_switcher\'">All my channels</div>';
}
$topmenu .='</div>';
$topmenu .='<div style="clear:both;"></div>';

$topmenu .='</div>';

?>