<?php

//	field labels
$fieldLabelsqueue_member_table = array();
$fieldLabelsqueue_member_table["Portuguese(Brazil)"]=array();
$fieldLabelsqueue_member_table["Portuguese(Brazil)"]["membername"] = "Agente";
$fieldLabelsqueue_member_table["Portuguese(Brazil)"]["queue_name"] = "Nome da Fila";
$fieldLabelsqueue_member_table["Portuguese(Brazil)"]["penalty"] = "Prioridade";
$fieldLabelsqueue_member_table["Portuguese(Brazil)"]["paused"] = "Pausa";
$fieldLabelsqueue_member_table["Portuguese(Brazil)"]["interface"] = "Interface";
$fieldLabelsqueue_member_table["Portuguese(Brazil)"]["uniqueid"] = "Uniqueid";
$fieldLabelsqueue_member_table["Portuguese(Brazil)"]["Ramal"] = "Ramal";


$tdataqueue_member_table=array();
	$tdataqueue_member_table[".NumberOfChars"]=80; 
	$tdataqueue_member_table[".ShortName"]="queue_member_table";
	$tdataqueue_member_table[".OwnerID"]="";
	$tdataqueue_member_table[".OriginalTable"]="queue_member_table";
	$tdataqueue_member_table[".NCSearch"]=true;
	

$tdataqueue_member_table[".shortTableName"] = "queue_member_table";
$tdataqueue_member_table[".dataSourceTable"] = "queue_member_table";
$tdataqueue_member_table[".nSecOptions"] = 0;
$tdataqueue_member_table[".nLoginMethod"] = 1;
$tdataqueue_member_table[".recsPerRowList"] = 1;	
$tdataqueue_member_table[".tableGroupBy"] = "0";
$tdataqueue_member_table[".dbType"] = 0;
$tdataqueue_member_table[".mainTableOwnerID"] = "";
$tdataqueue_member_table[".moveNext"] = 1;

$tdataqueue_member_table[".listAjax"] = true;

	$tdataqueue_member_table[".audit"] = true;

	$tdataqueue_member_table[".locking"] = false;
	
$tdataqueue_member_table[".listIcons"] = true;



$tdataqueue_member_table[".delete"] = true;

$tdataqueue_member_table[".showSimpleSearchOptions"] = false;

$tdataqueue_member_table[".showSearchPanel"] = true;


$tdataqueue_member_table[".isUseAjaxSuggest"] = true;

$tdataqueue_member_table[".rowHighlite"] = true;

