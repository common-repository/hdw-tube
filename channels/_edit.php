<script>
var $hdwt = jQuery.noConflict();
$hdwt(document).ready(fuhdwttion(){
	$hdwt('.banner_type').click(function(){
		var a = $hdwt(this).val();
		$hdwt('#upload_row,#url_row').hide();
		(a == "upload") ? $hdwt('#upload_row').show() : $hdwt('#url_row').show();			
	});

	$hdwt('.icon_type').click(function(){
		var a = $hdwt(this).val();
		$hdwt('#ic_upload_row,#ic_url_row').hide();
		(a == "upload") ? $hdwt('#ic_upload_row').show() : $hdwt('#ic_url_row').show();			
	});	
});

</script>


<?php
/******************************************************************
/* Inserting (or) Updating the DB Table when edited
/******************************************************************/
$get_category = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."youtube_category");

$get_channels = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE channel_id=%d",intval($_GET['id'])));

if($_POST['edited'] == 'true' && check_admin_referer( 'youtube-nonce') && $_POST['channel_name'] != '') {
	unset($_POST['edited'], $_POST['save'], $_POST['_wpnonce'], $_POST['_wp_http_referer']);
	
	if($_POST['banner_type'] == "upload")
	{		
		$banner = hdw_tube_general_upload($_FILES["channel_banner2"],'ban_');
		if($banner == false){
			$_POST['error'] = 1;
		}else{
			$_POST['channel_banner'] = $banner;
		}
	}
	
	if($_POST['icon_type'] == "upload")
	{
		$icon = hdw_tube_general_upload($_FILES["channel_icon2"],'ico_');
		if($icon == false){
			$_POST['error'] = 1;
		}else{
			$_POST['channel_icon'] = $icon;
		}
	}
	
	unset($_POST['banner_type'],$_POST['icon_type'],$_POST['channel_icon2'],$_POST['channel_banner2'],$_FILES['channel_icon2'],$_FILES['channel_banner2']);
	
	$_POST['userid']       =  $get_channels->userid;
    $_POST['channel_view'] =  $get_channels->channel_view;
    $_POST['channel_subscribers'] = 0;
    $_POST['datetime']  = date ( 'Y-m-d H:i:s');
   
    $img_folder_path           = plugins_url().'/' . basename ( dirname (dirname ( __FILE__ )) ) . '/image/';
    
    if($_POST['channel_icon'] == ''){
    	$_POST['channel_icon'] = $img_folder_path . 'default_icon.png';
    }
    
 	if($_POST['channel_banner'] == ''){
    	$_POST['channel_banner'] = $img_folder_path . 'default_banner.jpg';
    }
    $format = array ('%s','%s','%s','%s','%s','%d','%d','%d','%s');
	$wpdb->update($table_name, $_POST,array('channel_id'=>intval($_GET['id'])), $format, array('%d'));
	
	
	echo '<script>window.location="?page=channels";</script>';
}

$img_folder_path           = plugins_url().'/' . basename ( dirname(dirname ( __FILE__ ) )) . '/image/';
$admin_icon_path           = plugins_url().'/' . basename ( dirname (dirname ( __FILE__ ))) . '/admin_menu_icon/';

?>
<table style="width:100%;"><tr><td><div style=" color:#0074a2; font-weight:bold; font-size:15px;" >Edit channel</div></td><td style="text-align:right;"><img src="<?php echo $admin_icon_path;?>hdwtube.png" style="height:40px;"/></td></tr></table>
<hr>
<div class="wrap">
   
  <form method="POST" enctype="multipart/form-data"  action="<?php echo $_SERVER['REQUEST_URI']; ?>">
  	<?php wp_nonce_field('youtube-nonce'); ?>
    <?php  echo "<h3>" . __( 'Edit Channel' ) . "</h3>"; ?>
    <div style="width:90%; height:150px; background-size:100%; background-image:url('<?php echo $get_channels->channel_banner;?>');"><div style="margin-left: 25px;"><img src="<?php echo $get_channels->channel_icon;?>" style="width:100px; height:100px;"/></div></div>
    <table cellpadding="0" cellspacing="10">
   
      <tr>
        <td name="30%"><?php _e("Name" ); ?></td>
        <td><input type="text" id="channel_name" name="channel_name" size="50" value="<?php echo $get_channels->channel_name;?>"/></td>
      </tr>
      <tr>
        <td name="30%"><?php _e("Banner" ); ?></td>
        <td><input type="radio" class="banner_type" name="banner_type" value="upload" size="50" required/>Upload &nbsp; <input required type="radio" checked="checked" class="banner_type" name="banner_type" value="url" size="50" />Url</td>
      </tr>
      
       <tr id="url_row">
        <td name="30%"><?php _e("Url" ); ?></td>
        <td><input type="text" id="channel_banner" name="channel_banner" value="<?php echo $get_channels->channel_banner;?>" size="50" /></td>
      </tr> 
      
      <tr id="upload_row" style="display:none">
        <td name="30%"><?php _e("Upload" ); ?></td>
        <td><input type="file" id="channel_banner" name="channel_banner2"  size="50" /></td>
      </tr> 
      
      <tr>
        <td name="30%"><?php _e("Icon" ); ?></td>
        <td><input type="radio" class="icon_type" name="icon_type" value="upload" size="50" required/>Upload &nbsp; <input required type="radio" checked="checked" class="icon_type" name="icon_type" value="url" size="50" />Url</td>
      </tr>
      
       <tr id="ic_url_row">
        <td name="30%"><?php _e("Url" ); ?></td>
        <td><input type="text" id="channel_icon" name="channel_icon" value="<?php echo $get_channels->channel_icon;?>" size="50" /></td>
      </tr> 
      
      <tr id="ic_upload_row" style="display:none">
        <td name="30%"><?php _e("Upload" ); ?></td>
        <td><input type="file" id="channel_icon" name="channel_icon2"  size="50" /></td>
      </tr> 
      
      <tr>
        <td name="30%"><?php _e("Category" ); ?></td>
        <td><select id="channel_category" name="channel_category"><?php for( $i = 0; $i < count($get_category); $i++){?><option value="<?php echo $get_category[$i]->value;?>" <?php if($get_category[$i]->value == $get_channels->channel_category){?>selected="selected"<?php }?>><?php echo $get_category[$i]->category;?></option><?php }?></select></td>
      </tr>
      <tr>
        <td name="30%"><?php _e("Description" ); ?></td>
        <td><textarea id="description" name="description" style="resize:none;" rows="3" cols="50"><?php echo $get_channels->description?></textarea></td>
      </tr>
    </table>
    <br />
    <input type="hidden" name="edited" value="true" />
    <input type="submit" class="button-primary" name="save" value="<?php _e("Update" ); ?>" />
    &nbsp; <a href="?page=channels" class="button-secondary" title="cancel">
    <?php _e("Cancel" ); ?>
    </a>
  </form>
</div>