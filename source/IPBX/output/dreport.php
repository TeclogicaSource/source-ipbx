<?php
ini_set("display_errors","1");
ini_set("display_startup_errors","1");
include("include/dbcommon.php");

add_nocache_headers();

include("include/reportfunctions.php");

$modePrint=false;
if(@$_REQUEST["mode"]=="print")
	$modePrint=true;

$render_mode=MODE_LIST;

if($modePrint)
{
	$render_mode=MODE_EXPORT;
//	print export headers	
	if(@$_REQUEST["format"]=="excel")
	{
		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment;Filename=".postvalue("rname").".xls");
		echo "<html>";
		echo "<html xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:x=\"urn:schemas-microsoft-com:office:excel\" xmlns=\"http://www.w3.org/TR/REC-html40\">";
		echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=".$cCharset."\">";
	}
	else if(@$_REQUEST["format"]=="word")
	{
		header("Content-Type: application/vnd.ms-word");
		header("Content-Disposition: attachment;Filename=".postvalue("rname").".doc");
		echo "<html>";
		echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=".$cCharset."\">";
	}
	else
		$render_mode=MODE_PRINT;

}

// Style constants
$num_uniq = 0;
$num_uniq2 = 4;
define('FieldHeaders',40);
define('Group1Header',1);
define('Group1FooterCount',2);
define('Group1FooterMin',3);
define('Group1FooterMax',4);
define('Group1FooterSum',5);
define('Group1FooterAvg',6);
define('Group2Header',7);
define('Group2FooterCount',8);
define('Group2FooterMin',9);
define('Group2FooterMax',10);
define('Group2FooterSum',11);
define('Group2FooterAvg',12);
define('Group3Header',13);
define('Group3FooterCount',14);
define('Group3FooterMin',15);
define('Group3FooterMax',16);
define('Group3FooterSum',17);
define('Group3FooterAvg',18);
define('Group4Header',19);
define('Group4FooterCount',20);
define('Group4FooterMin',21);
define('Group4FooterMax',22);
define('Group4FooterSum',23);
define('Group4FooterAvg',24);
define('TableData',25);
define('PageSummary',26);
define('PageSummaryMin',27);
define('PageSummaryMax',28);
define('PageSummarySum',29);
define('PageSummaryAvg',30);
define('GlobalSumary',31);
define('GlobalSumaryMin',32);
define('GlobalSumaryMax',33);
define('GlobalSumarySum',34);
define('GlobalSumaryAvg',35);
define('Group1Summary',36);
define('Group2Summary',37);
define('Group3Summary',38);
define('Group4Summary',39);

// Establish connection to the database
$conn=db_connect();

include('include/xtempl.php');
$xt = new Xtempl();

// Settings for style editor
$editmode=(@$_REQUEST["edit"]=="style");


if(!$editmode)
{
// Load xml report data into array
	$xml = new xml();
	$rpt_strXML = LoadSelectedReport( postvalue("rname") );
	$rpt_array = $xml->xml_to_array( $rpt_strXML );
}
else
	$rpt_array = $_SESSION["webreports"];


// if old
if (!$rpt_array['db-based']) 
	include("include/" . GetTableURL( $rpt_array['tables'][0] ) . "_variables.php");

$tbl=$rpt_array['tables'][0];

$sessPrefix = "";
if ($rpt_array['db-based']) 
	$sessPrefix = "webreport".postvalue("rname");


// Check user permissions
	if(!@$_SESSION["UserID"]) {
		$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
		header("Location: login.php?message=expired");
		return;
	} elseif ( $rpt_array['status'] == "private" && $rpt_array['owner'] != @$_SESSION["UserID"] ) {
		echo "<p>You don't have permissions to view this report</p>";
		exit;
	}
	if (count(GetUserGroups()) > 1) {
		$arr_reports = array();
		$arr_reports = GetReportsList();
		foreach ( $arr_reports as $rpt ) {
			if (( $rpt["owner"] != @$_SESSION["UserID"] || $rpt["owner"] == "") && $rpt["view"]==0 && $rpt_array['settings']['name']==$rpt["name"])
			{
				echo "<p>You don't have permissions to view this report</p>";
				exit;
			}
		}
	}

// Replace string values to boolean
$arr_xml_fields = array('group_fields','totals','sort_fields');
foreach ($arr_xml_fields as $xml_field) {
	if(!empty($rpt_array[$xml_field]))
	{
		foreach ($rpt_array[$xml_field] as $screen => $data) {
			foreach ($data as $key => $val) {
				if ($data[$key] == "true") {
					$rpt_array[$xml_field][$screen][$key] = true;
				} elseif ($data[$key] == "false") {
					$rpt_array[$xml_field][$screen][$key] = false;
				}
			}
		}
	}
}
$rpt_array['miscellaneous']['print_friendly'] = ($rpt_array['miscellaneous']['print_friendly'] == "true") ? true : false;

// Load and assign styles
$sql_query = "SELECT report_style_id,".AddFieldWrappers("type").",".AddFieldWrappers("field").",".AddFieldWrappers("group").",style_str,".AddFieldWrappers("uniq").", repname, styletype FROM webreport_style WHERE repname='".db_addslashes(postvalue('rname'))."' ORDER BY report_style_id ASC";
$rsReport = db_query($sql_query, $conn);
$styleStr = '';

while ($data = db_fetch_numarray($rsReport)) {
	
	if ($data[1] == 'table')
		$styleStr .= "#legend td{".$data[4]."}\n";
	else if (($data[2] == 0) && ($data[3] != 0))
		$styleStr .= "#legend td.class".$data[3]."g"."{".$data[4]."}\n";
	else if (($data[2] != 0) && ($data[3] == 0))
		$styleStr .= "#legend td.class".$data[2]."f"."{".$data[4]."}\n";
	else if ($data[5] == 0 && $data[2] != 0 && $data[3] != 0)
		$styleStr .= "#legend td.class".$data[3]."g".$data[2]."f0u{".$data[4]."}\n";
	else 
		$styleStr .= "#legend td.class".$data[3]."g".$data[2]."f".$data[5]."u"."{".$data[4]."}\n";
}

$xt->assign("styleStr", $styleStr);
if ($editmode) {
	$xt->assign("b_is_report_name",($rpt_array['settings']['name'] != ""));
	$xt->assign("b_is_report_save",($_SESSION['webreports']['tmp_active'] != "x"));	
}

$gstrOrderBy = "";
if(!empty($rpt_array['sort_fields']))
{
	$gstrOrderBy = "ORDER BY ";
	foreach ( $rpt_array['sort_fields'] as $fld ) {
		$gstrOrderBy .= AddFieldWrappers( $fld['name'] );
		if ( $fld['desc'] ) {
			$gstrOrderBy .=	" DESC, ";
		} else {
			$gstrOrderBy .=	" ASC, ";
		}
	}
	$gstrOrderBy = substr( $gstrOrderBy, 0, -2);
}

// Before Process event
if(function_exists("BeforeProcessReport")) {
	BeforeProcessReport($conn);
}

// process reqest data, fill session variables
if(!$modePrint)
{
	if ( !count( $_POST ) && ( count( $_GET ) == 1 ) ) {
		if(array_key_exists("rname", $_GET)) 
		{
			$sess_unset = array();
			foreach($_SESSION as $key=>$value) {
				if(substr($key,0,strlen($sessPrefix)+1)==$sessPrefix."_" &&
					strpos(substr($key,strlen($sessPrefix)+1),"_")===false) {
					$sess_unset[] = $key;
				}
			}
			foreach($sess_unset as $key) {
				unset($_SESSION[$key]);
			}
		}
	}

	if(@$_REQUEST["a"]=="advsearch" || @$_REQUEST["a"]=="integrated")
	{
		$_SESSION[$sessPrefix."_asearchnot"]=array();
		$_SESSION[$sessPrefix."_asearchopt"]=array();
		$_SESSION[$sessPrefix."_asearchfor"]=array();
		$_SESSION[$sessPrefix."_asearchfor2"]=array();
		$_SESSION[$sessPrefix."_asearchtable"]=array();
		$_SESSION[$sessPrefix."_asearchfortype"]=array();
		unset($_SESSION[$sessPrefix."_asearchtype"]);
		$tosearch=0;
	}

	if(@$_REQUEST["a"]=="advsearch")
	{
		$asearchfield = postvalue("asearchfield");
		$asearchtable = postvalue("asearchtable");
		$_SESSION[$sessPrefix."_asearchtype"] = postvalue("type");
		if(!$_SESSION[$sessPrefix."_asearchtype"])
			$_SESSION[$sessPrefix."_asearchtype"]="and";
		foreach($asearchfield as $ind => $field)
		{
			if ($rpt_array['db-based']) {
				$_SESSION[$sessPrefix."_asearchtable"][$field]=$asearchtable[$ind];
			}
			$gfield=GoodFieldName($field)."_1";
			$asopt=postvalue("asearchopt_".$gfield);
			$value1=postvalue("value_".$gfield);
			$type=postvalue("type_".$gfield);
			$value2=postvalue("value1_".$gfield);
			$not=postvalue("not_".$gfield);
			if($value1 || $asopt=='Empty')
			{
				$tosearch=1;
				$_SESSION[$sessPrefix."_asearchopt"][$field]=$asopt;
				if(!is_array($value1))
					$_SESSION[$sessPrefix."_asearchfor"][$field]=$value1;
				else
					$_SESSION[$sessPrefix."_asearchfor"][$field]=combinevalues($value1);
				$_SESSION[$sessPrefix."_asearchfortype"][$field]=$type;
				if($value2)
					$_SESSION[$sessPrefix."_asearchfor2"][$field]=$value2;
				$_SESSION[$sessPrefix."_asearchnot"][$field]=($not=="on");
			}
		}
	}
	elseif(@$_REQUEST["a"]=="integrated")
	{
		$_SESSION[$sessPrefix."_asearchtype"] = postvalue("criteria");
		if(!$_SESSION[$sessPrefix."_asearchtype"])
			$_SESSION[$sessPrefix."_asearchtype"]="and";
		// prepare vars		
		$j=1;

		// scan all srch fields		
		while ($field = postvalue('field'.$j)) 
		{	
			$tosearch=1;
			$_SESSION[$sessPrefix."_asearchfortype"][$field] = trim(postvalue('type'.$j));
			$_SESSION[$sessPrefix."_asearchfor"][$field] = trim(postvalue('value'.$j.'1'));
			$_SESSION[$sessPrefix."_asearchopt"][$field] = (postvalue('option'.$j) ? postvalue('option'.$j) : 'Contains');
			$_SESSION[$sessPrefix."_asearchfor2"][$field] = trim(postvalue('value'.$j.'2'));	
			$_SESSION[$sessPrefix."_asearchnot"][$field] = postvalue('not'.$j) == 'on';
			$j++;
		}	
	}
	if(@$_REQUEST["a"]=="advsearch" || @$_REQUEST["a"]=="integrated")
	{
		if($tosearch)
			$_SESSION[$sessPrefix."_search"]=2;
		else
			$_SESSION[$sessPrefix."_search"]=0;
		$_SESSION[$sessPrefix."_pagenumber"]=1;
	}
}

if(@$_REQUEST["orderby"]){
	$_SESSION[$sessPrefix."_orderby"]=@$_REQUEST["orderby"];
}

if(@$_REQUEST["pagesize"]) {
	$_SESSION[$sessPrefix."_pagesize"]=@$_REQUEST["pagesize"];
	$_SESSION[$sessPrefix."_pagenumber"]=1;
}

if(@$_REQUEST["goto"]) {
	$_SESSION[$sessPrefix."_pagenumber"]=@$_REQUEST["goto"];
}

$includes = "";
$includes .= '

	<link rel="stylesheet" href="include/css/jquery-ui.css" type="text/css" media="screen">
	<link rel="stylesheet" href="include/css/jquery.fancybox.css" type="text/css" media="screen">
	
	<script type="text/javascript" src="include/js/jquery.min.js"></script>
	<script type="text/javascript" src="include/onthefly.js"></script>
	<script type="text/javascript" src="include/js/jquery.dimensions.pack.js"></script>
    <script type="text/javascript" src="include/js/jquery-ui.js"></script>
	<script type="text/javascript" src="include/jsfunctions.js"></script>
	<script type="text/javascript" src="include/customlabels.js"></script>
	<script type="text/javascript" src="include/js/jquery.easing.js"></script>
    <script type="text/javascript" src="include/js/jquery.fancybox.pack.js"></script>

		
	<script type="text/javascript">
	var bSelected = false,
		TEXT_FIRST = "First",
		TEXT_PREVIOUS = "Previous",
		TEXT_NEXT = "Next",
		TEXT_LAST = "Last",
		defURL = "menu.php";
