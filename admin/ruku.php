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
	$ruku_time =strtotime(trim($_POST['regdate']));//time(); //date('Y-m-d');
	//echo time();

	//$customer = trim($_POST['customer']);

	//$pro_name = trim($_POST['pro_name']);
	$pro_id = trim($_POST['pro_id']);
	$pro_num = trim($_POST['pro_num']);
	$memo = trim($_POST['memo']);
	//$pro_amount = trim($_POST['pro_amount']);
	//$time=time(); 





	if(strcmp($ruku_time, "")){	
 
			$DB->db_query("INSERT INTO kucun_buyin (btime,pid,bnum,memo) VALUES ('$ruku_time','$pro_id','$pro_num','$memo')");
			//$oid = $DB->db_insertID();
			echo "<BR><H1>OK!</H1><BR>";

 			$rs=$DB->db_query('UPDATE kucun_products SET pnum=pnum+"'.$pro_num.'" WHERE pid='.$pro_id);
			echo "<br>pnum ok!";


	}
?>



<form action="ruku.php" method="post" >
<table border=0>

 
  <tr> <td>入库时间: </td><td> <input class="input" type=text name="regdate" size=12 onclick="fPopCalendar(regdate,regdate);return false" type="text"  value = "<?php echo date("Y-m-d",time());?>"></td></tr>

  <tr> <td>产品ID: </td><td> <input type=text name="pro_id" value="<?php echo $pid;?>" size=50 readonly="true"/> </td></tr>
   <tr> <td>数量: </td><td> <input type=text name="pro_num" size=50> </td></tr>
   <tr> <td>备注: </td><td> <textarea name="memo" rows="5" cols="35" class="textarea"></textarea>  </td></tr>

</table>
<input type=submit name=submit value=提交>
</form>
</CENTER>

 
</body>
</html>