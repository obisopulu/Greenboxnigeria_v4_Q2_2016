<?php
$dbroot = 'root';
$dbpsw = '';
$dbname = 'greenbox';

$cxn = mysql_connect("localhost", $dbroot, $dbpsw);
if (!$cxn)
{
	header("Location:http://www.google.com");
	exit;
}
else if (!mysql_select_db ($dbname, $cxn)) 
{
    mysql_query('CREATE DATABASE '.$dbname);
	mysql_select_db($dbname, $cxn);
	include_once("rab_embed.php");
}
else
{
	mysql_select_db($dbname, $cxn);
	include 'Mobile_Detect.php';
}
?>