$(document).ready(function(){		
if($.browser.msie)
		$("a#preview").fancybox({
			"hideOnContentClick": false,
			"frameWidth" : 890,
			"frameHeight" : 730,
			"overlayShow": true,
			"hideOnContentClick" : true,
			"easingIn" : "easeOutBack",
			"easingOut" : "easeInBack"
		});
	else
		$("a#preview").fancybox({
			"hideOnContentClick": false,
			"frameWidth" : 820,
			"frameHeight" : 660,
			"overlayShow": true,
			"hideOnContentClick" : true,
			"easingIn" : "easeOutBack",
			"easingOut" : "easeInBack"
		});
';

// Settings for style editor. Check dynamic permissions
if (count(GetUserGroups()) < 2 || isset( $_SESSION['webreports']['settings']['status'] )
	&& $_SESSION['webreports']['settings']['status'] == "private" ) {
	$includes .= '$("td[id=row9]").hide();';
}
if($wr_is_standalone)
	$includes .= '$("td[id=row11]").hide();'."\n";
	
if(!$modePrint)
{
	if (!$rpt_array['db-based']) {
		$includes .= '$("td[id=row1], td[id=row2]").hide();'."\r\n";
	}
	
	if ($_SESSION['webreports']['settings']['title'] == "") {
		$includes .= '
			for (var i=2; i<=9; i++){
				$("td[id=row" + i + "]").hide();
			};
		';
	}
}
else
{
	$includes.="setTimeout(function() {window.print();}, 1000);";
}
$includes .= '
});
</script>';

$xt->assign("includes", $includes);

// order by

$strOrderBy=$gstrOrderBy;

//	make sql "select" string
$strWhereClause="";

$sWhere="";
if(!$editmode)
	$sWhere = CalcSearchParam($rpt_array['db-based']);

$strWhereClause = whereAdd($strWhereClause,$sWhere);
if ($sWhere) {
	$rpt_array['where'] .= ($rpt_array['where']) ?
		" AND (" . $sWhere . ")" :
		" WHERE (" . $sWhere . ")";
}

if ($rpt_array['db-based']) {
	$strSQL = $rpt_array['sql'] . $rpt_array['where'] . $rpt_array['order_by'];
} else {
	$strSQL = gSQLWhere($strWhereClause);
	//	order by
	$strSQL.=" ".trim($strOrderBy);
}

$groupno=0;
if(!$_SESSION[$sessPrefix."_pagenumber"]) {
	$_SESSION[$sessPrefix."_pagenumber"]=1;
}

if(!$_SESSION[$sessPrefix."_pagesize"]) {
	if ( (count($rpt_array['group_fields']) - 1 ) > 0 ) {
		$_SESSION[$sessPrefix."_pagesize"]=5;
	} else {
		$_SESSION[$sessPrefix."_pagesize"]=20;
	}
}



if($modePrint && @$_REQUEST["all"])
	$PageSize=-1;
else
	$PageSize=$_SESSION[$sessPrefix."_pagesize"];
	
$pagestart=($_SESSION[$sessPrefix."_pagenumber"]-1)*$_SESSION[$sessPrefix."_pagesize"]+1;
$pageend=$pagestart+$_SESSION[$sessPrefix."_pagesize"]-1;

// init totals
for ( $i=0; $i < count($rpt_array['group_fields'])-1; $i++ ) {
	$arr = $rpt_array['group_fields'][$i];
	if ( $i == 0 ) {
		// group totals
		$grouptotals_count = array();
		$grouptotals_min = array();
		$grouptotals_max = array();
		$grouptotals_dispmin = array();
		$grouptotals_dispmax = array();
		$grouptotals_sum = array();
	}
	$grouptotals_sum[$arr['name']]=array();
	$grouptotals_min[$arr['name']]=array();
	$grouptotals_max[$arr['name']]=array();
	$grouptotals_dispmin[$arr['name']]=array();
	$grouptotals_dispmax[$arr['name']]=array();
	$grouptotals_count[$arr['name']]=0;
	foreach ( $rpt_array['totals'] as $fld ) 
	{
		if ( $fld['show'] ) 
		{
			$grouptotals_sum[$arr['name']][fldname($fld)]=0;
		}
	}
}

$summary = array_slice( $rpt_array['group_fields'], -1 );

if ($summary[0]["sps"]) {$xt->assign("page_summary_block",true);}
if ($summary[0]["sgs"]) {$xt->assign("global_summary_block",true);}
if ($summary[0]["sds"]) {$xt->assign("details_summary_block",true);}
if ($summary[0]["sps"] && $summary[0]["sgs"]) {$xt->assign("summary_footer",true);}

if ( $summary[0]["sps"] ) {
	// page totals
	$pagetotals_count = 0;
	$pagetotals_min = array();
	$pagetotals_max = array();
	$pagetotals_dispmin = array();
	$pagetotals_dispmax = array();
	$pagetotals_sum = array();
	foreach ( $rpt_array['totals'] as $fld ) 
	{
		if ( $fld['show'] ) {
			$pagetotals_sum[fldname($fld)]=0;
		}
	}
}

if ( $summary[0]["sgs"] ) {
	// global totals
	$globaltotals_count = 0;
	$globaltotals_min = array();
	$globaltotals_max = array();
	$globaltotals_dispmin = array();
	$globaltotals_dispmax = array();
	$globaltotals_sum = array();
	foreach ( $rpt_array['totals'] as $fld ) 
	{
		if ( $fld['show'] ) {
			$globaltotals_sum[fldname($fld)]=0;
		}
	}
}

//	save SQL for use in "Export" and "Printer-friendly" pages
if ($rpt_array['db-based']) {
	$_SESSION[$sessPrefix."_sql"]   = $rpt_array['sql'];
	$_SESSION[$sessPrefix."_where"] = $rpt_array['where'];
	$_SESSION[$sessPrefix."_order"] = $rpt_array['order_by'];
} else {
	$strWhereClause=whereAdd($strWhereClause,SecuritySQL("Search"));
	$_SESSION[$sessPrefix."_sql"]   = $strSQL;
	$_SESSION[$sessPrefix."_where"] = $strWhereClause;
	$_SESSION[$sessPrefix."_order"] = $strOrderBy;
}

//	select all records

$strSQLbak = $strSQL;

if ($rpt_array['db-based']) 
{
	$strSQL = $rpt_array['sql'] . $rpt_array['where'] . $rpt_array['order_by'];
} 
else 
{
	$strSQL  = gSQLWhere($strWhereClause);
	$strSQL .= " ".trim($strOrderBy);
}

LogInfo($strSQL);

$rs=db_query($strSQL,$conn);

$start=true;
$align_skip=false;

$groupstart=array();

for ( $i=0; $i < count($rpt_array['group_fields'])-1; $i++ ) {
	$arr = $rpt_array['group_fields'][$i];
	$groupstart[$arr['name']] = 0;
	$groupvalue[$arr['name']] = "";
}

$rowinfo = array();

