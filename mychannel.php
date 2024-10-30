<style type="text/css">

.no_of_subscr {
	position: relative;
	background: #fafafa;;
	border: 1px solid #ccc;
}
.no_of_subscr:after, .no_of_subscr:before {
	right: 100%;
	top: 50%;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
}

.no_of_subscr:after {
	border-color: rgba(136, 183, 213, 0);
	border-right-color: #88b7d5;
	border-width: 5px;
	margin-top: -5px;
}
.no_of_subscr:before {
	border-color: rgba(194, 225, 245, 0);
	border-right-color: #c2e1f5;
	border-width: 6px;
	margin-top: -6px;
}

.add_channel_title_1{
    color: #2793e6; 
    cursor: pointer; 
    font-weight: bold;
    margin-bottom:5px;
}
.add_channel_title_1:hover{

    text-decoration:underline;
}
.yclone_btn_none{
    display: inline-block;
	border: 1px solid #3079ed;
	background: #4d90fe;
	border-radius: 3px;
	padding: 2px 10px 2px 10px;
	margin-right: 10px;
	color: white;
	font-weight: bold;
	font-size: 14px;
	opacity: .5;

}

.yclone_btn_1 {
	font-weight: bold;
	color: #333;
	font-size: 13px;
	border-radius: 2px;
	border: 1px solid #ccc;
	padding: 3px;
	background: #fafafa;
	cursor: pointer;
	display: inline-block;
}

#about_add_channel:hover {
	background: #F8F8F8;
}

.yclone_btn_5 {
	float: left;
	margin: 10px 0px 10px 0px;
	border: solid 1px transparent;
	display: inline-block;
	padding: 3px 13px 6px 3px;
	border-radius: 2px;
	cursor: pointer;
	border-color: #d3d3d3;
	background: #f8f8f8;
	color: #333;
	font-weight: bold;
	font-size: 13px;
}

.hover_channel_title:hover {
	color: #2793e6 !important;
}

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

.yclone_btn_4:hover {
	background: #3366FF;
}

.Icon_gallery_img_id {
	border: 2px solid white;
}

.Icon_gallery_img_id:hover {
	border: 2px solid blue;
}

.yclone_btn_1:hover {
	background: #E8E8E8;
	box-shadow: 0 1px 2px #D0D0D0;
}

.yclone_btn_4:active {
	position: relative;
	top: 1px;
}

.yclone_btn_3 {
	border: 1px solid #A0A0A0;
	display: inline-block;
	background: #F8F8F8;
	padding: 0px 10px 0px 10px;
	font-size: 12px;
	font-weight: bold;
	border-radius: 2px;
	cursor: pointer;
	color: #333;
}

.yclone_btn_2 {
	padding: 0px 10px 0px 10px;
	color: white;
	cursor: pointer;
	margin-left: 5px;
	border-radius: 2px;
	border: 1px solid transparent;
	display: inline-block;
	background-color: #1b7fcc;
	height: 47px;
	line-height: 3.2;
}

.yclone_btn_2:hover {
	background-color: #1b7fcc;
}

.ones:hover {
	background: rgba(0, 0, 0, 0.31);
}

.yclone_ch_manu1 {
	color: #555;
	font-size: 13px;
	font-weight: bold;
	cursor: pointer;
}

.yclone_ch_manu1:hover {
	color: black;
}

.edit_ch_icon_img {
	width: 15px;
	border: 1px solid #989898;
	padding: 5px;
	height: 15px;
	background: #B8B8B8;
	margin-left: 73px;
}

.yclone_ch_menu_title {
	float: left;
	margin-right: 15px;
	cursor: pointer;
	color: #666;
}

.yclone_ch_menu_title:hover {
	border-bottom: 4px solid #cc181e;
}

.arrow_box {
	position: relative;
	background: #ffffff;
	border: 1px solid #A8A8A8;
}

.arrow_box:after,.arrow_box:before {
	bottom: 100%;
	left: 13%;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
}

.arrow_box:after {
	border-color: rgba(255, 255, 255, 0);
	border-bottom-color: #ffffff;
	border-width: 10px;
	margin-left: -10px;
}

