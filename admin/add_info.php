<?php
include "../header.php";
require_once('../common.inc.php');

?>
<body bgcolor="#ffffff" >

<basefont size=2 face=arial>

<CENTER><b>添加信息</b>
<?
	$info1=trim($_POST['info1']);
	$info2=trim($_POST['info2']);
if(strcmp($info1, "")){	
	$DB->db_query("INSERT INTO {$db_prefix}info (info1,info2) VALUES ('$info1','$info2')");
	echo "<p>".$pro_name." 添加成功!<BR> <p>";
}
?>




<form action="add_info.php" method="post" >
<table border=0>
  
<tr> <td> 内容: </td><td> <textarea name="info1" rows="15" cols="75" class="textarea"></textarea> </td></tr>
<tr> <td> 内容: </td><td> <textarea name="info2" rows="15" cols="75" class="textarea"></textarea> </td></tr>


</table>
<input type=submit name=submit value=提交>

</form>


</CENTER>
</body>
</html>