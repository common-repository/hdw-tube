<?php
$admin_icon_path           = plugins_url().'/' . basename ( dirname (dirname ( __FILE__ )) ) . '/admin_menu_icon/';
?>
<table style="width:100%;"><tr><td><div style=" color:#0074a2; font-weight:bold; font-size:15px;" >Channels List</div></td><td style="text-align:right;"><img src="<?php echo $admin_icon_path;?>hdwtube.png" style="height:40px;"/></td></tr></table>
<hr>
<?php
require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

class Hdwyoutubeclone_channel_Table extends WP_List_Table {

	var $table_name;
	var $wpdb;
	var $category;
	var $data;
	var $pluginpage;
	var $i = 0;
    var $channelcategory;
    function __construct(){
        global $status, $page;                
        parent::__construct( array( 'singular' => 'channel', 'plural' => 'channels', 'ordering' => 'order', 'ajax' => false ) );        
    }
    
    function column_default($item, $column_name){
		switch($column_name) {
			case 'actions' :
			    $actions .= '<div style="margin-top:9px;">';
			    $actions .= '<a class="button-secondary" href="?page=channels&opt=edit&id='.$item->channel_id.'" title="Edit">Edit</a>&nbsp;&nbsp;&nbsp;';
			    $actions .= '<a class="button-secondary" href="?page=channels&opt=delete&id='.$item->channel_id.'" title="Delete">Delete</a></div>';
				return $actions; 
				break;
			case 'channel_icon' :
				if($item->channel_icon == '') {
					return '<div style="margin-top:9px;"><img style="height:40px; width:85px;" src="" /></div>';
				} else {
					return '<div style="margin-top:9px;"><img style="height:40px; width:40px;" src="'.$item->channel_icon.'" /></div>';
				}
				break;
			case 'videos' :
				if(isset($this->channelcategory[$item->channel_id]) && $this->channelcategory[$item->channel_id] != ''){
				    return '<div style="margin-top:9px;">'.$this->channelcategory[$item->channel_id].'</div>';
				}
				
				return '<div style="margin-top:9px;">0</div>';
				
				break;
			default :
				return '<div style="margin-top:4px;">'.$item->$column_name.'</div>';
				break;
		}
    }

    function column_cb($item){
        return sprintf( '<input type="checkbox" name="%1$s[]" value="%2$s" />', $this->_args['singular'], $item->channel_id );
    }
    
	
	function get_columns(){
        $columns = array(
            'cb'                => '<input type="checkbox" />',
            'channel_id'        => 'Channel ID',
			'userid'            => 'User ID',
            'channel_name'      => 'Name',
			'channel_icon'      => 'Icon',
        	'channel_category'  => 'Category',
            'videos'            => 'Videos',
			'actions'           => 'Actions'
        );
        return $columns;
    }

    function get_bulk_actions() {
        $actions = array( 'delete' => 'Delete' );
        return $actions;
    }

    function process_bulk_action() {
		if( 'delete'===$this->current_action() ) {			
			foreach($_GET['channel'] as $channel) {
				$this->wpdb->query($this->wpdb->prepare("DELETE FROM $this->table_name WHERE channel_id=%d",$channel));
        	}
			echo '<script>window.location="?page=channels";</script>';
		}
		
    }
      
    function prepare_items( $data, $table_name, $wpdb,$channelcategory) {
		$this->table_name = $table_name;
		$this->wpdb = $wpdb;
		$this->data = $data;
		$this->pluginpage = $pluginpage;
		$this->channelcategory = $channelcategory;
        $columns = $this->get_columns();
        $hidden = array();
        $this->_column_headers = array($columns, $hidden, $sortable);
		
        $this->process_bulk_action();

 		$per_page = 10;
        $current_page = $this->get_pagenum();
        $this->i = ($current_page-1)*$per_page;
        $total_items = count($data);
        $data = array_slice($data,(($current_page-1)*$per_page),$per_page);
        $this->items = $data;

        $this->set_pagination_args( array( 'total_items' => $total_items, 'per_page' => $per_page, 'total_pages' => ceil($total_items/$per_page) ) );
    }
    
}
?>
<br />
<?php

global $wpdb;
    $channel_table_name = $wpdb->prefix.'youtube_channel';
    $video_table_name = $wpdb->prefix.'youtube_video';

	$table = new Hdwyoutubeclone_channel_Table();
	$ser = '';
	$query = "SELECT $channel_table_name.channel_id,$channel_table_name.userid,$channel_table_name.channel_name,$channel_table_name.channel_icon,$channel_table_name.channel_category FROM $channel_table_name ";

	if(isset($_GET['s'])) {
		$query .= " WHERE $channel_table_name.channel_name LIKE %s";
		$ser = "%".$_GET['s']."%";
	}
	
	$data  = $wpdb->get_results($wpdb->prepare($query,$ser));
	
	$videocategory = $wpdb->get_results("SELECT channel_id, count(video_id) as count FROM $video_table_name GROUP BY channel_id");
	
	foreach ($videocategory as $video){
	    $count[$video->channel_id] = $video->count;
	}
	
	$table->prepare_items( $data, $channel_table_name, $wpdb,$count);
?><div><a href="?page=channels&opt=add" class="button-primary" title="addnew"><?php _e("Add New Channel" ); ?></a></div>
<form id="hdwplayer-videos-filter" method="get" style="width:99%;">
<input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
 <?php $table->search_box('search', 'video_title'); ?>
<?php $table->display() ?>
</form>