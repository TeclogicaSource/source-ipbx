<?php

ini_set("display_errors","1");
ini_set("display_startup_errors","1");
include("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT");



include("include/reportfunctions.php");

$conn=db_connect();

include('include/xtempl.php');
$xt = new Xtempl();

$xml = new xml();
$chrt_strXML = LoadSelectedChart( postvalue("cname") );
$chrt_array = $xml->xml_to_array( $chrt_strXML );

if(!$chrt_array['db-based'])
	include("include/" . $chrt_array['settings']['short_table_name'] . "_variables.php");

	if(!@$_SESSION["UserID"])
	{
		$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
		header("Location: login.php?message=expired");
		return;
	} elseif ( $chrt_array['settings']['status'] == "private" && $chrt_array['settings']['owner'] != @$_SESSION["UserID"] ) {
		echo "<p>You don't have permissions to view this chart</p>";
		exit;
	}

	if (count(GetUserGroups()) > 1)
	{
	    $arr_reports = array();
	    $arr_reports = GetChartsList();
	    foreach ( $arr_reports as $rpt ) {
		    if (( $rpt["owner"] != @$_SESSION["UserID"] || $rpt["owner"] == "") && $rpt["view"]==0 && $chrt_array['settings']['name']==$rpt["name"])
		      {
		       echo "<p>You don't have permissions to view this chart</p>";
		       exit;
		    }
	    }
	}

//	Before Process event
if(function_exists("BeforeProcessChart")) {
	BeforeProcessChart($conn);
}

$show_dchart='<script type="text/javascript" language="javascript">
	//<![CDATA[
	var chart = new AnyChart("libs/swf/AnyChart.swf","libs/swf/Preloader.swf");
	chart.width = "800";
	chart.height = "640";

	var xmlFile = "dchartdata.php%3Fcname%3D'.jsreplace(htmlspecialchars(postvalue('cname'))).'";
	xmlFile += "%26ctype%3D'.$chrt_array['chart_type']['type'].'";
	chart.setXMLFile(xmlFile);
	chart.write();
	//]]>
</script>';

$load_flash_player = '
<script type="text/javascript">
	$(document).ready(function(){
		var str = "<center>";
		str += "You need to have Adobe Flash Player 9 (or above) to view the chart.<br /><br />";
		str += "<a href=\"http://www.adobe.com/go/getflashplayer\"><img border=\"0\" src=\"http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif\" /></a><br />";
		str += "</center>";		

		if (typeof(ActiveXObject) != "undefined") {
			if ( $("object").children().length == 0 ) {
				$("div.center_div").html( str );			
			}			
		} else if ((navigator.product == "Gecko" && window.find && !navigator.savePreferences)
			|| (navigator.userAgent.indexOf("WebKit") != -1 || navigator.userAgent.indexOf("Konqueror") != -1))
		{
			div = $("div[id*=\'___CONTAINER___\']");
			if ( div[0] == undefined ) {
				$("div.center_div").html( str );			
			} else {
				$(div).appendTo("div.center_div");
			}
		}
	});
</script>';


$xt->assign("chart_constructor", $show_dchart);
$xt->assign("load_flash_player", $load_flash_player);
$templatefile = "dchart_preview.htm";
$xt->display($templatefile);
?>