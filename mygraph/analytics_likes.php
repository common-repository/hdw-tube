<?php
	header("Content-type: image/png");
    include_once(dirname ( __FILE__ ) . '/mygraph.php');
   
    $cfg['width'] = 560;
    $cfg['height'] = 250;
    
    global $wpdb;
    $table_name = $wpdb->prefix.'youtube_likevideo';    
    $dates = array();
    $final_likes = array();
    $getchannel = $_GET['analytics_likes_chart'];
    $get_likes = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE lk_dlk_channelid=%d AND status=1 AND currentime BETWEEN NOW() - INTERVAL 30 DAY AND NOW()",$getchannel));
   
    if($get_likes)
    {
        foreach ($get_likes as $result_set){ 
            $d =  date("Y-m-d", strtotime($result_set->currentime));
            if (!in_array($d, $dates)) {
                array_push($dates, $d);
            }
        }    
        $d = date('Y-m-d', strtotime("-29 days"));
        for ($i = 0; $i < 30; $i++){  
        	if (in_array($d, $dates)) {
	            $likes = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE lk_dlk_channelid=%d AND status=1 AND currentime like %s",$getchannel,$d . '%'));
	            $final_likes[date('m-d', strtotime($d))] = count($likes);
        	}else{
        		$final_likes[date('m-d', strtotime($d))] = 0;
        	}
        	$d = date('Y-m-d', strtotime($d. " +1 day"));
        }
    }
    else
    {
        $final_likes = array(
                 
                'No Likes'=>0
        );
    }
    
    $graph = new phpMyGraph();  
    $graph->parseVerticalColumnGraph($final_likes, $cfg);    
exit;
?>