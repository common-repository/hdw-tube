<?php
	header("Content-type: image/png"); 
	include_once(dirname ( __FILE__ ) . '/mygraph.php');
   
    $cfg['width'] = 560;
    $cfg['height'] = 250;
    
    global $wpdb;
    $table_name = $wpdb->prefix.'youtube_watchhistory';    
    $dates = array();
    $final_views = array();
    $getchannel = $_GET['analytics_view_chart'];
    $get_views = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE videoid=%d AND currenttime BETWEEN NOW() - INTERVAL 30 DAY AND NOW()",$getchannel));
    
    if($get_views)
    {
        foreach ($get_views as $result_set){ 
            $d =  date("Y-m-d", strtotime($result_set->currenttime));
            if (!in_array($d, $dates)) {
                array_push($dates, $d);
            }
        }    
        
        $d = date('Y-m-d', strtotime("-29 days"));
        for ($i=0; $i < 30; $i++){
        	if (in_array($d, $dates)) {
	            $views = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE videoid=%d AND currenttime like %s",$getchannel,$d.'%'));
	            $final_views[date('m-d', strtotime($d))] = count($views);
        	}else{
        		$final_views[date('m-d', strtotime($d))] = 0;
        	}
        	
        	$d = date('Y-m-d', strtotime($d. " +1 day"));
        }    
    }
    else
    {
        $final_views = array(
                 
                'No views'=>0
        );
    } 
    
  	$graph = new phpMyGraph();  
  	$graph->parseVerticalColumnGraph($final_views, $cfg);    
	exit;
?>