<style>
.slider_yclonehome 
{
	/*height: 145px;*/
	overflow: hidden;
	padding: 0 0 10px;
	positiion:relative;
	width: 100%;
}

.slider_yclonehome .viewport 
{
	float: left;
	width: calc(100% - 56px);
	height: 145px;
	overflow: hidden;
	position: relative;
}

.slider_yclonehome .disable 
{
	visibility: hidden;
}

.slider_yclonehome .overview 
{
	list-style: none;
	position: absolute;
	padding: 0;
	margin: 0;
	width: 570px;
	left: 0 top:  0;
}

.slider_yclonehome .overview li 
{
	float: left;
	margin: 0 10px 0 0;
	height: 150px;
	width: 170px;
}

.slider_yclonehome .overview li img 
{
	height: 75px;
	width: 150px;
}
.slider_yclonehome .buttons 
{
	background: url("<?php echo $img_folder_path.'prevArr.png'?>") no-repeat;
	display: block;
	margin: 30px 10px 0 0;
	background-size:20px 20px;
	text-indent: -999em;
	float: left;
	width: 18px;
	height: 18px;
	overflow: hidden;
	position: relative;
	cursor:pointer;
} 
.slider_yclonehome .next 
{
	background: url("<?php echo $img_folder_path.'nextArr.png'?>") no-repeat;
	background-size: 20px 20px;
	margin: 30px 0 0 10px;
}
.y_channel_title:hover
{
    color:#1b7fcc;
    text-decoration:underline;
    
}
.yclone_user_home_menu
{
    display:inline-block; 
    padding-bottom:7px; 
    font-weight:bold;
    cursor:pointer;
    color: #333;
    font-size:13px;
}
.yclone_user_home_menu:hover{
border-bottom: 3px solid #cc181e; 
}
.yclone_home_title_menu
{
    color: #333;
    font-size: 16px;
    font-weight: bold;
    cursor:pointer;
}

.yclone_home_title_menu:hover
{
    color:#1b7fcc;
}
.watch_later_property,.watch_later_property_rec,.sub_watch_later_property
{
    margin: 0px 2px 2px 0px;
    border-radius: 3px;
    right: 0;
    bottom: 0;
    position: absolute;
    padding: 3px;
    border: 1px solid #333;
    background: rgba(255, 255, 255, 0.5);
    cursor:pointer;
}
</style>

<script>
$hdwt(document).ready(function ()
{
	$hdwt('.slider_yclonehome').slider({ display: 1 });
	
	$hdwt('.clas_video_property').mouseover(function(){
		var getid = (this.id).split('video_property_')[1];
		$hdwt('#watch_video_'+getid).show();
		  
	}).mouseout(function(){
		var getid = (this.id).split('video_property_')[1];
		$hdwt('#watch_video_'+getid).hide();
	});

	$hdwt('.sub_clas_video_property').mouseover(function(){
		var getid = (this.id).split('sub_video_property_')[1];
		$hdwt('#sub_watch_video_'+getid).show();
		  
	}).mouseout(function(){
		var getid = (this.id).split('sub_video_property_')[1];
		$hdwt('#sub_watch_video_'+getid).hide();
	});
	
	
	$hdwt('.rec_video_property').mouseover(function(){
		var getid = (this.id).split('video_property_')[1];
		$hdwt('#rec_video_'+getid).show();
		  
	}).mouseout(function(){
		var getid = (this.id).split('video_property_')[1];
		$hdwt('#rec_video_'+getid).hide();
	});

	
	$hdwt('.watch_later_property').click(function(){

		var getid = (this.id).split('watch_video_')[1];
		var getit = (this.id);
			
		$hdwt.post(location.href,{watchlater:getid}, function( data ) {
		    if(data=='delete')
		    {
		    	$hdwt('#'+getit).html('<img src="<?php echo $img_folder_path;?>watch_later.png" style="width:15px; height:15px;">');
		    }
		    else
		    {		    
		    	$hdwt('#'+getit).html('<img src="<?php echo $img_folder_path;?>right.png" style="width:15px; height:15px;">');
		    }
			
		});
		return false;
			
	});

	$hdwt('.sub_watch_later_property').click(function(){

		var getid = (this.id).split('sub_watch_video_')[1];
		var getit = (this.id);
			
		$hdwt.post(location.href,{watchlater:getid}, function( data ) {
		    if(data=='delete')
		    {
		    	$hdwt('#'+getit).html('<img src="<?php echo $img_folder_path;?>watch_later.png" style="width:15px; height:15px;">');
		    }
		    else
		    {		    
		    	$hdwt('#'+getit).html('<img src="<?php echo $img_folder_path;?>right.png" style="width:15px; height:15px;">');
		    }
			
		});
		return false;
			
	});
	

	$hdwt('.watch_later_property_rec').click(function(){

		var getid = (this.id).split('rec_video_')[1];
		var getit = (this.id);
			
		$hdwt.post(location.href,{watchlater:getid}, function( data ) {
		    if(data=='delete')
		    {
		    	$hdwt('#'+getit).html('<img src="<?php echo $img_folder_path;?>watch_later.png" style="width:15px; height:15px;">');
		    }
		    else
		    {		    
		    	$hdwt('#'+getit).html('<img src="<?php echo $img_folder_path;?>right.png" style="width:15px; height:15px;">');
		    }
			
		});
		return false;
			
	});
	
	
	
});

