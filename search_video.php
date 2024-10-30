<style>
.watch_later_property
{
   border: 1px solid #d3d3d3;
   padding: 2px;
   cursor: pointer;
   float: right;
   background: #f8f8f8;
   box-shadow: 0 1px 0 rgba(0,0,0,0.10);
   margin-top: 80px;
   margin-right: 2px;
}
.class_video_title{
    color: #1b7fcc;
    font-size: 14px;
    word-wrap: break-word;
    cursor: pointer;
    font-weight: bold;
    
}
.class_video_title:hover{
    text-decoration: underline;
}
.class_channel_title{
    color: #222;
    font-weight: bold;
    cursor:pointer;
    font-size:12px;
    
}
.class_channel_title:hover{
    color: #1b7fcc;
    text-decoration: underline;
}
.btn_filter_videosearch{
    display: inline-block;
    background: #f8f8f8;
    color: #555;
    border: 1px solid #d3d3d3;
    border-radius: 2px;
    padding: 0px 10px;
    font-size: 11px;
    cursor:pointer;
}
.btn_filter_videosearch:hover
{
    background: #F0F0F0;
}
.filter_time,.filter_type{
    cursor:pointer;
    font-size: 11px;
    color: #555;
    margin-right:10px;
    margin-top:5px;
}
.filter_time:hover,.filter_type:hover
{
    color: #1b7fcc;
}

@media screen and (max-width: 850px) {

}

@media screen and (max-width: 480px) {
	#ht_search_desc {
		clear: left !important;
		margin: 0 !important;
		width: 100% !important;
	}
}
</style>
<script>
$hdwt(document).ready(function ()
{
    $hdwt('.watch_later_hover').mouseover(function(){
		$hdwt('#search_video_'+this.id).show();
		  
	}).mouseout(function(){
		$hdwt('#search_video_'+this.id).hide();
	});

	$hdwt('.watch_later_property').click(function(){

		var getid = (this.id).split('search_video_')[1]; 
	    $hdwt.post(location.href,{watchlater:getid}, function( data ) 
	    {
		    if(data=="success")
		    {
		        $hdwt('#search_video_'+getid).html('<img src="<?php echo $img_folder_path.'right.png';?>" style="width:15px; height:15px;"/>');
		    }		    
	    });		
	    return false;
	    
	});

	 $hdwt('.btn_filter_videosearch').click(function(){
	        if($hdwt('.video_filter_div').css('display')=='none')
	        {
	          $hdwt('.video_filter_div').show();
	        }
	        else{
	        	$hdwt('.video_filter_div').hide();
	        }   
	    });

	    $hdwt('.filter_time').click(function(){
	        location.href='<?php echo $pluginurl."search_video=".$_GET['search_video']?>&filtertype='+this.id;      
	    });
	    

});

</script>
<?php

global $wpdb;

$pagenum = isset( $_GET['pagenum'] ) ? absint( $_GET['pagenum'] ) : 1;
$limit = 10;
$offset = ( $pagenum - 1 ) * $limit;

$vstatus = "";
if(!$wpdb->get_row($wpdb->prepare("SELECT channel_id FROM $channel_table_name WHERE userid=%d AND channel_id=%d",$current_user->ID,$get_user_channel_id))){
	$vstatus = "video_status = 0 AND "; 
}

$query = "SELECT * FROM ".$video_table_name." WHERE $vstatus";
$query .= ' (video_title LIKE %s OR video_tags LIKE %s)';

if(isset($_GET['filtertype'])){
        if($_GET['filtertype'] == 'hour')
        {
            $date = strtotime(date('Y-m-d H:i:s').' -1 hour');
            $get_date = date('Y-m-d H:i:s', $date);
        }
        else if($_GET['filtertype'] == 'today')
        {
            $date = strtotime(date('Y-m-d H:i:s').' -1 day');
            $get_date = date('Y-m-d H:i:s', $date);
        }
        else if($_GET['filtertype'] == 'week')
        {
            $date = strtotime(date('Y-m-d H:i:s').' -1 week');
            $get_date = date('Y-m-d H:i:s', $date);
        }
        else if($_GET['filtertype'] == 'month')
        {
            $date = strtotime(date('Y-m-d H:i:s').' -1 month');
            $get_date = date('Y-m-d H:i:s', $date);
        }
        else if($_GET['filtertype'] == 'year')
        {
            $date = strtotime(date('Y-m-d H:i:s').' -1 year');
            $get_date = date('Y-m-d H:i:s', $date);
        }
        $query .= ' AND video_upload_time >="'.$get_date.'"';
}

$query .= " LIMIT $offset, $limit" ;
$entries = $wpdb->get_results($wpdb->prepare($query,"%".$_GET['search_video']."%","%".$_GET['search_video']."%"));

$embed .= '<div>';
$embed .= '<div style="padding:10px; border-bottom:1px solid #f1f1f1; font-family:arial,sans-serif;">';

$embed .= '<div class="btn_filter_videosearch"><div style="float:left;">Filter</div><div style="float:left; margin: 4px 0 0 4px;"><img src="'.$img_folder_path.'action.png" style="height:10px; width:10px;"/></div ><div style="clear:both;"></div></div>';
$embed .= '<div style="float:right; font-size: 11px; color:#555;">About '.$count_videos.' results</div>';
$embed .= '<div style="clear:both;">';

