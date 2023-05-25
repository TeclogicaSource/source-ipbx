<?php

//	field labels
$fieldLabelsGr_fico___Centro_de_custo = array();
$fieldLabelsGr_fico___Centro_de_custo["Portuguese(Brazil)"]=array();
$fieldLabelsGr_fico___Centro_de_custo["Portuguese(Brazil)"]["id_conta"] = "Id Conta";
$fieldLabelsGr_fico___Centro_de_custo["Portuguese(Brazil)"]["origem"] = "Origem";
$fieldLabelsGr_fico___Centro_de_custo["Portuguese(Brazil)"]["destino"] = "Destino";
$fieldLabelsGr_fico___Centro_de_custo["Portuguese(Brazil)"]["custo"] = "Custo";
$fieldLabelsGr_fico___Centro_de_custo["Portuguese(Brazil)"]["Minutos"] = "Minutos";
$fieldLabelsGr_fico___Centro_de_custo["Portuguese(Brazil)"]["dt"] = "Data";
$fieldLabelsGr_fico___Centro_de_custo["Portuguese(Brazil)"]["uniqueid"] = "Uniqueid";
$fieldLabelsGr_fico___Centro_de_custo["Portuguese(Brazil)"]["id_interf"] = "Id Interf";
$fieldLabelsGr_fico___Centro_de_custo["Portuguese(Brazil)"]["id_contrato"] = "Id Contrato";
$fieldLabelsGr_fico___Centro_de_custo["Portuguese(Brazil)"]["dsc_centro_cust"] = "Dsc Centro Cust";
$fieldLabelsGr_fico___Centro_de_custo["Portuguese(Brazil)"]["Mes"] = "Mes";
$fieldLabelsGr_fico___Centro_de_custo["Portuguese(Brazil)"]["Ano"] = "Ano";


$tdataGr_fico___Centro_de_custo=array();
	$tdataGr_fico___Centro_de_custo[".ShortName"]="Gr_fico___Centro_de_custo";
	$tdataGr_fico___Centro_de_custo[".OwnerID"]="";
	$tdataGr_fico___Centro_de_custo[".OriginalTable"]="conta";
	$tdataGr_fico___Centro_de_custo[".NCSearch"]=true;
	
	$tdataGr_fico___Centro_de_custo[".ChartRefreshTime"] = 0;

$tdataGr_fico___Centro_de_custo[".shortTableName"] = "Gr_fico___Centro_de_custo";
$tdataGr_fico___Centro_de_custo[".dataSourceTable"] = "Graf. Centro de custo";
$tdataGr_fico___Centro_de_custo[".nSecOptions"] = 0;
$tdataGr_fico___Centro_de_custo[".nLoginMethod"] = 1;
$tdataGr_fico___Centro_de_custo[".recsPerRowList"] = 1;	
$tdataGr_fico___Centro_de_custo[".tableGroupBy"] = "1";
$tdataGr_fico___Centro_de_custo[".dbType"] = 0;
$tdataGr_fico___Centro_de_custo[".mainTableOwnerID"] = "";
$tdataGr_fico___Centro_de_custo[".moveNext"] = 1;

$tdataGr_fico___Centro_de_custo[".listAjax"] = true;

	$tdataGr_fico___Centro_de_custo[".audit"] = false;

	$tdataGr_fico___Centro_de_custo[".locking"] = false;
	
$tdataGr_fico___Centro_de_custo[".listIcons"] = true;




$tdataGr_fico___Centro_de_custo[".showSimpleSearchOptions"] = false;

$tdataGr_fico___Centro_de_custo[".showSearchPanel"] = true;


$tdataGr_fico___Centro_de_custo[".isUseAjaxSuggest"] = true;


