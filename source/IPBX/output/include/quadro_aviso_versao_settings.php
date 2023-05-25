<?php
require_once(getabspath("classes/cipherer.php"));




$tdataquadro_aviso_versao = array();
	$tdataquadro_aviso_versao[".truncateText"] = true;
	$tdataquadro_aviso_versao[".NumberOfChars"] = 80;
	$tdataquadro_aviso_versao[".ShortName"] = "quadro_aviso_versao";
	$tdataquadro_aviso_versao[".OwnerID"] = "";
	$tdataquadro_aviso_versao[".OriginalTable"] = "ipbx_quadro_avisos";

//	field labels
$fieldLabelsquadro_aviso_versao = array();
$fieldToolTipsquadro_aviso_versao = array();
$pageTitlesquadro_aviso_versao = array();

if(mlang_getcurrentlang()=="Portuguese(Brazil)")
{
	$fieldLabelsquadro_aviso_versao["Portuguese(Brazil)"] = array();
	$fieldToolTipsquadro_aviso_versao["Portuguese(Brazil)"] = array();
	$pageTitlesquadro_aviso_versao["Portuguese(Brazil)"] = array();
	$fieldLabelsquadro_aviso_versao["Portuguese(Brazil)"]["id_aviso"] = "Identificacao";
	$fieldToolTipsquadro_aviso_versao["Portuguese(Brazil)"]["id_aviso"] = "";
	$fieldLabelsquadro_aviso_versao["Portuguese(Brazil)"]["dsc_aviso"] = "Descriчуo";
	$fieldToolTipsquadro_aviso_versao["Portuguese(Brazil)"]["dsc_aviso"] = "";
	$fieldLabelsquadro_aviso_versao["Portuguese(Brazil)"]["img_anexo"] = "Imagem";
	$fieldToolTipsquadro_aviso_versao["Portuguese(Brazil)"]["img_anexo"] = "";
	$fieldLabelsquadro_aviso_versao["Portuguese(Brazil)"]["id_versao"] = "Versуo";
	$fieldToolTipsquadro_aviso_versao["Portuguese(Brazil)"]["id_versao"] = "";
	$fieldLabelsquadro_aviso_versao["Portuguese(Brazil)"]["flg_visualizacao"] = "Visualizaчуo";
	$fieldToolTipsquadro_aviso_versao["Portuguese(Brazil)"]["flg_visualizacao"] = "";
	if (count($fieldToolTipsquadro_aviso_versao["Portuguese(Brazil)"]))
		$tdataquadro_aviso_versao[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelsquadro_aviso_versao[""] = array();
	$fieldToolTipsquadro_aviso_versao[""] = array();
	$pageTitlesquadro_aviso_versao[""] = array();
	if (count($fieldToolTipsquadro_aviso_versao[""]))
		$tdataquadro_aviso_versao[".isUseToolTips"] = true;
}


	$tdataquadro_aviso_versao[".NCSearch"] = true;



$tdataquadro_aviso_versao[".shortTableName"] = "quadro_aviso_versao";
$tdataquadro_aviso_versao[".nSecOptions"] = 0;
$tdataquadro_aviso_versao[".recsPerRowList"] = 1;
$tdataquadro_aviso_versao[".recsPerRowPrint"] = 1;
$tdataquadro_aviso_versao[".mainTableOwnerID"] = "";
$tdataquadro_aviso_versao[".moveNext"] = 1;
$tdataquadro_aviso_versao[".entityType"] = 1;

$tdataquadro_aviso_versao[".strOriginalTableName"] = "ipbx_quadro_avisos";




$tdataquadro_aviso_versao[".showAddInPopup"] = false;

$tdataquadro_aviso_versao[".showEditInPopup"] = false;

$tdataquadro_aviso_versao[".showViewInPopup"] = false;

//page's base css files names
$popupPagesLayoutNames = array();
$tdataquadro_aviso_versao[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdataquadro_aviso_versao[".fieldsForRegister"] = array();

$tdataquadro_aviso_versao[".listAjax"] = false;

	$tdataquadro_aviso_versao[".audit"] = false;

	$tdataquadro_aviso_versao[".locking"] = false;

$tdataquadro_aviso_versao[".edit"] = true;
$tdataquadro_aviso_versao[".afterEditAction"] = 1;
$tdataquadro_aviso_versao[".closePopupAfterEdit"] = 1;
$tdataquadro_aviso_versao[".afterEditActionDetTable"] = "";

$tdataquadro_aviso_versao[".add"] = true;
$tdataquadro_aviso_versao[".afterAddAction"] = 1;
$tdataquadro_aviso_versao[".closePopupAfterAdd"] = 1;
$tdataquadro_aviso_versao[".afterAddActionDetTable"] = "";

$tdataquadro_aviso_versao[".list"] = true;





$tdataquadro_aviso_versao[".delete"] = true;

$tdataquadro_aviso_versao[".showSimpleSearchOptions"] = false;

// search Saving settings
$tdataquadro_aviso_versao[".searchSaving"] = false;
//

$tdataquadro_aviso_versao[".showSearchPanel"] = true;
		$tdataquadro_aviso_versao[".flexibleSearch"] = true;

if (isMobile())
	$tdataquadro_aviso_versao[".isUseAjaxSuggest"] = false;
else
	$tdataquadro_aviso_versao[".isUseAjaxSuggest"] = true;

$tdataquadro_aviso_versao[".rowHighlite"] = true;


																				
$tdataquadro_aviso_versao[".isUsebuttonHandlers"] = true;

$tdataquadro_aviso_versao[".addPageEvents"] = false;

// use timepicker for search panel
$tdataquadro_aviso_versao[".isUseTimeForSearch"] = false;





$tdataquadro_aviso_versao[".allSearchFields"] = array();
$tdataquadro_aviso_versao[".filterFields"] = array();
$tdataquadro_aviso_versao[".requiredSearchFields"] = array();



$tdataquadro_aviso_versao[".googleLikeFields"] = array();
$tdataquadro_aviso_versao[".googleLikeFields"][] = "id_aviso";
$tdataquadro_aviso_versao[".googleLikeFields"][] = "dsc_aviso";
$tdataquadro_aviso_versao[".googleLikeFields"][] = "img_anexo";
$tdataquadro_aviso_versao[".googleLikeFields"][] = "id_versao";
$tdataquadro_aviso_versao[".googleLikeFields"][] = "flg_visualizacao";


$tdataquadro_aviso_versao[".advSearchFields"] = array();
$tdataquadro_aviso_versao[".advSearchFields"][] = "id_aviso";
$tdataquadro_aviso_versao[".advSearchFields"][] = "dsc_aviso";
$tdataquadro_aviso_versao[".advSearchFields"][] = "img_anexo";
$tdataquadro_aviso_versao[".advSearchFields"][] = "id_versao";
$tdataquadro_aviso_versao[".advSearchFields"][] = "flg_visualizacao";

$tdataquadro_aviso_versao[".tableType"] = "list";

$tdataquadro_aviso_versao[".printerPageOrientation"] = 0;
$tdataquadro_aviso_versao[".nPrinterPageScale"] = 100;

$tdataquadro_aviso_versao[".nPrinterSplitRecords"] = 40;

$tdataquadro_aviso_versao[".nPrinterPDFSplitRecords"] = 40;



$tdataquadro_aviso_versao[".geocodingEnabled"] = false;





$tdataquadro_aviso_versao[".listGridLayout"] = 1;

$tdataquadro_aviso_versao[".isDisplayLoading"] = true;




// view page pdf

// print page pdf


$tdataquadro_aviso_versao[".pageSize"] = 20;

$tdataquadro_aviso_versao[".warnLeavingPages"] = true;



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataquadro_aviso_versao[".strOrderBy"] = $tstrOrderBy;

$tdataquadro_aviso_versao[".orderindexes"] = array();

$tdataquadro_aviso_versao[".sqlHead"] = "SELECT id_aviso,  	dsc_aviso,  	img_anexo,  	id_versao,  	flg_visualizacao";
$tdataquadro_aviso_versao[".sqlFrom"] = "FROM ipbx_quadro_avisos";
$tdataquadro_aviso_versao[".sqlWhereExpr"] = "";
$tdataquadro_aviso_versao[".sqlTail"] = "";











//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataquadro_aviso_versao[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataquadro_aviso_versao[".arrGroupsPerPage"] = $arrGPP;

$tdataquadro_aviso_versao[".highlightSearchResults"] = true;

$tableKeysquadro_aviso_versao = array();
$tableKeysquadro_aviso_versao[] = "id_aviso";
$tdataquadro_aviso_versao[".Keys"] = $tableKeysquadro_aviso_versao;

$tdataquadro_aviso_versao[".listFields"] = array();
$tdataquadro_aviso_versao[".listFields"][] = "id_versao";
$tdataquadro_aviso_versao[".listFields"][] = "dsc_aviso";
$tdataquadro_aviso_versao[".listFields"][] = "img_anexo";

$tdataquadro_aviso_versao[".hideMobileList"] = array();


$tdataquadro_aviso_versao[".viewFields"] = array();

$tdataquadro_aviso_versao[".addFields"] = array();
$tdataquadro_aviso_versao[".addFields"][] = "dsc_aviso";
$tdataquadro_aviso_versao[".addFields"][] = "img_anexo";
$tdataquadro_aviso_versao[".addFields"][] = "id_versao";
$tdataquadro_aviso_versao[".addFields"][] = "flg_visualizacao";

$tdataquadro_aviso_versao[".masterListFields"] = array();

$tdataquadro_aviso_versao[".inlineAddFields"] = array();

$tdataquadro_aviso_versao[".editFields"] = array();
$tdataquadro_aviso_versao[".editFields"][] = "dsc_aviso";
$tdataquadro_aviso_versao[".editFields"][] = "img_anexo";
$tdataquadro_aviso_versao[".editFields"][] = "id_versao";
$tdataquadro_aviso_versao[".editFields"][] = "flg_visualizacao";

$tdataquadro_aviso_versao[".inlineEditFields"] = array();

$tdataquadro_aviso_versao[".exportFields"] = array();

$tdataquadro_aviso_versao[".importFields"] = array();
$tdataquadro_aviso_versao[".importFields"][] = "id_aviso";
$tdataquadro_aviso_versao[".importFields"][] = "dsc_aviso";
$tdataquadro_aviso_versao[".importFields"][] = "img_anexo";
$tdataquadro_aviso_versao[".importFields"][] = "id_versao";
$tdataquadro_aviso_versao[".importFields"][] = "flg_visualizacao";

$tdataquadro_aviso_versao[".printFields"] = array();

//	id_aviso
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id_aviso";
	$fdata["GoodName"] = "id_aviso";
	$fdata["ownerTable"] = "ipbx_quadro_avisos";
	$fdata["Label"] = GetFieldLabel("quadro_aviso_versao","id_aviso");
	$fdata["FieldType"] = 3;

	
		$fdata["AutoInc"] = true;

	
			
	
	
	
	
	
	
	
	
	
		$fdata["strField"] = "id_aviso";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "id_aviso";

		$fdata["DeleteAssociatedFile"] = true;

		$fdata["CompatibilityMode"] = true;

			
				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	



		$edata["IsRequired"] = true;

	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 748;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
		
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;








	$tdataquadro_aviso_versao["id_aviso"] = $fdata;
//	dsc_aviso
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "dsc_aviso";
	$fdata["GoodName"] = "dsc_aviso";
	$fdata["ownerTable"] = "ipbx_quadro_avisos";
	$fdata["Label"] = GetFieldLabel("quadro_aviso_versao","dsc_aviso");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
	
	
	
	
		$fdata["strField"] = "dsc_aviso";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "dsc_aviso";

		$fdata["DeleteAssociatedFile"] = true;

		$fdata["CompatibilityMode"] = true;

				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "HTML");

	
		$vdata["LinkPrefix"] ="files/";

	
	
	
	
	
	
	
	
	
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text area");

	
	



		$edata["IsRequired"] = true;

	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
				$edata["nRows"] = 500;
			$edata["nCols"] = 800;

	
	
		$edata["controlWidth"] = 748;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
		
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;








	$tdataquadro_aviso_versao["dsc_aviso"] = $fdata;
//	img_anexo
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "img_anexo";
	$fdata["GoodName"] = "img_anexo";
	$fdata["ownerTable"] = "ipbx_quadro_avisos";
	$fdata["Label"] = GetFieldLabel("quadro_aviso_versao","img_anexo");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
	
	
	
	
		$fdata["strField"] = "img_anexo";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "img_anexo";

		$fdata["DeleteAssociatedFile"] = true;

		$fdata["CompatibilityMode"] = true;

				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "aviso_versao";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "File-based Image");

	
		$vdata["LinkPrefix"] ="aviso_versao/";

						$vdata["ImageWidth"] = 0;
	$vdata["ImageHeight"] = 0;

	
	
	
	
	
	
	
	
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Document upload");

	
	



	
	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 748;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;








	$tdataquadro_aviso_versao["img_anexo"] = $fdata;
