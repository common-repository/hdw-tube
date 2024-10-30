<style>
.table_recommended_channels tr td
{
    text-align:center !important;
}
.delete_recommend_channel{
    cursor:pointer;
}

.delete_recommend_channel:hover{
    text-decoration:underline;
    color:red;
}
.btn_add_new_rchannel{
border: 1px solid blue;
border-radius: 2px;
display: inline-block;
padding: 3px 10px;
color: #fff;
background: rgb(64, 120, 240);
cursor:pointer;
}
</style>
<script>
$hdwt = jQuery.noConflict();
$hdwt(document).ready(function(){
	$hdwt('.btn_add_new_rchannel').click(function(){
	    var c_id = $hdwt('#txt_channel_id').val();
	    $hdwt.post(location.href,{add_recommend_channel:c_id},function(data){
	    	   var results = data.split('`')[2];
	    	   if(results == 'no')
	    	   {
	    		   alert('This channel has already been in the recommended list');
	    	   }
	    	   else if(results == 'noc')
	    	   {
		    	   alert('This channel does not exist');
	    	   }
	    	   else
	    	   {
		    	   location.reload();
	    	   }	       	
		});		
	});

	$hdwt('.delete_recommend_channel').click(function(){
		var getid = (this.id).split('delete_')[1];
		this.parentNode.remove();
		$hdwt.post(location.href,{remove_recommend_channel:getid},function(data){			
		});		
	});   
});
</script>
<?php 
global $wpdb;
$admin_icon_path           = plugins_url().'/' . basename ( dirname (dirname ( __FILE__ )) ) . '/admin_menu_icon/';
$recommeded_table_name     = $wpdb->prefix . "youtube_recommended";
$channel_table_name        = $wpdb->prefix . "youtube_channel";
$video_table_name          = $wpdb->prefix . "youtube_video";

if(isset($_POST['add_recommend_channel']))
{
    $check_channel = $wpdb->get_row($wpdb->prepare("SELECT * FROM $channel_table_name WHERE channel_id=%d",$_POST['add_recommend_channel']));
    if($check_channel)
    {
        $check = $wpdb->get_row($wpdb->prepare("SELECT * FROM $recommeded_table_name WHERE r_channelid=%d",$_POST['add_recommend_channel']));
        if($check)
        {
            echo '`no';
        }
        else
        {
         $wpdb->insert($recommeded_table_name,array(
                'r_channelid'   => $_POST['add_recommend_channel'],
                'date'          => date ( 'Y-m-d H:i:s' )
         ),array('%d','%s'));
        }
    }
    else 
    {
           echo '`noc';
    }
    exit;
 
}

if(isset($_POST['remove_recommend_channel']))
{
    $wpdb->delete($recommeded_table_name,array(
            'r_channelid'   => $_POST['remove_recommend_channel'],          
    ),array('%d'));
}

?>
<br><br>
<table style="width:100%;"><tr><td><div style=" color:#0074a2; font-weight:bold; font-size:15px;" >RECOMMENDED CHANNELS</div></td><td style="text-align:right;"><img src="<?php echo $admin_icon_path;?>hdwtube.png" style="height:40px;"/></td></tr></table>
<hr>
<div>
<table class="table_recommended_channels" style="border:1px; width:100%;">
<tr><th>S.No</th><th>Ch.ID</th><th>Channel Name</th><th>Icon</th><th>Videos</th><th>Delete</th></tr>
<?php 
$get_channel = $wpdb->get_results("SELECT * FROM $recommeded_table_name");
for($i=0;$i<count($get_channel);$i++){  
	$channel_info = $wpdb->get_row("SELECT * FROM $channel_table_name WHERE channel_id=".$get_channel[$i]->r_channelid); 
	$video_info = $wpdb->get_row("SELECT count(*) AS count FROM $video_table_name WHERE channel_id=".$get_channel[$i]->r_channelid)?>
	<tr>
	<td><?php echo $i+1;?></td>
	<td><?php echo $channel_info->channel_id;?></td>
	<td><?php echo $channel_info->channel_name;?></td>
	<td><img src="<?php echo $channel_info->channel_icon;?>" style="width:30px; height:30px;"/></td>
	<td><?php echo $video_info->count;?></td>
	<td class="delete_recommend_channel" id="delete_<?php echo $get_channel[$i]->r_channelid;?>">delete</td>
	</tr>
<?php }?>
</table>
<div style="float:left; margin:15px 15px 0 0;">Recommended Channel ID</div>
<div style="float:left; margin:15px 15px 0 0;"><input id="txt_channel_id" type="text"/></div>
<div class="btn_add_new_rchannel" style="float:left;  margin:15px 0 0 0;">+ Add</div><div style="clear:both;"></div>
</div>