.arrow_box:before {
	border-color: rgba(168, 168, 168, 0);
	border-bottom-color: #A8A8A8;
	border-width: 11px;
	margin-left: -11px;
}
.yclone_btn_subscribe,.yclone_no_btn_subscribe{ display: inline-block; cursor: pointer;  padding: 1px 10px 1px 10px;  border-radius: 3px;  box-shadow: 0 1px 2px rgb(58, 9, 9);  color: #fefefe;   background-image: linear-gradient(to top,#b01d13 0,#c6282c 100%);}
.yclone_btn_subscribe:active{ position:relative;top:1px;}

.yclone_btn_unsubscripe {
	cursor: pointer;
    padding: 3px 10px;
    font-size: 12px;
    font-family: ariyal,sans-serif;
    border-radius: 2px;
    border: 1px solid #ccc;
    color: #999;
    background-image: linear-gradient(to top, #f6f6f6 0, #fcfcfc 100%);
}

.btn_subscr_mychannel_others
{
    display: inline-block; 
    border: 1px solid #999; 
    cursor: pointer; 
    border-radius: 2px; 
    padding: 0px 5px 0px 5px; 
    background-color: rgb(245, 245, 245); 
    font-size: 11px;
}
@media screen and (max-width: 850px) {
#top_right_right, #top_right_left{
	width: 90% !important;
}
}

@media screen and (max-width: 480px) {
#ylcone_ch_channel_menu{
	clear: left !important;
}
}
</style>
<script>
$hdwt(document).ready(function(){
	$hdwt('#btn_cancel_playlisttitle').click(function(){

		$hdwt('#edit_playlist_title').hide();
		$hdwt('#head_playlisttitle').show();

	});


	$hdwt('.yclone_no_btn_subscribe').click(function(){
		alert('Please login to subscribe this channel');
    });
	$hdwt('.btn_subscr_mychannel_others').click(function(){

		
	    var channelid = (this.id).split('you_subscr_')[1];
	    var channelname = $hdwt('#you_sub_ch_name_'+channelid).html();
	   
	    $hdwt.post(location.href,{subscribechannel:channelid,subsc_channel_name:channelname}, function( data ) {

		    if(data == 'Error1')
		    {
			    alert('This channel is already subscribed...');
		    }
		    else{
			  location.reload();	
		    }
		});
	    
	});
	
	$hdwt('.yclone_btn_subscribe').click(function(){
	    var channelname = $hdwt('#yclone_mychannel_channelname').html();
	    var channelid   = '<?php echo htmlspecialchars($_GET['channel'], ENT_QUOTES, 'UTF-8')?>';
	    $hdwt.post(location.href,{subscribechannel:channelid,subsc_channel_name:channelname}, function( data ) {
			   location.reload();	
		});

		
	});

    $hdwt('.yclone_btn_unsubscripe').click(function(){ 	
	    var channelid   = '<?php echo htmlspecialchars($_GET['channel'], ENT_QUOTES, 'UTF-8')?>'; 
    	 $hdwt.post(location.href,{unsubscribechannel:channelid}, function( data ) {
    		 location.reload();
		   });	
		
	});
	
	
	$hdwt('#btn_new_playlist').click(function(){
		if($hdwt('#form_new_playlist').css('display')=='none'){		
			$hdwt('#form_new_playlist').show(); 	
		}
		else{ 	
			$hdwt('#form_new_playlist').hide();  	
		}
	});

	function handleFileUpload(files,id)
	{
	   for (var i = 0; i < files.length; i++)
	   {
	        var fd = new FormData();
	        fd.append('upload_channel_icon', files[i]);
	 	    fd.append('status', id);
	        sendFileToServer(fd,id);
	   }
	}

	$hdwt('#select_icon_upload').change(function(e){
			 var files = this.files;
			 var id= 0;
		     handleFileUpload(files,id);
    });

	$hdwt('#select_banner_upload').change(function(e){
		 var files = this.files;
		 var id= 1;
	     handleFileUpload(files,id);
	});
	
	function sendFileToServer(formData,id)
	{
	    var uploadURL ="<?php echo $pluginurl;?>"; //Upload URL
	    var extraData ={}; //Extra Data.
	    var jqXHR=$hdwt.ajax({
	            xhr: function() {
	            var xhrobj = $hdwt.ajaxSettings.xhr();
	            if (xhrobj.upload) {
	                    xhrobj.upload.addEventListener('progress', function(event) {
	                        var percent = 0;
	                        var position = event.loaded || event.position;
	                        var total = event.total;
	                        if (event.lengthComputable) {
	                            percent = Math.ceil(position / total * 100);
	                        }
	                       
	                       
	                    }, false);
	                }
	            return xhrobj;
	        },
	    url: uploadURL,
	    type: "POST",
	    contentType:false,
	    processData: false,
	        cache: false,
	        data: formData,
	        success: function(data){

	        	if(id == 0)
	        	{
    	        	$hdwt('.yclone_btn_none').hide();
    	    		$hdwt('#btn_change_icon').show();
    	    		$hdwt('.yclone_ch_icon_option').hide();
    	    		var url = data;
    	    		$hdwt('#yclone_ch_icon_output1').show();
    	    		$hdwt('#ch_icon_profile').attr('src',url);
	        	}
	        	else
	        	{
	        		$hdwt('.yclone_btn_none').hide();
	        		$hdwt('#btn_change_banner').show();
	        		$hdwt('.yclone_ch_banner_option').hide();
	        		var url = data;
	        		$hdwt('#yclone_ch_banner_output1').show();
	        		$hdwt('#ch_banner_profile').css('background-image','url('+url+')');
	        	}
		         
	        }
	    });

	    status.setAbort(jqXHR);
	}

	

	
$hdwt('#create_new_playlist').click(function(){

	var thispageurl = $hdwt('#this_page_url').val();
    var playlisttitle = $hdwt('#txt_playlist_title').val();
   	$hdwt('#new_playlist_title').html(playlisttitle);
	$hdwt.post(thispageurl,{addplaylist:playlisttitle}, function( data ) {
		window.location.href="<?php echo $pluginurl; ?>playlist="+data;
    });
});
	
	$hdwt('#post_channel_comment').click(function(){
		
		var thispageurl = $hdwt('#this_page_url').val();
		var mess = $hdwt('#txt_comments_channel').val();
		var myimage = $hdwt('#user_image').val();
		var myname = $hdwt('#user_name').val();
		var imagep = $hdwt('#image_path').val();

		var msg = '<div style="margin-top: 10px;">';
		msg +='<div style="float: left;"><img src="'+myimage+'" style="margin-right: 10px; width: 40px; height: 40px;" /></div>';
		msg +='<div style="float: left;"><span style="background-color: #dbe4eb; color: #2793e6; font-size:13px; padding: 0 5px; font-weight: bold;">'+myname+'</span><span style="color: #999; font-size:13px; padding-left: 10px;">1 seconds ago</span><br><span style="font-size:15px;">'+mess+'</span></div>';
		msg +='<div style="clear: both"></div>';
		msg +='</div>';

		if ($hdwt.trim($hdwt("#txt_comments_channel").val()) != '') {
		$hdwt('#message_ch').after( msg );
		$hdwt.post(location.href,{comment_message:mess,comment_name:myname,comment_image:myimage,channel_id_comment:'<?php echo htmlspecialchars($_GET['channel'], ENT_QUOTES, 'UTF-8');?>'}, function( data ) {
			
	    });
		$hdwt('#txt_comments_channel').val("");
		 
		} 
		else{
			alert("Please enter your comment");
		}
		});
    $hdwt('#chn_description1,#edit_chn_description').click(function(){
    	$hdwt('#show_hide_descr').hide();
    	$hdwt('#chn_description1').hide();
    	$hdwt('#ch_descripttions2').show();

    });

    $hdwt('#desc_cancel').click(function(){

    	$hdwt('#show_hide_descr').show();
    	$hdwt('#chn_description1').show();
    	$hdwt('#ch_descripttions2').hide();     
    });

    $hdwt('#desc_done').click(function(){

    	var thispageurl = $hdwt('#this_page_url').val();
    	var descrmsg = $hdwt('#txt_descriptionbox').val();
    	
    	$hdwt('#show_hide_descr').show();
    	$hdwt('#chn_description1').show();
    	$hdwt('#ch_descripttions2').hide(); 

    	var code2 = '<div id="chn_description1" style="padding: 10px;">'+descrmsg+'</div>';
    	$hdwt('#chn_description1').replaceWith(code2);
    	$hdwt('#chn_description2').html(descrmsg);
    	
	    $hdwt.post(location.href,{channel_decr:descrmsg}, function( data ) {
			
		});
        
    });
    
	
	$hdwt('.delete_add_channel').click(function(){
		var thispageurl = $hdwt('#this_page_url').val();
	    var deleteid = this.id;
	    $hdwt.post(thispageurl,{remove_channel:deleteid}, function( data ) {
			
		});    
	});

$hdwt('#add_a_channel').click(function(){

	var thispageurl = $hdwt('#this_page_url').val();
	var chan = $hdwt('#add_channel_name').val();
	$hdwt('#yclone_add_your_channel').html(chan);
	$hdwt.post(thispageurl,{add_channel:chan}, function( data ) {
		location.reload();
	});
	
});

$hdwt('#add1_chanel').click(function(){

	var x =$hdwt('#txt_channel_url').val();
	var thispageurl = $hdwt('#this_page_url').val();
    $hdwt.post(thispageurl,{mys_channel:x}, function( data ) {
		var aa = data.split('`')[1];
		var ab= data.split('`')[2];
		var ac = data.split('`')[3];
		
		if(aa == "error1")
		{
			$hdwt('#error_msg').html("Sorry! A channel cannot list itself as featured.");
		}
		else if(aa == "error2")
		{
			$hdwt('#error_msg').html("Sorry, this item has already been added.");
		}
		else if(aa == "error3")
		{
			$hdwt('#error_msg').html("Could not find a channel with that URL.");
		}
			
		else
		{
			$hdwt('#error_msg').html("");
		var code = '<div style="float:left; margin: 15px; cursor:pointer; background-image: url('+ab+'); width:75px; height:75px; background-size: 100%;">';
		    code +='<img class="delete_add_channel" id="'+ac+'" onClick="parentNode.remove();" src="<?php echo $img_folder_path;?>delete.png" style=" float:right; width:20px; height:20px"/>';
		    code +='<div style="margin-top:80px; width:75px; height:15px; color:#2793e6; font-weight:bold; cursor:pointer; overflow:hidden;">'+aa+'</div></div>';
		   
	   var code1 ='<div style="float: left;"><img src="'+ab+'" style="width: 30px; height: 30px;" /></div>';
	        code1 +='<div style="margin-left: 10px; float: left;">';
	        code1 +='<span style="color: #2793e6; font-weight: bold; font-size: 14px;">'+aa+'</span><br>';
	        code1 +='<div style="margin-bottom:10px; display: inline-block; border: 1px solid #999; cursor: pointer; border-radius: 2px; padding: 0px 5px 0px 5px; background-color: rgb(245, 245, 245); font-size: 11px;">';
	        code1 +='subscribe';
	        code1 +='</div></div>';
	        code1 +='<div style="clear: both;"></div>';
		  
	    $hdwt('#add_ch_list_v').append(code1);
		$hdwt('#ddddd').append(code);
		$hdwt('#chans_found').html("");
		}
	}, 'text');
});
	
	$hdwt('#btn_url_icon').click(function(){
		
		$hdwt('.yclone_btn_none').hide();
		$hdwt('#btn_change_icon').show();
		
		$hdwt('.yclone_ch_icon_option').hide();
		var url = $hdwt('#txt_url_icon').val();
		$hdwt('#yclone_ch_icon_output1').show();
		$hdwt('#ch_icon_profile').attr('src',url);
			
	});

    $hdwt('#btn_url_banner').click(function(){
		
		$hdwt('.yclone_btn_none').hide();
		$hdwt('#btn_change_banner').show();
		
		$hdwt('.yclone_ch_banner_option').hide();
		var url = $hdwt('#txt_url_banner').val();
		$hdwt('#yclone_ch_banner_output1').show();
		$hdwt('#ch_banner_profile').css('background-image','url('+url+')');
			
	});
	

	$hdwt('#btn_change_icon').click(function(){
		var thispageurl = $hdwt('#this_page_url').val();
		var change_icon = $hdwt('#ch_icon_profile').attr('src');
		$hdwt.post(thispageurl,{changeicon:change_icon}, function( data ) {
			location.reload();
		});
	});

	$hdwt('#btn_change_banner').click(function(){
		var thispageurl = $hdwt('#this_page_url').val();
		var change_banner = $hdwt('#ch_banner_profile').css('background-image');
		change_banner = change_banner.replace('url(','').replace(')','');
		$hdwt.post(thispageurl,{changebanner:change_banner}, function( data ) {
			location.reload();
		});
	});
	
	$hdwt('.Icon_gallery_img_id').click(function(){

		$hdwt('.yclone_btn_none').hide();
		$hdwt('#btn_change_icon').show();
		
		$hdwt('.yclone_ch_icon_option').hide();
		var url = $hdwt(this).attr('src');
		$hdwt('#yclone_ch_icon_output1').show();
		$hdwt('#ch_icon_profile').attr('src',url);
		
		
	});

	$hdwt('.banner_gallery_img_id').click(function(){

		$hdwt('.yclone_btn_none').hide();
		$hdwt('#btn_change_banner').show();
		
		$hdwt('.yclone_ch_banner_option').hide();
		var url = $hdwt(this).attr('src');
		$hdwt('#yclone_ch_banner_output1').show();
		$hdwt('#ch_banner_profile').css('background-image','url('+url+')');
		
		
	});
	
	$hdwt('#yclone_art_and_channel').mouseover(function(){
		   $hdwt('#edit_channel_art_img').show();
		
	}).mouseout(function(){
		$hdwt('#edit_channel_art_img').hide();
	});
   
	

	$hdwt('#yclone_icon_img').mouseover(function(){
		   $hdwt('#edit_channe_banner_img').show();
		
	}).mouseout(function(){
		$hdwt('#edit_channe_banner_img').hide();
	});

	
	$hdwt('.yclone_ch_menu_title').click(function (){
		$hdwt('.yclone_ch_menu_title').css('border-bottom', '0px solid #ffffff');
		$hdwt('.yclone_ch_menu_option').hide();
		$hdwt(this).css('border-bottom', '4px solid #cc181e');

		$hdwt('#' + this.id + '_content').show();	
		$hdwt('#form_addvideo_playlist').hide();	
	});	

	$hdwt('.yclone_ch_icon_menu').click(function (){
		$hdwt('.yclone_ch_icon_menu').css({'border-left':'0px solid #ffffff','color':'black','font-weight':'normal','background':'none'});
		$hdwt('.yclone_ch_icon_option').hide();
		$hdwt('#yclone_ch_icon_output1').hide();
		$hdwt(this).css({'border-left':'4px solid #cc181e','color':'#cc181e','font-weight':'bold','background':'#F0F0F0'});
		$hdwt('#' + this.id + '_content').show();	
			
	});	

	$hdwt('.yclone_ch_banner_menu').click(function (){
		$hdwt('.yclone_ch_banner_menu').css({'border-left':'0px solid #ffffff','color':'black','font-weight':'normal','background':'none'});
		$hdwt('.yclone_ch_banner_option').hide();
		$hdwt('#yclone_ch_banner_output1').hide();
		$hdwt(this).css({'border-left':'4px solid #cc181e','color':'#cc181e','font-weight':'bold','background':'#F0F0F0'});
		$hdwt('#' + this.id + '_content').show();	
			
	});

	$hdwt('.home_video_thumpnails').mouseover(function(){
		var getid = (this.id).split('my_chn_')[1];
		$hdwt('#wl_h_'+getid).show();
		  
	}).mouseout(function(){
		var getid = (this.id).split('my_chn_')[1];
		$hdwt('#wl_h_'+getid).hide();
	});	

	$hdwt('.watch_later_property_home').click(function(){

		var getid = (this.id).split('wl_h_')[1]; 
	    $hdwt.post(location.href,{watchlater:getid}, function( data ) 
	    {
		    if(data=="success")
		    {
		        $hdwt('#wl_h_'+getid).html('<img src="<?php echo $img_folder_path.'right.png';?>" style="width:15px; height:15px;"/>');
		    }
		    
	    });		
	    return false;
	    
	});

	
});

