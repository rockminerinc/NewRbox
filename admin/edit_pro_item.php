<?php
include "ask_header.php";
require_once('../common.inc.php');
$aid =$_REQUEST['id'];
$DB->db_query("SELECT * from xunjia_chanpin where ID=".$aid);
$rs = $DB->db_fetch_array();
?>

<body bgcolor="#ffffff" >

<basefont size=2 face=arial>

<CENTER><b>修改产品</b>

<BR>
<BR>
<form action="edit_pro_item2.php?id=<?php echo $aid;?>" method="post" >
<table border=1>

 
  <tr> <td>订单号: </td><td> <?php echo $aid;?></td></tr>

  <tr> <td>名称: </td><td> <input type=text name="pro_name" size=50 value="<?php echo $rs['NAME'];?>" > </td></tr>
  <tr> <td>型号: </td><td> <input type=text name="pro_model" size=50 value="<?php echo $rs['XINGHAO'];?>"  > </td></tr>
  <tr> <td>单价: </td><td> <input type=text name="pro_price" size=50 value="<?php echo $rs['JIAGE'];?>" > </td></tr>
  <tr> <td>数量: </td><td> <input type=text name="pro_num" size=50 value="<?php echo $rs['NUM'];?>" > </td></tr>
  <tr> <td>备注: </td><td>  <input type=text name="pro_memo" size=50 value="<?php echo $rs['BEIZHU'];?>" > </td></tr>
 
</table>
<input type=submit name=submit value=提交>
</form>



 </CENTER>

 
</body>
</html>