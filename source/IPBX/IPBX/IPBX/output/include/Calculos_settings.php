<?php

//	field labels
$fieldLabelsCalculos = array();
$fieldLabelsCalculos["Portuguese(Brazil)"]=array();
$fieldLabelsCalculos["Portuguese(Brazil)"]["calldate"] = "Calldate";
$fieldLabelsCalculos["Portuguese(Brazil)"]["clid"] = "Clid";
$fieldLabelsCalculos["Portuguese(Brazil)"]["src"] = "Src";
$fieldLabelsCalculos["Portuguese(Brazil)"]["dst"] = "Dst";
$fieldLabelsCalculos["Portuguese(Brazil)"]["dcontext"] = "Dcontext";
$fieldLabelsCalculos["Portuguese(Brazil)"]["channel"] = "Channel";
$fieldLabelsCalculos["Portuguese(Brazil)"]["dstchannel"] = "Dstchannel";
$fieldLabelsCalculos["Portuguese(Brazil)"]["lastapp"] = "Lastapp";
$fieldLabelsCalculos["Portuguese(Brazil)"]["lastdata"] = "Lastdata";
$fieldLabelsCalculos["Portuguese(Brazil)"]["duration"] = "Duration";
$fieldLabelsCalculos["Portuguese(Brazil)"]["billsec"] = "Billsec";
$fieldLabelsCalculos["Portuguese(Brazil)"]["disposition"] = "Disposition";
$fieldLabelsCalculos["Portuguese(Brazil)"]["amaflags"] = "Amaflags";
$fieldLabelsCalculos["Portuguese(Brazil)"]["accountcode"] = "Accountcode";
$fieldLabelsCalculos["Portuguese(Brazil)"]["uniqueid"] = "Uniqueid";
$fieldLabelsCalculos["Portuguese(Brazil)"]["userfield"] = "Userfield";


$tdataCalculos=array();
	$tdataCalculos[".ShortName"]="Calculos";
	$tdataCalculos[".OwnerID"]="";
	$tdataCalculos[".OriginalTable"]="cdr";
	$tdataCalculos[".NCSearch"]=true;
	
	$tdataCalculos[".ChartRefreshTime"] = 0;

$tdataCalculos[".shortTableName"] = "Calculos";
$tdataCalculos[".dataSourceTable"] = "Calculos";
$tdataCalculos[".nSecOptions"] = 0;
$tdataCalculos[".nLoginMethod"] = 0;
$tdataCalculos[".recsPerRowList"] = 1;	
$tdataCalculos[".tableGroupBy"] = "0";
$tdataCalculos[".dbType"] = 0;
$tdataCalculos[".mainTableOwnerID"] = "";
$tdataCalculos[".moveNext"] = 1;

$tdataCalculos[".listAjax"] = false;

	$tdataCalculos[".audit"] = false;

	$tdataCalculos[".locking"] = false;
	
$tdataCalculos[".listIcons"] = true;




$tdataCalculos[".showSimpleSearchOptions"] = false;

$tdataCalculos[".showSearchPanel"] = true;


$tdataCalculos[".isUseAjaxSuggest"] = true;



// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataCalculos[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataCalculos[".isUseTimeForSearch"] = false;





$tdataCalculos[".isUseInlineJs"] = $tdataCalculos[".isUseInlineAdd"] || $tdataCalculos[".isUseInlineEdit"];

$tdataCalculos[".allSearchFields"] = array();

