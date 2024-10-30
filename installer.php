<?php
function hdwtube_db_install(){
	global $wpdb;
	$tablename = $wpdb->prefix."youtube_settings";		$sql="CREATE TABLE IF NOT EXISTS ".$tablename." (          `id` int(11) NOT NULL AUTO_INCREMENT,
	      `hdw_sitename` varchar(500) NOT NULL,
	      `show_uploadbtn` varchar(10) NOT NULL,
          `youtube` varchar(10) DEFAULT NULL,
          `urlvideo` varchar(10) DEFAULT NULL,
          `videoperlist` int(10) DEFAULT NULL,
          `videoperrecommended` int(10) DEFAULT NULL,
          `sh_popularvideo` varchar(20) DEFAULT NULL,
          `sh_recommended` varchar(20) DEFAULT NULL,
          `sh_subscriptionlist` varchar(20) DEFAULT NULL,
          `sh_movies` varchar(20) DEFAULT NULL,
          `sh_music` varchar(20) DEFAULT NULL,
          `sh_sports` varchar(20) DEFAULT NULL,
          `sh_gaming` varchar(20) DEFAULT NULL,
	      `premium_ids` varchar(500) NOT NULL,
	      `widget_channel` varchar(500) NOT NULL,
	      `categoryids` varchar(500) NOT NULL,
          `sh_subscription` varchar(20) DEFAULT NULL,
          `sh_like` varchar(20) DEFAULT NULL,
          `sh_dislike` varchar(20) DEFAULT NULL,
          `sh_menu_about` int(10) DEFAULT NULL,
          `sh_menu_share` int(10) DEFAULT NULL,
          `sh_menu_addto` int(10) DEFAULT NULL,
          `sh_menu_statistics` int(10) DEFAULT NULL,
          `sh_menu_report` int(10) DEFAULT NULL,
          `sh_comments` varchar(20) DEFAULT NULL,
          `noofrelatedvid` int(10) DEFAULT NULL,
          `sh_cmenu_home` int(10) DEFAULT NULL,
          `sh_cmenu_videos` int(10) DEFAULT NULL,
          `sh_cmenu_playlists` int(10) DEFAULT NULL,
          `sh_cmenu_channel` int(10) DEFAULT NULL,
          `sh_cmenu_discussion` int(10) DEFAULT NULL,
          `sh_cmenu_about` int(10) DEFAULT NULL,
          `sh_featuredchannels` varchar(20) DEFAULT NULL,
          `sh_popularchannels` varchar(20) DEFAULT NULL,
          `noofhomemenuvid` int(10) DEFAULT NULL,
          `noofvidmenuvid` int(10) DEFAULT NULL,
          `sh_relateddvid` varchar(20) DEFAULT NULL,	          PRIMARY KEY (`id`));";		$wpdb->query($sql);
	$tablename = $wpdb->prefix."youtube_add_channel";
	$sql="CREATE TABLE IF NOT EXISTS ".$tablename." (
         `id` int(11) NOT NULL AUTO_INCREMENT,
         `userid` int(11) NOT NULL,
         `channelid` int(11) NOT NULL,
         `channelname` varchar(100) NOT NULL,
          PRIMARY KEY (`id`));";
	$wpdb->query($sql);
	
	$tablename = $wpdb->prefix."youtube_category";
	
	$sql="CREATE TABLE IF NOT EXISTS ".$tablename." (	
         `id` int(11) NOT NULL AUTO_INCREMENT,	
         `category` varchar(250) NOT NULL,	
         `value` varchar(250) NOT NULL,	        
          PRIMARY KEY (`id`));";	
	$wpdb->query($sql);
	
	
	$tablename = $wpdb->prefix."youtube_channeltags";
	$sql="CREATE TABLE IF NOT EXISTS ".$tablename." (        
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `userid` int(11) NOT NULL,
          `channelid` int(11) NOT NULL,
          `Tags` longtext NOT NULL,
          PRIMARY KEY (`id`));";
	$wpdb->query($sql);
	
	$tablename = $wpdb->prefix."youtube_likedplaylist";
	$sql="CREATE TABLE IF NOT EXISTS ".$tablename." (
         `id` int(11) NOT NULL AUTO_INCREMENT,
          `userid` int(11) NOT NULL,
          `channelid` int(11) NOT NULL,
          `lk_playlist` int(11) NOT NULL,
          `date` datetime NOT NULL,
          PRIMARY KEY (`id`));";
	$wpdb->query($sql);
	
	$tablename = $wpdb->prefix."youtube_recommended";
	$sql="CREATE TABLE IF NOT EXISTS ".$tablename." (
	      `id` int(11) NOT NULL AUTO_INCREMENT,
          `r_channelid` int(11) NOT NULL,
          `date` datetime NOT NULL,
          PRIMARY KEY (`id`));";
	$wpdb->query($sql);
	
	
	$tablename = $wpdb->prefix."youtube_iconbanner";
	$sql="CREATE TABLE IF NOT EXISTS ".$tablename." (        
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `userid` int(11) NOT NULL,
          `channelid` int(11) NOT NULL,
          `imageurl` varchar(500) NOT NULL,
          `status` int(11) NOT NULL,
          PRIMARY KEY (`id`));";
	$wpdb->query($sql);
	
	
	$tablename = $wpdb->prefix."youtube_addchannellist";
	$sql="CREATE TABLE IF NOT EXISTS ". $tablename." (	
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `userid` int(11) NOT NULL,
          `channelid` int(11) NOT NULL,
          `add_channelid` int(11) NOT NULL,
          `channelurl` varchar(100) NOT NULL,
          `channelname` varchar(100) NOT NULL,
          `channelthumb` varchar(100) NOT NULL,
          PRIMARY KEY (`id`));";
	$wpdb->query($sql);
	
	$tablename = $wpdb->prefix."youtube_channel_comment";
	$sql="CREATE TABLE IF NOT EXISTS ". $tablename." (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `userid` int(11) NOT NULL,
          `channelid` int(11) NOT NULL,
          `user_channel_id` int(11) NOT NULL,
          `message` varchar(500) NOT NULL,
          `channel_icon` varchar(500) NOT NULL,
          `channel_name` varchar(500) NOT NULL,
          `like` int(11) NOT NULL,
          `dislike` int(11) NOT NULL,
          `message_time` datetime NOT NULL,
          PRIMARY KEY (`id`));";
	$wpdb->query($sql);
	
	
	$tablename = $wpdb->prefix."youtube_likevideo";
	$sql="CREATE TABLE IF NOT EXISTS ". $tablename." (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `userid` int(11) NOT NULL,
          `channelid` int(11) NOT NULL,
          `lk_dlk_videoid` int(11) NOT NULL,
          `lk_dlk_channelid` int(11) NOT NULL,
          `status` int(11) NOT NULL,
          `currentime` datetime NOT NULL,
          PRIMARY KEY (`id`));";
	$wpdb->query($sql);
	
	$tablename = $wpdb->prefix."youtube_playlist";
	$sql="CREATE TABLE IF NOT EXISTS ". $tablename." (
         `id` int(11) NOT NULL AUTO_INCREMENT,
          `userid` int(11) NOT NULL,
          `channelid` int(11) NOT NULL,
          `playlistid` int(11) NOT NULL,
          `videoid` int(11) NOT NULL,
          PRIMARY KEY (`id`));";
	$wpdb->query($sql);
	$tablename = $wpdb->prefix."youtube_playlistname";
	$sql="CREATE TABLE IF NOT EXISTS ". $tablename." (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `userid` int(11) NOT NULL,
          `channelid` int(11) NOT NULL,
          `playlistname` varchar(500) NOT NULL,
          `thumbnail` varchar(500) NOT NULL,
          `description` varchar(500) NOT NULL,
          `pdate` datetime NOT NULL,
          PRIMARY KEY (`id`));";
	$wpdb->query($sql);
	 
	
	$tablename = $wpdb->prefix."youtube_channel";
	$sql="CREATE TABLE IF NOT EXISTS ". $tablename." (
          `channel_id` int(10) NOT NULL AUTO_INCREMENT,
          `userid` varchar(100) NOT NULL,
          `channel_name` varchar(100) NOT NULL,
          `channel_banner` varchar(150) NOT NULL,
          `channel_icon` varchar(100) NOT NULL,
          `channel_category` varchar(100) NOT NULL,
          `channel_view` int(11) NOT NULL,
          `channel_subscribers` int(10) NOT NULL,
          `Description` varchar(500) NOT NULL,
          `datetime` datetime NOT NULL,
          PRIMARY KEY (`channel_id`));";
	 $wpdb->query($sql);
	
	
	$tablename = $wpdb->prefix."youtube_comments";
	$sql="CREATE TABLE IF NOT EXISTS ".$tablename." (		 
          `id` int(10) NOT NULL AUTO_INCREMENT,
          `video_id` int(10) NOT NULL,
          `user_id` int(10) NOT NULL,
          `channel_id` int(11) NOT NULL,
          `message` varchar(500) NOT NULL,
          `channel_icon` varchar(500) NOT NULL,
          `channel_name` varchar(100) NOT NULL,
          `comments_time` datetime NOT NULL,
          PRIMARY KEY (`id`));";
	$wpdb->query($sql);
	
	$tablename = $wpdb->prefix."youtube_watchlater";
	$sql = "CREATE TABLE IF NOT EXISTS ".$tablename."(
        	`id` int(11) NOT NULL AUTO_INCREMENT,
            `videoid` int(11) NOT NULL,
            `userid` int(11) NOT NULL,
            `channelid` int(11) NOT NULL,
            PRIMARY KEY (`id`));";
	$wpdb->query($sql);
				
	$tablename = $wpdb->prefix."youtube_video";
	$sql = "CREATE TABLE IF NOT EXISTS ".$tablename."(
			 `video_id` int(10) NOT NULL AUTO_INCREMENT,
              `user_id` int(10) NOT NULL,
              `channel_id` int(10) NOT NULL,
              `video_title` varchar(100) NOT NULL,
              `video_url` varchar(100) NOT NULL,
              `video_type` varchar(100) NOT NULL,
              `video_description` varchar(500) NOT NULL,
              `video_tags` varchar(100) NOT NULL,
              `video_thumpnails` varchar(100) NOT NULL,
              `video_category` varchar(100) NOT NULL,
              `video_like` int(10) NOT NULL,
              `video_dislike` int(10) NOT NULL,
              `video_view` int(10) NOT NULL,
              `video_status` int(10) NOT NULL,
              `video_upload_time` datetime NOT NULL,
              PRIMARY KEY (`video_id`));";
	$wpdb->query($sql);	
	$tablename = $wpdb->prefix."youtube_subscriptions";
	$sql = "CREATE TABLE IF NOT EXISTS ".$tablename."(
			 `id` int(100) NOT NULL AUTO_INCREMENT,
              `user_id` int(100) NOT NULL,
              `channel_id` int(100) NOT NULL,
              `subsc_channel_id` int(50) NOT NULL,
              `subsc_channel_name` varchar(100) NOT NULL,
              `current_time` datetime NOT NULL,
              PRIMARY KEY (`id`));";
	$wpdb->query($sql);	
	$tablename = $wpdb->prefix."youtube_watchhistory";
	$sql = "CREATE TABLE IF NOT EXISTS ".$tablename."(
	        `id` int(11) NOT NULL AUTO_INCREMENT,
            `videoid` int(11) NOT NULL,
            `u_channelid` int(11) NOT NULL,
            `currenttime` datetime NOT NULL,
            PRIMARY KEY (`id`));";
	$wpdb->query($sql);
	$tablename = $wpdb->prefix."youtube_report";
	
	$sql = "CREATE TABLE IF NOT EXISTS ".$tablename."(	
			 `id` int(11) NOT NULL AUTO_INCREMENT,	
              `userid` int(11) NOT NULL,	
              `videoid` int(11) NOT NULL,	
              `reason` varchar(250) NOT NULL,	
              `message` longtext NOT NULL,	
              `date` datetime NOT NULL,	
              PRIMARY KEY (`id`));";	
	$wpdb->query($sql);	
	
	$tablename = $wpdb->prefix."youtube_hdwplayer";
	$sql =  "CREATE TABLE IF NOT EXISTS ".$tablename." (
			  `id` int(5) NOT NULL AUTO_INCREMENT,
			  `width` int(5) NOT NULL,
			  `height` int(5) NOT NULL,
	        
			  `skinmode` varchar(20) NOT NULL,
			  `stretchtype` varchar(20) NOT NULL,
			  `buffertime` int(3) NOT NULL,
			  `volumelevel` int(3) NOT NULL,
			  `autoplay` tinyint(4) NOT NULL,
			  `playlistautoplay` tinyint(4) NOT NULL,
			  `playlistopen` tinyint(4) NOT NULL,
			  `playlistrandom` tinyint(4) NOT NULL,
			  `controlbar` tinyint(4) NOT NULL,
			  `playpause` tinyint(4) NOT NULL,
			  `progressbar` tinyint(4) NOT NULL,
			  `timer` tinyint(4) NOT NULL,
			  `share` tinyint(4) NOT NULL,
			  `volume` tinyint(4) NOT NULL,
			  `fullscreen` tinyint(4) NOT NULL,
			  `playdock` tinyint(4) NOT NULL,
			  `playlist` tinyint(4) NOT NULL,
			  `token` varchar(20) NOT NULL,
			  UNIQUE KEY `id` (`id`));";
	$wpdb->query($sql);
}

