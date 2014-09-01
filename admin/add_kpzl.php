<?php
/*
添加客户开票资料
*/
include "header.php";
require_once('../common.inc.php');

?>

<body bgcolor="#ffffff" >

<basefont size=2 face=arial>

<CENTER><b>添加开票信息</b>
<?
	
	$tid =$_REQUEST['id'];  //获取订单ID
	$com_name=get_com_name($tid);



			//$DB->db_query("UPDATE  orders o,products p SET o.amount=p.amount WHERE o.id =p.id");


if(isset($_POST['submit'])) 
{

	$comname   = trim($_POST['comname']);
	$shuihao = trim($_POST['shuihao']);
	$dizhi = trim($_POST['dizhi']);
	//$dianhua = trim($_POST['dianhua']);
	//$kaihuhang = trim($_POST['kaihuhang']);
	$zhanghao = trim($_POST['zhanghao']);
	$beizhu = trim($_POST['beizhu']);


//	if($comname&&$shuihao&&$dizhi&&$dianhua&&$kaihuhang&&$zhanghao){	
 
			$DB->db_query("INSERT INTO kaipiaoziliao (KPZL_NAME,KPZL_SHUIHAO,KPZL_DIZHI,KPZL_ZHANGHAO,KPZL_BEIZHU) VALUES ('$comname','$shuihao','$dizhi','$zhanghao','$beizhu')");
			$kpzl_id = $DB->db_insertID();
			echo '<BR><H1>OK!</H1><BR>';

			$sql="update dingdan SET DD_KPZL_ID=$kpzl_id where DD_ID = ".$tid;
			$DB->db_query($sql);
			echo " 开票资料添加OK!<BR>";
			fowor_reload();
			//echo "成功！"


	//}
	//else echo '请填写完整!<A HREF="add_ddcp.php?id='.$tid.'">继续添加</A>';
}
//else echo "shit!";
?>

<BR><BR>
<B>按照合同上的名称填写完整</B>
<BR>
<form action="add_kpzl.php?id=<?php echo $tid;?>" method="post" >
<table border=1>

 
  <tr> <td>订单号: </td><td> <?php echo $tid;?></td></tr>

  <tr> <td>名称: </td><td> <input type=text name="comname" size=50 value="<?php echo $com_name;?>"></td></tr>
  <tr> <td>稅号: </td><td> <input type=text name="shuihao" size=50> </td></tr>
  <tr> <td>地址/电话: </td><td> <input type=text name="dizhi" size=50> </td></tr>
  <tr> <td>银行/帐号: </td><td>  <input type=text name="zhanghao" size=50> </td></tr>
  <tr> <td>备注: </td><td>  <input type=text name="beizhu" size=50> </td></tr>

</table>
<input type=submit name=submit value=提交>
</form>
</CENTER>

 
</body>
</html>