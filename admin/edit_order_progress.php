<?php
include "header.php";
require_once('../common.inc.php');
$id =$_REQUEST['id'];
$rsop = get_order_progress($id); //获取订单进度

//$DB->db_query("SELECT * from products where id=".$aid);
//$rs = $DB->db_fetch_array();
?>

<body bgcolor="#ffffff" >

<basefont size=2 face=arial>

<CENTER><b>修改订单进程状态</b>



<BR><BR>
<BR>
<form action="edit_order_progress2.php?id=<?php echo $id;?>" method="post" >
<table border=1>


  <tr> <td>订单号: </td><td> <?php echo $id;?></td></tr>

  <tr> <td>合同回传情况</td><td> 
  <fieldset>
  <input type="radio" value="1" <?php if($rsop['hetong']==1) echo " checked";?> id="hetong" name="hetong" /><label for="type">已回传</label> &nbsp;&nbsp;
  <input type="radio" value="0" <?php if($rsop['hetong']==0) echo " checked";?>  id="hetong" name="hetong" /><label for="type">没回传</label> &nbsp;&nbsp;
  </fieldset>
   </td></tr>

  <tr> <td>图纸回传情况</td><td> 
  <input type="radio" value="1" <?php if($rsop['tuzhi']==1) echo " checked";?> id="tuzhi" name="tuzhi" /><label for="type">已回传</label> &nbsp;&nbsp;
  <input type="radio" value="0" <?php if($rsop['tuzhi']==0) echo " checked";?>  id="tuzhi" name="tuzhi" /><label for="type">没回传</label> &nbsp;&nbsp;
   </td></tr>
 

  <tr> <td>货款到帐情况</td><td> 
  <input type="radio" value="1" <?php if($rsop['fukuan']==1) echo " checked";?> id="fukuan" name="fukuan" /><label for="type">已到帐</label> &nbsp;&nbsp;
  <input type="radio" value="0" <?php if($rsop['fukuan']==0) echo " checked";?>  id="fukuan" name="fukuan" /><label for="type">没到帐</label> &nbsp;&nbsp;
   </td></tr>

  <tr> <td>发货情况</td><td> 
  <input type="radio" value="1" <?php if($rsop['fahuo']==1) echo " checked";?> id="fahuo" name="fahuo" /><label for="type">已发货</label> &nbsp;&nbsp;
  <input type="radio" value="0" <?php if($rsop['fahuo']==0) echo " checked";?>  id="fahuo" name="fahuo" /><label for="type">没发货</label> &nbsp;&nbsp;
   </td></tr>
 



</table>
<input type=submit name=submit value=提交>
</form>



 </CENTER>

 
</body>
</html>