$tdataGr_fico___Centro_de_custo[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataGr_fico___Centro_de_custo[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataGr_fico___Centro_de_custo[".isUseTimeForSearch"] = false;





$tdataGr_fico___Centro_de_custo[".isUseInlineJs"] = $tdataGr_fico___Centro_de_custo[".isUseInlineAdd"] || $tdataGr_fico___Centro_de_custo[".isUseInlineEdit"];

$tdataGr_fico___Centro_de_custo[".allSearchFields"] = array();

$tdataGr_fico___Centro_de_custo[".globSearchFields"][] = "Mes";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Mes", $tdataGr_fico___Centro_de_custo[".allSearchFields"]))
{
	$tdataGr_fico___Centro_de_custo[".allSearchFields"][] = "Mes";	
}
$tdataGr_fico___Centro_de_custo[".globSearchFields"][] = "Ano";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Ano", $tdataGr_fico___Centro_de_custo[".allSearchFields"]))
{
	$tdataGr_fico___Centro_de_custo[".allSearchFields"][] = "Ano";	
}


$tdataGr_fico___Centro_de_custo[".isDynamicPerm"] = true;

	

$tdataGr_fico___Centro_de_custo[".isDisplayLoading"] = true;

$tdataGr_fico___Centro_de_custo[".isResizeColumns"] = false;


$tdataGr_fico___Centro_de_custo[".createLoginPage"] = true;


 	



$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataGr_fico___Centro_de_custo[".strOrderBy"] = $gstrOrderBy;
	
$tdataGr_fico___Centro_de_custo[".orderindexes"] = array();

$tdataGr_fico___Centro_de_custo[".sqlHead"] = "SELECT conta.id_conta,  conta.origem,  conta.destino,  round(sum(custo)) AS custo,  round(sum(duracao/60)) AS Minutos,  DATE_FORMAT(calldate,'%m-%Y') AS dt,  DATE_FORMAT(calldate,'%m') AS Mes,  DATE_FORMAT(calldate,'%Y') AS Ano,  conta.uniqueid,  conta.id_interf,  conta.id_contrato,  centrocusto.dsc_centro_cust";

$tdataGr_fico___Centro_de_custo[".sqlFrom"] = "FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo";

$tdataGr_fico___Centro_de_custo[".sqlWhereExpr"] = "";

$tdataGr_fico___Centro_de_custo[".sqlTail"] = "GROUP BY DATE_FORMAT(calldate,'%m-%Y'), centrocusto.dsc_centro_cust";



	$tableKeys=array();
	$tdataGr_fico___Centro_de_custo[".Keys"]=$tableKeys;

	
//	id_conta
	$fdata = array();
	$fdata["strName"] = "id_conta";
	$fdata["ownerTable"] = "conta";
		$fdata["Label"]="Id Conta"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_conta";
		$fdata["FullName"]= "conta.id_conta";
						$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
									$tdataGr_fico___Centro_de_custo["id_conta"]=$fdata;
	
//	origem
	$fdata = array();
	$fdata["strName"] = "origem";
	$fdata["ownerTable"] = "conta";
		$fdata["Label"]="Origem"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "origem";
		$fdata["FullName"]= "conta.origem";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
									$tdataGr_fico___Centro_de_custo["origem"]=$fdata;
	
//	destino
	$fdata = array();
	$fdata["strName"] = "destino";
	$fdata["ownerTable"] = "conta";
		$fdata["Label"]="Destino"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "destino";
		$fdata["FullName"]= "conta.destino";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			
									$tdataGr_fico___Centro_de_custo["destino"]=$fdata;
	
//	custo
	$fdata = array();
	$fdata["strName"] = "custo";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Custo"; 
			$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Currency";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "custo";
		$fdata["FullName"]= "round(sum(custo))";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
									$tdataGr_fico___Centro_de_custo["custo"]=$fdata;
	
//	Minutos
	$fdata = array();
	$fdata["strName"] = "Minutos";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 14;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Minutos";
		$fdata["FullName"]= "round(sum(duracao/60))";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
									$tdataGr_fico___Centro_de_custo["Minutos"]=$fdata;
	
//	dt
	$fdata = array();
	$fdata["strName"] = "dt";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Data"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dt";
		$fdata["FullName"]= "DATE_FORMAT(calldate,'%m-%Y')";
						$fdata["Index"]= 6;
	 $fdata["DateEditType"]=13; 
			
									$tdataGr_fico___Centro_de_custo["dt"]=$fdata;
	
//	Mes
	$fdata = array();
	$fdata["strName"] = "Mes";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Mes";
		$fdata["FullName"]= "DATE_FORMAT(calldate,'%m')";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataGr_fico___Centro_de_custo["Mes"]=$fdata;
	
//	Ano
	$fdata = array();
	$fdata["strName"] = "Ano";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Ano";
		$fdata["FullName"]= "DATE_FORMAT(calldate,'%Y')";
						$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataGr_fico___Centro_de_custo["Ano"]=$fdata;
	
//	uniqueid
	$fdata = array();
	$fdata["strName"] = "uniqueid";
	$fdata["ownerTable"] = "conta";
		$fdata["Label"]="Uniqueid"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "uniqueid";
		$fdata["FullName"]= "conta.uniqueid";
						$fdata["Index"]= 9;
	
			$fdata["EditParams"]="";
			
									$tdataGr_fico___Centro_de_custo["uniqueid"]=$fdata;
	
//	id_interf
	$fdata = array();
	$fdata["strName"] = "id_interf";
	$fdata["ownerTable"] = "conta";
		$fdata["Label"]="Id Interf"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_interf";
		$fdata["FullName"]= "conta.id_interf";
						$fdata["Index"]= 10;
	
			$fdata["EditParams"]="";
			
									$tdataGr_fico___Centro_de_custo["id_interf"]=$fdata;
	
//	id_contrato
	$fdata = array();
	$fdata["strName"] = "id_contrato";
	$fdata["ownerTable"] = "conta";
		$fdata["Label"]="Id Contrato"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_contrato";
		$fdata["FullName"]= "conta.id_contrato";
						$fdata["Index"]= 11;
	
			$fdata["EditParams"]="";
			
									$tdataGr_fico___Centro_de_custo["id_contrato"]=$fdata;
	
//	dsc_centro_cust
	$fdata = array();
	$fdata["strName"] = "dsc_centro_cust";
	$fdata["ownerTable"] = "centrocusto";
		$fdata["Label"]="Dsc Centro Cust"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_centro_cust";
		$fdata["FullName"]= "centrocusto.dsc_centro_cust";
						$fdata["Index"]= 12;
	
			$fdata["EditParams"]="";
			
									$tdataGr_fico___Centro_de_custo["dsc_centro_cust"]=$fdata;

$tdataGr_fico___Centro_de_custo[".chartXml"] = '<chart>
<attr value="tables">
	<attr value="0">Graf. Centro de custo</attr>
</attr>
<attr value="chart_type">
	<attr value="type">2d_doughnut</attr>
</attr>

<attr value="parameters">
<attr value="0">
<attr value="name">custo</attr>
<attr value="currencyFormat">0</attr>
<attr value="decimalFormat">0</attr>
<attr value="customFormat">0</attr>
<attr value="customFormatStr"></attr>
</attr>
<attr value="1">
<attr value="name">dsc_centro_cust</attr>
</attr>
</attr>


<attr value="appearance">
	<attr value="scolor11">FF0000</attr>
	<attr value="scolor12">FF0000</attr>

<attr value="nameTypeHeader">Text</attr>
<attr value="nameTypeFooter">Text</attr>

<attr value="head">Gráfico de centro de custos</attr>

<attr value="foot"></attr>

<attr value="color51">49563A</attr>
<attr value="color52">49563A</attr>
<attr value="color61">49563A</attr>
<attr value="color62">49563A</attr>
<attr value="color71">C7CDC1</attr>
<attr value="color72">C7CDC1</attr>
<attr value="color81">ECF0E8</attr>
<attr value="color82">ECF0E8</attr>
<attr value="color91">68838B</attr>
<attr value="color92">68838B</attr>
<attr value="color101">48505A</attr>
<attr value="color102">48505A</attr>
<attr value="color111">45595F</attr>
<attr value="color112">45595F</attr>
<attr value="color121"></attr>
<attr value="color122"></attr>
<attr value="color131">000000</attr>
<attr value="color132">000000</attr>
<attr value="color141">000000</attr>
<attr value="color142">000000</attr>

<attr value="slegend">true</attr>
<attr value="sgrid">false</attr>
<attr value="sname">true</attr>
<attr value="sval">true</attr>
<attr value="sanim">true</attr>
<attr value="sstacked">false</attr>
<attr value="saxes">false</attr>
<attr value="slog">false</attr>
<attr value="aqua">0</attr>
<attr value="cview">0</attr>
<attr value="is3d">0</attr>
<attr value="isstacked">0</attr>
<attr value="linestyle">0</attr>
<attr value="autoupdate">0</attr>
<attr value="autoupmin">5</attr>
<attr value="cscroll">1</attr>
<attr value="maxbarscroll">10</attr>
</attr>

<attr value="fields">
	<attr value="0">
		<attr value="name">id_conta</attr>
		<attr value="label">Id Conta</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="1">
		<attr value="name">origem</attr>
		<attr value="label">Origem</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="2">
		<attr value="name">destino</attr>
		<attr value="label">Destino</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="3">
		<attr value="name">custo</attr>
		<attr value="label">Custo</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="4">
		<attr value="name">Minutos</attr>
		<attr value="label">Minutos</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="5">
		<attr value="name">dt</attr>
		<attr value="label">Data</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="6">
		<attr value="name">Mes</attr>
		<attr value="label">Mes</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="7">
		<attr value="name">Ano</attr>
		<attr value="label">Ano</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="8">
		<attr value="name">uniqueid</attr>
		<attr value="label">Uniqueid</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="9">
		<attr value="name">id_interf</attr>
		<attr value="label">Id Interf</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="10">
		<attr value="name">id_contrato</attr>
		<attr value="label">Id Contrato</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="11">
		<attr value="name">dsc_centro_cust</attr>
		<attr value="label">Dsc Centro Cust</attr>
		<attr value="search"></attr>
	</attr>
</attr>


<attr value="settings">
<attr value="name">id_conta</attr>
<attr value="short_table_name">Gr_fico___Centro_de_custo</attr>
</attr>

</chart>';
	
$tables_data["Graf. Centro de custo"]=&$tdataGr_fico___Centro_de_custo;
$field_labels["Graf__Centro_de_custo"] = &$fieldLabelsGr_fico___Centro_de_custo;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Graf. Centro de custo"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Graf. Centro de custo"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto182=array();
$proto182["m_strHead"] = "SELECT";
$proto182["m_strFieldList"] = "conta.id_conta,  conta.origem,  conta.destino,  round(sum(custo)) AS custo,  round(sum(duracao/60)) AS Minutos,  DATE_FORMAT(calldate,'%m-%Y') AS dt,  DATE_FORMAT(calldate,'%m') AS Mes,  DATE_FORMAT(calldate,'%Y') AS Ano,  conta.uniqueid,  conta.id_interf,  conta.id_contrato,  centrocusto.dsc_centro_cust";
$proto182["m_strFrom"] = "FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo";
$proto182["m_strWhere"] = "";
$proto182["m_strOrderBy"] = "";
$proto182["m_strTail"] = "GROUP BY DATE_FORMAT(calldate,'%m-%Y'), centrocusto.dsc_centro_cust";
$proto183=array();
$proto183["m_sql"] = "";
$proto183["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto183["m_column"]=$obj;
$proto183["m_contained"] = array();
$proto183["m_strCase"] = "";
$proto183["m_havingmode"] = "0";
$proto183["m_inBrackets"] = "0";
$proto183["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto183);

$proto182["m_where"] = $obj;
$proto185=array();
$proto185["m_sql"] = "";
$proto185["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto185["m_column"]=$obj;
$proto185["m_contained"] = array();
$proto185["m_strCase"] = "";
$proto185["m_havingmode"] = "0";
$proto185["m_inBrackets"] = "0";
$proto185["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto185);

$proto182["m_having"] = $obj;
$proto182["m_fieldlist"] = array();
						$proto187=array();
			$obj = new SQLField(array(
	"m_strName" => "id_conta",
	"m_strTable" => "conta"
));

$proto187["m_expr"]=$obj;
$proto187["m_alias"] = "";
$obj = new SQLFieldListItem($proto187);

$proto182["m_fieldlist"][]=$obj;
						$proto189=array();
			$obj = new SQLField(array(
	"m_strName" => "origem",
	"m_strTable" => "conta"
));

$proto189["m_expr"]=$obj;
$proto189["m_alias"] = "";
$obj = new SQLFieldListItem($proto189);

$proto182["m_fieldlist"][]=$obj;
						$proto191=array();
			$obj = new SQLField(array(
	"m_strName" => "destino",
	"m_strTable" => "conta"
));

$proto191["m_expr"]=$obj;
$proto191["m_alias"] = "";
$obj = new SQLFieldListItem($proto191);

$proto182["m_fieldlist"][]=$obj;
						$proto193=array();
			$proto194=array();
$proto194["m_functiontype"] = "SQLF_CUSTOM";
$proto194["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(custo)"
));

$proto194["m_arguments"][]=$obj;
$proto194["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto194);

$proto193["m_expr"]=$obj;
$proto193["m_alias"] = "custo";
$obj = new SQLFieldListItem($proto193);

$proto182["m_fieldlist"][]=$obj;
						$proto196=array();
			$proto197=array();
$proto197["m_functiontype"] = "SQLF_CUSTOM";
$proto197["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(duracao/60)"
));

$proto197["m_arguments"][]=$obj;
$proto197["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto197);

$proto196["m_expr"]=$obj;
$proto196["m_alias"] = "Minutos";
$obj = new SQLFieldListItem($proto196);

$proto182["m_fieldlist"][]=$obj;
						$proto199=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(calldate,'%m-%Y')"
));

$proto199["m_expr"]=$obj;
$proto199["m_alias"] = "dt";
$obj = new SQLFieldListItem($proto199);

$proto182["m_fieldlist"][]=$obj;
						$proto201=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(calldate,'%m')"
));

$proto201["m_expr"]=$obj;
$proto201["m_alias"] = "Mes";
$obj = new SQLFieldListItem($proto201);

$proto182["m_fieldlist"][]=$obj;
						$proto203=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(calldate,'%Y')"
));

