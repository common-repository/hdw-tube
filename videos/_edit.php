<?php
/******************************************************************
/* Inserting (or) Updating the DB Table when edited
/******************************************************************/
$table_name = $wpdb->prefix."youtube_video";

if($_POST['edited'] == 'true' && check_admin_referer( 'youtube-nonce') && $_POST['video_title'] != '') {
	unset($_POST['edited'], $_POST['save'], $_POST['_wpnonce'], $_POST['_wp_http_referer']);
	$format = array ('%s','%s','%s','%d','%s','%s');
	$wpdb->update($table_name, $_POST, array('video_id' => $_GET['id']), $format, array('%d'));
	echo '<script>window.location="?page=videos";</script>';
}

$get_category = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."youtube_category");
$get_videos = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE video_id=%d",intval($_GET['id'])));
$admin_icon_path           = plugins_url().'/' . basename ( dirname (dirname ( __FILE__ )) ) . '/admin_menu_icon/';
?>
<table style="width:100%;"><tr><td><div style=" color:#0074a2; font-weight:bold; font-size:15px;" >Edit Video</div></td><td style="text-align:right;"><img src="<?php echo $admin_icon_path;?>hdwtube.png" style="height:40px;"/></td></tr></table>
<hr>

<div class="wrap">
  <form method="POST" enctype="multipart/form-data"  action="<?php echo $_SERVER['REQUEST_URI']; ?>">
  	<?php wp_nonce_field('youtube-nonce'); ?>
    <?php  echo "<h3>" . __( 'Edit Video' ) . "</h3>"; ?>
    
    <div style="width:150px; height:65px;"><img src="<?php echo $get_videos->video_thumpnails;?>" style="width:150px; height:65px;"/></div>
    <table cellpadding="0" cellspacing="10">
      <tr>
        <td name="30%"><?php _e("Title" ); ?></td>
        <td><input type="text" id="video_title" name="video_title" size="50" value="<?php echo $get_videos->video_title;?>" /></td>
      </tr>
      <tr>
        <td name="30%"><?php _e("Thimbnails" ); ?></td>
        <td><input type="text" id="video_thumpnails" name="video_thumpnails" size="50" value="<?php echo $get_videos->video_thumpnails;?>" /> </td>
      </tr>
      <tr>
        <td name="30%"><?php _e("Category" ); ?></td>
        <td><select id="video_category" name="video_category"><?php for( $i = 0; $i < count($get_category); $i++){?><option id="<?php echo $get_category[$i]->value;?>" value="<?php echo $get_category[$i]->value;?>"><?php echo $get_category[$i]->category;?></option><?php }?></select><script>document.getElementById("<?php echo $get_videos->video_category;?>").selected="selected"</script></td>
      </tr>
      
      <tr>
        <td name="30%"><?php _e("Publish" ); ?></td>
        <td><input type="radio" name="video_status" value="1" size="50" <?php if($get_videos->video_status==1){?>checked="checked"<?php }?> required/>Private &nbsp; <input required type="radio" <?php if($get_videos->video_status==0){?>checked="checked"<?php }?>  name="video_status" value="0" size="50" />Public</td>
      </tr>
      
      <tr>
        <td name="30%"><?php _e("Tags" ); ?></td>
        <td><input type="text" id="video_tags" name="video_tags" size="50" value="<?php echo $get_videos->video_tags;?>"/></td>
      </tr>
      
      <tr>
        <td name="30%"><?php _e("Description" ); ?></td>
        <td><textarea id="video_description" name="video_description" style="resize:none;" rows="3" cols="50"><?php echo $get_videos->video_description;?></textarea></td>
      </tr>
    </table>
    <br />
    <input type="hidden" name="edited" value="true" />
    <input type="submit" class="button-primary" name="save" value="<?php _e("Update" ); ?>" />
    &nbsp; <a href="?page=videos" class="button-secondary" title="cancel">
    <?php _e("Cancel" ); ?>
    </a>
  </form>
</div>