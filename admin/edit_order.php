<?php
include "edit_header.php";
require_once('../common.inc.php');
$oid =$_REQUEST['id'];
//$sql1="SELECT * from {$db_prefix}orders where id=".$oid." ";
$DB->db_query("SELECT * from {$db_prefix}dingdan where DD_ID=".$oid);
$rs = $DB->db_fetch_array();

//$rsop = get_order_progress($oid); //获取订单进度


?>
 
 <script language="javascript">
function checkform(obj)
{
for(i=0;i<obj.provider_id.length;i++)
         if(obj.provider_id[i].checked==true) return true;

alert("请选择提供商")

 
return false;        

}

function checkowner(obj)
{
for(i=0;i<obj.owner.length;i++)
         if(obj.owner[i].checked==true) return true;

alert("请选择跟单人")
return false;        

}
</script>

<CENTER><b>修改订单</b>



</CENTER>

<form action="edit_order2.php" method="post" onsubmit="return checkform(this)&&checkowner(this)">
<table border=0>

  <tr> <td>下单时间: </td><td> <input class="input" type=text name="regdate" size=12 onclick="fPopCalendar(regdate,regdate);return false" type="text" value="<?php echo date('Y-m-d',$rs['DD_SHIJIAN']);?>"></td></tr>
  <tr> <td>公司名称: </td><td> <input type=text name="com_name" size=50 value="<?php echo $rs['DD_GONGSI_NAME'];?>" > </td></tr>
  <tr> <td>帐号属性: </td><td> 
  <fieldset>
  <legend>帐号属性</legend>
  <?PHP 
  	global $DB, $db_prefix;
	$DB2->db_query("SELECT * FROM {$db_prefix}account_type ");

    while ($rs2 = $DB2->db_fetch_array())
	{
	?>
		
	<input type="radio" value="<?php echo $rs2['id']; ?>" <?php if($rs2['id']==$rs['DD_LEIBIE']) echo " checked";?> id="account_type" name="account_type" /><label for="type"><?php echo $rs2['type']; ?></label> &nbsp;&nbsp;
	<?php
	}
	?>
  </fieldset>
  </td></tr>

  <tr> <td>
  <?PHP 
  	global $DB, $db_prefix;
	//$DB2->db_query("SELECT * FROM {$db_prefix}chanpin where CP_ID =".$rs['DD_CP_ID']);
	$rs3 = $DB2->db_fetch_array();

	?>
  

    <tr> <td>跟单情况: </td><td> 	  <fieldset>
  <legend>跟单人</legend>
<input type="radio" value="1" id="owner" name="owner" <?php if($rs['DD_GENDAN_ID']==1) echo "checked";?> />  <label for="type">坚</label> &nbsp;&nbsp;
<input type="radio" value="2" id="owner" name="owner" <?php if($rs['DD_GENDAN_ID']==2) echo "checked";?> /><label for="type">青</label> &nbsp;&nbsp;
<input type="radio" value="1" id="owner" name="owner" <?php if($rs['DD_GENDAN_ID']==3) echo "checked";?> />  <label for="type">峰</label> &nbsp;&nbsp;

  </fieldset>
  </td></tr>

    <tr> <td>是否是老客户: </td><td> 	  <fieldset>
  <legend>老客户</legend>
<input type="radio" value="1" id="laokehu" name="laokehu" <?php if($rs['DD_LAOKEHU']==1) echo "checked";?> />  <label for="type">是</label> &nbsp;&nbsp;
<input type="radio" value="0" id="laokehu" name="laokehu" <?php if($rs['DD_LAOKEHU']==0) echo "checked";?> /><label for="type">否</label> &nbsp;&nbsp;
  </fieldset>
  </td></tr>

  

  <tr> <td>备注信息: </td><td> <textarea name="remarks" rows="15" cols="55" class="textarea">
 <?php echo $rs['DD_BEIZHU']; ?>
  </textarea>  </td></tr>
    <input type=hidden name="oid" size=50 value="<?php echo $oid;?>">

</table>
<input type=submit name=submit value=提交>
</form>


<?PHP
$DB->close();
$DB2->close();
?>
</body>
</html>