$proto203["m_expr"]=$obj;
$proto203["m_alias"] = "Ano";
$obj = new SQLFieldListItem($proto203);

$proto182["m_fieldlist"][]=$obj;
						$proto205=array();
			$obj = new SQLField(array(
	"m_strName" => "uniqueid",
	"m_strTable" => "conta"
));

$proto205["m_expr"]=$obj;
$proto205["m_alias"] = "";
$obj = new SQLFieldListItem($proto205);

$proto182["m_fieldlist"][]=$obj;
						$proto207=array();
			$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "conta"
));

$proto207["m_expr"]=$obj;
$proto207["m_alias"] = "";
$obj = new SQLFieldListItem($proto207);

$proto182["m_fieldlist"][]=$obj;
						$proto209=array();
			$obj = new SQLField(array(
	"m_strName" => "id_contrato",
	"m_strTable" => "conta"
));

$proto209["m_expr"]=$obj;
$proto209["m_alias"] = "";
$obj = new SQLFieldListItem($proto209);

$proto182["m_fieldlist"][]=$obj;
						$proto211=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto211["m_expr"]=$obj;
$proto211["m_alias"] = "";
$obj = new SQLFieldListItem($proto211);

$proto182["m_fieldlist"][]=$obj;
$proto182["m_fromlist"] = array();
												$proto213=array();