</script>
<?php 
$get_settings = $wpdb->get_row("SELECT * FROM $settings_table_name");

require_once 'search.php';
$channel_view .= $topmenu;

$channel_view .='<div style="background:white; padding:10px 10px 0px 10px;; border:1px solid #e8e8e8; text-align:center;">';

$channel_view .='<div class="yclone_user_home_menu" style="border-bottom: 3px solid #cc181e;" >What to Watch</div>';
$channel_view .='<div class="yclone_user_home_menu" style="display:inline-block; margin-left:25px;" onclick="location.href=\''.$pluginurl.'mysubscriptions='.$_SESSION['your_current_channel'].'\'">My Subscriptions</div>';

$channel_view .='</div>';
$channel_view .='<div style="height:100%; background:#F0F0F0; padding: 20px 20px 0px 25px;">';

/* *********************************************** * POPULAR ON CHANEL * ************************************************* */

$pop_you_video = $wpdb->get_results($wpdb->prepare("SELECT * FROM $video_table_name  ORDER BY video_view DESC LIMIT 0,%d",$get_settings->videoperlist));
if($get_settings->sh_popularvideo == "yes")
{
$channel_view .='<div style="background:white; border-bottom:1px solid #C0C0C0; padding:10px;">';
$channel_view .='<div style="float: left;"><img src="'.$img_folder_path.'you_icon.jpg" style="width:25px; height:25px;"/></div><div class="yclone_home_title_menu" style="float: left; padding: 1px 0px 0px 10px;" onclick="location.href=\''.$pluginurl.'channel=1\'">Popular on '.$get_settings->hdw_sitename.'</div><div style="margin-bottom:10px; clear: both;"></div>';

$channel_view .='<div class="slider_yclonehome">';
$channel_view .='<a class="buttons prev">left</a>';
$channel_view .='<div class="viewport">';
$channel_view .='<ul style="padding:0 !important;" class="overview">';

for($i=0;$i<count($pop_you_video);$i++)
{
    $n = date('Y-m-d H:i:s');
    $video_upload_time = date_diff(
            date_create($pop_you_video[$i]->video_upload_time),
            date_create($n));
    
    $up_ago = "";
    if ($video_upload_time->y > 0) {
        $up_ago = $video_upload_time->y . " years ago";
    } else
    if ($video_upload_time->m > 0) {
        $up_ago = $video_upload_time->m . " months ago";
    } else
    if ($video_upload_time->d > 0) {
        $up_ago = $video_upload_time->d . " days ago";
    } else
    if ($video_upload_time->h > 0) {
        $up_ago = $video_upload_time->h . " hours ago";
    } else
    if ($video_upload_time->m > 0) {
        $up_ago = $video_upload_time->m . " mins ago";
    } else
    if ($video_upload_time->s > 0) {
        $up_ago = "Just now";
    }
    
    
    $get_channel_id = $wpdb->get_row( $wpdb->prepare("SELECT channel_id FROM $video_table_name WHERE video_id=%d" , $pop_you_video[$i]->video_id ));
    $get_channel_info = $wpdb->get_row ($wpdb->prepare("SELECT * FROM $channel_table_name WHERE channel_id=%d" , $get_channel_id->channel_id));
    
    $channel_view .='<li style="list-style-type: none !important;">
	                  <div class="clas_video_property" id="video_property_'.$pop_you_video[$i]->video_id.'" style="position:relative;  cursor:pointer; height:90px; width:170px; background-size: 170px 90px; background-image: url('.$pop_you_video[$i]->video_thumpnails.');" onclick="location.href=\''.$pluginurl.'v='.$pop_you_video[$i]->video_id.'\'">';
    $channel_view .='<div title="watch later"   style="display:none; height: 15px;" id="watch_video_'.$pop_you_video[$i]->video_id.'" class="watch_later_property"><img src="'.$img_folder_path.'watch_later.png" style="width:15px; height:15px;"/></div>';
    $channel_view .='</div>';
            
$channel_view .='<div class="y_channel_title" style="cursor:pointer; font-size:13px; width:170px; height:20px; overflow:hidden; color: #1b7fcc; font-weight:bold;" onclick="location.href=\''.$pluginurl.'v='.$pop_you_video[$i]->video_id.'\'">'.$pop_you_video[$i]->video_title.'</div>';
$channel_view .='<div style="color:#999;  margin-top: -3px; font-size: 11px;  width:170px; overflow:hidden;"><div style="display: inline-block;">by </div><div style="cursor:pointer; padding-left:3px; display: inline-block;" class="y_channel_title" onclick="location.href=\''.$pluginurl.'channel='.$get_channel_id->channel_id.'\'">'.$get_channel_info->channel_name.'</div></div>';
$channel_view .='<div style="color:#999;  margin-top: -3px; font-size: 11px; width:170px; overflow:hidden;">'.$pop_you_video[$i]->video_view.' views - '.$up_ago.'</div>';
            
 $channel_view .='</li>';
}
$channel_view .='</ul>';
$channel_view .='</div>';
$channel_view .='<a class="buttons next">right</a>';
$channel_view .='</div>';

$channel_view .='</div>';
}

