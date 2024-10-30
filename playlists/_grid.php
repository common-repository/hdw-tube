<?php 
$admin_icon_path           = plugins_url().'/' . basename ( dirname (dirname ( __FILE__ )) ) . '/admin_menu_icon/';
?>
<table style="width:100%;"><tr><td><div style=" color:#0074a2; font-weight:bold; font-size:15px;" >Playlists</div></td><td style="text-align:right;"><img src="<?php echo $admin_icon_path;?>hdwtube.png" style="height:40px;"/></td></tr></table>
<hr>
<?php
require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

class Hdwyoutubeclone_playlist_Table extends WP_List_Table {

	var $table_name;
	var $wpdb;
	var $category;
	var $data;
	var $i = 0;
    
    function __construct(){
        global $status, $page;                
        parent::__construct( array( 'singular' => 'playlist', 'plural' => 'playlists', 'ordering' => 'order', 'ajax' => false ) );        
    }
    
    function column_default($item, $column_name){
		switch($column_name) {
			case 'actions' :
				return '<div style="margin-top:9px;"><a class="button-secondary" href="?page=playlists&opt=edit&id='.$item->id.'" title="Edit">Edit</a>&nbsp;&nbsp;&nbsp;<a class="button-secondary" href="?page=playlists&opt=delete&id='.$item->id.'" title="Delete">Delete</a></div>';
				break;
			case 'thumbnail' :
				if($item->thumbnail == '') {
					return '<div style="margin-top:9px;"><img style="height:40px; width:85px;" src="" /></div>';
				} else {
					return '<div style="margin-top:9px;"><img style="height:40px; width:85px;" src="'.$item->thumbnail.'" /></div>';
				}
				break;
			default :
				return '<div style="margin-top:4px;">'.$item->$column_name.'</div>';
				break;
		}
    }

    function column_cb($item){
        return sprintf( '<input type="checkbox" name="%1$s[]" value="%2$s" />', $this->_args['singular'], $item->id );
    }
    
	
	function get_columns(){
        $columns = array(
            'cb'                => '<input type="checkbox" />',
            'id'                => 'ID',
			'userid'            => 'User ID',
            'channelid'         => 'Channel ID',
			'playlistname'      => 'Name',
        	'thumbnail'         => 'Thumbnail',
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
			foreach($_GET['playlist'] as $id) {
				$this->wpdb->query($this->wpdb->prepare("DELETE FROM $this->table_name WHERE id=%d",$id));
        	}
			echo '<script>window.location="?page=playlists";</script>';
		}
		
    }
      
    function prepare_items( $data, $table_name, $wpdb) {
		$this->table_name = $table_name;
		$this->wpdb = $wpdb;
		$this->data = $data;

        $columns = $this->get_columns();
        $hidden = array();
        $sortable = array('channel_category' => array('channel_category', true));
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
    $playlist_table_name = $wpdb->prefix.'youtube_playlistname';
    $table = new Hdwyoutubeclone_playlist_Table();
	$ssr = '';	
	$query = "SELECT id,userid,channelid,playlistname,thumbnail FROM $playlist_table_name";
	if(isset($_GET['s'])){
		$query .= " WHERE playlistname LIKE %s";
		$ssr = "%".$_GET['s']."%";
	}	
	$data  = $wpdb->get_results($wpdb->prepare($query,$ssr));	
	$table->prepare_items( $data, $playlist_table_name, $wpdb);
?>
<div><a href="?page=playlists&opt=add" class="button-primary" title="addnew"><?php _e("Add New" ); ?></a></div>
<form id="hdwplayer-videos-filter" method="get" style="width:99%;">
<input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
<?php 
	$table->search_box('search', 'video_title'); 
	$table->display();
?>
</form>