while($data=db_fetch_array($rs))
{
	$firstnewgroup=true;
	$row=array();
	$arr_group=array();
	$arr_value=array();

	//	check if starting new group
	for ( $i=0; $i < count($rpt_array['group_fields'])-1; $i++ ) {
		$arr = $rpt_array['group_fields'][$i];
		$newgroup_[$arr['name']] = false;
		$arr_group[$i]["newgroup"] = false;
		$arr_group[$i]["name"] = GoodFieldName( $arr['name'] );
		$arr_group[$i]["group_order"] = $arr['group_order'];
		$arr_group[$i]["groupId4"] = 1 + 6*($arr['group_order']-1);
		$arr_group[$i]["int_type"] = $arr['int_type'];
		$arr_group[$i]["ss"] = $arr['ss'];
		$arr_group[$i]["color1"] = $arr['color1'];
		$arr_group[$i]["color2"] = $arr['color2'];
	}
	$newgroup=false;


	if ( $start || $groupstart[$rpt_array['group_fields'][0]['name']] != GetGroupStart($rpt_array['group_fields'][0]['name'],db_fld_value($data,$rpt_array['group_fields'][0]['name'])) )
	{
		$newgroup_[$rpt_array['group_fields'][0]['name']] = true;
		$newgroup=true;
	}

	for ( $i=1; $i < count($rpt_array['group_fields']) - 1; $i++ ) {
		if ( $newgroup || $groupstart[$rpt_array['group_fields'][$i]['name'] ] != GetGroupStart($rpt_array['group_fields'][$i]['name'],db_fld_value($data,$rpt_array['group_fields'][$i]['name'])) )
		{
			$newgroup_[$rpt_array['group_fields'][$i]['name']] = true;
			$newgroup=true;
		}
	}

	//close groups
	$rowclose=array();
	$arr_group_close=array();
	$arr_value_close=array();
	for ( $i=0; $i < count($rpt_array['group_fields'])-1; $i++ ) {
		$arr = $rpt_array['group_fields'][$i];

		if( $editmode || !$start && $newgroup_[$arr['name']] )
		{
			$rowclose["endgroup_" . GoodFieldName( $arr['name'] )] = true;
			$rowclose["1" . GoodFieldName( $arr['name'] ) . "_grval"] = $groupvalue[$arr['name']];
			$rowclose["group" . GoodFieldName( $arr['name'] ) . "_total_cnt"] = $grouptotals_count[$arr['name']];
			$arr_group_close[$i]["name"] = GoodFieldName( $arr['name'] );
			$arr_group_close[$i]["group_order"] = $arr['group_order'];
			$arr_group_close[$i]["int_type"] = $arr['int_type'];
			$arr_group_close[$i]["ss"] = $arr['ss'];
			$arr_group_close[$i]["color1"] = $arr['color1'];
			$arr_group_close[$i]["color2"] = $arr['color2'];
			$arr_group_close[$i]["endgroup"] = true;
			$arr_group_close[$i]["grval"] = $groupvalue[$arr['name']];
			$arr_group_close[$i]["total_cnt"] = $grouptotals_count[$arr['name']];

			foreach ( $rpt_array['totals'] as $fld ) 
			{
				if ( $fld['show'] && $fld['sum'] ) {
					$sum = array(fldname($fld)=>$grouptotals_sum[$arr['name']][fldname($fld)]);
					$rowclose["group" . GoodFieldName( $arr['name'] ) . "_total" . GoodFieldName( fldname($fld) ) . "_sum"] = GetData($sum,fldname($fld),$fld['view_format']);
					$arr_group_close[$i]["group_total_sum"]["data"][0][fldname($fld)] = GetData($sum,fldname($fld),$fld['view_format']);
				}
			}

			if ( testAgr( $rpt_array['totals'], "avg", "min", "max", "" ) > 0 ) {
				if($grouptotals_count[$arr['name']])
				{
					foreach ( $rpt_array['totals'] as $fld ) 
					{
						if ( $fld['show'] ) {
							if ( $fld['avg'] ) {
								$avg=array(fldname($fld)=>$grouptotals_sum[$arr['name']][fldname($fld)]/$grouptotals_count[$arr['name']]);
								$rowclose["group" . GoodFieldName( $arr['name'] ) . "_total" . GoodFieldName( fldname($fld) ) . "_avg"]=GetData($avg,fldname($fld),$fld['view_format']);
								$arr_group_close[$i]["group_total_avg"]["data"][0][fldname($fld)] = GetData($avg,fldname($fld),$fld['view_format']);
							}
							if ( $fld['min'] ) {
								$rowclose["group" . GoodFieldName( $arr['name'] ) . "_total" . GoodFieldName( fldname($fld) ) . "_min"]=$grouptotals_dispmin[$arr['name']][fldname($fld)];
								$arr_group_close[$i]["group_total_min"]["data"][0][fldname($fld)] = $grouptotals_dispmin[$arr['name']][fldname($fld)];
							}
							if ( $fld['max'] ) {
								$rowclose["group" . GoodFieldName( $arr['name'] ) . "_total" . GoodFieldName( fldname($fld) ) . "_max"]=$grouptotals_dispmax[$arr['name']][fldname($fld)];
								$arr_group_close[$i]["group_total_max"]["data"][0][fldname($fld)] = $grouptotals_dispmax[$arr['name']][fldname($fld)];
							}
						}
					}
				}
			}
		}
	}

	if ( !((count($rpt_array['group_fields']) - 1 ) > 0) ) {
		$groupno++;
	}

	if(($PageSize<0 || $groupno>=$pagestart && $groupno<=$pageend) && count($rowclose)) 
	{
		$rowclose["group"]["data"]=$arr_group_close;
		$rowclose["group_desc"]["data"]=array_reverse($arr_group_close);
		$rowinfo[]=$rowclose;
	}
	$start=false;
	//open new group
	for ( $i=0; $i < count($rpt_array['group_fields']) - 1; $i++ ) {
		$arr = $rpt_array['group_fields'][$i];
		if( $newgroup_[$arr['name']] )
		{
			if ( $i == 0 ) {
				$groupno++;
			}
			$row["newgroup_" . GoodFieldName( $arr['name'] )] = true;
			$arr_group[$i]["newgroup"] = true;
			$arr_group[$i]["firstnewgroup"] = $firstnewgroup;
			$firstnewgroup=false;
					
			$groupstart[$arr['name']] = GetGroupStart($arr['name'],db_fld_value($data,$arr['name']));
			$groupdisplay[$arr['name']] = GetGroupStart($arr['name'],db_fld_value($data,$arr['name']));
			$groupvalue[$arr['name']] = GetGroupDisplay($arr['name'],db_fld_value($data,$arr['name']));

			$row["1" . GoodFieldName( $arr['name'] ) . "_grval"] = $groupvalue[$arr['name']];
			$arr_group[$i]["grval"] = $groupvalue[$arr['name']];
			$arr_group[$i]["groupId"] = 1 + 6*$i;

			$grouptotals_count[$arr['name']] = 0;
			foreach ( $rpt_array['totals'] as $fld ) 
			{
				if ( $fld['show'] ) {
					$grouptotals_sum[$arr['name']][fldname($fld)]=0;
				}
			}
		}
	}

	//display data
	if($PageSize<0 || $groupno>=$pagestart && $groupno<=$pageend)
	{
		$row["row_data"]=true;
		/////////////////////////////////
		$keylink="";
		$arrKeys = GetTableKeys();
		if($rpt_array["db-based"])
		{
			$arrKeys=DBGetTableKeys( $rpt_array['tables'][0]);
			foreach($arrKeys as $i=>$k)
			{
				$arrKeys[$i]=$rpt_array['tables'][0].".".$arrKeys[$i];
			}
		}
		for ( $j=0; $j < count($arrKeys); $j++ ) {
			$keylink.="&key" . ($j+1) . "=".htmlspecialchars(rawurlencode(db_fld_value($data,$arrKeys[$j])));
		}
		$arrFields=array();
		foreach ($rpt_array['totals'] as $f_key => $fld) 
		{
			if ( $fld["show"] ) {
				$value="";
				if ( $fld["view_format"] == FORMAT_DATABASE_IMAGE && !$rpt_array["db-based"]) 
				{
					if ( $fld["show_thumbnail"] ) {
						$value.="<a target=_blank href=\"imager.php?table=" . $rpt_array['short_table_name'] . "&field=" . htmlspecialchars(rawurlencode(fldname($fld))) . "".$keylink."\">";
						$value.= "<img border=0";
//								$value.=" src=\"" . $rpt_array['short_table_name'] . "_imager.php?field=" . htmlspecialchars(rawurlencode($fld["strThumbnail"])) . $keylink . "&alt=" . htmlspecialchars(rawurlencode(fldname($fld))) . "".$keylink."\">";
						$value.=" src=\"imager.php?table=" . $rpt_array['short_table_name'] . "&field=" . htmlspecialchars(rawurlencode($fld["strThumbnail"])) . "".$keylink. "&alt=" . htmlspecialchars(rawurlencode(fldname($fld)))."\">";
						$value.= "</a>";
					} 
					else 
					{
						$value = "<img";
						if ( $fld["listformatobj_imgwidth"] ) {
							$value.=" width=" . $fld["listformatobj_imgwidth"];
						}
						if ( $fld["listformatobj_imgheight"] ) {
							$value.=" height=" . $fld["listformatobj_imgheight"];
						}
						$value.=" border=0";
						$value.=" src=\"imager.php?table=" . $rpt_array['short_table_name'] . "&field=" . htmlspecialchars(rawurlencode(fldname($fld))) . "".$keylink."\">";
					}
				} 
				elseif($fld["view_format"] == FORMAT_DATABASE_IMAGE && $rpt_array["db-based"])
				{
					$value = "<img";
					$value.=" border=0";
					$value.=" src=\"dimager.php?rname=".htmlspecialchars(rawurlencode(postvalue("rname")))."&field=" . htmlspecialchars(rawurlencode(fldname($fld))) . "".$keylink."\">";
				}
				elseif ( $fld["view_format"] == FORMAT_FILE_IMAGE ) 
				{
					if(CheckImageExtension(db_fld_value($data,fldname($fld))))
					{
						if ( $fld["show_thumbnail"] ) {
							// show thumbnail
							$thumbname=$fld["thumbnail"].db_fld_value($data,fldname($fld));
							if(substr($fld["hlprefix"],0,7)!="http://" && !file_exists(GetUploadFolder(fldname($fld)).$thumbname))
							$thumbname=db_fld_value($data,fldname($fld));
							$value="<a target=_blank href=\"".htmlspecialchars(AddLinkPrefix(fldname($fld),db_fld_value($data,fldname($fld))))."\">";
							$value.="<img";
							if($thumbname==db_fld_value($data,fldname($fld)))
							{
								if ( $fld["listformatobj_imgwidth"] ) {
									$value.=" width=" . $fld["listformatobj_imgwidth"];
								}
								if ( $fld["listformatobj_imgheight"] ) {
									$value.=" height=" . $fld["listformatobj_imgheight"];
								}
							}
							$value.=" border=0";
							$value.=" src=\"".htmlspecialchars(AddLinkPrefix(fldname($fld),$thumbname))."\"></a>";
						} else {
							$value="<img";
							if ( $fld["listformatobj_imgwidth"] ) {
								$value.=" width=" . $fld["listformatobj_imgwidth"];
							}
							if ( $fld["listformatobj_imgheight"] ) {
								$value.=" height=" . $fld["listformatobj_imgheight"];
							}
							$value.=" border=0";
							$value.=" src=\"".htmlspecialchars(AddLinkPrefix(fldname($fld),db_fld_value($data,fldname($fld))))."\">";
						}
					}
				} elseif ( $fld["view_format"] == FORMAT_DATABASE_FILE ) {
					if ( $fld["listformatobj_filename"] ) {
						$filename=db_fld_value($data,$fld["listformatobj_filename"]);
						if(!$filename) {
							$filename="file.bin";
						}
					} else {
						$filename="file.bin";
					}
					if(strlen(db_fld_value($data,fldname($fld))))
					{
						$value="<a href=\"" . $rpt_array['short_table_name'] . "_getfile.php?filename=".rawurlencode($filename)."&field=" . htmlspecialchars(rawurlencode(fldname($fld))) . $keylink."\">";
						$value.=htmlspecialchars($filename);
						$value.="</a>";
					}
				} 
				elseif($rpt_array['db-based'])
				{
					$value=WRProcessLargeText(GetData($data,gfldname($fld), $fld["view_format"]),fldname($fld),count($rowinfo),100,$render_mode,$fld['label']);
				}
				elseif ( ( $fld["edit_format"] == EDIT_FORMAT_LOOKUP_WIZARD || $fld["edit_format"] == EDIT_FORMAT_RADIO ) && $fld['lookupobj_lookuptype'] == LT_LOOKUPTABLE ) 
				{
					$value=DisplayLookupWizard(fldname($fld),$data[fldname($fld)],$data,$keylink,$render_mode);
				} 
				elseif ( $fld["view_format"]!=FORMAT_CUSTOM && $fld["view_format"]!=FORMAT_FILE_IMAGE && $fld["view_format"]!=FORMAT_FILE
					&& $fld["view_format"]!=FORMAT_HYPERLINK && $fld["view_format"]!=FORMAT_EMAILHYPERLINK && $fld["view_format"]!=FORMAT_CHECKBOX)  
				{
					$value = ProcessLargeText(GetData($data,fldname($fld), $fld["view_format"]),"field=" . htmlspecialchars(rawurlencode(fldname($fld))) . $keylink,"",$render_mode);
				} 
				else 
				{
					$value = GetData($data,fldname($fld), $fld["view_format"]);
				}		
				if ( $summary[0]["sds"] ) 
				{
					$row["1" . GoodFieldName( fldname($fld) ) . "_value"]=$value;
					$arrFields["data"][0][fldname($fld)] = $value;
				}					
				for ( $i=0; $i < count($rpt_array['group_fields']) - 1; $i++ ) 
				{
					$arr = $rpt_array['group_fields'][$i];
					if ( $summary[0]["sds"] || ( $arr["name"] == fldname($fld) && $arr["int_type"] == 0 ) ) 
					{
						if ( $summary[0]["sds"] ) 
						{
							$arr_group[$i]["value"]["data"][0][fldname($fld)] = $value;
						}

						if ( $arr["name"] == fldname($fld) && $arr["int_type"] == 0 ) 
						{
							if(@$row["newgroup_" . GoodFieldName( fldname($fld) )])
							{
								$row["1" . GoodFieldName( fldname($fld) ) . "_grval"]=$value;
								// ??? $arr_group[$i]["grval"]=$value;
								$groupvalue[fldname($fld)] = $value;
							}
						}
					}
				}
			}
		}

		//////////////////////////////////////////////////////////////
		//	update totals
		for ( $i=0; $i < count($rpt_array['group_fields']) - 1; $i++ ) {
			$arr = $rpt_array['group_fields'][$i];

			foreach ( $rpt_array['totals'] as $fld ) 
			{
				if ( $fld['show'] && ( $fld['sum'] || $fld['avg'] ) ) {
					$grouptotals_sum[$arr['name']][fldname($fld)] += db_fld_value($data,fldname($fld));
				}
			}
			if ( testAgr( $rpt_array['totals'], "", "min", "max", "" ) > 0 ) {
				if(!$grouptotals_count[$arr['name']])
				{
					foreach ( $rpt_array['totals'] as $fld ) 
					{
						if ( $fld['show'] && $fld['min'] ) {
							$grouptotals_min[$arr['name']][fldname($fld)] = db_fld_value($data,fldname($fld));
							$grouptotals_dispmin[$arr['name']][fldname($fld)] = GetData($data,gfldname($fld),$fld['view_format']);
						}
					}
					foreach ( $rpt_array['totals'] as $fld ) 
					{
						if ( $fld['show'] && $fld['max'] ) {
							$grouptotals_max[$arr['name']][fldname($fld)] = db_fld_value($data,fldname($fld));
							$grouptotals_dispmax[$arr['name']][fldname($fld)] = GetData($data,gfldname($fld),$fld['view_format']);
						}
					}
				}
				else
				{
					foreach ( $rpt_array['totals'] as $fld ) 
					{ // order nReportPageOrder
						if ( $fld['show'] && ( $fld['min'] || $fld['max'] ) ) {
							if ( $fld['min'] ) {
								if ( $grouptotals_min[$arr['name']][fldname($fld)] > db_fld_value($data,fldname($fld)) )
								{
									$grouptotals_min[$arr['name']][fldname($fld)] = db_fld_value($data,fldname($fld));
									$grouptotals_dispmin[$arr['name']][fldname($fld)] = GetData($data,gfldname($fld),$fld['view_format']);
								}
							}
							if ( $fld['max'] ) {
								if ( $grouptotals_max[$arr['name']][fldname($fld)] < db_fld_value($data,fldname($fld)) )
								{
									$grouptotals_max[$arr['name']][fldname($fld)] = db_fld_value($data,fldname($fld));
									$grouptotals_dispmax[$arr['name']][fldname($fld)] = GetData($data,gfldname($fld),$fld['view_format']);
								}
							}
						}
					}
				}
			}
			$grouptotals_count[$arr['name']]++;
		}

		if ( $summary[0]["sps"] ) {
			foreach ( $rpt_array['totals'] as $fld ) 
			{
				if ( $fld['show'] && ( $fld['sum'] || $fld['avg'] ) ) {
					$pagetotals_sum[fldname($fld)] += db_fld_value($data,fldname($fld));
				}
			}
			if ( testAgr( $rpt_array['totals'], "", "min", "max", "" ) > 0 ) {
				if(!$pagetotals_count)
				{
					foreach ( $rpt_array['totals'] as $fld ) {
						if ( $fld['show'] && $fld['min'] ) {
							$pagetotals_min[fldname($fld)] = db_fld_value($data,fldname($fld));
							$pagetotals_dispmin[fldname($fld)] = GetData($data,gfldname($fld),$fld['view_format']);
						}
					}
					foreach ( $rpt_array['totals'] as $fld ) {
						if ( $fld['show'] && $fld['max'] ) {
							$pagetotals_max[fldname($fld)] = db_fld_value($data,fldname($fld));
							$pagetotals_dispmax[fldname($fld)] = GetData($data,gfldname($fld),$fld['view_format']);
						}
					}
				}
				else
				{
					foreach ( $rpt_array['totals'] as $fld ) { // order nReportPageOrder
						if ( $fld['show'] && ( $fld['min'] || $fld['max'] ) ) {
							if ( $fld['min'] ) {
								if($pagetotals_min[fldname($fld)] > db_fld_value($data,fldname($fld)))
								{
									$pagetotals_min[fldname($fld)] = db_fld_value($data,fldname($fld));
									$pagetotals_dispmin[fldname($fld)] = GetData($data,gfldname($fld),$fld['view_format']);
								}
							}
							if ( $fld['max'] ) {
								if($pagetotals_max[fldname($fld)] < db_fld_value($data,fldname($fld)))
								{
									$pagetotals_max[fldname($fld)] = db_fld_value($data,fldname($fld));
									$pagetotals_dispmax[fldname($fld)] = GetData($data,gfldname($fld),$fld['view_format']);
								}
							}
						}
					}
				}
			}
			$pagetotals_count++;
		}
		
		$row["group"]["data"] = $arr_group;
		$row["group_desc"]["data"]=array_reverse($arr_group);
		$row["totals"]=$arrFields;
		$bNoNewGroup = true;
		foreach ( $arr_group as $groupItem ) {
			if ( $groupItem["newgroup"] ) {
				$bNoNewGroup = false;
				break;
			}
		}
		$row["nonewgroup"]=$bNoNewGroup;
		$rowinfo[]=$row;
	}

	if ( $summary[0]["sgs"] ) {
		foreach ( $rpt_array['totals'] as $fld ) {
			if ( $fld['show'] && ( $fld['sum'] || $fld['avg'] ) ) {
				$globaltotals_sum[fldname($fld)] += db_fld_value($data,fldname($fld));
			}
		}
		if ( testAgr( $rpt_array['totals'], "", "min", "max", "" ) > 0 ) {
			if(!$globaltotals_count)
			{
				foreach ( $rpt_array['totals'] as $fld ) {
					if ( $fld['show'] && $fld['min'] ) {
						$globaltotals_min[fldname($fld)] = db_fld_value($data,fldname($fld));
						$globaltotals_dispmin[fldname($fld)] = GetData($data,gfldname($fld),$fld['view_format']);
					}
				}
				foreach ( $rpt_array['totals'] as $fld ) {
					if ( $fld['show'] && $fld['max'] ) {
						$globaltotals_max[fldname($fld)] = db_fld_value($data,fldname($fld));
						$globaltotals_dispmax[fldname($fld)] = GetData($data,gfldname($fld),$fld['view_format']);
					}
				}
			}
			else
			{
				foreach ( $rpt_array['totals'] as $fld ) { // order nReportPageOrder
					if ( $fld['show'] && ( $fld['min'] || $fld['max'] ) ) {
						if ( $fld['min'] ) {
							if($globaltotals_min[fldname($fld)] > db_fld_value($data,fldname($fld)))
							{
								$globaltotals_min[fldname($fld)] = db_fld_value($data,fldname($fld));
								$globaltotals_dispmin[fldname($fld)] = GetData($data,gfldname($fld),$fld['view_format']);
							}
						}
						if ( $fld['max'] ) {
							if($globaltotals_max[fldname($fld)] < db_fld_value($data,fldname($fld)))
							{
								$globaltotals_max[fldname($fld)] = db_fld_value($data,fldname($fld));
								$globaltotals_dispmax[fldname($fld)] = GetData($data,gfldname($fld),$fld['view_format']);
							}
						}
					}
				}
			}
		}
		$globaltotals_count++;
	}
	if($editmode) {
		break;
	}

}

