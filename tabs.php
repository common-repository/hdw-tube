<?php/******************************************************************/* Created Tabular Menus******************************************************************/function youtubeclone_admin_tabs($current = 'hdwclone', $view = 'general') {        $siteurl                   = get_option ( 'siteurl' );    $admin_folder_path           = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/admin/';    	$tabs  = array(	      'player'         => 'Player', 	      'manageusers'   => 'Manage Users',	      'controlPannel' => 'Control Pannel'	);	$tabsConfig  = array(	        'general'   => 'General',	        'forntend'  => 'Forntend',	        'player ' 	=> 'Player',	        'upload' 	=> 'Upload'	);	$links = array();    if($view == ''){        $view = 'general';    }
	if($current == 'configuration'){    	foreach( $tabsConfig as $tab => $name ) {    
    		if( trim($tab) == trim($view)) {    
    			$links[] = "<a class='nav-tab nav-tab-active' href='?page=$current&view=$tab'>$name</a>";    
    		} else {    
    			$links[] = "<a class='nav-tab' href='?page=$current&view=$tab'>$name</a>";    
    		}    
    	}	}		echo '<div id="icon-upload" class="icon32"></div>';	echo "<h2 class='nav-tab-wrapper'>";	foreach( $links as $link ) {		echo $link;	}	echo "</h2>";	}?>