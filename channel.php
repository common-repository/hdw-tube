<?php
session_start();
date_default_timezone_set ( 'Asia/Calcutta' );
require_once (dirname ( __FILE__ ) . '/config.php');
add_shortcode ( 'hdwtube', 'plugin_hdwtube_code' );

function plugin_hdwtube_code() {
/* ************************************ * Variable Declaration * ******************************************************* */
    
	global $wpdb;
	$data = array ();

	global $current_user;
	get_currentuserinfo ();

	$channel_table_name        = $wpdb->prefix . "youtube_channel";
	$video_table_name          = $wpdb->prefix . "youtube_video";
	$comment_table_name        = $wpdb->prefix . "youtube_comments";
	$subscribtion_table_name   = $wpdb->prefix . "youtube_subscriptions";
	$addchannel_table_name     = $wpdb->prefix . "youtube_add_channel";
	$addchannellist_table_name = $wpdb->prefix . "youtube_addchannellist";
	$channel_chating_table     = $wpdb->prefix . "youtube_channel_comment";
	$playlisttitle_table_name  = $wpdb->prefix . "youtube_playlistname";
	$playlist_table_name       = $wpdb->prefix . "youtube_playlist";
	$likedislike_table_name    = $wpdb->prefix . "youtube_likevideo";
	$watchlater_table_name     = $wpdb->prefix . "youtube_watchlater";
	$watchhistory_table_name   = $wpdb->prefix . "youtube_watchhistory";
	$channeltags_table_name    = $wpdb->prefix . "youtube_channeltags";
	$likedplaylist_table_name  = $wpdb->prefix . "youtube_likedplaylist";
	$recommeded_table_name     = $wpdb->prefix . "youtube_recommended";
	$settings_table_name       = $wpdb->prefix . "youtube_settings";
	$category_table_name       = $wpdb->prefix . "youtube_category";

	$siteurl                   = get_option ( 'siteurl' );
	$pluginurl                 = get_permalink ();
	$pluginurl1                = get_permalink ();

	$img_folder_path           = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/image/';
	$vid_folder_path           = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/video/';
	$thump_folder_path         = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/thumpnail/';
	$icon_folder_path          = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/icon/';
	$banner_folder_path        = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/banner/';
	
	$icon_gallery_path         = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/Icon_Gallery/';
	$banner_gallery_path       = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/Banner_Gallery/';

	$js_url                    = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/js/widget.js';
	$popup_url                 = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/js/dw_popup.js';
	
	$slider_css_url            = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/css/website.css';
	$css_url                   = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/css/design.css';
	$slider_url                = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/js/jquery.slider.min.js';
	$upload_js_url             = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/js/video_upload.js';
	$player_url                = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/player.swf';

	define ( 'SITE_ROOT', realpath ( dirname ( __FILE__ ) ) );
	
	if (strpos ( $pluginurl, '?' ) !== false) 
	{
    	$pluginurl = $pluginurl . "&";
	} 
	else
	{
		$pluginurl = $pluginurl . "?";
	}

/************************************** CRETAE A NEW CHANNEL FOR NEW USER*****************************************************/
	
	if ($current_user->ID) 
	{
		if (!isset($_SESSION['your_current_channel']))
		{
			$data = $wpdb->get_row ( "SELECT * FROM $channel_table_name WHERE userid=" . $current_user->ID );
			if ($data)
			{
				$_SESSION ['your_current_channel'] = $data->channel_id;
			} 
			else 
			{		   
			    $user_icon_src = "http://www.gravatar.com/avatar/" . md5 ( strtolower ( $current_user->user_email ) ) . "?d=" . urlencode ( $default ) . "&s=40";			
				
			    $getxxx = $wpdb->get_row("SELECT COUNT(*) AS count FROM $channel_table_name");
			    if($getxxx->count < 10)
			    {
    				$wpdb->insert ( $channel_table_name, array (
    				        				        
    						'userid' => $current_user->ID,
    						'channel_name' => $current_user->display_name,
    						'channel_banner' => $img_folder_path . 'banner.jpg',
    						'channel_icon' => $user_icon_src,
    						'channel_category' => 'others',
    				        'channel_view' => 0,
    				        'channel_subscribers' =>0,
    				        'Description'=>'',
    				        'datetime' =>date ( 'Y-m-d H:i:s')
    				),array('%d','%s','%s','%s','%s','%d','%d','%s','%s') );
    				
    				$channelid = $wpdb->insert_id;
    				$_SESSION ['your_current_channel'] = $channelid;
    				$wpdb->insert($addchannel_table_name,array(
    				        'userid'      => $current_user->ID,
    				        'channelid'   => $channelid,
    				        'channelname' =>'Featured Channels'
    				),array('%d','%d','%s'));
    				
    				$wpdb->insert($channeltags_table_name,array(
    				        'userid'      => $current_user->ID,
    				        'channelid'   => $channelid,
    				        'Tags'        =>''
    				),array('%d','%d','%s'));
			    }
			    else
			    {
			        echo '<script>alert("You have to upgrade for adding more channels..!")</script>';
			    }
				
			}
		}
	} 
	else 
	{
		if (isset ( $_SESSION ['your_current_channel'] ))
		{
			unset ( $_SESSION ['your_current_channel'] );
		}
	}


	
	$get_user_channel_id   = $_SESSION ['your_current_channel'];
	$get_user_info         = $wpdb->get_row ( $wpdb->prepare("SELECT * FROM $channel_table_name WHERE channel_id=%d",$get_user_channel_id ));

    	if (filter_var ( $get_user_info->channel_icon, FILTER_VALIDATE_EMAIL )) 
    	{
    		$user_icon_src = "http://www.gravatar.com/avatar/" . md5 ( strtolower ( $get_user_info->channel_icon ) ) . "?d=" . urlencode ( $default ) . "&s=40";
    	} 
    	else 
    	{
    		$user_icon_src = $get_user_info->channel_icon;
    	}
  	
    	if(isset($_POST['comment_message']))
    	{
    	    $msg       = $_POST['comment_message'];
    	    $name      = $_POST['comment_name'];
    	    $icon      = $_POST['comment_image'];
    	    $channel   = $_SESSION['your_current_channel'];
    	    $dtime     = date ( 'Y-m-d H:i:s' );
    	    
    	    $wpdb->insert ( $channel_chating_table, array (
    	    
    	            'userid'          => $current_user->ID,
    	            'channelid'       => $_POST['channel_id_comment'],
    	            'user_channel_id' => $_SESSION ['your_current_channel'],
    	            'message'         => $msg,
    	            'channel_icon'    => $icon,
    	            'channel_name'    => $name,
    	            'like'            => 0,
    	            'dislike'         => 0,
    	            'message_time'    => $dtime  	    
    	    ),array('%d','%d','%d','%s','%s','%s','%d','%d','%s'));
    	    
    	    
    	}
    	
    	if(isset($_POST['editplaylist']))
    	{
    	    
    	    $wpdb->update($playlisttitle_table_name,array(
    	            'playlistname' =>$_POST['editplaylist']
    	    ),array('channelid'    => $_SESSION ['your_current_channel']),array('%s'),array('%d'));
    	    
    	}
    	
    	
    	if(isset($_POST['remove_channel']))
    	{
    	   $r_id =  $_POST['remove_channel']; 	    
    	   $wpdb->query($wpdb->prepare('DELETE FROM '. $addchannellist_table_name.'  WHERE add_channelid =%d AND channelid = %d',$r_id,$_SESSION ['your_current_channel']));
    	}
    	
       if(isset($_POST['mys_channel']))
        {
            $getid = explode('channel=',$_POST['mys_channel']);
            $getid = intval($getid[1]);
    
            $get_add_ch_info = $wpdb->get_row($wpdb->prepare("SELECT * FROM $channel_table_name WHERE channel_id=%d",$getid));
            $get_check_info = $wpdb->get_row($wpdb->prepare("SELECT * FROM $addchannellist_table_name WHERE add_channelid=%d",$getid));
            
            if(!$get_add_ch_info){
                echo '`error3';
                exit;
            }
            else {
                if($getid == intval($_SESSION ['your_current_channel']))
                {
                    echo '`error1`';
                }
                else if($get_check_info)
                {
                    echo '`error2`';
                }
                else{
                    
                    $wpdb->insert ( $addchannellist_table_name, array (
                    
                            'userid'        => $current_user->ID,
                            'channelid'     => $_SESSION ['your_current_channel'],
                            'channelurl'    => $_POST['mys_channel'],
                            'add_channelid' => $getid,
                            'channelname'   => $get_add_ch_info->channel_name,
                            'channelthumb'  => $get_add_ch_info ->channel_icon
                    
                    ),array('%d','%d','%s','%d','%s','%s'));
                    echo '`' . $get_add_ch_info->channel_name . '`' . $get_add_ch_info->channel_icon . '`' .$getid;
                    
                }
                exit;
                
            }
        }
    	
	if(isset($_POST['channel_decr']))
	{
	    $wpdb->update($channel_table_name,array(
	            'Description' =>$_POST['channel_decr']
	    ),array('channel_id'=> $_SESSION ['your_current_channel'],'userid'=> $current_user->ID),array('%s'),array('%d','%d'));
	}
	
	if(isset($_POST['add_channel']))
	{
	    $wpdb->update($addchannel_table_name,array('channelname' =>$_POST['add_channel']),array('channelid'=> $_SESSION ['your_current_channel']),array('%s'),array('%d'));
	}
	
	

	/**************************************SEARCH VIDEO RESULT*********************************************************/
	
	if(isset($_GET['browse_channels']))
	{
	    require_once 'search.php';
	    require_once 'browse_channel.php';
	    $topmenu .= $browse_channel;
	    return $topmenu;
	}	
	
	if (isset ( $_GET ['search_video'] ))
	{
	    require_once 'search.php';   
        require_once 'search_video.php';
        $topmenu .= $embed;
		return $topmenu;
	}

	
	/**************************************VIDEO HOME PAGE *********************************************************/
	
	if (isset ($_GET['v']))
	{	    
	    require_once 'watch.php';			
	    return $watch_palyer;
	}	

	if(isset($_GET['playlist']) && isset($_GET['watchlater']))
	{
	    require_once 'watchlater.php';
	    require_once 'search.php';
	    $topmenu .= $watchlater;
	    return $topmenu;
	
	}	
	
	if(isset($_GET['playlist']))
	{
	   require_once 'search.php';
	   require_once 'playlist.php';
	   $topmenu .=$playlist;
	   return $topmenu;
	}

	if ($_POST['your_channels'])
	{
		$_SESSION ['your_current_channel'] = $_POST ['your_channels'];
	}
	
	if ($current_user->ID && $_SESSION['your_current_channel'] != '')
	{	     
	    if(isset($_GET['watch_history']))
	    {
	        require_once 'watch_history.php';
	        require_once 'search.php';
	        $topmenu .= $watch_history;
	        return $topmenu;
	    }
	    
	    if(isset($_GET['analytics']))
	    {
	        require_once 'analytics.php';
	        require_once 'search.php';
	        $topmenu .= $analytics;
	        return $topmenu;
	    }
	    
	    if(isset($_GET['subscription_manager']))
	    {
	        require_once 'managesubscriptions.php';
	        require_once 'search.php';
	        $topmenu .= $managesubscr;
	        return $topmenu;	        
	    }        
	    
	    if(isset($_GET['mysubscriptions']))
        {
            require_once 'mysubscriptions.php';
            return $mysubscrptions;            
        }
             
        $get_settings = $wpdb->get_row("SELECT * FROM $settings_table_name");
        if($get_settings->show_uploadbtn == "yes")
        {
            if (isset($_GET['upload'])) 
            {                
                require_once 'newvideo.php';
                require_once 'search.php';
                $topmenu .= $channel_view;
                return $topmenu;
            }
            
            if (isset($_GET['new']))
            {
            	require_once 'newchannel.php';
            	return $channel_view;
            }
        }
        
        if (isset($_GET['video_edit'])) 
        {
            require_once 'video_edit.php';
            return $channel_view;
        }
        
        if(isset($_GET['playlistlv']))
        {
            require_once 'likedvideos.php';
            require_once 'search.php';
            $topmenu .= $likedvideos;
            return $topmenu;
        }
              
        if (isset($_GET['uploads'])) 
        {            
           	require_once 'uploads.php';
            require_once 'search.php';
            $topmenu .= $channel_view;
            return $topmenu;
            
        }
                
        if (isset($_GET['channel_switcher'])) 
        {
            require_once 'channel_switcher.php';
            require_once 'search.php';
            $topmenu .= $channel_view;
            return $topmenu;
        }
        
        if (isset($_GET['videomanager']))
        {
            require_once 'videomanager.php';
            require_once 'search.php';
            $topmenu .= $channel;
            return $topmenu;
        }     
        
        if (isset($_GET['channel'])) {            
            $get_user_info = $wpdb->get_row($wpdb->prepare("SELECT * FROM $channel_table_name WHERE userid=%d AND channel_id=%d",$current_user->ID,$_GET['channel']));
            if($get_user_info)
            {
                $_SESSION['your_current_channel'] = intval($_GET['channel']);        
            }
                         
            require_once 'mychannel.php';
            return $homechannel;
        }
        
        require_once 'home_login.php';
        return $channel_view;
        
    }
    else
    {                   
        if (isset($_GET['channel']))
        {
            require_once 'mychannel.php';
            return $homechannel;
        }
                      
        require_once 'home_logout.php';
        require_once 'search.php';
        $topmenu .= $channel_view;
        return $topmenu;
    }

}