if($PageSize<0 || $groupno>=$pagestart && $groupno<=$pageend)
{
	//	close groups
	$rowclose=array();
	$arr_group_close=array();
	$arr_value_close=array();
	for ( $i=0; $i < count($rpt_array['group_fields']) - 1; $i++ ) {
		$arr = $rpt_array['group_fields'][$i];

		$rowclose["endgroup_" . GoodFieldName( $arr['name'] )]=true;
		$rowclose["1" . GoodFieldName( $arr['name'] ) . "_grval"] = $groupvalue[$arr['name']];
		$rowclose["group" . GoodFieldName( $arr['name'] ) . "_total_cnt"] = $grouptotals_count[$arr['name']];
		$arr_group_close[$i]["name"] = GoodFieldName( $arr['name'] );
		$arr_group_close[$i]["group_order"] = $arr['group_order'];
		$arr_group_close[$i]["int_type"] = $arr['int_type'];
		$arr_group_close[$i]["ss"] = $arr['ss'];
		$arr_group_close[$i]["color1"] = $arr['color1'];
		$arr_group_close[$i]["color2"] = $arr['color2'];
		$arr_group_close[$i]["endgroup"] = true;
		$arr_group_close[$i]["grval"] = $groupvalue[$arr['name']];
		$arr_group_close[$i]["total_cnt"] = $grouptotals_count[$arr['name']];

		foreach ( $rpt_array['totals'] as $fld ) {
			if ( $fld['show'] && $fld['sum'] ) {
				$sum=array(fldname($fld)=>$grouptotals_sum[$arr['name']][fldname($fld)]);
				$rowclose["group" . GoodFieldName( $arr['name'] ) . "_total" . GoodFieldName( fldname($fld) ) . "_sum"] = GetData($sum,fldname($fld),$fld['view_format']);
				$arr_group_close[$i]["group_total_sum"]["data"][0][fldname($fld)] = GetData($sum,fldname($fld),$fld['view_format']);
			}
		}
		if ( testAgr( $rpt_array['totals'], "avg", "min", "max", "" ) > 0 ) {
			if ( $grouptotals_count[$arr['name']] ) {
				foreach ( $rpt_array['totals'] as $fld ) {
					if ( $fld['show'] ) {
						if ( $fld['avg'] ) {
							$avg=array(fldname($fld)=>$grouptotals_sum[$arr['name']][fldname($fld)]/$grouptotals_count[$arr['name']]);
							$rowclose["group" . GoodFieldName( $arr['name'] ) . "_total" . GoodFieldName( fldname($fld) ) . "_avg"]=GetData($avg,fldname($fld),$fld['view_format']);
							$arr_group_close[$i]["group_total_avg"]["data"][0][fldname($fld)] = GetData($avg,fldname($fld),$fld['view_format']);
						}
						if ( $fld['min'] ) {
							$rowclose["group" . GoodFieldName( $arr['name'] ) . "_total" . GoodFieldName( fldname($fld) ) . "_min"]=$grouptotals_dispmin[$arr['name']][fldname($fld)];
							$arr_group_close[$i]["group_total_min"]["data"][0][fldname($fld)] = $grouptotals_dispmin[$arr['name']][fldname($fld)];
						}
						if ( $fld['max'] ) {
							$rowclose["group" . GoodFieldName( $arr['name'] ) . "_total" . GoodFieldName( fldname($fld) ) . "_max"]=$grouptotals_dispmax[$arr['name']][fldname($fld)];
							$arr_group_close[$i]["group_total_max"]["data"][0][fldname($fld)] = $grouptotals_dispmax[$arr['name']][fldname($fld)];
						}
					}
				}
			}
		}
	}

	if ( count( $rowclose ) ) {
		$rowclose["group"]["data"]=$arr_group_close;
		$rowclose["group_desc"]["data"]=array_reverse($arr_group_close);
		$rowinfo[]=$rowclose;
	}
}

if ( $summary[0]["sps"] ) {
	$xt->assign("page_total_cnt",$pagetotals_count);
	foreach ($rpt_array['totals'] as $f_key => $fld) { // order nReportPageOrder
		if ( $fld['show'] ) {
			if ( $fld['sum'] ) {
				$sum=array(fldname($fld)=>$pagetotals_sum[fldname($fld)]);
				$xt->assign("page_total" . GoodFieldName( fldname($fld) ) . "_sum",GetData($sum,fldname($fld),$fld['view_format']));
				$rpt_array['totals'][$f_key]['page_total_sum'] = GetData($sum,fldname($fld),$fld['view_format']);
			}
			if ( $fld['avg'] || $fld['min'] || $fld['max'] ) {
				if($pagetotals_count)
				{
					if ( $fld['avg'] ) {
						$avg=array(fldname($fld)=>$pagetotals_sum[fldname($fld)]/$pagetotals_count);
						$xt->assign("page_total" . GoodFieldName( fldname($fld) ) . "_avg",GetData($avg,fldname($fld),$fld['view_format']));
						$rpt_array['totals'][$f_key]['page_total_avg'] = GetData($avg,fldname($fld),$fld['view_format']);
					}
					if ( $fld['min'] ) {
						$xt->assign("page_total" . GoodFieldName( fldname($fld) ) . "_min",$pagetotals_dispmin[fldname($fld)]);
						$rpt_array['totals'][$f_key]['page_total_min'] = $pagetotals_dispmin[fldname($fld)];
					}
					if ( $fld['max'] ) {
						$xt->assign("page_total" . GoodFieldName( fldname($fld) ) . "_max",$pagetotals_dispmax[fldname($fld)]);
						$rpt_array['totals'][$f_key]['page_total_max'] = $pagetotals_dispmax[fldname($fld)];
					}
				}
			}
		}
	}
}

if ( $summary[0]["sgs"] ) {
	$xt->assign("global_total_cnt",$globaltotals_count);

	foreach ($rpt_array['totals'] as $f_key => $fld) { // order nReportPageOrder
		if ( $fld['show'] ) {
			if ( $fld['sum'] ) {
				$sum=array(fldname($fld)=>$globaltotals_sum[fldname($fld)]);
				$xt->assign("global_total" . GoodFieldName( fldname($fld) ) . "_sum",GetData($sum,fldname($fld),$fld['view_format']));
				$rpt_array['totals'][$f_key]['global_total_sum'] = GetData($sum,fldname($fld),$fld['view_format']);
			}
			if ( $fld['avg'] || $fld['min'] || $fld['max'] ) {
				if($globaltotals_count)
				{
					if ( $fld['avg'] ) {
						$avg=array(fldname($fld)=>$globaltotals_sum[fldname($fld)]/$globaltotals_count);
						$xt->assign("global_total" . GoodFieldName( fldname($fld) ) . "_avg",GetData($avg,fldname($fld),$fld['view_format']));
						$rpt_array['totals'][$f_key]['global_total_avg'] = GetData($avg,fldname($fld),$fld['view_format']);
					}
					if ( $fld['min'] ) {
						$xt->assign("global_total" . GoodFieldName( fldname($fld) ) . "_min",$globaltotals_dispmin[fldname($fld)]);
						$rpt_array['totals'][$f_key]['global_total_min'] = $globaltotals_dispmin[fldname($fld)];
					}
					if ( $fld['max'] ) {
						$xt->assign("global_total" . GoodFieldName( fldname($fld) ) . "_max",$globaltotals_dispmax[fldname($fld)]);
						$rpt_array['totals'][$f_key]['global_total_max'] = $globaltotals_dispmax[fldname($fld)];
					}
				}
			}
		}
	}
}

if($groupno)
$xt->assign("rowsfound",true);

