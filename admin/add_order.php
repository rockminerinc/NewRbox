<?php
include "edit_header.php";
require_once('../common.inc.php');

?>
<body >
<b>添加订单</b>
<?php
	$com_name   = trim($_POST['com_name']);
	$order_time =strtotime(trim($_POST['regdate']));//time(); //date('Y-m-d');
	$type_id = trim($_POST['account_type']);
	$remark = trim($_POST['remark']);
	$post_time = trim($_POST['post_time']);
	$owner = trim($_POST['owner']);  //跟单
	$laokehu = trim($_POST['laokehu']);  //
	$time=time(); 
	if(strcmp($com_name, "")){	

			$DB->db_query("INSERT INTO dingdan (DD_GONGSI_NAME,DD_SHIJIAN,DD_LEIBIE,DD_BEIZHU,DD_GENDAN_ID,DD_LAOKEHU) VALUES ('$com_name','$order_time','$type_id','$remark','$owner','$laokehu')");
			$dingdan_id = $DB->db_insertID();
			echo "订单添加OK!<BR>";

			
			$DB->db_query("INSERT INTO dingdan_jindu (JD_DD_ID) VALUES ('$dingdan_id')");
			//$opid = $DB->db_insertID();
			echo " 订单进度添加OK!<BR>";
			fowor_reload();

	}
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

function checklaokehu(obj)
{
for(i=0;i<obj.laokehu.length;i++)
         if(obj.laokehu[i].checked==true) return true;

alert("请选择是否老客户")
return false;        

}

</script>

<form action="add_order.php" method="post"  onsubmit="return checkform(this)&&checkowner(this)">
<table border=0>

 
  <tr> <td>时间: </td><td>   <input class="input" type=text name="regdate" size=12  type="text"  value = "<?php echo date("Y-m-d",time());?>"></td></tr>
  <tr> <td>公司名称: </td><td> <input type=text name="com_name" size=50> </td></tr>
  <tr> <td>帐号属性: </td><td> 
  <fieldset>
  <legend>帐号属性</legend>
  <?PHP 
  	global $DB, $db_prefix;
	$DB->db_query("SELECT * FROM {$db_prefix}account_type ");

    while ($rs = $DB->db_fetch_array())
	{
	if($rs['id']==1)
		$checked="checked";
	else
		$checked="";
	echo '<input type="radio" '.$checked.' value="'.$rs['id'].'" id="account_type" name="account_type" /><label for="type">'.$rs['type'].'</label> &nbsp;&nbsp;';
	}
	?>
  </fieldset>
  </td></tr>

  <tr> <td>


  <tr> <td>跟单情况: </td><td> 	  <fieldset>
  <legend>跟单人</legend>
<input type="radio" value="1" id="owner" name="owner" /><label for="type">坚</label> &nbsp;&nbsp;
<input type="radio" value="2" id="owner" name="owner" /><label for="type">青</label> &nbsp;&nbsp;
<input type="radio" value="3" id="owner" name="owner" /><label for="type">峰</label> &nbsp;&nbsp;
  </fieldset>
  </td></tr>

    <tr> <td>是否老客户: </td><td> 	  <fieldset>
  <legend>老客户?</legend>
<input type="radio" value="1" id="owner" name="laokehu" /><label for="type">是</label> &nbsp;&nbsp;
<input type="radio" value="0" id="owner" name="laokehu" /><label for="type">否</label> &nbsp;&nbsp;
  </fieldset>
  </td></tr>
  <tr> <td>备注: </td><td> <textarea name="remark" rows="5" cols="55" class="textarea"></textarea>  </td></tr>

</table>
<input type=submit name=submit value=提交>
</form>
</CENTER>
 
</body>
</html>