<style>
.yclone_analytics_desing_menu{
    background-color: #f8f8f8; 
    border-right: 1px solid #d3d3d3; 
    width:30%; 
    padding:5px;
    cursor:pointer;
    border-bottom: 3px solid #f8f8f8;   
}
.yclone_analytics_desing_menu:hover{
    background:#ccc;
    border-bottom: 3px solid #CCC;}
</style>
<script>
$hdwt(document).ready(function(){
	$hdwt('.yclone_analytics_desing_menu').click(function(){
		$hdwt('.yclone_analytics_desing_menu').css({'background-color':'#f8f8f8','border-bottom':'3px solid #d3d3d3'})
		$hdwt(this).css({'background-color':'#f8f8f8','border-bottom':'3px solid #d3d3d3'});
		if(this.id == 'analtics_menu1')
		{
			$hdwt(this).css({'background-color':'#bababa','border-bottom':'3px solid GREEN'});
		}else if((this.id) == 'analtics_menu2')
		{
			$hdwt(this).css({'background-color':'#bababa','border-bottom':'3px solid RED'});
		}
		else
		{
			$hdwt(this).css({'background-color':'#bababa','border-bottom':'3px solid BLUE'});
		}
		
		$hdwt('.analtics_menu_content').hide();
		$hdwt('#'+this.id+'_content').show();
    });
});
</script>
<?php 
$analytics .='<div>';
$analytics .='<div style="border: 1px solid #d3d3d3;">';
$analytics .='<div class="yclone_analytics_desing_menu" id="analtics_menu1" style="float:left;"><div style="font-size:11px; font-weight:bold; color:#444;">VIEWS</div><div style="font-size: 20px; color: #222;">'.$video_profile->video_view.'</div></div>';
$analytics .='<div class="yclone_analytics_desing_menu" id="analtics_menu2" style="float:left;" ><div style="font-size:11px; font-weight:bold; color:#444;">SUBSCRIPTIONS(30 Days)</div><div style="font-size: 20px; color: #222;">'.count($count_subscriptions).'</div></div>';
$analytics .='<div class="yclone_analytics_desing_menu" id="analtics_menu3" style="float:left;"><div style="font-size:11px; font-weight:bold; color:#444;">LIKES</div><div style="font-size: 20px; color: #222;">'.count($count_likes).'</div></div>';
$analytics .='<div style="clear:both;"></div>';
$analytics .='</div>';
$analytics .='<div id="analtics_menu1_content" class="analtics_menu_content" style="display:block; border: 1px solid #d3d3d3;"><img src="'.$pluginurl.'analytics_view_chart='.$video_profile->video_id.'"/></div>';
$analytics .='<div id="analtics_menu2_content" class="analtics_menu_content" style="display:none; border: 1px solid #d3d3d3;"><img src="'.$pluginurl.'analytics_subscriptions_chart='.$video_profile->channel_id.'"/></div>';
$analytics .='<div id="analtics_menu3_content" class="analtics_menu_content" style="display:none; border: 1px solid #d3d3d3;"><img src="'.$pluginurl.'analytics_likes_chart='.$video_profile->channel_id.'"/></div>';
$analytics .='</div>';
?>