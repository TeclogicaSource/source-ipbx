<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 

include("include/horario_variables.php");

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

if($mastertable=="sip_buddies_horario")
{
	$where ="";
		$where.= GetFullFieldName("id_horario")."=".make_db_value("id_horario",$_SESSION[$strTableName."_masterkey1"]);
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
		$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_horario"]));

	
	//	hr_inicio - Time
		    $value="";
				$value = ProcessLargeText(GetData($data,"hr_inicio", "Time"),"field=hr%5Finicio".$keylink,"",MODE_PRINT);
			$row["hr_inicio_value"]=$value;
	//	hr_fim - Time
		    $value="";
				$value = ProcessLargeText(GetData($data,"hr_fim", "Time"),"field=hr%5Ffim".$keylink,"",MODE_PRINT);
			$row["hr_fim_value"]=$value;
	//	seg - Checkbox
		    $value="";
				$value = GetData($data,"seg", "Checkbox");
			$row["seg_value"]=$value;
	//	ter - Checkbox
		    $value="";
				$value = GetData($data,"ter", "Checkbox");
			$row["ter_value"]=$value;
	//	qua - Checkbox
		    $value="";
				$value = GetData($data,"qua", "Checkbox");
			$row["qua_value"]=$value;
	//	qui - Checkbox
		    $value="";
				$value = GetData($data,"qui", "Checkbox");
			$row["qui_value"]=$value;
	//	sex - Checkbox
		    $value="";
				$value = GetData($data,"sex", "Checkbox");
			$row["sex_value"]=$value;
	//	sab - Checkbox
		    $value="";
				$value = GetData($data,"sab", "Checkbox");
			$row["sab_value"]=$value;
	//	dom - Checkbox
		    $value="";
				$value = GetData($data,"dom", "Checkbox");
			$row["dom_value"]=$value;
	//	dsc_horario - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"dsc_horario", ""),"field=dsc%5Fhorario".$keylink,"",MODE_PRINT);
			$row["dsc_horario_value"]=$value;
	$rowinfo[]=$row;
	}
	$xt->assign_loopsection("details_row",$rowinfo);
} else {
}
$xt->display("horario_detailspreview.htm");
if($mode!="inline")
	echo "counterSeparator".postvalue("counter");
?>