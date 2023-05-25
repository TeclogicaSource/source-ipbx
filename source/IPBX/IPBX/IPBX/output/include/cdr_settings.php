<?php

//	field labels
$fieldLabelscdr = array();
$fieldLabelscdr["Portuguese(Brazil)"]=array();
$fieldLabelscdr["Portuguese(Brazil)"]["calldate"] = "Calldate";
$fieldLabelscdr["Portuguese(Brazil)"]["clid"] = "Clid";
$fieldLabelscdr["Portuguese(Brazil)"]["src"] = "Src";
$fieldLabelscdr["Portuguese(Brazil)"]["dst"] = "Dst";
$fieldLabelscdr["Portuguese(Brazil)"]["dcontext"] = "Dcontext";
$fieldLabelscdr["Portuguese(Brazil)"]["channel"] = "Channel";
$fieldLabelscdr["Portuguese(Brazil)"]["dstchannel"] = "Dstchannel";
$fieldLabelscdr["Portuguese(Brazil)"]["lastapp"] = "Lastapp";
$fieldLabelscdr["Portuguese(Brazil)"]["lastdata"] = "Lastdata";
$fieldLabelscdr["Portuguese(Brazil)"]["duration"] = "Duration";
$fieldLabelscdr["Portuguese(Brazil)"]["billsec"] = "Billsec";
$fieldLabelscdr["Portuguese(Brazil)"]["disposition"] = "Disposition";
$fieldLabelscdr["Portuguese(Brazil)"]["amaflags"] = "Amaflags";
$fieldLabelscdr["Portuguese(Brazil)"]["accountcode"] = "Accountcode";
$fieldLabelscdr["Portuguese(Brazil)"]["uniqueid"] = "Uniqueid";
$fieldLabelscdr["Portuguese(Brazil)"]["userfield"] = "Userfield";


$tdatacdr=array();
	$tdatacdr[".NumberOfChars"]=80; 
	$tdatacdr[".ShortName"]="cdr";
	$tdatacdr[".OwnerID"]="";
	$tdatacdr[".OriginalTable"]="cdr";
	$tdatacdr[".NCSearch"]=true;
	

$tdatacdr[".shortTableName"] = "cdr";
$tdatacdr[".dataSourceTable"] = "cdr";
$tdatacdr[".nSecOptions"] = 0;
$tdatacdr[".nLoginMethod"] = 1;
$tdatacdr[".recsPerRowList"] = 1;	
$tdatacdr[".tableGroupBy"] = "0";
$tdatacdr[".dbType"] = 0;
$tdatacdr[".mainTableOwnerID"] = "";
$tdatacdr[".moveNext"] = 1;

$tdatacdr[".listAjax"] = true;

	$tdatacdr[".audit"] = true;

	$tdatacdr[".locking"] = false;
	
$tdatacdr[".listIcons"] = true;




$tdatacdr[".showSimpleSearchOptions"] = false;

$tdatacdr[".showSearchPanel"] = true;


$tdatacdr[".isUseAjaxSuggest"] = true;

$tdatacdr[".rowHighlite"] = true;

