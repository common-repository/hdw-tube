<style>
.yclone_user_browse_menu
{
    display:inline-block; 
    padding-bottom:7px; 
    font-weight:bold;
    cursor:pointer;
    color: #333;
    font-size:13px;
}

.yclone_user_browse_menu:hover
{
    border-bottom: 3px solid #cc181e !important;
   
}
.yclone_browse_channel_heading
{
    font-weight: bold;
    font-size: 18px;
    color: #333;
    padding-bottom:10px;
}
.yclone_browse_channel_title
{
    color: #000;
    font-size: 14px;
    line-height: 1.4em;
    font-weight: bold;
    margin-top: .5em;
    cursor:pointer;
    
    
}
.yclone_browse_channel_title:hover{
text-decoration:underline;
color:blue;
}

.yclone_browse_channel_description
{
    overflow: hidden;
    margin-top: 10px;
    margin-right: 30px;
    color: #999;
    font-size: 11px;
    line-height: 1.4em;
    max-height: 4.2em;
}

.browse_btn_subscribe,.browse_nobtn_subscribe
{
    display:inline-block;
    padding:1px 10px;
    color:#fff;
    background:red;
    margin-top: .5em;
    border: 1px outset buttonface;
    cursor:pointer;
    border-radius:3px;
    font-size:12px;
    
}
.browse_btn_unsubscribe
{
    cursor: pointer;
    padding: 3px 10px;
    font-size: 12px;
    font-family: ariyal,sans-serif;
    border-radius: 2px;
    border: 1px solid #ccc;
    color: #999;
    background-image: linear-gradient(to top, #f6f6f6 0, #fcfcfc 100%);
}
.browse_btn_subscribe:active
{
    position:relative;
    top:1px;
}

.browse_channel_list1,.recommended_channel,.music_channel,.comedy_channel,.FilmandAnimation_channel,.sports_channel,.gaming_channel
{
    opacity:.5;
}


@media screen and (max-width: 960px) {
#browse_best_left, #browse_rec_right {
	width: 90% !important;
}
#browse_rec_right {
	margin-left: 0px !important;
}
}

@media screen and (max-width: 480px) {
#top_video_part, #top_video_left, #top_video_right {
	width: 100% !important;
}
#top_right_right, #top_right_left{
	width: 45% !important;
}
}

</style>
<script>
$hdwt(document).ready(function()
{
    $hdwt('.browse_channel_list1').click(function(){
        $hdwt('.browse_channel_list1_channels').hide();
        $hdwt('#content_'+this.id).show();
        $hdwt('.browse_channel_list1').css("opacity",".5");
        $hdwt(this).css("opacity","1");   
    });

    $hdwt('.recommended_channel').click(function(){

    	 $hdwt('.content_recommended_channel').hide();
         $hdwt('#content_'+this.id).show();
         $hdwt('.recommended_channel').css("opacity",".5");
         $hdwt(this).css("opacity","1");   
    });

    $hdwt('.my_browse_channel').click(function()
    {
        $get_id = this.id
        $cate = $get_id.substring(0,$get_id.indexOf("_"));
        $hdwt('.content_'+$cate+'_channel').hide();
        $hdwt('#content_'+this.id).show();
        $hdwt('.'+$cate+'_channel').css("opacity",".5");
        $hdwt(this).css("opacity","1");   
   });
       
    $hdwt('.browse_btn_subscribe,.browse_btn1_subscribe').click(function(){
    	var channelid   = this.id.split('`')[0];
    	var channelname = this.id.split('`')[1];

    	$hdwt.post(location.href,{subscribechannel:channelid,subsc_channel_name:channelname}, function( data ) {
    		location.reload();
		});
    });

    $hdwt('.browse_btn_unsubscribe,.browse_btn1_unsubscribe').click(function(){
    	var channelid   = this.id;
    
    	$hdwt.post(location.href,{unsubscribechannel:channelid}, function( data ) {
			   location.reload();	
		});
    });
    

    $hdwt('.browse_nobtn_subscribe').click(function()
    {
        alert('Please login to subscribe this channel');
    });
    
});
</script>
<?php
$get_settings = $wpdb->get_row("SELECT * FROM $settings_table_name");


