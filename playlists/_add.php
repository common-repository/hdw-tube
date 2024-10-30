<?php
global $current_user;
$get_channel_id = $wpdb->get_results("SELECT channel_id,channel_name FROM ".$wpdb->prefix."youtube_channel WHERE userid=".$current_user->ID);

if($_POST['edited'] == 'true' && check_admin_referer( 'youtube-nonce')) {
    
	unset($_POST['edited'], $_POST['save'], $_POST['_wpnonce'], $_POST['_wp_http_referer']);
	$_POST['userid'] = $current_user->ID;
	$_POST['pdate']  = date ( 'Y-m-d H:i:s');
	$format = array ('%s','%d','%s','%s','%d','%s');
	$wpdb->insert($table_name, $_POST,$format);
	echo '<script>window.location="?page=playlists";</script>';
}
$admin_icon_path           = plugins_url().'/' . basename ( dirname (dirname ( __FILE__ )) ) . '/admin_menu_icon/';
?>
<table style="width:100%;"><tr><td><div style=" color:#0074a2; font-weight:bold; font-size:15px;" >Add New Playlist</div></td><td style="text-align:right;"><img src="<?php echo $admin_icon_path;?>hdwtube.png" style="height:40px;"/></td></tr></table>
<hr>
<div class="wrap">
  <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
  	<?php wp_nonce_field('youtube-nonce'); ?>
   
    <table cellpadding="0" cellspacing="10">
      <tr>
        <td name="30%"><?php _e("Name" ); ?></td>
        <td><input type="text" id="playlistname" name="playlistname" size="50" /></td>
      </tr>
      
      <tr>
        <td name="30%"><?php _e("Channel Name" ); ?></td>
        <td><select name="channelid" id="channelid">
        <?php for($i = 0 ; $i < count($get_channel_id) ; $i++) {?>
        <option value="<?php echo $get_channel_id[$i]->channel_id;?>"><?php echo $get_channel_id[$i]->channel_name;?></option>
        <?php }?>
        </select></td>
      </tr>
      
      <tr>
        <td name="30%"><?php _e("Description" ); ?></td>
        <td><textarea id="description" name="description" rows="3" cols="50" style="resize:none;"></textarea></td>
      </tr>
      
      
      
    </table>
    <br />
    <?php   
    $img_folder_path           = plugins_url().'/' . basename ( dirname (dirname ( __FILE__ )) ) . '/image/';
    
    ?>
    <input type="hidden" name="thumbnail" value="<?php echo $img_folder_path."no_thumbnail.png"?>" />
    <input type="hidden" name="edited" value="true" />
    <input type="submit" class="button-primary" name="save" value="<?php _e("Save" ); ?>" />
    &nbsp; <a href="?page=playlists" class="button-secondary" title="cancel"><?php _e("Cancel" ); ?>
    </a>
  </form>
</div>