$tdataCalculos[".globSearchFields"][] = "calldate";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("calldate", $tdataCalculos[".allSearchFields"]))
{
	$tdataCalculos[".allSearchFields"][] = "calldate";	
}
$tdataCalculos[".globSearchFields"][] = "clid";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("clid", $tdataCalculos[".allSearchFields"]))
{
	$tdataCalculos[".allSearchFields"][] = "clid";	
}
$tdataCalculos[".globSearchFields"][] = "src";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("src", $tdataCalculos[".allSearchFields"]))
{
	$tdataCalculos[".allSearchFields"][] = "src";	
}
$tdataCalculos[".globSearchFields"][] = "dst";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dst", $tdataCalculos[".allSearchFields"]))
{
	$tdataCalculos[".allSearchFields"][] = "dst";	
}
$tdataCalculos[".globSearchFields"][] = "dcontext";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dcontext", $tdataCalculos[".allSearchFields"]))
{
	$tdataCalculos[".allSearchFields"][] = "dcontext";	
}
$tdataCalculos[".globSearchFields"][] = "channel";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("channel", $tdataCalculos[".allSearchFields"]))
{
	$tdataCalculos[".allSearchFields"][] = "channel";	
}
$tdataCalculos[".globSearchFields"][] = "dstchannel";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dstchannel", $tdataCalculos[".allSearchFields"]))
{
	$tdataCalculos[".allSearchFields"][] = "dstchannel";	
}
$tdataCalculos[".globSearchFields"][] = "lastapp";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("lastapp", $tdataCalculos[".allSearchFields"]))
{
	$tdataCalculos[".allSearchFields"][] = "lastapp";	
}
$tdataCalculos[".globSearchFields"][] = "lastdata";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("lastdata", $tdataCalculos[".allSearchFields"]))
{
	$tdataCalculos[".allSearchFields"][] = "lastdata";	
}
$tdataCalculos[".globSearchFields"][] = "duration";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("duration", $tdataCalculos[".allSearchFields"]))
{
	$tdataCalculos[".allSearchFields"][] = "duration";	
}
$tdataCalculos[".globSearchFields"][] = "billsec";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("billsec", $tdataCalculos[".allSearchFields"]))
{
	$tdataCalculos[".allSearchFields"][] = "billsec";	
}
$tdataCalculos[".globSearchFields"][] = "disposition";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("disposition", $tdataCalculos[".allSearchFields"]))
{
	$tdataCalculos[".allSearchFields"][] = "disposition";	
}
$tdataCalculos[".globSearchFields"][] = "amaflags";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("amaflags", $tdataCalculos[".allSearchFields"]))
{
	$tdataCalculos[".allSearchFields"][] = "amaflags";	
}
$tdataCalculos[".globSearchFields"][] = "accountcode";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("accountcode", $tdataCalculos[".allSearchFields"]))
{
	$tdataCalculos[".allSearchFields"][] = "accountcode";	
}
$tdataCalculos[".globSearchFields"][] = "uniqueid";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("uniqueid", $tdataCalculos[".allSearchFields"]))
{
	$tdataCalculos[".allSearchFields"][] = "uniqueid";	
}
$tdataCalculos[".globSearchFields"][] = "userfield";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("userfield", $tdataCalculos[".allSearchFields"]))
{
	$tdataCalculos[".allSearchFields"][] = "userfield";	
}



	

$tdataCalculos[".isDisplayLoading"] = true;

$tdataCalculos[".isResizeColumns"] = false;


$tdataCalculos[".createLoginPage"] = true;


 	



$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataCalculos[".strOrderBy"] = $gstrOrderBy;
	
$tdataCalculos[".orderindexes"] = array();

$tdataCalculos[".sqlHead"] = "SELECT calldate,  clid,  src,  dst,  dcontext,  channel,  dstchannel,  lastapp,  lastdata,  duration,  billsec,  disposition,  amaflags,  accountcode,  uniqueid,  userfield";

$tdataCalculos[".sqlFrom"] = "FROM cdr";

$tdataCalculos[".sqlWhereExpr"] = "src like '%7914%'";

