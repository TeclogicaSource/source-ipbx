<?php
include(getabspath("include/ipbx_interf_vono_settings.php"));

function DisplayMasterTableInfo_ipbx_interf_vono($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	
	$oldTableName=$strTableName;
	$strTableName="ipbx_interf_vono";

//$strSQL = "SELECT  id_interf,  dsc_interf,  id_contrato,  usuario,  senha,  ip_host,  id_central,  codec  FROM ipbx_interf_vono  ";

$sqlHead="SELECT id_interf,  dsc_interf,  id_contrato,  usuario,  senha,  ip_host,  id_central,  codec";
$sqlFrom="FROM ipbx_interf_vono";
$sqlWhere="";
$sqlTail="";

$where="";

if($detailtable=="central")
{
		$where.= GetFullFieldName("id_central")."=".make_db_value("id_central",$keys[1-1]);
}
if(!$where)
{
	$strTableName=$oldTableName;
	return;
}
	$str = SecuritySQL("Export");
	if(strlen($str))
		$where.=" and ".$str;
	
	$strWhere=whereAdd($sqlWhere,$where);
	if(strlen($strWhere))
		$strWhere=" where ".$strWhere." ";
	$strSQL= $sqlHead.' '.$sqlFrom.$strWhere.$sqlTail;

//	$strSQL=AddWhere($strSQL,$where);

	LogInfo($strSQL);
	$rs=db_query($strSQL,$conn);
	$data=db_fetch_array($rs);
	if(!$data)
	{
		$strTableName=$oldTableName;
		return;
	}
	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_interf"]));
	


//	id_interf - 
			$value="";
				$value = ProcessLargeText(GetData($data,"id_interf", ""),"field=id%5Finterf".$keylink,"",MODE_PRINT);
			$xt->assign("id_interf_mastervalue",$value);

//	dsc_interf - 
			$value="";
				$value = ProcessLargeText(GetData($data,"dsc_interf", ""),"field=dsc%5Finterf".$keylink,"",MODE_PRINT);
			$xt->assign("dsc_interf_mastervalue",$value);

//	id_contrato - 
			$value="";
				$value = ProcessLargeText(GetData($data,"id_contrato", ""),"field=id%5Fcontrato".$keylink,"",MODE_PRINT);
			$xt->assign("id_contrato_mastervalue",$value);

//	usuario - 
			$value="";
				$value = ProcessLargeText(GetData($data,"usuario", ""),"field=usuario".$keylink,"",MODE_PRINT);
			$xt->assign("usuario_mastervalue",$value);

//	senha - 
			$value="";
				$value = ProcessLargeText(GetData($data,"senha", ""),"field=senha".$keylink,"",MODE_PRINT);
			$xt->assign("senha_mastervalue",$value);

//	ip_host - 
			$value="";
				$value = ProcessLargeText(GetData($data,"ip_host", ""),"field=ip%5Fhost".$keylink,"",MODE_PRINT);
			$xt->assign("ip_host_mastervalue",$value);

//	id_central - 
			$value="";
				$value = ProcessLargeText(GetData($data,"id_central", ""),"field=id%5Fcentral".$keylink,"",MODE_PRINT);
			$xt->assign("id_central_mastervalue",$value);

//	codec - 
			$value="";
				$value = ProcessLargeText(GetData($data,"codec", ""),"field=codec".$keylink,"",MODE_PRINT);
			$xt->assign("codec_mastervalue",$value);
	$strTableName=$oldTableName;
	$xt->display("ipbx_interf_vono_masterprint.htm");

}

// events

?>