<style>.mychannel_home_channeltitle{    font-weight: bold;    color:#555;    font-size:12px;    cursor:pointer;}.mychannel_home_channeltitle:hover{    color: #1b7fcc;    text-decoration:underline;}.mychannel_home_videotitle{    color: #1b7fcc;    font-size:14px;    font-weight: bold;    cursor:pointer;   }.mychannel_home_videotitle:hover{    text-decoration:underline;}.watch_later_property_home{    margin: 0px 2px 2px 0px;    border-radius: 3px;    right: 0;    bottom: 0;    position: absolute;    padding: 3px;    border: 1px solid #333;    background: rgba(255, 255, 255, 0.5);    cursor:pointer;    height:15px;}@media screen and (max-width: 960px) {#yclone_ch_list, #channel_home_right {	width: 90% !important;	float:left !important;}}@media screen and (max-width: 480px) {#yclone_ch_list #channel_description{	width: 100% !important;	margin: 0 !important;}}</style><?php $homechannel .= '<div id="yclone_ch_list" style="width: calc(73% - 15px); overflow:hidden; background: white; float: left; padding: 15px; box-shadow: 0 1px 2px #989898;">';if ($total_video) {    for ($i = 0; $i < count($total_video); $i ++)    {        $n = date('Y-m-d H:i:s');        $video_upload_time = date_diff(                date_create($total_video[$i]->video_upload_time),                date_create($n));                $up_ago = "";        if ($video_upload_time->y > 0) {            $up_ago = $video_upload_time->y . " years ago";        } else        if ($video_upload_time->m > 0) {            $up_ago = $video_upload_time->m . " months ago";        } else        if ($video_upload_time->d > 0) {            $up_ago = $video_upload_time->d . " days ago";        } else        if ($video_upload_time->h > 0) {            $up_ago = $video_upload_time->h . " hours ago";        } else        if ($video_upload_time->m > 0) {            $up_ago = $video_upload_time->m . " mins ago";        } else        if ($video_upload_time->s > 0) {            $up_ago = "Just now";        }                     $homechannel .= '<div style="margin-bottom:10px; font-family:ariyal,sans-serif;">';        $homechannel .= '<div style="float:left; margin-right:5px;"><img src="'.$icon_src .'" style="width:30px; height:30px;"/></div>';        $homechannel .= '<div style="float:left; margin: 5px 0 0 5px;">';        $homechannel .= '<div style="display:inline-block; margin-right:5px;" class="mychannel_home_channeltitle">'.$channel_profile->channel_name .'</div><div style="display:inline-block; font-size:12px; color:#555; margin-bottom: 5px;"> uploaded a video</div>';        $homechannel .= '<div class="home_video_thumpnails" id="my_chn_'.$total_video[$i]->video_id.'" onclick="location.href=\''.$pluginurl.'v='.$total_video[$i]->video_id.'\'"  style="cursor:pointer; width:185px; height:104px; position: relative; background-image:url('.$total_video[$i]->video_thumpnails .'); background-size:100%;">';        $homechannel .= '<div class="watch_later_property_home" style="display:none;" id="wl_h_'.$total_video[$i]->video_id.'" title="watch later"><img src="'.$img_folder_path.'watch_later.png" style="width:15px; height:15px;"/></div>';        $homechannel .= '</div>';        $homechannel .= '</div>';        $homechannel .= '<div id="channel_description" style="float:left; margin: 10px 0 0 37px; ">';        $homechannel .= '<div class="mychannel_home_videotitle">'.$total_video[$i]->video_title.'</div>';        $homechannel .= '<div style="color:#555; font-size:12px; line-height: 25px;">'.$up_ago.' - '.$total_video[$i]->video_view.' views</div>';        $homechannel .= '<div style="color:#555; font-size:12px; word-wrap: break-word;">'.$total_video[$i]->video_description.'</div>';        $homechannel .= '</div>';        $homechannel .= '<div style="clear:both;"></div>';        $homechannel .= '</div>';    }} else {    $homechannel .= '<div style="height:300px; text-align:center;">No Recent Activity</div>';}$homechannel .= '</div>';$homechannel .= '<div id="channel_home_right" style="width: 22%; float: right;">';        /* * ************************************* * ADD CHANNEL * ************************************************ * */if($get_settings->sh_featuredchannels == "yes"){
$homechannel .= '<div style="padding: 10px; background: white; box-shadow: 0 1px 2px #989898;">';$get_add_channellist = $wpdb->get_results($wpdb->prepare("SELECT * FROM $addchannellist_table_name WHERE channelid=%d" ,$_GET['channel']));$homechannel .= '<div id="yclone_add_your_channel" style="padding-bottom: 10px; font-weight: bold; color: #333; font-size: 18px;">' .$add_channel->channelname . '</div>';$homechannel .= '<div style="margin-bottom: 10px;">';$homechannel .= '<div id="add_ch_list_v"></div>';if ($get_add_channellist){    for ($i = 0; $i < count($get_add_channellist); $i ++)     {        $homechannel .= '<div style="float: left;"><img src="' . $get_add_channellist[$i]->channelthumb .'" style="width: 30px; height: 30px;" /></div>';    	$homechannel .= '<div style="margin-left: 10px; float: left;"><span style="color: #2793e6; font-weight: bold; font-size: 14px;" id="you_sub_ch_name_'.$get_add_channellist[$i]->add_channelid.'">' . $get_add_channellist[$i]->channelname . '</span><br>';    	$homechannel .= '<div class="btn_subscr_mychannel_others" id="you_subscr_'.$get_add_channellist[$i]->add_channelid.'">subscribe</div>';    	$homechannel .= '</div><div style="clear: both;"></div>';    }}$homechannel .= '</div>';if($chceck_channel_profile){    $homechannel .= '<div class="yclone_btn_1" id="yclone_add_channels" onclick="popuppppp(\'add_new_channel\',\'add_new_channel_handle\');">+Add Channels</div>';}						$homechannel .= '</div>';}/* * ************************************* * POPULAR CHANNELS * ************************************************ * */$date = strtotime(date('Y-m-d H:i:s').' -1 month');$get_date = date('Y-m-d H:i:s', $date);$get_videos_channel = $wpdb->get_results($wpdb->prepare("SELECT channel_id FROM $video_table_name WHERE video_upload_time >= %s AND channel_id NOT IN(SELECT subsc_channel_id FROM $subscribtion_table_name WHERE channel_id = %d) GROUP BY channel_id ORDER BY video_view DESC LIMIT 0 , 10",$get_date,$_GET['channel']));if($get_settings->sh_popularchannels == "yes"){    
	$homechannel .= '<div style="padding: 10px; margin-top: 8px; background: white; box-shadow: 0 1px 2px #989898;">';	$homechannel .= '<div style="font-weight: bold; color: #333; font-size: 18px;">Popular Channels</div>';		for($i=0;$i<count($get_videos_channel);$i++)	{		    $get_channel = $wpdb->get_row($wpdb->prepare("SELECT * FROM $channel_table_name WHERE channel_id=%s",$get_videos_channel[$i]->channel_id));	    $homechannel .= '<div style="margin-top: 10px;">';	    $homechannel .= '<div style="float: left;"><img src="'.$get_channel->channel_icon.'" style="width: 30px; height: 30px;" /></div>';	    $homechannel .= '<div style="margin-left: 10px; float: left;  width: calc(100% - 40px);"><div style="line-height: 1; overflow:hidden; color: #2793e6; font-weight: bold; font-size: 14px;" id="you_sub_ch_name_'.$get_channel->channel_id.'">'.$get_channel->channel_name.'</div>';	    $homechannel .= '<div class="btn_subscr_mychannel_others" id="you_subscr_'.$get_channel->channel_id.'">subscribe</div>';	    $homechannel .= '</div><div style="clear: both;"></div></div>';	}		$homechannel .= '</div>';}$homechannel .= '</div><div style="clear: both;"></div>';?>