$tdataCalculos[".sqlTail"] = "";



	$tableKeys=array();
	$tdataCalculos[".Keys"]=$tableKeys;

	
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
			
				$fdata["FieldPermissions"]=true;
						$tdataCalculos["calldate"]=$fdata;
	
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
		
				$fdata["FieldPermissions"]=true;
						$tdataCalculos["clid"]=$fdata;
	
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
		
				$fdata["FieldPermissions"]=true;
						$tdataCalculos["src"]=$fdata;
	
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
		
				$fdata["FieldPermissions"]=true;
						$tdataCalculos["dst"]=$fdata;
	
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
		
				$fdata["FieldPermissions"]=true;
						$tdataCalculos["dcontext"]=$fdata;
	
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
		
				$fdata["FieldPermissions"]=true;
						$tdataCalculos["channel"]=$fdata;
	
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
		
				$fdata["FieldPermissions"]=true;
						$tdataCalculos["dstchannel"]=$fdata;
	
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
		
				$fdata["FieldPermissions"]=true;
						$tdataCalculos["lastapp"]=$fdata;
	
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
		
				$fdata["FieldPermissions"]=true;
						$tdataCalculos["lastdata"]=$fdata;
	
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
			
				$fdata["FieldPermissions"]=true;
						$tdataCalculos["duration"]=$fdata;
	
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
			
				$fdata["FieldPermissions"]=true;
						$tdataCalculos["billsec"]=$fdata;
	
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
		
				$fdata["FieldPermissions"]=true;
						$tdataCalculos["disposition"]=$fdata;
	
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
			
				$fdata["FieldPermissions"]=true;
						$tdataCalculos["amaflags"]=$fdata;
	
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
		
				$fdata["FieldPermissions"]=true;
						$tdataCalculos["accountcode"]=$fdata;
	
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
		
				$fdata["FieldPermissions"]=true;
						$tdataCalculos["uniqueid"]=$fdata;
	
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
		
				$fdata["FieldPermissions"]=true;
						$tdataCalculos["userfield"]=$fdata;

$tdataCalculos[".chartXml"] = '<chart>
<attr value="tables">
	<attr value="0">Calculos</attr>
</attr>
<attr value="chart_type">
	<attr value="type">area</attr>
</attr>

<attr value="parameters">
<attr value="0">
<attr value="name">duration</attr>
<attr value="currencyFormat">0</attr>
<attr value="decimalFormat">0</attr>
<attr value="customFormat">0</attr>
<attr value="customFormatStr"></attr>
</attr>
<attr value="1">
<attr value="name">billsec</attr>
<attr value="currencyFormat">0</attr>
<attr value="decimalFormat">0</attr>
<attr value="customFormat">0</attr>
<attr value="customFormatStr"></attr>
</attr>
<attr value="2">
<attr value="name">clid</attr>
</attr>
</attr>


<attr value="appearance">
	<attr value="scolor11">FF0000</attr>
	<attr value="scolor12">FF0000</attr>
	<attr value="scolor21">008000</attr>
	<attr value="scolor22">008000</attr>

<attr value="nameTypeHeader">Text</attr>
<attr value="nameTypeFooter">Text</attr>

<attr value="head">Chart Title</attr>

<attr value="foot">Legend Title</attr>

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
		<attr value="name">calldate</attr>
		<attr value="label">Calldate</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="1">
		<attr value="name">clid</attr>
		<attr value="label">Clid</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="2">
		<attr value="name">src</attr>
		<attr value="label">Src</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="3">
		<attr value="name">dst</attr>
		<attr value="label">Dst</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="4">
		<attr value="name">dcontext</attr>
		<attr value="label">Dcontext</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="5">
		<attr value="name">channel</attr>
		<attr value="label">Channel</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="6">
		<attr value="name">dstchannel</attr>
		<attr value="label">Dstchannel</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="7">
		<attr value="name">lastapp</attr>
		<attr value="label">Lastapp</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="8">
		<attr value="name">lastdata</attr>
		<attr value="label">Lastdata</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="9">
		<attr value="name">duration</attr>
		<attr value="label">Duration</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="10">
		<attr value="name">billsec</attr>
		<attr value="label">Billsec</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="11">
		<attr value="name">disposition</attr>
		<attr value="label">Disposition</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="12">
		<attr value="name">amaflags</attr>
		<attr value="label">Amaflags</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="13">
		<attr value="name">accountcode</attr>
		<attr value="label">Accountcode</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="14">
		<attr value="name">uniqueid</attr>
		<attr value="label">Uniqueid</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="15">
		<attr value="name">userfield</attr>
		<attr value="label">Userfield</attr>
		<attr value="search"></attr>
	</attr>
</attr>


<attr value="settings">
<attr value="name">calldate</attr>
<attr value="short_table_name">Calculos</attr>
</attr>

