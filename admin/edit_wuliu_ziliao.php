<?php
/*
添加客户资料
*/
include "edit_header.php";
require_once('../common.inc.php');
$wuliu_id =$_REQUEST['wid'];
$dingdan_id =$_REQUEST['did'];
if($wuliu_id)
$wuliu=get_wuliu_ziliao($dingdan_id);
?>
<body >

<CENTER> 
<?
	

if(isset($_POST['submit'])) 
{
	$wuliu_id =$_REQUEST['wid'];
	$dingdan_id =$_REQUEST['did'];
	$wuliu_leibie   = trim($_POST['wuliu_leibie']);
	$wuliu_fahuo_shijian   = strtotime(trim($_POST['wuliu_fahuo_shijian']));

	$wuliu_danhao   = trim($_POST['wuliu_danhao']);
	$wuliu_yudao_shijian   = strtotime(trim($_POST['wuliu_yudao_shijian']));
	$wuliu_daohuo_shijian   = strtotime(trim($_POST['wuliu_daohuo_shijian']));
	$wuliu_beizhu   = trim($_POST['wuliu_beizhu']);
	$wuliu_gongsi_id   = trim($_POST['wuliu_gongsi_id']);

	if($wuliu_id)
	{
	
 	$DB->db_query('UPDATE wuliu_ziliao SET WLZL_DINGDAN_ID="'.$dingdan_id.'",WLZL_GONGSI_ID="'.$wuliu_gongsi_id.'" ,WLZL_LEIBIE="'.$wuliu_leibie.'",WLZL_DANHAO="'.$wuliu_danhao.'" ,WLZL_FAHUO_SHIJIAN="'.$wuliu_fahuo_shijian.'" , WLZL_YUDAO_SHIJIAN="'.$wuliu_yudao_shijian.'" , WLZL_DAOHUO_SHIJIAN="'.$wuliu_daohuo_shijian.'" , WLZL_BEIZHU="'.$wuliu_beizhu.'"  WHERE  WLZL_ID ='.$wuliu_id );
	echo "修改ok!<br>";
	fowor_reload(); 
	return false;	
	}
	else
	{
	$DB->db_query("INSERT INTO wuliu_ziliao (WLZL_DINGDAN_ID,WLZL_GONGSI_ID,WLZL_LEIBIE,WLZL_DANHAO,WLZL_FAHUO_SHIJIAN,WLZL_YUDAO_SHIJIAN,WLZL_DAOHUO_SHIJIAN,WLZL_BEIZHU)
	VALUES ('$dingdan_id','$wuliu_gongsi_id','$wuliu_leibie','$wuliu_danhao','$wuliu_fahuo_shijian','$wuliu_yudao_shijian','$wuliu_daohuo_shijian','$wuliu_beizhu') ");
	//$kpzl_id = $DB->db_insertID();
	echo '<BR><H1>增加OK!</H1><BR>';	
	fowor_reload();
	return false;	
	}

}


//else echo "shit!";
?>


<form action="edit_wuliu_ziliao.php?did=<?php echo $dingdan_id;?>&&wid=<?php echo $wuliu_id;?>" method="post" >
<table border=1>
  <tr> <td>订单号: </td><td> <?php echo $dingdan_id;?></td></tr>
   <tr> <td>快递公司: </td><td>
	<?PHP
  	global $DB2, $db_prefix;
	$DB2->db_query("SELECT * FROM wuliu_gongsi");
    while ($rs4 = $DB2->db_fetch_array())
	{
	?>
	<input type="radio" value="<?php echo $rs4['WL_ID']; ?>" id="wuliu_gongsi_id" <?php if($rs4['WL_ID']==$wuliu['WLZL_GONGSI_ID']) echo " checked";?> name="wuliu_gongsi_id" /><label for="type"><?php echo $rs4['WL_NAME']; ?></label> &nbsp;&nbsp;
	<?php
	}
	?>
  </td></tr>  
  
  
  <tr><td>类型</td> <td><input type=text name="wuliu_leibie" size=50 value="<?php if ($wuliu['WLZL_LEIBIE']) echo $wuliu['WLZL_LEIBIE'];else echo "发货/发票/换货"?>"></td></TR>
  <TR><td>发出时间</td> <td><input type=text name="wuliu_fahuo_shijian" size=50 value="<?php if($wuliu['WLZL_FAHUO_SHIJIAN']) echo date('Y-m-d',$wuliu['WLZL_FAHUO_SHIJIAN']);else echo date('Y-m-d',time());?>"></td></TR>
  <TR><td>单号</td> <td><input type=text name="wuliu_danhao" size=50 value="<?php echo $wuliu['WLZL_DANHAO'];?>"></td></TR>
  <TR> <td>预到时间</td> <td><input type=text name="wuliu_yudao_shijian" size=50 value="<?php if($wuliu['WLZL_YUDAO_SHIJIAN']) echo date('Y-m-d',$wuliu['WLZL_YUDAO_SHIJIAN']);else echo "";?>"></td></TR>
  <TR> <td>收货时间</td> <td><input type=text name="wuliu_daohuo_shijian" size=50 value="<?php if($wuliu['WLZL_DAOHUO_SHIJIAN']) echo date('Y-m-d',$wuliu['WLZL_DAOHUO_SHIJIAN']);else echo "";?>"></td></TR>
  <TR> <td>备注</td> <td><input type=text name="wuliu_beizhu" size=50 value="<?php echo $wuliu['WLZL_BEIZHU'];?>"></td></TR>
   
 


</table>
<input type=submit name=submit value=提交>
</form>
</CENTER>

 
</body>
</html>