$browse_channel .='<div style="font-family:calibri; background:white; padding:10px 10px 0px 10px;; border:1px solid #e8e8e8; text-align:center;">';
$browse_channel .='<div class="yclone_user_browse_menu" style=" display:inline-block;  border-bottom: 3px solid #cc181e;  margin-right:25px;">Browse Channels</div>';

if($current_user->ID)
{
    $browse_channel .='<div class="yclone_user_browse_menu" style="font-weight: normal;" onclick="location.href=\''.$pluginurl.'subscription_manager='.$_SESSION['your_current_channel'].'\'">Manage Subscriptions</div><div style="clear:both;"></div>';
}
else
{
    $browse_channel .='<div class="yclone_user_browse_menu" style="font-weight: normal;">Manage Subscriptions</div><div style="clear:both;"></div>';
}
$browse_channel .='</div>';

$browse_channel .='<div style="font-family: arial,sans-serif; background:#f1f1f1; padding:10px;">';
$browse_channel .='<div id="browse_best_left" style="float:left; box-shadow: 0 1px 2px rgba(0,0,0,.1); -moz-box-sizing: border-box; width:70%; background:#fff; padding:10px;">';

/************** * BEST OF YOUTUBE * ***********************/

$browse_channel .='<div id="browse_channel_bestof youtube">';
$browse_channel .='<div id="title" class="yclone_browse_channel_heading">Best of '.$get_settings->hdw_sitename.'</div>';


$get_channels = $wpdb->get_results("SELECT * FROM $channel_table_name WHERE userid=1");
for($i=0;$i<count($get_channels);$i++)
{
    $browse_channel .='<div title="'.$get_channels[$i]->channel_name.'" style="cursor:pointer; float:left; margin-right:5px;" class="browse_channel_list1" id="browse_channel_list1_'.$i.'"><img src="'.$get_channels[$i]->channel_icon.'" style="width:40px; height:40px;"/></div>';
}
$browse_channel .='<div style="clear:both;"></div></div>';

for($j=0;$j<count($get_channels);$j++)
{
    if($j == 0){
        $browse_channel .='<div class="browse_channel_list1_channels" id="content_browse_channel_list1_'.$j.'" style="border: solid 1px #d9d9d9; box-shadow: 0 1px 2px rgba(0,0,0,.1); -moz-box-sizing: border-box;">';
    }else{
        $browse_channel .='<div class="browse_channel_list1_channels" id="content_browse_channel_list1_'.$j.'" style="display:none; border: solid 1px #d9d9d9; box-shadow: 0 1px 2px rgba(0,0,0,.1); -moz-box-sizing: border-box;">';
    }
    $browse_channel .='<div style="float:left; width:20%;"><img src="'.$get_channels[$j]->channel_icon.'"/></div>';
    $browse_channel .='<div style="float:left; padding:10px; width:75%;">';
    $browse_channel .='<div style="float:left;" class="yclone_browse_channel_title" onclick="location.href=\''.$pluginurl.'channel='.$get_channels[$j]->channel_id.'\'">'.$get_channels[$j]->channel_name.'</div>';
    
    $browse_channel .='<div style="float:right;">';
    
    $get_subscr = $wpdb->get_row($wpdb->prepare("SELECT * FROM $subscribtion_table_name WHERE channel_id=%d AND subsc_channel_id=%d",$_SESSION['your_current_channel'],$get_channels[$j]->channel_id));
    
    if($current_user->ID)
    {
        if($get_subscr)
        {
            $browse_channel .='<div class="browse_btn_unsubscribe" id="'.$get_channels[$j]->channel_id.'">Unsubscribe</div>';    
        }
        else
        {
            $browse_channel .='<div class="browse_btn_subscribe" id="'.$get_channels[$j]->channel_id.'`'.$get_channels[$j]->channel_name.'">Subscribe</div>';
        }
    } 
    else 
    {
        $browse_channel .='<div class="browse_nobtn_subscribe">Subscribe</div>';
    }
            
     $browse_channel .='</div><div style="clear:both;"></div>';
    
    $browse_channel .='<div class="yclone_browse_channel_description">'.$get_channels[$j]->Description.'</div>';
    $browse_channel .='<div style="font-weight: bold; color: #444; font-size: 11px; margin:10px 0;text-transform: uppercase;">PREVIEW</div>';

    $get_videos = $wpdb->get_results("SELECT * FROM $video_table_name WHERE channel_id=".$get_channels[$j]->channel_id." LIMIT 0,3");
    for($i=0;$i<count($get_videos);$i++)
    {
        $browse_channel .='<div style="float:left; margin-right:5px; cursor:pointer;" onclick="location.href=\''.$pluginurl.'v='.$get_videos[$i]->video_id.'\'"><img src="'.$get_videos[$i]->video_thumpnails.'" style="height:50px; width:100px;"/></div>';
    }
    $browse_channel .='<div style="clear:both;"></div>';
    $browse_channel .='</div><div style="clear:both;"></div>';
    $browse_channel .='</div>';

}