</script>
<?php

require_once 'search.php';
$homechannel .= $topmenu;

$get_settings = $wpdb->get_row("SELECT * FROM $settings_table_name");

$add_channel    = $wpdb->get_row( $wpdb->prepare("SELECT * FROM $addchannel_table_name WHERE channelid=%d",$_GET['channel']));
$total_video    = $wpdb->get_results($wpdb->prepare("SELECT * FROM $video_table_name WHERE channel_id=%d LIMIT 0,%d",$_GET['channel'],$get_settings->noofhomemenuvid));
$chceck_channel_profile = $wpdb->get_row($wpdb->prepare("SELECT * FROM $channel_table_name WHERE userid=%d AND channel_id=%d",$current_user->ID,$_GET['channel']));

$channel_profile = $wpdb->get_row($wpdb->prepare("SELECT * FROM $channel_table_name WHERE channel_id=%d",$_GET['channel']));

$channel_icon = $channel_profile->channel_icon;

if (filter_var($channel_icon, FILTER_VALIDATE_EMAIL))
{
    $icon_src = "http://www.gravatar.com/avatar/" . md5(strtolower($channel_icon)) . "?d=" . urlencode($default) . "&s=100";
}
else
{
    $icon_src = $channel_icon; 
}

$homechannel  .= '<link rel="stylesheet" href="' . $slider_css_url . '" type="text/css" media="screen"/>';
$homechannel .= '<script type="text/javascript" src="' . $slider_url .'"></script>';
$homechannel .= '<input type="hidden" id="this_page_url" value="' . $pluginurl .'"/>';


$homechannel .= '<div id="yclone_channel" style="font-family: calibri; background: #E0E0E0; border: 1px solid #D0D0D0; padding: 0px 20px 40px 20px;">';
$get_subscr = $wpdb->get_results($wpdb->prepare("SELECT * FROM $subscribtion_table_name WHERE subsc_channel_id=%d",$_GET['channel']));
if($chceck_channel_profile)
{
    
    $homechannel .= ' <div id="yclone_ch_manu" style="padding: 10px; background: white;">';
    
    
    
    $homechannel .= ' <div class="yclone_ch_manu1" style="float: left;" onclick="location.href=\''.$pluginurl.'subscription_manager='.$_SESSION['your_current_channel'].'\'">'.count($get_subscr).' subscribers</div>';
    $homechannel .= ' <div class="yclone_ch_manu1" style="float: left; padding-left: 20px;">';
    $homechannel .= ' <img src="' . $img_folder_path .'chart_bar.png" style="padding-right: 5px; height: 15px; width: 15px" />Analytics';
    $homechannel .= ' </div><div class="yclone_ch_manu1" style="float: left; padding-left: 20px;" onclick="location.href=\''.$pluginurl.'videomanager='.$_SESSION['your_current_channel'].'\'">';
	$homechannel .= ' <img src="' . $img_folder_path . 'manager_icon.png" style="padding-right: 5px; height: 15px; width: 15px" />Video Manager </div>';
	$homechannel .= ' <div style="clear: both"></div></div>';
}

$homechannel .= '<div id="yclone_art_and_channel"	style="width: 100%; height: 150px; background-size: 100% 100%; background-image: url(' . $channel_profile->channel_banner .');">
		         <div id="yclone_icon_img" style="float: left; margin-left: 20px; width: 100px; height: 100px; background-size: 100px; background-repeat: no-repeat; background-image: url(' . $icon_src . ');">';