//	id_versao
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "id_versao";
	$fdata["GoodName"] = "id_versao";
	$fdata["ownerTable"] = "ipbx_quadro_avisos";
	$fdata["Label"] = GetFieldLabel("quadro_aviso_versao","id_versao");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
	
	
	
	
		$fdata["strField"] = "id_versao";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "id_versao";

		$fdata["DeleteAssociatedFile"] = true;

		$fdata["CompatibilityMode"] = true;

				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	



	
	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=10";

		$edata["controlWidth"] = 748;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;








	$tdataquadro_aviso_versao["id_versao"] = $fdata;
//	flg_visualizacao
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "flg_visualizacao";
	$fdata["GoodName"] = "flg_visualizacao";
	$fdata["ownerTable"] = "ipbx_quadro_avisos";
	$fdata["Label"] = GetFieldLabel("quadro_aviso_versao","flg_visualizacao");
	$fdata["FieldType"] = 3;

	
	
	
			
	
		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
	
	
	
	
		$fdata["strField"] = "flg_visualizacao";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "flg_visualizacao";

		$fdata["DeleteAssociatedFile"] = true;

		$fdata["CompatibilityMode"] = true;

				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Checkbox");

	
	
	
	
	
	
	
	
	
	
	
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Checkbox");

	
	



	
	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 748;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;








	$tdataquadro_aviso_versao["flg_visualizacao"] = $fdata;


