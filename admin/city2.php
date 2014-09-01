<?php
include "header.php";
require_once('../common.inc.php');
 
$start_sheng = trim($_REQUEST['start_sheng']);
$start_city = trim($_REQUEST['start_city']);
$end_sheng = trim($_REQUEST['end_sheng']);
$end_city = trim($_REQUEST['end_city']);
$express = trim($_REQUEST['express']);
$days = trim($_REQUEST['days']);
$cost = trim($_REQUEST['cost']);

  
 
	if(strcmp($start_sheng, "")&&strcmp($start_city, "")&&strcmp($end_sheng, "")&&strcmp($end_city, "")&&strcmp($express, "")&&strcmp($days, "")&&strcmp($cost, "")){	
 
			$DB->db_query("INSERT INTO wuliu (start_sheng,start_city,end_sheng,end_city,express,days,cost) VALUES ('$start_sheng','$start_city','$end_sheng','$end_city','$express','$days','$cost')");
			//$oid = $DB->db_insertID();
			echo "OK!<BR>";
			echo '<A HREF="city.php">返回</A>';



	}
?>

 