if ($chceck_channel_profile)
{
    $homechannel .= '<div id="edit_channe_banner_img" class="edit_ch_icon_img" style="cursor: pointer; display: none;" onclick="popuppppp(\'edit_channel_icon\',\'edit_channel_icon_handle\');">';
	$homechannel .= '<img src="' . $img_folder_path . 'edit.png" style="width: 15px; height: 15px;" /></div>';
}
$homechannel .= '</div>';
if ($chceck_channel_profile) 
{
    
    $homechannel .= '<div id="edit_channel_art_img" class="edit_ch_icon_img" style="float: right; display: none; cursor: pointer;" onclick="popuppppp(\'edit_channel_banner\',\'edit_channel_banner_handle\');">';
	$homechannel .= '<img src="' . $img_folder_path . 'edit.png" style="width: 15px; height: 15px;" /></div>';
}

$homechannel .= '<div style="clear: both;"></div></div>';
$homechannel .= '<div style="background: white; width: 100%; padding: 15px 0px 0px 0px; box-shadow: 0 1px 2px #989898;">';
$homechannel .= '<div id="yclone_mychannel_channelname" style="float: left; color: #333; padding-left: 15px; cursor: pointer; font-weight: bold; font-size: 23px;">' . $channel_profile->channel_name . '</div>';

if(!$chceck_channel_profile)
{  
    $homechannel .= '<div class="no_of_subscr" style="float: right; padding: 1px; margin-right: 10px;">'.count($get_subscr).'</div>';
    
    $chceck_subscripe = $wpdb->get_row($wpdb->prepare("SELECT * FROM $subscribtion_table_name WHERE channel_id=%d AND subsc_channel_id=%d",$_SESSION ['your_current_channel'],$_GET['channel']));
    
    if($current_user->ID)
    {
        if($chceck_subscripe)
        {
            $homechannel .= '<div class="yclone_btn_unsubscripe" id="sub_'.$_GET['channel'].'" style="float:right;">Unsubscribe</div>';        
        }
        else
        {
            $homechannel .= '<div class="yclone_btn_subscribe" id="unsub_'.$_GET['channel'].'" style="float:right;"><div style="float:left;"><img src="'.$img_folder_path.'subscr_red_btn.png" style="border-radius: 3px; margin: 4px 4px 0px 0px; width: 15px; height: 11px;"/></div><div style="float:left;">Subscribe</div></div>';
        }
    }
    else
    {
        $homechannel .= '<div class="yclone_no_btn_subscribe" style="float:right;"><div style="float:left;"><img src="'.$img_folder_path.'subscr_red_btn.png" style="border-radius: 3px; margin: 4px 4px 0px 0px; width: 15px; height: 11px;"/></div><div style="float:left;">Subscribe</div></div>';
    }
}

$homechannel .= '<div style="clear: both;"></div>';

$homechannel .= '<div style="padding: 15px 0px 0px 15px; color:black;">';

if($get_settings->sh_cmenu_home == 1)
{
    if($get_settings->show_uploadbtn == "yes")
    {
        $homechannel .= '<div class="yclone_ch_menu_title" id="ylcone_ch_home_menu" style="border-bottom: 4px solid #cc181e;">Home</div>';
    }
}

if($get_settings->sh_cmenu_videos == 1){
    $homechannel .= '<div class="yclone_ch_menu_title" id="ylcone_ch_video_menu">Videos</div>';
}

if($get_settings->sh_cmenu_playlists == 1){
    $homechannel .= '<div class="yclone_ch_menu_title" id="ylcone_ch_playlist_menu">Playlists</div>';
}

if($get_settings->sh_cmenu_channel == 1){
$homechannel .= '<div class="yclone_ch_menu_title" id="ylcone_ch_channel_menu">Channel</div>';
}

if($get_settings->sh_cmenu_discussion == 1){
$homechannel .= '<div class="yclone_ch_menu_title" id="ylcone_ch_discussion_menu">Discussion</div>';
}

if($get_settings->sh_cmenu_about == 1){
$homechannel .= '<div class="yclone_ch_menu_title" id="ylcone_ch_about_menu">About</div>';
}

$homechannel .= '<div style="clear: both;"></div></div></div><div id="yclone_ch_contents" style="margin-top: 8px;">';

/**
 * *********************************************HOME MENU***********************************************************
 */

if($get_settings->sh_cmenu_home == 1){
    if($get_settings->show_uploadbtn == "yes")
    {
        $homechannel .= '<div class="yclone_ch_menu_option" id="ylcone_ch_home_menu_content" 	style="display: block;">';
	    require_once (dirname ( __FILE__ ) . '/mychannel/home.php');
        $homechannel .= $video;                             
        $homechannel .= '</div>';
    }
    else
    {
        $homechannel .= '<div class="yclone_ch_menu_option" id="ylcone_ch_home_menu_content" 	style="display: none;">';
        require_once (dirname ( __FILE__ ) . '/mychannel/home.php');
        $homechannel .= $video;
        $homechannel .= '</div>';
    }
}

/* *********************************************ABOUT MENU***********************************************************/
if($get_settings->sh_cmenu_about == 1){
$ch_descriptin = $wpdb->get_row($wpdb->prepare("SELECT * FROM $channel_table_name WHERE channel_id=%d",$_GET['channel']));
$homechannel .= '<div class="yclone_ch_menu_option" id="ylcone_ch_about_menu_content" 	style="display: none;">';

$homechannel .= '<div id="yclone_ch_list" style="width: 77%; height:500px; background: white; float: left; box-shadow: 0 1px 2px #989898;">';

$homechannel .= '<div id="ch_descripttions1" style=" border-bottom: 1px solid #B8B8B8;">';

if ($ch_descriptin->Description == "")
{
    if($chceck_channel_profile)
    {
        $homechannel .= '   <div id="chn_description1" class="yclone_btn_1">+ Channel description</div>';
    }
    else
    {
        $homechannel .= '<div id="chn_description2" style="padding: 10px; float: left;">' . $ch_descriptin->Description . '</div>';
    }
}
else
{
    $homechannel .= '<div id="show_hide_descr">';
    $homechannel .= '<div id="chn_description2" style="padding: 10px; float: left;">' . $ch_descriptin->Description . '</div>';
    if($chceck_channel_profile)
    {
        $homechannel .= '<div id="edit_chn_description" style="float:right; padding:10px; cursor:pointer;"><img src="'.$img_folder_path.'edit.png" style="width:15px; height:15px;"/></div>';
    }

    $homechannel .= '<div style="clear: both;"></div></div>';
}

$homechannel .= '</div>';

$homechannel .= '<div id="ch_descripttions2" style=" background:#E8E8E8; display:none;">';
$homechannel .= '<div style="float:right; padding-top:10px;">';
$homechannel .= '<div class="yclone_btn_4" id="desc_cancel" style="color: black; background: #C8C8C8; border: 1px solid #989898;">Cancel</div>';
$homechannel .= '<div id="desc_done" class="yclone_btn_4">Done</div>';
$homechannel .= '</div>';

$homechannel .= '<div style="clear:both;"></div>';
$homechannel .= '<div style="font-size: 12px; padding-left:10px; font-weight: bold; color: #333; text-transform: uppercase;">CHANNEL DESCRIPTION</div>';
$homechannel .= '<div style="padding:10px;"><textarea id="txt_descriptionbox" style="resize: none; width:100%; height: 60px;">' . $ch_descriptin->Description . '</textarea></div>';
$homechannel .= '</div>';

$homechannel .= '</div>';

$homechannel .= '<div id="channel_home_right" style="width: calc(30% - 47px);; float: right;">
				<div style="padding: 10px; background: white; box-shadow: 0 1px 2px #989898;">
					<div id="yclone_add_your_channel" style="padding-bottom: 10px; font-weight: bold; color: #333; font-size: 18px;">' . $add_channel->channelname . '</div>';
$homechannel .= '<div style="margin-bottom: 10px;">';
$homechannel .= '<div id="add_ch_list_v"></div>';

if ($get_add_channellist)
{
    for ($i = 0; $i < count($get_add_channellist); $i++)
    {
        $homechannel .= '<div style="float: left;"><img src="' . $get_add_channellist[$i]->channelthumb .'" style="width: 30px; height: 30px;" /></div>';
    	$homechannel .= '<div style="margin-left: 10px; float: left;"><span style="color: #2793e6; font-weight: bold; font-size: 14px;" id="you_sub_ch_name_'.$get_add_channellist[$i]->add_channelid.'">' . $get_add_channellist[$i]->channelname . '</span><br>';
    	$homechannel .= '<div class="btn_subscr_mychannel_others" id="you_subscr_'.$get_add_channellist[$i]->add_channelid.'">subscribe</div>';
    	$homechannel .= '</div><div style="clear: both;"></div>';
}
}
$homechannel .= '</div>';
if($chceck_channel_profile)
{
$homechannel .= '<div class="yclone_btn_1" id="yclone_add_channels" onclick="popuppppp(\'add_new_channel\',\'add_new_channel_handle\');">+Add Channels</div>';
}

$date = strtotime(date('Y-m-d H:i:s').' -1 month');
$get_date = date('Y-m-d H:i:s', $date);
$get_videos_channel = $wpdb->get_results($wpdb->prepare("SELECT channel_id FROM $video_table_name WHERE video_upload_time >= '".$get_date."' AND channel_id NOT IN(SELECT subsc_channel_id FROM $subscribtion_table_name WHERE channel_id = %d) GROUP BY channel_id ORDER BY video_view DESC LIMIT 0 , 10",$_GET['channel']));


$homechannel .= '</div><div style="padding: 10px; margin-top: 8px; background: white; box-shadow: 0 1px 2px #989898;"><div style="font-weight: bold; color: #333; font-size: 18px;">Popular Channels</div>';
for($i=0;$i<count($get_videos_channel);$i++)
{	
    $get_channel = $wpdb->get_row("SELECT * FROM $channel_table_name WHERE channel_id=".$get_videos_channel[$i]->channel_id);
    $homechannel .= '<div style="margin-top: 10px;">';
    $homechannel .= '<div style="float: left;"><img src="'.$get_channel->channel_icon.'" style="width: 30px; height: 30px;" /></div>';
    $homechannel .= '<div style="margin-left: 10px; float: left; width:70%;"><div style="overflow:hidden; color: #2793e6; font-weight: bold; font-size: 14px;" id="you_sub_ch_name_'.$get_channel->channel_id.'">'.$get_channel->channel_name.'</div>';
    $homechannel .= '<div class="btn_subscr_mychannel_others" id="you_subscr_'.$get_channel->channel_id.'">subscribe</div>';
    $homechannel .= '</div><div style="clear: both;"></div></div>';
}
$homechannel .= '</div></div><div style="clear: both;"></div>';

$homechannel .= '</div>';
}
 /* *********************************************VIDEO MENU***********************************************************/