$tables_data["quadro_aviso_versao"]=&$tdataquadro_aviso_versao;
$field_labels["quadro_aviso_versao"] = &$fieldLabelsquadro_aviso_versao;
$fieldToolTips["quadro_aviso_versao"] = &$fieldToolTipsquadro_aviso_versao;
$page_titles["quadro_aviso_versao"] = &$pageTitlesquadro_aviso_versao;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["quadro_aviso_versao"] = array();

// tables which are master tables for current table (detail)
$masterTablesData["quadro_aviso_versao"] = array();


// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_quadro_aviso_versao()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id_aviso,  	dsc_aviso,  	img_anexo,  	id_versao,  	flg_visualizacao";
$proto0["m_strFrom"] = "FROM ipbx_quadro_avisos";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "";
$proto0["m_strTail"] = "";
			$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "";
$proto1["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
$proto1["m_strCase"] = "";
$proto1["m_havingmode"] = false;
$proto1["m_inBrackets"] = false;
$proto1["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto1);

$proto0["m_where"] = $obj;
$proto3=array();
$proto3["m_sql"] = "";
$proto3["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3["m_column"]=$obj;
$proto3["m_contained"] = array();
$proto3["m_strCase"] = "";
$proto3["m_havingmode"] = false;
$proto3["m_inBrackets"] = false;
$proto3["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto3);

$proto0["m_having"] = $obj;
$proto0["m_fieldlist"] = array();
						$proto5=array();
			$obj = new SQLField(array(
	"m_strName" => "id_aviso",
	"m_strTable" => "ipbx_quadro_avisos",
	"m_srcTableName" => "quadro_aviso_versao"
));

$proto5["m_sql"] = "id_aviso";
$proto5["m_srcTableName"] = "quadro_aviso_versao";
$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_aviso",
	"m_strTable" => "ipbx_quadro_avisos",
	"m_srcTableName" => "quadro_aviso_versao"
));

$proto7["m_sql"] = "dsc_aviso";
$proto7["m_srcTableName"] = "quadro_aviso_versao";
$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "img_anexo",
	"m_strTable" => "ipbx_quadro_avisos",
	"m_srcTableName" => "quadro_aviso_versao"
));