$embed .= '<div class="video_filter_div" style="display:none; padding:10px 0px;">';

$embed .= '<div style="font-size: 11px; font-weight: bold; color: #555;">Upload Date</div>';
$embed .= '<div style="float:left;" class="filter_time" id="hour">Last hour</div>';
$embed .= '<div style="float:left;" class="filter_time" id="today">Today</div>';
$embed .= '<div style="float:left;" class="filter_time" id="week">This week</div>';
$embed .= '<div style="float:left;" class="filter_time" id="month">This month</div>';
$embed .= '<div style="float:left;" class="filter_time" id="year">This year</div><div style="clear:both;"></div>';

$embed .= '</div></div></div>';

$embed .=  '<div class="wrap">';

?>
        <?php if( $entries ) { ?>
 
            <?php
            $count = 1;
            $class = '';
            foreach( $entries as $albums ) {
               $videourl = $pluginurl."v=".$albums->video_id;

            $channel_details = $wpdb->get_row("SELECT * FROM $channel_table_name WHERE channel_id=".$albums->channel_id);
            
            $embed .= '<div onclick=" location.href=\''.$videourl.'\'" class="watch_later_hover" id="'.$albums->video_id.'" style="cursor:pointer; float:left; background-size:190px 145px; background-position: 0px -20px; background-image:url('.$albums->video_thumpnails.'); width:185px; height:104px;">';
            $embed .= '<div title="watch later" style="width:15px; height:15px; display:none; position:relative;"  id="search_video_'.$albums->video_id.'" class="watch_later_property"><img src="'.$img_folder_path.'watch_later.png" style="position:absolute; width:15px; height:15px;"/></div>';
            $embed .= '</div>';
            
            $embed .= '<div id="ht_search_desc" style="float:left; width: calc(100% - 195px); overflow-wrap: break-word; margin-left: 10px; font-size:12px; color: #555;">';
            
            $embed .= '<div class="class_video_title">'.$albums->video_title.'</div>';
            
            $n = date('Y-m-d H:i:s');
            $video_upload_time = date_diff(
                    date_create($albums->video_upload_time),
                    date_create($n));
            
            $up_ago = "";
            if ($video_upload_time->y > 0) {
                $up_ago = $video_upload_time->y . " years ago ";
            } else
            if ($video_upload_time->m > 0) {
                $up_ago = $video_upload_time->m . " months ago ";
            } else
            if ($video_upload_time->d > 0) {
                $up_ago = $video_upload_time->d . " days ago ";
            } else
            if ($video_upload_time->h > 0) {
                $up_ago = $video_upload_time->h . " hours ago ";
            } else
            if ($video_upload_time->m > 0) {
                $up_ago = $video_upload_time->m . " mins ago ";
            } else
            if ($video_upload_time->s > 0) {
                $up_ago = "Just now";
            }
            
            
            $embed .= '<div>by <span class="class_channel_title"> '.$channel_details->channel_name.' </span>'.$up_ago.  ' - ' .$albums->video_view.' Views</div>';
            $embed .= '<div style="word-wrap: break-word;">'.$albums->video_description.'</div>';
            
            $embed .= '</div>';
            $embed .= '<div style="clear:both; padding-bottom: 15px; "></div>';
            
            }
            ?>
 
        <?php } else { 
             $embed .= '<td colspan="2">No posts yet</td>';
        }
 
$count_query = "SELECT COUNT(`video_id`) FROM ".$video_table_name." WHERE";
$count_query .= ' (video_title LIKE %s OR video_tags LIKE %s)';

if(isset($_GET['filtertype'])){
        if($_GET['filtertype'] == 'hour')
        {
            $date = strtotime(date('Y-m-d H:i:s').' -1 hour');
            $get_date = date('Y-m-d H:i:s', $date);
        }
        else if($_GET['filtertype'] == 'today')
        {
            $date = strtotime(date('Y-m-d H:i:s').' -1 day');
            $get_date = date('Y-m-d H:i:s', $date);
        }
        else if($_GET['filtertype'] == 'week')
        {
            $date = strtotime(date('Y-m-d H:i:s').' -1 week');
            $get_date = date('Y-m-d H:i:s', $date);
        }
        else if($_GET['filtertype'] == 'month')
        {
            $date = strtotime(date('Y-m-d H:i:s').' -1 month');
            $get_date = date('Y-m-d H:i:s', $date);
        }
        else if($_GET['filtertype'] == 'year')
        {
            $date = strtotime(date('Y-m-d H:i:s').' -1 year');
            $get_date = date('Y-m-d H:i:s', $date);
        }
        $count_query .= " AND video_upload_time >='".$get_date."'";
}
$total = $wpdb->get_var($wpdb->prepare($count_query,"%".$_GET['search_video']."%","%".$_GET['search_video']."%"));
$num_of_pages = ceil( $total / $limit );
$page_links = paginate_links( array(
    'base' => add_query_arg( 'pagenum', '%#%' ),
    'format' => '',
    'prev_text' => __( '&laquo;', 'aag' ),
    'next_text' => __( '&raquo;', 'aag' ),
    'total' => $num_of_pages,
    'current' => $pagenum
) );
 
if ( $page_links ) {
    $embed .= '<div class="tablenav"><div class="tablenav-pages" style="margin: 1em 0">' . $page_links . '</div></div>';
}
 
$embed .=  '</div>'; 
?>