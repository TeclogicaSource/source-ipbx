<?php
require "include/phpfunctions.php";

$cCharset = "Windows-1252";

$queryString = getQueryString();

if (!isset($queryString) || empty($queryString)) {
	return;
}
$yuiFiles    = explode("&", $queryString);
$contentType = strpos($yuiFiles[0], ".js") ? 'application/x-javascript' : ' text/css';


$yuiComponents = array();

if($contentType=='application/x-javascript')
{
	foreach($yuiFiles as $yuiFile) {
		$parts = explode("/", $yuiFile);
		if(count($parts) == 4)
		{
			if (isset($parts[0]) && isset($parts[1]) && isset($parts[2])) {
				//Add module to array for loading
				$yuiComponents[] = $parts[2]."/".$parts[2];
			} else {
			die('<!-- Unable to determine module name! '.$yuiFile.' -->');
			}
		}
		else
		{
			$start = strpos($yuiFile, "/build/");
			if($start === FALSE)
				die('<!-- Unable to determine module name! '.$yuiFile.' -->');
			$start += strlen("/build/");
			$end = strpos($yuiFile, ".js");
			if($end === FALSE)
				die('<!-- Unable to determine module name! '.$yuiFile.' -->');
			$yuiComponents[] = substr($yuiFile, $start, $end - $start);
		}
	}
	$library = myfile_get_contents(getabspath("include/yui/yui.lib"));
}
else
{
//	css
	foreach($yuiFiles as $yuiFile) {
		$start = strpos($yuiFile, "/build/");
		if($start === FALSE)
			die('<!-- Unable to determine module name! '.$yuiFile.' -->');
		$start += strlen("/build/");
		$yuiComponents[] = substr($yuiFile, $start);
	}
	$library = myfile_get_contents(getabspath("include/yui/yuicss.lib"));
}

header("Cache-Control: max-age=315360000");
header("Expires: Expires: Thu, 29 Oct 2020 20:00:00 GMT");
header("Content-Type: " . $contentType);

foreach($yuiComponents as $y)
{
	$start = strpos($library, "begincombofile ".$y);
	if($start === FALSE)
	{
		die("Unknown file ".$y);
	}
	$start += strlen("begincombofile ".$y);
	$end = strpos($library, "endcombofile", $start);
	if($end === FALSE)
	{
		die("Unknown file ".$y);
	}
	echo substr($library, $start, $end - $start);
}
?>