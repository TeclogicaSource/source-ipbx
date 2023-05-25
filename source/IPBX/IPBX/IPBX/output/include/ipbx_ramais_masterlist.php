<?php
include(getabspath("include/ipbx_ramais_settings.php"));

function DisplayMasterTableInfo_ipbx_ramais($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	$oldTableName=$strTableName;
	$strTableName="ipbx_ramais";

//$strSQL = "SELECT  id,  name,  accountcode,  `call-limit`,  callgroup,  callerid,  context,  secret,  allow,  id_horario,  mail,  grava_chamada,  Transbordo,  id_interf,  ident_interf,  tp_ramal,  tp_chamada,  pickupgroup,  flg_cadeado,  desvio,  id_pesquisa,  desvio_ddr,  id_saida,  id_desvio,  flg_info_centrocusto,  id_painel_op  FROM ipbx_ramais  WHERE (name <> \"admin\")  ORDER BY name  ";

$sqlHead="SELECT id,  name,  accountcode,  `call-limit`,  callgroup,  callerid,  context,  secret,  allow,  id_horario,  mail,  grava_chamada,  Transbordo,  id_interf,  ident_interf,  tp_ramal,  tp_chamada,  pickupgroup,  flg_cadeado,  desvio,  id_pesquisa,  desvio_ddr,  id_saida,  id_desvio,  flg_info_centrocusto,  id_painel_op";
$sqlFrom="FROM ipbx_ramais";
$sqlWhere="(name <> \"admin\")";
$sqlTail="";

$where="";
$mKeys = array();
$showKeys = "";

if($detailtable=="ipbx_disp_mobile")
{
		$where.= GetFullFieldName("name")."=".make_db_value("name",$keys[1-1]);
	$showKeys .= " Ramal: ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
}
	if(!$where)
	{
		$strTableName=$oldTableName;
		return;
	}
	$str = SecuritySQL("Search");
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
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id"]));
	


//	name - 
			$value="";
				$value = ProcessLargeText(GetData($data,"name", ""),"field=name".$keylink);
			$xt->assign("name_mastervalue",$value);

//	accountcode - 
			$value="";
				$value=DisplayLookupWizard("accountcode",$data["accountcode"],$data,$keylink,MODE_LIST);
			$xt->assign("accountcode_mastervalue",$value);

//	call-limit - 
			$value="";
				$value = ProcessLargeText(GetData($data,"call-limit", ""),"field=call%2Dlimit".$keylink);
			$xt->assign("call_limit_mastervalue",$value);

//	callerid - 
			$value="";
				$value = ProcessLargeText(GetData($data,"callerid", ""),"field=callerid".$keylink);
			$xt->assign("callerid_mastervalue",$value);

//	context - 
			$value="";
				$value=DisplayLookupWizard("context",$data["context"],$data,$keylink,MODE_LIST);
			$xt->assign("context_mastervalue",$value);

//	secret - 
			$value="";
				$value = ProcessLargeText(GetData($data,"secret", ""),"field=secret".$keylink);
			$xt->assign("secret_mastervalue",$value);

//	allow - 
			$value="";
				$value = ProcessLargeText(GetData($data,"allow", ""),"field=allow".$keylink);
			$xt->assign("allow_mastervalue",$value);

//	id_horario - 
			$value="";
				$value=DisplayLookupWizard("id_horario",$data["id_horario"],$data,$keylink,MODE_LIST);
			$xt->assign("id_horario_mastervalue",$value);

//	mail - 
			$value="";
				$value = ProcessLargeText(GetData($data,"mail", ""),"field=mail".$keylink);
			$xt->assign("mail_mastervalue",$value);

//	grava_chamada - Checkbox
			$value="";
				$value = GetData($data,"grava_chamada", "Checkbox");
			$xt->assign("grava_chamada_mastervalue",$value);

//	Transbordo - 
			$value="";
				$value = ProcessLargeText(GetData($data,"Transbordo", ""),"field=Transbordo".$keylink);
			$xt->assign("Transbordo_mastervalue",$value);

//	id_interf - 
			$value="";
				$value=DisplayLookupWizard("id_interf",$data["id_interf"],$data,$keylink,MODE_LIST);
			$xt->assign("id_interf_mastervalue",$value);

//	ident_interf - 
			$value="";
				$value=DisplayLookupWizard("ident_interf",$data["ident_interf"],$data,$keylink,MODE_LIST);
			$xt->assign("ident_interf_mastervalue",$value);

//	tp_ramal - 
			$value="";
				$value = ProcessLargeText(GetData($data,"tp_ramal", ""),"field=tp%5Framal".$keylink);
			$xt->assign("tp_ramal_mastervalue",$value);

//	tp_chamada - 
			$value="";
				$value = ProcessLargeText(GetData($data,"tp_chamada", ""),"field=tp%5Fchamada".$keylink);
			$xt->assign("tp_chamada_mastervalue",$value);

//	pickupgroup - 
			$value="";
				$value=DisplayLookupWizard("pickupgroup",$data["pickupgroup"],$data,$keylink,MODE_LIST);
			$xt->assign("pickupgroup_mastervalue",$value);

//	flg_cadeado - Checkbox
			$value="";
				$value = GetData($data,"flg_cadeado", "Checkbox");
			$xt->assign("flg_cadeado_mastervalue",$value);

//	desvio - 
			$value="";
				$value = ProcessLargeText(GetData($data,"desvio", ""),"field=desvio".$keylink);
			$xt->assign("desvio_mastervalue",$value);

//	id_pesquisa - 
			$value="";
				$value=DisplayLookupWizard("id_pesquisa",$data["id_pesquisa"],$data,$keylink,MODE_LIST);
			$xt->assign("id_pesquisa_mastervalue",$value);

//	desvio_ddr - 
			$value="";
				$value=DisplayLookupWizard("desvio_ddr",$data["desvio_ddr"],$data,$keylink,MODE_LIST);
			$xt->assign("desvio_ddr_mastervalue",$value);

//	id_saida - 
			$value="";
				$value = ProcessLargeText(GetData($data,"id_saida", ""),"field=id%5Fsaida".$keylink);
			$xt->assign("id_saida_mastervalue",$value);

//	id_desvio - 
			$value="";
				$value=DisplayLookupWizard("id_desvio",$data["id_desvio"],$data,$keylink,MODE_LIST);
			$xt->assign("id_desvio_mastervalue",$value);

//	flg_info_centrocusto - Checkbox
			$value="";
				$value = GetData($data,"flg_info_centrocusto", "Checkbox");
			$xt->assign("flg_info_centrocusto_mastervalue",$value);

//	id_painel_op - 
			$value="";
				$value=DisplayLookupWizard("id_painel_op",$data["id_painel_op"],$data,$keylink,MODE_LIST);
			$xt->assign("id_painel_op_mastervalue",$value);
	$strTableName=$oldTableName;
	$xt->display("ipbx_ramais_masterlist.htm");
}

// events

?>