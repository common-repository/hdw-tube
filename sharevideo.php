<style>
.video_share_menu
{
    color: #333;
    font-size: 13px;
    opacity: .5;
    font-family: arial,sans-serif;
    font-weight:bold;
    cursor:pointer;
    margin-right:10px;
}
#video_share_icon img
{
    width:25px;
    height:25px; 
    margin-right:10px;
    cursor:pointer;
}
</style>
<script>
$hdwt(document).ready(function(){
	$hdwt('.video_share_menu').click(function (){
		$hdwt('.video_share_menu').css('border-bottom', '0px solid #ffffff');
		$hdwt('.video_share_menu').css('opacity', '.5');
		
		$hdwt('.video_share_content').hide();
		$hdwt(this).css('border-bottom', '2px solid black');
		$hdwt(this).css('opacity', '1');
		
		$hdwt('#' + this.id + '_content').show();
	});

	var htmlString = $hdwt('#video_player_div').html();
	$hdwt('#embedvideo').text(htmlString);

	$hdwt('#send_email_btn').click(function (){
	    var toaddr  = $hdwt('#txt_email_share').val();
	    var message =  $hdwt('#email_message_content').html();
	    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	    if (filter.test(toaddr)) 
		{
	    	$hdwt.post(location.href,{sendemailaddr:toaddr,sendemailmess:message}, function( data ) {
		    	if(data==1)
		    	{
    	        	alert('Email Sent Succssfully!')
    	        	$hdwt('#txt_email_share').val('');
		    	}
			});
	    }
	    else
	    {
	    	alert('Invalid Email Address');    	
	    }
		
	});
	
});

</script>
<?php 

if(isset($_GET['v']))
{
    $shareurl = $pluginurl.'v='.$_GET['v'];
}
else  if(isset($_GET['playlistlv']))
{
    $shareurl = $pluginurl.'playlistlv&ch='.$_GET['playlistlv'];
}
else {
    $shareurl = $pluginurl.'playlist='.$_GET['playlist'];
}

$sharecontent .='';
$sharecontent .='<div id="share_video_menu">';
$sharecontent .='<div style="float:left; opacity: 1; border-bottom:2px solid black;" class="video_share_menu" id="video_share_1">Share this video</div>';
$sharecontent .='<div style="float:left;" class="video_share_menu" id="video_share_2">Embed</div>';
$sharecontent .='<div style="float:left;" class="video_share_menu" id="video_share_3">Email</div>';
$sharecontent .='<div style="clear:both;"></div>';
$sharecontent .='</div>';

$sharecontent .='<div style="display:block; padding-top:10px;" class="video_share_content" id="video_share_1_content">';

$sharecontent .='<div style="float:left;" id="video_share_icon">';


$this_shareurl = "'http://www.facebook.com/sharer.php?u=".$shareurl."&t=selvan&amp;p[title]=selvan'";
$sharecontent .='<img src="http://www.simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" onclick="showModalDialog('.$this_shareurl.');"/>';

$this_shareurl ="'http://twitter.com/share?url=".$shareurl."&text=selvan'";
$sharecontent .='<img src="http://www.simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" onclick="showModalDialog('.$this_shareurl.');"/>';

$this_shareurl ="'https://plus.google.com/share?url=".$shareurl."'";
$sharecontent .='<img src="http://www.simplesharebuttons.com/images/somacro/google.png" alt="Google" onclick="showModalDialog('.$this_shareurl.');"/>';

$this_shareurl = "'http://www.digg.com/submit?url=".$shareurl."'";
$sharecontent .='<img src="http://www.simplesharebuttons.com/images/somacro/diggit.png" alt="Digg" onclick="showModalDialog('.$this_shareurl.');"/>';

$this_shareurl = "'http://reddit.com/submit?url=".$shareurl."&title=YouTubeClone'";
$sharecontent .='<img src="http://www.simplesharebuttons.com/images/somacro/reddit.png" alt="Reddit" onclick="showModalDialog('.$this_shareurl.');"/>';