/* ******************************************************************************* * Recommended * ***************************************************************** */
if($get_settings->sh_recommended == "yes")
{
$get_tags = $wpdb->get_row($wpdb->prepare("SELECT * FROM $channeltags_table_name WHERE userid=%d AND channelid=%d",$current_user->ID,$_SESSION['your_current_channel']));
$all_tags = explode(',', $get_tags->Tags);
for($k=1;$k<count($all_tags);$k++)
{
    if($k!=1){
        $video_query .= ' OR ';
    }
    $video_query .= ' video_title LIKE "%'.$all_tags[$k].'%" OR video_tags LIKE "%'.$all_tags[$k].'%" ';
}

$recom_video_query = "SELECT * FROM $video_table_name WHERE ".$video_query." LIMIT 0,".$get_settings->videoperrecommended;

$recomd_you_video = $wpdb->get_results($recom_video_query);
if(!$recomd_you_video){  
	$recomd_you_video = $wpdb->get_results($wpdb->prepare("SELECT * FROM $video_table_name ORDER BY RAND() LIMIT %d",$get_settings->videoperrecommended));
}
$channel_view .='<div style="background:white; border-bottom:1px solid #C0C0C0; padding:10px;">';
$channel_view .='<div style="float: left;"><img src="'.$img_folder_path.'you_icon.jpg" style="width:25px; height:25px;"/></div><div class="yclone_home_title_menu" style="float: left; padding: 1px 0px 0px 10px;">Recommended</div><div style="margin-bottom:10px; clear: both;"></div>';

$cnt = count($recomd_you_video);
if($cnt >= 12)
{
    $cnt = 12;
}

for($i=0;$i<$cnt;$i++)
{
    $n = date('Y-m-d H:i:s');
    $video_upload_time = date_diff(
            date_create($recomd_you_video[$i]->video_upload_time),
            date_create($n));
    
    $up_ago = "";
    if ($video_upload_time->y > 0) {
        $up_ago = $video_upload_time->y . " years ago";
    } else
    if ($video_upload_time->m > 0) {
        $up_ago = $video_upload_time->m . " months ago";
    } else
    if ($video_upload_time->d > 0) {
        $up_ago = $video_upload_time->d . " days ago";
    } else
    if ($video_upload_time->h > 0) {
        $up_ago = $video_upload_time->h . " hours ago";
    } else
    if ($video_upload_time->m > 0) {
        $up_ago = $video_upload_time->m . " mins ago";
    } else
    if ($video_upload_time->s > 0) {
        $up_ago = "Just now";
    }
    
    $get_channel_id = $wpdb->get_row( "SELECT channel_id FROM $video_table_name WHERE video_id=" . $recomd_you_video[$i]->video_id );
    $get_channel_info = $wpdb->get_row ( "SELECT * FROM $channel_table_name WHERE channel_id=" . $get_channel_id->channel_id );
    
    $channel_view .='<div style="float:left; margin-bottom:15px;">';    
    $channel_view .='<div class="rec_video_property" id="rec_video_property_'.$recomd_you_video[$i]->video_id.'" style="position:relative; margin-left:15px; height:90px; width:170px; cursor:pointer; background-size:170px 90px; background-image: url('.$recomd_you_video[$i]->video_thumpnails.');" onclick="location.href=\''.$pluginurl.'v='.$recomd_you_video[$i]->video_id.'\'">';
    $channel_view .='<div title="watch later" style="display:none;  height: 15px; " id="rec_video_'.$recomd_you_video[$i]->video_id.'" class="watch_later_property_rec"><img src="'.$img_folder_path.'watch_later.png" style="width:15px; height:15px;"/></div>';
    $channel_view .='</div>';
    $channel_view .='<div class="y_channel_title" style="margin-left:15px; cursor:pointer; font-size:13px; width:170px; height:20px; overflow:hidden; color: #1b7fcc; font-weight:bold;" onclick="location.href=\''.$pluginurl.'v='.$recomd_you_video[$i]->video_id.'\'">'.$recomd_you_video[$i]->video_title.'</div>';
    $channel_view .='<div style="margin-left:15px; color:#999;  margin-top: -3px; font-size: 11px;  width:170px; overflow:hidden;"><div style="display: inline-block;">by </div><div style="cursor:pointer; padding-left:3px; display: inline-block;" class="y_channel_title" onclick="location.href=\''.$pluginurl.'channel='.$get_channel_id->channel_id.'\'">'.$get_channel_info->channel_name.'</div></div>';
    $channel_view .='<div style="margin-left:15px; color:#999;  font-size: 11px; width:170px; overflow:hidden;">'.$recomd_you_video[$i]->video_view.' views - '.$up_ago.'</div>';   
    $channel_view .='</div>';
}
$channel_view .='<div style="clear:both;"></div>';
$channel_view .='</div>';

}
        
