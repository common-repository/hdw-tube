<?php
$admin_icon_path           = plugins_url().'/' . basename ( dirname (dirname ( __FILE__ )) ) . '/admin_menu_icon/';
?>
<table style="width:100%;"><tr><td><div style=" color:#0074a2; font-weight:bold; font-size:15px;" >Video List</div></td><td style="text-align:right;"><img src="<?php echo $admin_icon_path;?>hdwtube.png" style="height:40px;"/></td></tr></table>
<hr>
<?php

require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

class Hdwyoutubeclone_Videos_Table extends WP_List_Table {

	var $table_name;
	var $wpdb;
	var $category;
	var $data;
	var $i = 0;
    
    function __construct(){
        global $status, $page;                
        parent::__construct( array( 'singular' => 'video', 'plural' => 'videos', 'ordering' => 'order', 'ajax' => false ) );        
    }
    
    function column_default($item, $column_name){
		switch($column_name) {
			case 'actions' :
				return '<div style="margin-top:9px;"><a class="button-secondary" href="?page=videos&opt=edit&id='.$item->video_id.'" title="Edit">Edit</a>&nbsp;&nbsp;&nbsp;<a class="button-secondary" href="?page=videos&opt=delete&id='.$item->video_id.'" title="Delete">Delete</a></div>';
				break;
			case 'video_thumpnails' :
				if($item->video_thumpnails == '') {
					return '<div style="margin-top:9px;"><img style="height:40px; width:85px;" src="" /></div>';
				} else {
					return '<div style="margin-top:9px;"><img style="height:40px; width:85px;" src="'.$item->video_thumpnails.'" /></div>';
				}
				break;
			default :
				return '<div style="margin-top:4px;">'.$item->$column_name.'</div>';
				break;
		}
    }

    function column_cb($item){
        return sprintf( '<input type="checkbox" name="%1$s[]" value="%2$s" />', $this->_args['singular'], $item->video_id );
    }
    	
	function get_columns(){
        $columns = array(
            'cb'          => '<input type="checkbox" />',
            'video_id'          => 'Video ID',
			'video_thumpnails'  => 'ICON',
            'video_title'       => 'Video Title',
			'video_category'       => 'Category',
        	'video_upload_time'    => 'Uploaded Time',
            'video_view'    => 'Views',
            'video_like'    => 'Likes',
            'video_dislike'    => 'Dis Likes',
			'actions'     => 'Actions'
        );
        return $columns;
    }

    function get_bulk_actions() {
        $actions = array( 'delete' => 'Delete' );
        return $actions;
    }

    function process_bulk_action() {
		if( 'delete'===$this->current_action() ) {			
			foreach($_GET['video'] as $video) {
				$this->wpdb->query($this->wpdb->prepare("DELETE FROM $this->table_name WHERE video_id=%d",$video));
        	}
			echo '<script>window.location="?page=videos";</script>';
		}
    }
    
    private function sort_data( $a, $b )
    {
        // Set defaults
        $orderby = 'video_category';
    
        // If orderby is set, use this as the sort column
        if(!empty($_GET['video_category']))
        {
            $orderby = $_GET['video_category'];
        }
    
        $result = strnatcmp( $a[$orderby], $b[$orderby] );  
        
    
        return $result;
    }
    
    function prepare_items( $data, $table_name, $wpdb) {
		$this->table_name = $table_name;
		$this->wpdb = $wpdb;
		$this->data = $data;

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
$table_name = $wpdb->prefix.'youtube_video';
	$table = new Hdwyoutubeclone_Videos_Table();
	$src = '';
	$query = "SELECT video_id,video_thumpnails,video_title,video_category,video_upload_time,video_view,video_like,video_dislike FROM $table_name";
	
	if(isset($_GET['s'])){
		$query .= ' WHERE video_title LIKE %s';
		$src = '%'.$_GET['s'].'%';
	}
	$data  = $wpdb->get_results($wpdb->prepare($query,$src));
	
	$table->prepare_items( $data, $table_name, $wpdb);
?>
<div><a href="?page=videos&opt=add" class="button-primary" title="addnew"><?php _e("New Video" ); ?></a></div>
<form id="hdwplayer-videos-filter" method="get" style="width:99%;">
<input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
 <?php $table->search_box('search', 'video_title'); ?>
<?php $table->display() ?>
</form>