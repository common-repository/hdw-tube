<style>
.yclone_widget_home_menu
{
    font-size:12px;
    color:#222;
    cursor:pointer;
    padding:5px;
}

.yclone_widget_home_menu:hover
{
    background:#484848;
    color:white;
    
}

/*.yclone_widget_home_menu div img:hover
{
    -webkit-filter: invert(100%);
    -moz-filter: invert(100%);
  
}*/

.ylcone_menu_headding_h1
{
    color: #cc181e;
	text-decoration: none;
	font-family: calibri;
	font-size: 13px;
	font-weight: bold;
	padding-bottom: 10px;
	cursor:pointer;
}
.ylcone_menu_headding_h1:hover
{
    text-decoration:underline;
}

#yclone_widget_shower:hover
{
    background-color: #E8E8E8 ;
    border: 1px solid B0B0B0;
}

</style>
<script>
$hdwt(document).ready(function()
{
	$hdwt('#yclone_widget_shower').click(function(){
		if($hdwt('#yclone_widget_open_menu').is(":visible"))
		{
			$hdwt('#yclone_widget_open_menu').hide();
		}
		else
		{
			$hdwt('#yclone_widget_open_menu').show();
		}
	}); 	    
});
</script>

<div style="width:200px; font-family: arial,sans-serif;">

<div id="yclone_logo_part" style="border-bottom:1px solid #B0B0B0;">
<div style="float:left; width:150px; height:50px; text-align:center;" onclick="location.href='<?php echo $yclone_yrl;?>'"><img src="<?php echo $yclone_logo_url;?>" style="height:100%;"/></div>
<div style="float:right; margin-top:15px; cursor:pointer; padding:5px 10px;" id="yclone_widget_shower"><img src="<?php echo $widget_folder_path;?>menu_playlist.png" style="width:25px; height:15px;"/></div><div style="clear:both;"></div>
</div>

<div id="yclone_widget_open_menu">

<div id="yclone_menu1_part" style="border-bottom:1px solid #B0B0B0; padding:10px;">

<div class="yclone_widget_home_menu" id="yclone_widget_home_menu1" onclick="location.href='<?php echo $yclone_yrl;?>'"><div style="float:left; opacity:.5;"><img src="<?php echo $widget_folder_path;?>whattowatch.png" style="width:15px; height:15px;"/></div><div style="float:left; padding:0px 0 0 5px;">What to Watch</div><div style="clear:both;"></div></div>
<div class="yclone_widget_home_menu" id="yclone_widget_home_menu2" onclick="location.href='<?php echo $yclone_yrl;?>channel=<?php echo $_SESSION['your_current_channel'];?>'"><div style="float:left; opacity:.5;"><img src="<?php echo $widget_folder_path;?>mychannel.png" style="width:15px; height:15px;"/></div><div style="float:left; padding:0px 0 0 5px;">My Channel</div><div style="clear:both;"></div></div>
<div class="yclone_widget_home_menu" id="yclone_widget_home_menu3" onclick="location.href='<?php echo $yclone_yrl;?>mysubscriptions=<?php echo $_SESSION['your_current_channel'];?>'"><div style="float:left; opacity:.5;"><img src="<?php echo $widget_folder_path;?>mysubscriptions.png" style="width:15px; height:15px;"/></div><div style="float:left; padding:0px 0 0 5px;">My Subscriptions</div><div style="clear:both;"></div></div>
<div class="yclone_widget_home_menu" id="yclone_widget_home_menu4" onclick="location.href='<?php echo $yclone_yrl;?>watch_history=<?php echo $_SESSION['your_current_channel'];?>'"><div style="float:left; opacity:.5;"><img src="<?php echo $widget_folder_path;?>history.png" style="width:15px; height:15px;"/></div><div style="float:left; padding:0px 0 0 5px;">History</div><div style="clear:both;"></div></div>
<div class="yclone_widget_home_menu" id="yclone_widget_home_menu5" onclick="location.href='<?php echo $yclone_yrl;?>playlist&watchlater=<?php echo $_SESSION['your_current_channel'];?>'"><div style="float:left; opacity:.5;"><img src="<?php echo $widget_folder_path;?>watchlater.png" style="width:15px; height:15px;"/></div><div style="float:left; padding:0px 0 0 5px;">Watch Later</div><div style="clear:both;"></div></div>

</div>

