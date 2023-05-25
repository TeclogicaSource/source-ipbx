<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 

include("include/sip_users_variables.php");

$mode=postvalue("mode");

if(!@$_SESSION["UserID"])
{ 
	return;
}
if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
{
	return;
}

include('include/xtempl.php');
$xt = new Xtempl();


$recordsCounter = 0;

//	process masterkey value
$mastertable=postvalue("mastertable");
if($mastertable!="")
{
	$_SESSION[$strTableName."_mastertable"]=$mastertable;
//	copy keys to session
	$i=1;
	while(isset($_REQUEST["masterkey".$i]))
	{
		$_SESSION[$strTableName."_masterkey".$i]=$_REQUEST["masterkey".$i];
		$i++;
	}
	if(isset($_SESSION[$strTableName."_masterkey".$i]))
		unset($_SESSION[$strTableName."_masterkey".$i]);
}
else
	$mastertable=$_SESSION[$strTableName."_mastertable"];

//$strSQL = $gstrSQL;

if($mastertable=="sip_users_additional")
{
	$where ="";
		$where.= GetFullFieldName("name")."=".make_db_value("name",$_SESSION[$strTableName."_masterkey1"]);
}


$str = SecuritySQL("Search");
if(strlen($str))
	$where.=" and ".$str;
$strSQL = gSQLWhere($where);

$strSQL.=" ".$gstrOrderBy;

$rowcount=gSQLRowCount($where,0);

$xt->assign("row_count",$rowcount);
if ( $rowcount ) {
	$xt->assign("details_data",true);
	$rs=db_query($strSQL,$conn);

	$display_count=10;
	if($mode=="inline")
		$display_count*=2;
	if($rowcount>$display_count+2)
	{
		$xt->assign("display_first",true);
		$xt->assign("display_count",$display_count);
	}
	else
		$display_count = $rowcount;

	$rowinfo=array();
		
	while (($data = db_fetch_array($rs)) && $recordsCounter<$display_count) {
		$recordsCounter++;
		$row=array();
		$keylink="";
		$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id"]));

	
	//	id - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"id", ""),"field=id".$keylink,"",MODE_PRINT);
			$row["id_value"]=$value;
	//	name - 
		    $value="";
				$value=DisplayLookupWizard("name",$data["name"],$data,$keylink,MODE_PRINT);
			$row["name_value"]=$value;
	//	accountcode - 
		    $value="";
				$value=DisplayLookupWizard("accountcode",$data["accountcode"],$data,$keylink,MODE_PRINT);
			$row["accountcode_value"]=$value;
	//	call-limit - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"call-limit", ""),"field=call%2Dlimit".$keylink,"",MODE_PRINT);
			$row["call_limit_value"]=$value;
	//	callerid - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"callerid", ""),"field=callerid".$keylink,"",MODE_PRINT);
			$row["callerid_value"]=$value;
	//	context - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"context", ""),"field=context".$keylink,"",MODE_PRINT);
			$row["context_value"]=$value;
	//	pickupgroup - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"pickupgroup", ""),"field=pickupgroup".$keylink,"",MODE_PRINT);
			$row["pickupgroup_value"]=$value;
	//	regexten - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"regexten", ""),"field=regexten".$keylink,"",MODE_PRINT);
			$row["regexten_value"]=$value;
	//	allow - 
		    $value="";
				$value=DisplayLookupWizard("allow",$data["allow"],$data,$keylink,MODE_PRINT);
			$row["allow_value"]=$value;
	//	id_horario - 
		    $value="";
				$value=DisplayLookupWizard("id_horario",$data["id_horario"],$data,$keylink,MODE_PRINT);
			$row["id_horario_value"]=$value;
	$rowinfo[]=$row;
	}
	$xt->assign_loopsection("details_row",$rowinfo);
} else {
}
$xt->display("sip_users_detailspreview.htm");
if($mode!="inline")
	echo "counterSeparator".postvalue("counter");
?>