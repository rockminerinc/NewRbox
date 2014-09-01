<?php
/*
添加客户资料
*/
include "edit_header.php";
require_once('../common.inc.php');
$lianxiren_id =$_REQUEST['lid'];
$dingdan_id =$_REQUEST['did'];
if($lianxiren_id)
$lxr=get_lxr($dingdan_id);
?>
<body >

<CENTER> 
<?php
	

if(isset($_POST['submit'])) 
{
	
	$lxr_name   = trim($_POST['lxr_name']);
	$lxr_dianhua   = trim($_POST['lxr_dianhua']);
	$lxr_chuanzhen   = trim($_POST['lxr_chuanzhen']);
	$lxr_email   = trim($_POST['lxr_email']);
	$lxr_qq   = trim($_POST['lxr_qq']);
	$lxr_zhiwu   = trim($_POST['lxr_zhiwu']);
	$lxr_xingge   = trim($_POST['lxr_xingge']);
	$lxr_youji   = trim($_POST['lxr_youji']);
	$lxr_beizhu   = trim($_POST['lxr_beizhu']);
	$lianxiren_id =$_REQUEST['lid'];
	$dingdan_id =$_REQUEST['did'];
	
	if($lianxiren_id)
	{
	
 	$DB->db_query('UPDATE kehu_lianxiren SET LXR_NAME="'.$lxr_name.'",LXR_DIANHUA="'.$lxr_dianhua.'" ,LXR_CHUANZHEN="'.$lxr_chuanzhen.'",LXR_EMAIL="'.$lxr_email.'" ,LXR_QQ="'.$lxr_qq.'" , LXR_ZHIWU="'.$lxr_zhiwu.'" , LXR_XINGGE="'.$lxr_xingge.'" , LXR_YOUJI="'.$lxr_youji.'" , LXR_BEIZHU="'.$lxr_beizhu.'" WHERE LXR_ID='.$lianxiren_id.' and LXR_DD_ID ='.$dingdan_id );
	echo "修改ok!<br>";
	fowor_reload();
	return false;	
	}
	else
	{
	$DB->db_query("INSERT INTO kehu_lianxiren (LXR_NAME,LXR_DIANHUA,LXR_CHUANZHEN,LXR_EMAIL,LXR_QQ,LXR_ZHIWU,LXR_XINGGE,LXR_YOUJI,LXR_BEIZHU,LXR_DD_ID) VALUES ('$lxr_name','$lxr_dianhua','$lxr_chuanzhen','$lxr_email','$lxr_qq','$lxr_zhiwu','$lxr_xingge','$lxr_youji','$lxr_beizhu','$dingdan_id') ");
	//$kpzl_id = $DB->db_insertID();
	echo '<BR><H1>增加OK!</H1><BR>';	
	fowor_reload();
	return false;	
	}

}


//else echo "shit!";
?>

<BR><BR>

<form action="edit_lianxiren.php?did=<?php echo $dingdan_id;?>&&lid=<?php echo $lianxiren_id;?>" method="post" >
<table border=1>
  <tr> <td>订单号: </td><td> <?php echo $dingdan_id;?></td></tr>
  <tr><td>联系人</td> <td><input type=text name="lxr_name" size=50 value="<?php echo $lxr['LXR_NAME'];?>"></td></TR>
  <TR><td>电话</td> <td><input type=text name="lxr_dianhua" size=50 value="<?php echo $lxr['LXR_DIANHUA'];?>"></td></TR>
  <TR><td>传真</td> <td><input type=text name="lxr_chuanzhen" size=50 value="<?php echo $lxr['LXR_CHUANZHEN'];?>"></td></TR>
  <TR> <td>EMAIL</td> <td><input type=text name="lxr_email" size=50 value="<?php echo $lxr['LXR_EMAIL'];?>"></td></TR>
  <TR> <td>QQ</td> <td><input type=text name="lxr_qq" size=50 value="<?php echo $lxr['LXR_QQ'];?>"></td></TR>
  <TR> <td>职务</td> <td><input type=text name="lxr_zhiwu" size=50 value="<?php echo $lxr['LXR_ZHIWU'];?>"></td></TR>
  <TR> <td>性格</td> <td><input type=text name="lxr_xingge" size=50 value="<?php echo $lxr['LXR_XINGGE'];?>"></td></TR>
  <TR> <td>邮寄地址</td><td>
  <textarea name="lxr_youji" rows="15" cols="55" class="textarea">
  <?php echo $lxr['LXR_YOUJI'];?>
  </textarea> 
   
  
  </td></TR>
  <TR> <td>备注</td> <td><input type=text name="lxr_beizhu" size=50 value="<?php echo $lxr['LXR_BEIZHU'];?>"></td></TR>
   

</table>
<input type=submit name=submit value=提交>
</form>
</CENTER>

 
</body>
</html>