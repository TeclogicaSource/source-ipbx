<?php
ini_set("display_errors","1");
ini_set("display_startup_errors","1");
include("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT");

include("include/reportfunctions.php");


$conn=db_connect();

if ( isset($_POST['type']) && isset( $_POST['web'] ) ) {

    if ( $_POST['type'] == "new" )
    {
        unset( $_SESSION[$_POST['web']] );
		$_SESSION[$_POST['web']]['db-based'] = 1;	
        echo "OK";
    }
    elseif ( $_POST['type'] == "open" )
    {
        $xml = new xml();

        if ( $_POST['web'] == "webreports" ) {
                        	if (count(GetUserGroups()) > 1)
	            {
        	        $arr_reports = array();
                	$arr_reports = GetReportsList();
	                foreach ( $arr_reports as $rpt ) {
        	            if (( $rpt["owner"] != @$_SESSION["UserID"] || $rpt["owner"] == "") && $rpt["view"]==0 && $_SESSION['webreports']['settings']['name']==$rpt["name"])
                	    {
                        	echo "<p>You don't have permissions to view this report</p>";
	                        exit;
        	            }
                	}
	            }
            $str_xml = LoadSelectedReport( $_POST['name'] );
            $_SESSION['webreports'] = $xml->xml_to_array( $str_xml );
            $_SESSION["webobject"]["name"]=$_SESSION['webreports']['settings']['name'];
        } else {
            	            if (count(GetUserGroups()) > 1)
        	    {
                	$arr_reports = array();
	                $arr_reports = GetChartsList();
        	        foreach ( $arr_reports as $rpt ) {
                	    if (( $rpt["owner"] != @$_SESSION["UserID"] || $rpt["owner"] == "") && $rpt["view"]==0 && $_SESSION['webcharts']['settings']['name']==$rpt["name"])
                    	{
                        	echo "<p>You don't have permissions to view this chart</p>";
	                        exit;
        	            }
                	}
	            }
            $str_xml = LoadSelectedChart( $_POST['name'] );
            $_SESSION['webcharts'] = $xml->xml_to_array( $str_xml );
			$_SESSION['webcharts']=Convert_Old_Chart($_SESSION['webcharts']);
            $_SESSION["webobject"]["name"]=$_SESSION['webcharts']['settings']['name'];
        }

        echo "OK";
    }
	$_SESSION["webobject"]["db-based"]=@$_SESSION[$_POST['web']]['db-based'];
}
?>