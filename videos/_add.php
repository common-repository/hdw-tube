<script>
$hdwt = jQuery.noConflict();
$hdwt(document).ready(function(){	
	$hdwt('.video_type').click(function(){
		var a = $hdwt(this).val();
		$hdwt('#vid_upload_row,#vid_url_row').hide();
		(a == "upload") ? $hdwt('#vid_upload_row').show() : $hdwt('#vid_url_row').show();			
	});	
});
</script>
<?php

/******************************************************************
/* Inserting (or) Updating the DB Table when edited
/******************************************************************/
global $current_user;
$image_folder_path        = plugins_url().'/' . basename ( dirname ( dirname ( __FILE__ ) ) ) . '/image/';

$table_name = $wpdb->prefix."youtube_video";
if($_POST['edited'] == 'true' && check_admin_referer( 'youtube-nonce') && $_POST['video_title'] != '') {
	unset($_POST['edited'], $_POST['save'], $_POST['_wpnonce'], $_POST['_wp_http_referer']);
	
	if($_POST['video_type_id'] == "upload")
	{
		$extention = array('flv','mp4','3g2','3gp','aac','f4b','f4p','f4v','m4a','m4v','mov');
	    $v_ext = end(explode(".", $_FILES["video_url2"]['name']));
	    if(in_array($v_ext, $extention))
	    {
	    	$vid = hdw_tube_general_upload($_FILES["video_url2"],'vid_');
	    	if($vid == false){
	    		$_POST['error'] = 1;
	    	}else{
	    		$_POST['video_url'] = $vid;
	    	}
	    }
	    else 
	    {
	        echo '<script>alert("Invalid video format.");</script>';
	        echo '<script>window.location="?page=videos&opt=add";</script>';
	    }
	    
	}
	
	$_POST['user_id']            = $current_user->ID;
	$_POST['video_type']         = 'video';
	if($_POST['video_thumpnails'] == ''){
    	$_POST['video_thumpnails']   = $image_folder_path.'Default_upload_thumpnail.png';
	}
    $_POST['video_like']         = 0;
    $_POST['video_dislike']      = 0;
    $_POST['video_view']         = 0;
    $_POST['video_upload_time']  = date ( 'Y-m-d H:i:s');   
  
    unset($_POST['video_type_id'],$_POST['video_url2']);
    
    $format = array ('%s','%d','%s','%s','%d','%s','%s','%d','%s','%s','%d','%d','%d','%s');
    $count = $wpdb->get_row("SELECT count(*) AS count FROM $table_name");
    if($count->count < 50)
    {
	       $wpdb->insert($table_name, $_POST,$format);
	}
	else
	{
	    echo '<script>alert("You have to upgrade for adding more videos..!")</script>';
	}
	echo '<script>window.location="?page=videos";</script>';
}
$get_channel_id = $wpdb->get_results("SELECT channel_id FROM ".$wpdb->prefix."youtube_channel WHERE userid=".$current_user->ID);

$get_category = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."youtube_category");
$admin_icon_path           = plugins_url().'/' . basename ( dirname (dirname ( __FILE__ )) ) . '/admin_menu_icon/';
?>
<table style="width:100%;"><tr><td><div style=" color:#0074a2; font-weight:bold; font-size:15px;" >Add New Video</div></td><td style="text-align:right;"><img src="<?php echo $admin_icon_path;?>hdwtube.png" style="height:40px;"/></td></tr></table>
<hr>

<div class="wrap">
  <form method="POST" enctype="multipart/form-data"  action="<?php echo $_SERVER['REQUEST_URI']; ?>">
  	<?php wp_nonce_field('youtube-nonce'); ?>
    
    <table cellpadding="0" cellspacing="10">
      <tr>
        <td width="30%"><?php _e("Title" ); ?></td>
        <td><input type="text" id="video_title" name="video_title" size="50" /></td>
      </tr>
      
      <tr>
        <td width="30%"><?php _e("Channel ID" ); ?></td>
        <td><select name="channel_id" id="channel_id"><?php for($i = 0 ; $i < count($get_channel_id) ; $i++) {?><option value="<?php echo $get_channel_id[$i]->channel_id;?>"><?php echo $get_channel_id[$i]->channel_id;?></option><?php }?></select></td>
      </tr>
      
      <tr>
        <td width="30%"><?php _e("Video" ); ?></td>
        <td><input type="radio" class="video_type" name="video_type_id" value="upload" size="50" checked="checked" required/>Upload &nbsp; <input required type="radio" class="video_type" name="video_type_id" value="url" size="50" />Url</td>
      </tr>
      
       <tr id="vid_url_row" style="display:none">
        <td width="30%"><?php _e("Url" ); ?></td>
        <td><input type="text" name="video_url" value="" size="50" /></td>
      </tr> 
      
      <tr id="vid_upload_row">
        <td width="30%"><?php _e("Upload" ); ?></td>
        <td><input type="file" name="video_url2"  size="50" /></td>
      </tr> 
       <tr>
        <td width="30%"><?php _e("Thumbnail" ); ?></td>
        <td><input type="text" id="video_thumpnails" name="video_thumpnails" size="50" /></td>
      </tr>
      <tr>
        <td width="30%"><?php _e("Category" ); ?></td>
        <td><select id="video_category" name="video_category"><?php for( $i = 0; $i < count($get_category); $i++){?><option value="<?php echo $get_category[$i]->value;?>"><?php echo $get_category[$i]->category;?></option><?php }?></select></td>
      </tr>
      
      <tr>
        <td width="30%"><?php _e("Publish" ); ?></td>
        <td><input type="radio" name="video_status" value="1" size="50" checked="checked" required/>Private &nbsp; <input required type="radio" name="video_status" value="0" size="50" />Public</td>
      </tr>
      
      <tr>
        <td width="30%"><?php _e("Tags" ); ?></td>
        <td><input type="text" id="video_tags" name="video_tags" size="50" /></td>
      </tr>
      
      <tr>
        <td width="30%"><?php _e("Description" ); ?></td>
        <td><textarea id="video_description" name="video_description" style="resize:none;" rows="3" cols="52"></textarea></td>
      </tr>
    </table>
    <br />
    <input type="hidden" name="edited" value="true" />
    <input type="submit" class="button-primary" name="save" value="<?php _e("Save Options" ); ?>" />
    &nbsp; <a href="?page=videos" class="button-secondary" title="cancel">
    <?php _e("Cancel" ); ?>
    </a>
  </form>
</div>