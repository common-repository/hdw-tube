<?php 
$admin_icon_path           = plugins_url().'/' . basename ( dirname (dirname ( __FILE__ )) ) . '/admin_menu_icon/';
?>
<table style="width:100%;"><tr><td><div style=" color:#0074a2; font-weight:bold; font-size:15px;" >Reports</div></td><td style="text-align:right;"><img src="<?php echo $admin_icon_path;?>hdwtube.png" style="height:40px;"/></td></tr></table>
<hr>

<?php
require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

class Hdwyoutubeclone_report_Table extends WP_List_Table {

	var $table_name;
	var $wpdb;
	var $category;
	var $data;
	var $i = 0;
    
    function __construct(){
        global $status, $page;                
        parent::__construct( array( 'singular' => 'report', 'plural' => 'reports', 'ordering' => 'order', 'ajax' => false ) );        
    }
    
    function column_default($item, $column_name){
		switch($column_name) {
			case 'actions' :
				return '<div style="margin-top:9px;"><a class="button-secondary" href="?page=reports&opt=delete&id='.$item->id.'" title="Delete">Delete</a></div>';
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
            'cb'        => '<input type="checkbox" />',
            'id'        => 'ID',
			'userid'    => 'User ID',
            'videoid'   => 'Video ID',
			'reason'    => 'Issue',
        	'message'   => 'Message',
            'date'      => 'Date',
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
			foreach($_GET['report'] as $id) {
				$this->wpdb->query($wpdb->prepare("DELETE FROM $this->table_name WHERE id=%d",$id));
        	}
			echo '<script>window.location="?page=reports";</script>';
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

   
	$table = new Hdwyoutubeclone_report_Table();
	$query = "SELECT id,userid,videoid,reason,message,date FROM $table_name";
	$data  = $wpdb->get_results($query);
	$table->prepare_items( $data, $table_name, $wpdb);
?>

<form id="hdwplayer-videos-filter" method="get" style="width:99%;">
<input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
<?php $table->display() ?>
</form>