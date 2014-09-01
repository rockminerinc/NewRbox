<?php
include "header.php";
require_once('../common.inc.php');
$tid =$_REQUEST['id'];
$sql1="SELECT * from shouhou  where id=".$tid."";
$DB->db_query($sql1);
$rs = $DB->db_fetch_array();
?>

<body bgcolor="#ffffff" >

<basefont size=2 face=arial>

<b>修改售后</b>


<form action="shouhou_edit2.php" method="post" >
<table border=0>

 
  <tr> <td>发生时间: </td><td> <input class="input" type=text name="regdate" size=12   type="text"  value = "<?php echo date('Y-m-d',$rs['time']);?>"></td></tr>
 
  <tr> <td>内容: </td><td> <textarea name="info" rows="15" cols="55" class="textarea">
 <?php echo $rs['info'];?>
  </textarea>  </td></tr>

  <tr> <td>处理时间: </td><td> <input class="input" type=text name="regdate2" size=12  type="text"  value = "<?php echo date('Y-m-d',$rs['chuli_time']);?>"></td></tr>


  <tr> <td>处理: </td><td> <textarea name="chuli" rows="15" cols="55" class="textarea">
 <?php echo $rs['chuli'];?>
  </textarea>  </td></tr>

     <tr> <td>状态: </td><td> 	  <fieldset>
  <legend>已完成?</legend>
<input type="radio" value="1" id="invoice" name="zhuangtai" <?php if($rs['zhuangtai']) echo "checked";?> /><label for="type">是</label> &nbsp;&nbsp;
<input type="radio" value="0" id="invoice" name="zhuangtai" <?php if($rs['zhuangtai']==0) echo "checked";?> /><label for="type">否</label> &nbsp;&nbsp;
  </fieldset>
  </td></tr>

</table>
    <input type=hidden name="tid" size=50 value="<?php echo $tid;?>">

<input type=submit name=submit value=提交>
</form>

 

</body>
</html>