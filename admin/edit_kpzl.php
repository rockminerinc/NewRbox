<?php
include "header.php";
require_once('../common.inc.php');
$id =$_REQUEST['kid'];
$rs2 = get_kpzl($id); //获取开票资料


?>

<body bgcolor="#ffffff" >
<CENTER><b>修改开票信息</b>



<BR><BR>
<BR>
<form action="edit_kpzl2.php?id=<?php echo $id;?>" method="post" >
<table border=1>

 
  <tr> <td>订单号: </td><td> <?php echo $id;?></td></tr>

  <tr> <td>名称: </td><td> <input type=text name="comname" size=50 value="<?php echo $rs2['KPZL_NAME'];?>"></td></tr>
  <tr> <td>稅号: </td><td> <input type=text name="shuihao" size=50 value="<?php echo $rs2['KPZL_SHUIHAO'];?>"> </td></tr>
  <tr> <td>地址电话: </td><td> <input type=text name="dizhi" size=50 value="<?php echo $rs2['KPZL_DIZHI '];?>"> </td></tr>
  <tr> <td>银行帐号: </td><td>  <input type=text name="zhanghao" size=50 value="<?php echo $rs2['KPZL_ZHANGHAO '];?>"> </td></tr>
  <tr> <td>备注: </td><td>  <input type=text name="beizhu" size=50 value="<?php echo $rs2['KPZL_BEIZHU'];?>"> </td></tr>

</table>
<input type=submit name=submit value=提交>
</form>



 </CENTER>

 
</body>
</html>