<?php
include "header.php";
require_once('../common.inc.php');
$aid =$_REQUEST['id'];
$DB->db_query("SELECT * from {$db_prefix}ask where id=".$aid);
$rs = $DB->db_fetch_array();
?>

<body bgcolor="#ffffff" >

<basefont size=2 face=arial>

<CENTER><b>修改询价</b>



<form action="edit_ask2.php" method="post" >
<table border=0>

 
  <tr> <td>询价时间: </td><td> <input class="input" type=text name="regdate" size=12 onclick="fPopCalendar(regdate,regdate);return false" type="text"  value="<?php echo date('Y-m-d',$rs['ask_time']);?>" ></td></tr>

  <tr> <td>公司名或地区: </td><td> <input type=text name="com_name" size=50 value="<?php echo $rs['company'];?>"> </td></tr>
  <tr> <td>型号: </td><td> <input type=text name="pro_model" size=50 value="<?php echo $rs['model'];?>"> </td></tr>
  <tr> <td>数量: </td><td> <input type=text name="pro_num" size=50 value="<?php echo $rs['number'];?>"> </td></tr>
  <tr> <td>报价: </td><td> <input type=text name="pro_price" size=50 value="<?php echo $rs['price'];?>"> </td></tr>
  <tr> <td>客户信息: </td><td> <textarea name="customer" rows="5" cols="35" class="textarea" >
<?php echo $rs['customer'];?>
  </textarea>  </td></tr>
    <input type=hidden name="aid" size=50 value="<?php echo $aid;?>">

</table>
<input type=submit name=submit value=提交>
</form>
</CENTER>

 
</body>
</html>