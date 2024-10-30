<?php
$admin_icon_path = plugins_url () . '/' . basename(dirname(dirname(__FILE__))) . '/admin_menu_icon/';
?>
<style>
.yclone_configuration_menu {
	float: left;
	border: 1px solid #CCCCCC;
	background: #E9E9E9;
	cursor: pointer;
	padding: 5px 10px;
	font-weight: bold;
}

.yclone_configuration_content {
	border: 1px solid #fff;
	padding: 10px;
}

.h1_title_yclone {
	font-size: 18px;
	font-weight: bold;
}

.pro_option {
	font-size: 15px;
	color: rgb(218, 41, 233);
	font-weight: bold;
	margin-left: 10px;
}
</style>
<script>
var $hdwt = jQuery.noConflict();
$hdwt(document).ready(function ()
{
	$hdwt('.yclone_configuration_menu').click(function()
	{
	    $hdwt('.yclone_configuration_content').hide();
	    $hdwt('#'+this.id+'_content').show();
	    $hdwt('.yclone_configuration_menu').css('background','#E9E9E9');
	    $hdwt('#'+this.id).css('background','#fff');
		  
	});
	$hdwt('#select_page_frontend').change(function()
	{
		var page_val = $hdwt(this).val();
	    $hdwt('.frontend_page_options').hide();
	    $hdwt('#frontend_page_'+page_val).show();
		
	});
    
});
</script>
<?php
global $wpdb;
$table_name = $wpdb->prefix . "youtube_settings";
$player_table_name = $wpdb->prefix . "youtube_hdwplayer";
if ($_POST ['edited'] == 'true' && check_admin_referer ( 'youtube-nonce' )) {
	unset ( $_POST ['edited'], $_POST ['save'], $_POST ['_wpnonce'], $_POST ['_wp_http_referer'] );
	
	$format = array (
			'%s',
			'%s',
			'%d',
			'%d',
			'%d',
			'%d',
			'%d',
			'%d',
			'%d',
			'%d',
			'%d',
			'%d',
			'%d',
			'%d',
			'%d',
			'%d',
			'%d' 
	);
	
	$wpdb->update ( $player_table_name, $_POST ['player'], array (
			'id' => '1' 
	), $format );
	
	unset ( $_POST ['player'] );
	
	$format = array (
			'%s',
			'%d',
			'%d',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%d',
			'%d',
			'%d',
			'%d',
			'%d',
			'%s',
			'%s',
			'%d',
			'%d',
			'%d',
			'%d',
			'%d',
			'%d',
			'%d',
			'%s',
			'%s',
			'%d',
			'%d',
			'%s',
			'%s',
			'%s'
	);
	$wpdb->update ( $table_name, $_POST, array ( 'id' => 1 ), $format );
}
$data = $wpdb->get_row ( "SELECT * FROM $table_name WHERE id=1" );
$data1 = $wpdb->get_row ( "SELECT * FROM $player_table_name WHERE id=1" );
$js = plugins_url () . '/' . basename(dirname(dirname(__FILE__))) . '/js/jscolor.js';
?>
<script src="<?php echo $js; ?>"></script>
<div style="margin-left: 50px; padding: 10px;">
	<span class="pro_option">*</span> Pro Features
</div>
<form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
	<div
		style="color: #0074a2; font-weight: bold; float: left; font-size: 16px;">Configuration</div>
	<div style="float: right;">
		<img src="<?php echo $admin_icon_path;?>hdwtube.png"
			style="height: 40px;" />
	</div>
	<div style="clear: both;"></div>
	<div style="border-bottom: 1px solid #CCCCCC;">
		<div class="yclone_configuration_menu" id="config_frontend"
			style="background: #fff;">Frontend</div>
		<div class="yclone_configuration_menu" id="config_player">Player</div>
		<div class="yclone_configuration_menu" id="config_upload">Upload</div>
		<div class="yclone_configuration_menu" id="config_server">Server</div>
		<div style="clear: both;"></div>
	</div><?php wp_nonce_field('youtube-nonce'); ?>
