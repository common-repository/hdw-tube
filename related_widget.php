<?php
add_action( 'widgets_init', 'hdwtube_load_related_widgets' );

function hdwtube_load_related_widgets()
{
	register_widget( 'hdwtube_related_Widget' );
}

class hdwtube_related_Widget extends WP_Widget 
{
	function __construct(){
		$widget_ops = array( 'classname' => 'hdwtube_related', 'description' => __('Widget that display Related Videos list', 'hdwtube_related') );	
		$control_ops = array( 'width' => '100%', 'height' => '100%', 'id_base' => 'hdwtube_related-widget' );
		parent::__construct( 'hdwtube_related-widget', __('HDW Tube Related Videos', 'hdwtube_related'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) 
	{
		extract( $args );
		
	    global $current_user;
	    global $wpdb;
	    $siteurl                   = get_option ( 'siteurl' );
	    $widget_folder_path        = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/widget_icon/';
	    $channel_table_name        = $wpdb->prefix . "youtube_channel";
	    $video_table_name          = $wpdb->prefix . "youtube_video";
	    $settings_table_name       = $wpdb->prefix . "youtube_settings";
	    $img_folder_path = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/image/';
	    
	    $get_settings = $wpdb->get_row("SELECT * FROM $settings_table_name");
		$hdwtube_url = $instance['url'];	
		$hdwtube_title = apply_filters('widget_title',$instance['title']);
		$hdwtube_limit = $instance['limit'];
		
		if (strpos($hdwtube_url,'?') !== false){ $hdwtube_url = $hdwtube_url."&"; }else{ $hdwtube_url = $hdwtube_url."?"; }
			
		$siteurl = get_option('siteurl');
		if(isset($_GET['v']) && $_GET['v'] != ''){
			echo $before_widget;
			
			echo $before_title . $hdwtube_title . $after_title;
			
			require_once (dirname ( __FILE__ ) . '/related_widget/related.php');
			
			echo $after_widget;
		}
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		
		$instance['url'] = strip_tags( $new_instance['url'] );
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['limit'] = strip_tags( $new_instance['limit'] );
		
		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('HDW Tube Related', 'hdwtube_related'), 'display' => 'image','limit' => __('10', 'hdwtube_related') );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		
		<!-- Your Name: Text Input -->		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Widget Title:'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e('HDW Tube URL:'); ?></label>
			<input id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" value="<?php echo $instance['url']; ?>" style="width:100%;" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'limit' ); ?>"><?php _e('Display Limit:'); ?></label>
			<input id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" value="<?php echo $instance['limit']; ?>" style="width:100%;" />
		</p>
		

	<?php
	}
}

?>