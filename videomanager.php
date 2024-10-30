<script>
$hdwt(document).ready(function(){

    $hdwt('.vmgr_yclone').click(function (){
        if($hdwt(this).is(':checked')){
            this.parentNode.parentNode.className = 'badusha';
            $hdwt('.yclone_btn_videomanager').css('opacity','1');
        }else{
            this.parentNode.parentNode.className = '';
            $hdwt('.cls_menu_mngr').hide();
            $hdwt('.yclone_btn_videomanager').css('opacity','.5');
        }
    });

        $hdwt('#mgr_all_checkbox').click(function(){

            if($hdwt(this).is(':checked'))
            {
                $hdwt('.vmgr_yclone').prop('checked', this.checked);
                $hdwt('.yclone_btn_videomanager').css('opacity','1');
            }
            else
            {
                $hdwt('.vmgr_yclone').prop('checked', false);
                $hdwt('.cls_menu_mngr').hide();
                $hdwt('.yclone_btn_videomanager').css('opacity','.5');
            }
        });

        $hdwt('.yclone_btn_videomanager').click(function()
        {
            if($hdwt('.vmgr_yclone').is(':checked'))
            {
                if($hdwt('#content_'+this.id).css('display')=='none')
                {
                    $hdwt('.cls_menu_mngr').hide();
                    $hdwt('#content_'+this.id).show();
                }
                else
                {
                    $hdwt('.cls_menu_mngr').hide();
                }
            }             
        });

        $hdwt('.action_menu_mgr').click(function(){
            var ids = '';
            var action = this.id;
            $hdwt('.vmgr_yclone').each(function (){
                if($hdwt(this).is(':checked')){
                	ids += '`' + this.id;
                }
            });
            $hdwt.post(location.href, { configvideo:ids, action:action }, function(){
            	location.reload();
            });
        });        

        $hdwt('.playlist_menu_mgr1').click(function(){

        	var ids = '';
        	$hdwt('.vmgr_yclone').each(function (){
                if($hdwt(this).is(':checked')){
                	ids += '`' + this.id;
                }
            });
            
            $hdwt.post(location.href, { watchlaterconfig:ids }, function(){
            	location.reload();
            });
       });
		
        $hdwt('.playlist_menu_mgr').click(function(){

        	var ids = '';
        	var playlistid = this.id;

        	$hdwt('.vmgr_yclone').each(function (){
                if($hdwt(this).is(':checked')){
                	ids += '`' + this.id;
                }
            });
            
            $hdwt.post(location.href, { mngrplaylistadd:playlistid, mngrvideoid:ids }, function(){
            	location.reload();
            });
       });

        $hdwt('#add_tagsto_video').click(function(){
            var tags = $hdwt('#txt_tags_videos').val();

            var ids = '';
            
        	$hdwt('.vmgr_yclone').each(function (){
                if($hdwt(this).is(':checked')){
                	ids += '`' + this.id;
                }
            });
            
            $hdwt.post(location.href, { addvideotags:tags,addtagvideoid:ids}, function(){
            	location.reload();
            });
            
            $hdwt('#txt_tags_videos').val('');
        	
        });    		

});

    </script>
    <style>
    .yclone_btn_videomanager
    {
        color: #333;
        border: solid 1px transparent;
        font-weight: bold;
        font-size: 11px;
        background: #f8f8f8;
        border-color: #d3d3d3;
        border-radius: 2px;
        padding:3px 10px 3px 10px;
        cursor:pointer;
        margin-left:10px;
        display:inline-block;
        opacity:.5;
    }
    .yclone_btn_videomanager:hover
    {
        box-shadow: 1px 1px 1px #D8D8D8;
    }
    .yclone_btn_videomanager:active
    {
        position: relative;
        top:1px;
    }

    .search_text_box
    {
        margin: 0;
        border: 0;
        outline: none;
        background: transparent;
        font-size: 13px;
    }
    .search_box
    {
        position: relative;
        overflow: hidden;
        height:24px;

        border: 1px solid #ccc;
        box-shadow: inset 0 2px 24px #EEE;
    }
    .title_video_manager
    {
        color: #333;
        font-size: 13px;
        cursor:pointer;
        line-height: 17px;
    }
    .title_video_manager:hover
    {
        text-decoration:underline;
        color:#1b7fcc;

    }

    .cls_menu_mngr
    {
        z-index:10;
    }
    .badusha{
        background:#ecf4fb;
    }
    .action_menu_mgr
    {
        color: #333;
        font-size: 13px;
        line-height: 25px;
        cursor:pointer;
        padding-left:10px;
    }

    .action_menu_mgr:hover
    {
        color:#fff;
        background:#333;
    }
    .playlist_menu_mgr,.playlist_menu_mgr1
    {

        color: #333;
        font-size: 13px;
        line-height: 25px;
        cursor:pointer;
        padding-left:10px;
    }

    .playlist_menu_mgr:hover,.playlist_menu_mgr1:hover
    {
        background:#eee;
    }

    .add_tag_mgr
    {
        font-size: 11px;
        cursor: pointer;
        border-top: 1px solid #ccc;
        text-align: right;
        padding-right: 5px;
    }

    .add_tag_mgr:hover
    {
        background:#999;
    }
    </style>