/* *********************************************** * SUBSCRIPTION CHANNAEL * ************************************************* */

if($get_settings->sh_subscriptionlist == "yes")
{

$ifsubscriptions = $wpdb->get_results($wpdb->prepare("SELECT * FROM $subscribtion_table_name WHERE user_id=%d AND channel_id=%d",$current_user->ID,$_SESSION['your_current_channel']));

if($ifsubscriptions)
{
for($j=0;$j<count($ifsubscriptions);$j++)
{
    $get_channel_info = $wpdb->get_row ( "SELECT * FROM $channel_table_name WHERE channel_id=" . $ifsubscriptions[$j]->subsc_channel_id);   
    
    if (filter_var ( $get_channel_info->channel_icon, FILTER_VALIDATE_EMAIL ))
    {
        $user_icon_src = "http://www.gravatar.com/avatar/" . md5 ( strtolower ( $get_user_info->channel_icon ) ) . "?d=" . urlencode ( $default ) . "&s=40";
    }
    else
    {
        $user_icon_src = $get_channel_info->channel_icon;
    }
    
    


$channel_view .='<div style="background:white; border-bottom:1px solid #C0C0C0; padding:10px;">';
$channel_view .='<div style="float: left;"><img src="'.$user_icon_src.'" style="width:25px; height:25px;"/></div><div class="yclone_home_title_menu" style="float: left; padding: 1px 0px 0px 10px;" onclick="location.href=\''.$pluginurl.'channel='.$get_channel_info->channel_id.'\'">'.$get_channel_info->channel_name.'</div><div style="margin-bottom:10px; clear: both;"></div>';

$channel_view .='<div class="slider_yclonehome">';
$channel_view .='<a class="buttons prev">left</a>';
$channel_view .='<div class="viewport">';
$channel_view .='<ul style="padding:0 !important;" class="overview">';

$subscr_you_video = $wpdb->get_results($wpdb->prepare("SELECT * FROM $video_table_name WHERE channel_id=%d LIMIT 0,%d",$ifsubscriptions[$j]->subsc_channel_id,$get_settings->videoperrecommended));

for($i=0;$i<count($subscr_you_video);$i++)
{
    $n = date('Y-m-d H:i:s');
    $video_upload_time = date_diff(
            date_create($subscr_you_video[$i]->video_upload_time),
            date_create($n));
    
    $up_ago = "";
    if ($video_upload_time->y > 0) {
        $up_ago = $video_upload_time->y . " years ago";
    } else
    if ($video_upload_time->m > 0) {
        $up_ago = $video_upload_time->m . " months ago";
    } else
    if ($video_upload_time->d > 0) {
        $up_ago = $video_upload_time->d . " days ago";
    } else
    if ($video_upload_time->h > 0) {
        $up_ago = $video_upload_time->h . " hours ago";
    } else
    if ($video_upload_time->m > 0) {
        $up_ago = $video_upload_time->m . " mins ago";
    } else
    if ($video_upload_time->s > 0) {
        $up_ago = "Just now";
    }
    
    
    $get_channel_id = $wpdb->get_row( "SELECT channel_id FROM $video_table_name WHERE video_id=" . $subscr_you_video[$i]->video_id );
    $get_channel_info = $wpdb->get_row ( "SELECT * FROM $channel_table_name WHERE channel_id=" . $get_channel_id->channel_id );
    
    $channel_view .='<li style="list-style-type: none !important;">
	                  <div class="sub_clas_video_property" id="sub_video_property_'.$subscr_you_video[$i]->video_id.'" style="position:relative;  cursor:pointer; height:90px; width:170px; background-size:cover; background-image: url('.$subscr_you_video[$i]->video_thumpnails.');" onclick="location.href=\''.$pluginurl.'v='.$subscr_you_video[$i]->video_id.'\'">';
    $channel_view .='<div title="watch later" style="display:none; height:15px;" id="sub_watch_video_'.$subscr_you_video[$i]->video_id.'" class="sub_watch_later_property"><img src="'.$img_folder_path.'watch_later.png" style="width:15px; height:15px;"/></div>';
    $channel_view .='</div>';
            
$channel_view .='<div class="y_channel_title" style="margin-left: 15px; cursor:pointer; font-size:13px; width:170px; height:20px; overflow:hidden; color: #1b7fcc; font-weight:bold;" onclick="location.href=\''.$pluginurl.'v='.$subscr_you_video[$i]->video_id.'\'">'.$subscr_you_video[$i]->video_title.'</div>';
$channel_view .='<div style="margin-left: 15px; color:#999;  margin-top: -3px; font-size: 11px;  width:170px; overflow:hidden;"><div style="display: inline-block;">by </div><div style="cursor:pointer; padding-left:3px; display: inline-block;" class="y_channel_title" onclick="location.href=\''.$pluginurl.'channel='.$get_channel_id->channel_id.'\'">'.$get_channel_info->channel_name.'</div></div>';
$channel_view .='<div style="margin-left: 15px; color:#999;  margin-top: -3px; font-size: 11px; width:170px; overflow:hidden;">'.$subscr_you_video[$i]->video_view.' views - '.$up_ago.'</div>';
            
 $channel_view .='</li>';
}
$channel_view .='</ul>';
$channel_view .='</div>';
$channel_view .='<a class="buttons next">right</a>';
$channel_view .='</div>';

$channel_view .='</div>';
}
}
}

