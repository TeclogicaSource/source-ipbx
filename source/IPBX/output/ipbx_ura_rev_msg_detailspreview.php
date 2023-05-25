<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 

include("include/ipbx_ura_rev_msg_variables.php");

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

if($mastertable=="ipbx_pesquisa_ura_rev")
{
	$where ="";
		$where.= GetFullFieldName("id_pesquisa")."=".make_db_value("id_pesquisa",$_SESSION[$strTableName."_masterkey1"]);
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
		$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_ipbx_ura_rev_msg"]));

	
	//	arq_audio - Document Download
		    $value="";
				$value = GetData($data,"arq_audio", "Document Download");
			$row["arq_audio_value"]=$value;
	//	opc_resp - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"opc_resp", ""),"field=opc%5Fresp".$keylink,"",MODE_PRINT);
			$row["opc_resp_value"]=$value;
	//	dsc_mensagem - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"dsc_mensagem", ""),"field=dsc%5Fmensagem".$keylink,"",MODE_PRINT);
			$row["dsc_mensagem_value"]=$value;
	//	id_pesquisa - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"id_pesquisa", ""),"field=id%5Fpesquisa".$keylink,"",MODE_PRINT);
			$row["id_pesquisa_value"]=$value;
	//	ref0 - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"ref0", ""),"field=ref0".$keylink,"",MODE_PRINT);
			$row["ref0_value"]=$value;
	//	ref1 - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"ref1", ""),"field=ref1".$keylink,"",MODE_PRINT);
			$row["ref1_value"]=$value;
	//	ref3 - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"ref3", ""),"field=ref3".$keylink,"",MODE_PRINT);
			$row["ref3_value"]=$value;
	//	ref4 - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"ref4", ""),"field=ref4".$keylink,"",MODE_PRINT);
			$row["ref4_value"]=$value;
	//	ref5 - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"ref5", ""),"field=ref5".$keylink,"",MODE_PRINT);
			$row["ref5_value"]=$value;
	//	ref6 - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"ref6", ""),"field=ref6".$keylink,"",MODE_PRINT);
			$row["ref6_value"]=$value;
	//	ref7 - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"ref7", ""),"field=ref7".$keylink,"",MODE_PRINT);
			$row["ref7_value"]=$value;
	//	ref8 - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"ref8", ""),"field=ref8".$keylink,"",MODE_PRINT);
			$row["ref8_value"]=$value;
	//	ref9 - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"ref9", ""),"field=ref9".$keylink,"",MODE_PRINT);
			$row["ref9_value"]=$value;
	//	ref2 - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"ref2", ""),"field=ref2".$keylink,"",MODE_PRINT);
			$row["ref2_value"]=$value;
	//	nr_ordem - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"nr_ordem", ""),"field=nr%5Fordem".$keylink,"",MODE_PRINT);
			$row["nr_ordem_value"]=$value;
	$rowinfo[]=$row;
	}
	$xt->assign_loopsection("details_row",$rowinfo);
} else {
}
$xt->display("ipbx_ura_rev_msg_detailspreview.htm");
if($mode!="inline")
	echo "counterSeparator".postvalue("counter");
?>