<?php
$get_videos = $wpdb->get_results($wpdb->prepare("SELECT * FROM $video_table_name where user_id =%d AND channel_id=%d",$current_user->ID,$_SESSION['your_current_channel']));


$channel .= '<div id="video_manager" style="display:block; font-family: arial,sans-serif; background: #E0E0E0; color:#555; border: 1px solid #D0D0D0; padding: 20px;">';

$channel .= '<div style="border-bottom:1px solid #C0C0C0;padding:15px; background: WHITE;">';
$channel .= '<div style=" float:left;"><span style="font-fmaily:calibri; font-weight:bold; font-size:18px; padding-right:15px;">Uploads</span><label style="background: rgb(146, 143, 143);border-radius: 5px;padding: 3px;font-size: 15px;color: white;font-weight: bold;">'.count($get_videos).'</label></div>';
$channel .= '<div style="clear:both;"></div>';


$channel .= '<div style="margin: 15px 15px 0px 0px;">';

$channel .= '<div style="float:left"><input id="mgr_all_checkbox" type="checkbox" style="width:15px; height:15px;"/></div>';
$channel .= '<div style="float:left">';
$channel .= '<div class="yclone_btn_videomanager" id="action_menu_mngr" style="position:relative;">Action<img src="'.$img_folder_path.'action.png" style="margin-left:5px; width:8px; height:5px;"/></div>';

$channel .= '<div id="content_action_menu_mngr" class="cls_menu_mngr" style="position:absolute; font-family: arial,sans-serif; display:none; margin-left:10px; background:#fff; line-height: 25px; width:125px; border:1px solid #ccc;">';
$channel .= '<div style="color: #aaa; font-size: 13px; font-weight: bold;">Privacy</div>';
$channel .= '<div id="public" class="action_menu_mgr">Public</div>';
$channel .= '<div id="private" class="action_menu_mgr">Private</div>';
$channel .= '<div id="delete" class="action_menu_mgr" style="border-top: 1px solid #ccc;">Delete</div>';
$channel .= '</div>';

$channel .= '</div>';


$channel .= '<div style="float:left">';

$channel .= '<div class="yclone_btn_videomanager" id="playlist_menu_mngr" style="position:relative;" >Playlists<img src="'.$img_folder_path.'action.png" style="margin-left:5px; width:8px; height:5px;"/></div>';

$channel .= '<div id="content_playlist_menu_mngr" class="cls_menu_mngr" style="font-family: arial,sans-serif; background:#fff; margin-left:10px; position:absolute; display:none; line-height: 25px; width:125px; border:1px solid #ccc; height:150px; overflow:auto; overflow:x-hidden;">';

$getwatchlater = $wpdb->get_results($wpdb->prepare("SELECT * FROM $watchlater_table_name WHERE userid=%d AND channelid=%d",$current_user->ID,$_SESSION['your_current_channel']));

$channel .= '<div style="margin-top:10px;" class="playlist_menu_mgr1"><img src="'.$img_folder_path.'private.jpg" style="width:10px; height:10px;"/> Watch Later<span style="color: #bbb; font-size:10px;">('.count($getwatchlater).')</span></div>';


$get_playlist = $wpdb->get_results($wpdb->prepare("SELECT * FROM $playlisttitle_table_name WHERE userid=%d AND channelid=%d",$current_user->ID,$_SESSION['your_current_channel']));

for($i=0;$i<count($get_playlist);$i++)
{
    $get_playlist_info = $wpdb->get_results("SELECT * from $playlist_table_name WHERE playlistid=".$get_playlist[$i]->id);
    
    $channel .= '<div class="playlist_menu_mgr" id="'.$get_playlist[$i]->id.'">'.$get_playlist[$i]->playlistname.'<span style="color: #bbb; font-size:10px;">('.count($get_playlist_info).')</span></div>';
}
$channel .= '</div>';
$channel .= '</div>';


$channel .= '<div style="float:left">';
$channel .= '<div class="yclone_btn_videomanager" id="tags_menu_mngr" style="position:relative;">Tags<img src="'.$img_folder_path.'action.png" style="margin-left:5px; width:8px; height:5px;"/></div>';
    
