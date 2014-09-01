<?php
include "header.php";
require_once('../common.inc.php');
?>

<body bgcolor="#ffffff" >

<basefont size=2 face=arial>

<CENTER><b>添加订单</b>
<?
	
		//$aid = trim($_POST['aid']);
	$aid =$_REQUEST['id'];  //获取订单ID
	$pro_name   = trim($_POST['pro_name']);
	$pro_model = trim($_POST['pro_model']);
	$pro_num = trim($_POST['pro_num']);
	$pro_price = trim($_POST['pro_price']);
	$pro_memo = trim($_POST['pro_memo']);


	if(strcmp($pro_name, "")){	
 
 			$DB->db_query('UPDATE xunjia_chanpin SET NAME="'.$pro_name.'",XINGHAO="'.$pro_model.'" ,NUM="'.$pro_num.'",JIAGE="'.$pro_price.'",BEIZHU="'.$pro_memo.'" WHERE ID='.$aid);
			echo "ok!<BR> ";
				fowor_reload();


	}
?>





 
</body>
</html>