$tdatacdr[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatacdr[".arrKeyFields"][] = "uniqueid";

// use datepicker for search panel
$tdatacdr[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdatacdr[".isUseTimeForSearch"] = false;






$tdatacdr[".isUseInlineJs"] = $tdatacdr[".isUseInlineAdd"] || $tdatacdr[".isUseInlineEdit"];

$tdatacdr[".allSearchFields"] = array();



$tdatacdr[".isDynamicPerm"] = true;

	

$tdatacdr[".isDisplayLoading"] = true;

$tdatacdr[".isResizeColumns"] = false;


$tdatacdr[".createLoginPage"] = true;


 	




$tdatacdr[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatacdr[".strOrderBy"] = $gstrOrderBy;
	
$tdatacdr[".orderindexes"] = array();

$tdatacdr[".sqlHead"] = "SELECT calldate,   clid,   src,   dst,   dcontext,   channel,   dstchannel,   lastapp,   lastdata,   duration,   billsec,   disposition,   amaflags,   accountcode,   uniqueid,   userfield";

$tdatacdr[".sqlFrom"] = "FROM cdr";

$tdatacdr[".sqlWhereExpr"] = "";

$tdatacdr[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="uniqueid";
	$tdatacdr[".Keys"]=$tableKeys;

	
//	calldate
	$fdata = array();
	$fdata["strName"] = "calldate";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Calldate"; 
			$fdata["FieldType"]= 135;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "calldate";
		$fdata["FullName"]= "calldate";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	 $fdata["DateEditType"]=13; 
			
											$tdatacdr["calldate"]=$fdata;
	
//	clid
	$fdata = array();
	$fdata["strName"] = "clid";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Clid"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "clid";
		$fdata["FullName"]= "clid";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
		
											$tdatacdr["clid"]=$fdata;
	
//	src
	$fdata = array();
	$fdata["strName"] = "src";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Src"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "src";
		$fdata["FullName"]= "src";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
		
											$tdatacdr["src"]=$fdata;
	
//	dst
	$fdata = array();
	$fdata["strName"] = "dst";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Dst"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dst";
		$fdata["FullName"]= "dst";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
		
											$tdatacdr["dst"]=$fdata;
	
//	dcontext
	$fdata = array();
	$fdata["strName"] = "dcontext";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Dcontext"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dcontext";
		$fdata["FullName"]= "dcontext";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
		
											$tdatacdr["dcontext"]=$fdata;
	
//	channel
	$fdata = array();
	$fdata["strName"] = "channel";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Channel"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "channel";
		$fdata["FullName"]= "channel";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
		
											$tdatacdr["channel"]=$fdata;
	
//	dstchannel
	$fdata = array();
	$fdata["strName"] = "dstchannel";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Dstchannel"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dstchannel";
		$fdata["FullName"]= "dstchannel";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
		
											$tdatacdr["dstchannel"]=$fdata;
	
//	lastapp
	$fdata = array();
	$fdata["strName"] = "lastapp";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Lastapp"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "lastapp";
		$fdata["FullName"]= "lastapp";
						$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
		
											$tdatacdr["lastapp"]=$fdata;
	
//	lastdata
	$fdata = array();
	$fdata["strName"] = "lastdata";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Lastdata"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "lastdata";
		$fdata["FullName"]= "lastdata";
						$fdata["Index"]= 9;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
		
											$tdatacdr["lastdata"]=$fdata;
	
//	duration
	$fdata = array();
	$fdata["strName"] = "duration";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Duration"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "duration";
		$fdata["FullName"]= "duration";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 10;
	
			$fdata["EditParams"]="";
			
											$tdatacdr["duration"]=$fdata;
	
//	billsec
	$fdata = array();
	$fdata["strName"] = "billsec";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Billsec"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "billsec";
		$fdata["FullName"]= "billsec";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 11;
	
			$fdata["EditParams"]="";
			
											$tdatacdr["billsec"]=$fdata;
	
//	disposition
	$fdata = array();
	$fdata["strName"] = "disposition";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Disposition"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "disposition";
		$fdata["FullName"]= "disposition";
						$fdata["Index"]= 12;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=45";
		
											$tdatacdr["disposition"]=$fdata;
	
//	amaflags
	$fdata = array();
	$fdata["strName"] = "amaflags";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Amaflags"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "amaflags";
		$fdata["FullName"]= "amaflags";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 13;
	
			$fdata["EditParams"]="";
			
											$tdatacdr["amaflags"]=$fdata;
	
//	accountcode
	$fdata = array();
	$fdata["strName"] = "accountcode";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Accountcode"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "accountcode";
		$fdata["FullName"]= "accountcode";
						$fdata["Index"]= 14;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=20";
		
											$tdatacdr["accountcode"]=$fdata;
	
//	uniqueid
	$fdata = array();
	$fdata["strName"] = "uniqueid";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Uniqueid"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "uniqueid";
		$fdata["FullName"]= "uniqueid";
						$fdata["Index"]= 15;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=32";
		
											$tdatacdr["uniqueid"]=$fdata;
	
//	userfield
	$fdata = array();
	$fdata["strName"] = "userfield";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Userfield"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "userfield";
		$fdata["FullName"]= "userfield";
						$fdata["Index"]= 16;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=255";
		
											$tdatacdr["userfield"]=$fdata;

	
$tables_data["cdr"]=&$tdatacdr;
$field_labels["cdr"] = &$fieldLabelscdr;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["cdr"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["cdr"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto3210=array();
$proto3210["m_strHead"] = "SELECT";
$proto3210["m_strFieldList"] = "calldate,   clid,   src,   dst,   dcontext,   channel,   dstchannel,   lastapp,   lastdata,   duration,   billsec,   disposition,   amaflags,   accountcode,   uniqueid,   userfield";
$proto3210["m_strFrom"] = "FROM cdr";
$proto3210["m_strWhere"] = "";
$proto3210["m_strOrderBy"] = "";
$proto3210["m_strTail"] = "";
$proto3211=array();
$proto3211["m_sql"] = "";
$proto3211["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3211["m_column"]=$obj;
$proto3211["m_contained"] = array();
$proto3211["m_strCase"] = "";
$proto3211["m_havingmode"] = "0";
$proto3211["m_inBrackets"] = "0";
$proto3211["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3211);

$proto3210["m_where"] = $obj;
$proto3213=array();
$proto3213["m_sql"] = "";
$proto3213["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3213["m_column"]=$obj;
$proto3213["m_contained"] = array();
$proto3213["m_strCase"] = "";
$proto3213["m_havingmode"] = "0";
$proto3213["m_inBrackets"] = "0";
$proto3213["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3213);

$proto3210["m_having"] = $obj;
$proto3210["m_fieldlist"] = array();
						$proto3215=array();
			$obj = new SQLField(array(
	"m_strName" => "calldate",
	"m_strTable" => "cdr"
));

$proto3215["m_expr"]=$obj;
$proto3215["m_alias"] = "";
$obj = new SQLFieldListItem($proto3215);

$proto3210["m_fieldlist"][]=$obj;
						$proto3217=array();
			$obj = new SQLField(array(
	"m_strName" => "clid",
	"m_strTable" => "cdr"
));

$proto3217["m_expr"]=$obj;
$proto3217["m_alias"] = "";
$obj = new SQLFieldListItem($proto3217);

$proto3210["m_fieldlist"][]=$obj;
						$proto3219=array();
			$obj = new SQLField(array(
	"m_strName" => "src",
	"m_strTable" => "cdr"
));

$proto3219["m_expr"]=$obj;
$proto3219["m_alias"] = "";
$obj = new SQLFieldListItem($proto3219);

$proto3210["m_fieldlist"][]=$obj;
						$proto3221=array();
			$obj = new SQLField(array(
	"m_strName" => "dst",
	"m_strTable" => "cdr"
));

$proto3221["m_expr"]=$obj;
$proto3221["m_alias"] = "";
$obj = new SQLFieldListItem($proto3221);

$proto3210["m_fieldlist"][]=$obj;
						$proto3223=array();
			$obj = new SQLField(array(
	"m_strName" => "dcontext",
	"m_strTable" => "cdr"
));

$proto3223["m_expr"]=$obj;
$proto3223["m_alias"] = "";
$obj = new SQLFieldListItem($proto3223);

$proto3210["m_fieldlist"][]=$obj;
						$proto3225=array();
			$obj = new SQLField(array(
	"m_strName" => "channel",
	"m_strTable" => "cdr"
));

$proto3225["m_expr"]=$obj;
$proto3225["m_alias"] = "";
$obj = new SQLFieldListItem($proto3225);

$proto3210["m_fieldlist"][]=$obj;
						$proto3227=array();
			$obj = new SQLField(array(
	"m_strName" => "dstchannel",
	"m_strTable" => "cdr"
));

$proto3227["m_expr"]=$obj;
$proto3227["m_alias"] = "";
$obj = new SQLFieldListItem($proto3227);

$proto3210["m_fieldlist"][]=$obj;
						$proto3229=array();
			$obj = new SQLField(array(
	"m_strName" => "lastapp",
	"m_strTable" => "cdr"
));

$proto3229["m_expr"]=$obj;
$proto3229["m_alias"] = "";
$obj = new SQLFieldListItem($proto3229);

$proto3210["m_fieldlist"][]=$obj;
						$proto3231=array();
			$obj = new SQLField(array(
	"m_strName" => "lastdata",
	"m_strTable" => "cdr"
));

$proto3231["m_expr"]=$obj;
$proto3231["m_alias"] = "";
$obj = new SQLFieldListItem($proto3231);

$proto3210["m_fieldlist"][]=$obj;
						$proto3233=array();
			$obj = new SQLField(array(
	"m_strName" => "duration",
	"m_strTable" => "cdr"
));

$proto3233["m_expr"]=$obj;
$proto3233["m_alias"] = "";
$obj = new SQLFieldListItem($proto3233);

$proto3210["m_fieldlist"][]=$obj;
						$proto3235=array();
			$obj = new SQLField(array(
	"m_strName" => "billsec",
	"m_strTable" => "cdr"
));

$proto3235["m_expr"]=$obj;
$proto3235["m_alias"] = "";
$obj = new SQLFieldListItem($proto3235);

$proto3210["m_fieldlist"][]=$obj;
						$proto3237=array();
			$obj = new SQLField(array(
	"m_strName" => "disposition",
	"m_strTable" => "cdr"
));

$proto3237["m_expr"]=$obj;
$proto3237["m_alias"] = "";
$obj = new SQLFieldListItem($proto3237);

$proto3210["m_fieldlist"][]=$obj;
						$proto3239=array();
			$obj = new SQLField(array(
	"m_strName" => "amaflags",
	"m_strTable" => "cdr"
));

$proto3239["m_expr"]=$obj;
$proto3239["m_alias"] = "";
$obj = new SQLFieldListItem($proto3239);

$proto3210["m_fieldlist"][]=$obj;
						$proto3241=array();
			$obj = new SQLField(array(
	"m_strName" => "accountcode",
	"m_strTable" => "cdr"
));

$proto3241["m_expr"]=$obj;
$proto3241["m_alias"] = "";
$obj = new SQLFieldListItem($proto3241);

$proto3210["m_fieldlist"][]=$obj;
						$proto3243=array();
			$obj = new SQLField(array(
	"m_strName" => "uniqueid",
	"m_strTable" => "cdr"
));

$proto3243["m_expr"]=$obj;
$proto3243["m_alias"] = "";
$obj = new SQLFieldListItem($proto3243);

$proto3210["m_fieldlist"][]=$obj;
						$proto3245=array();
			$obj = new SQLField(array(
	"m_strName" => "userfield",
	"m_strTable" => "cdr"
));

$proto3245["m_expr"]=$obj;
$proto3245["m_alias"] = "";
$obj = new SQLFieldListItem($proto3245);

$proto3210["m_fieldlist"][]=$obj;
$proto3210["m_fromlist"] = array();
												$proto3247=array();
$proto3247["m_link"] = "SQLL_MAIN";
			$proto3248=array();
$proto3248["m_strName"] = "cdr";
$proto3248["m_columns"] = array();
$proto3248["m_columns"][] = "calldate";
$proto3248["m_columns"][] = "clid";
$proto3248["m_columns"][] = "src";
$proto3248["m_columns"][] = "dst";
$proto3248["m_columns"][] = "dcontext";
$proto3248["m_columns"][] = "channel";
$proto3248["m_columns"][] = "dstchannel";
$proto3248["m_columns"][] = "lastapp";
$proto3248["m_columns"][] = "lastdata";
$proto3248["m_columns"][] = "duration";
$proto3248["m_columns"][] = "billsec";
$proto3248["m_columns"][] = "disposition";
$proto3248["m_columns"][] = "amaflags";
$proto3248["m_columns"][] = "accountcode";
$proto3248["m_columns"][] = "uniqueid";
$proto3248["m_columns"][] = "userfield";
$obj = new SQLTable($proto3248);

$proto3247["m_table"] = $obj;
$proto3247["m_alias"] = "";
$proto3249=array();
$proto3249["m_sql"] = "";
$proto3249["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3249["m_column"]=$obj;
$proto3249["m_contained"] = array();
$proto3249["m_strCase"] = "";
$proto3249["m_havingmode"] = "0";
$proto3249["m_inBrackets"] = "0";
$proto3249["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3249);

$proto3247["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto3247);

$proto3210["m_fromlist"][]=$obj;
$proto3210["m_groupby"] = array();
$proto3210["m_orderby"] = array();
$obj = new SQLQuery($proto3210);

$queryData_cdr = $obj;
$tdatacdr[".sqlquery"] = $queryData_cdr;



?>
