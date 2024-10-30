<?php
	header("Content-type: image/png");
    include_once(dirname ( __FILE__ ) . '/mygraph.php');
   
    $cfg['width'] = 560;
    $cfg['height'] = 250;
    
    global $wpdb;
    $table_name = $wpdb->prefix.'youtube_subscriptions';    
    $dates = array();
    $final_subscription = array();
    $getchannel = $_GET['analytics_subscriptions_chart'];
    $get_subscription = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE subsc_channel_id=%d AND current_time BETWEEN NOW() - INTERVAL 30 DAY AND NOW()",intval($getchannel)));
    
    if($get_subscription)
    {
        foreach ($get_subscription as $result_set){ 
            $d =  date("Y-m-d", strtotime($result_set->current_time));
            if (!in_array($d, $dates)) {
                array_push($dates, $d);
            }
        }    
        $d = date('Y-m-d', strtotime("-29 days"));
        for ($i = 0; $i < 30; $i++){   
        	if (in_array(trim($d), $dates)) {
	            $subscription = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE subsc_channel_id=%d AND current_time like %s",$getchannel,$d.'%'));
	            $final_subscription[date('m-d', strtotime($d))] = count($subscription);
        	}else{
        		$final_subscription[date('m-d', strtotime($d))] = 0;
        	}
        	$d = date('Y-m-d', strtotime($d. " +1 day"));
        }  
    }
    else
    {
        $final_subscription = array(
                 
                'No Subscriptions'=>0
        );
    }
    
    $graph = new phpMyGraph();  
    $graph->parseVerticalColumnGraph($final_subscription, $cfg);    
exit;
?>