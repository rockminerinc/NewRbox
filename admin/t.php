<?php
include "header.php";
require_once('../common.inc.php');
$tid =$_REQUEST['id'];
//$sql1="SELECT t.cp_id,t.name from ".$prefix."tag t where t.id=".$tid."";
//$DB->db_query($sql1);
//$rs1 = $DB->db_fetch_array();

 
//$sql="select * from ".$prefix."chanpin  where id = ".$cid."";
//$DB->db_query($sql);
//$rs = $DB->db_fetch_array();
 
	if ($tid)
	{
			$DB->db_query("SELECT max(level) as id from {$db_prefix}tag ");
			$rsmax = $DB->db_fetch_array();
			$maxid=$rsmax['id'];
			$maxid++;
			echo $maxid;
			$exec="UPDATE ".$prefix."tag SET level =".$maxid." WHERE id=".$tid;
			$DB->db_query($exec);
			echo "ok!";

	}

?>
