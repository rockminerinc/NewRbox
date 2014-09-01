<?php
include "header.php";
require_once('../common.inc.php');
?>

<body >

<basefont size=2 face=arial>

<CENTER><b>修改订单进程</b>
<?
	
 	$oid=$_REQUEST['id'];  //获取订单ID
	$hetong=trim($_POST['hetong']);
	$fahuo=trim($_POST['fahuo']);
	$fukuan=trim($_POST['fukuan']);
 	$tuzhi=trim($_POST['tuzhi']);
 
 

	if(isset($_POST['submit'])){	
 
 	$DB->db_query('UPDATE order_progress SET hetong="'.$hetong.'",fahuo="'.$fahuo.'" ,fukuan="'.$fukuan.'",tuzhi="'.$tuzhi.'"   WHERE order_id='.$oid);
			//$oid = $DB->db_insertID();
			echo "编辑成功!<BR> ";

	}
?>





 
</body>
</html>