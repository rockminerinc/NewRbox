<?php
include "header.php";
require_once('../common.inc.php');
$pid =$_REQUEST['id'];

?>

<body bgcolor="#ffffff" >

<basefont size=2 face=arial>

<CENTER><b>添加订单</b>
<?
	

	//$com_name   = trim($_POST['com_name']);
	//$ruku_time =strtotime(trim($_POST['regdate']));//time(); //date('Y-m-d');
	//echo time();

	//$customer = trim($_POST['customer']);

	//$pro_name = trim($_POST['pro_name']);
	$pro_name = trim($_POST['pro_name']);
	$pro_num = trim($_POST['pro_num']);
	//$memo = trim($_POST['memo']);
	//$pro_amount = trim($_POST['pro_amount']);
	//$time=time(); 





	if(strcmp($pro_name, "")){	
 
			$DB->db_query("INSERT INTO kucun_products (pname,pnum) VALUES ('$pro_name','$pro_num')");
			//$oid = $DB->db_insertID();
			echo "<BR><H1>OK!</H1><BR>";
 


	}
?>



<form action="kucun_add.php" method="post" >
<table border=0>

 
 
  <tr> <td>名称: </td><td> <input type=text name="pro_name"  size=50 /> </td></tr>
   <tr> <td>数量: </td><td> <input type=text name="pro_num" size=50> </td></tr>
 
</table>
<input type=submit name=submit value=提交>
</form>
</CENTER>

 
</body>
</html>