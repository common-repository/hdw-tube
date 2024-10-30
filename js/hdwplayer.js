function changeGalleryL(playerid,divid){
	$j=jQuery.noConflict();
	var exitid = 'gallery_'+playerid+divid;
	var inc = parseInt(divid) - 1;
	var disid = 'gallery_'+playerid+inc;
	//document.getElementById(exitid).style.display="none";
	//document.getElementById(disid).style.display="";
	$j('#'+exitid).hide();
	$j('#'+disid).fadeIn(1500);
}
function changeGalleryR(playerid,divid){
	$j=jQuery.noConflict();
	var exitid = 'gallery_'+playerid+divid;
	var inc = parseInt(divid) + 1;
	var disid = 'gallery_'+playerid+inc;
	//document.getElementById(exitid).style.display="none";
	//document.getElementById(disid).style.display="";
	$j('#'+exitid).hide();
	$j('#'+disid).fadeIn(1500);
}