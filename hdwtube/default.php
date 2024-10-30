<style>
.h1_title_yclone{
font-size:18px;
font-weight:bold;
}


.yclone_controlpanel_menu
{
    background-color: #FFFFFF;
    border: 1px solid #CCCCCC;
    border-radius: 5px 5px 5px 5px;
    color: #565656;
    height: 97px;
    text-decoration: none;
    transition-duration: 0.8s;
    transition-property: background-position, -moz-border-radius-bottomleft, -moz-box-shadow;
    vertical-align: middle;
    width: 108px;
    cursor:pointer;
    text-align:center;
}

.yclone_controlpanel_menu:hover
{
    position:relative;
    top:1px;
    background-color: #F0F0F0;
}
.table_yclone_mainmanu{
border-spacing: 35px;
font-weight:bold;
}
.yclone_controlpanel_menu img{
        width: 70px;
        height: 70px;
        margin-top: 14px;
}

</style>
<?php 
$admin_icon_path           = plugins_url().'/' . basename ( dirname (dirname ( __FILE__ )) ) . '/admin_menu_icon/';
?>
<table style="width:100%;"><tr><td><div style=" color:#0074a2; font-weight:bold; font-size:17px;" >Control Pannel</div></td><td style="text-align:right;"><img src="<?php echo $admin_icon_path;?>hdwtube.png" style="height:40px;"/></td></tr></table>
<hr>


<table class="table_yclone_mainmanu">

<tr><td><div class="yclone_controlpanel_menu"><a href="?page=configuration"><img src="<?php echo $admin_icon_path.'configuration.png';?>"/></a></div> Configuration </td><td><div class="yclone_controlpanel_menu"><a href="?page=category"><img src="<?php echo $admin_icon_path.'category.png';?>"/></a></div> Category </td><td><div class="yclone_controlpanel_menu"><a href="?page=channels"><img src="<?php echo $admin_icon_path.'channel.png';?>" /></a></div> Channels </td></tr>
<tr><td><div class="yclone_controlpanel_menu"><a href="?page=playlists"><img src="<?php echo $admin_icon_path.'playlist.png';?>" /></a></div> Playlists </td><td><div class="yclone_controlpanel_menu"><a href="?page=videos"><img src="<?php echo $admin_icon_path.'video.png';?>" /></a></div> Videos </td><td><div class="yclone_controlpanel_menu"><a href="?page=subscriptions"><img src="<?php echo $admin_icon_path.'subscription.png';?>"/></a></div> Subscriptions </td></tr>
<tr><td><div class="yclone_controlpanel_menu"><a href="?page=reports"><img src="<?php echo $admin_icon_path.'report.png';?>"/></a></div> Reports </td><td><div class="yclone_controlpanel_menu"><a href="?page=recommended"><img src="<?php echo $admin_icon_path.'recommended.png';?>"/></a></div> Recommended  </td><td><div class="yclone_controlpanel_menu"><a href="?page=documentation"><img src="<?php echo $admin_icon_path.'help.png';?>"/></a></div> Documentation  </td></tr>

</table>