<?php 
$get_playlist_list     = $wpdb->get_results($wpdb->prepare("SELECT * FROM $playlisttitle_table_name WHERE channelid=%d",$_SESSION['your_current_channel']));
$get_subscription_list = $wpdb->get_results($wpdb->prepare("SELECT * FROM $subscribtion_table_name WHERE channel_id=%d",$_SESSION['your_current_channel']));


if($get_playlist_list)
{
?>

<div id="yclone_playlist_part" style="border-bottom:1px solid #B0B0B0; padding:10px;">

<div class="ylcone_menu_headding_h1">PLAYLISTS</div>
<?php for($i=0;$i<count($get_playlist_list);$i++){?>
<div class="yclone_widget_home_menu" id="yclone_widget_home_menup<?php echo $i;?>" onclick="location.href='<?php echo $yclone_yrl;?>playlist=<?php echo $get_playlist_list[$i]->id;?>'"><div style="float:left; opacity:.5;"><img src="<?php echo $widget_folder_path;?>playlist.png" style="width:15px; height:15px;"/></div><div style="float:left; padding:0px 0 0 5px;"><?php echo $get_playlist_list[$i]->playlistname;?></div><div style="clear:both;"></div></div>
<?php }?>
<div class="yclone_widget_home_menu" id="yclone_widget_home_menu6" onclick="location.href='<?php echo $yclone_yrl;?>playlistlv=<?php echo $_SESSION['your_current_channel'];?>&ch=<?php echo $current_user->ID;?>'"><div style="float:left; opacity:.5;"><img src="<?php echo $widget_folder_path;?>likedvideos.png" style="width:15px; height:15px;"/></div><div style="float:left; padding:0px 0 0 5px;">Liked Videos</div><div style="clear:both;"></div></div>

</div>

<?php }

 if($get_subscription_list){
?>

<div id="yclone_subscriptions_part" style="border-bottom:1px solid #B0B0B0; padding:10px;">

<div class="ylcone_menu_headding_h1">SUBSCRIPTIONS</div>
<?php for($i=0;$i<count($get_subscription_list);$i++){

$get_channel_name   = $wpdb->get_row("SELECT * FROM $channel_table_name WHERE channel_id=".$get_subscription_list[$i]->subsc_channel_id);
$get_lastweek_videos = $wpdb->get_results("SELECT * FROM $video_tabe_name WHERE channel_id=".$get_subscription_list[$i]->subsc_channel_id." AND video_upload_time BETWEEN NOW() - INTERVAL 15 DAY AND NOW()");    
?>
<div class="yclone_widget_home_menu" onclick="location.href='<?php echo $yclone_yrl;?>channel=<?php echo $get_channel_name->channel_id;?>'"><div style="float:left;"><img src="<?php echo $get_channel_name->channel_icon;?>" style="width:15px; height:15px;"/></div><div style="float:left; padding:0px 0 0 5px;"><?php echo $get_channel_name->channel_name;?></div><div style="float:right; opacity:.5;"><?php echo count($get_lastweek_videos);?></div><div style="clear:both;"></div></div>
<?php }?>
</div>

<?php }else{?>
<div id="yclone_subscriptions_part" style="border-bottom:1px solid #B0B0B0; padding:10px;">

<div class="ylcone_menu_headding_h1">SUBSCRIPTIONS</div>
<div id="yclone_widget_nosubscriptions" style="cursor:pointer;" onclick="location.href='<?php echo $yclone_yrl;?>browse_channels'"><img src="<?php echo $widget_folder_path;?>subscription_dimm_hover.png"/></div>

</div>
<?php }?>

<div id="yclone_config_part" style="padding:10px;">

<div class="yclone_widget_home_menu" id="yclone_widget_home_menu7" onclick="location.href='<?php echo $yclone_yrl;?>browse_channels'"><div style="float:left; opacity:.5;"><img src="<?php echo $widget_folder_path;?>browsechannel.png" style="width:15px; height:15px;"/></div><div style="float:left; padding:0px 0 0 5px;">Browse channels</div><div style="clear:both;"></div></div>
<div class="yclone_widget_home_menu" id="yclone_widget_home_menu8" onclick="location.href='<?php echo $yclone_yrl;?>subscription_manager=<?php echo $_SESSION['your_current_channel'];?>'"><div style="float:left; opacity:.5;"><img src="<?php echo $widget_folder_path;?>managesubscription.png" style="width:15px; height:15px;"/></div><div style="float:left; padding:0px 0 0 5px;">Manage Subscription</div><div style="clear:both;"></div></div>

</div>
</div>
</div>