/* * * ***** * * * * **************** RECOMMENDED CHANNEL *************** * * * * ******************* ** * **********/
$get_recommed = $wpdb->get_results("SELECT * FROM $recommeded_table_name");

if($get_recommed){
$browse_channel .='<div style="margin-top:15px;" id="browse_channel_recommended youtube">';
$browse_channel .='<div id="title" class="yclone_browse_channel_heading">Recommended for you</div>';

for($i=0;$i<count($get_recommed);$i++)
{
    $get_channel_prof = $wpdb->get_row("SELECT * FROM $channel_table_name WHERE channel_id=".$get_recommed[$i]->r_channelid);
    $browse_channel .='<div title="'.$get_channel_prof->channel_name.'" style="cursor:pointer; float:left; margin-right:5px;" class="recommended_channel" id="recommended_channel_'.$i.'"><img src="'.$get_channel_prof->channel_icon.'" style="width:40px; height:40px;"/></div>';
}
$browse_channel .='<div style="clear:both;"></div></div>';

for($j=0;$j<count($get_recommed);$j++)
{
    $get_channel_prof = $wpdb->get_row("SELECT * FROM $channel_table_name WHERE channel_id=".$get_recommed[$j]->r_channelid);
    if($j == 0){
        $browse_channel .='<div class="content_recommended_channel" id="content_recommended_channel_'.$j.'" style="border: solid 1px #d9d9d9; box-shadow: 0 1px 2px rgba(0,0,0,.1); -moz-box-sizing: border-box;">';
    }else{
        $browse_channel .='<div class="content_recommended_channel" id="content_recommended_channel_'.$j.'" style="display:none; border: solid 1px #d9d9d9; box-shadow: 0 1px 2px rgba(0,0,0,.1); -moz-box-sizing: border-box;">';
    }
    $browse_channel .='<div style="float:left; width:20%;"><img src="'.$get_channel_prof->channel_icon.'" /></div>';
    $browse_channel .='<div style="float:left;  padding:10px; width:75%;">';
    $browse_channel .='<div style="float:left;" class="yclone_browse_channel_title" onclick="location.href=\''.$pluginurl.'channel='.$get_channel_prof->channel_id.'\'">'.$get_channel_prof->channel_name.'</div>';
    $browse_channel .='<div style="float:right;">';
    
    $get_subscr = $wpdb->get_row($wpdb->prepare("SELECT * FROM $subscribtion_table_name WHERE channel_id=%d AND subsc_channel_id=%d",$_SESSION['your_current_channel'],$get_channel_prof->channel_id));   
    if($current_user->ID)
    {
        if($get_subscr)
        {
            $browse_channel .='<div class="browse_btn_unsubscribe" id="'.$get_channel_prof->channel_id.'">Unsubscribe</div>';    
        }
        else
        {
            $browse_channel .='<div class="browse_btn_subscribe" id="'.$get_channel_prof->channel_id.'`'.$get_channel_prof->channel_name.'" >Subscribe</div>';
        }
    } 
    else 
    {
        $browse_channel .='<div class="browse_nobtn_subscribe">Subscribe</div>';
    }          
    $browse_channel .='</div><div style="clear:both;"></div>';
    
    $browse_channel .='<div class="yclone_browse_channel_description">'.$get_channel_prof->Description.'</div>';
    $browse_channel .='<div style="font-weight: bold; color: #444; font-size: 11px; margin:10px 0;text-transform: uppercase;">PREVIEW</div>';

    $get_videos = $wpdb->get_results("SELECT * FROM $video_table_name WHERE channel_id=".$get_channel_prof->channel_id." LIMIT 0,3");
    for($i=0;$i<count($get_videos);$i++)
    {
        $browse_channel .='<div style="float:left; margin-right:5px; cursor:pointer;" onclick="location.href=\''.$pluginurl.'v='.$get_videos[$i]->video_id.'\'"><img src="'.$get_videos[$i]->video_thumpnails.'" style="height:50px; width:100px;"/></div>';
    }
    $browse_channel .='<div style="clear:both;"></div>';
    $browse_channel .='</div><div style="clear:both;"></div>';
    $browse_channel .='</div>';

}
}


