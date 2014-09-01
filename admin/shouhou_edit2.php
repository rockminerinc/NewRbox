<?php
include "header.php";
require_once('../common.inc.php');
$tid =$_REQUEST['tid'];
 

$time =strtotime(trim($_POST['regdate']));//time(); //date('Y-m-d');
$chuli_time =strtotime(trim($_POST['regdate2']));//time(); //date('Y-m-d');

$info = trim($_POST['info']);
$chuli = trim($_POST['chuli']);

$zhuangtai = trim($_POST['zhuangtai']);
	if(strcmp($time, "")){	
 
			//$DB->db_query("update {$db_prefix}note    (time,content,tag) VALUES ('$time','$content')");
			$DB->db_query('UPDATE shouhou SET time="'.$time.'",info="'.$info.'" ,chuli="'.$chuli.'" ,chuli_time="'.$chuli_time.'" ,zhuangtai="'.$zhuangtai.'"  WHERE id='.$tid);

			//$oid = $DB->db_insertID();
			echo "OK!<BR>";



	}
?>



 

</body>
</html>