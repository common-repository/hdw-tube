function my_channel(){
	$('.d').hide();
	$('#whole_channel_view').show();
}

function open_setting_window()
{
	if(document.getElementById("user_property_div").style.display=="none")
	{
		document.getElementById("user_property_div").style.display="block";
	}
	else
	{
		document.getElementById("user_property_div").style.display="none";
	}

}


$(document).ready(function (){
	$('.play_menu_class').click(function (){
		$('.play_menu_class').css('border-bottom', '0px solid #ffffff');
		$('.play_video_menu_options').hide();
		$(this).css('border-bottom', '4px solid red');
		$('#' + this.id + '_content').show();		
	});	
});


function channel_menu_home_open()
{
	$('.channel_menu_options').hide();
	$('#channel_menu_home').show();
	$('#channel_side_menu').show();
	
}

function channel_menu_video_open()
{
	$('.channel_menu_options').hide();
	$('#channel_menu_video').show();
	$('#channel_side_menu').hide();
}

function channel_menu_playlist_open()
{
	$('.channel_menu_options').hide();
	$('#channel_menu_playlist').show();
	$('#channel_side_menu').hide();
}

function channel_menu_discussion_open()
{
	$('.channel_menu_options').hide();
	$('#channel_menu_discussion').show();
	$('#channel_side_menu').show();
}

function channel_menu_about_open()
{
	$('.channel_menu_options').hide();
	$('#channel_menu_about').show();
	$('#channel_side_menu').show();
}

function channel_menu_search_open()
{
	$('.channel_menu_options').hide();
	$('#channel_menu_search').show();
	$('#channel_side_menu').hide();
}


