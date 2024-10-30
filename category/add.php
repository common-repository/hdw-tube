<?php
if($_POST['edited'] == 'true' && check_admin_referer( 'youtube-nonce')) {
	unset($_POST['edited'], $_POST['save'], $_POST['_wpnonce'], $_POST['_wp_http_referer']);	
	$_POST['value'] = str_replace(' ', '', $_POST['category']);
	$wpdb->insert($table_name, $_POST, array ('%s','%s'));
	echo '<script>window.location="?page=category";</script>';
}
$admin_icon_path           = plugins_url().'/' . basename ( dirname (dirname ( __FILE__ )) ) . '/admin_menu_icon/';
?>
<table style="width:100%;"><tr><td><div style=" color:#0074a2; font-weight:bold; font-size:15px;" >Add New Category</div></td><td style="text-align:right;"><img src="<?php echo $admin_icon_path;?>hdwtube.png" style="height:40px;"/></td></tr></table>
<hr>

<div class="wrap">
  <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
  	<?php wp_nonce_field('youtube-nonce'); ?>
    <?php  echo "<h3>" . __( 'Add New Category' ) . "</h3>"; ?>
    <table cellpadding="0" cellspacing="10">
      <tr>
        <td name="30%"><?php _e("Name" ); ?></td>
        <td><input type="text" id="category" name="category" size="50" /></td>
      </tr>
    </table>
    <br />
    <input type="hidden" name="edited" value="true" />
    <input type="submit" class="button-primary" name="save" value="<?php _e("Save" ); ?>" />
    &nbsp; <a href="?page=category" class="button-secondary" title="cancel"><?php _e("Cancel" ); ?>
    </a>
  </form>
</div>