$proto213["m_link"] = "SQLL_MAIN";
			$proto214=array();
$proto214["m_strName"] = "conta";
$proto214["m_columns"] = array();
$proto214["m_columns"][] = "id_conta";
$proto214["m_columns"][] = "idt_custo";
$proto214["m_columns"][] = "origem";
$proto214["m_columns"][] = "destino";
$proto214["m_columns"][] = "duracao";
$proto214["m_columns"][] = "custo";
$proto214["m_columns"][] = "calldate";
$proto214["m_columns"][] = "uniqueid";
$proto214["m_columns"][] = "id_interf";
$proto214["m_columns"][] = "id_contrato";
$obj = new SQLTable($proto214);

$proto213["m_table"] = $obj;
$proto213["m_alias"] = "";
$proto215=array();
$proto215["m_sql"] = "";
$proto215["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto215["m_column"]=$obj;
$proto215["m_contained"] = array();
$proto215["m_strCase"] = "";
$proto215["m_havingmode"] = "0";
$proto215["m_inBrackets"] = "0";
$proto215["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto215);

$proto213["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto213);

$proto182["m_fromlist"][]=$obj;
												$proto217=array();
$proto217["m_link"] = "SQLL_INNERJOIN";
			$proto218=array();
$proto218["m_strName"] = "centrocusto";
$proto218["m_columns"] = array();
$proto218["m_columns"][] = "idt_custo";
$proto218["m_columns"][] = "dsc_centro_cust";
$proto218["m_columns"][] = "idt_colab";
$proto218["m_columns"][] = "flg_ativado";
$obj = new SQLTable($proto218);

$proto217["m_table"] = $obj;
$proto217["m_alias"] = "";
$proto219=array();
$proto219["m_sql"] = "conta.idt_custo = centrocusto.idt_custo";
$proto219["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "conta"
));

$proto219["m_column"]=$obj;
$proto219["m_contained"] = array();
$proto219["m_strCase"] = "= centrocusto.idt_custo";
$proto219["m_havingmode"] = "0";
$proto219["m_inBrackets"] = "0";
$proto219["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto219);

$proto217["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto217);

$proto182["m_fromlist"][]=$obj;
$proto182["m_groupby"] = array();
												$proto221=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(calldate,'%m-%Y')"
));

$proto221["m_column"]=$obj;
$obj = new SQLGroupByItem($proto221);

$proto182["m_groupby"][]=$obj;
												$proto223=array();
						$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto223["m_column"]=$obj;
$obj = new SQLGroupByItem($proto223);

$proto182["m_groupby"][]=$obj;
$proto182["m_orderby"] = array();
$obj = new SQLQuery($proto182);

$queryData_Gr_fico___Centro_de_custo = $obj;
$tdataGr_fico___Centro_de_custo[".sqlquery"] = $queryData_Gr_fico___Centro_de_custo;



?>