/* *********************************************** * IF NO SUBSCRIPTION CHANNAEL * ************************************************* */

if($get_settings->premium_ids != "")
{

    $ifpremium =explode(",", $get_settings->premium_ids);
    
    if($ifpremium)
    {
        for($j=0;$j<count($ifpremium);$j++)
         {
             
                    $get_channel_info = $wpdb->get_row ( "SELECT * FROM $channel_table_name WHERE channel_id=" . $ifpremium[$j]);
            
                    
            
            if(isset($get_channel_info->channel_id)){
            
            $channel_view .='<div style="background:white; border-bottom:1px solid #C0C0C0; padding:10px;">';
            $channel_view .='<div style="float: left;"><img src="'.$get_channel_info->channel_icon.'" style="width:25px; height:25px;"/></div><div class="yclone_home_title_menu" style="float: left; padding: 1px 0px 0px 10px;" onclick="location.href=\''.$pluginurl.'channel='.$get_channel_info->channel_id.'\'">'.$get_channel_info->channel_name.'</div><div style="margin-bottom:10px; clear: both;"></div>';
            
            $channel_view .='<div class="slider_yclonehome">';
            $channel_view .='<a class="buttons prev">left</a>';
            $channel_view .='<div class="viewport">';
            $channel_view .='<ul style="padding:0 !important;" class="overview">';
            
            $subscr_you_video = $wpdb->get_results($wpdb->prepare("SELECT * FROM $video_table_name WHERE channel_id=%d LIMIT 0,%d",$ifpremium[$j],$get_settings->videoperrecommended));
            
            for($i=0;$i<count($subscr_you_video);$i++)
            {
                $n = date('Y-m-d H:i:s');
                $video_upload_time = date_diff(
                        date_create($subscr_you_video[$i]->video_upload_time),
                        date_create($n));
            
                        $up_ago = "";
                        if ($video_upload_time->y > 0) {
                        $up_ago = $video_upload_time->y . " years ago";
                    } else
                    if ($video_upload_time->m > 0) {
                    $up_ago = $video_upload_time->m . " months ago";
                    } else
                        if ($video_upload_time->d > 0) {
                        $up_ago = $video_upload_time->d . " days ago";
                        } else
                        if ($video_upload_time->h > 0) {
                        $up_ago = $video_upload_time->h . " hours ago";
                        } else
                if ($video_upload_time->m > 0) {
                $up_ago = $video_upload_time->m . " mins ago";
                        } else
                        if ($video_upload_time->s > 0) {
                                $up_ago = "Just now";
                    }
            
            
                                $get_channel_id = $wpdb->get_row( "SELECT channel_id FROM $video_table_name WHERE video_id=" . $subscr_you_video[$i]->video_id );
                                $get_channel_info = $wpdb->get_row ( "SELECT * FROM $channel_table_name WHERE channel_id=" . $get_channel_id->channel_id );
            
                $channel_view .='<li style="list-style-type: none !important;">
            	                  <div class="sub_clas_video_property" id="sub_video_property_'.$subscr_you_video[$i]->video_id.'" style="position:relative;  cursor:pointer; height:90px; width:170px; background-size:cover; background-image: url('.$subscr_you_video[$i]->video_thumpnails.');" onclick="location.href=\''.$pluginurl.'v='.$subscr_you_video[$i]->video_id.'\'">';
            	                  $channel_view .='<div title="watch later" style="display:none; height:15px;" id="sub_watch_video_'.$subscr_you_video[$i]->video_id.'" class="sub_watch_later_property"><img src="'.$img_folder_path.'watch_later.png" style="width:15px; height:15px;"/></div>';
                $channel_view .='</div>';
            
            $channel_view .='<div class="y_channel_title" style="cursor:pointer; font-size:13px; width:170px; height:20px; overflow:hidden; color: #1b7fcc; font-weight:bold;" onclick="location.href=\''.$pluginurl.'v='.$subscr_you_video[$i]->video_id.'\'">'.$subscr_you_video[$i]->video_title.'</div>';
            $channel_view .='<div style="color:#999;  margin-top: -3px; font-size: 11px;  width:170px; overflow:hidden;"><div style="display: inline-block;">by </div><div style="cursor:pointer; padding-left:3px; display: inline-block;" class="y_channel_title" onclick="location.href=\''.$pluginurl.'channel='.$get_channel_id->channel_id.'\'">'.$get_channel_info->channel_name.'</div></div>';
            $channel_view .='<div style="color:#999;  margin-top: -3px; font-size: 11px; width:170px; overflow:hidden;">'.$subscr_you_video[$i]->video_view.' views - '.$up_ago.'</div>';
            
             $channel_view .='</li>';
            }
            $channel_view .='</ul>';
            $channel_view .='</div>';
            $channel_view .='<a class="buttons next">right</a>';
            $channel_view .='</div>';
            
            $channel_view .='</div>';
            }
        }
}
}
/***************************************/
$channel_view .='        </div>';


?>