function hdwtube_db_install_data() {
	global $wpdb;	
	$widget_folder_path        = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/widget_icon/';
	
	$table_name = $wpdb->prefix."youtube_settings";	
	$sql = "INSERT INTO $table_name VALUES ('1', 'HDW Tube', 'yes', 'yes', 'yes', '10', '10', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '', '2,3,4,5', '2,4,10', 'yes', 'yes', 'yes', '1', '1', '1', '1', '1', 'yes', '10', '1', '1', '1', '1', '1', '1', 'yes', 'yes', '20', '10', 'yes');";
	$wpdb->query($sql);	
	$table_name = $wpdb->prefix."youtube_channel";
	$wpdb->insert($table_name, array(
		'channel_id'           => 1,
	    'userid'               => 1,
	    'channel_name'         => 'Popular on HDW Tube',
	    'channel_banner'       => $widget_folder_path.'banner_youtube.png',
	    'channel_icon'         => $widget_folder_path.'youtube.png',
	    'channel_category'     => 'others',
	    'channel_view'         => 0,
	    'channel_subscribers'  => 0,
	    'Description'          => '',
	    'datetime'             => date ( 'Y-m-d H:i:s')      
	));
	
	$wpdb->insert($table_name, array(
	        'channel_id'           => 2,
	        'userid'               => 1,
	        'channel_name'         => 'Sports',
	        'channel_banner'       => $widget_folder_path.'banner_sports.png',
	        'channel_icon'         => $widget_folder_path.'sports.png',
	        'channel_category'     => 'Sports',
	        'channel_view'         => 0,
	        'channel_subscribers'  => 0,
	        'Description'          => 'Sport is all forms of usually competitive physical activity which, through casual or organised participation, aim to use, maintain or improve physical ability and skills while providing entertainment to participants, and in some cases, spectators. Hundreds of sports exist, from those requiring only ',
	        'datetime'             => date ( 'Y-m-d H:i:s')
	));
	
	$wpdb->insert($table_name, array(
	        'channel_id'           => 3,
	        'userid'               => 1,
	        'channel_name'         => 'Music',
	        'channel_banner'       => $widget_folder_path.'banner_music.png',
	        'channel_icon'         => $widget_folder_path.'music.png',
	        'channel_category'     => 'Music',
	        'channel_view'         => 0,
	        'channel_subscribers'  => 0,
	        'Description'          => 'YouTube\'s music destination featuring top tracks and popular hits from a variety of genres. This channel was generated automatically by YouTube\'s video discovery system ',
	        'datetime'             => date ( 'Y-m-d H:i:s')
	));
	
	$wpdb->insert($table_name, array(
	        'channel_id'           => 4,
	        'userid'               => 1,
	        'channel_name'         => 'Gaming',
	        'channel_banner'       => $widget_folder_path.'banner_gaming.png',
	        'channel_icon'         => $widget_folder_path.'gaming.png',
	        'channel_category'     => 'Gaming',
	        'channel_view'         => 0,
	        'channel_subscribers'  => 0,
	        'Description'          => 'Video game culture is a form of new media culture that has been influenced by video games. As computer and video games have increased exponentially in popularity over time, they have caused a significant influence upon popular culture. This form of entertainment has spawned many fads ',
	        'datetime'             => date ( 'Y-m-d H:i:s')
	));
	
	$wpdb->insert($table_name, array(
	        'channel_id'           => 5,
	        'userid'               => 1,
	        'channel_name'         => 'Movies',
	        'channel_banner'       => $widget_folder_path.'banner_movie.png',
	        'channel_icon'         => $widget_folder_path.'movies.png',
	        'channel_category'     => 'Movie',
	        'channel_view'         => 0,
	        'channel_subscribers'  => 0,
	        'Description'          => 'Movies',
	        'datetime'             => date ( 'Y-m-d H:i:s')
	));
	
	$table_name = $wpdb->prefix."youtube_add_channel";
	$wpdb->insert($table_name, array(
	        'id'          => 1,
	        'userid'      => 1,
	        'channelid'   => 1,
	        'channelname' =>'Featured Channels'
	));
	
	$wpdb->insert($table_name, array(
	        'id'          => 2,
	        'userid'      => 1,
	        'channelid'   => 2,
	        'channelname' =>'Featured Channels'
	));
	
	$wpdb->insert($table_name, array(
	        'id'          => 3,
	        'userid'      => 1,
	        'channelid'   => 3,
	        'channelname' =>'Featured Channels'
	));
	
	$wpdb->insert($table_name, array(
	        'id'          => 4,
	        'userid'      => 1,
	        'channelid'   => 4,
	        'channelname' =>'Featured Channels'
	));
	
	$wpdb->insert($table_name, array(
	        'id'          => 5,
	        'userid'      => 1,
	        'channelid'   => 5,
	        'channelname' =>'Featured Channels'
	));
	
	$table_name = $wpdb->prefix . "youtube_channeltags";
	$wpdb->insert($table_name,array(
	        'id'          => 1,
	        'userid'      => 1,
	        'channelid'   => 1,
	        'Tags'        =>''
	));
	
	$wpdb->insert($table_name,array(
	        'id'          => 2,
	        'userid'      => 1,
	        'channelid'   => 2,
	        'Tags'        =>''
	));
	
	$wpdb->insert($table_name,array(
	        'id'          => 3,
	        'userid'      => 1,
	        'channelid'   => 3,
	        'Tags'        =>''
	));
	
	$wpdb->insert($table_name,array(
	        'id'          => 4,
	        'userid'      => 1,
	        'channelid'   => 4,
	        'Tags'        =>''
	));
	
	$wpdb->insert($table_name,array(
	        'id'          => 5,
	        'userid'      => 1,
	        'channelid'   => 5,
	        'Tags'        =>''
	));
	
	$table_name = $wpdb->prefix . "youtube_recommended";
	$wpdb->insert($table_name,array(
	        'id'           => 1,
	        'r_channelid'  => 1,
	        'date'         => date ( 'Y-m-d H:i:s')      
	));
	
	$wpdb->insert($table_name,array(
	        'id'           => 2,
	        'r_channelid'  => 2,
	        'date'         => date ( 'Y-m-d H:i:s')
	));
	
	$wpdb->insert($table_name,array(
	        'id'           => 3,
	        'r_channelid'  => 3,
	        'date'         => date ( 'Y-m-d H:i:s')
	));
	
	$wpdb->insert($table_name,array(
	        'id'           => 4,
	        'r_channelid'  => 4,
	        'date'         => date ( 'Y-m-d H:i:s')
	));
	
	$wpdb->insert($table_name,array(
	        'id'           => 5,
	        'r_channelid'  => 5,
	        'date'         => date ( 'Y-m-d H:i:s')
	));
	
	
	$table_name = $wpdb->prefix . "youtube_hdwplayer";
	$wpdb->insert($table_name, array(
			'id'               => 1,
			'width'            => 640,
			'height'           => 360,	        
	        'skinmode'         => 'static',
			'stretchtype'      => 'fill',
			'buffertime'       => 3,
			'volumelevel'      => 50,
			'autoplay'         => 1,
			'playlistautoplay' => 1,
			'playlistopen'     => 0,
			'playlistrandom'   => 0,
			'controlbar'       => 1,
			'playpause'        => 1,
			'progressbar'      => 1,
			'timer'            => 1,
			'share'            => 1,
			'volume'           => 1,
			'fullscreen'       => 1,
			'playdock'         => 1,
			'playlist'         => 1,
			'token' 		   => null
	));	
	global $current_user;	get_currentuserinfo();			$tablename = $wpdb->prefix."youtube_video";		$sql = "INSERT INTO ".$tablename." VALUES ('1', '$current_user->ID', '1', 'Greatest Ever Finish to a Cricket ', 'https://www.youtube.com/watch?v=bmOAHq7xisM', 'youtube', 'hdcricketworld.blogspot.com https://www.facebook.com/hdcricketworld15 instagram.com/dhilan_patel15 ... ', 'cricket,sports,shoni', 'http://img.youtube.com/vi/bmOAHq7xisM/0.jpg', 'Sports', '0', '0', '0', '0', '".date ( 'Y-m-d H:i:s')."');";	$wpdb->query($sql);		$sql = "INSERT INTO ".$tablename." VALUES ('2', '$current_user->ID', '1', 'Ultimate Best Football Tricks', 'https://www.youtube.com/watch?v=j3BslT97fR4', 'youtube', 'Matches against: Real Madrid, Porto, Villarreal, Osasuna, Atletico Madrid, BATE Borisov, Racing Santander, Mallorca, Viktoria Plzen, Athletic Bilbao, Zaragoza', 'football,sports,tricks', 'http://img.youtube.com/vi/j3BslT97fR4/0.jpg', 'Sports', '0', '0', '0', '0', '".date ( 'Y-m-d H:i:s')."');";	$wpdb->query($sql);		$sql = "INSERT INTO ".$tablename." VALUES ('3', '$current_user->ID', '1', 'Say Something, Obama: The Music Video', 'https://www.youtube.com/watch?v=6SmrpFPc7-0', 'youtube', 'The South Dakota College Republicans present to you a video that describes our generation', 'Obama,music,video', 'http://img.youtube.com/vi/6SmrpFPc7-0/0.jpg', 'Music', '0','0', '0', '0', '".date ( 'Y-m-d H:i:s')."');";	$wpdb->query($sql);		$sql = "INSERT INTO ".$tablename." VALUES ('4', '$current_user->ID', '1', 'FanCam Music Bank in Brasil', 'https://www.youtube.com/watch?v=qrcSBiyy62I', 'youtube', 'Ignorem as conversas aleatórias e no final fica baixo do nada porque eu sem querer coloquei o dedo em cima do lugar onde pega o som :( Sorry! :(', 'FanCam,Music,Bank,Brasil','http://img.youtube.com/vi/qrcSBiyy62I/0.jpg', 'Music', '0', '0', '0', '0', '".date ( 'Y-m-d H:i:s')."');";	$wpdb->query($sql);		$sql = "INSERT INTO ".$tablename." VALUES ('5', '$current_user->ID', '1', 'MY NEW GAMING SETUP VIDEO', 'https://www.youtube.com/watch?v=tGd42FL-Wwc', 'youtube', 'Hope you guys enjoy my new gaming setup!\nLike the video if you enjoyed! Thanks!\n?FIFA 14 ULTIMATE TEAM COINS - http://www.futcoinking.com\n?5% off code: AA9', 'games', 'http://img.youtube.com/vi/tGd42FL-Wwc/0.jpg', 'Gaming', '0', '0', '2', '0', '".date ( 'Y-m-d H:i:s')."');";	$wpdb->query($sql);				//SPORTS VIDEO		$sql = "INSERT INTO ".$tablename." VALUES ('11', '$current_user->ID', '2', 'Greatest Ever Finish to a Cricket ', 'https://www.youtube.com/watch?v=bmOAHq7xisM', 'youtube', 'hdcricketworld.blogspot.com https://www.facebook.com/hdcricketworld15 instagram.com/dhilan_patel15 ... ', 'cricket,sports,shoni', 'http://img.youtube.com/vi/bmOAHq7xisM/0.jpg', 'Sports', '0', '0', '0', '0', '".date ( 'Y-m-d H:i:s')."');";	$wpdb->query($sql);		$sql = "INSERT INTO ".$tablename." VALUES ('12', '$current_user->ID', '2', 'Ultimate Best Football Tricks', 'https://www.youtube.com/watch?v=j3BslT97fR4', 'youtube', 'Matches against: Real Madrid, Porto, Villarreal, Osasuna, Atletico Madrid, BATE Borisov, Racing Santander, Mallorca, Viktoria Plzen, Athletic Bilbao, Zaragoza', 'football,sports,tricks', 'http://img.youtube.com/vi/j3BslT97fR4/0.jpg', 'Sports', '0', '0', '0', '0', '".date ( 'Y-m-d H:i:s')."');";	$wpdb->query($sql);		$sql = "INSERT INTO ".$tablename." VALUES ('13', '$current_user->ID', '2', 'Tennis : Best Points 2014', 'https://www.youtube.com/watch?v=dUtMykSw2ug', 'youtube', 'If you want watch more Highlights one link :\nhttp://www.tennishighlights.eu/\nRoger Federer Vs Novak Djokovic Monte-Carlo 2014 Highlights SF HD', 'tennis,sports', 'http://img.youtube.com/vi/dUtMykSw2ug/0.jpg', 'Sports', '0', '0', '0', '0', '".date ( 'Y-m-d H:i:s')."');";	$wpdb->query($sql);		$sql = "INSERT INTO ".$tablename." VALUES ('14', '$current_user->ID', '2', 'MotoGP™ Rewind: Argentina 2014', 'https://www.youtube.com/watch?v=ydCrxITZRAo', 'youtube', 'A look back on last weekend\'s Gran Premio Red Bull de la Republica Argentina, which saw the MotoGP™ World Championship visit the newly redesigned Termas de Rio Hondo track for the first time.', 'MotoGP,bike race,sports', 'http://img.youtube.com/vi/ydCrxITZRAo/0.jpg', 'Sports', '0', '0', '0', '0', '".date ( 'Y-m-d H:i:s')."');";	$wpdb->query($sql);		$sql = "INSERT INTO ".$tablename." VALUES ('15', '$current_user->ID', '2', 'NBA Basketball', 'https://www.youtube.com/watch?v=F75tlBo0NT4', 'youtube', '\"Be true to the game, because the game will be true to you. If you try to shortcut the game, then the game will shortcut you', 'Basketball,sports', 'http://img.youtube.com/vi/F75tlBo0NT4/0.jpg', 'Sports', '0', '0', '0', '0', '".date ( 'Y-m-d H:i:s')."');";	$wpdb->query($sql);		//MUSIC VIDEO		$sql = "INSERT INTO ".$tablename." VALUES ('21', '$current_user->ID', '3', 'Say Something, Obama: The Music Video', 'https://www.youtube.com/watch?v=6SmrpFPc7-0', 'youtube', 'The South Dakota College Republicans present to you a video that describes our generation', 'Obama,music,video', 'http://img.youtube.com/vi/6SmrpFPc7-0/0.jpg', 'Music', '0','0', '0', '0', '".date ( 'Y-m-d H:i:s')."');";	$wpdb->query($sql);		$sql = "INSERT INTO ".$tablename." VALUES ('22', '$current_user->ID', '3', 'FanCam Music Bank in Brasil', 'https://www.youtube.com/watch?v=qrcSBiyy62I', 'youtube', 'Ignorem as conversas aleatórias e no final fica baixo do nada porque eu sem querer coloquei o dedo em cima do lugar onde pega o som :( Sorry! :(', 'FanCam,Music,Bank,Brasil','http://img.youtube.com/vi/qrcSBiyy62I/0.jpg', 'Music', '0', '0', '0', '0', '".date ( 'Y-m-d H:i:s')."');";	$wpdb->query($sql);		$sql = "INSERT INTO ".$tablename." VALUES ('23', '$current_user->ID', '3', 'Jun Hyo-seong - Good-night Kiss', 'https://www.youtube.com/watch?v=8cBtgdGZSq0', 'youtube', ' For more awesome videos, subscribe our channels!! Daily update available!', 'Jun Hyo-seong,music', 'http://img.youtube.com/vi/8cBtgdGZSq0/0.jpg', 'Music', '0', '0', '0', '0', '".date ( 'Y-m-d H:i:s')."');";	$wpdb->query($sql);		$sql = "INSERT INTO ".$tablename." VALUES ('24', '$current_user->ID', '3', 'T.I, LL Cool J and Hugh Jackman Perform', 'https://www.youtube.com/watch?v=hx2N2ohbEWQ', 'youtube', 'T.I, LL Cool J, and host Hugh Jackman brought hip hop to the 2014 Tony Awards last night with a rap, call and response rendition of the Music Man', 'music', 'http://img.youtube.com/vi/hx2N2ohbEWQ/0.jpg', 'Music', '0', '0', '0', '0', '".date ( 'Y-m-d H:i:s')."');";	$wpdb->query($sql);	 	$sql = "INSERT INTO ".$tablename." VALUES ('25', '$current_user->ID', '3', 'One Direction- You and I', 'https://www.youtube.com/watch?v=oQJvOK44NZM', 'youtube', 'This is officially my favorite One Direction song, honestly love it a lot. I hope you guys enjoy my cover of it, i was super nervous about uploading it. I love you :)', 'One Direction,music', 'http://img.youtube.com/vi/oQJvOK44NZM/0.jpg', 'Music', '0', '0', '0', '0', '".date ( 'Y-m-d H:i:s')."');";	$wpdb->query($sql);		//GAMING VIDEO		$sql = "INSERT INTO ".$tablename." VALUES ('31', '$current_user->ID', '4', 'MY NEW GAMING SETUP VIDEO', 'https://www.youtube.com/watch?v=tGd42FL-Wwc', 'youtube', 'Hope you guys enjoy my new gaming setup!\nLike the video if you enjoyed! Thanks!\n?FIFA 14 ULTIMATE TEAM COINS - http://www.futcoinking.com\n?5% off code: AA9', 'games', 'http://img.youtube.com/vi/tGd42FL-Wwc/0.jpg', 'Gaming', '0', '0', '2', '0', '".date ( 'Y-m-d H:i:s')."');";	$wpdb->query($sql);		$sql = "INSERT INTO ".$tablename." VALUES ('32', '$current_user->ID', '4', 'OpTic Gaming vs Team Kaliber - Game 5 ', 'https://www.youtube.com/watch?v=JfxsCbqp_9Q', 'youtube', 'OpTic Gaming vs Team Kaliber - Game 5 - Gold Medal Match - #MLGXGames', 'Team Kaliber,gaming', 'http://img.youtube.com/vi/JfxsCbqp_9Q/0.jpg', 'Gaming', '0', '0', '1', '0', '".date ( 'Y-m-d H:i:s')."');";	$wpdb->query($sql);		$sql = "INSERT INTO ".$tablename." VALUES ('33', '$current_user->ID', '4', 'HALO 5 BETA Coming Soon', 'https://www.youtube.com/watch?v=GyyDMfOzE2g', 'youtube', 'HALO 5 BETA Coming Soon! - Inside Gaming Daily', 'HALO 5,BETA,gaming', 'http://img.youtube.com/vi/GyyDMfOzE2g/0.jpg', 'Gaming', '0', '0', '0', '0', '".date ( 'Y-m-d H:i:s')."');";	$wpdb->query($sql);		$sql = "INSERT INTO ".$tablename." VALUES ('34', '$current_user->ID', '4', 'Minecraft: Hunger Games Survival w/ Captain', 'https://www.youtube.com/watch?v=Kexeab0hDdQ', 'youtube', 'Play on Mineplex: us.mineplex.com or eu.mineplex.com\nWebsite: http://www.mineplex.com/\n\nPrevious Episode: https://www.youtube.com/watch?v=CXqon...\nNext Episode: Soon', 'Games,Survival ', 'http://img.youtube.com/vi/Kexeab0hDdQ/0.jpg', 'Gaming', '0', '0', '0', '0', '".date ( 'Y-m-d H:i:s')."');";	$wpdb->query($sql);		$sql = "INSERT INTO ".$tablename." VALUES ('35', '$current_user->ID', '4', 'Goat Simulator - MINECRAFT GOAT', 'https://www.youtube.com/watch?v=vOgFLcoUZTs', 'youtube', 'Thanks for watching, dudes! Ratings, favorites, and general feedback is always appreciated :)', 'Goat,games', 'http://img.youtube.com/vi/vOgFLcoUZTs/0.jpg', 'Gaming', '0', '0', '0', '0', '".date ( 'Y-m-d H:i:s')."')";	$wpdb->query($sql);		// MOVIES VIDEO		$sql = "INSERT INTO ".$tablename." VALUES ('41', '$current_user->ID', '5', 'Iron Man vs Terrorists - Iron Man', 'https://www.youtube.com/watch?v=A52Y4IorgDU', 'youtube', 'I do not own this movie, scenes, or pictures you might see in the video. This is all property of Paramount Pictures and Marvel Studios.', 'Iron Man,Movies', 'http://img.youtube.com/vi/A52Y4IorgDU/0.jpg', 'FilmandAnimation', '0', '0', '0', '0', '".date ( 'Y-m-d H:i:s')."');";	$wpdb->query($sql);		$sql = "INSERT INTO ".$tablename." VALUES ('42', '$current_user->ID', '5', 'Narnia Battle Part 1', 'https://www.youtube.com/watch?v=0yBeor0vnMU', 'youtube', 'All rights to Disney', 'Narnia,movie', 'http://img.youtube.com/vi/0yBeor0vnMU/0.jpg', 'FilmandAnimation', '0', '0', '0', '0', '".date ( 'Y-m-d H:i:s')."');";	$wpdb->query($sql);		$sql = "INSERT INTO ".$tablename." VALUES ('43', '$current_user->ID', '5', 'he Amazing Spider-Man 2 - OFFICIAL Trailer', 'https://www.youtube.com/watch?v=nbp3Ra3Yp74', 'youtube', 'Join the Amazing SpiderFans: http://amazingspiderfans.com/ \nLike Us for the latest updates: www.facebook.com/theamazingspiderman', 'Spider-Man,movies', 'http://img.youtube.com/vi/nbp3Ra3Yp74/0.jpg', 'FilmandAnimation', '0', '0', '0', '0', '".date ( 'Y-m-d H:i:s')."');";	$wpdb->query($sql);		$sql = "INSERT INTO ".$tablename." VALUES ('44', '$current_user->ID', '5', 'How Many Of These Harry Potter', 'https://www.youtube.com/watch?v=7Y0pvKE5F8c', 'youtube', 'Music:\nWizards And Witches\nMusic Licensed Via Warner Chappell Production Music Inc.', 'Harry Potter,gaming', 'http://img.youtube.com/vi/7Y0pvKE5F8c/0.jpg', 'FilmandAnimation', '0', '0', '0', '0', '".date ( 'Y-m-d H:i:s')."');";	$wpdb->query($sql);		$sql = "INSERT INTO ".$tablename." VALUES ('45', '$current_user->ID', '5', 'Best Action American Movies 2014 ', 'https://www.youtube.com/watch?v=pS4wHUztgnI', 'youtube', 'Best Action American Movies 2014 - THE MUMMY RESURRECTED 2014 - Action Movies 2014 Full HD', 'MUMMY,movies', 'http://img.youtube.com/vi/pS4wHUztgnI/0.jpg', 'FilmandAnimation', '0', '0', '0', '0', '".date ( 'Y-m-d H:i:s')."');";	$wpdb->query($sql);
	
	$table_name = $wpdb->prefix."youtube_category";	
	$wpdb->insert($table_name, array(
	        'id'           => 1,
	        'category'     => 'Film & Animation',
	        'value'        => 'FilmandAnimation'
	));
	
	$wpdb->insert($table_name, array(
	        'id'           => 2,
	        'category'     => 'Gaming',
	        'value'        => 'Gaming'
	));
	
	$wpdb->insert($table_name, array(
	        'id'           => 3,
	        'category'     => 'Howto & Style',
	        'value'        => 'HowtoandStyle'
	));
	$wpdb->insert($table_name, array(
	        'id'           => 4,
	        'category'     => 'Music',
	        'value'        => 'Music'
	));
	$wpdb->insert($table_name, array(
	        'id'           => 5,
	        'category'     => 'News & Politics',
	        'value'        => 'NewsandPolitics'
	));
	$wpdb->insert($table_name, array(
	        'id'           => 6,
	        'category'     => 'Nonprofits & Activism',
	        'value'        => 'NonprofitsandActivism'
	));
	$wpdb->insert($table_name, array(
	        'id'           => 7,
	        'category'     => 'People & Blogs',
	        'value'        => 'PeopleandBlogs'
	));
	$wpdb->insert($table_name, array(
	        'id'           => 8,
	        'category'     => 'Pets & Animals',
	        'value'        => 'PetsandAnimals'
	));
	$wpdb->insert($table_name, array(
	        'id'           => 9,
	        'category'     => 'Science & Technology',
	        'value'        => 'ScienceandTechnology'
	));
	$wpdb->insert($table_name, array(
	        'id'           => 10,
	        'category'     => 'Sports',
	        'value'        => 'Sports'
	));
	$wpdb->insert($table_name, array(
	        'id'           => 11,
	        'category'     => 'Travel & Events',
	        'value'        => 'TravelandEvents'
	));	
}

function hdwtube_update_db_check() {
}
?>