if($get_settings->sh_cmenu_videos == 1){

    if($get_settings->show_uploadbtn == "yes")
    {
        $homechannel .= '<div class="yclone_ch_menu_option" id="ylcone_ch_video_menu_content" style="display: none;">';
        require_once (dirname ( __FILE__ ) . '/mychannel/video.php');
        $homechannel .=$video;
        $homechannel .='</div>';
    }
    else
    {
        $homechannel .= '<div class="yclone_ch_menu_option" id="ylcone_ch_video_menu_content" style="display: block;">';
        require_once (dirname ( __FILE__ ) . '/mychannel/video.php');
        $homechannel .=$video;
        $homechannel .='</div>';
    }
}
/** * *********************************************PLAYLISTs MENU*********************************************************** */

if($get_settings->sh_cmenu_playlists == 1){
$getplaylist = $wpdb->get_results($wpdb->prepare("SELECT * FROM $playlisttitle_table_name WHERE channelid=%d",$_GET['channel']));

$homechannel .= '<div class="yclone_ch_menu_option"	id="ylcone_ch_playlist_menu_content" style="display: none;">';

$homechannel .= '<div style="background: white; width: 100%; box-shadow: 0 1px 2px #989898;">';
$homechannel .= '<div style="padding: 10px;">';
$homechannel .= '<div class="yclone_btn_1" style="cursor: default;">Cretaed playlists</div>';
            
if($chceck_channel_profile)
{
    $homechannel .= '<div id="btn_new_playlist" style="margin-left: 10px;" class="yclone_btn_1">+ New playlists</div>';
}
$homechannel .= '<div id="form_new_playlist"  class="arrow_box" style="z-index:99; margin: 10px 0px 0px 110px; position: absolute; width:360px; height:153px; display:none;">';
	
$homechannel .= '<div style="padding-left:10px; margin-top: 15px; text-transform: uppercase; color: #333; font-size: 13px; font-weight: bold;">PLAYLIST TITLE</div>';
$homechannel .= '<div style="padding:0px 10px;"><input style="width:100%; height:30px; margin-top:10px;" type="text" id="txt_playlist_title" name="txt_playlist_title"/></div>';
$homechannel .= '<div style="background:#F0F0F0; padding: 19px 0px; margin-top:16px;">';
$homechannel .= '<div id="create_new_playlist" class="yclone_btn_4" style="float:right;">Create</div>';
$homechannel .= '<div class="yclone_btn_4" style="float:right; color: black; background: #C8C8C8; border: 1px solid #989898;">Cancel</div>';		  
$homechannel .= '<div style="clear:both;"></div>';
$homechannel .= '</div>';
$homechannel .= '</div>';
$homechannel .= '</div>';
$homechannel .= '</div>';


if (! $getplaylist) {
    $homechannel .= '<div style="padding-top: 25px; text-align: center; background: white; width: 100%; height: 400px; box-shadow: 0 1px 2px #989898;">
				     <div style="color: #B8B8B8;">No playlists Yet!</div>';
    if ($chceck_channel_profile)
    {
		$homechannel .= '<div class="yclone_btn_1" style="margin-top: 10px;">Create a playlist</div>';
    }
	$homechannel .= '</div>';
} else {
    require_once (dirname ( __FILE__ ) . '/mychannel/playlist.php');
    $homechannel .=$playlist;
}
    $homechannel .= '</div>';
}
    
/* *********************************************DISCUSSION MENU***********************************************************/

