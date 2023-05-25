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

$tdataGr_fico___Centro_de_custo[".sqlHead"] = "SELECT conta.id_conta,  conta.origem,  conta.destino,  round(sum(custo)) AS custo,  round(sum(duracao/60)) AS Minutos,  concat(mes_referencia,'-', ano_referencia) AS dt,  mes_referencia AS Mes,  ano_referencia AS Ano,  conta.uniqueid,  conta.id_interf,  conta.id_contrato,  centrocusto.dsc_centro_cust";

$tdataGr_fico___Centro_de_custo[".sqlFrom"] = "FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo";

$tdataGr_fico___Centro_de_custo[".sqlWhereExpr"] = "";

$tdataGr_fico___Centro_de_custo[".sqlTail"] = "GROUP BY concat(mes_referencia,'-', ano_referencia), centrocusto.dsc_centro_cust";



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
		$fdata["FullName"]= "concat(mes_referencia,'-', ano_referencia)";
						$fdata["Index"]= 6;
	 $fdata["DateEditType"]=13; 
			
									$tdataGr_fico___Centro_de_custo["dt"]=$fdata;
	
//	Mes
	$fdata = array();
	$fdata["strName"] = "Mes";
	$fdata["ownerTable"] = "conta";
				$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
						$fdata["LookupUnique"]=true;

	$fdata["LinkField"]="mes_referencia";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="mes_referencia";
				$fdata["LookupTable"]="conta";
	$fdata["LookupOrderBy"]="mes_referencia";
						
				
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Mes";
		$fdata["FullName"]= "mes_referencia";
						$fdata["Index"]= 7;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataGr_fico___Centro_de_custo["Mes"]=$fdata;
	
//	Ano
	$fdata = array();
	$fdata["strName"] = "Ano";
	$fdata["ownerTable"] = "conta";
				$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
						$fdata["LookupUnique"]=true;

	$fdata["LinkField"]="ano_referencia";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="ano_referencia";
				$fdata["LookupTable"]="conta";
	$fdata["LookupOrderBy"]="ano_referencia";
						
				
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Ano";
		$fdata["FullName"]= "ano_referencia";
						$fdata["Index"]= 8;
	
			
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










$proto202=array();
$proto202["m_strHead"] = "SELECT";
$proto202["m_strFieldList"] = "conta.id_conta,  conta.origem,  conta.destino,  round(sum(custo)) AS custo,  round(sum(duracao/60)) AS Minutos,  concat(mes_referencia,'-', ano_referencia) AS dt,  mes_referencia AS Mes,  ano_referencia AS Ano,  conta.uniqueid,  conta.id_interf,  conta.id_contrato,  centrocusto.dsc_centro_cust";
$proto202["m_strFrom"] = "FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo";
$proto202["m_strWhere"] = "";
$proto202["m_strOrderBy"] = "";
$proto202["m_strTail"] = "GROUP BY concat(mes_referencia,'-', ano_referencia), centrocusto.dsc_centro_cust";
$proto203=array();
$proto203["m_sql"] = "";
$proto203["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto203["m_column"]=$obj;
$proto203["m_contained"] = array();
$proto203["m_strCase"] = "";
$proto203["m_havingmode"] = "0";
$proto203["m_inBrackets"] = "0";
$proto203["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto203);

$proto202["m_where"] = $obj;
$proto205=array();
$proto205["m_sql"] = "";
$proto205["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto205["m_column"]=$obj;
$proto205["m_contained"] = array();
$proto205["m_strCase"] = "";
$proto205["m_havingmode"] = "0";
$proto205["m_inBrackets"] = "0";
$proto205["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto205);

$proto202["m_having"] = $obj;
$proto202["m_fieldlist"] = array();
						$proto207=array();
			$obj = new SQLField(array(
	"m_strName" => "id_conta",
	"m_strTable" => "conta"
));

$proto207["m_expr"]=$obj;
$proto207["m_alias"] = "";
$obj = new SQLFieldListItem($proto207);

$proto202["m_fieldlist"][]=$obj;
						$proto209=array();
			$obj = new SQLField(array(
	"m_strName" => "origem",
	"m_strTable" => "conta"
));

$proto209["m_expr"]=$obj;
$proto209["m_alias"] = "";
$obj = new SQLFieldListItem($proto209);

$proto202["m_fieldlist"][]=$obj;
						$proto211=array();
			$obj = new SQLField(array(
	"m_strName" => "destino",
	"m_strTable" => "conta"
));

$proto211["m_expr"]=$obj;
$proto211["m_alias"] = "";
$obj = new SQLFieldListItem($proto211);

$proto202["m_fieldlist"][]=$obj;
						$proto213=array();
			$proto214=array();
$proto214["m_functiontype"] = "SQLF_CUSTOM";
$proto214["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(custo)"
));

$proto214["m_arguments"][]=$obj;
$proto214["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto214);

$proto213["m_expr"]=$obj;
$proto213["m_alias"] = "custo";
$obj = new SQLFieldListItem($proto213);

$proto202["m_fieldlist"][]=$obj;
						$proto216=array();
			$proto217=array();
$proto217["m_functiontype"] = "SQLF_CUSTOM";
$proto217["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(duracao/60)"
));

$proto217["m_arguments"][]=$obj;
$proto217["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto217);

$proto216["m_expr"]=$obj;
$proto216["m_alias"] = "Minutos";
$obj = new SQLFieldListItem($proto216);

$proto202["m_fieldlist"][]=$obj;
						$proto219=array();
			$proto220=array();
$proto220["m_functiontype"] = "SQLF_CUSTOM";
$proto220["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "mes_referencia"
));

$proto220["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "'-'"
));

$proto220["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "ano_referencia"
));

$proto220["m_arguments"][]=$obj;
$proto220["m_strFunctionName"] = "concat";
$obj = new SQLFunctionCall($proto220);

$proto219["m_expr"]=$obj;
$proto219["m_alias"] = "dt";
$obj = new SQLFieldListItem($proto219);

$proto202["m_fieldlist"][]=$obj;
						$proto224=array();
			$obj = new SQLField(array(
	"m_strName" => "mes_referencia",
	"m_strTable" => "conta"
));

$proto224["m_expr"]=$obj;
$proto224["m_alias"] = "Mes";
$obj = new SQLFieldListItem($proto224);

$proto202["m_fieldlist"][]=$obj;
						$proto226=array();
			$obj = new SQLField(array(
	"m_strName" => "ano_referencia",
	"m_strTable" => "conta"
));

$proto226["m_expr"]=$obj;
$proto226["m_alias"] = "Ano";
$obj = new SQLFieldListItem($proto226);

$proto202["m_fieldlist"][]=$obj;
						$proto228=array();
			$obj = new SQLField(array(
	"m_strName" => "uniqueid",
	"m_strTable" => "conta"
));

$proto228["m_expr"]=$obj;
$proto228["m_alias"] = "";
$obj = new SQLFieldListItem($proto228);

$proto202["m_fieldlist"][]=$obj;
						$proto230=array();
			$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "conta"
));