$channel .= '<div id="content_tags_menu_mngr" class="cls_menu_mngr" style="font-family: arial,sans-serif; display:none; position:absolute; background:#fff; margin-left:10px; line-height: 25px;  width:200px; border:1px solid #ccc; max-height:200px; overflow:auto; overflow:x-hidden;">';
$channel .= '<div style="padding:5px;"><input id="txt_tags_videos" type="text" style="width:100%;" value=""/></div>';
$channel .= '<div class="add_tag_mgr" id="add_tagsto_video">+ Add</div>';
$channel .= '</div>'; 
$channel .= '</div>';

$channel .= '<div style="clear:both;"></div>';

$channel .= '</div>';
$channel .= '</div>';
$channel .= '<div style="border-bottom:1px solid #C0C0C0; background: WHITE; max-height:500px; overflow:auto; overflow:x-hidden; ">';



for($i=0;$i<count($get_videos);$i++)
{
    $get_likes = $wpdb->get_results("SELECT * FROM $likedislike_table_name WHERE lk_dlk_videoid=".$get_videos[$i]->video_id." AND status=1");
    $get_dislikes = $wpdb->get_results("SELECT * FROM $likedislike_table_name WHERE lk_dlk_videoid=".$get_videos[$i]->video_id." AND status=0");
    $get_comments = $wpdb->get_results("SELECT * FROM $comment_table_name WHERE video_id=".$get_videos[$i]->video_id);
        $channel .= '<div style="padding:15px;">';
           
        $channel .= '<div style="float:left; padding-top:25px; "><input class="vmgr_yclone" id="'.$get_videos[$i]->video_id.'" type="checkbox" style="width:15px; height:15px;"/></div>';
        $channel .= '<div style="margin-left:10px; float:left; cursor:pointer;" onclick="location.href=\''.$pluginurl.'v='.$get_videos[$i]->video_id.'\'"><img src="'.$get_videos[$i]->video_thumpnails.'" style="width:120px; height:68px;"/></div>';
            
        $channel .= '<div style="margin-left:10px; float:left; padding-left:10px;">';
        $channel .= '<div class="title_video_manager">'.$get_videos[$i]->video_title.'</div>';
        $channel .= '<div style="font-size: 11px; margin-top:5px; color: #999;">'.date("F j, Y h:i:s A",strtotime($get_videos[$i]->video_upload_time)).'</div>';
        $channel .= '<div style="font-size:10px; margin:5px 0 0 0;" class="yclone_btn_videomanager" onclick="location.href=\''.$pluginurl.'video_edit='.$get_videos[$i]->video_id.'\'" >Edit</div>';
        $channel .= '</div>';
            
        $channel .= '<div style="text-align:left; float:right; color: #888; font-size: 9px;">';
            
        $channel .= '<div style="cursor:pointer" onclick="location.href=\''.$pluginurl.'analytics='.$get_videos[$i]->video_id.'\'"><img src="'.$img_folder_path.'chart_bar.png" style="width:10px; height:10px; "/> '.$get_videos[$i]->video_view.' </div>';
        $channel .= '<div style="float:left; margin-top:5px; "><img src="'.$img_folder_path.'like.png" style="width:13px; height:13px; "/> '.count($get_likes).'</div>';
        $channel .= '<div style="float:right; margin:5px 0 0 10px;"><img src="'.$img_folder_path.'dislike.png" style="width:13px; height:13px; "/> '.count($get_dislikes).'</div><div style="clear:both;"></div>';
        $channel .= '<div style="float:left; margin-top:5px;"><img src="'.$img_folder_path.'comment.png" style="width:10px; height:10px; "/> '.count($get_comments).'</div>';
            
        $channel .= '</div>';
        
        if($get_videos[$i]->video_status==0)
        {
            $channel .= '<div style="float:right; padding: 10px 50px 0 0;"><img src="'.$img_folder_path.'right.png"/></div>';
            $channel .= '<div style=" float:right; margin: 15px 5px 0 0;" title="public video"><img src="'.$img_folder_path.'public.png" style="width:15px; height:15px;"/></div>';
        }
        else 
        {
            $channel .= '<div style="float:right; opacity:.2; padding: 10px 50px 0 0;"><img src="'.$img_folder_path.'right.png"/></div>';
            $channel .= '<div style=" float:right; margin: 15px 5px 0 0;" title="private video"><img src="'.$img_folder_path.'private.jpg" style="width:15px; height:15px;"/></div>';
        }
        
        $channel .= '<div style="clear:both; margin-bottom:10px; "></div>';
            
        $channel .= '</div>';
}
$channel .= '</div>';
$channel .= '</div>';
?>