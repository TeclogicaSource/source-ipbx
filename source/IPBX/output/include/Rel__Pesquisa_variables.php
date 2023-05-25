<?php
$strTableName="Rel. Pesquisa";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_ura_rev";

$gstrOrderBy="ORDER BY ipur.id_pesquisa, iur.dt_resp, iurm.nr_ordem";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(7, (1 ? "ASC" : "DESC"), "ipur.id_pesquisa");
$g_orderindexes[] = array(6, (1 ? "ASC" : "DESC"), "iur.dt_resp");
$g_orderindexes[] = array(8, (1 ? "ASC" : "DESC"), "iurm.nr_ordem");
$gsqlHead="select ipur.dsc_pesquisa,  iurm.dsc_mensagem,  iur.nm_telefone,  iur.nm_ramal,  iur.resp_usuario,  iur.dt_resp,  ipur.id_pesquisa AS `ipur.id_pesquisa`,  iurm.nr_ordem AS `iurm.nr_ordem`,  case iur.resp_usuario  when 0 then iurm.ref0  when 1 then iurm.ref1  when 2 then iurm.ref2  when 3 then iurm.ref3  when 4 then iurm.ref4  when 5 then iurm.ref5  when 6 then iurm.ref6  when 7 then iurm.ref7  when 8 then iurm.ref8  when 9 then iurm.ref9  end as Resposta";
$gsqlFrom="FROM ipbx_ura_rev_msg AS iurm,  ipbx_pesquisa_ura_rev AS ipur,  ipbx_ura_rev AS iur";
$gsqlWhereExpr="(iurm.id_ipbx_ura_rev_msg = iur.id_msg) AND (iurm.id_pesquisa = ipur.id_pesquisa)";
$gsqlTail="";

include(getabspath("include/Rel__Pesquisa_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel__Pesquisa;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>