function hdwtube_player_ajax() {

	global $wpdb;

	global $current_user;
	get_currentuserinfo ();
	$siteurl                   = get_option ( 'siteurl' );
	
	define ( 'SITE_ROOT', realpath ( dirname ( __FILE__ ) ) );
	
	$subscribtion_table_name   = $wpdb->prefix . "youtube_subscriptions";
	$playlisttitle_table_name  = $wpdb->prefix . "youtube_playlistname";
	$playlist_table_name       = $wpdb->prefix . "youtube_playlist";
	$channel_table_name        = $wpdb->prefix . "youtube_channel";
	$likedislike_table_name    = $wpdb->prefix . "youtube_likevideo";
	$comment_table_name        = $wpdb->prefix . "youtube_comments";
	$watchlater_table_name     = $wpdb->prefix . "youtube_watchlater";
	$video_table_name          = $wpdb->prefix . "youtube_video";
	$watchhistory_table_name   = $wpdb->prefix . "youtube_watchhistory";
	$likedplaylist_table_name  = $wpdb->prefix . "youtube_likedplaylist";
	$iconbanner_table_name     = $wpdb->prefix . "youtube_iconbanner";
	$addchannel_table_name     = $wpdb->prefix . "youtube_add_channel";
	$channeltags_table_name    = $wpdb->prefix . "youtube_channeltags";
	$settings_table_name       = $wpdb->prefix . "youtube_settings";
	$report_table_name         = $wpdb->prefix . "youtube_report";
	
	$img_folder_path           = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/image/';
	$vid_folder_path           = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/video/';
	$thump_folder_path         = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/thumpnail/';
	$icon_folder_path          = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/icon/';
	$banner_folder_path        = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/banner/';
	
	
	
	if(isset($_POST['commentbyvideo']) && isset($_POST['commentmessage']))
	{
	    $get_channel_info = $wpdb->get_row($wpdb->prepare("SELECT * FROM $channel_table_name WHERE userid=%d AND channel_id=%d",$current_user->ID,$_SESSION['your_current_channel']));    
	    $wpdb->insert($comment_table_name,array(
	            
	            'video_id'         =>  $_POST['commentbyvideo'],
	            'user_id'           =>  $current_user->ID,
	            'channel_id'       =>  $_SESSION['your_current_channel'],
	            'message'          =>  $_POST['commentmessage'],
	            'channel_icon'     =>  $get_channel_info->channel_icon,
	            'channel_name'     =>  $get_channel_info->channel_name,
	            'comments_time'    =>  date ( 'Y-m-d H:i:s')          
	    ),array('%d','%d','%d','%s','%s','%s','%s'));
	}
	
	if(isset($_POST['removewatchlistvideo']))
	{
	    $wpdb->delete($watchlater_table_name,array(
	             
	            'videoid'          =>  $_POST['removewatchlistvideo'],
	            'userid'           =>  $current_user->ID,
	            'channelid'        =>  $_SESSION['your_current_channel']
	    ),array('%d','%d','%d'));
	}
	
	
	if(isset($_POST[watchlaterconfig]))
	{
	    $ids = explode('`', $_POST['watchlaterconfig']);
	  
	    for ($i=1; $i<count($ids); $i++){

	        $checkthis = $wpdb->get_row($wpdb->prepare("SELECT * FROM $watchlater_table_name WHERE videoid=%d AND userid=%d AND channelid=%d",$ids[$i],$current_user->ID,$_SESSION['your_current_channel']));
	         
	        if(!$checkthis)
	        {
	           
	            $wpdb->insert($watchlater_table_name,array(
	                     
	                    'videoid'          =>  $ids[$i],
	                    'userid'           =>  $current_user->ID,
	                    'channelid'        =>  $_SESSION['your_current_channel']
	            ),array('%d','%d','%d'));
	           
	       }
	    }
	}
	
	
	if(isset($_POST['watchlater']))
	{
	    $checkthis = $wpdb->get_row($wpdb->prepare("SELECT * FROM $watchlater_table_name WHERE videoid=%d AND userid=%d AND channelid=%d",$_POST['watchlater'],$current_user->ID,$_SESSION['your_current_channel']));
	    
	    if($checkthis)
	    {
	        $wpdb->delete($watchlater_table_name,array(
	                'videoid'          =>  $_POST['watchlater'],
	                'userid'           =>  $current_user->ID,
	                'channelid'        =>  $_SESSION['your_current_channel']
	        ),array('%d','%d','%d'));
	        echo "delete";
	        exit;
	    }
	    else 
	    {
    	    $wpdb->insert($watchlater_table_name,array(   
    	                      
    	            'videoid'          =>  $_POST['watchlater'],
    	            'userid'           =>  $current_user->ID,
    	            'channelid'        =>  $_SESSION['your_current_channel']          
    	    ),array('%d','%d','%d'));
    	    echo "success";
    	    exit;
	    }
	    
	}
	
	if(isset($_POST['unsubscribechannel']))
	{
	   $wpdb->delete($subscribtion_table_name,array('channel_id' =>$_SESSION['your_current_channel'],'subsc_channel_id'=>$_POST['unsubscribechannel']),array('%d','%d')); 
	}
	
	if (isset($_POST['channel_name']) && isset($_POST['mychannel_category']))
	{
	
	    $getxxx = $wpdb->get_results("SELECT * FROM $channel_table_name");
	    if(count($getxxx) < 10)
	    {
        	    $wpdb->insert($channel_table_name,array(
        	    	'userid'               =>$current_user->ID,
        	        'channel_name'         =>$_POST['channel_name'],
        	        'channel_banner'       => $img_folder_path . 'default_banner.jpg',
        	        'channel_icon'         =>  $img_folder_path . 'default_icon.png',
        	        'channel_category'     => $_POST['mychannel_category'],
        	        'channel_view'         =>0,
        	        'channel_subscribers'  =>0,
        	        'Description'          =>'',    
        	        'datetime'             => date ( 'Y-m-d H:i:s')       
        	    ),array('%d','%s','%s','%s','%s','%d','%d','%s','%s'));
        	    echo $wpdb->insert_id;
        	    
        	    $wpdb->insert($addchannel_table_name,array(
        	            'userid'      => $current_user->ID,
        	            'channelid'   => $wpdb->insert_id,
        	            'channelname' =>'Featured Channels'
        	    ),array('%d','%d','%s'));
        	    
        	    $wpdb->insert($channeltags_table_name,array(
        	            'userid'      => $current_user->ID,
        	            'channelid'   => $wpdb->insert_id,
        	            'Tags'        =>''
        	    ),array('%d','%d','%s'));
	    
	    }
	    else
	    {
	        echo '<script>alert("You have to upgrade for adding more channels..!")</script>';
	    }
	    
	    exit;    
	}
	
	
	
	if(isset($_POST['addplaylistvideo'])){
	     
	    
	
	    $wpdb->insert($playlist_table_name,array(
	
	            'userid' =>$current_user->ID,
	            'channelid' => $_SESSION['your_current_channel'],
	            'playlistid'=>$_POST['playlistid'],
	            'videoid' => $_POST['addplaylistvideo']
	    ),array('%d','%d','%d','%d'));
	
	}
	
	if(isset($_POST['videolike']))
	{
	   $checkthis = $wpdb->get_row($wpdb->prepare("SELECT * FROM $likedislike_table_name WHERE userid=%d AND channelid=%d AND lk_dlk_videoid=%d AND lk_dlk_channelid=%d",$current_user->ID,$_SESSION['your_current_channel'],$_POST['videolike'],$_POST['videochannelid']));
	   if($checkthis) 
	   {
	       if($checkthis->status == 1)
	       {
	            $wpdb->delete($likedislike_table_name,array(                          
	                    'userid'           =>$current_user->ID,
	                    'channelid'        => $_SESSION['your_current_channel'],
	                    'lk_dlk_videoid'   =>$_POST['videolike'],
	                    'lk_dlk_channelid' =>$_POST['videochannelid']               
	            ),array('%d','%d','%d','%d'));
	            echo "delete";
	            exit;            
	       }
	       else
	       {
	           $wpdb->update($likedislike_table_name,array('status' => 1),array(
	                   'userid'           =>$current_user->ID,
	                   'channelid'        => $_SESSION['your_current_channel'],
	                   'lk_dlk_videoid'   =>$_POST['videolike'],
	                   'lk_dlk_channelid' =>$_POST['videochannelid']
	           ),array('%d'),array('%d','%d','%d','%d'));
	           echo "1";
	           exit;
	       }
	      
	   }
	   else 
	   {
	       $wpdb->insert($likedislike_table_name,array(
	               'userid'=>$current_user->ID,
	               'channelid' => $_SESSION['your_current_channel'],
	               'lk_dlk_videoid'=>$_POST['videolike'],
	               'lk_dlk_channelid' =>$_POST['videochannelid'],
	               'status' =>'1',
	               'currentime' =>date ( 'Y-m-d H:i:s')
	       ),array('%d','%d','%d','%d','%d','%s'));
	       
	       echo "1";
	       exit;
	   }
	   
	}
	
	if(isset($_POST['videodislike']))
	{
	    $checkthis = $wpdb->get_row($wpdb->prepare("SELECT * FROM $likedislike_table_name WHERE userid=%d AND channelid=%d AND lk_dlk_videoid=%d AND lk_dlk_channelid=%d",$current_user->ID,$_SESSION['your_current_channel'],$_POST['videodislike'],$_POST['videochannelid']));
	    if($checkthis)
	    {
	        if($checkthis->status == 0)
	        {
	            $wpdb->delete($likedislike_table_name,array(
	                    'userid'           =>$current_user->ID,
	                    'channelid'        => $_SESSION['your_current_channel'],
	                    'lk_dlk_videoid'   =>$_POST['videodislike'],
	                    'lk_dlk_channelid' =>$_POST['videochannelid']
	            ),array('%d','%d','%d','%d'));
	            echo "delete";
	            exit;
	        }
	        else 
	        {
	            $wpdb->update($likedislike_table_name,array('status' => 0),array(
	                    'userid'           =>$current_user->ID,
	                    'channelid'        => $_SESSION['your_current_channel'],
	                    'lk_dlk_videoid'   =>$_POST['videodislike'],
	                    'lk_dlk_channelid' =>$_POST['videochannelid']
	            ),array('%d'),array('%d','%d','%d','%d'));
	            echo "0";
	            exit;
	        }
	         
	    }
	    else
	    {
	        $wpdb->insert($likedislike_table_name,array(
	                'userid'=>$current_user->ID,
	                'channelid' => $_SESSION['your_current_channel'],
	                'lk_dlk_videoid'=>$_POST['videodislike'],
	                'lk_dlk_channelid' =>$_POST['videochannelid'],
	                'status' =>'0',
	                'currentime' =>date ( 'Y-m-d H:i:s')
	        ),array('%d','%d','%d','%d','%d','%s'));
	
	        echo "0";
	        exit;
	    }
	
	}
	
	if(isset($_POST['addvideotoplaylist']) && isset($_POST['playlistvideoid']))
	{
	   
	    
	    $checkthis = $wpdb->get_row($wpdb->prepare("SELECT * FROM $playlist_table_name WHERE userid=%d AND channelid=%d AND playlistid=%d AND videoid=%d",$current_user->ID,$_SESSION['your_current_channel'],$_POST['addvideotoplaylist'],$_POST['playlistvideoid']));
	    if($checkthis)
	    {
	        $wpdb->delete($playlist_table_name,array(
	                'userid' =>$current_user->ID,
	                'channelid' => $_SESSION['your_current_channel'],
	                'playlistid'=>$_POST['addvideotoplaylist'],
	                'videoid' => $_POST['playlistvideoid']
	        ),array('%d','%d','%d','%d'));
	        echo -1 . '`' . $_POST['addvideotoplaylist'] ;
	        exit;
	    }
	    else
	    {
	        $wpdb->insert($playlist_table_name,array(
	    
	            'userid' =>$current_user->ID,
	            'channelid' => $_SESSION['your_current_channel'],
	            'playlistid'=>$_POST['addvideotoplaylist'],
	            'videoid' => $_POST['playlistvideoid']
	        ),array('%d','%d','%d','%d'));
	        echo 1 . '`' . $_POST['addvideotoplaylist'] ;
	        exit;
	    }
	    
	}
	

	if(isset($_POST['addplaylist']))
	{
	
	    $wpdb->insert ($playlisttitle_table_name, array (
	            'userid'       =>$current_user->ID,
	            'channelid'    =>$_SESSION['your_current_channel'],
	            'playlistname' =>$_POST['addplaylist'],
	            'thumbnail'    =>$img_folder_path.'no_thumbnail.png',
	            'description'  =>'',
	            'pdate'        =>date ( 'Y-m-d H:i:s')
	
	    ),array('%d','%d','%s','%s','%s','%s'));
	    echo $wpdb->insert_id;
	    exit;
	}
	
	if(isset($_POST['removeplaylistvideo']) && isset($_POST['playlistid'])){    
	    $wpdb->query($wpdb->prepare("DELETE FROM $playlist_table_name WHERE videoid=%d AND playlistid=%d",$_POST['removeplaylistvideo'],$_POST['playlistid']));
	}
	
	if(isset($_POST['changeicon'])){
	    	
	    $wpdb->update($channel_table_name,array(
	            'channel_icon' =>$_POST['changeicon']
	    ),array('channel_id'=> $_SESSION['your_current_channel']),array('%s'),array('%d'));    
	}
	
	if(isset($_POST['changebanner'])){
	
	    $wpdb->update($channel_table_name,array(
	            'channel_banner' =>$_POST['changebanner']
	    ),array('channel_id'=> $_SESSION['your_current_channel']),array('%s'),array('%d'));
	}
    
	if(isset($_POST['editplaylistdescr']) && isset($_POST['playlistid']))
	{
	    $wpdb->update($playlisttitle_table_name,array(
	            'description' =>$_POST['editplaylistdescr']
	    ),array('id'=> $_POST['playlistid']),array('%s'),array('%d'));
	}


	if(isset($_POST['subscribechannel']) && isset($_POST['subsc_channel_name']))
	{
	    $check = $wpdb->get_row($wpdb->prepare("SELECT * FROM $subscribtion_table_name WHERE channel_id=%d AND subsc_channel_id=%d",$_SESSION['your_current_channel'],$_POST['subscribechannel']));
	    if($check)
	    {
	        echo 'Error1';
	        exit;
	    }else{
	    $subsarray = array (
	             
	            'user_id' => $current_user->ID,
	            'channel_id' =>$_SESSION['your_current_channel'],
	            'subsc_channel_id' => $_POST['subscribechannel'],
	            'subsc_channel_name' => $_POST ['subsc_channel_name'],
	            'current_time' =>date ( 'Y-m-d H:i:s')
	    );
	    $wpdb->insert ( $subscribtion_table_name, $subsarray ,array('%d','%d','%d','%s','%s'));
	    }
	     
	}
	
	if(isset($_POST['configchannel']) && isset($_POST['unsubchannel'])){
	    $ids = explode('`', $_POST['configchannel']);
	    for ($i=1; $i<count($ids); $i++){
	    
	        $wpdb->delete($subscribtion_table_name,array(
	        
	                'subsc_channel_id'  =>  $ids[$i],
	                'user_id'           =>  $current_user->ID,
	                'channel_id'        =>  $_SESSION['your_current_channel']
	        ),array('%d','%d','%d'));
	    }
	    
	}
	
	if(isset($_POST['configvideo']) && isset($_POST['action'])){
	    
	    $ids = explode('`', $_POST['configvideo']);
	    $action = $_POST['action'];
	    for ($i=1; $i<count($ids); $i++){
	        if ($action == 'public') {
	            
	        	$wpdb->update($video_table_name,array('video_status' =>0),array(
	             
    	            'video_id'          =>  $ids[$i],
    	            'user_id'           =>  $current_user->ID,
    	            'channel_id'        =>  $_SESSION['your_current_channel']
	             ),array('%d'),array('%d','%d','%d'));
	        	
	        	
	        }else if ($action == 'private') {
	            
    	        	$wpdb->update($video_table_name,array( 'video_status' =>1 ),array(
    	             
    	            'video_id'          =>  $ids[$i],
    	            'user_id'           =>  $current_user->ID,
    	            'channel_id'        =>  $_SESSION['your_current_channel']
	            ),array('%d'),array('%d','%d','%d'));
	        	
	        	
	        }else{
	            
	            $wpdb->delete($video_table_name,array(
	             
    	            'video_id'         =>  $ids[$i],
    	            'user_id'           =>  $current_user->ID,
    	            'channel_id'        =>  $_SESSION['your_current_channel']
	             ),array('%d','%d','%d'));
	        }
	       
	    }
	    exit;
	}
	
	if(isset($_POST['addvideotags']) && isset($_POST['addtagvideoid']))
	{
	    $ids = explode('`', $_POST['addtagvideoid']);
	   
	    for ($i=1; $i<count($ids); $i++)
	    {
    	    $gettags = $wpdb->get_row($wpdb->prepare("SELECT * FROM $video_table_name WHERE user_id=%d AND channel_id=%d AND video_id=%d",$current_user->ID,$_SESSION['your_current_channel'],$ids[$i]));      	    
    	    $tags = $gettags->video_tags.','.$_POST['addvideotags'];
    	    $wpdb->update($video_table_name,array( 'video_tags' => $tags),array(
    	    
    	            'video_id'          =>  $ids[$i],
    	            'user_id'           =>  $current_user->ID,
    	            'channel_id'        =>  $_SESSION['your_current_channel']
    	    ),array('%s'),array('%d','%d','%d'));
	    }
	    
	}
	
	if(isset($_POST['ychannel_unsubscribe']))
	{
	    $wpdb->delete($subscribtion_table_name,array(
	             
	            'subsc_channel_id'  =>  $_POST['ychannel_unsubscribe'],
	            'user_id'           =>  $current_user->ID,
	            'channel_id'        =>  $_SESSION['your_current_channel']
	    ),array('%d','%d','%d'));
	}
	
	if(isset($_POST['mngrplaylistadd']) && isset($_POST['mngrvideoid']))
	{
	    $ids = explode('`', $_POST['mngrvideoid']);
	    for ($i=1; $i<count($ids); $i++)
	    {
	       $checkthis = $wpdb->get_row($wpdb->prepare("SELECT * FROM $playlist_table_name WHERE userid=%d AND channelid=%d AND playlistid=%d AND videoid=%d",$current_user->ID,$_SESSION['your_current_channel'],$_POST['mngrplaylistadd'],$ids[$i]));
	    
	       if(!$checkthis)
	       {
	           $wpdb->insert($playlist_table_name,array(
	                    
	                   'userid'    =>$current_user->ID,
	                   'channelid' => $_SESSION['your_current_channel'],
	                   'playlistid'=>$_POST['mngrplaylistadd'],
	                   'videoid'   => $ids[$i]
	           ),array('%d','%d','%d','%d'));
	       }
	    
	    }
	}
	
	if(isset($_POST['sendemailaddr']) && isset($_POST['sendemailmess']))
	{
	    $to      = $_POST['sendemailaddr'];
	    $subject = $current_user->user_login.' sent you a Video OR Playlist';
	    $message = $_POST['sendemailmess'];
	    mail($to, $subject, $message);
	    
	    echo 1;
	    exit;
	}
	
	if(isset($_GET['analytics_view_chart'])){
		require_once(dirname ( __FILE__ ) . '/mygraph/analytics_views.php');
	}
	
	if(isset($_GET['analytics_subscriptions_chart'])){
	    require_once(dirname ( __FILE__ ) . '/mygraph/analytics_subscription.php');
	}
	
	if(isset($_GET['analytics_likes_chart'])){
	    require_once(dirname ( __FILE__ ) . '/mygraph/analytics_likes.php');
	}
	
	if(isset($_GET['analytics_dislikes_chart'])){
	    require_once(dirname ( __FILE__ ) . '/mygraph/analytics_dislikes.php');
	}
	
	if(isset($_GET['analytics_comments_chart'])){
	    require_once(dirname ( __FILE__ ) . '/mygraph/analytics_comments.php');
	}

	if (isset ($_FILES ["video_upload_file"] ))
    {
        $v_ext = end(explode(".", $_FILES["video_upload_file"]["name"]));
        $extention = array('flv','mp4','3g2','3gp','aac','f4b','f4p','f4v','m4a','m4v','mov');
        if(in_array($v_ext, $extention)){	        
	        $vi_up = hdw_tube_general_upload($_FILES["video_upload_file"],'vid_');
	        if($vi_up == false){
	        	$_POST['error'] = 1;
	        }else{
	        	$video = $vi_up;
	        	$thump = $img_folder_path."Default_upload_thumpnail.png";
	        }
		        
		    unset ( $_POST ['channel_name'], $_POST ['channel_category'], $_POST ['submit'] );
		     
		    $_POST ['video_title']        = pathinfo($_FILES ["video_upload_file"] ["name"], PATHINFO_FILENAME);
		    $_POST ['video_description']  = "";
		    $_POST ['video_tags']         = "";
		    $_POST ['video_category']     = "";
		    $_POST ['user_id']            = $current_user->ID;
		    $_POST ['channel_id']         = $_SESSION ['your_current_channel'];
		    $_POST ['video_url']          = $video;
		    $_POST ['video_type']          ="video";
		    $_POST ['video_like']         = 0;
		    $_POST ['video_dislike']      = 0;
		    $_POST ['video_view']         = 0;
		    $_POST ['video_status']       = 0;
		    $_POST ['video_upload_time']  = date('Y-m-d H:i:s');
		    $_POST ['video_thumpnails']   = $thump;
		    
		    $getxxx = $wpdb->get_results("SELECT * FROM $video_table_name");
		    if(count($getxxx) < 50)
		    {
	    	    $wpdb->insert ( $video_table_name, $_POST, array("%s","%s","%s","%s","%d","%d","%s","%s","%d","%d","%d","%d","%s","%s") );
	    	    $lastvideoid = $wpdb->insert_id;
	    	    echo $lastvideoid;
		    }
		    else
		    {
		        echo '<script>alert("You have to upgrade for adding more channels..!")</script>';
		    }
		    exit;   
        } else {
            echo 'err';
            exit;
        }
	}
	
	if(isset($_POST['after_upload_video_title']))
	{
	     
	   $title       = $_POST['after_upload_video_title'];
	   $description = $_POST['after_upload_video_description'];
	   $tags        = $_POST['after_upload_video_tags'];
	   $privacy     = $_POST['after_upload_video_privacy'];
	   $category    = $_POST['after_upload_video_category'];
	   $videoid     = $_POST['after_upload_video_id'];
	   $thumbnail 	= $_POST['after_upload_video_thumb'];
	      
	   $wpdb->update($video_table_name,array(
	           'video_title'       => $title,
	           'video_description' => $description,
	           'video_tags'        => $tags,
	           'video_category'    => $category,
	           'video_status'      => $privacy,
	   		   'video_thumpnails'  => $thumbnail
	   
	   ),array(
	           	
	           'video_id'          =>  $videoid,
	           'user_id'           =>  $current_user->ID,
	           'channel_id'        =>  $_SESSION['your_current_channel']
	   ),array('%s','%s','%s','%s','%s','%s'),array('%d','%d','%d'));
	}
	
	if(isset($_FILES['upload_channel_icon']))
	{
	   $randid = $current_user->ID.$_SESSION['your_current_channel'] .rand();	   
	   $ext = end(explode(".", $_FILES["upload_channel_icon"]["name"]));
	   if($_POST['status'] == 0)
	   {	   	
		   	$upicon = hdw_tube_general_upload($_FILES["upload_channel_icon"],'ico_');
		   	if($upicon == false){
		   		$_POST['error'] = 1;
		   	}else{
		   		$icon = $upicon;
		   	}
	       //move_uploaded_file($_FILES["upload_channel_icon"]["tmp_name"],SITE_ROOT . "\\icon\\icon" . $randid .'.'.$ext);
	   }
	   else 
	   {
		   	$upicon = hdw_tube_general_upload($_FILES["upload_channel_icon"],'ban_');
		   	if($upicon == false){
		   		$_POST['error'] = 1;
		   	}else{
		   		$icon = $upicon;
		   	}
		//	move_uploaded_file($_FILES["upload_channel_icon"]["tmp_name"],SITE_ROOT . "\\banner\\banner" . $randid .'.'.$ext);
	      // $icon = $banner_folder_path."banner". $randid .'.'.$ext;
	   }
	   
	   $subsarray = array (
	            
	           'userid'    => $current_user->ID,
	           'channelid' => $_SESSION['your_current_channel'],
	           'imageurl'  => $icon,
	           'status'    => $_POST['status']
	   );
	   $wpdb->insert ( $iconbanner_table_name, $subsarray ,array('%d','%d','%s','%s'));
	   
	   echo $icon;
	   exit;
	   
	}
	
	if(isset($_POST['new_upload_video_title']) && isset($_POST['new_upload_video_url']) )
	{
	   
	    $title    = $_POST['new_upload_video_title'];
	    $url      = $_POST['new_upload_video_url'];
	    $type     = $_POST['new_video_upload_type'];
	    $thumb    = $_POST['new_upload_video_thumb'];
	    $streamer = $_POST['new_upload_video_streamer'];
	    
	    if($type == 'vimeo')
	    {
	        $vimeo_id  = substr(parse_url($url, PHP_URL_PATH), 1);
	        $hash      = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$vimeo_id.php"));
	        $thumb     = $hash[0]['thumbnail_medium'];
	    }
	    elseif($type =='dailymotion')
	    {
	        $thumb     = str_replace("http://www.dailymotion.com/video/","http://www.dailymotion.com/thumbnail/video/",$url);
	    }
	    
	         
	    $subsarray = array (            
	            'user_id' => $current_user->ID,        
	            'channel_id' => $_SESSION ['your_current_channel'],           
	            'video_title' => $title,            
	            'video_url' => $url,             
	            'video_type' =>$type,             
	            'video_description' => '',     
	            'video_tags' =>'',   
	            'video_thumpnails' => $thumb,        
	            'video_category' => 'others',             
	            'video_like' => '0',         
	            'video_dislike' => '0',        
	            'video_view' => '0',        
	            'video_status' =>'0',   
	            'video_upload_time'=> date ( 'Y-m-d H:i:s' )             
	    );
	     
	    $wpdb->insert ( $video_table_name, $subsarray, array('%d','%d','%s','%s','%s','%s','%s','%s','%s','%d','%d','%d','%d','%s'));
	    $lastvideoid = $wpdb->insert_id;
	    
	    echo $lastvideoid;
	    exit;
	}
	
	if(isset($_POST['deletewatchlater']))
	{
	    $wpdb->delete($watchlater_table_name,array(
	            'channelid' => $_POST['deletewatchlater']
	    	
	    ),array('%d'));
	}
	
	if(isset($_POST['reportvideo']))
	{
	    $subsarray = array (
	    	    'userid'  => $current_user->ID,
	            'videoid' => $_POST['rvid'],
	            'reason'  => $_POST['rissue'],
	            'message' => $_POST['reportvideo'],
	            'date' => date ( 'Y-m-d H:i:s' )
	    );
	    $wpdb->insert ( $report_table_name, $subsarray ,array('%d','%d','%s','%s','%s'));
	    
	}
	
	if(isset($_POST['clearallwatchhistory']))
	{
	    $wpdb->delete($watchhistory_table_name,array(
	            'u_channelid' => $_SESSION['your_current_channel']
	    
	    ),array('%d'));
	}
	
	if(isset($_POST['removevideofromwatchhistroy']))
	{
	    $ids = explode('`', $_POST['removevideofromwatchhistroy']);
	    for ($i=1; $i<count($ids); $i++){
	        $wpdb->delete($watchhistory_table_name,array(
	                'u_channelid' => $_SESSION['your_current_channel'],
	                'videoid'     => $ids[$i]
	                 
	        ),array('%d','%d'));
	    }
	}
	
	if(isset($_POST['likedplaylist']))
	{
	    $subsarray = array (
	    
	            'userid' => $current_user->ID,
	            'channelid' =>$_SESSION['your_current_channel'],
	            'lk_playlist' => $_POST['likedplaylist'],   
	            'date' =>date ( 'Y-m-d H:i:s')
	    );
	    $wpdb->insert ( $likedplaylist_table_name, $subsarray,array('%d','%d','%d','%s') );
	}
	
	if(isset($_POST['dislikedplaylist']))
	{
	    $wpdb->delete($likedplaylist_table_name,array(
	            'channelid'    => $_SESSION['your_current_channel'],
	            'lk_playlist'  => $_POST['dislikedplaylist']
	    
	    ),array('%d','%d'));
	}
	
	if(isset($_POST['deletemyplaylist']))
	{
	    $playlisttitle_table_name  = $wpdb->prefix . "youtube_playlistname";
	    $playlist_table_name       = $wpdb->prefix . "youtube_playlist";
	    
	    $wpdb->delete($playlisttitle_table_name,array(
	            'channelid'    => $_SESSION['your_current_channel'],
	            'id'           => $_POST['deletemyplaylist']
	             
	    ),array('%d','%d'));
	    
	    $wpdb->delete($playlist_table_name,array(
	            'channelid'    => $_SESSION['your_current_channel'],
	            'playlistid'           => $_POST['deletemyplaylist']
	    
	    ),array('%d','%d'));
	    
	    $wpdb->delete($likedplaylist_table_name,array(
	            'lk_playlist'           => $_POST['deletemyplaylist']	             
	    ),array('%d'));	    
	}
}


add_action ( 'init', 'hdwtube_player_ajax' );

?>