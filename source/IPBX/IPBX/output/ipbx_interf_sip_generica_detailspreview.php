<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 

include("include/ipbx_interf_sip_generica_variables.php");

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

if($mastertable=="central")
{
	$where ="";
		$where.= GetFullFieldName("id_central")."=".make_db_value("id_central",$_SESSION[$strTableName."_masterkey1"]);
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
		$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_interf"]));
		$keylink.="&key2=".htmlspecialchars(rawurlencode(@$data["id_central"]));

	
	//	dsc_interf - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"dsc_interf", ""),"field=dsc%5Finterf".$keylink,"",MODE_PRINT);
			$row["dsc_interf_value"]=$value;
	//	id_contrato - 
		    $value="";
				$value=DisplayLookupWizard("id_contrato",$data["id_contrato"],$data,$keylink,MODE_PRINT);
			$row["id_contrato_value"]=$value;
	//	usuario - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"usuario", ""),"field=usuario".$keylink,"",MODE_PRINT);
			$row["usuario_value"]=$value;
	//	senha - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"senha", ""),"field=senha".$keylink,"",MODE_PRINT);
			$row["senha_value"]=$value;
	//	ip_host - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"ip_host", ""),"field=ip%5Fhost".$keylink,"",MODE_PRINT);
			$row["ip_host_value"]=$value;
	//	id_central - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"id_central", ""),"field=id%5Fcentral".$keylink,"",MODE_PRINT);
			$row["id_central_value"]=$value;
	//	codec - 
		    $value="";
				$value=DisplayLookupWizard("codec",$data["codec"],$data,$keylink,MODE_PRINT);
			$row["codec_value"]=$value;
	//	id_tp_interf - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"id_tp_interf", ""),"field=id%5Ftp%5Finterf".$keylink,"",MODE_PRINT);
			$row["id_tp_interf_value"]=$value;
	//	tp_chamada - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"tp_chamada", ""),"field=tp%5Fchamada".$keylink,"",MODE_PRINT);
			$row["tp_chamada_value"]=$value;
	//	piloto - 
		    $value="";
				$value=DisplayLookupWizard("piloto",$data["piloto"],$data,$keylink,MODE_PRINT);
			$row["piloto_value"]=$value;
	//	id_chamada - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"id_chamada", ""),"field=id%5Fchamada".$keylink,"",MODE_PRINT);
			$row["id_chamada_value"]=$value;
	//	flg_id_cham_parc - Checkbox
		    $value="";
				$value = GetData($data,"flg_id_cham_parc", "Checkbox");
			$row["flg_id_cham_parc_value"]=$value;
	//	cd_operadora - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"cd_operadora", ""),"field=cd%5Foperadora".$keylink,"",MODE_PRINT);
			$row["cd_operadora_value"]=$value;
	//	flg_logon_remoto - Checkbox
		    $value="";
				$value = GetData($data,"flg_logon_remoto", "Checkbox");
			$row["flg_logon_remoto_value"]=$value;
	//	registro - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"registro", ""),"field=registro".$keylink,"",MODE_PRINT);
			$row["registro_value"]=$value;
	//	pers_params - 
		    $value="";
				$value = ProcessLargeText(GetData($data,"pers_params", ""),"field=pers%5Fparams".$keylink,"",MODE_PRINT);
			$row["pers_params_value"]=$value;
	$rowinfo[]=$row;
	}
	$xt->assign_loopsection("details_row",$rowinfo);
} else {
}
$xt->display("ipbx_interf_sip_generica_detailspreview.htm");
if($mode!="inline")
	echo "counterSeparator".postvalue("counter");
?>