$mypage=$_SESSION[$sessPrefix."_pagenumber"];
$maxpages=ceil($groupno/$PageSize);
//	write pagination
if($maxpages>1)
$xt->assign("pagination","<div id=\"pagination1\"></div><script language=\"JavaScript\">WritePagination(".$mypage.",".$maxpages.", 1);
	function GotoPage(nPageNumber)
	{
		window.location='dreport.php?rname=" . postvalue("rname") . "&goto='+nPageNumber;
	}
</script>");

if ( ( count($rpt_array['group_fields']) - 1 ) > 0 ) {
	$xt->assign("gpp1_selected",($PageSize==1)?"selected":"");
	$xt->assign("gpp3_selected",($PageSize==3)?"selected":"");
	$xt->assign("gpp5_selected",($PageSize==5)?"selected":"");
	$xt->assign("gpp10_selected",($PageSize==10)?"selected":"");
	$xt->assign("gpp50_selected",($PageSize==50)?"selected":"");
	$xt->assign("gpp100_selected",($PageSize==100)?"selected":"");
	$xt->assign("gpp0_selected",($PageSize==-1)?"selected":"");
} else {
	$xt->assign("rpp10_selected",($PageSize==10)?"selected":"");
	$xt->assign("rpp20_selected",($PageSize==20)?"selected":"");
	$xt->assign("rpp50_selected",($PageSize==50)?"selected":"");
	$xt->assign("rpp100_selected",($PageSize==100)?"selected":"");
	$xt->assign("rpp500_selected",($PageSize==500)?"selected":"");
	$xt->assign("gpp0_selected",($PageSize==-1)?"selected":"");
}


	$xt->assign("userid",htmlspecialchars($_SESSION["UserID"]));
	$xt->assign("guest",$_SESSION["AccessLevel"] == ACCESS_LEVEL_GUEST);

// escape field labels
foreach ($rpt_array['totals'] as $f_key => $fld) {
	$rpt_array['totals'][$f_key]['label'] = htmlspecialchars( $rpt_array['totals'][$f_key]['label'] );
}

$aGroupFields=array();
$ngFieldNames=array();
$arr_page_order_fields=array();
$arr_not_group_fields=array();

for ( $i=0; $i < count($rpt_array['group_fields'])-1; $i++ ) {
	$aGroupFields[] = $rpt_array['group_fields'][$i]['name'];
}

$aTotFields=array();
foreach ( $rpt_array['totals'] as $fld ) 
{
	$aTotFields[] = fldname($fld);
}

$ngFieldNames = array_diff( $aTotFields, $aGroupFields );

$arr_alias = array();
foreach ( $aGroupFields as $gr_name  ) {
	foreach ( $rpt_array['totals'] as $fld ) 
	{
		if ( $gr_name == fldname($fld) && !in_array(fldname($fld), $arr_alias)) {
			$arr_alias[] = fldname($fld);
			$arr_page_order_fields["data"][] = $fld;
		}
	}
}
foreach ( $rpt_array['totals'] as $fld ) 
{
	if ( in_array( fldname($fld), $ngFieldNames ) ) 
	{
		$arr_page_order_fields["data"][] = $fld;
		if ($fld["show"]) 
		{
			$arr_not_group_fields[] = $fld;
		}
	}
}

foreach ($arr_page_order_fields["data"] as $key => $value){
	$arr_page_order_fields["data"][$key]["fieldId"] = $key+1;
}
$xt->assignbyref("page_order_fields", $arr_page_order_fields);
$align_summary = array();
foreach ($arr_not_group_fields as $key => $value){
	$arr_not_group_fields[$key]['fieldId4'] = $key + 1;
}
$align_summary["data"] = $arr_not_group_fields;
$xt->assignbyref("not_group_fields", $align_summary);

if (testAdvSearch($rpt_array['tables'][0])) {
	$xt->assign( "adv_search_block", true);
}

$arr_group_field_colors = array();
for ( $i=0; $i < count($rpt_array['group_fields'])-1; $i++ ) {
	$iteration = $i+1;
	$color1 = $rpt_array['group_fields'][$i]['color1'];
	$color2 = $rpt_array['group_fields'][$i]['color2'];
	$arr_group_field_colors["data"][] = array("iteration" => $iteration, "color1" => $color1, "color2" => $color2);
}
$xt->assignbyref("group_field_colors", $arr_group_field_colors);

$xt->assign("groupFieldsCnt", count( $rpt_array['group_fields'] ) - 1);
if (count( $rpt_array['group_fields'] ) > 1) {
	$xt->assign("groups_per_page_block", true);
} else {
	$xt->assign("records_per_page_block", true);
}

if ($rpt_array['miscellaneous']['print_friendly']) {
	$xt->assign( "print_friendly_block", true );
}

$xt->assign("testAgr", testAgr( $rpt_array['totals'], "", "", "", "" ));
$xt->assign("align_testAgr", testAgr( $rpt_array['totals'], "", "", "", "" ) - count( $rpt_array['group_fields'] ) + 1);
if (testAgr( $rpt_array['totals'], "", "", "", "" ) > 0) {
	$xt->assign("aggregation_block",true);
}
$xt->assign( "testAgrMin", testAgr( $rpt_array['totals'], "", "min", "", "" ) );
if (testAgr( $rpt_array['totals'], "", "min", "", "" ) > 0) {
	$xt->assign("min_aggregation_block",true);
}
$xt->assign( "testAgrSum", testAgr( $rpt_array['totals'], "", "", "", "sum" ) );
if (testAgr( $rpt_array['totals'], "", "", "", "sum" ) > 0) {
	$xt->assign("sum_aggregation_block",true);
}
$xt->assign( "testAgrAvg", testAgr( $rpt_array['totals'], "avg", "", "", "" ) );
if (testAgr( $rpt_array['totals'], "avg", "", "", "" ) > 0) {
	$xt->assign("avg_aggregation_block",true);
}
$xt->assign( "testAgrMax", testAgr( $rpt_array['totals'], "", "", "max", "" ) );
if (testAgr( $rpt_array['totals'], "", "", "max", "" ) > 0) {
	$xt->assign("max_aggregation_block",true);
}

$xt->assign( "reportName", htmlspecialchars( postvalue( 'rname' ) ) );
$xt->assign( "reportNamejs", jsreplace( postvalue( 'rname' ) ) );
$xt->assign( "reportTitle", htmlspecialchars( $rpt_array['settings']['title'] ) );
$xt->assign( "shortTableName", htmlspecialchars( $rpt_array['short_table_name'] ) );
$xt->assign( "shortTableNamejs", jsreplace( $rpt_array['short_table_name'] ) );
$xt->assign("search_type", ($rpt_array['db-based']) ? "dsearch" : htmlspecialchars($rpt_array['short_table_name'])."_search");
$xt->assign( "ext", "php" );

for ($i=0; $i < count($rowinfo); $i++) {
	$num_uniq2++;
	// not group fields
	// $arr_not_group_fields_values = array();
	$length = 0;
	$group_kol = count($rowinfo[0]['group']['data']);
	$group_kol1 = $group_kol;
	if ($rpt_array['miscellaneous']['type'] == 'align') $group_kol1 = 0; 
	$group_count = 0;
	for ($k=0; $k < count($arr_not_group_fields); $k++) {
		$name_ = $arr_not_group_fields[$k]["name"];
		if($rpt_array['db-based'])
			$name_ = $arr_not_group_fields[$k]["table"].".".$arr_not_group_fields[$k]["name"];
		if ($rpt_array['miscellaneous']['type'] != 'align') {	
			while (!$arr_page_order_fields["data"][$group_count+$group_kol1]["show"]){
				$group_count++;
			}
		}
		$group_count++;
		$rowinfo[$i]["not_group_fields_values"]["data"][$length]["fieldNum"] = $group_count+$group_kol1; 
		if (isset($rowinfo[$i]["totals"])) {
			$rowinfo[$i]["not_group_fields_values"]["data"][$length]["field_value"] = $rowinfo[$i]["totals"]["data"][0][$name_];
			if ($rpt_array['miscellaneous']['type'] == "outline" || $rpt_array['miscellaneous']['type'] == "align") {
				$rowinfo[$i]["not_group_fields_values"]["data"][$length]["field_label"] = $arr_not_group_fields[$k]["label"];
			}
			
		}
		$length = count($rowinfo[$i]["not_group_fields_values"]["data"]);
	}
			
	if ($rpt_array['miscellaneous']['type'] == "block") {	
		if ($summary[0]["sds"] && $rowinfo[$i]["nonewgroup"]) {
			$rowinfo[$i]["no_newgroup_block"] = true;
		}
	}
	
	for ($j=0; $j < count($rowinfo[$i]["group"]["data"]); $j++) 
	{
		$num_uniq++;
		$arr_group_headers = array("data"=>array());
		$rowinfo[$i]["group"]["data"][$j]["iteration"] = $j+1;

		$rowinfo[$i]["group"]["data"][$j]["groupIdCo"] = 2+$j*6;
		$rowinfo[$i]["group"]["data"][$j]["group_in_uniq"] = 4;
		if ($rpt_array['miscellaneous']['type'] == 'outline') $rowinfo[$i]["group"]["data"][$j]["group_in_uniq_outline"] = 5;
		$group_name_ = $rowinfo[$i]["group"]["data"][$j]["name"];
		$rowinfo[$i]["group"]["data"][$j]["group_field_value"] = 
			$rowinfo[$i]["group"]["data"][$j]["value"]["data"][0][$group_name_];
		
		if ($rowinfo[$i]["group"]["data"][$j]["int_type"]) {
			$rowinfo[$i]["group"]["data"][$j]["group_level"] = true;
		} else {
			$rowinfo[$i]["group"]["data"][$j]["default_level"] = true;
		}
		
		if ($rowinfo[$i]["group"]["data"][$j]["group_order"] > 1) {
			$rowinfo[$i]["group"]["data"][$j]["right_border"] = true;
		} else {
			$rowinfo[$i]["group"]["data"][$j]["left_border"] = true;
		}
		
		/*
		 * Stepped Layout
		 */
		if ($rpt_array['miscellaneous']['type'] == "stepped") {
			if ($rowinfo[$i]["group"]["data"][$j]["newgroup"]) 
			{
				$buf = '';
				if ($j == 0) {
					foreach ($arr_page_order_fields["data"] as $key => $arr_field_info) {
						if ($arr_field_info["show"]) {
							$buf .= "<td fieldname=\"".($key+1)."\" groupname=\"".FieldHeaders."\" class=\"blackshade class".FieldHeaders."g class".($key+1)."f class".FieldHeaders."g".($key+1)."f0u\">".$arr_field_info["label"]."</td>\n";
						}
					}
					$rowinfo[$i]["group"]["data"][$j]["first_group_block"] = true;
					$rowinfo[$i]["group"]["data"][$j]["first_group_html"] = $buf;
				}
				for ($k=0; $k < count($rowinfo[$i]["group"]["data"]); $k++) {
					$arr_group_headers_values = array();
					$arr_group_headers_values["fieldId"] = $k+1;
					if ($rowinfo[$i]["group"]["data"][$k]["name"] == $rowinfo[$i]["group"]["data"][$j]["name"]) 
					{
						$arr_group_headers_values["groups_equal_block"] = true;
						$arr_group_headers_values["head_colspan"] = testAgr($rpt_array['totals'], "", "", "", "") - $rowinfo[$i]["group"]["data"][$j]["group_order"] + 1;
					} elseif ($rowinfo[$i]["group"]["data"][$k]["group_order"] < $rowinfo[$i]["group"]["data"][$j]["group_order"]) 
					{
						$arr_group_headers_values["groups_order_block"] = true;
						$arr_group_headers_values["head_group_order"] = $rowinfo[$i]["group"]["data"][$k]["group_order"];
						$arr_group_headers_values["fieldId"] = $k+1;
						$arr_group_headers_values["groupId"] = 2 + ($rowinfo[$i]["group"]["data"][$k]["group_order"]-1)*6;
						$arr_group_headers_values["group_in_uniq"] = $j;
					}
					if (count($arr_group_headers_values) > 0) {
						$arr_group_headers["data"][] = $arr_group_headers_values;
					}
				}
				$rowinfo[$i]["group"]["data"][$j]["group_headers"] = $arr_group_headers;
			}
		}

		/*
		 * Block Layout
		 */		
		if ($rpt_array['miscellaneous']['type'] == "block") 
		{	
			if ($rowinfo[$i]["group"]["data"][$j]["int_type"] && $summary[0]["sds"]) {
				$rowinfo[$i]["group"]["data"][$j]["field_value"] = 
					$rowinfo[$i]["group"]["data"][$j]["value"]["data"][0][$group_name_];
			} else {
				$rowinfo[$i]["group"]["data"][$j]["field_value"] = "&nbsp;";
			}
			
			if ($rowinfo[$i]["group"]["data"][$j]["newgroup"]
				&& $rowinfo[$i]["group"]["data"][$j]["firstnewgroup"]) 
			{
				$rowinfo[$i]["group"]["data"][$j]["first_newgroup"] = true;
				$buf = '';
				if ($j == 0) {
					foreach ($arr_page_order_fields["data"] as $key => $arr_field_info) {
						if ($arr_field_info["show"]) {
							// add column sign
							$buf .= "<td fieldname=\"".($key+1)."\" groupname=\"".FieldHeaders."\" class=blackshade>".$arr_field_info["label"]."</td>\n";
						}
					}
					$rowinfo[$i]["group"]["data"][$j]["first_group_block"] = true;
					$rowinfo[$i]["group"]["data"][$j]["first_group_html"] = $buf;
				}

				for ($m=0; $m < count($arr_not_group_fields); $m++) {
					$name_ = $arr_not_group_fields[$m]["name"];
					if($rpt_array['db-based'])
						$name_ = $arr_not_group_fields[$m]["table"].".".$arr_not_group_fields[$m]["name"];
					if ($summary[0]["sds"]) {
						if (isset($rowinfo[$i]["totals"])) 
						{
							$rowinfo[$i]["not_group_fields_values_block"]["data"][] = array("field_value" => $rowinfo[$i]["totals"]["data"][0][$name_]);
						}					
					} 
					else 
					{
						$rowinfo[$i]["not_group_fields_values_block"]["data"][] = array("field_value" => "&nbsp;");
					}
					$rowinfo[$i]["not_group_fields_values_block"]["data"][count($rowinfo[$i]["not_group_fields_values_block"]["data"])-1]["fieldNum"] = ++$group_kol1; 
				}				
			
				for ($k=0; $k < count($rowinfo[$i]["group"]["data"]); $k++) {
					$arr_group_headers_values = array();
					$arr_group_headers_values["fieldId"] = $k+1;
					$arr_group_headers_values["groupId2"] = 1 + 6*$k;
					$arr_group_headers_values["groupId3"] = 2 + 6*$k;
					$arr_group_headers_values["group2_in_uniq"] = $j+1;
					$group_name_2_ = $rowinfo[$i]["group"]["data"][$k]["name"];
					if ($rowinfo[$i]["group"]["data"][$k]["group_order"] >= $rowinfo[$i]["group"]["data"][$j]["group_order"]) 
					{
						$arr_group_headers_values["true_groups_order_block"] = true;
						$arr_group_headers_values["group2_group_order"] = $rowinfo[$i]["group"]["data"][$k]["group_order"];
						$arr_group_headers_values["group2_grval"] = $rowinfo[$i]["group"]["data"][$k]["grval"];
						
						if ($rowinfo[$i]["group"]["data"][$k]["int_type"] && $summary[0]["sds"]) {
							$arr_group_headers_values["groups_sds_block"] = true;
							$arr_group_headers_values["group2_field_value"] = 
								$rowinfo[$i]["group"]["data"][$k]["value"]["data"][0][$group_name_2_];
						}
					} else {
						$arr_group_headers_values["false_groups_order_block"] = true;
						$arr_group_headers_values["group2_group_order"] = $rowinfo[$i]["group"]["data"][$k]["group_order"];
						
						if ($rowinfo[$i]["group"]["data"][$k]["int_type"] && $summary[0]["sds"]) {
							$arr_group_headers_values["groups_sds_block"] = true;
							$arr_group_headers_values["group2_field_value"] = 
								$rowinfo[$i]["group"]["data"][$k]["value"]["data"][0][$group_name_2_];
						} else {
							$arr_group_headers_values["groups_sds_block_else"] = true;
						}	
					}
					if (count($arr_group_headers_values) > 0) {
						$arr_group_headers["data"][] = $arr_group_headers_values;
					}
				}
				$rowinfo[$i]["group"]["data"][$j]["group_headers"] = $arr_group_headers;
			}
		}
		
		/*
		 * Outline Layout
		 */
		if ($rpt_array['miscellaneous']['type'] == "outline") {
			if ($rowinfo[$i]["group"]["data"][$j]["newgroup"]) 
			{
				$rowinfo[$i]["group"]["data"][$j]["head_colspan"] = testAgr($rpt_array['totals'], "", "", "", "") - $rowinfo[$i]["group"]["data"][$j]["group_order"] + 1;
				$arr_group_headers_values["groupId4"] = 1 + 6*$k;
				foreach ($arr_page_order_fields["data"] as $arr_field_info) {
					if (gfldname($arr_field_info) == $group_name_) {
						$rowinfo[$i]["group"]["data"][$j]["group_label"] = $arr_field_info["label"];
					}
				}
				if ($j == 0) {
					$rowinfo[$i]["group"]["data"][$j]["first_group_block"] = true;
				}
				if ($j == (count($rowinfo[$i]["group"]["data"])-1)) {
					$rowinfo[$i]["group"]["data"][$j]["last_group_block"] = true;
				}
				for ($k=0; $k < count($rowinfo[$i]["group"]["data"]); $k++) {
					$arr_group_headers_values["fieldId"] = $k+1;
					$arr_group_headers_values = array();
					$arr_group_headers_values["group2_group_order"] = $rowinfo[$i]["group"]["data"][$k]["group_order"];
					$arr_group_headers_values["group2_in_uniq"] = $j;
					$arr_group_headers_values["groupId2"] = 1 + 6*$k;
					$arr_group_headers_values["groupId3"] = 2 + 6*$k;
					
					if ($rowinfo[$i]["group"]["data"][$k]["group_order"] < $rowinfo[$i]["group"]["data"][$j]["group_order"]) 
					{
						$arr_group_headers_values["groups_order_block"] = true;
					}
					if (count($arr_group_headers_values) > 0) {
						$arr_group_headers["data"][] = $arr_group_headers_values;
					}
				}
				$rowinfo[$i]["group"]["data"][$j]["group_headers"] = $arr_group_headers;
			}
		}
		
		/*
		 * Align Layout
		 */
		if ($rpt_array['miscellaneous']['type'] == "align") {
			if ($rowinfo[$i]["group"]["data"][$j]["newgroup"]) 
			{
				foreach ($arr_page_order_fields["data"] as $key => $arr_field_info) {
					if (gfldname($arr_field_info) == $group_name_) {
						$rowinfo[$i]["group"]["data"][$j]["group_label"] = $arr_field_info["label"];
					}
					$rowinfo[$i]["group"]["data"][$j]["fieldId"] =  $key + 1;
				}
				if ($j == 0) {
					$rowinfo[$i]["group"]["data"][$j]["first_group_block"] = true;
				}
				if ($j == (count($rowinfo[$i]["group"]["data"])-1)) {
					$rowinfo[$i]["group"]["data"][$j]["last_group_block"] = true;
				}
			}
		}		
	}
	// group_desc <=> group_summary_block
	$arr_group_summary = array();
	$num_uniq_outline = 0;
	for ($j=0; $j < count($rowinfo[$i]["group_desc"]["data"]); $j++) 
	{
		
		$group_name_ = $rowinfo[$i]["group_desc"]["data"][$j]["name"];
	
		if ($rowinfo[$i]["group_desc"]["data"][$j]["ss"] 
			&& $rowinfo[$i]["group_desc"]["data"][$j]["endgroup"]) 
		{
			// sum
			$group_summary_fields_sum = array();
			$num_uniq2++;
			if ($rpt_array['miscellaneous']['type'] == "align") {
				for ($k=0; $k < count($arr_not_group_fields); $k++) {
					$group_summary_fields_sum[$k]["iteration"] = $k+1;				
					$group_summary_fields_sum[$k]['groupIdSum'] = 5 + (count($rowinfo[0]['group']['data'])-1-$j)*6;	
					$group_summary_fields_sum[$k]['group_in_uniq'] = $num_uniq2;

					$name_ = $arr_not_group_fields[$k]["name"];
					if($rpt_array['db-based'])
						$name_ = $arr_not_group_fields[$k]["table"].".".$arr_not_group_fields[$k]["name"];

					if ($k == 0) {
						$group_summary_fields_sum[$k]["first_block"] = true;
					} else {
						$group_summary_fields_sum[$k]["not_first_block"] = true;
					}
					
					if ($arr_not_group_fields[$k]["sum"]) {
						$group_summary_fields_sum[$k]["sum_field_flag"]=true;
						$group_summary_fields_sum[$k]["group_total_sum_value"] = 
							$rowinfo[$i]["group_desc"]["data"][$j]["group_total_sum"]["data"][0][$name_];
					}
				}
			} else {
				for ($k=0; $k < count($arr_page_order_fields["data"]); $k++) {
					$field_name_ = fldname($arr_page_order_fields["data"][$k]);
				
					if ($arr_page_order_fields["data"][$k]["show"]) {
						$group_summary_fields_sum[$k]["iteration"] = $k+1;				
						$group_summary_fields_sum[$k]['groupIdSum'] = 5 + (count($rowinfo[0]['group']['data'])-1-$j)*6;	
						$group_summary_fields_sum[$k]['group_in_uniq'] = $num_uniq2;
						$group_summary_fields_sum[$k]['group_in_uniq_block'] = $num_uniq2-4;
						if (GoodFieldName($field_name_) == $group_name_) {
							$group_summary_fields_sum[$k]["group_field_flag"]=true;
							$group_summary_fields_sum[$k]["left_border"]="";
							if ($rowinfo[$i]["group_desc"]["data"][$j]["group_order"] > 1) {
								$group_summary_fields_sum[$k]["left_border"]="border-left:1px solid black;";
							}
						} elseif ($arr_page_order_fields["data"][$k]["sum"]) {
							$group_summary_fields_sum[$k]["sum_field_flag"]=true;
							$group_summary_fields_sum[$k]["group_total_sum_value"] = 
								$rowinfo[$i]["group_desc"]["data"][$j]["group_total_sum"]["data"][0][$field_name_];
						} elseif ($k < $rowinfo[$i]["group_desc"]["data"][$j]["group_order"]) {
							$group_summary_fields_sum[$k]['groupIdSum'] = 2 + $k*6;	
							$group_summary_fields_sum[$k]['group_in_uniq'] = $num_uniq2;
							$group_summary_fields_sum[$k]['groupIdSum3'] = 2 + $j*6;	
							$group_summary_fields_sum[$k]["border_flag"]=true;
							if ($k > 0) {
								$group_summary_fields_sum[$k]["left_border"]="border-left:1px solid black;";
							} else {
								$group_summary_fields_sum[$k]["left_border"]="border-left:solid 1px #cccccc;";
							}
						} else {
							$group_summary_fields_sum[$k]["default_flag"]=true;
						}
					}
				}
			}
			if (count($group_summary_fields_sum)>0) {
				$rowinfo[$i]["group_desc"]["data"][$j]["group_summary_fields_sum"]["data"] = $group_summary_fields_sum;
			}
			// avg
			$num_uniq2++;
			$group_summary_fields_avg = array();
			if ($rpt_array['miscellaneous']['type'] == "align") {
				for ($k=0; $k < count($arr_not_group_fields); $k++) {
					$name_ = $arr_not_group_fields[$k]["name"];
					if($rpt_array['db-based'])
						$name_ = $arr_not_group_fields[$k]["table"].".".$arr_not_group_fields[$k]["name"];
					$group_summary_fields_avg[$k]['groupIdAvg'] = 6 + (count($rowinfo[0]['group']['data'])-1-$j)*6;	
					$group_summary_fields_avg[$k]['group_in_uniq'] = $num_uniq2;
					$group_summary_fields_avg[$k]["iteration"] = $k+1;	
					if ($k == 0) {
						$group_summary_fields_avg[$k]["first_block"] = true;
					} else {
						$group_summary_fields_avg[$k]["not_first_block"] = true;
					}
					
					if ($arr_not_group_fields[$k]["avg"]) {
						$group_summary_fields_avg[$k]["avg_field_flag"]=true;
						$group_summary_fields_avg[$k]["group_total_avg_value"] = 
							$rowinfo[$i]["group_desc"]["data"][$j]["group_total_avg"]["data"][0][$name_];
					}
				}
			} else {			
				for ($k=0; $k < count($arr_page_order_fields["data"]); $k++) {
					$field_name_ = fldname($arr_page_order_fields["data"][$k]);
					
					if ($arr_page_order_fields["data"][$k]["show"]) {
						$group_summary_fields_avg[$k]['groupIdAvg'] = 6 + (count($rowinfo[0]['group']['data'])-1-$j)*6;	
						$group_summary_fields_avg[$k]['group_in_uniq'] = $num_uniq2;
						$group_summary_fields_avg[$k]['group_in_uniq_block'] = $num_uniq2-4;
						$group_summary_fields_avg[$k]["iteration"] = $k+1;				
						if (GoodFieldName($field_name_) == $group_name_) {
							$group_summary_fields_avg[$k]["group_field_flag"]=true;
							$group_summary_fields_avg[$k]["left_border"]="";
							if ($rowinfo[$i]["group_desc"]["data"][$j]["group_order"] > 1) {
								$group_summary_fields_avg[$k]["left_border"]="border-left:1px solid black;";
							}
						} elseif ($arr_page_order_fields["data"][$k]["avg"]) {
							$group_summary_fields_avg[$k]["avg_field_flag"]=true;
							$group_summary_fields_avg[$k]["group_total_avg_value"] = 
								$rowinfo[$i]["group_desc"]["data"][$j]["group_total_avg"]["data"][0][$field_name_];
						} elseif ($k < $rowinfo[$i]["group_desc"]["data"][$j]["group_order"]) {
							$group_summary_fields_avg[$k]['groupIdAvg'] = 2 + $k*6;
							$group_summary_fields_avg[$k]['group_in_uniq'] = $num_uniq2;
							$group_summary_fields_avg[$k]['groupIdAvg3'] = 2 + $j*6;
							$group_summary_fields_avg[$k]["border_flag"]=true;
							if ($k > 0) {
								$group_summary_fields_avg[$k]["left_border"]="border-left:1px solid black;";
							} else {
								$group_summary_fields_avg[$k]["left_border"]="border-left:solid 1px #cccccc;";
							}
						} else {
							$group_summary_fields_avg[$k]["default_flag"]=true;
						}
					}
				}
			}
			if (count($group_summary_fields_avg)>0) {
				$rowinfo[$i]["group_desc"]["data"][$j]["group_summary_fields_avg"]["data"] = $group_summary_fields_avg;
			}
			// min
			$num_uniq2++;
			$group_summary_fields_min = array();
			if ($rpt_array['miscellaneous']['type'] == "align") {
				for ($k=0; $k < count($arr_not_group_fields); $k++) {
					$name_ = $arr_not_group_fields[$k]["name"];
					if($rpt_array['db-based'])
						$name_ = $arr_not_group_fields[$k]["table"].".".$arr_not_group_fields[$k]["name"];
					$group_summary_fields_min[$k]["iteration"] = $k+1;				
					$group_summary_fields_min[$k]['groupIdMin'] = 3 + (count($rowinfo[0]['group']['data'])-1-$j)*6;	
					$group_summary_fields_min[$k]['group_in_uniq'] = $num_uniq2;
					if ($k == 0) {
						$group_summary_fields_min[$k]["first_block"] = true;
					} else {
						$group_summary_fields_min[$k]["not_first_block"] = true;
					}
					
					if ($arr_not_group_fields[$k]["min"]) {
						$group_summary_fields_min[$k]["min_field_flag"]=true;
						$group_summary_fields_min[$k]["group_total_min_value"] = 
							$rowinfo[$i]["group_desc"]["data"][$j]["group_total_min"]["data"][0][$name_];
					}
				}
			} else {						
				for ($k=0; $k < count($arr_page_order_fields["data"]); $k++) {
					$field_name_ = fldname($arr_page_order_fields["data"][$k]);
					
					if ($arr_page_order_fields["data"][$k]["show"]) {
						$group_summary_fields_min[$k]["iteration"] = $k+1;				
						$group_summary_fields_min[$k]['groupIdMin'] = 3 + (count($rowinfo[0]['group']['data'])-1-$j)*6;	
						$group_summary_fields_min[$k]['group_in_uniq'] = $num_uniq2;
						$group_summary_fields_min[$k]['group_in_uniq_block'] = $num_uniq2-4;
						if (GoodFieldName($field_name_) == $group_name_) {
							$group_summary_fields_min[$k]["group_field_flag"]=true;
							$group_summary_fields_min[$k]["left_border"]="";
							if ($rowinfo[$i]["group_desc"]["data"][$j]["group_order"] > 1) {
								$group_summary_fields_min[$k]["left_border"]="border-left:1px solid black;";
							}
						} elseif ($arr_page_order_fields["data"][$k]["min"]) {
							$group_summary_fields_min[$k]["min_field_flag"]=true;
							$group_summary_fields_min[$k]["group_total_min_value"] = 
								$rowinfo[$i]["group_desc"]["data"][$j]["group_total_min"]["data"][0][$field_name_];
						} elseif ($k < $rowinfo[$i]["group_desc"]["data"][$j]["group_order"]) {
							$group_summary_fields_min[$k]['groupIdMin'] = 2 + $k*6;	
							$group_summary_fields_min[$k]['group_in_uniq'] = $num_uniq2;
							$group_summary_fields_min[$k]['groupIdMin3'] = 2 + $j*6;
							$group_summary_fields_min[$k]["border_flag"]=true;
							if ($k > 0) {
								$group_summary_fields_min[$k]["left_border"]="border-left:1px solid black;";
							} else {
								$group_summary_fields_min[$k]["left_border"]="border-left:solid 1px #cccccc;";
							}
						} else {
							$group_summary_fields_min[$k]["default_flag"]=true;
						}
					}
				}
			}
			if (count($group_summary_fields_min)>0) {
				$rowinfo[$i]["group_desc"]["data"][$j]["group_summary_fields_min"]["data"] = $group_summary_fields_min;
			}
			// max
			$num_uniq2++;
			$group_summary_fields_max = array();
			if ($rpt_array['miscellaneous']['type'] == "align") {
				for ($k=0; $k < count($arr_not_group_fields); $k++) {
					$name_ = $arr_not_group_fields[$k]["name"];
					if($rpt_array['db-based'])
						$name_ = $arr_not_group_fields[$k]["table"].".".$arr_not_group_fields[$k]["name"];
					$group_summary_fields_max[$k]["iteration"] = $k+1;	
					$group_summary_fields_max[$k]['groupIdMax'] = 4 + (count($rowinfo[0]['group']['data'])-1-$j)*6;
					$group_summary_fields_max[$k]['group_in_uniq'] = $num_uniq2;
					if ($k == 0) {
						$group_summary_fields_max[$k]["first_block"] = true;
					} else {
						$group_summary_fields_max[$k]["not_first_block"] = true;
					}
					
					if ($arr_not_group_fields[$k]["max"]) {
						$group_summary_fields_max[$k]["max_field_flag"]=true;
						$group_summary_fields_max[$k]["group_total_max_value"] = 
							$rowinfo[$i]["group_desc"]["data"][$j]["group_total_max"]["data"][0][$name_];
					}
				}
			} else {
				for ($k=0; $k < count($arr_page_order_fields["data"]); $k++) {
					$field_name_ = fldname($arr_page_order_fields["data"][$k]);
					
					if ($arr_page_order_fields["data"][$k]["show"]) {
						$group_summary_fields_max[$k]["iteration"] = $k+1;	
						$group_summary_fields_max[$k]['groupIdMax'] = 4 + (count($rowinfo[0]['group']['data'])-1-$j)*6;
						$group_summary_fields_max[$k]['group_in_uniq'] = $num_uniq2;
						$group_summary_fields_max[$k]['group_in_uniq_block'] = $num_uniq2-4;
						if (GoodFieldName($field_name_) == $group_name_) {
							$group_summary_fields_max[$k]["group_field_flag"]=true;
							$group_summary_fields_max[$k]["left_border"]="";
							if ($rowinfo[$i]["group_desc"]["data"][$j]["group_order"] > 1) {
								$group_summary_fields_max[$k]["left_border"]="border-left:1px solid black;";
							}
						} elseif ($arr_page_order_fields["data"][$k]["max"]) {
							$group_summary_fields_max[$k]["max_field_flag"]=true;
							$group_summary_fields_max[$k]["group_total_max_value"] = 
								$rowinfo[$i]["group_desc"]["data"][$j]["group_total_max"]["data"][0][$field_name_];
						} elseif ($k < $rowinfo[$i]["group_desc"]["data"][$j]["group_order"]) {
							$group_summary_fields_max[$k]['groupIdMax'] = 2 + $k*6;
							$group_summary_fields_max[$k]['group_in_uniq'] = $num_uniq2;
							$group_summary_fields_max[$k]['groupIdMax3'] = 2 + $j*6;
							$group_summary_fields_max[$k]["border_flag"]=true;
							if ($k > 0) {
								$group_summary_fields_max[$k]["left_border"]="border-left:1px solid black;";
							} else {
								$group_summary_fields_max[$k]["left_border"]="border-left:solid 1px #cccccc;";
							}
						} else {
							$group_summary_fields_max[$k]["default_flag"]=true;
						}
					}
				}
			}
			if (count($group_summary_fields_max)>0) {
				$rowinfo[$i]["group_desc"]["data"][$j]["group_summary_fields_max"]["data"] = $group_summary_fields_max;
			}
			// group summary totals
			$group_summary_totals = array();
			for ($k=0; $k < count($arr_page_order_fields["data"]); $k++) {
				if (gfldname($arr_page_order_fields["data"][$k]) == $rowinfo[$i]["group_desc"]["data"][$j]["name"]) {
					$group_order_ = $rowinfo[$i]["group_desc"]["data"][$j]["group_order"];
					if ($group_order_ > 1) {
						$group_summary_totals[$k]["left_border"]=true;	
					}
					$group_summary_totals[$k]["colspan_expr"] = 
						testAgr( $rpt_array['totals'], "", "", "", "" ) - $group_order_ + 1;
					$group_summary_totals[$k]["label"] = $arr_page_order_fields["data"][$k]["label"];
					$group_summary_totals[$k]["groupIdSummary"] = (count($rowinfo[0]['group']['data'])-1-$j) + 36;
				}
			}
			if (count($group_summary_totals)>0) {
				$rowinfo[$i]["group_desc"]["data"][$j]["group_summary_totals"]["data"] = $group_summary_totals;
			}			
			// repeat construction
			$td_columns = "";		
			$num_uniq2++;
			$num_uniq_outline++;
			for ($m=0; $m < (count($rpt_array['group_fields']) - ($j+2)); $m++) {
				if ($rpt_array['miscellaneous']['type'] == "block")
					$td_columns .= '<td class="group_'.($m+1).' class'.(2+$m*6).'g class'.($m+1).'f class'.(2+$m*6).'g'.($m+1).'f'.($num_uniq2-9).'u" groupname="'.(2+$m*6).'" fieldname="'.($m+1).'" uniqe="'.($num_uniq2-9).'" style="border-style:none; border-left:1px solid #000; border-right:1px solid #000;';
				else 
					$td_columns .= '<td class="group_'.($m+1).' class'.(2+$m*6).'g class'.($m+1).'f class'.(2+$m*6).'g'.($m+1).'f'.($num_uniq2-5).'u" groupname="'.(2+$m*6).'" fieldname="'.($m+1).'" uniqe="'.($num_uniq2-5).'" style="border-style:none; border-left:1px solid #000; border-right:1px solid #000;';
				if ($rpt_array['miscellaneous']['type'] != "block") {
					if ($m>1)
						$td_columns .= 'border-left:1px solid black;';
					else
						$td_columns .= 'border-left:1px solid #ccc;';
				}
				$td_columns .= '"></td>';
			}
			if ($td_columns<>"") {
				$rowinfo[$i]["group_desc"]["data"][$j]["td_columns"] = $td_columns;
			}
			// insert all in one transaction
			$arr_group_summary[] = $rowinfo[$i]["group_desc"]["data"][$j];
		}
	}
	if (count($arr_group_summary) > 0) {
		$rowinfo[$i]["group_summary_block"]["data"] = $arr_group_summary;
	}
	// REMOVE group_desc section FROM $rowinfo array
	unset($rowinfo[$i]["group_desc"]);
}


// header for nogroup
if(count($rowinfo))
{
	if(count($rowinfo[0]["group"]["data"]==0))
	{
		$buf = '';
		foreach ($arr_page_order_fields["data"] as $key => $arr_field_info) 
		{
			if ($arr_field_info["show"]) 
				$buf .= "<td fieldname=\"".($key+1)."\" groupname=\"".FieldHeaders."\" class=\"blackshade class".FieldHeaders."g class".($key+1)."f class".FieldHeaders."g".($key+1)."f0u\">".$arr_field_info["label"]."</td>\n";
		}
		$rowinfo[0]["newgroup"] = true;
		$rowinfo[0]["group"]["data"][0]["first_group_block"] = true;
		$rowinfo[0]["group"]["data"][0]["first_group_html"] = $buf;
	}
}

$page_summary_fields_sum = array();
$page_summary_fields_avg = array();
$page_summary_fields_min = array();
$page_summary_fields_max = array();
// sum - page summary
if ($rpt_array['miscellaneous']['type'] == "align") {
	for ($i=0; $i < count($arr_not_group_fields); $i++) {
		$page_summary_fields_sum["data"][$i] = $arr_not_group_fields[$i];
		$page_summary_fields_sum["data"][$i]['fieldId'] = $i+1;
		if ($i==0) {
			$page_summary_fields_sum["data"][$i]["first_field_flag"] = true;
		}
		if ($page_summary_fields_sum["data"][$i]["sum"]) {
			$page_summary_fields_sum["data"][$i]["sum_field_flag"] = true;
		}
	}
} else {
	for ($i=0; $i < count($arr_page_order_fields["data"]); $i++) {
		$page_summary_fields_sum["data"][$i] = $arr_page_order_fields["data"][$i];
		$page_summary_fields_sum["data"][$i]['fieldId'] = $i+1;
		if ($page_summary_fields_sum["data"][$i]["show"]) {
			if ($i==0) {
				$page_summary_fields_sum["data"][$i]["first_field_flag"] = true;
			} elseif ($page_summary_fields_sum["data"][$i]["sum"]) {
				$page_summary_fields_sum["data"][$i]["sum_field_flag"] = true;
			}  else {
				$page_summary_fields_sum["data"][$i]["default_flag"] = true;
			}
		}
	}
}
// avg - page summary
if ($rpt_array['miscellaneous']['type'] == "align") {
	for ($i=0; $i < count($arr_not_group_fields); $i++) {
		$page_summary_fields_avg["data"][$i] = $arr_not_group_fields[$i];
		$page_summary_fields_avg["data"][$i]['fieldId'] = $i+1;
		if ($i==0) {
			$page_summary_fields_avg["data"][$i]["first_field_flag"] = true;
		}
		if ($page_summary_fields_avg["data"][$i]["avg"]) {
			$page_summary_fields_avg["data"][$i]["avg_field_flag"] = true;
		}
	}
} else {
	for ($i=0; $i < count($arr_page_order_fields["data"]); $i++) {
		$page_summary_fields_avg["data"][$i] = $arr_page_order_fields["data"][$i];
		$page_summary_fields_avg["data"][$i]['fieldId'] = $i+1;
		if ($page_summary_fields_avg["data"][$i]["show"]) {
			if ($i==0) {
				$page_summary_fields_avg["data"][$i]["first_field_flag"] = true;
			} elseif ($page_summary_fields_avg["data"][$i]["avg"]) {
				$page_summary_fields_avg["data"][$i]["avg_field_flag"] = true;
			}  else {
				$page_summary_fields_avg["data"][$i]["default_flag"] = true;
			}
		}
	}
}
// min - page summary
if ($rpt_array['miscellaneous']['type'] == "align") {
	for ($i=0; $i < count($arr_not_group_fields); $i++) {
		$page_summary_fields_min["data"][$i] = $arr_not_group_fields[$i];
		$page_summary_fields_min["data"][$i]['fieldId'] = $i+1;
		if ($i==0) {
			$page_summary_fields_min["data"][$i]["first_field_flag"] = true;
		}
		if ($page_summary_fields_min["data"][$i]["min"]) {
			$page_summary_fields_min["data"][$i]["min_field_flag"] = true;
		}
	}
} else {
	for ($i=0; $i < count($arr_page_order_fields["data"]); $i++) {
		$page_summary_fields_min["data"][$i] = $arr_page_order_fields["data"][$i];
		$page_summary_fields_min["data"][$i]['fieldId'] = $i+1;
		if ($page_summary_fields_min["data"][$i]["show"]) {
			if ($i==0) {
				$page_summary_fields_min["data"][$i]["first_field_flag"] = true;
			} elseif ($page_summary_fields_min["data"][$i]["min"]) {
				$page_summary_fields_min["data"][$i]["min_field_flag"] = true;
			}  else {
				$page_summary_fields_min["data"][$i]["default_flag"] = true;
			}
		}
	}
}
// max - page summary
if ($rpt_array['miscellaneous']['type'] == "align") {
	for ($i=0; $i < count($arr_not_group_fields); $i++) {
		$page_summary_fields_max["data"][$i] = $arr_not_group_fields[$i];
		$page_summary_fields_max["data"][$i]['fieldId'] = $i+1;
		if ($i==0) {
			$page_summary_fields_max["data"][$i]["first_field_flag"] = true;
		}
		if ($page_summary_fields_max["data"][$i]["max"]) {
			$page_summary_fields_max["data"][$i]["max_field_flag"] = true;
		}
	}
} else {
	for ($i=0; $i < count($arr_page_order_fields["data"]); $i++) {
		$page_summary_fields_max["data"][$i] = $arr_page_order_fields["data"][$i];
		$page_summary_fields_max["data"][$i]['fieldId'] = $i+1;
		if ($page_summary_fields_max["data"][$i]["show"]) {
			if ($i==0) {
				$page_summary_fields_max["data"][$i]["first_field_flag"] = true;
			} elseif ($page_summary_fields_max["data"][$i]["max"]) {
				$page_summary_fields_max["data"][$i]["max_field_flag"] = true;
			}  else {
				$page_summary_fields_max["data"][$i]["default_flag"] = true;
			}
		}
	}
}
$xt->assignbyref("page_summary_fields_sum", $page_summary_fields_sum);
$xt->assignbyref("page_summary_fields_avg", $page_summary_fields_avg);
$xt->assignbyref("page_summary_fields_min", $page_summary_fields_min);
$xt->assignbyref("page_summary_fields_max", $page_summary_fields_max);
/*end this part*/

$grid_row=array();
$grid_row["data"]= &$rowinfo;
$xt->assignbyref("grid_row",$grid_row);

$strSQL=$_SESSION[$sessPrefix."_sql"];

$preview="";
if(postvalue("param")=="preview")
	$preview="_preview";
	
switch ( $rpt_array['miscellaneous']['type'] ) {
	case "stepped" :
	$templatefile = "dreport".$preview.".htm";
	break;
	case "block" :
	$templatefile = "dreport1".$preview.".htm";
	break;
	case "outline" :
	$templatefile = "dreport2".$preview.".htm";
	break;
	case "align" :
	$templatefile = "dreport3".$preview.".htm";
	break;
	case "tabular" :
	$templatefile = "dreport6".$preview.".htm";
	break;
	default :
	$templatefile = "dreport".$preview.".htm";
	break;
}

if($modePrint)
	$templatefile= str_replace("report","print",$templatefile);
$xt->assign("grid_block", true);
if($modePrint)
{
	if (@$_REQUEST["format"])
	{
		$cssdata = myfile_get_contents(getabspath("include/style.css"), "r");
		$xt->assign("cssdata",$cssdata);
		$xt->assign("stylesheetlink",false);
	}
	else
	{
		$xt->assign("cssdata","");
		$xt->assign("stylesheetlink",true);	
	}
}
$xt->assign("report_name_preview",$_SESSION['webreports']['settings']['name']);

$xt->assign("style_block", true);
$xt->assign("bottom_pagination_block", true);
$xt->assign("records_display_block", true);
$xt->assign("top_menu_block", true);

$xt->assign("editor_style_block", false);
$xt->assign("editor_block", false);

if(!$editmode)
{
	if(function_exists("BeforeShowReport"))
		BeforeShowReport($xt,$templatefile);
	$xt->display($templatefile);
}
else
{
	$xt->assign("bottom_pagination_block", false);
	$xt->assign("records_display_block", false);
	$xt->assign("top_menu_block", false);

	$xt->assign("editor_style_block", true);
	$xt->assign("editor_block", true);
		$xt->assign("legend_disp",true);

	$xt->display($templatefile);
}

function GetGroupStart($field,$value) {
	global $rpt_array,$tbl;

	for ( $i=0; $i < count($rpt_array['group_fields'])-1; $i++ ) 
	{
		$arr = $rpt_array['group_fields'][$i];
		foreach ( $rpt_array['totals'] as $fld ) 
		{
			if ( $arr['name'] == fldname($fld) ) 
			{
				$ftype=WRGetFieldType($fld['table'].".".$fld['name']);
				if ( $field == $arr['name'] )
				{
					if ( $arr['int_type'] == 0 ) {
						return $value;
					} elseif ( IsNumberType($ftype) ) {
						return $value-($value%$arr['int_type']);
					} elseif ( IsCharType( $ftype ) ) {
						return substr($value,0,$arr['int_type']);
					} elseif ( IsDateFieldType( $ftype ) ) {
						$tm = db2time($value);
						if(!count($tm))
							return "";
						if ( $arr['int_type'] == 1 ) { // DATE_INTERVAL_YEAR
							return $tm[0];
						} elseif ( $arr['int_type'] == 2 ) { // DATE_INTERVAL_QUARTER
							return $tm[0]*4+floor($tm[1]/3);
						} elseif ( $arr['int_type'] == 3 ) { // DATE_INTERVAL_MONTH
							return $tm[0]*12+$tm[1];
						} elseif ( $arr['int_type'] == 4 ) { // DATE_INTERVAL_WEEK
							return getweeknumber($tm);
						} elseif ( $arr['int_type'] == 5 ) { // DATE_INTERVAL_DAY
							return ($tm[0]*12+$tm[1])*31+$tm[2];
						} elseif ( $arr['int_type'] == 6 ) { // DATE_INTERVAL_HOUR
							return (($tm[0]*12+$tm[1])*31+$tm[2])*24+$tm[3];
						} elseif ( $arr['int_type'] == 7 ) { // DATE_INTERVAL_MINUTE
							return ((($tm[0]*12+$tm[1])*31+$tm[2])*24+$tm[3])*60+$tm[4];
						} else {
							return $value;
						}
					}
				}
			}
		}
	}
}

function GetGroupDisplay($field,$value) {
	global $locale_info, $rpt_array, $tbl;

	for ( $i=0; $i < count($rpt_array['group_fields'])-1; $i++ ) {
		$arr = $rpt_array['group_fields'][$i];
		foreach ( $rpt_array['totals'] as $fld ) 
		{
			if ( $arr['name'] == fldname($fld) ) 
			{
				$ftype=WRGetFieldType($fld['table'].".".$fld['name']);
				if ( $field == $arr['name'] )
				{
					if ( $arr['int_type'] == 0 ) {
						return $value;
					} elseif ( IsNumberType( $ftype ) ) {
						$start=$value-($value%$arr['int_type']);
						$end=$start+$arr['int_type'];
						return $start." - ".$end;
					} elseif ( IsCharType( $ftype ) ) {
						return substr($value,0,$arr['int_type']);
					} elseif ( IsDateFieldType( $ftype ) ) {
						$tm = db2time($value);
						if(!count($tm))
							return "";
						if ( $arr['int_type'] == 1 ) { // DATE_INTERVAL_YEAR
							return $tm[0];
						} elseif ( $arr['int_type'] == 2 ) { // DATE_INTERVAL_QUARTER
							return $tm[0]."/Q".floor(($tm[1]-1)/4+1);
						} elseif ( $arr['int_type'] == 3 ) { // DATE_INTERVAL_MONTH
							return @$locale_info["LOCALE_SABBREVMONTHNAME".$tm[1]]." ".$tm[0];
						} elseif ( $arr['int_type'] == 4 ) { // DATE_INTERVAL_WEEK
							$start = getweekstart($tm);
							$end = adddays($start,6);
							return format_shortdate($start)." - ".format_shortdate($end);
						} elseif ( $arr['int_type'] == 5 ) { // DATE_INTERVAL_DAY
							return format_shortdate($tm);
						} elseif ( $arr['int_type'] == 6 ) { // DATE_INTERVAL_HOUR
							$tm[4]=0;
							$tm[5]=0;
							return str_format_datetime($tm);
						} elseif ( $arr['int_type'] == 7 ) { // DATE_INTERVAL_MINUTE
							$tm[5]=0;
							return str_format_datetime($tm);
						} else {
							return str_format_datetime($tm);
						}
					}
				}
			}
		}
	}
}

function testAgr( $array, $avg="", $min="", $max="", $sum="" ) {
	$cnt = 0;

	foreach ( $array as $arr ) {
		if ( $avg == "" && $min == "" && $max == "" && $sum == "" ) {
			$cnt += ( $arr["show"] ) ? 1 : 0;
		} elseif ( $avg == "" && $min == "" && $sum == "" ) {
			$cnt += ( $arr["show"] && $arr["max"] ) ? 1 : 0;
		} elseif ( $avg == "" && $max == "" && $sum == "" ) {
			$cnt += ( $arr["show"] && $arr["min"] ) ? 1 : 0;
		} elseif ( $max == "" && $min == "" && $sum == "" ) {
			$cnt += ( $arr["show"] && $arr["avg"] ) ? 1 : 0;
		}  elseif ( $avg == "" && $min == "" && $max == "" ) {
			$cnt += ( $arr["show"] && $arr["sum"] ) ? 1 : 0;
		} elseif ( $avg == "" && $min == "" ) {
			$cnt += ( $arr["show"] && ( $arr["max"] || $arr["sum"] ) ) ? 1 : 0;
		} elseif ( $min == "" && $max == "" ) {
			$cnt += ( $arr["show"] && ( $arr["avg"] || $arr["sum"] ) ) ? 1 : 0;
		}  elseif ( $max == "" && $sum == "" ) {
			$cnt += ( $arr["show"] && ( $arr["avg"] || $arr["min"] ) ) ? 1 : 0;
		} elseif ( $avg == "" && $sum == "" ) {
			$cnt += ( $arr["show"] && ( $arr["min"] || $arr["max"] ) ) ? 1 : 0;
		} elseif ( $avg == "" && $max == "" ) {
			$cnt += ( $arr["show"] && ( $arr["min"] || $arr["sum"] ) ) ? 1 : 0;
		} elseif ( $sum == "" && $min == "" ) {
			$cnt += ( $arr["show"] && ( $arr["max"] || $arr["avg"] ) ) ? 1 : 0;
		} elseif ( $avg == "" ) {
			$cnt += ( $arr["show"] && ( $arr["min"] || $arr["max"] || $arr["sum"] ) ) ? 1 : 0;
		} elseif ( $min == "" ) {
			$cnt += ( $arr["show"] && ( $arr["avg"] || $arr["max"] || $arr["sum"] ) ) ? 1 : 0;
		} elseif ( $max == "" ) {
			$cnt += ( $arr["show"] && ( $arr["avg"] || $arr["min"] || $arr["sum"] ) ) ? 1 : 0;
		} elseif ( $sum == "" ) {
			$cnt += ( $arr["show"] && ( $arr["avg"] || $arr["min"] || $arr["max"] ) ) ? 1 : 0;
		} else {
			$cnt += ( $arr["show"] && ( $arr["avg"] || $arr["min"] || $arr["max"] ) ) ? 1 : 0;
		}
	}

	return $cnt;
}

function debug($val) {
	if (is_array($val)) {
		print_r($val);
	} else {
		echo $val."\n";
	}
}

function fldname(&$fld)
{
	global $rpt_array;
	if($rpt_array['db-based'])
		return $fld["table"].".".$fld["name"];
	else
		return $fld["name"];
}

function gfldname(&$fld)
{
	global $rpt_array;
	if($rpt_array['db-based'])
		return GoodFieldName(fldname($fld));
	return fldname($fld);
}


function db_fld_value(&$data,$field)
{
	global $rpt_array;
	if($rpt_array['db-based'])
		return $data[GoodFieldName($field)];
	return $data[$field];
}

function XMLNameEncode($strValue)
{	
	$search=array(" ","#","'","/","\\","(",")",",","[");
	$ret=str_replace($search,"",$strValue);
	$search=array("]","+","\"","-","_","|","}","{","=");
	$ret=str_replace($search,"",$ret);
	return $ret;
}

function PrepareForExcel($str)
{
	$ret = htmlspecialchars($str);
	if (substr($ret,0,1)== "=") 
		$ret = "&#61;".substr($ret,1);
	return $ret;

}

?>