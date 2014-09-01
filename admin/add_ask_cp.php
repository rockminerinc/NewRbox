<?php
/*
添加询价对应产品
*/
include "header.php";
require_once('../common.inc.php');

?>

<body bgcolor="#ffffff" >

<basefont size=2 face=arial>

<CENTER><b>添加询价产品</b>
<?
	
$tid =$_REQUEST['id'];  //获取订单ID

if(isset($_POST['submit'])) 
{

	$pro_name   = trim($_POST['pro_name']);
	$pro_model = trim($_POST['pro_model']);
	$pro_num = trim($_POST['pro_num']);
	$pro_price = trim($_POST['pro_price']);
	$pro_amount = trim($_POST['pro_amount']);
	$pro_memo = trim($_POST['pro_memo']);

	if(strcmp($pro_name, "")&&strcmp($pro_model, "")&&strcmp($pro_price, "")){	
 
			$DB->db_query("INSERT INTO xunjia_chanpin (XUNJIA_ID,NAME,XINGHAO,NUM,JIAGE,BEIZHU) VALUES ('$tid','$pro_name','$pro_model','$pro_num','$pro_price','$pro_memo')");
			//$oid = $DB->db_insertID();
			echo '<BR><H1>OK!</H1><BR><A HREF="add_ask_cp.php?id='.$tid.'">继续添加</A>';
			fowor_reload();

	}
	else echo '请填写完整!<A HREF="add_ask_cp.php?id='.$tid.'">继续添加</A>';
}
//else echo "shit!";
?>

<BR><BR>
<B>按照合同上的名称填写完整</B>
<BR>
<form action="add_ask_cp.php?id=<?php echo $tid;?>" method="post" >
<table border=1>

 
  <tr> <td>询单号: </td><td> <?php echo $tid;?></td></tr>

  <tr> <td>名称: </td><td> <input type=text name="pro_name" size=50> </td></tr>
  <tr> <td>型号: </td><td> <input type=text name="pro_model" size=50> </td></tr>
  <tr> <td>单价: </td><td> <input type=text name="pro_price" size=50> </td></tr>
  <tr> <td>数量: </td><td> <input type=text name="pro_num" size=50> </td></tr>
  <tr> <td>备注: </td><td>  <input type=text name="pro_memo" size=50> </td></tr>

</table>
<input type=submit name=submit value=提交>
</form>
</CENTER>
<?PHP
$DB->close();
?>
 
</body>
</html>