</chart>';
	
$tables_data["Calculos"]=&$tdataCalculos;
$field_labels["Calculos"] = &$fieldLabelsCalculos;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Calculos"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Calculos"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "calldate,  clid,  src,  dst,  dcontext,  channel,  dstchannel,  lastapp,  lastdata,  duration,  billsec,  disposition,  amaflags,  accountcode,  uniqueid,  userfield";
$proto0["m_strFrom"] = "FROM cdr";
$proto0["m_strWhere"] = "src like '%7914%'";
$proto0["m_strOrderBy"] = "";
$proto0["m_strTail"] = "";
$proto1=array();
$proto1["m_sql"] = "src like '%7914%'";
$proto1["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "src",
	"m_strTable" => "cdr"
));

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
$proto1["m_strCase"] = "like '%7914%'";
$proto1["m_havingmode"] = "0";
$proto1["m_inBrackets"] = "0";
$proto1["m_useAlias"] = "0";
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
$proto3["m_havingmode"] = "0";
$proto3["m_inBrackets"] = "0";
$proto3["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3);

$proto0["m_having"] = $obj;
$proto0["m_fieldlist"] = array();
						$proto5=array();
			$obj = new SQLField(array(
	"m_strName" => "calldate",
	"m_strTable" => "cdr"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "clid",
	"m_strTable" => "cdr"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "src",
	"m_strTable" => "cdr"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "dst",
	"m_strTable" => "cdr"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "dcontext",
	"m_strTable" => "cdr"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "channel",
	"m_strTable" => "cdr"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "dstchannel",
	"m_strTable" => "cdr"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "lastapp",
	"m_strTable" => "cdr"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "lastdata",
	"m_strTable" => "cdr"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "duration",
	"m_strTable" => "cdr"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "billsec",
	"m_strTable" => "cdr"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "disposition",
	"m_strTable" => "cdr"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "amaflags",
	"m_strTable" => "cdr"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "accountcode",
	"m_strTable" => "cdr"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
						$proto33=array();
			$obj = new SQLField(array(
	"m_strName" => "uniqueid",
	"m_strTable" => "cdr"
));

$proto33["m_expr"]=$obj;
$proto33["m_alias"] = "";
$obj = new SQLFieldListItem($proto33);

$proto0["m_fieldlist"][]=$obj;
						$proto35=array();
			$obj = new SQLField(array(
	"m_strName" => "userfield",
	"m_strTable" => "cdr"
));

$proto35["m_expr"]=$obj;
$proto35["m_alias"] = "";
$obj = new SQLFieldListItem($proto35);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto37=array();
$proto37["m_link"] = "SQLL_MAIN";
			$proto38=array();
$proto38["m_strName"] = "cdr";
$proto38["m_columns"] = array();
$proto38["m_columns"][] = "calldate";
$proto38["m_columns"][] = "clid";
$proto38["m_columns"][] = "src";
$proto38["m_columns"][] = "dst";
$proto38["m_columns"][] = "dcontext";
$proto38["m_columns"][] = "channel";
$proto38["m_columns"][] = "dstchannel";
$proto38["m_columns"][] = "lastapp";
$proto38["m_columns"][] = "lastdata";
$proto38["m_columns"][] = "duration";
$proto38["m_columns"][] = "billsec";
$proto38["m_columns"][] = "disposition";
$proto38["m_columns"][] = "amaflags";
$proto38["m_columns"][] = "accountcode";
$proto38["m_columns"][] = "uniqueid";
$proto38["m_columns"][] = "userfield";
$obj = new SQLTable($proto38);

$proto37["m_table"] = $obj;
$proto37["m_alias"] = "";
$proto39=array();
$proto39["m_sql"] = "";
$proto39["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto39["m_column"]=$obj;
$proto39["m_contained"] = array();
$proto39["m_strCase"] = "";
$proto39["m_havingmode"] = "0";
$proto39["m_inBrackets"] = "0";
$proto39["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto39);

$proto37["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto37);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

$queryData_Calculos = $obj;
$tdataCalculos[".sqlquery"] = $queryData_Calculos;



?>
