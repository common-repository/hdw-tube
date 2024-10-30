<?php 
$admin_icon_path           = plugins_url().'/' . basename ( dirname (dirname ( __FILE__ )) ) . '/admin_menu_icon/';
?>
<table style="width:100%;"><tr><td><div style=" color:#0074a2; font-weight:bold; font-size:15px;" >Documentation</div></td><td style="text-align:right;"><img src="<?php echo $admin_icon_path;?>hdwtube.png" style="height:40px;"/></td></tr></table>
<hr>

<div class="wrap" style="line-height:2;">

<?php  

/******************************************************************
/* Usage
******************************************************************/
echo "<h2>" . __( "Adding HDW Tube to your WordPress Website" ) . "</h2>";


echo "<h3>" . __( "#1 : Configuration" ) . "</h3>";
_e( "1. Navigate to <i>Configuration</i> menu." );
echo "<br />";
_e( "2. Provide page Settings under <i> Frontend Tab</i>." );
echo "<br />";
_e( "3. Configure the basic player options under <i> Player Tab</i>" );
echo "<br />";
_e( "4. Configure the Upload and Video settings under <i> Upload Tab</i>" );
echo "<br />";
_e( "5. Configure the server details under <i> Server Tab</i>" );
echo "<br />";


echo "<h3>" . __( "#2 : Category" ) . "</h3>";
_e( "1. Navigate to <i>Category</i> Menu." );
echo "<br />";
_e( "2. Click on the <i>Add New </i> button." );
echo "<br />";
_e( "3. Give category name and click save button." );
echo "<br />";
_e( "4. Congrats! Now you have created the category." );
echo "<br />";

echo "<h3>" . __( "#3 : Channels" ) . "</h3>";
_e( "1. Navigate to <i>Channels</i> menu." );
echo "<br />";
_e( "2. Click on the <i>Add New Channel</i> button." );
echo "<br />";
_e( "3. Fill Channel Settings and save." );
echo "<br />";

echo "<h3>" . __( "#4 : Playlists" ) . "</h3>";
_e( "1. Navigate to <i>Playlists</i> menu." );
echo "<br />";
_e( "2. Click on the <i>Add New </i> button." );
echo "<br />";
_e( "3. Fill Playlist Settings and save." );
echo "<br />";

echo "<h3>" . __( "#5 : Videos" ) . "</h3>";
_e( "1. Navigate to <i>Videos</i> menu." );
echo "<br />";
_e( "2. Click on the <i> New Video </i> button." );
echo "<br />";
_e( "3. Fill Video Settings and save." );
echo "<br />";


echo "<h3>" . __( "#6 : Recommended" ) . "</h3>";
_e( "1. Navigate to <i>Recommended</i> menu." );
echo "<br />";
_e( "2. Provide Channel ID for recommended channels." );
echo "<br />";
_e( "3. These Chennels are shows in front page." );
echo "<br />";

echo "<h3>" . __( "#8: HDW Tube Widget" ) . "</h3>";
_e( "1. Navigate to <i>Widgets</i> menu." );
echo "<br />";
_e( "2. Drag and Drop the <i> HDW Tube Widget</i> on the widget area." );
echo "<br />";
_e( "3. Provide HDW Tube Url and Logo then save." );
echo "<br />";

 _e( "<strong>Note : </strong> Add plugin shortcode <b>[hdwtube]</b> to wordpress page or post");  
 ?>
</div>