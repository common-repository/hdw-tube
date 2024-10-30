<?phpadd_filter('query_vars','plugin_add_player');function plugin_add_player($vars) {	$vars[] = 'wid';    $vars[] = 'vid';    $vars[] = 'pid';    $vars[] = 'sid';    
    $vars[] = 'embed';    $vars[] = 'lpid';    $vars[] = 'wlid';    $vars[] = 'add_video_ajax';    return $vars;} add_action('template_redirect', 'plugin_player_check');	function plugin_player_check() {		if(get_query_var('wid')){			configXml(get_query_var('wid'));		}else if(get_query_var('pid')){			playlist(get_query_var('pid'));		}else if(get_query_var('lpid')){			lkplaylist(get_query_var('lpid'));		}else if(get_query_var('wlid')){			wlplaylist(get_query_var('wlid'));		}else if(get_query_var('vid')){			videoPlaylist(get_query_var('vid'));		}else if(get_query_var('sid')){			skinXml(get_query_var('sid'));		}else if(get_query_var('embed')){			getPlayer();		}else if(get_query_var('add_video_ajax')){			getVideo();		}  	}		function configXML($id){		if(isset($_GET['view']) && $_GET['view'] == 'config'){			global $wpdb;			$id = encrypt_decrypt('decrypt', $id);			$table_name = $wpdb->prefix."youtube_hdwplayer";			$config  = $wpdb->get_row($wpdb->prepare("SELECT * FROM ".$table_name." WHERE id=%d",trim($id)));			$siteurl = get_option('siteurl');			$br      = "\n";			if(!$config->id){				die('<b><h1>Restricted access</h1></b>');			}			srand ((double) microtime( )*1000000);			$dyn      = rand( );			$value['token'] = $dyn;			$vid = '';			$wpdb->update($table_name, $value, array('id' => $config->id),array('%s'),array('%d'));			if(isset($_GET['vid']) && isset($_GET['pid'])){				$config->playlistid = intval($_GET['pid']);				$vid = "vid=".intval($_GET['vid']);				$config->videoid = 0;			}else if(isset($_GET['vid']) && isset($_GET['lpid'])){				$config->playlistid = intval($_GET['lpid']);				$vid = "vid=".intval($_GET['vid']);				$config->videoid = 0;			}else if(isset($_GET['vid']) && isset($_GET['wlid'])){				$config->playlistid = intval($_GET['wlid']);				$vid = "vid=".intval($_GET['vid']);				$config->videoid = 0;			}else if(isset($_GET['vid']) && $_GET['vid'] != ''){			    $config->videoid = intval($_GET['vid']);			}else if(isset($_GET['pid']) && $_GET['pid'] != ''){			    $config->playlistid = intval($_GET['pid']);			}						header("content-type:text/xml;charset=utf-8");			echo '<?xml version="1.0" encoding="utf-8"?>'.$br;			echo '<config>'.$br;			echo '<skinMode>'.$config->skinmode.'</skinMode>'.$br;			echo '<autoStart>'.castAsBoolean($config->autoplay).'</autoStart>'.$br;			echo '<stretch>'.$config->stretchtype.'</stretch>'.$br;			echo '<buffer>'.$config->buffertime.'</buffer>'.$br;			echo '<volumeLevel>'.$config->volumelevel.'</volumeLevel>'.$br;					if($config->videoid){				echo '<playListXml>'.$siteurl.'/?vid='.$config->videoid.'</playListXml>'.$br;			} else {			    if(isset($_GET['pid'])){				    echo '<playListXml>'.$siteurl.'/?'.$vid.'&amp;pid='.$config->playlistid.'</playListXml>'.$br;			    }			    else if(isset($_GET['lpid'])){			        echo '<playListXml>'.$siteurl.'/?'.$vid.'&amp;lpid='.$config->playlistid.'</playListXml>'.$br;			    }			    else if(isset($_GET['wlid'])){			        echo '<playListXml>'.$siteurl.'/?'.$vid.'&amp;wlid='.$config->playlistid.'</playListXml>'.$br;			    }			    			}			echo '<playListAutoStart>'.castAsBoolean($config->playlistautoplay).'</playListAutoStart>'.$br;			echo '<playListOpen>'.castAsBoolean($config->playlistopen).'</playListOpen>'.$br;			echo '<playListRandom>'.castAsBoolean($config->playlistrandom).'</playListRandom>'.$br;			echo '<token>'.$dyn.'</token>'.$br;			echo '<emailPhp>'.plugins_url().'/' . basename(dirname(__FILE__)) . '/email.php</emailPhp>'.$br;			echo '<controlBar>'.castAsBoolean($config->controlbar).'</controlBar>'.$br;			echo '<playPauseDock>'.castAsBoolean($config->playpause).'</playPauseDock>'.$br;			echo '<progressBar>'.castAsBoolean($config->progressbar).'</progressBar>'.$br;			echo '<timerDock>'.castAsBoolean($config->timer).'</timerDock>'.$br;			echo '<shareDock>'.castAsBoolean($config->share).'</shareDock>'.$br;			echo '<volumeDock>'.castAsBoolean($config->volume).'</volumeDock>'.$br;			echo '<fullScreenDock>'.castAsBoolean($config->fullscreen).'</fullScreenDock>'.$br;			echo '<playDock>'.castAsBoolean($config->playdock).'</playDock>'.$br;			echo '<playList>'.castAsBoolean($config->playlist).'</playList>'.$br;			echo '</config>'.$br;			exit();		}			}		function videoPlaylist($id){		if(isset($_GET['lic']) && checkL($_GET['lic'])){			global $wpdb;					$siteurl = get_option('siteurl');			$br      = "\n";						$config  = $wpdb->get_results($wpdb->prepare("SELECT * FROM ".$wpdb->prefix."youtube_video WHERE video_id=%d",intval($id)));			$item = $config[0];			if(!$item->video_id){				die('<b><h1>Restricted access</h1></b>');			}			header("content-type:text/xml;charset=utf-8");			echo '<?xml version="1.0" encoding="utf-8"?>'.$br;			echo '<playlist>'.$br;					echo '<media>'.$br;			echo '<id>'.$item->video_id.'</id>'.$br;		    if((substr($item->video_type,0,4)) =='rtmp')			{			    echo '<type>rtmp</type>'.$br;			}			else {			    echo '<type>'.$item->video_type.'</type>'.$br;			}			echo '<video>'.$item->video_url.'</video>'.$br;			if((substr($item->video_type,0,4)) =='rtmp')			{			    $streamer = explode('`',$item->video_type);			    echo '<streamer>'.$streamer[1].'</streamer>'.$br;			}			else {			    echo '<streamer>'.$item->streamer.'</streamer>'.$br;			}			echo '<preview>'.$item->video_thumpnails.'</preview>'.$br;			echo '<title>'.$item->video_title.'</title>'.$br;			echo '</media>'.$br.$br;						echo '</playlist>'.$br;			exit();		}	}		function playlist($id){			global $wpdb;					$siteurl = get_option('siteurl');			$br      = "\n";						$vid = ($_GET['vid']       != '') ? $_GET['vid'] : '';			$query = "SELECT * FROM ".$wpdb->prefix."youtube_playlist WHERE playlistid=%d";			$query   .= ($vid       != '') ? ' AND videoid=%d' : '';					$config = $wpdb->get_results($wpdb->prepare($query,intval($id),$vid));			if($vid != ''){				 $result  = $wpdb->get_results($wpdb->prepare("SELECT * FROM ".$wpdb->prefix."youtube_playlist WHERE playlistid=%d AND videoid != %d",intval($id),$vid));				 $config = array_merge((array)$config,(array)$result);			}						$count   = count($config);			if(!$config[0]->id){				die('<b><h1>Restricted access</h1></b>');			}						header("content-type:text/xml;charset=utf-8");			echo '<?xml version="1.0" encoding="utf-8"?>'.$br;			echo '<playlist>'.$br;						for ($i=0, $n=$count; $i < $n; $i++) {			    $item = $wpdb->get_row($wpdb->prepare("SELECT * FROM ".$wpdb->prefix."youtube_video WHERE video_id=%d",$config[$i]->videoid));			  				$br;				echo '<media>'.$br;				echo '<id>'.$item->video_id.'</id>'.$br;				if((substr($item->video_type,0,4)) =='rtmp')				{				echo '<type>rtmp</type>'.$br;				}				else {				    echo '<type>'.$item->video_type.'</type>'.$br;				}				echo '<video>'.$item->video_url.'</video>'.$br;				if($item->hdvideo) {					echo '<hd>'.$item->hdvideo.'</hd>'.$br;				}								if((substr($item->video_type,0,4)) =='rtmp')				{				    $streamer = explode('`',$item->video_type);				    echo '<streamer>'.$streamer[1].'</streamer>'.$br;				}				else {				    echo '<streamer>'.$item->streamer.'</streamer>'.$br;				}								if($item->dvr) {					echo '<dvr>'.$item->dvr.'</dvr>'.$br;				}				echo '<thumb>'.$item->video_thumpnails.'</thumb>'.$br;				if($item->token) {					echo '<token>'.$item->token.'</token>'.$br;				}				echo '<preview>'.$item->video_thumpnails.'</preview>'.$br;				echo '<title>'.$item->video_title.'</title>'.$br;				echo '</media>'.$br.$br;			}					echo '</playlist>'.$br;			exit();	}		function lkplaylist($id){	    	    global $wpdb;	    $siteurl = get_option('siteurl');	    $br      = "\n";        	    $lktablename = $wpdb->prefix . 'youtube_likevideo';	    $vid = ($_GET['vid']       != '') ? $_GET['vid'] : '';	    $query = "SELECT * FROM ".$lktablename." WHERE channelid=%d AND status=1 ";	    $query   .= ($vid       != '') ? ' AND lk_dlk_videoid=%d' : '';	    	    $config = $wpdb->get_results($wpdb->prepare($query,intval($id),intval($vid)));	    	    if($vid != ''){	        $result  = $wpdb->get_results($wpdb->prepare("SELECT * FROM ".$lktablename." WHERE channelid=%d AND status=1 AND lk_dlk_videoid !=%d",intval($id),$vid));	        $config = array_merge((array)$config,(array)$result);	    }		    	  	    $count   = count($config);	    if(!$config[0]->id){	        die('<b><h1>Restricted access</h1></b>');	    }	    		    header("content-type:text/xml;charset=utf-8");	    echo '<?xml version="1.0" encoding="utf-8"?>'.$br;	    echo '<playlist>'.$br;	    		    for ($i=0, $n=$count; $i < $n; $i++) {	        $item = $wpdb->get_row($wpdb->prepare("SELECT * FROM ".$wpdb->prefix."youtube_video WHERE video_id=%d",$config[$i]->lk_dlk_videoid));	        		        $br;	        echo '<media>'.$br;	        echo '<id>'.$item->video_id.'</id>'.$br;	        echo '<type>'.$item->video_type.'</type>'.$br;	        echo '<video>'.$item->video_url.'</video>'.$br;	        if($item->hdvideo) {	            echo '<hd>'.$item->hdvideo.'</hd>'.$br;	        }	        echo '<streamer>'.$item->streamer.'</streamer>'.$br;	        if($item->dvr) {	            echo '<dvr>'.$item->dvr.'</dvr>'.$br;	        }	        echo '<thumb>'.$item->video_thumpnails.'</thumb>'.$br;	        if($item->token) {	            echo '<token>'.$item->token.'</token>'.$br;	        }	        echo '<preview>'.$item->video_thumpnails.'</preview>'.$br;	        echo '<title>'.$item->video_title.'</title>'.$br;	        echo '</media>'.$br.$br;	    }	    echo '</playlist>'.$br;	    exit();	   	}		function wlplaylist($id){	     	    global $wpdb;	    $siteurl = get_option('siteurl');	    $br      = "\n";		    $wltablename = $wpdb->prefix . 'youtube_watchlater';	    $vid = ($_GET['vid']       != '') ? $_GET['vid'] : '';	    $query = "SELECT * FROM ".$wltablename." WHERE channelid=%d";	    $query   .= ($vid       != '') ? ' AND videoid=%d' : '';	     	    $config = $wpdb->get_results($wpdb->prepare($query,$_SESSION['your_current_channel'],intval($vid)));	     	    if($vid != ''){	        $result  = $wpdb->get_results($wpdb->prepare("SELECT * FROM ".$wltablename." WHERE channelid=%d AND videoid !=%d",$_SESSION['your_current_channel'],$vid));	        $config = array_merge((array)$config,(array)$result);	    }	     	    $count   = count($config);	    if(!$config[0]->id){	        die('<b><h1>Restricted access</h1></b>');	    }		    header("content-type:text/xml;charset=utf-8");	    echo '<?xml version="1.0" encoding="utf-8"?>'.$br;	    echo '<playlist>'.$br;		    for ($i=0, $n=$count; $i < $n; $i++) {	        $item = $wpdb->get_row($wpdb->prepare("SELECT * FROM ".$wpdb->prefix."youtube_video WHERE video_id=%d",$config[$i]->videoid));		        $br;	        echo '<media>'.$br;	        echo '<id>'.$item->video_id.'</id>'.$br;	        echo '<type>'.$item->video_type.'</type>'.$br;	        echo '<video>'.$item->video_url.'</video>'.$br;	        if($item->hdvideo) {	            echo '<hd>'.$item->hdvideo.'</hd>'.$br;	        }	        echo '<streamer>'.$item->streamer.'</streamer>'.$br;	        if($item->dvr) {	            echo '<dvr>'.$item->dvr.'</dvr>'.$br;	        }	        echo '<thumb>'.$item->video_thumpnails.'</thumb>'.$br;	        if($item->token) {	            echo '<token>'.$item->token.'</token>'.$br;	        }	        echo '<preview>'.$item->video_thumpnails.'</preview>'.$br;	        echo '<title>'.$item->video_title.'</title>'.$br;	        echo '</media>'.$br.$br;	    }	    echo '</playlist>'.$br;	    exit();		}		function skinXml($id){		if(isset($_GET['lic']) && checkL($_GET['lic'])){			global $wpdb;				$config  = $wpdb->get_row($wpdb->prepare("SELECT * FROM ".$wpdb->prefix."youtube_hdwplayer WHERE id=%d",$id));			$siteurl = get_option('siteurl');			$br      = "\n";			if(!$config->id){				die('<b><h1>Restricted access</h1></b>');			}			header("content-type:text/xml;charset=utf-8");			echo '<skin>'.$br;			echo '<controlbar>'.$br;	        echo '<display>'.castAsBoolean($config->controlbar) .'</display>'.$br;			echo '</controlbar>'.$br;			echo '<playpause>'.$br;			echo '<display>'.castAsBoolean($config->playpause).'</display>'.$br;			echo '</playpause>'.$br;			echo '<progressbar>'.$br;			echo '<display>'.castAsBoolean($config->progressbar).'</display>'.$br;			echo '</progressbar>'.$br;			echo '<timer>'.$br;			echo '<display>'.castAsBoolean($config->timer).'</display>'.$br;			echo '</timer>'.$br;			echo '<share>'.$br;			echo '<display>'.castAsBoolean($config->share).'</display>'.$br;			echo '</share>'.$br;			echo '<volume>'.$br;			echo '<display>'.castAsBoolean($config->volume).'</display>'.$br;			echo '</volume>'.$br;			echo '<fullscreen>'.$br;			echo '<display>'.castAsBoolean($config->fullscreen).'</display>'.$br;			echo '</fullscreen>'.$br;			echo '<playdock>'.$br;			echo '<display>'.castAsBoolean($config->playdock).'</display>'.$br;			echo '</playdock>'.$br;			echo '<videogallery>'.$br;			echo '<display>'.castAsBoolean($config->playlist).'</display>'.$br;			echo '</videogallery>'.$br;			echo '</skin>'.$br;			exit();		}	}	/******************************************************************/*Cast Numeric values as Boolean******************************************************************/	function castAsBoolean($val){		if($val == 1) {			return 'true';		} else {			return 'false';		}	}		function encrypt_decrypt($action, $string) {	   $output = false;  		   if( $action == 'encrypt' ) {	       $output = (double)$string*525325.24;	       $output = base64_encode($output);	   }	   else if( $action == 'decrypt' ){	       $output = base64_decode(substr($string,0,-3));	       $output = (double)$output/525325.24;	   }	   return $output;	}		function  checkL($lic){		global $wpdb;		$token = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."youtube_hdwplayer");		$license = array();		foreach($token as $tok){			$license[] = trim($tok->token);			}				if(in_array(trim($lic),$license)){			return true;		}		return false;			}		function getPlayer(){		if($_POST){			global $wpdb;				$config  = $wpdb->get_row($wpdb->prepare("SELECT * FROM ".$wpdb->prefix."hdwplayer_videos WHERE id=%d",$_POST['id']));			$null = array();			$null = get_object_vars($config);			echo json_encode($null);				exit();			}	}		function getVideo(){		if($_POST){			global $wpdb;			$config  = $wpdb->get_row($wpdb->prepare("SELECT * FROM ".$wpdb->prefix."hdwplayer_videos WHERE id=%d",$_POST['id']));			$null = array();			$null = get_object_vars($config);			echo json_encode($null);			exit();		}	}		function views($id){		global $wpdb;		$table_name = $wpdb->prefix.'youtube_video';		$config = $wpdb->get_row($wpdb->prepare("SELECT * FROM ".$table_name." WHERE video_id=%d",intval($id)));		$value['video_view'] = $config->video_view + 1;		$wpdb->update($table_name, $value, array('video_id' => $config->video_id),array('%d'),array('%d'));	}		function addmytags($id)	{	    global $wpdb;	    	    global $current_user;	    get_currentuserinfo ();	    	    $tags_table_name  = $wpdb->prefix.'youtube_channeltags';	    $video_table_name = $wpdb->prefix.'youtube_video';	    $get_tags    = $wpdb->get_row($wpdb->prepare("SELECT * FROM $video_table_name WHERE video_id=%d",$id));	    $update_tags = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tags_table_name WHERE channelid=%d AND userid=%d",$_SESSION['your_current_channel'],$current_user->ID));	    	    $newtags = explode(',',$update_tags->Tags);	    $vidtags = explode(',',$get_tags->video_tags);	    $tags = array_diff($vidtags,$newtags);	    if(implode(",",$tags) != "" && implode(",",$tags) != ","){    	    $wpdb->update($tags_table_name,array( 'Tags' => $update_tags->Tags.",".implode(",",$tags)),array(    	            'userid'           =>  $current_user->ID,    	            'channelid'        =>  $_SESSION['your_current_channel']    	    ),array('%s'),array('%d','%d'));	    }    	}		function watchview($id){    	    	    global $wpdb;	    $table_name = $wpdb->prefix.'youtube_watchhistory';	  	    $video_table_name = $wpdb->prefix.'youtube_video';	    $video = $wpdb->get_row($wpdb->prepare("SELECT * FROM $video_table_name WHERE video_id=%d",$id));        	    if($video)	    {    	    if(isset($_SESSION['your_current_channel']))    	    {    	       $uchannelid = $_SESSION['your_current_channel'];    	    }    	    else    	    {    	        $uchannelid = 0;    	    }    	        	    $wpdb->insert($table_name,array(    	                 	            'videoid'     =>intval($id),    	            'u_channelid' => $uchannelid,    	            'currenttime' =>date ( 'Y-m-d H:i:s')            	    ),array('%d','%d','%s'));	   }	}		function hdw_tube_general_upload($filename,$type){				if(!file_exists(HDW_UPLOAD_ROOT)){			if(!mkdir(HDW_UPLOAD_ROOT, 0777, true)){				return false;			}		}						$ran = rand();		$ext = end(explode(".", $filename["name"]));		if(!move_uploaded_file($filename["tmp_name"], HDW_UPLOAD_ROOT.$type.$ran.'.'.$ext)){			return false;		}				return HDW_UPLOAD_URL.$type.$ran.'.'.$ext;	}?>