$proto9["m_sql"] = "img_anexo";
$proto9["m_srcTableName"] = "quadro_aviso_versao";
$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "id_versao",
	"m_strTable" => "ipbx_quadro_avisos",
	"m_srcTableName" => "quadro_aviso_versao"
));

$proto11["m_sql"] = "id_versao";
$proto11["m_srcTableName"] = "quadro_aviso_versao";
$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_visualizacao",
	"m_strTable" => "ipbx_quadro_avisos",
	"m_srcTableName" => "quadro_aviso_versao"
));

$proto13["m_sql"] = "flg_visualizacao";
$proto13["m_srcTableName"] = "quadro_aviso_versao";
$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto15=array();
$proto15["m_link"] = "SQLL_MAIN";
			$proto16=array();
$proto16["m_strName"] = "ipbx_quadro_avisos";
$proto16["m_srcTableName"] = "quadro_aviso_versao";
$proto16["m_columns"] = array();
$proto16["m_columns"][] = "id_aviso";
$proto16["m_columns"][] = "dsc_aviso";
$proto16["m_columns"][] = "img_anexo";
$proto16["m_columns"][] = "id_versao";
$proto16["m_columns"][] = "flg_visualizacao";
$obj = new SQLTable($proto16);

$proto15["m_table"] = $obj;
$proto15["m_sql"] = "ipbx_quadro_avisos";
$proto15["m_alias"] = "";
$proto15["m_srcTableName"] = "quadro_aviso_versao";
$proto17=array();
$proto17["m_sql"] = "";
$proto17["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto17["m_column"]=$obj;
$proto17["m_contained"] = array();
$proto17["m_strCase"] = "";
$proto17["m_havingmode"] = false;
$proto17["m_inBrackets"] = false;
$proto17["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto17);

$proto15["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto15);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$proto0["m_srcTableName"]="quadro_aviso_versao";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_quadro_aviso_versao = createSqlQuery_quadro_aviso_versao();



					

$tdataquadro_aviso_versao[".sqlquery"] = $queryData_quadro_aviso_versao;

include_once(getabspath("include/quadro_aviso_versao_events.php"));
$tableEvents["quadro_aviso_versao"] = new eventclass_quadro_aviso_versao;
$tdataquadro_aviso_versao[".hasEvents"] = true;

?>