$proto230["m_expr"]=$obj;
$proto230["m_alias"] = "";
$obj = new SQLFieldListItem($proto230);

$proto202["m_fieldlist"][]=$obj;
						$proto232=array();
			$obj = new SQLField(array(
	"m_strName" => "id_contrato",
	"m_strTable" => "conta"
));

$proto232["m_expr"]=$obj;
$proto232["m_alias"] = "";
$obj = new SQLFieldListItem($proto232);

$proto202["m_fieldlist"][]=$obj;
						$proto234=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto234["m_expr"]=$obj;
$proto234["m_alias"] = "";
$obj = new SQLFieldListItem($proto234);

$proto202["m_fieldlist"][]=$obj;
$proto202["m_fromlist"] = array();
												$proto236=array();
$proto236["m_link"] = "SQLL_MAIN";
			$proto237=array();
$proto237["m_strName"] = "conta";
$proto237["m_columns"] = array();
$proto237["m_columns"][] = "id_conta";
$proto237["m_columns"][] = "idt_custo";
$proto237["m_columns"][] = "origem";
$proto237["m_columns"][] = "destino";
$proto237["m_columns"][] = "duracao";
$proto237["m_columns"][] = "custo";
$proto237["m_columns"][] = "calldate";
$proto237["m_columns"][] = "uniqueid";
$proto237["m_columns"][] = "id_interf";
$proto237["m_columns"][] = "id_contrato";
$proto237["m_columns"][] = "mes_referencia";
$proto237["m_columns"][] = "ano_referencia";
$obj = new SQLTable($proto237);

$proto236["m_table"] = $obj;
$proto236["m_alias"] = "";
$proto238=array();
$proto238["m_sql"] = "";
$proto238["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto238["m_column"]=$obj;
$proto238["m_contained"] = array();
$proto238["m_strCase"] = "";
$proto238["m_havingmode"] = "0";
$proto238["m_inBrackets"] = "0";
$proto238["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto238);

$proto236["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto236);

$proto202["m_fromlist"][]=$obj;
												$proto240=array();
$proto240["m_link"] = "SQLL_INNERJOIN";
			$proto241=array();
$proto241["m_strName"] = "centrocusto";
$proto241["m_columns"] = array();
$proto241["m_columns"][] = "idt_custo";
$proto241["m_columns"][] = "dsc_centro_cust";
$proto241["m_columns"][] = "idt_colab";
$proto241["m_columns"][] = "flg_ativado";
$obj = new SQLTable($proto241);

$proto240["m_table"] = $obj;
$proto240["m_alias"] = "";
$proto242=array();
$proto242["m_sql"] = "conta.idt_custo = centrocusto.idt_custo";
$proto242["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "conta"
));

$proto242["m_column"]=$obj;
$proto242["m_contained"] = array();
$proto242["m_strCase"] = "= centrocusto.idt_custo";
$proto242["m_havingmode"] = "0";
$proto242["m_inBrackets"] = "0";
$proto242["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto242);

$proto240["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto240);

$proto202["m_fromlist"][]=$obj;
$proto202["m_groupby"] = array();
												$proto244=array();
						$proto245=array();
$proto245["m_functiontype"] = "SQLF_CUSTOM";
$proto245["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "mes_referencia"
));

$proto245["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "'-'"
));

$proto245["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "ano_referencia"
));

$proto245["m_arguments"][]=$obj;
$proto245["m_strFunctionName"] = "concat";
$obj = new SQLFunctionCall($proto245);

$proto244["m_column"]=$obj;
$obj = new SQLGroupByItem($proto244);

$proto202["m_groupby"][]=$obj;
												$proto249=array();
						$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto249["m_column"]=$obj;
$obj = new SQLGroupByItem($proto249);

$proto202["m_groupby"][]=$obj;
$proto202["m_orderby"] = array();
$obj = new SQLQuery($proto202);

$queryData_Gr_fico___Centro_de_custo = $obj;
$tdataGr_fico___Centro_de_custo[".sqlquery"] = $queryData_Gr_fico___Centro_de_custo;



?>