$tdataqueue_member_table[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataqueue_member_table[".arrKeyFields"][] = "uniqueid";

// use datepicker for search panel
$tdataqueue_member_table[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataqueue_member_table[".isUseTimeForSearch"] = false;






$tdataqueue_member_table[".isUseInlineJs"] = $tdataqueue_member_table[".isUseInlineAdd"] || $tdataqueue_member_table[".isUseInlineEdit"];

$tdataqueue_member_table[".allSearchFields"] = array();



$tdataqueue_member_table[".isDynamicPerm"] = true;

	

$tdataqueue_member_table[".isDisplayLoading"] = true;

$tdataqueue_member_table[".isResizeColumns"] = false;


$tdataqueue_member_table[".createLoginPage"] = true;


 	




$tdataqueue_member_table[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataqueue_member_table[".strOrderBy"] = $gstrOrderBy;
	
$tdataqueue_member_table[".orderindexes"] = array();

$tdataqueue_member_table[".sqlHead"] = "select distinct queue_member_table.uniqueid AS uniqueid,  queue_member_table.membername AS membername,  queue_member_table.queue_name AS queue_name,  queue_member_table.`interface` AS `interface`,  queue_member_table.penalty AS penalty,  queue_member_table.paused AS paused,  ir.name AS Ramal";

$tdataqueue_member_table[".sqlFrom"] = "FROM queue_member_table  , ipbx_ramais AS ir  , ipbx_interf AS ii";

$tdataqueue_member_table[".sqlWhereExpr"] = "(queue_member_table.`interface` like 'SIP%'   AND ir.name = substr(queue_member_table.interface,5))   OR (queue_member_table.`interface` = concat('khomp/b',ii.board,'c', ident_interf)   OR queue_member_table.interface like '%/%/%'  AND ir.id_interf = ii.id_interf)";

$tdataqueue_member_table[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="uniqueid";
	$tdataqueue_member_table[".Keys"]=$tableKeys;

	
//	uniqueid
	$fdata = array();
	$fdata["strName"] = "uniqueid";
	$fdata["ownerTable"] = "queue_member_table";
		$fdata["Label"]="Uniqueid"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "uniqueid";
		$fdata["FullName"]= "queue_member_table.uniqueid";
						$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataqueue_member_table["uniqueid"]=$fdata;
	
//	membername
	$fdata = array();
	$fdata["strName"] = "membername";
	$fdata["ownerTable"] = "queue_member_table";
		$fdata["Label"]="Agente"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "membername";
		$fdata["FullName"]= "queue_member_table.membername";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=40";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataqueue_member_table["membername"]=$fdata;
	
//	queue_name
	$fdata = array();
	$fdata["strName"] = "queue_name";
	$fdata["ownerTable"] = "queue_member_table";
		$fdata["Label"]="Nome da Fila"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "queue_name";
		$fdata["FullName"]= "queue_member_table.queue_name";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=128";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataqueue_member_table["queue_name"]=$fdata;
	
//	interface
	$fdata = array();
	$fdata["strName"] = "interface";
	$fdata["ownerTable"] = "queue_member_table";
		$fdata["Label"]="Interface"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "interface";
		$fdata["FullName"]= "queue_member_table.`interface`";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataqueue_member_table["interface"]=$fdata;
	
//	penalty
	$fdata = array();
	$fdata["strName"] = "penalty";
	$fdata["ownerTable"] = "queue_member_table";
		$fdata["Label"]="Prioridade"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "penalty";
		$fdata["FullName"]= "queue_member_table.penalty";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataqueue_member_table["penalty"]=$fdata;
	
//	paused
	$fdata = array();
	$fdata["strName"] = "paused";
	$fdata["ownerTable"] = "queue_member_table";
		$fdata["Label"]="Pausa"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "paused";
		$fdata["FullName"]= "queue_member_table.paused";
						$fdata["Index"]= 6;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataqueue_member_table["paused"]=$fdata;
	
//	Ramal
	$fdata = array();
	$fdata["strName"] = "Ramal";
	$fdata["ownerTable"] = "ipbx_ramais";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Ramal";
		$fdata["FullName"]= "ir.name";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataqueue_member_table["Ramal"]=$fdata;

	
$tables_data["queue_member_table"]=&$tdataqueue_member_table;
$field_labels["queue_member_table"] = &$fieldLabelsqueue_member_table;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["queue_member_table"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["queue_member_table"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2607=array();
$proto2607["m_strHead"] = "select distinct";
$proto2607["m_strFieldList"] = "queue_member_table.uniqueid AS uniqueid,  queue_member_table.membername AS membername,  queue_member_table.queue_name AS queue_name,  queue_member_table.`interface` AS `interface`,  queue_member_table.penalty AS penalty,  queue_member_table.paused AS paused,  ir.name AS Ramal";
$proto2607["m_strFrom"] = "FROM queue_member_table  , ipbx_ramais AS ir  , ipbx_interf AS ii";
$proto2607["m_strWhere"] = "(queue_member_table.`interface` like 'SIP%'   AND ir.name = substr(queue_member_table.interface,5))   OR (queue_member_table.`interface` = concat('khomp/b',ii.board,'c', ident_interf)   OR queue_member_table.interface like '%/%/%'  AND ir.id_interf = ii.id_interf)";
$proto2607["m_strOrderBy"] = "";
$proto2607["m_strTail"] = "";
$proto2608=array();
$proto2608["m_sql"] = "(queue_member_table.`interface` like 'SIP%'   AND ir.name = substr(queue_member_table.interface,5))   OR (queue_member_table.`interface` = concat('khomp/b',ii.board,'c', ident_interf)   OR queue_member_table.interface like '%/%/%'  AND ir.id_interf = ii.id_interf)";
$proto2608["m_uniontype"] = "SQLL_OR";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(queue_member_table.`interface` like 'SIP%'   AND ir.name = substr(queue_member_table.interface,5))   OR (queue_member_table.`interface` = concat('khomp/b',ii.board,'c', ident_interf)   OR queue_member_table.interface like '%/%/%'  AND ir.id_interf = ii.id_interf)"
));

$proto2608["m_column"]=$obj;
$proto2608["m_contained"] = array();
						$proto2610=array();
$proto2610["m_sql"] = "queue_member_table.`interface` like 'SIP%'   AND ir.name = substr(queue_member_table.interface,5)";
$proto2610["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "queue_member_table.`interface` like 'SIP%'   AND ir.name = substr(queue_member_table.interface,5)"
));

$proto2610["m_column"]=$obj;
$proto2610["m_contained"] = array();
						$proto2612=array();
$proto2612["m_sql"] = "queue_member_table.`interface` like 'SIP%'";
$proto2612["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "interface",
	"m_strTable" => "queue_member_table"
));

$proto2612["m_column"]=$obj;
$proto2612["m_contained"] = array();
$proto2612["m_strCase"] = "like 'SIP%'";
$proto2612["m_havingmode"] = "0";
$proto2612["m_inBrackets"] = "0";
$proto2612["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2612);

			$proto2610["m_contained"][]=$obj;
						$proto2614=array();
$proto2614["m_sql"] = "ir.name = substr(queue_member_table.interface,5)";
$proto2614["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "name",
	"m_strTable" => "ir"
));

$proto2614["m_column"]=$obj;
$proto2614["m_contained"] = array();
$proto2614["m_strCase"] = "= substr(queue_member_table.interface,5)";
$proto2614["m_havingmode"] = "0";
$proto2614["m_inBrackets"] = "0";
$proto2614["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2614);

			$proto2610["m_contained"][]=$obj;
$proto2610["m_strCase"] = "";
$proto2610["m_havingmode"] = "0";
$proto2610["m_inBrackets"] = "1";
$proto2610["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2610);

			$proto2608["m_contained"][]=$obj;
						$proto2616=array();
$proto2616["m_sql"] = "queue_member_table.`interface` = concat('khomp/b',ii.board,'c', ident_interf)   OR queue_member_table.interface like '%/%/%'  AND ir.id_interf = ii.id_interf";
$proto2616["m_uniontype"] = "SQLL_OR";
	$obj = new SQLNonParsed(array(
	"m_sql" => "queue_member_table.`interface` = concat('khomp/b',ii.board,'c', ident_interf)   OR queue_member_table.interface like '%/%/%'  AND ir.id_interf = ii.id_interf"
));

$proto2616["m_column"]=$obj;
$proto2616["m_contained"] = array();
						$proto2618=array();
$proto2618["m_sql"] = "queue_member_table.`interface` = concat('khomp/b',ii.board,'c', ident_interf)";
$proto2618["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "interface",
	"m_strTable" => "queue_member_table"
));

$proto2618["m_column"]=$obj;
$proto2618["m_contained"] = array();
$proto2618["m_strCase"] = "= concat('khomp/b',ii.board,'c', ident_interf)";
$proto2618["m_havingmode"] = "0";
$proto2618["m_inBrackets"] = "0";
$proto2618["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2618);

			$proto2616["m_contained"][]=$obj;
						$proto2620=array();
$proto2620["m_sql"] = "queue_member_table.interface like '%/%/%'  AND ir.id_interf = ii.id_interf";
$proto2620["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "queue_member_table.interface like '%/%/%'  AND ir.id_interf = ii.id_interf"
));

$proto2620["m_column"]=$obj;
$proto2620["m_contained"] = array();
						$proto2622=array();
$proto2622["m_sql"] = "queue_member_table.interface like '%/%/%'";
$proto2622["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "interface",
	"m_strTable" => "queue_member_table"
));

$proto2622["m_column"]=$obj;
$proto2622["m_contained"] = array();
$proto2622["m_strCase"] = "like '%/%/%'";
$proto2622["m_havingmode"] = "0";
$proto2622["m_inBrackets"] = "0";
$proto2622["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2622);

			$proto2620["m_contained"][]=$obj;
						$proto2624=array();
$proto2624["m_sql"] = "ir.id_interf = ii.id_interf";
$proto2624["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "ir"
));

$proto2624["m_column"]=$obj;
$proto2624["m_contained"] = array();
$proto2624["m_strCase"] = "= ii.id_interf";
$proto2624["m_havingmode"] = "0";
$proto2624["m_inBrackets"] = "0";
$proto2624["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2624);

			$proto2620["m_contained"][]=$obj;
$proto2620["m_strCase"] = "";
$proto2620["m_havingmode"] = "0";
$proto2620["m_inBrackets"] = "0";
$proto2620["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2620);

			$proto2616["m_contained"][]=$obj;
$proto2616["m_strCase"] = "";
$proto2616["m_havingmode"] = "0";
$proto2616["m_inBrackets"] = "1";
$proto2616["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2616);

			$proto2608["m_contained"][]=$obj;
$proto2608["m_strCase"] = "";
$proto2608["m_havingmode"] = "0";
$proto2608["m_inBrackets"] = "0";
$proto2608["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2608);

$proto2607["m_where"] = $obj;
$proto2626=array();
$proto2626["m_sql"] = "";
$proto2626["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2626["m_column"]=$obj;
$proto2626["m_contained"] = array();
$proto2626["m_strCase"] = "";
$proto2626["m_havingmode"] = "0";
$proto2626["m_inBrackets"] = "0";
$proto2626["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2626);

$proto2607["m_having"] = $obj;
$proto2607["m_fieldlist"] = array();
						$proto2628=array();
			$obj = new SQLField(array(
	"m_strName" => "uniqueid",
	"m_strTable" => "queue_member_table"
));

$proto2628["m_expr"]=$obj;
$proto2628["m_alias"] = "uniqueid";
$obj = new SQLFieldListItem($proto2628);

$proto2607["m_fieldlist"][]=$obj;
						$proto2630=array();
			$obj = new SQLField(array(
	"m_strName" => "membername",
	"m_strTable" => "queue_member_table"
));

$proto2630["m_expr"]=$obj;
$proto2630["m_alias"] = "membername";
$obj = new SQLFieldListItem($proto2630);

$proto2607["m_fieldlist"][]=$obj;
						$proto2632=array();
			$obj = new SQLField(array(
	"m_strName" => "queue_name",
	"m_strTable" => "queue_member_table"
));

$proto2632["m_expr"]=$obj;
$proto2632["m_alias"] = "queue_name";
$obj = new SQLFieldListItem($proto2632);

$proto2607["m_fieldlist"][]=$obj;
						$proto2634=array();
			$obj = new SQLField(array(
	"m_strName" => "interface",
	"m_strTable" => "queue_member_table"
));

$proto2634["m_expr"]=$obj;
$proto2634["m_alias"] = "interface";
$obj = new SQLFieldListItem($proto2634);

$proto2607["m_fieldlist"][]=$obj;
						$proto2636=array();
			$obj = new SQLField(array(
	"m_strName" => "penalty",
	"m_strTable" => "queue_member_table"
));

$proto2636["m_expr"]=$obj;
$proto2636["m_alias"] = "penalty";
$obj = new SQLFieldListItem($proto2636);

$proto2607["m_fieldlist"][]=$obj;
						$proto2638=array();
			$obj = new SQLField(array(
	"m_strName" => "paused",
	"m_strTable" => "queue_member_table"
));

$proto2638["m_expr"]=$obj;
$proto2638["m_alias"] = "paused";
$obj = new SQLFieldListItem($proto2638);

$proto2607["m_fieldlist"][]=$obj;
						$proto2640=array();
			$obj = new SQLField(array(
	"m_strName" => "name",
	"m_strTable" => "ir"
));

$proto2640["m_expr"]=$obj;
$proto2640["m_alias"] = "Ramal";
$obj = new SQLFieldListItem($proto2640);

$proto2607["m_fieldlist"][]=$obj;
$proto2607["m_fromlist"] = array();
												$proto2642=array();
$proto2642["m_link"] = "SQLL_MAIN";
			$proto2643=array();
$proto2643["m_strName"] = "queue_member_table";
$proto2643["m_columns"] = array();
$proto2643["m_columns"][] = "uniqueid";
$proto2643["m_columns"][] = "membername";
$proto2643["m_columns"][] = "queue_name";
$proto2643["m_columns"][] = "interface";
$proto2643["m_columns"][] = "penalty";
$proto2643["m_columns"][] = "paused";
$obj = new SQLTable($proto2643);

$proto2642["m_table"] = $obj;
$proto2642["m_alias"] = "";
$proto2644=array();
$proto2644["m_sql"] = "";
$proto2644["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2644["m_column"]=$obj;
$proto2644["m_contained"] = array();
$proto2644["m_strCase"] = "";
$proto2644["m_havingmode"] = "0";
$proto2644["m_inBrackets"] = "0";
$proto2644["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2644);

$proto2642["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2642);

$proto2607["m_fromlist"][]=$obj;
												$proto2646=array();
$proto2646["m_link"] = "SQLL_CROSSJOIN";
			$proto2647=array();
$proto2647["m_strName"] = "ipbx_ramais";
$proto2647["m_columns"] = array();
$proto2647["m_columns"][] = "id";
$proto2647["m_columns"][] = "name";
$proto2647["m_columns"][] = "host";
$proto2647["m_columns"][] = "nat";
$proto2647["m_columns"][] = "type";
$proto2647["m_columns"][] = "accountcode";
$proto2647["m_columns"][] = "amaflags";
$proto2647["m_columns"][] = "call-limit";
$proto2647["m_columns"][] = "callgroup";
$proto2647["m_columns"][] = "callerid";
$proto2647["m_columns"][] = "cancallforward";
$proto2647["m_columns"][] = "canreinvite";
$proto2647["m_columns"][] = "context";
$proto2647["m_columns"][] = "defaultip";
$proto2647["m_columns"][] = "dtmfmode";
$proto2647["m_columns"][] = "fromuser";
$proto2647["m_columns"][] = "fromdomain";
$proto2647["m_columns"][] = "insecure";
$proto2647["m_columns"][] = "language";
$proto2647["m_columns"][] = "mailbox";
$proto2647["m_columns"][] = "md5secret";
$proto2647["m_columns"][] = "deny";
$proto2647["m_columns"][] = "permit";
$proto2647["m_columns"][] = "mask";
$proto2647["m_columns"][] = "musiconhold";
$proto2647["m_columns"][] = "pickupgroup";
$proto2647["m_columns"][] = "qualify";
$proto2647["m_columns"][] = "rtcachefriends";
$proto2647["m_columns"][] = "regexten";
$proto2647["m_columns"][] = "restrictcid";
$proto2647["m_columns"][] = "rtptimeout";
$proto2647["m_columns"][] = "rtpholdtimeout";
$proto2647["m_columns"][] = "secret";
$proto2647["m_columns"][] = "setvar";
$proto2647["m_columns"][] = "disallow";
$proto2647["m_columns"][] = "allow";
$proto2647["m_columns"][] = "fullcontact";
$proto2647["m_columns"][] = "ipaddr";
$proto2647["m_columns"][] = "port";
$proto2647["m_columns"][] = "regserver";
$proto2647["m_columns"][] = "regseconds";
$proto2647["m_columns"][] = "lastms";
$proto2647["m_columns"][] = "username";
$proto2647["m_columns"][] = "defaultuser";
$proto2647["m_columns"][] = "subscribecontext";
$proto2647["m_columns"][] = "useragent";
$proto2647["m_columns"][] = "gateway";
$proto2647["m_columns"][] = "id_horario";
$proto2647["m_columns"][] = "mail";
$proto2647["m_columns"][] = "grava_chamada";
$proto2647["m_columns"][] = "tp_ramal";
$proto2647["m_columns"][] = "Transbordo";
$proto2647["m_columns"][] = "id_interf";
$proto2647["m_columns"][] = "ident_interf";
$proto2647["m_columns"][] = "tp_chamada";
$proto2647["m_columns"][] = "flg_cadeado";
$proto2647["m_columns"][] = "desvio";
$proto2647["m_columns"][] = "id_pesquisa";
$proto2647["m_columns"][] = "desvio_ddr";
$proto2647["m_columns"][] = "id_saida";
$proto2647["m_columns"][] = "id_desvio";
$proto2647["m_columns"][] = "flg_info_centrocusto";
$proto2647["m_columns"][] = "id_painel_op";
$obj = new SQLTable($proto2647);

$proto2646["m_table"] = $obj;
$proto2646["m_alias"] = "ir";
$proto2648=array();
$proto2648["m_sql"] = "";
$proto2648["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2648["m_column"]=$obj;
$proto2648["m_contained"] = array();
$proto2648["m_strCase"] = "";
$proto2648["m_havingmode"] = "0";
$proto2648["m_inBrackets"] = "0";
$proto2648["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2648);

$proto2646["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2646);

$proto2607["m_fromlist"][]=$obj;
												$proto2650=array();
$proto2650["m_link"] = "SQLL_CROSSJOIN";
			$proto2651=array();
$proto2651["m_strName"] = "ipbx_interf";
$proto2651["m_columns"] = array();
$proto2651["m_columns"][] = "id_interf";
$proto2651["m_columns"][] = "dsc_interf";
$proto2651["m_columns"][] = "id_contrato";
$proto2651["m_columns"][] = "board";
$proto2651["m_columns"][] = "link";
$proto2651["m_columns"][] = "usuario";
$proto2651["m_columns"][] = "senha";
$proto2651["m_columns"][] = "ip_host";
$proto2651["m_columns"][] = "id_central";
$proto2651["m_columns"][] = "codec";
$proto2651["m_columns"][] = "id_tp_interf";
$proto2651["m_columns"][] = "tp_chamada";
$proto2651["m_columns"][] = "piloto";
$proto2651["m_columns"][] = "id_chamada";
$proto2651["m_columns"][] = "flg_id_cham_parc";
$proto2651["m_columns"][] = "dtmf";
$proto2651["m_columns"][] = "ddd_localidade";
$proto2651["m_columns"][] = "cd_operadora";
$proto2651["m_columns"][] = "khomp_interf";
$proto2651["m_columns"][] = "flg_logon_remoto";
$proto2651["m_columns"][] = "pers_params";
$proto2651["m_columns"][] = "registro";
$obj = new SQLTable($proto2651);

$proto2650["m_table"] = $obj;
$proto2650["m_alias"] = "ii";
$proto2652=array();
$proto2652["m_sql"] = "";
$proto2652["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2652["m_column"]=$obj;
$proto2652["m_contained"] = array();
$proto2652["m_strCase"] = "";
$proto2652["m_havingmode"] = "0";
$proto2652["m_inBrackets"] = "0";
$proto2652["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2652);

$proto2650["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2650);

$proto2607["m_fromlist"][]=$obj;
$proto2607["m_groupby"] = array();
$proto2607["m_orderby"] = array();
$obj = new SQLQuery($proto2607);

$queryData_queue_member_table = $obj;
$tdataqueue_member_table[".sqlquery"] = $queryData_queue_member_table;



?>
