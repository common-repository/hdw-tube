<?php
	header("Content-type: image/png");
    include_once(dirname ( __FILE__ ) . '/mygraph.php');
   
    $cfg['width'] = 560;
    $cfg['height'] = 250;
    
    global $wpdb;
    $table_name = $wpdb->prefix.'youtube_comments';    
    $dates = array();
    $final_comments = array();
    $get_channel  = $_GET['analytics_comments_chart'];
    $get_comments = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE channel_id=%d AND comments_time BETWEEN NOW() - INTERVAL 30 DAY AND NOW()",$get_channel));
    
    if($get_comments)
    {
        foreach ($get_comments as $result_set){ 
            $d =  date("Y-m-d", strtotime($result_set->comments_time));
            if (!in_array($d, $dates)) {
                array_push($dates, $d);
            }
        }    
        $d = date('Y-m-d', strtotime("-29 days"));
        for ($i = 0; $i < 30; $i++){
        	if (in_array($d, $dates)) {   
	            $comments = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE channel_id=%d AND comments_time like %s",$get_channel,$d . '%'));
	            $final_comments[date('m-d', strtotime($d))] = count($comments);
        	}else{
        		$final_comments[date('m-d', strtotime($d))] = 0;
        	}
        	$d = date('Y-m-d', strtotime($d. " +1 day"));
        }
    }
    else
    {
        $final_comments = array(
                 
                'No Comments'=>0
        );
    }
    
    $graph = new phpMyGraph();  
    $graph->parseVerticalColumnGraph($final_comments, $cfg);    
exit;
?>