<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 

include("include/cc_receptivo_filas_horario_desv_ramais_variables.php");

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

if($mastertable=="cc_receptivo_filas_horario_desv")
{
	$where ="";
		$where.= GetFullFieldName("id_desvio")."=".make_db_value("id_desvio",$_SESSION[$strTableName."_masterkey1"]);
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
		$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_desvio_prog"]));

	
	//	txt_referencia - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"txt_referencia", ""),"field=txt%5Freferencia".$keylink,"",MODE_PRINT);
			$row["txt_referencia_value"]=$value;
	//	hr_inicio_01 - Time
		    $value="";
				$value = ProcessLargeText(GetData($data,"hr_inicio_01", "Time"),"field=hr%5Finicio%5F01".$keylink,"",MODE_PRINT);
			$row["hr_inicio_01_value"]=$value;
	//	hr_fim_01 - Time
		    $value="";
				$value = ProcessLargeText(GetData($data,"hr_fim_01", "Time"),"field=hr%5Ffim%5F01".$keylink,"",MODE_PRINT);
			$row["hr_fim_01_value"]=$value;
	//	hr_inicio_02 - Time
		    $value="";
				$value = ProcessLargeText(GetData($data,"hr_inicio_02", "Time"),"field=hr%5Finicio%5F02".$keylink,"",MODE_PRINT);
			$row["hr_inicio_02_value"]=$value;
	//	hr_fim_02 - Time
		    $value="";
				$value = ProcessLargeText(GetData($data,"hr_fim_02", "Time"),"field=hr%5Ffim%5F02".$keylink,"",MODE_PRINT);
			$row["hr_fim_02_value"]=$value;
	//	hr_inicio_03 - Time
		    $value="";
				$value = ProcessLargeText(GetData($data,"hr_inicio_03", "Time"),"field=hr%5Finicio%5F03".$keylink,"",MODE_PRINT);
			$row["hr_inicio_03_value"]=$value;
	//	hr_fim_03 - Time
		    $value="";
				$value = ProcessLargeText(GetData($data,"hr_fim_03", "Time"),"field=hr%5Ffim%5F03".$keylink,"",MODE_PRINT);
			$row["hr_fim_03_value"]=$value;
	//	hr_inicio_04 - Time
		    $value="";
				$value = ProcessLargeText(GetData($data,"hr_inicio_04", "Time"),"field=hr%5Finicio%5F04".$keylink,"",MODE_PRINT);
			$row["hr_inicio_04_value"]=$value;
	//	hr_fim_04 - Time
		    $value="";
				$value = ProcessLargeText(GetData($data,"hr_fim_04", "Time"),"field=hr%5Ffim%5F04".$keylink,"",MODE_PRINT);
			$row["hr_fim_04_value"]=$value;
	$rowinfo[]=$row;
	}
	$xt->assign_loopsection("details_row",$rowinfo);
} else {
}
$xt->display("cc_receptivo_filas_horario_desv_ramais_detailspreview.htm");
if($mode!="inline")
	echo "counterSeparator".postvalue("counter");
?>