/************************************************/


if($get_settings->categoryids != "")
{
    $ifpremium =explode(",", $get_settings->categoryids);
    if($ifpremium)
    {
        for($k=0;$k<count($ifpremium);$k++)
        {
            $get_comment_info = $wpdb->get_row ( "SELECT * FROM $category_table_name WHERE id=" . $ifpremium[$k]);
            if(isset($get_comment_info->id))
            {
                $get_recommed = $get_channels = $wpdb->get_results("SELECT * FROM $channel_table_name WHERE channel_category='".$get_comment_info->value."' ORDER BY RAND() LIMIT 0,10;");
                
                
                if($get_recommed){
                    $browse_channel .='<div style="margin-top:15px;" id="browse_channel_music youtube">';
                    $browse_channel .='<div id="title" class="yclone_browse_channel_heading">'.$get_comment_info->category.'</div>';
                
                    for($i=0;$i<count($get_recommed);$i++)
                    {
                        $get_channel_prof = $wpdb->get_row("SELECT * FROM $channel_table_name WHERE channel_id=".$get_recommed[$i]->channel_id);
                        $browse_channel .='<div title="'.$get_channel_prof->channel_name.'" style="cursor:pointer; float:left; margin-right:5px;" class="my_browse_channel" id="'.$get_comment_info->value.'_channel_'.$i.'"><img src="'.$get_channel_prof->channel_icon.'" style="width:40px; height:40px;"/></div>';
                    }
                    $browse_channel .='<div style="clear:both;"></div></div>';
                
                    for($j=0;$j<count($get_recommed);$j++)
                    {
                    $get_channel_prof = $wpdb->get_row("SELECT * FROM $channel_table_name WHERE channel_id=".$get_recommed[$j]->channel_id);
                    if($j == 0){
                    $browse_channel .='<div class="content_'.$get_comment_info->value.'_channel" id="content_'.$get_comment_info->value.'_channel_'.$j.'" style="border: solid 1px #d9d9d9; box-shadow: 0 1px 2px rgba(0,0,0,.1); -moz-box-sizing: border-box;">';
                    }else{
                    $browse_channel .='<div class="content_'.$get_comment_info->value.'_channel" id="content_'.$get_comment_info->value.'_channel_'.$j.'" style="display:none; border: solid 1px #d9d9d9; box-shadow: 0 1px 2px rgba(0,0,0,.1); -moz-box-sizing: border-box;">';
                    }
$browse_channel .='<div style="float:left; width:20%;"><img src="'.$get_channel_prof->channel_icon.'"/></div>';
$browse_channel .='<div style="float:left;  padding:10px; width:75%;">';
$browse_channel .='<div style="float:left;" class="yclone_browse_channel_title" onclick="location.href=\''.$pluginurl.'channel='.$get_channel_prof->channel_id.'\'">'.$get_channel_prof->channel_name.'</div>';
                
$browse_channel .='<div style="float:right;">';
                
                $get_subscr = $wpdb->get_row($wpdb->prepare("SELECT * FROM $subscribtion_table_name WHERE channel_id=%d AND subsc_channel_id=%d",$_SESSION['your_current_channel'],$get_channel_prof->channel_id));
                    if($current_user->ID)
                    {
                    if($get_subscr)
                    {
                    $browse_channel .='<div class="browse_btn_unsubscribe" id="'.$get_channel_prof->channel_id.'">Unsubscribe</div>';
                    }
                    else
                        {
                            $browse_channel .='<div class="browse_btn_subscribe" id="'.$get_channel_prof->channel_id.'`'.$get_channel_prof->channel_name.'" >Subscribe</div>';
                        }
                        }
                        else
{
    $browse_channel .='<div class="browse_nobtn_subscribe">Subscribe</div>';
}
$browse_channel .='</div><div style="clear:both;"></div>';
$browse_channel .='<div class="yclone_browse_channel_description">'.$get_channel_prof->Description.'</div>';
$browse_channel .='<div style="font-weight: bold; color: #444; font-size: 11px; margin:10px 0;text-transform: uppercase;">PREVIEW</div>';
                
                $get_videos = $wpdb->get_results("SELECT * FROM $video_table_name WHERE channel_id=".$get_channel_prof->channel_id." LIMIT 0,3");
                for($i=0;$i<count($get_videos);$i++)
{
$browse_channel .='<div style="float:left; margin-right:5px; cursor:pointer;" onclick="location.href=\''.$pluginurl.'v='.$get_videos[$i]->video_id.'\'"><img src="'.$get_videos[$i]->video_thumpnails.'" style="height:50px; width:100px;"/></div>';
    }
        $browse_channel .='<div style="clear:both;"></div>';
    $browse_channel .='</div><div style="clear:both;"></div>';
                    $browse_channel .='</div>';
                
                }
                }
            }
        }
    }
}

 /*******************************/


