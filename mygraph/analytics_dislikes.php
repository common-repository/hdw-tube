<?php
	header("Content-type: image/png");
    include_once(dirname ( __FILE__ ) . '/mygraph.php');
   
    $cfg['width'] = 560;
    $cfg['height'] = 250;
    
    global $wpdb;
    $table_name = $wpdb->prefix.'youtube_likevideo';    
    $dates = array();
    $final_dislikes = array();
    $getchannel = $_GET['analytics_dislikes_chart'];
    $get_dislikes = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE lk_dlk_channelid=%d AND status=0 AND currentime BETWEEN NOW() - INTERVAL 30 DAY AND NOW()",$getchannel));
    
    if($get_dislikes)
    {
        foreach ($get_dislikes as $result_set){ 
            $d =  date("Y-m-d", strtotime($result_set->currentime));
            if (!in_array($d, $dates)) {
                array_push($dates, $d);
            }
        }    
        $d = date('Y-m-d', strtotime("-29 days"));
        for ($i = 0; $i < 30; $i++){
        	if (in_array($d, $dates)) {
	            $dislikes = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE lk_dlk_channelid=%d AND status=0 AND currentime like %s",$getchannel,$d . '%'));
	            $final_dislikes[date('m-d', strtotime($d))] = count($dislikes);
        	}else{
        		$final_dislikes[date('m-d', strtotime($d))] = 0;
        	}
        	$d = date('Y-m-d', strtotime($d. " +1 day"));
        }
    }
    else 
    {
        $final_dislikes = array(
        	
                'No DisLikes'=>0
        );
    }
    
    $graph = new phpMyGraph();  
    $graph->parseVerticalColumnGraph($final_dislikes, $cfg);    
exit;
?>