$this_shareurl = "'http://www.linkedin.com/shareArticle?mini=true&url=".$shareurl."'";
$sharecontent .='<img src="http://www.simplesharebuttons.com/images/somacro/linkedin.png" alt="LinkedIn" onclick="showModalDialog('.$this_shareurl.');"/>';


$sharecontent .='<a href="javascript:void((function()%7Bvar%20e=document.createElement(\'script\');e.setAttribute(\'type\',\'text/javascript\');e.setAttribute(\'charset\',\'UTF-8\');e.setAttribute(\'src\',\'http://assets.pinterest.com/js/pinmarklet.js?r=\'+Math.random()*99999999);document.body.appendChild(e)%7D)());"><img src="http://www.simplesharebuttons.com/images/somacro/pinterest.png" alt="Pinterest" /></a>';

$this_shareurl ="'http://www.stumbleupon.com/submit?url=".$shareurl."&title=YouTube Clone'";
$sharecontent .='<img src="http://www.simplesharebuttons.com/images/somacro/stumbleupon.png" alt="StumbleUpon" onclick="showModalDialog('.$this_shareurl.');"/>';


$sharecontent .='<a href="mailto:?Subject=Simple Share Buttons&Body=I%20saw%20this%20and%20thought%20of%20you!%20 '.$shareurl.'"><img src="http://www.simplesharebuttons.com/images/somacro/email.png" alt="Email" /></a>';

$sharecontent .='</div>';


$sharecontent .='<div style="clear:both;"></div>';

if(isset($_GET['v']))
{
    $sharecontent .='<div style="padding-top:10px;"><input type="text" readonly value="'.$shareurl.'" style="color: #666; font-size: 1.3em; padding: 2px; border-color: #b9b9b9; width:350px;"/></div>';
}
else if(isset($_GET['playlistlv']))
{
    $sharecontent .='<div style="padding-top:10px;"><input type="text" readonly value="'.$shareurl.'" style="color: #666; font-size: 1.3em; padding: 2px; border-color: #b9b9b9; width:350px;"/></div>';
} 
else
{
    $sharecontent .='<div style="padding-top:10px;"><input type="text" readonly value="'.$shareurl.'" style="color: #666; font-size: 1.3em; padding: 2px; border-color: #b9b9b9; width:350px;"/></div>';
}
$sharecontent .='</div>';
$sharecontent .='<div style="display:none; padding-top:10px; " class="video_share_content" id="video_share_2_content">';

if(isset($_GET['v']))
{
    $sharecontent .='<textarea id="embedvideo" readonly style="width:330px; height:80px; resize:none;">S</textarea>';
}
else {
$sharecontent .='Embedding disabled by request';
}

$sharecontent .='</div>';
$sharecontent .='<div style="display:none;" class="video_share_content" id="video_share_3_content">';

$sharecontent .='<div>To</div>';
$sharecontent .='<div><input id="txt_email_share" type="text" style="width:350px;" /></div>';
$sharecontent .='<div>Message</div>';

if(isset($_GET['v']))
{
    $sharecontent .='<div id="email_message_content" style="background: #ddd; border: 1px dashed #aaa; padding: 1em; width: 340px;">'.$current_user->user_login.' has shared a video with you on YouTube:<a href="'.$shareurl.'">'.$video_profile->video_title.'</a></div>';
}
else if(isset($_GET['playlistlv']))
{
    $sharecontent .='<div id="email_message_content" style="background: #ddd; border: 1px dashed #aaa; padding: 1em; width: 340px;">'.$current_user->user_login.' has shared a video PlayList with you on YouTube:<a href="'.$shareurl.'">Liked Video</a></div>';
}
else 
{
    $sharecontent .='<div id="email_message_content" style="background: #ddd; border: 1px dashed #aaa; padding: 1em; width: 340px;">'.$current_user->user_login.' has shared a video PlayList with you on YouTube:<a href="'.$shareurl.'">Liked Video</a></div>';
}

$sharecontent .='<div id="send_email_btn" style="margin-top:10px; background: #1b7fcc; color: #fff; display: inline-block; padding: 0 10px; border: 1px solid #1b7fcc; border-radius: 2px; font-weight: bold; cursor: pointer;">Send</div>';
        

$sharecontent .='</div>';
?>