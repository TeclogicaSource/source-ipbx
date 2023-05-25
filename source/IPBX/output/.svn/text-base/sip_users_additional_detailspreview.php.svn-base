<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 

include("include/sip_users_additional_variables.php");

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

if($mastertable=="sip_users")
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
		$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_additional"]));

	
	//	trc_piloto - 
		    $value="";
				$value=DisplayLookupWizard("trc_piloto",$data["trc_piloto"],$data,$keylink,MODE_PRINT);
			$row["trc_piloto_value"]=$value;
	//	mail - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"mail", ""),"field=mail".$keylink,"",MODE_PRINT);
			$row["mail_value"]=$value;
	//	call_forward - 
		    $value="";
				$value=DisplayLookupWizard("call_forward",$data["call_forward"],$data,$keylink,MODE_PRINT);
			$row["call_forward_value"]=$value;
	//	flg_fax - Checkbox
		    $value="";
				$value = GetData($data,"flg_fax", "Checkbox");
			$row["flg_fax_value"]=$value;
	//	flg_grava - Checkbox
		    $value="";
				$value = GetData($data,"flg_grava", "Checkbox");
			$row["flg_grava_value"]=$value;
	$rowinfo[]=$row;
	}
	$xt->assign_loopsection("details_row",$rowinfo);
} else {
}
$xt->display("sip_users_additional_detailspreview.htm");
if($mode!="inline")
	echo "counterSeparator".postvalue("counter");
?>