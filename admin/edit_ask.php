<?php
include "ask_header.php";
require_once('../common.inc.php');
$id = $_REQUEST['id'];
$DB->db_query("SELECT * from xunjia where ID=".$id);
$rs = $DB->db_fetch_array();
?>

<body bgcolor="#ffffff" >

<basefont size=2 face=arial>

<CENTER><b>编辑询价</b>

<form action="edit_ask2.php" method="post" >
<table border=0>

 
  <tr> <td>时间: </td><td> <input class="input" type=text name="shijian" size=12 type="text"  value = "<?php echo date('Y-m-d',$rs['SHIJIAN']);?>"></td></tr>

  <tr> <td>公司/地区: </td><td> <input type=text name="gongsi" value="<?php echo $rs['GONGSI'];?>" size=50> </td></tr>
  <tr> <td>联系人: </td><td> <input type=text name="lianxiren" value="<?php echo $rs['LIANXIREN'];?>" size=50> </td></tr>
  <tr> <td>电话: </td><td> <input type=text name="dianhua" value="<?php echo $rs['DIANHUA'];?>" size=50> </td></tr>
  <tr> <td>传真: </td><td> <input type=text name="chuanzhen" value="<?php echo $rs['CHUANZHEN'];?>" size=50> </td></tr>
  <tr> <td>备注: </td><td> <textarea name="beizhu" rows="5" cols="35" class="textarea">
  <?php echo $rs['BEIZHU'];?>
  </textarea>  </td></tr>

</table>
<input type=hidden name="id" value="<?php echo $id;?>" size=50>
<input type=submit name=submit value=提交>
</form>
</CENTER>

 
</body>
</html>