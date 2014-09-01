<?php
include "edit_header.php";
require_once('../common.inc.php');
$chanpin_id =$_REQUEST['id'];
$DB->db_query("SELECT * from chanpin where CP_ID=".$chanpin_id);
$rs = $DB->db_fetch_array();

if(isset($_POST['submit'])) 
{
	
	$CP_NAME   = trim($_POST['CP_NAME']);
	$CP_GUIGE   = trim($_POST['CP_GUIGE']);
	$CP_JIAGE   = trim($_POST['CP_JIAGE']);
	$CP_JINJIA   = trim($_POST['CP_JINJIA']);
	$CP_NUM   = trim($_POST['CP_NUM']);
	$CP_BEIZHU   = trim($_POST['CP_BEIZHU']);
	$CP_GYS_ID   = trim($_POST['CP_GYS_ID']);

	if($chanpin_id)
	{
	
 	$DB->db_query('UPDATE chanpin SET CP_NAME="'.$CP_NAME.'",CP_GYS_ID="'.$CP_GYS_ID.'",CP_GUIGE="'.$CP_GUIGE.'" ,CP_JIAGE="'.$CP_JIAGE.'",CP_JINJIA="'.$CP_JINJIA.'",CP_NUM="'.$CP_NUM.'" ,CP_BEIZHU="'.$CP_BEIZHU.'"  WHERE CP_ID='.$chanpin_id);
	echo "ok!<br>";
	fowor_reload();
	return false;	
	}
	else echo "need chanpin_id";
	
}


?>

<CENTER><b>添加/编辑产品</b>

<BR>
<BR>
<form action="edit_chanpin.php?id=<?php echo $chanpin_id;?>" method="post" >
<table border=1>

 
  <tr> <td>订单号: </td><td> <?php echo $chanpin_id;?></td></tr>
  <tr> <td>名称: </td><td> <input type=text name="CP_NAME" size=50 value="<?php echo $rs['CP_NAME'];?>" > </td></tr>
  <tr> <td>型号: </td><td> <input type=text name="CP_GUIGE" size=50 value="<?php echo $rs['CP_GUIGE'];?>"  > </td></tr>
  <tr> <td>单价: </td><td> <input type=text name="CP_JIAGE" size=50 value="<?php echo $rs['CP_JIAGE'];?>" > </td></tr>
  <tr> <td>进价: </td><td> <input type=text name="CP_JINJIA" size=50 value="<?php echo $rs['CP_JINJIA'];?>" > </td></tr>
  <tr> <td>数量: </td><td> <input type=text name="CP_NUM" size=50 value="<?php echo $rs['CP_NUM'];?>" > </td></tr>
 
   <tr> <td>供应商: </td><td> 

   <?PHP 
  	global $DB, $db_prefix;
	$DB2->db_query("SELECT * FROM gongyingshang ");

    while ($rs2 = $DB2->db_fetch_array())
	{
	?>
		
	<input type="radio" value="<?php echo $rs2['id']; ?>" <?php if($rs2['id']==$rs['CP_GYS_ID']) echo " checked";?> id="CP_GYS_ID" name="CP_GYS_ID" /><label for="type"><?php echo $rs2['name']; ?></label> &nbsp;&nbsp;
	<?php
	}
	?>
	
	</td></tr>
	
  <tr> <td>备注: </td><td>  <input type=text name="CP_BEIZHU" size=50 value="<?php echo $rs['CP_BEIZHU'];?>" > </td></tr>
 
</table>
<input type=submit name=submit value=提交>
</form>
</CENTER>
</body>
</html>