<div>
		<!-- CONFIGURATION FRONTEND MENU -->
		<div class="yclone_configuration_content" id="config_frontend_content">
			<table>
				<tr>
					<td>Select Page</td>
					<td><select id="select_page_frontend"><option value="1">Home</option>
							<option value="2">Watch Video</option>
							<option value="3">Channel</option></select></td>
				</tr>
			</table>
			<hr>
			<div class="frontend_page_options" id="frontend_page_1">
				<table style="border-spacing: 20px !important;">
					<tr>
						<td>Site Name</td>
						<td><input type="text" name="hdw_sitename"
							value="<?php echo $data->hdw_sitename; ?>" /></td>
					</tr>
					<tr>
						<td>Videos per list</td>
						<td><input type="text" name="videoperlist"
							value="<?php echo $data->videoperlist; ?>" /></td>
					</tr>
					<tr>
						<td>Videos per Recommended</td>
						<td><input type="text" name="videoperrecommended"
							value="<?php echo $data->videoperrecommended; ?>" /></td>
					</tr>
					<tr>
						<td>Show Popular video</td>
						<td><input type="radio" name="sh_popularvideo" value="yes" <?php if($data->sh_popularvideo == "yes" ) { echo 'checked="checked"'; } ?> />Yes &nbsp;&nbsp;<input type="radio" name="sh_popularvideo" value="no" <?php if($data->sh_popularvideo == "no" ) { echo 'checked="checked"'; } ?> />No</td>
					</tr>
					<tr>
						<td>Show Recommended</td>
						<td><input type="radio" name="sh_recommended" value="yes"
							<?php if($data->sh_recommended == "yes" ) { echo 'checked="checked"'; } ?> />Yes
							&nbsp;&nbsp; <input type="radio" name="sh_recommended" value="no"
							<?php if($data->sh_recommended != "yes" ) { echo 'checked="checked"'; } ?> />No</td>
					</tr>
					<tr>
						<td>Show SubscriptionList</td>
						<td><input type="radio" name="sh_subscriptionlist" value="yes"
							<?php if($data->sh_subscriptionlist == "yes" ) { echo 'checked="checked"'; } ?> />Yes
							&nbsp;&nbsp; <input type="radio" name="sh_subscriptionlist"
							value="no"
							<?php if($data->sh_subscriptionlist != "yes" ) { echo 'checked="checked"'; } ?> />No</td>
					</tr>
					<tr>
						<td>Show Movies</td>
						<td><input type="radio" name="sh_movies" value="yes"
							<?php if($data->sh_movies == "yes" ) { echo 'checked="checked"'; } ?> />Yes
							&nbsp;&nbsp; <input type="radio" name="sh_movies" value="no"
							<?php if($data->sh_movies != "yes" ) { echo 'checked="checked"'; } ?> />No</td>
					</tr>
					<tr>
						<td>Show Music</td>
						<td><input type="radio" name="sh_music" value="yes"
							<?php if($data->sh_music == "yes" ) { echo 'checked="checked"'; } ?> />Yes
							&nbsp;&nbsp; <input type="radio" name="sh_music" value="no"
							<?php if($data->sh_music != "yes" ) { echo 'checked="checked"'; } ?> />No</td>
					</tr>
					<tr>
						<td>Show Sports</td>
						<td><input type="radio" name="sh_sports" value="yes"
							<?php if($data->sh_sports == "yes" ) { echo 'checked="checked"'; } ?> />Yes
							&nbsp;&nbsp; <input type="radio" name="sh_sports" value="no"
							<?php if($data->sh_sports != "yes" ) { echo 'checked="checked"'; } ?> />No</td>
					</tr>
					<tr>
						<td>Show Gaming</td>
						<td><input type="radio" name="sh_gaming" value="yes"
							<?php if($data->sh_gaming == "yes" ) { echo 'checked="checked"'; } ?> />Yes
							&nbsp;&nbsp; <input type="radio" name="sh_gaming" value="no"
							<?php if($data->sh_gaming != "yes" ) { echo 'checked="checked"'; } ?> />No</td>
					</tr>
					<tr>
						<td>Add Premium Channels</td>
						<td><input type="text" placeholder="ex:1,2,3,..."
							name="premium_ids" value="<?php echo $data->premium_ids; ?>" />(channel
							id)</td>
					</tr>
					<tr>
						<td>Widget Channels</td>
						<td><input type="text" placeholder="ex:1,2,3,..."
							name="widget_channel"
							value="<?php echo $data->widget_channel; ?>" />(channel id)</td>
					</tr>
					<tr>
						<td>Browse Page</td>
						<td title="It will be displayed on browse page"><input type="text"
							placeholder="ex:1,2,3,..." name="categoryids"
							value="<?php echo $data->categoryids; ?>" />(Category id)</td>
					</tr>
				</table>
			</div>
			<div class="frontend_page_options" style="display: none;"
				id="frontend_page_2">
				<table style="border-spacing: 20px !important;">
					<tr>
						<td>Show Subscription</td>
						<td><input type="radio" name="sh_subscription" value="yes"
							<?php if($data->sh_subscription == "yes" ) { echo 'checked="checked"'; } ?> />Yes
							&nbsp;&nbsp; <input type="radio" name="sh_subscription"
							value="no"
							<?php if($data->sh_subscription != "yes" ) { echo 'checked="checked"'; } ?> />No</td>
					</tr>
					<tr>
						<td>Show Like</td>
						<td><input type="radio" name="sh_like" value="yes"
							<?php if($data->sh_like == "yes" ) { echo 'checked="checked"'; } ?> />Yes
							&nbsp;&nbsp; <input type="radio" name="sh_like" value="no"
							<?php if($data->sh_like != "yes" ) { echo 'checked="checked"'; } ?> />No</td>
					</tr>
					<tr>
						<td>Show Dislike</td>
						<td><input type="radio" name="sh_dislike" value="yes"
							<?php if($data->sh_dislike == "yes" ) { echo 'checked="checked"'; } ?> />Yes
							&nbsp;&nbsp; <input type="radio" name="sh_dislike" value="no"
							<?php if($data->sh_dislike != "yes" ) { echo 'checked="checked"'; } ?> />No</td>
					</tr>
					<tr>
						<td>Menu Visible</td>
						<td><input type="hidden" name="sh_menu_about" value="0">
						<input type="checkbox" name="sh_menu_about" value="1" <?php if($data->sh_menu_about == 1 ) { echo 'checked="checked"'; } ?>> About &nbsp;&nbsp;
						<input type="hidden" name="sh_menu_share" value="0">
						<input type="checkbox" name="sh_menu_share" value="1" <?php if($data->sh_menu_share == 1 ) { echo 'checked="checked"'; } ?>> Share &nbsp;&nbsp;
						<input type="hidden" name="sh_menu_addto" value="0">
						<input type="checkbox" name="sh_menu_addto" value="1" <?php if($data->sh_menu_addto == 1 ) { echo 'checked="checked"'; } ?>> Addto &nbsp;&nbsp;
						<input type="hidden" name="sh_menu_statistics" value="0">
						<input type="checkbox" name="sh_menu_statistics" value="1" <?php if($data->sh_menu_statistics == 1 ) { echo 'checked="checked"'; } ?>> Statistics &nbsp;&nbsp;
						<input type="hidden" name="sh_menu_report" value="0">
						<input type="checkbox" name="sh_menu_report" value="1" <?php if($data->sh_menu_report == 1 ) { echo 'checked="checked"'; } ?>> Report &nbsp;&nbsp;
						</td>
					</tr>
					<tr>
						<td>Show Comment</td>
						<td><input type="radio" name="sh_comments" value="yes"
							<?php if($data->sh_comments == "yes" ) { echo 'checked="checked"'; } ?> />Yes
							&nbsp;&nbsp; <input type="radio" name="sh_comments" value="no"
							<?php if($data->sh_comments != "yes" ) { echo 'checked="checked"'; } ?> />No</td>
					</tr>
					<tr>
						<td>Show related videos</td>
						<td><input type="radio" name="sh_relateddvid" value="yes"
							<?php if($data->sh_relateddvid == "yes" ) { echo 'checked="checked"'; } ?> />Yes
							&nbsp;&nbsp; <input type="radio" name="sh_relateddvid" value="no"
							<?php if($data->sh_relateddvid != "yes" ) { echo 'checked="checked"'; } ?> />No</td>
					</tr>
					<tr>
						<td>No of related videos</td>
						<td><input type="text" name="noofrelatedvid"
							value="<?php echo $data->noofrelatedvid; ?>" /></td>
					</tr>
				</table>
			</div>
			<div class="frontend_page_options" style="display: none;"
				id="frontend_page_3">
				<table style="border-spacing: 20px !important;">
					<tr>
						<td>Channel Menu Visible</td>
						<td><input type="hidden" name="sh_cmenu_home" value="0">
						<input type="checkbox" name="sh_cmenu_home" value="1" <?php if($data->sh_cmenu_home == 1 ){ echo 'checked="checked"'; } ?>> Home &nbsp;&nbsp;
						<input type="hidden" name="sh_cmenu_videos" value="0">
						<input type="checkbox" name="sh_cmenu_videos" value="1" <?php if($data->sh_cmenu_videos == 1 ){ echo 'checked="checked"'; } ?>> Videos &nbsp;&nbsp;
						<input type="hidden" name="sh_cmenu_playlists" value="0">
						<input type="checkbox" name="sh_cmenu_playlists" value="1" <?php if($data->sh_cmenu_playlists == 1 ){ echo 'checked="checked"'; } ?>> Playlists &nbsp;&nbsp;
						<input type="hidden" name="sh_cmenu_channel" value="0">
						<input type="checkbox" name="sh_cmenu_channel" value="1" <?php if($data->sh_cmenu_channel == 1 ) { echo 'checked="checked"'; } ?>> Channel &nbsp;&nbsp;
						<input type="hidden" name="sh_cmenu_discussion" value="0">
						<input type="checkbox" name="sh_cmenu_discussion" value="1" <?php if($data->sh_cmenu_discussion == 1 ) { echo 'checked="checked"'; } ?>> Discussion &nbsp;&nbsp;
						<input type="hidden" name="sh_cmenu_about" value="0">
						<input type="checkbox" name="sh_cmenu_about" value="1" <?php if($data->sh_cmenu_about == 1) { echo 'checked="checked"'; } ?>> About &nbsp;&nbsp;
						</td>
					</tr>
					<tr>
						<td>Show Featured Channels</td>
						<td><input type="radio" name="sh_featuredchannels" value="yes"
							<?php if($data->sh_featuredchannels == "yes" ) { echo 'checked="checked"'; } ?> />Yes
							&nbsp;&nbsp; <input type="radio" name="sh_featuredchannels"
							value="no"
							<?php if($data->sh_featuredchannels != "yes" ) { echo 'checked="checked"'; } ?> />No</td>
					</tr>
					<tr>
						<td>Show Popular Channels</td>
						<td><input type="radio" name="sh_popularchannels" value="yes"
							<?php if($data->sh_popularchannels == "yes" ) { echo 'checked="checked"'; } ?> />Yes
							&nbsp;&nbsp; <input type="radio" name="sh_popularchannels"
							value="no"
							<?php if($data->sh_popularchannels != "yes" ) { echo 'checked="checked"'; } ?> />No</td>
					</tr>
					<tr>
						<td>Videos per home menu</td>
						<td><input type="text" name="noofhomemenuvid"
							value="<?php echo $data->noofhomemenuvid; ?>" /></td>
					</tr>
					<tr>
						<td>videos per video menu</td>
						<td><input type="text" name="noofvidmenuvid"
							value="<?php echo $data->noofvidmenuvid; ?>" /></td>
					</tr>
				</table>
			</div>
		</div>
		<!-- CONFIGURATION PLAYER MENU -->
		<div class="yclone_configuration_content" id="config_player_content"
			style="display: none;">
			<div id="top_two_colomn">
				<div class="settings_div">
    <?php  echo "<h3 class='header'>" . __( 'Player Settings' ) . "<a class='accord' id='player_p' onclick='accordion(this.id);' style='display:none; cursor:pointer;'>+</a><a class='accord' id='player_m' onClick='accordion(this.id);' style='cursor:pointer;'>-</a></h3>"; ?>    
    <table cellpadding="0" cellspacing="10" id="tab_player">
						<!--  <tr>
        <td width="30%"><?php _e("Player Size" ); ?></td>
        <td><?php _e("Width" ); ?>
          &nbsp;&nbsp;
          <input type="text" id="width" name="player[width]" value="<?php echo $data1->width; ?>" size="5" />
          &nbsp;&nbsp;
          <?php _e("Height" ); ?>
          &nbsp;&nbsp;
          <input type="text" id="height" name="player[height]" value="<?php echo $data1->height; ?>" size="5"/></td>
      </tr> -->
						<tr>
							<td><?php _e("License Key<span class='pro_option'>*</span>" ); ?></td>
							<td><input type="text" id="licensekey" readonly
								value="Enter your license key here" size="50"></td>
						</tr>
						<tr>
							<td><?php _e("Logo <span class='pro_option'>*</span>" ); ?></td>
							<td><input type="text" id="logo" readonly value="logo.png"
								size="50"></td>
						</tr>
						<tr>
							<td><?php _e("Logo Position <span class='pro_option'>*</span>" ); ?></td>
							<td><select id="logoposition" disabled>
									<option value="topright" id="topright">Top Right</option>
									<option value="topleft" id="topleft">Top Left</option>
									<option value="bottomleft" id="bottomleft">Bottom Left</option>
									<option value="bottomright" id="bottomright">Bottom Right</option>
									<option value="center" id="center">Center</option>
							</select>
          <?php echo '<script>document.getElementById("'.$data1->logoposition.'").selected="selected"</script>'; ?> </td>
						</tr>
						<tr>
							<td><?php _e("Logo Alpha <span class='pro_option'>*</span>" ); ?></td>
							<td><input type="text" readonly id="logoalpha" value="100"
								size="50"></td>
						</tr>
						<tr>
							<td><?php _e("Logo Target <span class='pro_option'>*</span>" ); ?></td>
							<td><input type="text" id="logotarget" readonly
								value="hdwplayer.com" size="50"></td>
						</tr>
						<tr>
							<td><?php _e("Skin Mode" ); ?></td>
							<td><select id="skinmode" name="player[skinmode]">
									<option value="float" id="float">Float</option>
									<option value="static" id="static">Static</option>
							</select>
          <?php echo '<script>document.getElementById("'.$data1->skinmode.'").selected="selected"</script>'; ?> </td>
						</tr>
						<tr>
							<td><?php _e("Stretch Type" ); ?></td>
							<td><select id="stretchtype" name="player[stretchtype]">
									<option value="fill" id="fill">Fill</option>
									<option value="uniform" id="uniform">Uniform</option>
									<option value="none" id="none">Original</option>
									<option value="exactfit" id="exactfit">Exact Fit</option>
							</select>
          <?php echo '<script>document.getElementById("'.$data1->stretchtype.'").selected="selected"</script>'; ?> </td>
						</tr>
						<tr>
							<td><?php _e("Buffer Time" ); ?></td>
							<td><input type="text" id="buffertime" name="player[buffertime]"
								value="<?php echo $data1->buffertime; ?>" size="50"></td>
						</tr>
						<tr>
							<td><?php _e("Volume Level" ); ?></td>
							<td><input type="text" id="volumelevel"
								name="player[volumelevel]"
								value="<?php echo $data1->volumelevel; ?>" size="50"></td>
						</tr>
						<tr>
							<td><?php _e("Auto Play" ); ?></td>
							<td><input type="hidden" name="player[autoplay]" value="0"><input
								type="checkbox" id="autoplay" name="player[autoplay]" value="1"
								<?php if($data1->autoplay==1){echo 'checked="checked" ';}?>></td>
						</tr>
						<tr>
							<td><?php _e("Playlist Auto Play" ); ?></td>
							<td><input type="hidden" name="player[playlistautoplay]"
								value="0"><input type="checkbox" id="playlistautoplay"
								name="player[playlistautoplay]" value="1"
								<?php if($data1->playlistautoplay==1){echo 'checked="checked" ';}?>></td>
						</tr>
						<tr>
							<td><?php _e("Playlist Open By Default" ); ?></td>
							<td><input type="hidden" name="player[playlistopen]" value="0"><input
								type="checkbox" id="playlistopen" name="player[playlistopen]"
								value="1"
								<?php if($data1->playlistopen==1){echo 'checked="checked" ';}?>></td>
						</tr>
						<tr>
							<td><?php _e("Playlist Random" ); ?></td>
							<td><input type="hidden" name="player[playlistrandom]" value="0"><input
								type="checkbox" id="playlistrandom"
								name="player[playlistrandom]" value="1"
								<?php if($data1->playlistrandom==1){echo 'checked="checked" ';}?>></td>
						</tr>
					</table>
				</div>
				<div class="settings_div">
     <?php  echo "<h3 class='header'>" . __( 'Skin Settings' ) . "<a class='accord' onclick='accordion(this.id)' style='display:none; cursor:pointer;' id='skin_p'>+</a><a class='accord' style='cursor:pointer;' id='skin_m' onclick='accordion(this.id)'>-</a></h3>"; ?>
    <table cellpadding="0" cellspacing="15" id="tab_skin">
						<tr>
							<td><input type="hidden" name="player[controlbar]" value="0"><input
								type="checkbox" id="controlbar" name="player[controlbar]"
								value="1"
								<?php if($data1->controlbar==1){echo 'checked="checked" ';}?>></td>
							<td><?php _e("Control Bar" ); ?></td>
							<td><input type="hidden" name="player[playpause]" value="0"><input
								type="checkbox" id="playpause" name="player[playpause]"
								value="1"
								<?php if($data1->playpause==1){echo 'checked="checked" ';}?>></td>
							<td><?php _e("Play Pause Dock" ); ?></td>
							<td><input type="hidden" name="player[progressbar]" value="0"><input
								type="checkbox" id="progressbar" name="player[progressbar]"
								value="1"
								<?php if($data1->progressbar==1){echo 'checked="checked" ';}?>></td>
							<td><?php _e("Progress Bar" ); ?></td>
							<td><input type="hidden" name="player[timer]" value="0"><input
								type="checkbox" id="timer" name="player[timer]" value="1"
								<?php if($data1->timer==1){echo 'checked="checked" ';}?>></td>
							<td><?php _e("Timer Dock" ); ?></td>
						</tr>
						<tr>
							<td><input type="hidden" name="player[share]" value="0"><input
								type="checkbox" id="share" name="player[share]" value="1"
								<?php if($data1->share==1){echo 'checked="checked" ';}?>></td>
							<td><?php _e("Share Dock" ); ?></td>
							<td><input type="hidden" name="player[volume]" value="0"><input
								type="checkbox" id="volume" name="player[volume]" value="1"
								<?php if($data1->volume==1){echo 'checked="checked" ';}?>></td>
							<td><?php _e("Volume Dock" ); ?></td>
							<td><input type="hidden" name="player[fullscreen]" value="0"><input
								type="checkbox" id="fullscreen" name="player[fullscreen]"
								value="1"
								<?php if($data1->fullscreen==1){echo 'checked="checked" ';}?>></td>
							<td><?php _e("Fullscreen Dock" ); ?></td>
							<td><input type="hidden" name="player[playdock]" value="0"><input
								type="checkbox" id="playdock" name="player[playdock]" value="1"
								<?php if($data1->playdock==1){echo 'checked="checked" ';}?>></td>
							<td><?php _e("Play Dock" ); ?></td>
						</tr>
						<tr>
							<td><input type="hidden" name="player[playlist]" value="0"><input
								type="checkbox" id="playlist" name="player[playlist]" value="1"
								<?php if($data1->playlist==1){echo 'checked="checked" ';}?>></td>
							<td><?php _e("Play List" ); ?></td>
						</tr>
					</table>
				</div>
			</div>
			<div>  
      <?php  echo "<h3 class='header'>" . __( 'Custom Skin' ) . "<span class='pro_option'>*</span></h3>"; ?>
      <table width="100%" id="tab_custom">
					<tr>
						<td width="50%">
							<table width="100%" cellpadding="0" cellspacing="15">
								<tr>
									<td class="left">ControlBar Top Color</td>
									<td class="right"><input type="text" class="color"
										onchange="oncolorchange();" value="484848" /></td>
								</tr>
								<tr>
									<td class="left">ControlBar Bottom Color</td>
									<td class="right"><input type="text" class="color black"
										value="000000" /></td>
								</tr>
								<tr>
									<td class="left">ControlBar Border Color</td>
									<td class="right"><input type="text" class="color black"
										value="000000" /></td>
								</tr>
								<tr>
									<td class="left">Play Pause Color</td>
									<td class="right"><input type="text" class="color white"
										value="FFFFFF" /></td>
								</tr>
								<tr>
									<td class="left">ProgressBar Color</td>
									<td class="right"><input type="text" class="color"
										id="progressbarClr" value="121212" /></td>
								</tr>
								<tr>
									<td class="left">Buffer Color</td>
									<td class="right"><input type="text" class="color"
										id="bufferClr" value="222222" /></td>
								</tr>
								<tr>
									<td class="left">Timer Color</td>
									<td class="right"><input type="text" class="color white"
										value="FFFFFF" /></td>
								</tr>
								<tr>
									<td class="left">HD Color</td>
									<td class="right"><input type="text" class="color white"
										value="FFFFFF" /></td>
								</tr>
								<tr>
									<td class="left">HD [ On/Off ] Color</td>
									<td class="right"><input type="text" class="color"
										id="hdonoffClr" value="FFCC00" /></td>
								</tr>
								<tr>
									<td class="left">Share Color</td>
									<td class="right"><input type="text" class="color white"
										value="FFFFFF" /></td>
								</tr>
								<tr>
									<td class="left">Volume Color</td>
									<td class="right"><input type="text" class="color white"
										value="FFFFFF" /></td>
								</tr>
								<tr>
									<td class="left">Volume Slider Color</td>
									<td class="right"><input type="text" class="color"
										id="volumesliderClr" value="444444" /></td>
								</tr>
								<tr>
									<td class="left">Volume Slider Border Color</td>
									<td class="right"><input type="text" class="color black"
										value="000000" /></td>
								</tr>
								<tr>
									<td class="left">Volume Seeker Color</td>
									<td class="right"><input type="text" class="color"
										id="volumeseekerClr" value="666666" /></td>
								</tr>
								<tr>
									<td class="left">Volume Seeker Border Color</td>
									<td class="right"><input type="text" class="color black"
										value="000000" /></td>
								</tr>
								<tr>
									<td class="left">Fulscreen Color</td>
									<td class="right"><input type="text" class="color white"
										value="FFFFFF" /></td>
								</tr>
								<tr>
									<td class="left">Openclose Arrow Color</td>
									<td class="right"><input type="text" class="color gray"
										value="CCCCCC" /></td>
								</tr>
								<tr>
									<td class="left">Openclose Arrow Bg Color</td>
									<td class="right"><input type="text" class="color gray2"
										value="242526" /></td>
								</tr>
								<tr>
									<td class="left">Openclose Arrow Border Color</td>
									<td class="right"><input type="text" class="color"
										id="ocArwBgBdrClr" value="353535" /></td>
								</tr>
							</table>
						</td>
						<td valign="top" width="50%">
							<table width="100%" cellpadding="0" cellspacing="15">
								<tr>
									<td class="left">Header Bg Top Color</td>
									<td class="right"><input type="text" class="color gray3"
										value="232425" /></td>
								</tr>
								<tr>
									<td class="left">Header Bg Bottom Color</td>
									<td class="right"><input type="text" class="color blacks"
										value="060606" /></td>
								</tr>
								<tr>
									<td class="left">Video Thumb Bg Color</td>
									<td class="right"><input type="text" class="color gray2"
										value="1B1C1C" /></td>
								</tr>
								<tr>
									<td class="left">Active Video Thumb Bg Color</td>
									<td class="right"><input type="text" class="color"
										id="activevideobgClr" value="CCCCCC" /></td>
								</tr>
								<tr>
									<td class="left">Video Title Color</td>
									<td class="right"><input type="text" class="color gray"
										value="CCCCCC" /></td>
								</tr>
								<tr>
									<td class="left">Playlist Header Font Color</td>
									<td class="right"><input type="text" class="color gray"
										value="CCCCCC" /></td>
								</tr>
								<tr>
									<td class="left">Playlist Background Color</td>
									<td class="right"><input type="text" class="color gray2"
										value="242526" /></td>
								</tr>
								<tr>
									<td class="left">ScrollBar Bg Right Color</td>
									<td class="right"><input type="text" class="color gray3"
										value="232425" /></td>
								</tr>
								<tr>
									<td class="left">ScrollBar Bg Left Color</td>
									<td class="right"><input type="text" class="color blacks"
										value="060606" /></td>
								</tr>
								<tr>
									<td class="left">ScrollBar Bg Top Color</td>
									<td class="right"><input type="text" class="color gray2"
										value="242526" /></td>
								</tr>
								<tr>
									<td class="left">ScrollBar Bg Bottom Color</td>
									<td class="right"><input type="text" class="color blacks"
										value="060606" /></td>
								</tr>
								<tr>
									<td class="left">ScrollBar Arrow Color</td>
									<td class="right"><input type="text" class="color gray"
										value="CCCCCC" /></td>
								</tr>
								<tr>
									<td class="left">ScrollBar Scroll Color</td>
									<td class="right"><input type="text" class="color gray2"
										value="242526" /></td>
								</tr>
								<tr>
									<td class="left">ScrollBar Scroll Border Color</td>
									<td class="right"><input type="text" class="color black"
										value="000000" /></td>
								</tr>
								<tr>
									<td class="left">Tool Tip Bg Color</td>
									<td class="right"><input type="text" class="color gray"
										value="CCCCCC" /></td>
								</tr>
								<tr>
									<td class="left">Tool Tip Border Color</td>
									<td class="right"><input type="text" class="color white"
										value="000000" /></td>
								</tr>
								<tr>
									<td class="left">Tool Tip Font Color</td>
									<td class="right"><input type="text" class="color black"
										value="FFFFFF" /></td>
								</tr>
								<tr>
									<td class="left">Playdock Color</td>
									<td class="right"><input type="text" class="color white"
										value="FFFFFF" /></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<!-- CONFIGURATION UPLOAD MENU -->
		<div class="yclone_configuration_content" id="config_upload_content"
			style="display: none;">
			<table style="border-spacing: 20px !important;">
				<tr>
					<td>Show Upload</td>
					<td><input type="radio" name="show_uploadbtn" value="yes"
						<?php if($data->show_uploadbtn == "yes" ) { echo 'checked="checked"'; } ?>>Yes</td>
					<td><input type="radio" name="show_uploadbtn" value="no"
						<?php if($data->show_uploadbtn != "yes" ) { echo 'checked="checked"'; } ?>>No</td>
				</tr>
				<tr>
					<td>Video Upload Type<span class='pro_option'>*</span></td>
					<td><input type="radio" value="ffmpeg" disabled>FFmpeg</td>
					<td><input type="radio" value="classic" checked>Classic</td>
				</tr>
				<tr>
					<td>Drag and Drop<span class='pro_option'>*</span></td>
					<td><input type="radio" value="yes" disabled>Yes</td>
					<td><input type="radio" value="no" checked>No</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Classic Upload Options</td>
				</tr>
				<tr>
					<td>YouTube</td>
					<td><input type="radio" name="youtube" value="yes"
						<?php if($data->youtube == "yes" ) { echo 'checked="checked"'; } ?>>Yes</td>
					<td><input type="radio" name="youtube" value="no"
						<?php if($data->youtube != "yes" ) { echo 'checked="checked"'; } ?>>No</td>
				</tr>
				<tr>
					<td>Vimeo<span class='pro_option'>*</span></td>
					<td><input type="radio" disabled value="yes">Yes</td>
					<td><input type="radio" value="no" checked>No</td>
				</tr>
				<tr>
					<td>Dailymotion<span class='pro_option'>*</span></td>
					<td><input type="radio" disabled value="yes">Yes</td>
					<td><input type="radio" value="no" checked>No</td>
				</tr>
				<tr>
					<td>Rtmp<span class='pro_option'>*</span></td>
					<td><input type="radio" value="yes" disabled>Yes</td>
					<td><input type="radio" value="no" checked> No</td>
				</tr>
				<tr>
					<td>Url Video</td>
					<td><input type="radio" name="urlvideo" value="yes"
						<?php if($data->urlvideo == "yes" ) { echo 'checked="checked"'; } ?>>Yes</td>
					<td><input type="radio" name="urlvideo" value="no"
						<?php if($data->urlvideo != "yes" ) { echo 'checked="checked"'; } ?>>No</td>
				</tr>
			</table>
		</div>
		<!-- CONFIGURATION SERVER MENU -->
		<div class="yclone_configuration_content" id="config_server_content"
			style="display: none;">
			<table>
				<tr>
					<td>FFmpeg path<span class='pro_option'>*</span></td>
					<td><input type="text" readonly value="usr\local\ffmpeg"></td>
				</tr>
				<tr>
					<td>Qt-faststart path<span class='pro_option'>*</span></td>
					<td><input readonly type="text" value="usr\local\gtfast"></td>
				</tr>
			</table>
		</div>
	</div>
	<input type="hidden" name="edited" value="true" />
	<div style="float: right; margin-top: 10px; margin-right: 10px;">
		<input type="submit" class="button-secondary" name="cancel"
			value="<?php _e("Cancel" ); ?>" />
	</div>
	<div style="float: right; margin-top: 10px; margin-right: 10px;">
		<input type="submit" class="button-primary" name="save"
			value="<?php _e("Save" ); ?>" />
	</div>
	<div style="clear: both;"></div>
</form>