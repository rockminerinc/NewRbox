<?php
include "header.php";
require_once('../common.inc.php');
$tid =$_REQUEST['tid'];
$sql1="SELECT * from ".$prefix."note  where id=".$tid."";
$DB->db_query($sql1);
$rs = $DB->db_fetch_array();

$time =strtotime(trim($_POST['regdate']));//time(); //date('Y-m-d');

$content = trim($_POST['content']);

$tag = trim($_POST['tag']);
	if(strcmp($time, "")){	
 
			//$DB->db_query("update {$db_prefix}note    (time,content,tag) VALUES ('$time','$content')");
			$DB->db_query('UPDATE note SET time="'.$time.'",content="'.$content.'" ,tag="'.$tag.'"  WHERE id='.$tid);

			//$oid = $DB->db_insertID();
			echo "OK!<BR>";



	}
?>



 

</body>
</html>