$browse_channel .='</div>';


 /************************ * RECOMMENDED CHANNELS * ************************/
$browse_channel .='<div id="browse_rec_right" style="float:left; box-shadow: 0 1px 2px rgba(0,0,0,.1); -moz-box-sizing: border-box; background:#fff; margin-left:10px; width:20%; padding:10px;">';
$browse_channel .='<div style="font-weight: bold; color: #333; font-size: 16px;">Recommended Channels</div>';

$get_recommended_channel = $wpdb->get_results("SELECT * FROM $recommeded_table_name");

for($i=0;$i<count($get_recommended_channel);$i++)
{	
    $get_channel_details = $wpdb->get_row("SELECT * FROM $channel_table_name WHERE channel_id=".$get_recommended_channel[$i]->r_channelid);
    $browse_channel .='<div style="margin-top: 10px;">';
    $browse_channel .='	<div style="float: left;"><img src="'.$get_channel_details->channel_icon.'" style="width: 30px; height: 30px;" /></div>';
    $browse_channel .='	<div style="margin-left: 10px; float: left;  width: calc(100% - 40px);">';
    $browse_channel .='       <span style="color: #2793e6; font-weight: bold; font-size: 11px;">'.$get_channel_details->channel_name.'</span><br>';
    
    if($current_user->ID)
    {
        $get_subscr = $wpdb->get_row($wpdb->prepare("SELECT * FROM $subscribtion_table_name WHERE channel_id=%d AND subsc_channel_id=%d",$_SESSION['your_current_channel'],$get_recommended_channel[$i]->r_channelid));
        if($get_subscr)
        {
            $browse_channel .='<div class="browse_btn1_unsubscribe" id="'.$get_channel_details->channel_id.'" style="display: inline-block; border: 1px solid #999; cursor: pointer; border-radius: 2px; padding: 0px 5px 0px 5px; background-color: rgb(245, 245, 245); font-size: 11px;">unsubscribe</div>';
        }  
        else 
        { 
            $browse_channel .='<div class="browse_btn1_subscribe" id="'.$get_channel_details->channel_id.'`'.$get_channel_details->channel_name.'"  style="display: inline-block; border: 1px solid #999; cursor: pointer; border-radius: 2px; padding: 0px 5px 0px 5px; background-color: rgb(245, 245, 245); font-size: 11px;">subscribe</div>';
        }
    }
    else 
    {
        $browse_channel .='<div style="display: inline-block; border: 1px solid #999; cursor: pointer; border-radius: 2px; padding: 0px 5px 0px 5px; background-color: rgb(245, 245, 245); font-size: 11px;">subscribe</div>';
    }
    
    $browse_channel .='	</div><div style="clear: both;"></div>';
    $browse_channel .='</div>';
}
$browse_channel .='</div>';
$browse_channel .='<div style="clear:both;"> </div>';

$browse_channel .='</div>';

?>
