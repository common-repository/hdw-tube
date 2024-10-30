<style type="text/css">
div.add_video_playlist {
	width: 75%;
	position: absolute;
	visibility: hidden;
	background-color: white;
	border: 1px solid #909090;
	z-index: 902;
}

#blanket {
	background-color: #111;
	opacity: 0.40;
	position: absolute;
	z-index: 901;
	top: 0px;
	left: 0px;
	width: 100%;
}

div.add_new_channel {
	width: 50%;
	position: absolute;
	visibility: hidden;
	background-color: white;
	border: 1px solid #909090;
	z-index: 902;
}
.yclone_btn_addvideo {
	display: inline-block;
	border: 1px solid #A0A0A0;
	background: #1b7fcc;
	border-radius: 3px;
	padding: 2px 10px 2px 10px;
	margin-right: 10px;
	cursor: pointer;
	color: white;
	font-weight: bold;
	font-size: 14px;
}

</style>

<style>
.yclone_btn_4 {
	display: inline-block;
	border: 1px solid #A0A0A0;
	background: #1b7fcc;
	border-radius: 3px;
	padding: 2px 10px 2px 10px;
	margin-right: 10px;
	cursor: pointer;
	color: white;
	font-weight: bold;
	font-size: 14px;
}
.yclone_btn_4:active{
position: relative;
top:1px;
}

.yclone_playlist_menu_title{
    float: left;
	margin-right: 14px;
	cursor: pointer;
	color: #666;
}
.yclone_btn_playlist{
color: #333;
border: solid 1px transparent;
font-weight: bold;
font-size: 13px;
background: #f8f8f8;
border-color: #d3d3d3;
border-radius: 2px;
padding:3px 10px 3px 10px;
cursor:pointer;
}
.yclone_btn_playlist:hover{

box-shadow: 1px 1px 1px #D8D8D8;
}
.yclone_btn_playlist:active{
position: relative;
top:1px;
}
.yclone_playlist_menu_title:hover{
    border-bottom: 4px solid #cc181e;
}