if($get_settings->sh_cmenu_discussion == 1){
$homechannel .= '<div class="yclone_ch_menu_option" id="ylcone_ch_discussion_menu_content" style="display: none;">';

$get_user_info = $wpdb->get_row($wpdb->prepare("SELECT * FROM $channel_table_name WHERE userid=%d AND channel_id=%d",$current_user->ID,$_SESSION['your_current_channel']));

$homechannel .= ' <input type="hidden" id="user_image" value="' . $get_user_info->channel_icon .'"/>
		          <input type="hidden" id="user_name" value="' . $get_user_info->channel_name .'"/>
		          <input type="hidden" id="image_path" value="' .$img_folder_path . '"/> ';
$get_channel_comt = $wpdb->get_results($wpdb->prepare("SELECT * FROM $channel_chating_table WHERE channelid=%d",$_GET['channel']));
$homechannel .= '<div id="yclone_ch_list" style="width: 70%; height: 600px; background: white; float: left; padding: 15px; box-shadow: 0 1px 2px #989898; overflow:auto;">';
if ($get_channel_comt) 
{
    $homechannel .= '	<span style="font-weight: bold; color: #555;">ALL COMMENTS(' . count($get_channel_comt) . ')</span>';
} 
else 
{
    $homechannel .= '	    <span style="font-weight: bold; color: #555;">NO COMMENTS YET</span>';
}

$homechannel .= '<div id="message_ch" style="margin-top: 10px;">
					<div style="float: left;"><img src="' . $get_user_info->channel_icon . '" style="margin-right: 10px; width: 50px; height: 50px;" /></div>
				   <div style="float: left; width: 70%;">';
if (! $get_user_info)
{
    $homechannel .= '<textarea readonly style="color:#D8D8D8; resize: none; width: 100%; height: 48px; padding:0;">Please Login to Share your Comment</textarea>';
} 
else 
{
    $homechannel .= '<textarea id="txt_comments_channel" style="resize: none; width: 100%; height: 48px; padding: 0;"></textarea>		                                 ';
}
$homechannel .= '</div>';
if ($get_user_info) 
{  
   $homechannel .= '<div id="post_channel_comment" class="yclone_btn_2">Post</div>';
}
$homechannel .= '	<div style="clear: both"></div></div>';

if ($get_channel_comt) {
    for ($i = 0; $i < count($get_channel_comt); $i ++) {
        
        if (filter_var($get_channel_comt[$i]->channel_icon,  FILTER_VALIDATE_EMAIL)) {
            $icon_src = "http://www.gravatar.com/avatar/" . md5(strtolower($get_channel_comt[$i]->channel_icon)) . "?d=" . urlencode($default) . "&s=40";
        } else {
            $icon_src = $get_channel_comt[$i]->channel_icon;
        }
        
        $n = date('Y-m-d H:i:s');
        $video_upload_time = date_diff(
                date_create($get_channel_comt[$i]->message_time),
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
        
        $homechannel .= '<div style="margin-top: 10px;">
					<div style="float: left;"><img src="' . $icon_src .'" style="margin-right: 10px; width: 40px; height: 40px;" /></div>
					<div style="float: left;"><span style="background-color: #dbe4eb; color: #2793e6; font-size:13px; padding: 0 5px; cursor:pointer; font-weight: bold;" onclick="location.href=\''.$pluginurl.'channel='.$get_channel_comt[$i]->user_channel_id.'\'">' . $get_channel_comt[$i]->channel_name .'</span><span style="color: #999; font-size:13px; padding-left: 10px;">'.$up_ago.'</span><br>
                    <span style="font-size:15px;">' . $get_channel_comt[$i]->message . '</span></div>
					<div style="clear: both"></div></div>';
    }
}

$homechannel .= '</div>';

		$homechannel .= '<div id="channel_home_right" style="width: calc(30% - 47px); float: right;">
				<div style="padding: 10px; background: white; box-shadow: 0 1px 2px #989898;">
					<div id="yclone_add_your_channel" style="padding-bottom: 10px; font-weight: bold; color: #333; font-size: 18px;">' . $add_channel->channelname . '</div>';
$homechannel .= '<div style="margin-bottom: 10px;">';
$homechannel .= '<div id="add_ch_list_v"></div>';

if ($get_add_channellist) 
{
    for ($i = 0; $i < count($get_add_channellist); $i++) 
    {
        $homechannel .= '<div style="float: left;"><img src="' . $get_add_channellist[$i]->channelthumb .'" style="width: 30px; height: 30px;" /></div>';
    	$homechannel .= '<div style="margin-left: 10px; float: left;"><span style="color: #2793e6; font-weight: bold; font-size: 14px;" id="you_sub_ch_name_'.$get_add_channellist[$i]->add_channelid.'">' . $get_add_channellist[$i]->channelname . '</span><br>';
    	$homechannel .= '<div class="btn_subscr_mychannel_others" id="you_subscr_'.$get_add_channellist[$i]->add_channelid.'">subscribe</div>';
    	$homechannel .= '</div><div style="clear: both;"></div>';
    }
}
$homechannel .= '</div>';
if($chceck_channel_profile)
{
    $homechannel .= '<div class="yclone_btn_1" id="yclone_add_channels" onclick="popuppppp(\'add_new_channel\',\'add_new_channel_handle\');">+Add Channels</div>';
}
                
$homechannel .= '</div>';

$date = strtotime(date('Y-m-d H:i:s').' -1 month');
$get_date = date('Y-m-d H:i:s', $date);
$get_videos_channel = $wpdb->get_results($wpdb->prepare("SELECT channel_id FROM $video_table_name WHERE video_upload_time >= '".$get_date."' AND channel_id NOT IN(SELECT subsc_channel_id FROM $subscribtion_table_name WHERE channel_id = %d) GROUP BY channel_id ORDER BY video_view DESC LIMIT 0 , 10",$_GET['channel']));


$homechannel .= '<div style="padding: 10px; margin-top: 8px; background: white; box-shadow: 0 1px 2px #989898;"><div style="font-weight: bold; color: #333; font-size: 18px;">Popular Channels</div>';
for($i=0;$i<count($get_videos_channel);$i++)
{	
    $get_channel = $wpdb->get_row("SELECT * FROM $channel_table_name WHERE channel_id=".$get_videos_channel[$i]->channel_id);
    $homechannel .= '<div style="margin-top: 10px;">';
    $homechannel .= '<div style="float: left;"><img src="'.$get_channel->channel_icon.'" style="width: 30px; height: 30px;" /></div>';
    $homechannel .= '<div style="margin-left: 10px; float: left; width:70%;"><div style="overflow:hidden; color: #2793e6; font-weight: bold; font-size: 14px;" id="you_sub_ch_name_'.$get_channel->channel_id.'">'.$get_channel->channel_name.'</div>';
    $homechannel .= '<div class="btn_subscr_mychannel_others" id="you_subscr_'.$get_channel->channel_id.'">subscribe</div>';
    $homechannel .= '</div><div style="clear: both;"></div></div>';
}
$homechannel .= '</div></div><div style="clear: both;"></div></div><div style="clear: both;"></div></div>';
}
 /* ***********************************************************************CHANNEL MENU************************************************************************ */

if($get_settings->sh_cmenu_channel == 1){
$homechannel .= '<div class="yclone_ch_menu_option" id="ylcone_ch_channel_menu_content" style="display: none;">';
$homechannel .= '<div id="yclone_ch_list" style="width: 100%; background: white; box-shadow: 0 1px 2px #989898;">';

if($get_add_channellist)
{
    $homechannel .= '<div id="about_add_channel" style="padding: 0px 0px 0px 10px; border-bottom: 1px solid #B8B8B8;">';
    $homechannel .= '<div style="font-weight: bold; color: #333; font-size: 18px; padding: 10px 0px 10px 0px;">' . $add_channel->channelname . '</div>';
    
    
    for ($i = 0; $i < count($get_add_channellist); $i ++) 
    {
        $get_count_subscr = $wpdb->get_results("SELECT * FROM $subscribtion_table_name WHERE subsc_channel_id=".$get_add_channellist[$i]->add_channelid);
        
        $homechannel .= '<div style="margin-right: 20px; float: left; width: 100px;">';
        $homechannel .= '<img src="' .  $get_add_channellist[$i]->channelthumb . '" style="width: 100px; height: 100px;" /><br> <span class="add_channel_title_1" onclick="location.href=\''.$pluginurl.'channel='.$get_add_channellist->add_channelid.'\'">' . $get_add_channellist[$i]->channelname . '</span><br>';
        $homechannel .= '<div style="margin-bottom: 25px; color: #a8a8a8; cursor: default; background: #fafafa; border: 1px solid #e8e8e8; text-align: center; display: inline-block; padding: 0px 15px 0px 15px; color: #a8a8a8; font-size: 10px;">'.count($get_count_subscr).' subscribers</div>';
        $homechannel .= '</div>';
    }
    
    $homechannel .= '<div style="clear: both;"></div></div>';
}
else {
    $homechannel .= '<div style="height:300px; text-align:center;">No Recent Activity For Added Channel</div>';
}

$get_subscr = $wpdb->get_results($wpdb->prepare("SELECT * FROM $subscribtion_table_name WHERE channel_id=%d",$_GET['channel']));

if($get_subscr){
    $homechannel .= '<div style="padding: 10px;">';
    $homechannel .= '<div style="font-weight: bold; color: #333; font-size: 18px; padding: 0px 0px 10px 0px;">Subscriptions</div>';   
    
    for($i=0;$i<count($get_subscr);$i++)
    {
        $get_count_subscr = $wpdb->get_results("SELECT * FROM $subscribtion_table_name WHERE subsc_channel_id=".$get_subscr[$i]->subsc_channel_id);
        
        $get_channel_info = $wpdb->get_row("SELECT * FROM $channel_table_name WHERE channel_id=".$get_subscr[$i]->subsc_channel_id);
        $homechannel .= '<div style="margin-right: 20px; float: left; width: 100px;">';
        $homechannel .= '<img src="'.$get_channel_info->channel_icon.'" style="width: 100px; height: 100px;" /><br> <span class="add_channel_title_1">'.$get_channel_info->channel_name.'</span><br>';
        $homechannel .= '<div style="margin-bottom: 25px; color: #a8a8a8; cursor: default; background: #fafafa; border: 1px solid #e8e8e8; text-align: center; display: inline-block; padding: 0px 15px 0px 15px; color: #a8a8a8; font-size: 10px;">'.count($get_count_subscr).' subscribers</div></div>';
    } 
    $homechannel .= '<div style="clear: both;"></div></div>';
    }
$homechannel .= '</div></div>';
                }
$homechannel .= '<div style="clear: both;"></div></div>';

$homechannel .= '<script src="' . $popup_url . '" type="text/javascript"></script>';

?>
<script>
     function popuppppp(div, handle)
     {
    	 var Popup = DYN_WEB.Popup;
         Popup.setup( { id:div, handleId:handle, center:true } );
         var p = Popup.getInstance(div);
         p.on_init = p.show();
         blanket_size();
      }
</script>

<style type="text/css">

div.selvan,div.edit_channel_icon,div.edit_channel_banner 
{
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

div.add_new_channel 
{
	width: 50%;
	position: absolute;
	visibility: hidden;
	background-color: white;
	border: 1px solid #909090;
	z-index: 902;
}

</style>

<?php
$homechannel .= '
<div id="blanket" style="display: none;"></div>';
/* ******************************** * POPUP WINDOW IN EDIT CHANNEL BANNER * ************************************** */

$homechannel .= '<div class="edit_channel_banner" id="edit_channel_banner" style="font-family: calibri;">';
$homechannel .= '<div class="handle" id="edit_channel_banner_handle"></div>';

$homechannel .= '<div style="padding: 10px; border-bottom: 1px solid #B8B8B8;">';
$homechannel .= '<div style="float: left; font-weight: bold; color: black; font-size: 20px;">Channel Art</div>';
$homechannel .= '<div style="float: right; cursor: pointer;" id="closewindow" class="closeBox" onclick="blanket_size();"><img src="'.$img_folder_path.'close_icon.png" style="height: 15px; width: 15px;" /></div>';
$homechannel .= '<div style="clear: both;"></div></div>';

$homechannel .= '<div style="font-family: calibri;">';

$homechannel .= '<div style="float: left; height: 375px; width: 14%; border-right: 1px solid #B8B8B8;">';
$homechannel .= '<div class="yclone_ch_banner_menu" id="ylcone_ch_banner_upload"	style="margin-top: 10px; cursor: pointer; padding: 3px 0px 3px 10px; width: 100px; font-size: 15px; font-weight: bold; border-left: 4px solid #cc181e; color: #cc181e; background: #F0F0F0;">Upload	Photo</div>';
$homechannel .= '<div class="yclone_ch_banner_menu" id="ylcone_ch_banner_url" style="cursor: pointer; font-size: 15px; padding: 3px 0px 3px 10px; width: 100px;">Your Url</div>';
$homechannel .= '<div class="yclone_ch_banner_menu" id="ylcone_ch_banner_gallery" style="cursor: pointer; font-size: 15px; padding: 3px 0px 3px 10px; width: 100px;">Gallery</div>';
$homechannel .= '</div>';

$homechannel .= '<div style="float: left; width: 85.8%;">';

$homechannel .= '<div style="border-bottom: 1px solid #B8B8B8; padding: 10px;">';
$homechannel .= '<div class="yclone_ch_banner_option" id="ylcone_ch_banner_upload_content" style="text-align:center; height: 300px; display: block;">';

$homechannel .= '<div style="margin-top:125px; position: relative; cursor: pointer; display:inline-block;">';
$homechannel .= '<img src="'.$img_folder_path.'btn_upload.png" style=" cursor:pointer; width: 75px; height: 50px" />';
$homechannel .= '<div style="cursor:pointer; position: absolute; top: 0; opacity: 0;">';
$homechannel .= '<input id="select_banner_upload" name="upload_channel_icon" style="cursor: pointer; width: 75px; height: 50px;" type="file">';
$homechannel .= '</div>';
$homechannel .= '</div>';
	        
	        
$homechannel .= '</div>';
$homechannel .= '<div class="yclone_ch_banner_option" id="ylcone_ch_banner_url_content" style="vertical-align: middle; height: 300px; display: none;">';


$homechannel .= '<div style="padding: 10px;"><div style="margin-top: 10px;">Enter Your Channel Icon Url</div>';
$homechannel .= '<div style="margin-top: 10px;"><input id="txt_url_banner" type="text" size="100px" value="" /></div>';
$homechannel .= '<div class="yclone_btn_4" style="margin-top: 10px;" id="btn_url_banner">ok</div></div></div>';
 
$homechannel .= '<div class="yclone_ch_banner_option" id="ylcone_ch_banner_gallery_content" style="overflow: auto; overflow-x: hidden; padding: 10px; height: 280px; display: none;">';

for($i=1;$i<=3;$i++)
{
    $homechannel .= '<div style="float: left; cursor: pointer; margin: 0px 20px 20px 0px;"><img class="banner_gallery_img_id" id="banner_gallery_img_id'.$i.' " src="'.$banner_gallery_path.'banner_'.$i.'.jpg" style="height: 92px; width: 92px;" /></div>';
}
$homechannel .= '<div style="clear: both;"></div></div>';

$homechannel .= '<div class="yclone_ch_banner_output" id="yclone_ch_banner_output1" style="height: 300px; display: none;">';

$homechannel .= '<div><span style="font-size: 20px; font-weight: bold; color: #808080;">Your channel art is going to look as below</span></div>';
$homechannel .= '<div style="margin-top: 15px;">Here are sample view</div>';
$homechannel .= '<div id="ch_banner_profile" style="margin-top: 60px; width: 100%; height: 150px; background-size: 100% 100%; background-image: url('.$channel_profile->channel_banner.');">';
$homechannel .= '<div style="margin-left: 20px;"><img style="width: 100px; height: 100px;" src="'.$icon_src.'" /></div>';
$homechannel .= '</div></div></div>';

$homechannel .= '<div style="padding: 15px;">';
$homechannel .= '<div class="yclone_btn_4" id="btn_change_banner" style="display:none;">Select</div>';
$homechannel .= '<div class="yclone_btn_none" style="cursor:default;">Select</div>';

$homechannel .= '<div class="yclone_btn_4 closeBox" onclick="document.getElementById(\'closewindow\').click();" style="color: black; background: #C8C8C8; border: 1px solid #989898;">Cancel</div></div>';
$homechannel .= '</div></div></div>';


/* ******************************** * POPUP WINDOW IN EDIT CHANNEL ICON * ************************************** */


$homechannel .= '<div class="edit_channel_icon" id="edit_channel_icon" style="font-family: calibri;">';
$homechannel .= '<div class="handle" id="edit_channel_icon_handle"></div>';

$homechannel .= '<div style="padding: 10px; border-bottom: 1px solid #B8B8B8;">';
$homechannel .= '<div style="float: left; font-weight: bold; color: black; font-size: 20px;">Channel Icon</div>';
$homechannel .= '<div style="float: right; cursor: pointer;" id="closewindow" class="closeBox" onclick="blanket_size();"><img src="'.$img_folder_path.'close_icon.png" style="height: 15px; width: 15px;" /></div>';
$homechannel .= '<div style="clear: both;"></div></div>';

$homechannel .= '<div style="font-family: calibri;">';

$homechannel .= '<div style="float: left; height: 375px; width: 14%; border-right: 1px solid #B8B8B8;">';
$homechannel .= '<div class="yclone_ch_icon_menu" id="ylcone_ch_icon_upload"	style="margin-top: 10px; cursor: pointer; padding: 3px 0px 3px 10px; width: 100px; font-size: 15px; font-weight: bold; border-left: 4px solid #cc181e; color: #cc181e; background: #F0F0F0;">Upload	Photo</div>';
$homechannel .= '<div class="yclone_ch_icon_menu" id="ylcone_ch_icon_url" style="cursor: pointer; font-size: 15px; padding: 3px 0px 3px 10px; width: 100px;">Your Url</div>';
$homechannel .= '<div class="yclone_ch_icon_menu" id="ylcone_ch_icon_gallery" style="cursor: pointer; font-size: 15px; padding: 3px 0px 3px 10px; width: 100px;">Gallery</div>';
$homechannel .= '</div>';

$homechannel .= '<div style="float: left; width: 85.8%;">';

$homechannel .= '<div style="border-bottom: 1px solid #B8B8B8; padding: 10px;">';

$homechannel .= '<div class="yclone_ch_icon_option" id="ylcone_ch_icon_upload_content" style="text-align:center; height: 300px; display: block;">';
    	        
$homechannel .= '<div style="margin-top:125px; position: relative; cursor: pointer; display:inline-block;">';
$homechannel .= '<img src="'.$img_folder_path.'btn_upload.png" style=" cursor:pointer; width: 75px; height: 50px" />';
$homechannel .= '<div style="cursor:pointer; position: absolute; top: 0; opacity: 0;">';
$homechannel .= '<input id="select_icon_upload" name="upload_channel_icon" style="cursor: pointer; width: 75px; height: 50px;" type="file">';
$homechannel .= '</div>';
$homechannel .= '</div>';

    	        
$homechannel .= '</div>';
$homechannel .= '<div class="yclone_ch_icon_option" id="ylcone_ch_icon_url_content" style="vertical-align: middle; height: 300px; display: none;">';


$homechannel .= '<div style="padding: 10px;"><div style="margin-top: 10px;">Enter Your Channel Icon Url</div>';
$homechannel .= '<div style="margin-top: 10px;"><input id="txt_url_icon" type="text" size="100px" value="" /></div>';
$homechannel .= '<div class="yclone_btn_4" style="margin-top: 10px;" id="btn_url_icon">ok</div></div></div>';
	        
$homechannel .= '<div class="yclone_ch_icon_option" id="ylcone_ch_icon_gallery_content" style="overflow: auto; overflow-x: hidden; padding: 10px; height: 280px; display: none;">';
	       
for($i=1;$i<=15;$i++)
{    
	 $homechannel .= '<div style="float: left; cursor: pointer; margin: 0px 20px 20px 0px;"><img class="Icon_gallery_img_id" id="Icon_gallery_img_id'.$i.' " src="'.$icon_gallery_path.'Icon_'.$i.'.jpg" style="height: 92px; width: 92px;" /></div>';       
}
$homechannel .= '<div style="clear: both;"></div></div>';

$homechannel .= '<div class="yclone_ch_icon_output" id="yclone_ch_icon_output1" style="height: 300px; display: none;">';

$homechannel .= '<div><span style="font-size: 20px; font-weight: bold; color: #808080;">Your channel art is going to look as below</span></div>';
$homechannel .= '<div style="margin-top: 15px;">Here are sample view</div>';
$homechannel .= '<div style="margin-top: 60px; width: 100%; height: 150px; background-image: url('.$channel_profile->channel_banner.');">';
$homechannel .= '<div style="margin-left: 20px;"><img id="ch_icon_profile" style="width: 100px; height: 100px;" src="'.$icon_src.'" /></div>';
$homechannel .= '</div></div></div>';

$homechannel .= '<div style="padding: 15px;">';
$homechannel .= '<div class="yclone_btn_4" id="btn_change_icon" style="display:none;">Select</div>';
$homechannel .= '<div class="yclone_btn_none" style="cursor:default;">Select</div>';

$homechannel .= '<div class="yclone_btn_4 closeBox" onclick="document.getElementById(\'closewindow\').click();" style="color: black; background: #C8C8C8; border: 1px solid #989898;">Cancel</div></div>';
$homechannel .= '</div></div></div>';



/* ******************************** * POPUP WINDOW IN ADD NEW CHANNEL * ************************************** */

$icon_url = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/widget_icon/browsechannel.png';
$homechannel .= '<div class="add_new_channel" id="add_new_channel"	style="font-family: calibri;">';
$homechannel .= '<div class="handle" id="add_new_channel_handle"></div>';

$homechannel .= '<div style="padding: 10px;"> <div style="font-weight: bold; text-overflow: ellipsis; color: #555; font-size: 17px; padding: 0px 0px 10px 0px;">Add channels to section</div>';

$homechannel .= '<div style="font-size: 12px; font-weight: bold; color: #333; text-transform: uppercase;">SECTION TITLE</div>';
$homechannel .= '<div style="margin-top: 10px;"><input type="text" id="add_channel_name" name="your_channel_title" size="100%;" value="' . $add_channel->channelname . '" style="height: 30px;" /></div>';
			        
$homechannel .= '<div style="float: left; margin-top: 10px;"><input id="txt_channel_url" type="text" name="your_channel_title" style="height: 30px;" size="90px;" placeHolder="Enter Channel URL" /></div>';
			        
$homechannel .= '<div id="add1_chanel" style="float: left; margin: 10px 0px 20px 0px;" class="yclone_btn_5">';
$homechannel .= '<div style="float: left;"><img src="'.$icon_url.'" style="width: 20px; height: 20px;" /></div>';
$homechannel .= '<div style="float: left; margin-top: 3px;">Add</div><div style="clear: both;"></div>';
$homechannel .= '</div> <div style="clear: both;"></div>';
		            
$homechannel .= '<div id="error_msg" style="color:red;"></div>';

$homechannel .= '<div style="margin: 0px 0px 0px 15px; color: #333; font-size: 13px; padding-bottom: 5px; font-weight: bold; border-bottom: 3px solid #cc181e; display: inline-block;">Added Channels</div>';

$get_add_channellist = $wpdb->get_results($wpdb->prepare("SELECT * FROM $addchannellist_table_name WHERE userid=%d AND channelid=%d",$current_user->ID,$_SESSION['your_current_channel']));

$homechannel .= '<div style="border: 1px solid #e2e2e2; overflow-x:hidden; overflow:auto; height: 300px;" >';
$homechannel .= '<div id="ddddd" style="float:left"></div>';
if (! $get_add_channellist) 
{
    $homechannel .= ' <div id="chans_found">No channels added. Add channels above.</div>';
} 
else 
{
    for ($i = 0; $i < count($get_add_channellist); $i ++) 
    {
        $homechannel .= '<div style="float:left; margin: 15px; cursor:pointer; background-image: url(' . $get_add_channellist[$i]->channelthumb .'); width:75px; height:75px; background-size: 100%;">';
		$homechannel .= '<img class="delete_add_channel" id="' . $get_add_channellist[$i]->add_channelid .'" onClick="parentNode.remove();" src="' . $img_folder_path .'delete.png" style=" float:right; width:20px; height:20px"/>';
		$homechannel .= '<div style="margin-top:80px; width:75px; height:15px; color:#2793e6; font-weight:bold; cursor:pointer; overflow:hidden;">' . $get_add_channellist[$i]->channelname . '</div>';
		$homechannel .= '</div>';
    }
    
    $homechannel .= '  <div style="clear: both;"></div>';
}

$homechannel .= '</div></div>';
$homechannel .= '<div style="padding: 15px 20px; text-align: right; background: #f1f1f1;">';
$homechannel .= '<div class="yclone_btn_4 closeBox" id="noth" onclick="document.getElementById(\'closewindow\').click();" style="color: black; background: #C8C8C8; border: 1px solid #989898;">Cancel</div>';
$homechannel .= '<div id="add_a_channel" class="yclone_btn_4" onclick="document.getElementById(\'noth\').click();">Done</div>';
$homechannel .= '</div>';

$homechannel .= '</div>';
?>

<script>
function blanket_size() 
{
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