.playlist_btn_subscribe
{
    display:inline-block;
    padding:3px 10px;
    color:#fff;
    background-image: -moz-linear-gradient(bottom,#b01d13 0,#c6282c 100%);
    background-image: -ms-linear-gradient(bottom,#b01d13 0,#c6282c 100%);
    background-image: -o-linear-gradient(bottom,#b01d13 0,#c6282c 100%);
    background-image: -webkit-linear-gradient(bottom,#b01d13 0,#c6282c 100%);
    background-image: linear-gradient(to top,#b01d13 0,#c6282c 100%);
    border: 1px outset buttonface;
    cursor:pointer;
    border-radius:3px;
    font-size:12px;
    
}
.playlist_btn_subscribe:active
{
    position:relative;
    top:1px;
}

.playlist_btn_unsubscribe
{
    display:inline-block;
    padding:3px 10px;
    border: 1px solid #ccc;
    color: #999;
    background-image: -moz-linear-gradient(bottom,#f6f6f6 0,#fcfcfc 100%);
    background-image: -ms-linear-gradient(bottom,#f6f6f6 0,#fcfcfc 100%);
    background-image: -o-linear-gradient(bottom,#f6f6f6 0,#fcfcfc 100%);
    background-image: -webkit-linear-gradient(bottom,#f6f6f6 0,#fcfcfc 100%);
    background-image: linear-gradient(to top,#f6f6f6 0,#fcfcfc 100%);
    cursor:pointer;
    border-radius:3px;
    font-size:12px;
}

.pl_title_channel_name
{
    cursor:pointer;
}
.pl_title_channel_name:hover
{
    color:#2793e6 ;
   
}

.popup_add_video_title
{
    font-size: 15px;
    font-weight: bold;
    color: #505050;
    white-space: nowrap;
    text-overflow: ellipsis;
    height: 1.3em;
    overflow: hidden;   
}

@media screen and (max-width: 960px) {

}
@media screen and (max-width: 480px) {
.yclone_btn_playlist {
	clear: left;
	float: left !important;
	margin-left: 0 !important;
	margin-top: 5px;
}
}
</style>

<script>
function popuppppp(div, handle){
	 var Popup = DYN_WEB.Popup;
    
    Popup.setup( { id:div, handleId:handle, center:true } );
    
    var p = Popup.getInstance(div);
    // show once initialized at center
    p.on_init = p.show();
    blanket_size();
}

function blanket_size() {
	 var el = document.getElementById('blanket');
	    if ( el.style.display == 'none' ) {	el.style.display = 'block';    
          if (typeof window.innerWidth != 'undefined') {
                  viewportheight = window.innerHeight;
          } else {
                  viewportheight = document.documentElement.clientHeight;
          }
          if ((viewportheight > document.body.parentNode.scrollHeight) && (viewportheight > document.body.parentNode.clientHeight)) {
                  blanket_height = viewportheight;
          } else {
                  if (document.body.parentNode.clientHeight > document.body.parentNode.scrollHeight) {
                          blanket_height = document.body.parentNode.clientHeight;
                  } else {
                          blanket_height = document.body.parentNode.scrollHeight;
                  }
          }
          
          el.style.height = blanket_height + 'px';
	    }
	    else {el.style.display = 'none';
	    }
}

</script>
<script>

$hdwt(document).ready(function(){
	
	$hdwt('.remove_videofrom_playlist').click(function(){

		var deleteid = this.id;
		var thispageurl = $hdwt('#this_page_url').val();
		var thisplaylistid = $hdwt('#this_playlist_id').val();

		$hdwt.post(thispageurl,{removeplaylistvideo:deleteid,playlistid:thisplaylistid}, function( data ) {
        	location.reload();
		});
		
	});

    $hdwt('#btn_select_add_video').click(function(){
    	 var videoid = '';
    	 var thisplaylistid = $hdwt('#this_playlist_id').val();   	
    	 
         if($hdwt('#ylcone_playlist_addvideo_url_content').css('display') != 'block')
         {
        	 videoid = $hdwt('#sel_watch_later_id').val();
        	 var getid = (videoid).split('video_id_')[1];

        	 $hdwt.post(location.href,{addplaylistvideo:getid,playlistid:thisplaylistid}, function( data ) {
             	location.reload();
     		});      		 	 
         }else
         {       	
        	video = $hdwt('#txt_url_video').val();	
        	if(/^([a-z]([a-z]|\d|\+|-|\.)*):(\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?((\[(|(v[\da-f]{1,}\.(([a-z]|\d|-|\.|_|~)|[!\$&'\(\)\*\+,;=]|:)+))\])|((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=])*)(:\d*)?)(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*|(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)|((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)|((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)){0})(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(video)) 
            {
            	video = video.split('v=')[1];    	
                $hdwt.post(location.href,{addplaylistvideo:video,playlistid:thisplaylistid}, function( data ) {
                	location.reload();
        		});
            }
        	else 
    	    {
    		  aler("invalid url");
    		}
         }   
    });


    $hdwt('.popup_select_your_video').click(function(){

		$hdwt('.popup_select_your_video').css({'border':'5px solid #fff','background':'#fff'});
		$hdwt('#'+this.id).css({'border':'5px solid #4d90fe','background':'#f5f5f5'});
		$hdwt('#sel_watch_later_id').val(this.id);
	});

	
	$hdwt('#txt_url_video').on('paste keyup',function(){		
		var video = $hdwt('#txt_url_video').val();		
		if($hdwt('#txt_url_video').val()!="")
		{
			if(/^([a-z]([a-z]|\d|\+|-|\.)*):(\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?((\[(|(v[\da-f]{1,}\.(([a-z]|\d|-|\.|_|~)|[!\$&'\(\)\*\+,;=]|:)+))\])|((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=])*)(:\d*)?)(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*|(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)|((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)|((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)){0})(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(video))
		    {
				var player_url = $hdwt('#playerurl').val();
        		var flashvars = $hdwt('#player_src').val();
                flashvars +='&vid='+video.split('v=')[1];
        	    
                 var myplayer  ='<object id="rtmp_live" style="height: 250px; width: 85%;">';
        	     myplayer +='<param name="movie" value="' +player_url + '">';
        	     myplayer +='<param name="flashvars">';
        	     myplayer +='<param name="allowFullScreen" value="true">';
        	     myplayer +='<param name="allowScriptAccess" value="always">';
        	     myplayer +='<embed src="' + player_url + '" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="85%" height="80%"></embed>';
        	     myplayer +='<param name="flashvars" value="' + flashvars +'" />';
        	     myplayer +='</object>';
        
        	     $hdwt('#playlist_player').html(myplayer);
        	 }
			 else
		    {
		 		 alert('Invalid Url');		 		  
		    }
		}
		else
		{ 
			$hdwt('#playlist_player').html("");
		}
	        
	});

	
	$hdwt('.yclone_playlist_video_menu').click(function (){
		$hdwt('.yclone_playlist_video_menu').css({'border-left':'0px solid #ffffff','color':'black','font-weight':'normal','background':'none'});
		$hdwt('.yclone_playlist_video_option').hide();
		$hdwt(this).css({'border-left':'4px solid #cc181e','color':'#cc181e','font-weight':'bold','background':'#F0F0F0'});
		$hdwt('#' + this.id + '_content').show();		
	});

	$hdwt('#btn_change_playlist_title').click(function(){

		$hdwt('#edit_playlist_title').show();
		
	});
	$hdwt('#btn_cancel_playlistedit').click(function(){
		$hdwt('#edit_playlist_title').hide();
	});
	
	$hdwt('.yclone_playlist_menu_title').click(function()
	{
	
		var channelid = $hdwt('#channel_id_value').val();
	    window.location.href="<?php echo $pluginurl;?>channel="+channelid;
	});

	$hdwt('#btn_done_playlistedit').click(function(){
		var thispageurl = $hdwt('#this_page_url').val();
		$hdwt('#edit_playlist_title').hide();
		var playlisttitle = $hdwt('#txt_edit_playlisttitle').val();
		$hdwt('#lbl_playlist_title').html(playlisttitle);
		$hdwt.post(thispageurl,{editplaylist:playlisttitle}, function( data ) {			
		});
		
	});

	$hdwt('#btn_add_description_playlist').click(function(){

		$hdwt('#edit_playlist_description').show();
		$hdwt('#btn_add_description_playlist').hide();
		
	});

	$hdwt('#btn_cancel_playlistdescr').click(function(){

		$hdwt('#lbl_description_playlist').show();
		$hdwt('#edit_playlist_description').hide();
		$hdwt('#btn_edit_description_playlist').show();
	});

	$hdwt('#btn_edit_description_playlist').click(function(){

		$hdwt('#lbl_description_playlist').hide();
		$hdwt('#btn_edit_description_playlist').hide();
		$hdwt('#edit_playlist_description').show();
		
	});

	$hdwt('#btn_done_playlistdescr').click(function(){

    	var thispageurl = $hdwt('#this_page_url').val();
    	var thisplaylistid = $hdwt('#this_playlist_id').val();
    	$hdwt('#lbl_description_playlist').show();
    	$hdwt('#edit_playlist_description').hide();
    	$hdwt('#btn_edit_description_playlist').show();
    	var editdescr = $hdwt('#txt_edit_playlistdescr').val();
    	$hdwt('#lbl_description_playlist').html(editdescr);
    	
        $hdwt.post(thispageurl,{editplaylistdescr:editdescr,playlistid:thisplaylistid}, function( data ) {
			
		});
	});
	
	 $hdwt('#btn_share_playlist').click(function(){
	        if($hdwt('#form_share_likedplaylist').css('display')=='none')
	        {
	        	$hdwt('#form_share_likedplaylist').show();
	        }
	        else
	        {
	        	$hdwt('#form_share_likedplaylist').hide();
	        }
	    	
	  });

	 $hdwt('.playlist_btn_unsubscribe').click(function(){
		   $hdwt.post(location.href,{unsubscribechannel:this.id}, function( data ) {
			   location.reload();
		   });		
	});

	$hdwt('.playlist_btn_subscribe').click(function(){
		var channelname = $hdwt('.pl_title_channel_name').val();
		   $hdwt.post(location.href,{subscribechannel:this.id,subsc_channel_name:channelname}, function( data ) {
			   location.reload();
		   });		
	});

    $hdwt('#btn_like_playlist').click(function(){

    	 $hdwt.post(location.href,{likedplaylist:'<?php echo htmlspecialchars($_GET['playlist'], ENT_QUOTES, 'UTF-8');?>'}, function( data ) {
			   location.reload();
		 });
    });

    $hdwt('#btn_dislike_playlist').click(function(){
    	$hdwt.post(location.href,{dislikedplaylist:'<?php echo htmlspecialchars($_GET['playlist'], ENT_QUOTES, 'UTF-8');?>'}, function( data ) {
			   location.reload();
		 });
    });

    
    $hdwt('#btn_delete_myplaylist').click(function(){
    	$hdwt.post(location.href,{deletemyplaylist:'<?php echo htmlspecialchars($_GET['playlist'], ENT_QUOTES, 'UTF-8');?>'}, function( data ) {
    		 window.location.href='<?php echo $pluginurl."channel=".$_SESSION['your_current_channel'];?>';
		 });
    });
	
});
	
</script>
<?php 

$flashvars = 'baseW=' . $siteurl . '&id=' . encrypt_decrypt ( 'encrypt', 1 );
$flashvars .= "&vid=";

$playlisttitle_table_name   = $wpdb->prefix . "youtube_playlistname";
$playlist_table_name        = $wpdb->prefix . "youtube_playlist";

$get_current_user_prof=$wpdb->get_row($wpdb->prepare("SELECT * FROM $channel_table_name WHERE userid=%d AND channel_id=%d",$current_user->ID,$_SESSION ['your_current_channel']));

$getplaylistid              = $_GET['playlist'];
$getplaylist_prof           = $wpdb->get_row($wpdb->prepare("SELECT * FROM $playlisttitle_table_name WHERE id=%d",$getplaylistid));
$getchannelidbyplaylistid   = $getplaylist_prof->channelid;
$getvideobyplaylist         = $wpdb->get_results($wpdb->prepare("SELECT * FROM $playlist_table_name WHERE playlistid=%d",$getplaylistid));

$getchannel_prof            = $wpdb->get_row($wpdb->prepare("SELECT * FROM $channel_table_name WHERE channel_id=%d",$getchannelidbyplaylistid));

if (filter_var ( $getchannel_prof->channel_icon, FILTER_VALIDATE_EMAIL )){
    $user_icon_src          = "http://www.gravatar.com/avatar/" . md5 ( strtolower ( $getchannel_prof->channel_icon ) ) . "?d=" . urlencode ( $default ) . "&s=40";
}else{
    $user_icon_src          = $getchannel_prof->channel_icon;
}

$flashvars = 'baseW=' . $siteurl . '&id=' . encrypt_decrypt ( 'encrypt', 1 );

$playlist .='<div id="blanket" style="display: none;"></div>';
$playlist .='<input type="hidden" id="this_page_url" value="' . $pluginurl .'"/>';
$playlist .='<input type="hidden" id="this_playlist_id" value="' . $_GET['playlist'] .'"/>';
$playlist .='<script src="' . $popup_url . '" type="text/javascript"></script>';
$playlist .='<input type="hidden" id="player_src" value="'.$flashvars.'">';
$playlist .='<input type="hidden" id="playerurl" value="'.$player_url.'">';
$playlist .='<input type="hidden" id="channel_id_value" value='.$getchannel_prof->channel_id.'>';

$playlist .='<div id="yclone_playlist" style="font-family: calibri; background: #E0E0E0; border: 1px solid #D0D0D0; padding: 0px 20px 40px 20px;">';
$playlist .='<div style="width: 100%; height: 150px; background-size: 100% 150px; background-image: url('.$getchannel_prof->channel_banner.');">';
$playlist .='<div style="float: left; margin-left: 20px; width: 100px; height: 100px; background-repeat: no-repeat; background-size: 100px; background-image: url('.$user_icon_src.');"></div>';
    			
$playlist .='</div>';
    
$playlist .='<div style="background: white; width: 100%; padding: 15px 0px 0px 0px; box-shadow: 0 1px 2px #989898;">';
$playlist .='<div style="float: left; color: #333; padding-left: 15px; cursor: pointer; font-weight: bold; font-size: 23px;">'.$getchannel_prof->channel_name.'</div>';

$issownplaylsit = $wpdb->get_row($wpdb->prepare("SELECT * FROM $playlisttitle_table_name WHERE channelid=%d AND id=%d",$_SESSION['your_current_channel'],$_GET['playlist']));

if(!$issownplaylsit)
{
    $countsubscr = $wpdb->get_results("SELECT * FROM $subscribtion_table_name WHERE subsc_channel_id=".$getchannel_prof->channel_id);
    $playlist .='<div class="" style="float: right;padding: 0 6px; height: 20px; border: 1px solid #ccc; color: #777; font-size: 11px; text-align: center; margin-right: 2px; line-height: 22px;">'.count($countsubscr).'</div>';
    $issubscribe = $wpdb->get_row($wpdb->prepare("SELECT * FROM $subscribtion_table_name WHERE channel_id=%d AND subsc_channel_id=%d",$_SESSION['your_current_channel'],$getchannel_prof->channel_id));
    
    if($issubscribe){
        $playlist .='<div class="playlist_btn_unsubscribe" id="'.$getchannel_prof->channel_id.'" style="float: right;">Unubscribe</div>';
    }else{
        $playlist .='<div class="playlist_btn_subscribe" id="'.$getchannel_prof->channel_id.'" style="float: right;">Subscribe</div>';
    }
}
$playlist .='<div style="clear: both;"></div>';

$playlist .='<div style="padding: 15px 0px 0px 15px;">';
$playlist .='<div class="yclone_playlist_menu_title">Home</div>';
$playlist .='<div class="yclone_playlist_menu_title">Videos</div>';
$playlist .='<div class="yclone_playlist_menu_title" style="border-bottom: 4px solid #999;" >Playlists</div>';
$playlist .='<div class="yclone_playlist_menu_title">Channel</div>';
$playlist .='<div class="yclone_playlist_menu_title">Discussion</div>';
$playlist .='<div class="yclone_playlist_menu_title">About</div>';
$playlist .='<div style="clear: both;"></div>';
$playlist .='</div>';
$playlist .='</div>';
	
$playlist .='<div style="background: white; margin-top:10px;  width: 100%; box-shadow: 0 1px 2px #989898;">';
$playlist .='<div style="padding:10px;">';
$playlist .='<div style="width: 113px; height:120px; float:left;">';

if($getvideobyplaylist)
{
    $get_playlist_thumb = $wpdb->get_row("SELECT * FROM $video_table_name WHERE video_id=".$getvideobyplaylist[0]->videoid);
    
    $playlist .='<img src="'.$get_playlist_thumb->video_thumpnails.'" style="width:145px; height:105px;"/>';
}
else{
    $playlist .='<img src="'.$img_folder_path.'no_thumbnail.png" style="width:145px; height:105px;"/>';
}

$playlist .='</div>';
		              
$playlist .='<div style="margin-left:5px; width:calc(100% - 120px); float:left;">';
if($_SESSION ['your_current_channel']==$getchannelidbyplaylistid)
{
	$playlist .='<div id="btn_change_playlist_title" style="float:right; cursor:pointer; border: 1px solid #A8A8A8; padding: 3px; background: #F0F0F0;"><img src="'.$img_folder_path.'edit.png" style="width:15px; height:15px;"/></div>';
}
$playlist .='<div id="lbl_playlist_title" style="float:left; font-size: 20px; font-weight: bold; color: #333;">'.$getplaylist_prof->playlistname.'</div>';

$playlist .='<div style="clear:both;"></div>';
		                  
$playlist .='<div style="padding: 10px;width: 98%; background-color: #f6f6f6; display:none;" id="edit_playlist_title">';
$playlist .='<div class="yclone_btn_4" id="btn_done_playlistedit" style="float:right;">Done</div>';
$playlist .='<div class="yclone_btn_4" id="btn_cancel_playlistedit" style="float:right; color: black; background: #C8C8C8; border: 1px solid #989898;">Cancel</div><div style="clear: both;"></div>';
$playlist .='<div style="font-size: 12px; font-weight: bold; color: #333; text-transform: uppercase;">PLAYLIST TITLE</div>';
$playlist .='<div style="margin-top:10px;"><input style="width:100%; height:25px;" type="text" name="txt_edit_playlisttitle" id="txt_edit_playlisttitle"></div>';
$playlist .='</div>';
		                  
$playlist .='<div style="float:left; color: #999; margin: 3px 0px; font-size:13px;">By <span class="pl_title_channel_name" onclick="\''.$pluginurl.'channel='.$getchannel_prof->channel_id.'\'">'.$getchannel_prof->channel_name.'</span>- '.count($getvideobyplaylist).' videos</div><div style="clear:both;"></div>';
if($_SESSION ['your_current_channel']==$getchannelidbyplaylistid)
{
    if($getplaylist_prof->description=="")
    {
        $playlist .='<div class="yclone_btn_playlist" id="btn_add_description_playlist" style="margin-bottom:20px; float:left; color: #666; font-size:12px;">+ Add a description</div>';
        $playlist .='<div id="lbl_description_playlist" style="margin-bottom:20px; display:none; float:left; color: #666; font-size:12px;">'.$getplaylist_prof->description.'</div>';
        $playlist .='<div id="btn_edit_description_playlist" style="float:right; cursor:pointer; border: 1px solid #A8A8A8; padding: 3px; background: #F0F0F0; display:none;"><img src="'.$img_folder_path.'edit.png" style="width:15px; height:15px;"/></div>';
        
    }
    else{
        $playlist .='<div id="lbl_description_playlist" style="margin-bottom:20px; float:left; color: #666; font-size:12px;">'.$getplaylist_prof->description.'</div>';
        $playlist .='<div id="btn_edit_description_playlist" style="float:right; cursor:pointer; border: 1px solid #A8A8A8; padding: 3px; background: #F0F0F0;"><img src="'.$img_folder_path.'edit.png" style="width:15px; height:15px;"/></div>';
    }
}
else{
    $playlist .='<div id="lbl_description_playlist" style="margin-bottom:20px; float:left; color: #666; font-size:12px;">'.$getplaylist_prof->description.'</div>';
}
$playlist .='<div style="clear:both;"></div>';

$playlist .='<div style="padding: 10px;width: 98%; background-color: #f6f6f6; display:none;" id="edit_playlist_description">';
$playlist .='<div class="yclone_btn_4" id="btn_done_playlistdescr" style="float:right;">Done</div>';
$playlist .='<div class="yclone_btn_4" id="btn_cancel_playlistdescr" style="float:right; color: black; background: #C8C8C8; border: 1px solid #989898;">Cancel</div><div style="clear: both;"></div>';
$playlist .='<div style="font-size: 12px; font-weight: bold; color: #333; text-transform: uppercase;">PLAYLIST DESCRIPTION</div>';
$playlist .='<div style="margin-top:10px;"><textarea style="resize:none; width:100%; height:50px;" type="text" name="txt_edit_playlistdescr" id="txt_edit_playlistdescr"></textarea></div>';
$playlist .='</div>';

$playlist .='<div style="float:left;" class="yclone_btn_playlist" onclick="location.href=\''.$pluginurl.'playlist='.$_GET['playlist'].'&v='.$getvideobyplaylist[0]->videoid.'\'"><img src="'.$img_folder_path.'play.png" style="width:10px; height:10px;"/> Play all</div>';
if($current_user->ID)
{
    $playlist .='<div style="float:left; margin-left:15px;" class="yclone_btn_playlist" id="btn_share_playlist" ><img src="'.$img_folder_path.'share.png" style="width:10px; height:10px;"/>Share</div>';
    $playlist .='<div id="form_share_likedplaylist"  style="position:absolute; display:none; padding: 10px; background: #fff; border-radius: 2px;  margin-top:32px; border:1px solid #999;">';
    
    require_once 'sharevideo.php';
    $playlist .=$sharecontent;
    $playlist .='</div>';
    
    if($_SESSION ['your_current_channel']!=$getchannelidbyplaylistid)
    {
        $check_lp = $wpdb->get_row($wpdb->prepare("SELECT * FROM $likedplaylist_table_name WHERE lk_playlist=%d AND channelid=%d",$_GET['playlist'],$_SESSION['your_current_channel']));
        if($check_lp)
        {
            $playlist .=' <div style="float:left; margin-left:15px;" id="btn_dislike_playlist" class="yclone_btn_playlist"><img src="'.$img_folder_path.'dislike.png" style="width:10px; height:10px;"/> Dislike</div>';
        }
        else{
            $playlist .=' <div style="float:left; margin-left:15px;" id="btn_like_playlist" class="yclone_btn_playlist"><img src="'.$img_folder_path.'like.png" style="width:10px; height:10px;"/> Like</div>';
        }
    }
}

if($_SESSION ['your_current_channel']==$getchannelidbyplaylistid)
{
    $playlist .='<div style="float:left; margin-left:15px;" id="btn_delete_myplaylist" class="yclone_btn_playlist"><img src="'.$img_folder_path.'deleteplaylist.png" style="width:10px; height:10px;"/> Delete</div>';
    $playlist .='<div style="float:right;" class="yclone_btn_playlist" onclick="popuppppp(\'add_video_playlist\',\'add_video_playlist_handle\');">Add video</div>';
}
$playlist .='<div style="clear:both;"></div>';
		              
$playlist .='</div>';
$playlist .='<div style="clear:both;"></div>';
$playlist .='</div>	 ';
$playlist .='</div>';
$playlist .='<div style="width:100%; overflow:auto; overflow-x:hidden; height:600px; font-size: 16px; background:white; border:1px solid #D8D8D8;">';
if(!$getvideobyplaylist){
    $playlist .='<div style="width:100%; color:#999; text-decoration:none;text-align:center;">No videos in this playlist yet</div>';
}
else{
    $playlist .='<div style="width:100%;">';
    for($i=0;$i<count($getvideobyplaylist);$i++){

        $getvideo_prof = $wpdb->get_row("SELECT * FROM $video_table_name WHERE video_id=".$getvideobyplaylist[$i]->videoid);
        
        $playlist .='<div style="padding:10px; border-bottom:1px solid #C8C8C8;">';
        $playlist .='<div style="float:left;"><img src="'.$getvideo_prof->video_thumpnails.'" style="width:70px; height:50px;"/></div>';
        $playlist .='<div class="remove_videofrom_playlist" id="'.$getvideo_prof->video_id.'" style="float:right; padding-top:15px;" onClick="parentNode.remove();"><img src="'.$img_folder_path.'close_icon.png" style="width:15px; height:15px;"/></div>';
        $playlist .='<div style="float:left; padding: 15px 0px 0px 10px; font-weight: bold; font-size: 15px; color: #333;">'.$getvideo_prof->video_title.'</div>';       
        $playlist .='<div style="float:right; padding: 15px 100px 0px 0px; font-size:13px; color:#999;">'.$getchannel_prof->channel_name.'</div>';
        $playlist .='<div style="clear:both;"></div>';
        $playlist .='</div>';
    }
    $playlist .='</div>';
}
$playlist .='</div>';
$playlist .='</div>';

//Add Video PopUp Window

$playlist .='<div class="add_video_playlist" id="add_video_playlist"	style="font-family: calibri;">';
$playlist .='<div class="handle" id="add_video_playlist_handle"></div>';

$playlist .='<div style="padding: 10px; border-bottom: 1px solid #B8B8B8;">';
$playlist .='<div style="float: left; font-weight: bold; color: black; font-size: 20px;">Add video to playlist</div>';
$playlist .='<div style="float: right; cursor: pointer;" id="closewindow" class="closeBox" onclick="blanket_size();"><img src="'.$img_folder_path.'close_icon.png" style="height: 15px; width: 15px;" /></div>';
$playlist .='<div style="clear: both;"></div>';
$playlist .='</div>';

$playlist .='<div style="font-family: calibri;">';

$playlist .='<div style="float: left; height: 375px; width: 18%; border-right: 1px solid #B8B8B8;">';
$playlist .='<div class="yclone_playlist_video_menu" id="ylcone_playlist_addvideo_url" style="cursor: pointer; font-size: 15px; padding: 3px 0px 3px 10px; width: 150px;">Url</div>';
$playlist .='<div class="yclone_playlist_video_menu" id="ylcone_playlist_addvideo_video" style="cursor: pointer; font-size: 15px; padding: 3px 0px 3px 10px; width: 150px;">Your YouTube Videos</div>';
$playlist .='</div>';

$playlist .='<div style="float: left; width: 81.8%;">';

$playlist .='<div style="border-bottom: 1px solid #B8B8B8; padding: 10px;">';
$playlist .='<div class="yclone_playlist_video_option" id="ylcone_playlist_addvideo_url_content" style="vertical-align: middle; height: 300px; display: block;">';
$playlist .='<div style="padding: 10px;">';
$playlist .='<div style="float:left; margin-top: 11px;">Paste URL here:</div><div style="float:left;  margin-right:10px; margin-top: 10px;"><input id="txt_url_video" type="text" size="100px" value="" /></div><div style="clear:both;"></div>';
$playlist .='<div  id="playlist_player" style="margin-left: 150px;"></div>';
$playlist .='</div>';
$playlist .='</div>';

$playlist .='<div class="yclone_playlist_video_option" id="ylcone_playlist_addvideo_video_content" style="overflow: auto; overflow-x: hidden; padding: 10px; height: 280px; display: none;">';

$get_own_videos = $wpdb->get_results($wpdb->prepare("SELECT * FROM $video_table_name WHERE user_id=%d AND channel_id=%d",$current_user->ID,$_SESSION['your_current_channel']));

if($get_own_videos)
{
    for($i=0;$i<=count($get_own_videos);$i++)
    {
        $playlist .='<div class="popup_select_your_video" id="video_id_'.$get_own_videos[$i]->video_id.'" style="border:5px solid #fff; padding:5px; cursor:pointer;">';
        $playlist .='<div style="float:left; height:80px;"><img src="'.$get_own_videos[$i]->video_thumpnails.'" style="width:120px; height:80px;"/></div>';
        $playlist .='<div style="margin-left:5px; float:left;">';
        $playlist .='<div class="popup_add_video_title">'.$get_own_videos[$i]->video_title.'</div>';
        $playlist .='<div style="font-size:12px; margin-bottom:5px;">'.$get_own_videos[$i]->video_description.'</div>';
        $playlist .='<div style="color: #858585; font-size: 12px;">'.date("F j, Y",strtotime($get_own_videos[$i]->video_upload_time)).'</div></div>';
        $playlist .='<div style="clear:both;"></div>';
        $playlist .='</div>';
     } 
    $playlist .='<div style="clear: both;"></div>';
    $playlist .='</div>';
}
else {
$playlist .='<div>No videos Found!!!</div>';
}

$playlist .='</div>';
$playlist .='</div>';

$playlist .='<div style="padding: 15px;">';

$playlist .='<input type="hidden" id="sel_watch_later_id"/><div id="btn_select_add_video" class="yclone_btn_addvideo">Select</div>';
$playlist .='<div class="yclone_btn_addvideo closeBox" onclick="document.getElementById(\'closewindow\').click();" style="color: black; background: #C8C8C8; border: 1px solid #989898;">Cancel</div>';
$playlist .='</div>';
$playlist .='</div>';
$playlist .='</div>';
?>